<?php

namespace App\Services;

use App\UserBid;
use App\User;

class UserBidService {

    /**
     * UserBidService constructor.
     */
    public function __construct()
    {
    }
    
    public function confirmBidAmount($request, $userId) {
        $userBids = [];
        $totalBidAmount = 0;
        $currentUser = User::find($userId);
        foreach($request['games'] as $key => $game) {
            $totalBidAmount += $game['bidAmount'];
            $userBids[] = [
                'user_id' => $userId,
                'game_id' => $game['gameId'],
                'bid_category_id' => $game['categoryId'],
                'bid_number' => $game['bidNum'],
                'amount' => $game['bidAmount'],
                'is_deleted' => 0
            ];
        }
        if ($currentUser->last_balance < $totalBidAmount) {
            return ['result' => false, 'message' => "Don't have enough balance "];
        }
        
        if(!(new UserBid())->saveMultiple($userBids)){
            return ['result' => false, 'message' => 'Sorry! Try again later'];
        }
        //to deduct bid amount from user last balance
        $currentUser->last_balance = ($currentUser->last_balance - $totalBidAmount);
        $currentUser->save();
        
        return ['result' => true, 'message' => 'Bid placed successfully'];
    }
}