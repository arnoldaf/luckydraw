<?php

namespace App\Services;

use App\UserBid;
use App\User;
use App\Services\CommissionPayoutService;

class UserBidService {

    /**
     * UserBidService constructor.
     */
    public function __construct() {
        
    }

    public function confirmBidAmount($request, $userId) {
        $userBids = [];
        $totalBidAmount = 0;
        $currentUser = User::find($userId);
        $gameDate = $this->getGameDate();
        foreach ($request['games'] as $key => $game) {
            // (new CommissionPayoutService())->commPayout($game['gameId'], $userId, $game['bidAmount']);
            $totalBidAmount += $game['bidAmount'];
            $userBids[] = [
                'user_id' => $userId,
                'game_id' => $game['gameId'],
                'bid_category_id' => $game['categoryId'],
                'bid_number' => $game['bidNum'],
                'amount' => $game['bidAmount'],
                'is_deleted' => 0,
                'game_date' => $gameDate
            ];
        }
        
        /*Comm Payout*/
        $groups = array();
        foreach ($userBids as $item) {
            $key = $item['game_id'];
            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'game_id' => $item['game_id'],
                    'user_id' => $item['user_id'],
                    'amount' => $item['amount'],
                );
            } else {
                $groups[$key]['amount'] = $groups[$key]['amount'] + $item['amount'];
            }
        }
        foreach ($groups as $gameGroups) {
            (new CommissionPayoutService())->commPayout($gameGroups['game_id'], $gameGroups['user_id'], $gameGroups['amount']);
        }
        /*End Comm Payout*/
      
        if ($currentUser->last_balance < $totalBidAmount) {
            return ['result' => false, 'message' => "Don't have sufficient balance "];
        }

        if (!(new UserBid())->saveMultiple($userBids)) {
            return ['result' => false, 'message' => 'Sorry! Try again later'];
        }
        //save into transaction
        $transaction = new \App\Transaction();
        $transaction->to_user_id = $userId;
        $transaction->from_user_id = $userId;
        $transaction->game_id = 0;
        $transaction->bid_category_id = 0;
        $transaction->bid_number = 0;
        $transaction->percent = 0;
        $transaction->bid_amount = $totalBidAmount;
        $transaction->amount = $totalBidAmount;
        $transaction->type = 'bid';
        $transaction->status = 1;
        $transaction->game_date = $gameDate;
        $transaction->save();
        //to deduct bid amount from user last balance
        $currentUser->last_balance = ($currentUser->last_balance - $totalBidAmount);
        $currentUser->save();

        //(new CommissionPayoutService())->commPayout($userId, $totalBidAmount);

        return ['result' => true, 'message' => 'Bid placed successfully'];
    }

    public function getGameDate() {
        $hours = date('H');
        if ($hours > 11) {
            return date("Y-m-d");
        }
        return date("Y-m-d", time() - 86400);
    }

}
