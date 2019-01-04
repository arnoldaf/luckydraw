<?php

namespace App\Services;

use App\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use App\UserBid;
use Validator;
use Hash;
use DB;

class AdminBidService {

    /**
     * TransactionService constructor.
     */
    public function __construct()
    {
    }

    public function filterBids($request, $bid_category_id){
      try {
            $result = [];
            $validator = Validator::make($request->all(), [
                'lotteryType'     => 'required',
                'lotteryDate'     => 'required',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $gameId = $request->input('lotteryType');
            $lotteryDate = date('Y-m-d', strtotime(str_replace('/','-',$request->input('lotteryDate'))));
            /*
            $bidResult = UserBid::groupBy('bid_number')
                                ->select('bid_number','sum(amount) as amount')
                                ->where('game_id', '=', $gameId)
                                ->where('bid_category_id', '=', $bid_category_id)
                                ->where('game_date', 'like', $lotteryDate. '%')
                                ->groupBy('bid_number')
                                ->get();
            */
            $sql = "SELECT bid_number, sum(amount) AS amount  FROM user_bid WHERE game_id='$gameId'
                    AND bid_category_id='$bid_category_id' AND game_date='$lotteryDate'  group by
                    bid_number";
            $bidResult = DB::select($sql);
            foreach ($bidResult as $key => $value) {
              $result[$value->bid_number] =  $value;
            }
            return $result;
         }catch (\Exception $exception) {
           return ['result' => false, 'message' => $exception->getMessage()];
        }
     }

     public function getTotalBidByDate($request){
       try {
             $gameId = $request->input('lotteryType');
             $lotteryDate = date('Y-m-d', strtotime(str_replace('/','-',$request->input('lotteryDate'))));
             $totalBid = UserBid::where('game_id', '=', $gameId)
                                 ->where('game_date', 'like', $lotteryDate. '%')
                                 ->whereIn('bid_category_id',[1,2,3])
                                 ->sum('amount');
             return $totalBid;
          }catch (\Exception $exception) {
            return ['result' => false, 'message' => $exception->getMessage()];
         }
      }

      public function maxJodiBid($request,$bid_category_id){
        try {
              $gameId = $request->input('lotteryType');
              $lotteryDate = date('Y-m-d', strtotime(str_replace('/','-',$request->input('lotteryDate'))));

              $sql = "select max(a.amount) as amount from (SELECT bid_number, sum(amount) AS amount  FROM user_bid WHERE game_id='$gameId'
                      AND bid_category_id='$bid_category_id' AND game_date='$lotteryDate'  group by
                      bid_number) as a";
              $bidResult = DB::select($sql);
              return $bidResult[0]->amount;
           }catch (\Exception $exception) {
             return ['result' => false, 'message' => $exception->getMessage()];
          }
       }
       public function minJodiBid($request,$bid_category_id){
         try {
               $gameId = $request->input('lotteryType');
               $lotteryDate = date('Y-m-d', strtotime(str_replace('/','-',$request->input('lotteryDate'))));

               $sql = "select min(a.amount) as amount from (SELECT bid_number, sum(amount) AS amount  FROM user_bid WHERE game_id='$gameId'
                       AND bid_category_id='$bid_category_id' AND game_date='$lotteryDate'  group by
                       bid_number) as a";
               $bidResult = DB::select($sql);
               return $bidResult[0]->amount;
            }catch (\Exception $exception) {
              return ['result' => false, 'message' => $exception->getMessage()];
           }
        }
   }
