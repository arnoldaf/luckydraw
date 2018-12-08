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
            ->where(['from_user_id' => $userId, 'request_status' => 0])
            ->first()
            ->toArray();
    }

    public function getReceivableRecords($userId) {
        return DB::table('transactions')
                    ->join('users', 'transactions.from_user_id', '=', 'users.id')
                    ->select('transactions.id', 'transactions.amount', 'transactions.created_at', 'users.user_account')
                    ->where(['to_user_id' => $userId, 'request_status' => 0])
                    ->get();
    }
}
