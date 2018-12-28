<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Controllers\UserController;
use App\Role;

class AdminBidController extends Controller
{

   public function index() {
        //$requests['user'] = (new UserController())->getCurrentUser();
        //$requests['roles'] = Role::where('id', '<>','1')->get();
        $requests = [];
        return view('admin.bids.index')->with($requests);
    }


}
