<?php

namespace App\Services;

use App\User;
use App\Transaction;
use Illuminate\Support\Facades\Log;

class CommissionPayoutService {

    public function commPayout($gameId, $userId, $totalBidAmount) {

        Log::info("Calculation Started");

        //SELF CALCULATION
        $sqlBidUser = User::select('id as user_id', 'comission')->where('id', '=', $userId)->get();
        foreach ($sqlBidUser as $res) {
            $commAmount = ($totalBidAmount * $res->comission) / 100;
            $user = $res->user_id;
            $amount = $totalBidAmount;
            $commPerent = $res->comission;
            $this->saveCommission($gameId, $user, $user, $commPerent, $amount, $commAmount);
        }
        //End======================
       
        //AM TO DM CALCUATION

        $sqlBidUserDm = User::select('id as user_id', 'parent_id', 'comission')->where('role_id', '=', 3)->where('id', '=', $userId)->get();
        foreach ($sqlBidUserDm as $res) {
            $parentId = $res->parent_id;
            $commSchemeDm = $res->comission;
            $user = $res->user_id;
            $amount = $totalBidAmount;

            $sqlParent = User::select('comission')->where('id', '=', $parentId)->first();
            $commSchemeAM = $sqlParent->comission;
            $commScheme = $commSchemeAM - $commSchemeDm;
            $commAmount = ($amount * $commScheme) / 100;
            $this->saveCommission($gameId, $parentId, $user, $commPerent, $amount, $commAmount);
        }

        //End======================
        //DM TO CL CALCUATION

        $sqlBidUserCl = User::select('id as user_id', 'parent_id', 'comission')->where('role_id', '=', 4)->where('id', '=', $userId)->get();
        foreach ($sqlBidUserCl as $res) {
            $parentId = $res->parent_id;
            $commSchemeCl = $res->comission;
            $user = $res->user_id;
            $amount = $totalBidAmount;

            $sqlParent = User::select('comission')->where('id', '=', $parentId)->first();
            $commSchemeDm = $sqlParent->comission;
            $commScheme = $commSchemeDm - $commSchemeCl;
            $commAmount = ($amount * $commScheme) / 100;

            $this->saveCommission($gameId, $parentId, $user, $commPerent, $amount, $commAmount);
        }
        //End======================
        //AM TO CL CALCUATION


        $sqlBidUserAmCl = User::select('id as user_id', 'parent_id', 'comission')->where('role_id', '=', 4)->where('id', '=', $userId)->get();
        foreach ($sqlBidUserAmCl as $res) {

            $parentId = $res->parent_id;
            $commPerent = $res->comission;
            $user = $res->user_id;
            $amount = $totalBidAmount;

            $sqlParentDm = User::select('parent_id', 'comission')->where('id', '=', $parentId)->first();
            $percentDm = $sqlParentDm->comission;
            $parentDm = $sqlParentDm->parent_id;

            $sqlParentAm = User::select('comission')->where('id', '=', $parentDm)->first();
            $percentAm = $sqlParentAm->comission;
            $clPercent = $percentAm - $percentDm;
            $commAmount = ($amount * $clPercent) / 100;

            $this->saveCommission($gameId, $parentDm, $user, $commPerent, $amount, $commAmount);
        }

    }

    public function getGameDate() {
        $hours = date('H');
        if ($hours > 11) {
            return date("Y-m-d");
        }
        return date("Y-m-d", time() - 86400);
    }

    public function saveCommission($gameId, $parentId, $user, $commPerent, $amount, $commAmount) {
        $gameDate = $this->getGameDate();
        if ($commAmount > 0) {
            $transaction = new Transaction();
            $transaction->to_user_id = $parentId;
            $transaction->from_user_id = $user;
            $transaction->game_id = $gameId;
            $transaction->bid_category_id = 0;
            $transaction->bid_number = 0;
            $transaction->percent = $commPerent;
            $transaction->bid_amount = $amount;
            $transaction->amount = $commAmount;
            $transaction->type = 'commission';
            $transaction->status = 1;
            $transaction->game_date = $gameDate;
            $transaction->save();
        }
    }

}
