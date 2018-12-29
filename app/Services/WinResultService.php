<?php

namespace App\Services;

use App\Game;
use App\UserBid;
use App\BidCategoryAmount;
use App\Transaction;
use App\DailyDeclareNumber;
use Illuminate\Support\Facades\Log;
use DB;

class WinResultService {

    public function winPayout($id) {
        // echo "<pre>";
        $getGame = Game::where('id', $id)->get();

        
        Log::info("Win Calculation Started");
        foreach ($getGame as $game) {
            $gameId = $game->id;
            //SELF CALCULATION
            /* DeclareWinResult::whereDate('created_at', date('Y-m-d'))
              ->where('game_id', '=', $gameId)
              ->delete();
             *
             */
            Transaction::where('type', 'win_result')->where('game_id', '=', $gameId)->whereDate('created_at', date('Y-m-d'))->delete();

            $sqlDeclareNumber = DailyDeclareNumber::select('number')
                    ->where('game_id', '=', $gameId)
                    ->where('created_at', '>=', date('Y-m-d'))
                    ->first();
            $winNumber = $sqlDeclareNumber->number;


            $firstNumber = substr($winNumber, 0, 1);
            $lastNumber = substr($winNumber, -1);

            $sqlBidUser = UserBid::join('users', 'users.id', '=', 'user_bid.user_id')
                    ->select('user_id', 'game_id', 'bid_category_id', 'bid_number', 'amount as played_amount', 'comission')
                    ->where('game_id', '=', $gameId)
                    ->where('amount', '!=', 0)
                    ->where('user_bid.created_at', '>=', date('Y-m-d'))
                    ->get();

            foreach ($sqlBidUser as $res) {
                $user = $res->user_id;
                $bidNumber = $res->bid_number;
                $gameId = $res->game_id;
                $bidCategoryId = $res->bid_category_id;
                $amount = $res->played_amount;

                $sqlWinPercentage = BidCategoryAmount::select('multiply')
                        ->where('game_id', '=', $gameId)
                        ->where('bid_category_id', '=', $bidCategoryId)
                        ->first();

                $winPercentage = $sqlWinPercentage->multiply;
                if ($bidNumber == $winNumber) {
                    $winAmount = ($res->played_amount * $winPercentage);
                    // $insertResult = "INSERT INTO declare_win_result (uid, game_id, bid_category_id, bid_number,  bid_amount, win_amount)"
                    // . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount )";
                    $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status)"
                    . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result', 1 )";
                    $resWin = DB::insert(DB::raw($insertResult));
                }

               if ($bidNumber == $firstNumber) {
                    $winAmount = ($res->played_amount * $winPercentage);
                    $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status)"
                    . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result',1 )";
                    //$insertResult = "INSERT INTO declare_win_result (uid, game_id, bid_category_id, bid_number,  bid_amount, win_amount)"
                    // . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount )";
                    $resWin = DB::insert(DB::raw($insertResult));
                }

                if ($bidNumber == $lastNumber) {
                    $winAmount = ($res->played_amount * $winPercentage);
                    $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status)"
                    . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result',1 )";
                    // $insertResult = "INSERT INTO declare_win_result (uid, game_id, bid_category_id, bid_number,  bid_amount, win_amount)"
                    // . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount )";
                    $resWin = DB::insert(DB::raw($insertResult));
                }
                
            }

            DB::table('daily_declare_number')
                    ->where('game_id', $id)
                    ->where('declare_date', date('Y-m-d'))
                    ->update(['status' => 1]);
            
            Log::info("Calculation End");
        }
    }

}
