<?php

namespace App\Services;

use App\User;


class TransactionService {

    /**
     * TransactionService constructor.
     */
    public function __construct()
    {
    }

    public function pointTransferRequest($request) {
        dd($request);
        $fromUserId  = 1; //TODO from logged in user
        $userAcount = $request->user_account;
        $toUserId = User::findByUserAccount($userAcount);
        die($toUserId);
        //to validate userAcount should be on same level or direct upline or direct downline
        $bool = isValidUserAccount($fromUserId, $toUserId);
    }
}