<?php

namespace App\Services;

use App\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use Validator;
use Hash;
use App\Role;
use App\BidCategoryAmount;
use App\DailyDeclareNumber;
use DB;

class UserService {

    /**
     * TransactionService constructor.
     */
    public function __construct() {
        
    }

    public function downlineTree($id) {
        try {
            $tree = [];
            $users = User::where('parent_id', $id)->get();
            $roles = Role::all();
            $filteredRoles = [];
            foreach ($roles as $key => $val) {
                $filteredRoles[$val->id] = $val->name;
            }
            //echo $id;
            foreach ($users as $key => $val) {
                $val->role_name = '';
                if ($val->role_id) {
                    $val->role_name = $filteredRoles[$val->role_id];
                }
                $users[$key] = $val;

                $childs = User::where('parent_id', $val->id)->get();
                $childNode = [];
                $childCount = count($childs);

                foreach ($childs as $child) {
                    $name = $child->first_name . ' ' . $child->last_name;
                    $url = route('userprofile', ['id' => $child->id]);

                    $lastChild = User::where('parent_id', $child->id)->get();
                    $lastChildNode = [];
                    $lastChildCount = count($lastChild);
                    foreach ($lastChild as $lchild) {
                        $childName = $lchild->first_name . ' ' . $lchild->last_name;
                        $lCUrl = route('userprofile', ['id' => $lchild->id]);
                        $lastChildNode[] = ['text' => $childName . ' (' . $lchild->user_account . ') Balance: ' . ($lchild->last_balance == '' ? 0 : $lchild->last_balance), 'href' => "$lCUrl"];
                    }
                    if (count($lastChild) > 0) {
                        $childNode[] = ['text' => $name . ' (' . $child->user_account . ') Balance: ' . ($child->last_balance == '' ? 0 : $child->last_balance), 'href' => "$url", 'tags' => ["$lastChildCount"], 'nodes' => $lastChildNode];
                    } else {
                        $childNode[] = ['text' => $name . ' (' . $child->user_account . ') Balance: ' . ($child->last_balance == '' ? 0 : $child->last_balance), 'tags' => ["$lastChildCount"], 'href' => "$url"];
                    }
                }
                $name = $val->first_name . ' ' . $val->last_name;
                $url = route('userprofile', ['id' => $val->id]);
                if (count($childs) > 0) {
                    $tree[] = ['text' => $name . ' (' . $val->user_account . ') Balance: ' . ($val->last_balance == '' ? 0 : $val->last_balance), 'target' => '_blank', 'href' => "$url", 'tags' => ["$childCount"], 'nodes' => $childNode];
                } else {
                    $tree[] = ['text' => $name . ' (' . $val->user_account . ') Balance: ' . ($val->last_balance == '' ? 0 : $val->last_balance), 'href' => "$url", 'tags' => ["$childCount"]];
                }
            }
            //print_r($tree);
            //exit;
            return $tree;
        } catch (\Exception $exception) {
            return ['result' => false, 'message' => $exception->getMessage()];
        }
    }

    public function bidHistory($id) {
        try {
            $bidCategoryAmount = BidCategoryAmount::all();
            $bidMultiplyAmount = [];
            foreach ($bidCategoryAmount as $bidCat) {
                $bidMultiplyAmount[$bidCat->game_id][$bidCat->bid_category_id] = $bidCat->multiply;
            }
            $sql = "select usr.first_name, usr.last_name, usr.user_account,gm.name,ub.*  from users as usr
              inner join user_bid as ub on ub.user_id= usr.id inner join games as gm on ub.game_id=gm.id
              where usr.id=$id";
            $results = DB::select($sql);

            foreach ($results as $key => $value) {
                if (isset($bidMultiplyAmount[$value->game_id][$value->bid_category_id])) {
                    
                    $gameStatus = $this->checkResult($value->game_id, $value->game_date);
                    //echo '<pre>';
                    //print_r($gameStatus);
                   
                    if (count($gameStatus) > 0) {
                        if ($gameStatus[0]->number == $value->bid_number) {
                            $results[$key]->result = 'Win';
                            $results[$key]->win_amount = $bidMultiplyAmount[$value->game_id][$value->bid_category_id] * $value->amount;
                            //print_r($results);
                            $bidMultiplyAmount[$value->game_id][$value->bid_category_id] * $value->amount;
                            $results[$key]->result_date = $gameStatus[0]->created_at;
                            //$gameStatus[0]->number .' '. $value->bid_number;
                    
                        } else {
                            $results[$key]->result = 'Loose';
                            $results[$key]->win_amount = 0;
                            $results[$key]->result_date = $gameStatus[0]->created_at;
                        }
                    } else {
                        $results[$key]->result = 'Pending';
                        $results[$key]->win_amount = '-';
                        $results[$key]->result_date = '-';
                    }
                } else {
                    $results[$key]->result = 'Pending';
                    $results[$key]->win_amount = '-';
                    $results[$key]->result_date = '-';
                }
            }
            return $results;
        } catch (\Exception $exception) {
           echo $exception->getMessage();
           exit;
            return ['result' => false, 'message' => $exception->getMessage()];
        }
    }

    public function checkResult($game_id, $game_date) {
        
        $game = DailyDeclareNumber::where('game_id', $game_id)
                        ->where('declare_date', $game_date)->get();
        return $game;
    }

    public function transactionHistory($id) {
        try {
            $users = User::all();
            $roles = Role::all();
            $filteredRoles = [];
            $filteredUsers = [];
            foreach ($roles as $key => $val) {
                $filteredRoles[$val->id] = $val->name;
            }
            foreach ($users as $key => $val) {
                $val->role_name = '';
                if ($val->role_id) {
                    $val->role_name = $filteredRoles[$val->role_id];
                }
                $filteredUsers[$val->id] = $val;
            }

            $sql = "select * from transactions as trans where trans.to_user_id=$id or trans.from_user_id=$id ";
            $transactions = DB::select($sql);
            foreach ($transactions as $key => $val) {
                $val->to_user_name = '';
                $val->to_user_account = '';
                $val->from_user_name = '';
                $val->from_user_account = '';
                if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                    $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                    $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                    $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                    $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
                }
                $transactions[$key] = $val;
            }
            return $transactions;
        } catch (\Exception $exception) {
            return ['result' => false, 'message' => $exception->getMessage()];
        }
    }

}
