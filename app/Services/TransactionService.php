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
                return ['result' => false, 'message' => 'Invalid PIN'];
            }
            $toUser = (new User())->findByFieldName('user_account', $userAccount);
            if (empty($toUser)) {
                return ['result' => false, 'message' => 'Invalid User Account'];
            }
            $toUserId = $toUser[0]['id'];
            $bool = $this->isValidUserAccount($fromUserId, $toUserId);
            if (!$bool || $toUserId == $fromUserId) {
                return ['result' => false, 'message' => 'Invalid User Account'];
            }
            $pendingAmountResult = (new Transaction())->getTotalRequestedAmount($fromUserId);
            if (($pendingAmountResult['total_amount'] + $request->amount) > $userTotalAmount) { // validate amount
                return ['result' => false, 'message' => 'Insufficient Balance'];
            }
            $transaction = new Transaction();
            $transaction->from_user_id = $fromUserId;
            $transaction->to_user_id = $toUserId;
            $transaction->amount = $request->amount;
            $transaction->request_status = 0;
            $transaction->save();

            return ['result' => true, 'message' => 'Request made successfully'];
        } catch (\Exception $exception) {
            return ['result' => false, 'message' => $exception->getMessage()];
        }


    }

    public function isValidUserAccount($fromUserId, $toUserId) {
        /**
         * toUserId should be direct upline, direct downline or on same level
         */
        $user = new User();
        $directUser = $user->checkDirectUplineOrDownline($fromUserId, $toUserId);
        if (!empty($directUser)) {
            return true;
        }
        if ($user->isOnSameLevel($fromUserId, $toUserId)) {
            return true;
        }

        return false;
    }

    public function getReceivableRecords($userId) {
        return (new Transaction())->getReceivableRecords($userId);
    }
}