<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use Auth;

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
}
