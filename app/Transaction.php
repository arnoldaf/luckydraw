<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    //

    /**
     * To get sum amount of pending request by user id
     * @param $userId
     * @return Array
     */
    public function getTotalRequestedAmount($userId) {
        return $this::select(DB::raw("sum(amount) as total_amount"))
            ->where(['from_user_id' => $userId, 'status' => 0, 'type' => 'transfer'])
            ->first()
            ->toArray();
    }

    public function getReceivableRecords($userId) {
        return DB::table('transactions')
                    ->join('users', 'transactions.from_user_id', '=', 'users.id')
                    ->select('transactions.id', 'transactions.amount', 'transactions.created_at', 'users.user_account')
                    ->where(['to_user_id' => $userId, 'status' => 0, 'type' => 'transfer'])
                    ->get();
    }

    public function getTransferableRecords($userId) {
        return DB::table('transactions')
            ->join('users', 'transactions.to_user_id', '=', 'users.id')
            ->select('transactions.id', 'transactions.amount', 'transactions.created_at', 'users.user_account')
            ->where(['from_user_id' => $userId, 'status' => 0, 'type' => 'transfer'])
            ->get();
    }

    public function cancelTransferRequest($ids, $fromUserId) {
        return $this::whereIn('id', $ids)
                    ->where(['from_user_id' => $fromUserId, 'status' => 0, 'type' => 'transfer'])
                    ->delete();
    }

    public function updateTransferRequest($ids, $toUserId, $status) {
        $statusBool = ($status == 'accept') ? 1 : 2;
        return $this::whereIn('id', $ids)
            ->where(['to_user_id' => $toUserId, 'type' => 'transfer'])
            ->update(['status' => $statusBool]);
    }

    public function getSumRequestedPoint($toUserId, $ids) {
        return $this::select(DB::raw("sum(amount) as total_amount"))
                ->whereIn('id', $ids)
                ->where(['to_user_id' => $toUserId, 'status' => 0, 'type' => 'transfer'])
                ->first()
                ->toArray();
    }

    public function getSumTransferRequestedPoint($fromUserId, $ids) {
        return $this::select(DB::raw("sum(amount) as total_amount"))
            ->whereIn('id', $ids)
            ->where(['from_user_id' => $fromUserId, 'status' => 0, 'type' => 'transfer'])
            ->first()
            ->toArray();
    }
}
