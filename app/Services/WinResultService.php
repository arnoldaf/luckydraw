<?php

namespace App\Services;

use App\Game;
use App\User;
use App\UserBid;
use App\BidCategoryAmount;
use App\Transaction;
use App\DailyDeclareNumber;
use Illuminate\Support\Facades\Log;
use DB;

class WinResultService {

    public function winPayout($id) {
        $game = DailyDeclareNumber::find($id);
        $gameDate = $game->declare_date;
        $gameId = $game->game_id;
        Log::info("Win Calculation Started");
        //foreach ($gamePayout as $game) {
        Transaction::where('type', 'win_result')->where('game_id', '=', $gameId)->whereDate('game_date', '=', $gameDate)->delete();
        $sqlDeclareNumber = DailyDeclareNumber::select('number')
                ->where('game_id', '=', $gameId)
                ->where('declare_date', $gameDate)
                ->first();
        $winNumber = $sqlDeclareNumber->number;
        $firstNumber = substr($winNumber, 0, 1);
        $lastNumber = substr($winNumber, -1);
        $sqlBidUser = UserBid::join('users', 'users.id', '=', 'user_bid.user_id')
                ->select('user_id', 'game_id', 'bid_category_id', 'bid_number', 'amount as played_amount', 'comission', 'game_date')
                ->where('game_id', '=', $gameId)
                ->where('user_bid.game_date', '=', $gameDate)
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
                
                $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status, game_date)"
                        . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result', 1, '$gameDate' )";
                $resWin = DB::insert(DB::raw($insertResult));

                $useBalance = User::where('id', $user)->first();
                $lastBalance = $useBalance->last_balance;
                $updateBalance = User::find($user);
                $updateBalance->last_balance = $lastBalance + $winAmount;
                $updateBalance->save();
            }

            if ($bidNumber == $firstNumber) {
                $winAmount = ($res->played_amount * $winPercentage);
                $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status, game_date)"
                        . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result', 1, '$gameDate' )";
                
                $resWin = DB::insert(DB::raw($insertResult));

                $useBalance = User::where('id', $user)->first();
                $lastBalance = $useBalance->last_balance;

                $updateBalance = User::find($user);
                $updateBalance->last_balance = $lastBalance + $winAmount;
                $updateBalance->save();
            }

            if ($bidNumber == $lastNumber) {
                $winAmount = ($res->played_amount * $winPercentage);
                $insertResult = "INSERT INTO transactions (to_user_id, game_id, bid_category_id, bid_number,  bid_amount, amount, type, status, game_date)"
                        . " VALUES ($user, $gameId, $bidCategoryId, $bidNumber, $amount, $winAmount, 'win_result', 1, '$gameDate' )";
                
                $resWin = DB::insert(DB::raw($insertResult));

                $useBalance = User::where('id', $user)->first();
                $lastBalance = $useBalance->last_balance;

                $updateBalance = User::find($user);
                $updateBalance->last_balance = $lastBalance + $winAmount;
                $updateBalance->save();
            }
        }
        DB::table('daily_declare_number')
                ->where('game_id', $game->game_id)
                ->where('id', $game->id)
                ->where('declare_date', $gameDate)
                ->update(['status' => 1]);
        Log::info("Calculation End");
        return ['result' => 'suceess', 'declare_date' => $gameDate];
    }

}
