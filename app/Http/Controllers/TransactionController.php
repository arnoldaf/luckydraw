<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    //
    public function pointTransfer() {
        return view('member.point-transfer');
    }

    public function pointTransferRequest(Request $request) {
        dd($request);
        $result = (new TransactionService())->pointTransferRequest($request);
    }
}
