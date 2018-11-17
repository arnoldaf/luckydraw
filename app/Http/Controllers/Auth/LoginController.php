<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\ActivityLog;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(Request $request) {

        $requiredField = [
            "email" => "required|email|max:255",
            "password" => "required|min:5",
        ];
        $validate = Validator::make($request->all(), $requiredField);
        $responseMsg = "Email or password is wrong";
        if ($validate->fails()) {
            $responseMsg = implode("<br>", $validate->errors()->all());

            return response()->json(['result' => false, 'msg' => $responseMsg]);
        }
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => '1'])) {
            $user = Auth::user();
            $user->last_login = date('Y-m-d h:i:s');
            $user->is_login = 1;
            $user->save();
            $eventLog = new ActivityLog();
            $eventLog->activity_name = 'Login to system';
            $eventLog->user_id = Auth::id();
            $eventLog->ip = request()->ip();
            $eventLog->info = json_encode($_SERVER);
            $eventLog->save();

            return response()->json(['result' => true, 'msg' => 'Success']);
        }

        return response()->json(['result' => false, 'msg' => $responseMsg]);
    }
}
