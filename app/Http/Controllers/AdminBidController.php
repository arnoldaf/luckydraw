<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\AdminBidService;
use App\Http\Controllers\UserController;
use App\Role;
use Validator;
use DB;

class AdminBidController extends Controller
{
   public function index() {
        $requests = [];
        return view('admin.bids.index')->with($requests);
    }
    public function filterBids(Request $request) {
         $jodiResult  = (new AdminBidService())->filterBids($request,$bid_category_id=1);
         $andarResult = (new AdminBidService())->filterBids($request,$bid_category_id=2);
         $baharResult = (new AdminBidService())->filterBids($request,$bid_category_id=3);
         $totalBid    = (new AdminBidService())->getTotalBidByDate($request);
         $maxJodiBid  = (new AdminBidService())->maxJodiBid($request,$bid_category_id=1);
         $minJodiBid  = (new AdminBidService())->minJodiBid($request,$bid_category_id=1);
         $bidResult      = (new AdminBidService())->bidResult($request);
         $data['result'] = $jodiResult;
         $data['andarResult'] = $andarResult;
         $data['baharResult'] = $baharResult;
         $data['totalBid'] = $totalBid;
         $data['maxJodiBid'] = $maxJodiBid;
         $data['minJodiBid'] = $minJodiBid;
         $data['bidResult'] = $bidResult;
         return view('admin.bids.index')->with($data);
     }
}
