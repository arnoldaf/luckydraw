<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBidController extends Controller
{
    //
    public function getGame() {
        $games = [
            'totalAmount' => 2500,
            'games' => [
                '0' => ['id' => '1', 'name'=>'Disawar'],
                '1' => ['id' => '2', 'name'=>'Gali'],
                '2' => ['id' => '3', 'name'=>'Ghaziabad'],
            ]
        ];
        return view('member.member-bid')->with($games);
    }
}
