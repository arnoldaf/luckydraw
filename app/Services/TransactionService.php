<?php

namespace App\Services;

use App\User;
use App\Transaction;
use App\Http\Controllers\UserController;


class TransactionService {

    /**
     * TransactionService constructor.
     */
    public function __construct()
    {
    }

    public function pointTransferRequest($request) {
        try {
            $currentUser = (new UserController())->getCurrentUser();
            $fromUserId  = $currentUser->id; //TODO userId of logged in user
            $storedPin = $currentUser->pin; //TODO pin of logged in user
            $userTotalAmount = $currentUser->last_balance; //TODO total_balance of logged in user
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

            return ['result' => true, 'message' => 'Request made successfully', 'data' => $transaction];
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

    public function getTransferableRecords($userId) {
        return (new Transaction())->getTransferableRecords($userId);
    }

    public function pointTransferCancel($request) {
        $fromUserId = (new UserController())->getCurrentUserId(); //TODO logged In userId
        $ids = $request->ids;
        if ((new Transaction())->cancelTransferRequest($ids, $fromUserId) > 0) {
            return ['result' => true, 'message' => 'Request canceled successfully'];
        }

        return ['result' => false, 'message' => 'Sorry! Try again later'];
    }

    public function pointTransferUpdate($request) {
        $toUserId = (new UserController())->getCurrentUserId(); //TODO logged In userId
        $ids = $request->ids;
        $status = $request->status;
        if ($status == 'accept') { // need to update user's balance
            $sumAmount = (new Transaction())->getSumRequestedPoint($toUserId, $ids); //get sum of requested point
        }
        if ((new Transaction())->updateTransferRequest($ids, $toUserId, $status) > 0) {
            if ($status == 'accept') {
                $user = User::find($toUserId);
                $user->last_balance = $user->last_balance + $sumAmount['total_amount'];
                $user->save();
            }

            return ['result' => true, 'message' => 'Request updated successfully'];
        }

        return ['result' => false, 'message' => 'Sorry! Try again later'];
    }
}
