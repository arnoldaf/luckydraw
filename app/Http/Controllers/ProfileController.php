<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Role;

class ProfileController extends Controller {

    public function profileUpdate() {
        $requests['user'] = (new UserController())->getCurrentUser();
        $requests['roles'] = Role::where('id', '<>', '1')->get();
        return view('member.profile')->with($requests);
    }

    public function updateProfileRequest(Request $request) {
        return ((new ProfileService())->updateProfileRequest($request));
    }

    public function gameResult() {
        $requests['user'] = '';
        return view('member.game-results')->with($requests);
    }

    public function passwords() {
        $requests['user'] = (new UserController())->getCurrentUser();
        return view('member.passwords')->with($requests);
    }

    public function passwordsUpdateRequest(Request $request) {
        return response()->json((new ProfileService())->passwordsUpdateRequest($request));
    }

    public function pinUpdateRequest(Request $request) {
        return response()->json((new ProfileService())->pinUpdateRequest($request));
    }

    public function pointsHistory() {

        $currentUser = (new UserController())->getCurrentUserId();
        $transactions = (new GameController())->indexMemberPointTransaction($currentUser);
        return View('member.points-history', compact('currentUser', 'transactions'));
    }

    public function bidsHistory() {

        $currentUser = (new UserController())->getCurrentUserId();
        $bids = (new GameController())->indexMemberGameBids($currentUser);
        return View('member.bids-history', compact('currentUser', 'bids'));
    }

}
