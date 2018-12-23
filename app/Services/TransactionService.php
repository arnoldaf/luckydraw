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
            $fromUserId  = $currentUser->id;
            $storedPin = $currentUser->pin;
            $userTotalAmount = $currentUser->last_balance;
            $userAccount = $request->user_account;
            if ($request->pin != (String)$storedPin) { //to validate pin
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
            //$pendingAmountResult = (new Transaction())->getTotalRequestedAmount($fromUserId);
            if ( $request->amount > $userTotalAmount) { // validate amount
                return ['result' => false, 'message' => 'Insufficient Balance'];
            }
            $transaction = new Transaction();
            $transaction->from_user_id = $fromUserId;
            $transaction->to_user_id = $toUserId;
            $transaction->amount = $request->amount;
            $transaction->status = 0;
            $transaction->type = "transfer";
            $transaction->save();
            //to deduct this requested amount from user account
            $user = User::find($fromUserId);
            $user->last_balance = $user->last_balance - $request->amount;
            $user->save();

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
        $fromUserId = (new UserController())->getCurrentUserId();
        $ids = $request->ids;
        $sumTransferAmountObj = (new Transaction())->getSumTransferRequestedPoint($fromUserId, $ids);
        if ((new Transaction())->cancelTransferRequest($ids, $fromUserId) > 0) {
            $user = User::find($fromUserId);
            $user->last_balance = $user->last_balance + $sumTransferAmountObj['total_amount'];
            $user->save();

            return ['result' => true, 'message' => 'Request canceled successfully'];
        }

        return ['result' => false, 'message' => 'Sorry! Try again later'];
    }

    public function pointTransferUpdate($request) {
        $loggedInUser = (new UserController())->getCurrentUser();
        $toUserId = $loggedInUser->id;
        
        if ((String)$loggedInUser->pin != $request->pin) {
             return ['result' => false, 'message' => 'Please enter valid pin'];
        }
        $ids = $request->ids;
        $status = $request->status;
        if ($status == '') {
            return ['result' => false, 'message' => 'Status required'];
        }
        if ($status == 'accept') { // need to update user's balance
            $sumAmount = (new Transaction())->getSumRequestedPoint($toUserId, $ids); //get sum of requested point
        }
        if ((new Transaction())->updateTransferRequest($ids, $toUserId, $status) > 0) {
            if ($status == 'accept') {
                $user = User::find($toUserId);
                $user->last_balance = $user->last_balance + $sumAmount['total_amount'];
                $user->save();
            } else { // case of reject
                // need to add back amount to sender account
                for ($i=0; $i < count($ids); $i++) {
                    $fromUser = Transaction::where(['id' =>$ids[$i], 'to_user_id' => $toUserId, 'type' => 'transfer'])->first();
                    $fromUserDetail = User::find($fromUser->from_user_id);
                    $fromUserDetail->last_balance = $fromUserDetail->last_balance + $fromUser->amount;
                    $fromUserDetail->save();
                }
            }

            return ['result' => true, 'message' => 'Request updated successfully'];
        }

        return ['result' => false, 'message' => 'Sorry! Try again later'];
    }
}
