<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    //
    public function pointTransfer() {
        $userId = 1; //TODO logged in id
        $receivables['receivables'] = (new TransactionService())->getReceivableRecords($userId);
        //dd($receivables);
        return view('member.point-transfer')->with($receivables);
    }

    public function pointTransferRequest(Request $request) {
        return response()->json((new TransactionService())->pointTransferRequest($request));
    }
}
