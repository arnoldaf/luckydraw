<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use Auth;
use App\Services\UserBidService;

class UserBidController extends Controller
{
    //
    public function getGame() {
        $games = [
            'totalAmount' => Auth::user()->last_balance,
            'games' => (new Game())->getActiveGames()
        ];
        return view('member.member-bid')->with($games);
    }
    
    public function confirmBid(Request $request) {
        return response()->json((new UserBidService())->confirmBidAmount($request, Auth::user()->id));
    }
}
