<?php

namespace App\Services;

use App\Game;
use App\User;
use App\UserBid;
use App\BidCategoryAmount;
use App\Transaction;
use App\DailyDeclareNumber;
use Illuminate\Support\Facades\Log;
use DB;

class WinResultService {

    public function winPayout($id) {
         //echo "<pre>";
        $getGame = Game::where('id', $id)->get();
        $gameDate=date('Y-m-d', strtotime(' -1 day'));

        
        Log::info("Win Calculation Started");
        foreach ($getGame as $game) {
            $gameId = $game->id;
           // die;
            //SELF CALCULATION
            /* DeclareWinResult::whereDate('created_at', date('Y-m-d'))
              ->where('game_id', '=', $gameId)
              ->delete();
             *
             */
            Transaction::where('type', 'win_result')->where('game_id', '=', $gameId)->whereDate('game_date', '=',$gameDate )->delete();

            $sqlDeclareNumber = DailyDeclareNumber::select('number')
                    ->where('game_id', '=',  $gameId)
                    ->where('created_at', '>=', date('Y-m-d'))
                    ->first();
            //print_r($sqlDeclareNumber);
            //die;
            
            $winNumber = $sqlDeclareNumber->number;

            //die;
            $firstNumber = substr($winNumber, 0, 1);
            $lastNumber = substr($winNumber, -1);

            $sqlBidUser = UserBid::join('users', 'users.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'bid_category_id', 'bid_number', 'amount as played_amount', 'comission', 'game_date')
                    ->where('game_id', '=', $gameId)
                   // ->where('amount', '!=', 0)
                    ->where('user_bid.game_date', '=', $gameDate)
                    ->get();
           // print_r($sqlBidUser);
           // die;

            foreach ($sqlBidUser as $res) {
                $user = $res->user_id;
                $bidNumber = $res->bid_number;
                $gameId = $res->game_id;
                $bidCategoryId = $res->bid_category_id;
                $amount = $res->played_amount;

                $sqlWinPercentage = BidCategoryAmount::select('multiply')
                        ->where('game_id', '=', $gameId)
                        ->where('bid_category_id', '=', $bidCategoryId)
                        ->first();

                $winPercentage = $sqlWinPercentage->multiply;
                if ($bidNumber == $winNumber) {
                    $winAmount = ($res->played_amount * $winPercentage);
                    // $insertResult = "INSERT INTO declare_win_result (uid, game_id, bid_category_id, bid_number,  bid_amount, win_amount)"
                    // . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount )";
                    $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status, game_date)"
                    . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result', 1, '$gameDate' )";
                    $resWin = DB::insert(DB::raw($insertResult));
                    
                    $useBalance = User::where('id', $user)->first();
                    $lastBalance = $useBalance->last_balance;
                    
                    $updateBalance = User::find($user);
                    $updateBalance->last_balance = $lastBalance+$winAmount;
                    $updateBalance->save();
                    
                    
                    
                }

               if ($bidNumber == $firstNumber) {
                    $winAmount = ($res->played_amount * $winPercentage);
                    $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status, game_date)"
                    . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result', 1, '$gameDate' )";
                    //$insertResult = "INSERT INTO declare_win_result (uid, game_id, bid_category_id, bid_number,  bid_amount, win_amount)"
                    // . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount )";
                    $resWin = DB::insert(DB::raw($insertResult));
                    
                    $useBalance = User::where('id', $user)->first();
                    $lastBalance = $useBalance->last_balance;
                    
                    $updateBalance = User::find($user);
                    $updateBalance->last_balance = $lastBalance+$winAmount;
                    $updateBalance->save();
                }

                if ($bidNumber == $lastNumber) {
                    $winAmount = ($res->played_amount * $winPercentage);
                    $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status, game_date)"
                    . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result', 1, '$gameDate' )";
                    // $insertResult = "INSERT INTO declare_win_result (uid, game_id, bid_category_id, bid_number,  bid_amount, win_amount)"
                    // . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount )";
                    $resWin = DB::insert(DB::raw($insertResult));
                    
                    $useBalance = User::where('id', $user)->first();
                    $lastBalance = $useBalance->last_balance;
                    
                    $updateBalance = User::find($user);
                    $updateBalance->last_balance = $lastBalance+$winAmount;
                    $updateBalance->save();
                }
                //die;
            }

            DB::table('daily_declare_number')
                    ->where('game_id', $id)
                    ->where('declare_date', date('Y-m-d'))
                    ->update(['status' => 1]);
            
            Log::info("Calculation End");
        }
    }

}
