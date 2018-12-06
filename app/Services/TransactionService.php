<?php

namespace App\Services;

use App\User;
use App\Transaction;


class TransactionService {

    /**
     * TransactionService constructor.
     */
    public function __construct()
    {
    }

    public function pointTransferRequest($request) {
        try {
            $fromUserId  = 1; //TODO from logged in user
            $storedPin = 1234; //TODO from logged in user
            $userTotalAmount = 4000; //TODO from logged in user
            $userAccount = $request->user_account;
            if ($request->pin != $storedPin) { //to validate pin
                return ['result' => false, 'data' => 'Invalid PIN'];
            }
            $toUser = (new User())->findByFieldName('user_account', $userAccount);
            if (empty($toUser)) {
                return ['result' => false, 'data' => 'Invalid User Account'];
            }
            $toUserId = $toUser['id'];
            $bool = $this->isValidUserAccount($fromUserId, $toUserId);
            if (!$bool || $toUserId == $fromUserId) {
                return ['result' => false, 'data' => 'Invalid User Account'];
            }
            $pendingAmountResult = (new Transaction())->getTotalRequestedAmount($fromUserId);
            if (($pendingAmountResult['total_amount'] + $request->amount) > $userTotalAmount) { // validate amount
                return ['result' => false, 'data' => 'Insufficient Balance'];
            }
            $transaction = new Transaction();
            $transaction->from_user_id = $fromUserId;
            $transaction->to_user_id = $toUserId;
            $transaction->amount = $request->amount();
            $transaction->request_status = 0;
            $transaction->save();

            return ['result' => true, 'data' => 'Request made successfully'];
        } catch (\Exception $exception) {
            return ['result' => true, 'data' => $exception->getMessage()];
        }


    }

    public function isValidUserAccount($fromUserId, $toUserId) {
        /**
         * toUserId should be direct upline, direct downline or on same level
         */
        $user = new User();
        $directUser = $user->checkDirectUplineOrDownline($fromUserId, $toUserId);
        if (!empty($directUser)) {
            return false;
        }
        if (!$user->isOnSameLevel($fromUserId, $toUserId)) {
            return false;
        }

        return true;
    }
}