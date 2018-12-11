<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Http\Controllers\UserController;

class TransactionController extends Controller
{
    //
    public function pointTransfer() {
        $userId = (new UserController())->getCurrentUserId(); //TODO logged in id
        $requests['receivables'] = (new TransactionService())->getReceivableRecords($userId);
        $requests['transferable'] = (new TransactionService())->getTransferableRecords($userId);
        //dd($requests['transferable']);
        return view('member.point-transfer')->with($requests);
    }

    public function pointTransferRequest(Request $request) {
        return response()->json((new TransactionService())->pointTransferRequest($request));
    }

    public function pointTransferCancel(Request $request) {
        return response()->json((new TransactionService())->pointTransferCancel($request));
    }

    public function pointTransferUpdate(Request $request) {
        return response()->json((new TransactionService())->pointTransferUpdate($request));
    }
}
