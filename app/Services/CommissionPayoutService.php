<?php

namespace App\Services;

use App\Game;
use App\Users;
use App\UserBid;
use App\CommissionCalculation;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\DB;
use DB;

class CommissionPayoutService {

    public function commPayout() {
        $getGame = Game::get();
        Log::info("Calculation Started");
        CommissionCalculation::whereDate('created_at', date('Y-m-d'))->delete();

        foreach ($getGame as $game) {
            $gameId = $game->id;

            //SELF CALCULATION

            $sqlBidUser = UserBid::join('user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'amount as played_amount', 'commission_scheme')
                    ->get();

            foreach ($sqlBidUser as $res) {
                $commAmount = ($res->played_amount * $res->commission_scheme) / 100;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;
                $commPerent = $res->commission_scheme;

                $insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                        . " VALUES ($user, $gameId, $user, $commPerent, $amount, $commAmount )";
                $resComm = DB::insert(DB::raw($insertComm));
            }

            //End======================
            //AM TO DM CALCUATION

            $sqlBidUserDm = UserBid::join('user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'parent_id', 'amount as played_amount', 'commission_scheme')
                    ->where('user.role_id', '=', 3)
                    ->where('game_id', '=', $gameId)
                    ->get();

            foreach ($sqlBidUserDm as $res) {
                $parentId = $res->parent_id;
                $commSchemeDm = $res->commission_scheme;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;

                $sqlParent = Users::select('commission_scheme')
                        ->where('id', '=', $parentId)
                        ->first();
                $commSchemeAM = $sqlParent->commission_scheme;
                $commScheme = $commSchemeAM - $commSchemeDm;
                $commAmount = ($amount * $commScheme) / 100;

                $insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                        . " VALUES ($parentId, $gameId, $user, $commSchemeDm, $amount, $commAmount )";
                $resComm = DB::insert(DB::raw($insertComm));
            }

            //End======================
            //DM TO CL CALCUATION

            $sqlBidUserCl = UserBid::join('user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'parent_id', 'amount as played_amount', 'commission_scheme')
                    ->where('user.role_id', '=', 4)
                    ->where('game_id', '=', $gameId)
                    ->get();

            foreach ($sqlBidUserCl as $res) {
                $parentId = $res->parent_id;
                $commSchemeCl = $res->commission_scheme;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;

                $sqlParent = Users::select('commission_scheme')
                        ->where('id', '=', $parentId)
                        ->first();
                $commSchemeDm = $sqlParent->commission_scheme;
                $commScheme = $commSchemeDm - $commSchemeCl;

                $commAmount = ($amount * $commScheme) / 100;

                $insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                        . " VALUES ($parentId, $gameId, $user, $commSchemeCl, $amount, $commAmount )";
                $resComm = DB::insert(DB::raw($insertComm));
            }
            //End======================
            //AM TO CL CALCUATION


            $sqlBidUserAmCl = UserBid::join('user', 'user.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'parent_id', 'amount as played_amount', 'commission_scheme')
                    ->where('user.role_id', '=', 4)
                    ->where('game_id', '=', $gameId)
                    ->get();

            foreach ($sqlBidUserAmCl as $res) {

                $parentId = $res->parent_id;
                $commPerent = $res->commission_scheme;
                $user = $res->user_id;
                $gameId = $res->game_id;
                $amount = $res->played_amount;

                $sqlParentDm = Users::select('parent_id', 'commission_scheme')
                        ->where('id', '=', $parentId)
                        ->first();
                $percentDm = $sqlParentDm->commission_scheme;
                $parentDm = $sqlParentDm->parent_id;

                $sqlParentAm = Users::select('commission_scheme')
                        ->where('id', '=', $parentDm)
                        ->first();
                $percentAm = $sqlParentAm->commission_scheme;
                $clPercent = $percentAm - $percentDm;
                $commAmount = ($amount * $clPercent) / 100;

                $insertComm = "INSERT INTO commission_calculation (uid, game_id, from_id,  percent, on_amount, commission)"
                        . " VALUES ($parentDm, $gameId, $user, $commPerent, $amount, $commAmount )";
                $resComm = DB::insert(DB::raw($insertComm));
            }
            //End======================
             Log::info("Calculation End");
            die;
        }
    }

}
