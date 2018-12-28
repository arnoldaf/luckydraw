<?php

namespace App\Services;

use App\Game;
use App\User;
use App\Transaction;
use App\UserBid;
use App\CommissionCalculation;
use Illuminate\Support\Facades\Log;
use DB;

class CommissionPayoutService {

    public function commPayout() {
        $getGame = Game::get();
        Log::info("Calculation Started");
        Transaction::where('type', 'commission')->whereDate('created_at', date('Y-m-d'))->delete();

        foreach ($getGame as $game) {
            $gameId = $game->id;
            //SELF CALCULATION

            $sqlBidUser = UserBid::join('users as user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'amount as played_amount', 'comission')
                    ->where('game_id', '=', $gameId)
                    ->get();
           // print_r($sqlBidUser);

            foreach ($sqlBidUser as $res) {
                $commAmount = ($res->played_amount * $res->comission) / 100;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;
                $commPerent = $res->comission;
                 $insertComm = "INSERT INTO transactions (to_user_id, game_id, from_user_id,  percent, bid_amount, amount, type)"
                        . " VALUES ($user, $gameId, $user, $commPerent, $amount, $commAmount, 'commission' )";
               // $insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                       // . " VALUES ($user, $gameId, $user, $commPerent, $amount, $commAmount )";
                $resComm = DB::insert(DB::raw($insertComm));
            }



            //End======================
            //AM TO DM CALCUATION

            $sqlBidUserDm = UserBid::join('users as user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'parent_id', 'amount as played_amount', 'comission')
                    ->where('user.role_id', '=', 3)
                    ->where('game_id', '=', $gameId)
                    ->get();

            foreach ($sqlBidUserDm as $res) {
                $parentId = $res->parent_id;
                $commSchemeDm = $res->comission;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;

                $sqlParent = User::select('comission')
                        ->where('id', '=', $parentId)
                        ->first();
                $commSchemeAM = $sqlParent->comission;
                $commScheme = $commSchemeAM - $commSchemeDm;
                $commAmount = ($amount * $commScheme) / 100;

                //$insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                       // . " VALUES ($parentId, $gameId, $user, $commSchemeDm, $amount, $commAmount )";
                $insertComm = "INSERT INTO transactions (to_user_id, game_id, from_user_id,  percent, bid_amount, amount, type)"
                        . " VALUES ($parentId, $gameId, $user, $commPerent, $amount, $commAmount, 'commission' )";
                $resComm = DB::insert(DB::raw($insertComm));
            }

            //End======================
            //DM TO CL CALCUATION

            $sqlBidUserCl = UserBid::join('users as user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'parent_id', 'amount as played_amount', 'comission')
                    ->where('user.role_id', '=', 4)
                    ->where('game_id', '=', $gameId)
                    ->get();

            foreach ($sqlBidUserCl as $res) {
                $parentId = $res->parent_id;
                $commSchemeCl = $res->comission;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;

                $sqlParent = User::select('comission')
                        ->where('id', '=', $parentId)
                        ->first();
                $commSchemeDm = $sqlParent->comission;
                $commScheme = $commSchemeDm - $commSchemeCl;

                $commAmount = ($amount * $commScheme) / 100;

                //$insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                       // . " VALUES ($parentId, $gameId, $user, $commSchemeCl, $amount, $commAmount )";
                $insertComm = "INSERT INTO transactions (to_user_id, game_id, from_user_id,  percent, bid_amount, amount, type)"
                        . " VALUES ($parentId, $gameId, $user, $commPerent, $amount, $commAmount, 'commission' )";
                $resComm = DB::insert(DB::raw($insertComm));
            }
            //End======================
            //AM TO CL CALCUATION


            $sqlBidUserAmCl = UserBid::join('users as user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'parent_id', 'amount as played_amount', 'comission')
                    ->where('user.role_id', '=', 4)
                    ->where('game_id', '=', $gameId)
                    ->get();

            foreach ($sqlBidUserAmCl as $res) {

                $parentId = $res->parent_id;
                $commPerent = $res->comission;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;

                $sqlParentDm = User::select('parent_id', 'comission')
                        ->where('id', '=', $parentId)
                        ->first();
                $percentDm = $sqlParentDm->comission;
                $parentDm = $sqlParentDm->parent_id;

                $sqlParentAm = User::select('comission')
                        ->where('id', '=', $parentDm)
                        ->first();
                $percentAm = $sqlParentAm->comission;
                $clPercent = $percentAm - $percentDm;
                $commAmount = ($amount * $clPercent) / 100;

                //$insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                       // . " VALUES ($parentDm, $gameId, $user, $commPerent, $amount, $commAmount )";
                $insertComm = "INSERT INTO transactions (to_user_id, game_id, from_user_id,  percent, bid_amount, amount, type)"
                        . " VALUES ($parentDm, $gameId, $user, $commPerent, $amount, $commAmount, 'commission' )";
                $resComm = DB::insert(DB::raw($insertComm));
            }
            //End======================



            Log::info("Calculation End");
            //die;
        }
    }



}
