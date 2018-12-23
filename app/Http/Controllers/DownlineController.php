<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\DownlineService;
use App\Http\Controllers\UserController;
use App\Role;

class DownlineController extends Controller
{

   public function downlineList() {
        $requests['user'] = (new UserController())->getCurrentUser();
        $requests['roles'] = Role::where('id', '<>','1')->get();
        return view('member.downline-list')->with($requests);
    }


}
