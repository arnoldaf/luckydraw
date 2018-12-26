<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Game;
use App\BidCategoryAmount;
use App\GameTime;
use App\DailyDeclareNumber;
use Validator;
use Auth;
use App\Traits\CaptureIpTrait;
use Illuminate\Http\Response;
use DB;

class GameController extends Controller {

    /**

     * Create a new controller instance.

     *

     * @return void

     */
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $games = Game::all();
        return view('admin/game/index')->withGames($games);
    }

    public function indexGameTimes() {

       // $times = GameTime::all();

         $times = DB::table('game_times')
          ->join('games', 'games.id', '=', 'game_times.game_id')
          ->select('game_times.id as id', 'name as name' , 'game_date', 'start_time', 'end_time','status')
          ->get();

        $games = Game::all();
        //return view('admin/game/gameTime')->withTimes($times);
        return View('admin/game/gameTime', compact('times','games'));

    }


    public function indexGameNumber() {

       // $number = DailyDeclareNumber::all();
         $number = DB::table('daily_declare_number')
          ->join('games', 'games.id', '=', 'daily_declare_number.game_id')
          ->select('daily_declare_number.id as id', 'name as name' , 'declare_date', 'number')
          ->get();

        $games = Game::all();
        //return view('admin/game/gameTime')->withTimes($times);
        return View('admin/game/gameNumber', compact( 'number','games'));

    }

    public function indexGameCommission() {

       // $games = Game::all();
        $commission = DB::table('transactions')
          ->join('games', 'games.id', '=', 'transactions.game_id')
          ->join('users', 'users.id', '=', 'transactions.to_user_id')
          //->join('user', 'user.id', '=', 'transaction.from_user_id')
         // ->join('bid_categories', 'bid_categories.id', '=', 'transaction.bid_category_id')
          ->select( 'users.user_account as user_name', 'games.name as game_name' ,'transactions.percent as comm_percent', 'transactions.bid_amount as on_amount', 'transactions.amount as comm_amount', 'transactions.created_at as date')
          ->where ('type', 'commission')
                ->get();
        //echo '<pre>';
        //print_r($commission);
        //die;
        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/commissionResult', compact( 'commission','games'));

    }

    public function indexWinResult() {

       // $games = Game::all();
        $commission = DB::table('transactions')
          ->join('games', 'games.id', '=', 'transactions.game_id')
          ->join('users', 'users.id', '=', 'transactions.to_user_id')
          //->join('user', 'user.id', '=', 'transaction.from_user_id')
          ->join('bid_categories', 'bid_categories.id', '=', 'transactions.bid_category_id')
          ->select( 'users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category' ,'transactions.percent as comm_percent','transactions.bid_number as bid_number', 'transactions.bid_amount as on_amount', 'transactions.amount as comm_amount', 'transactions.created_at as date')
          ->where ('type', 'win_result')
                ->get();
        //echo '<pre>';
        //print_r($commission);
        //die;
        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/winResult', compact( 'commission','games'));

    }

     public function indexGameBids() {

       // $games = Game::all();
        $bids = DB::table('user_bid')
          ->join('games', 'games.id', '=', 'user_bid.game_id')
          ->join('users', 'users.id', '=', 'user_bid.user_id')
          //->join('user', 'user.id', '=', 'transaction.from_user_id')
          ->join('bid_categories', 'bid_categories.id', '=', 'user_bid.bid_category_id')
          ->select( 'users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category' ,'user_bid.bid_number as bid_number', 'user_bid.amount as amount', 'user_bid.created_at as date')
         // ->where ('type', 'win_result')
                ->get();
        //echo '<pre>';
        //print_r($commission);
        //die;
        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/bid', compact( 'bids','games'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        /* $roles = Role::where('id', '<>','1')->get();
          $amkUsers = User::where('role_id', '2')->get();
          $dmkUsers = User::where('role_id', '3')->get();

          $currentRole = '';
          $data = [
          'roles'       => $roles,
          'amkUsers'   => $amkUsers,
          'dmkUsers'   => $dmkUsers,
          ];
         *
         */
        //return view('admin.gameCreate')->with($data);
        // $games = Game::all();
        // return view('admin/gameCreate')->withGames($games);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function addGame(Request $request) {

        $validator = Validator::make($request->all(), [
                    'game_name' => 'required|max:255',
                    'win_percentage' => 'required',
                    'win_percentage_ab' => 'required',
                    'min_amount' => 'required',
                    'max_amount' => 'required'
                        ], [
                    'game_name.unique' => 'Game name should be unique',
                        ]
        );


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $game = Game::create([
                    'name' => $request->input('game_name'),
                    'min_amount' => $request->input('min_amount'),
                    'max_amount' => $request->input('max_amount'),
                    'status' => $request->input('status')
        ]);

        $gameId = DB::table('games')->orderBy('id', 'desc')->first();

        $gameJodi = BidCategoryAmount::create([
                    'bid_category_id' => 1,
                    'game_id' => $gameId->id,
                    'multiply' => $request->input('win_percentage')
        ]);

        $gameAndar = BidCategoryAmount::create([
                    'bid_category_id' => 2,
                    'game_id' => $gameId->id,
                    'multiply' => $request->input('win_percentage_ab')
        ]);
        $gameBahar = BidCategoryAmount::create([
                    'bid_category_id' => 3,
                    'game_id' => $gameId->id,
                    'multiply' => $request->input('win_percentage_ab')
        ]);

        $game->save();
        $gameJodi->save();
        $gameAndar->save();
        $gameBahar->save();
        return redirect('admin/game')->with('success', 'Game created successfully.');
    }

    public function addGameTime(Request $request) {
        ini_set('memory_limit', '-1');
        $validator = Validator::make($request->all(), [
                    'game_id' => 'required',
                    'game_date' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required'
                        ], [
                    'game_date.unique' => 'Game date should not be blank',
                        ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gameTime = GameTime::create([
                    'game_id' => $request->input('game_id'),
                    'game_date' => $request->input('game_date'),
                    'start_time' => $request->input('start_time'),
                    'end_time' => $request->input('end_time')
        ]);

        $gameTime->save();
        return redirect('admin/game-times')->with('success', 'Game TIme created successfully.');
    }

    public function addGameNumber(Request $request) {
        ini_set('memory_limit', '-1');
        $gameID=$request->input('game_id');
        $today=date("Y-m-d");
        DB::table('daily_declare_number')->where('game_id', $gameID)->where('declare_date', $today)->delete();
        $validator = Validator::make($request->all(), [
                    'game_id' => 'required',
                    'game_number' => 'required',
                        ], [
                    'game_number.unique' => 'Game Number should not be blank',
                        ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gameNumber = DailyDeclareNumber::create([
                    'game_id' => $request->input('game_id'),
                    'number' => $request->input('game_number'),
                    'declare_date' => $today,

        ]);

        $gameNumber->save();
        return redirect('admin/game-number')->with('success', 'Game Number created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        return view('usersmanagement.show-user')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function editGame($id) {
        $game = Game::findOrFail($id);
        $gameJodi = BidCategoryAmount::where('game_id', $id)->where('bid_category_id', 1)->first();

        $gameAB = BidCategoryAmount::where('game_id', $id)->where('bid_category_id', 2)->first();

        //return view('admin.game.edit')->withGame($game);
        return View('admin.game.edit', compact('game', 'gameJodi', 'gameAB'));
    }
    /*
     *
     */
       public function editGameTime($id) {
         $gamesTime = GameTime::findOrFail($id);
          $games = Game::all();

        //return view('admin.game.editTime')->withGamesTime($gamesTime);
        return View('admin.game.editTime', compact('gamesTime', 'games'));
    }

     public function editGameNumber($id) {
         $gamesNumber = DailyDeclareNumber::findOrFail($id);
          $games = Game::all();

        //return view('admin.game.editTime')->withGamesTime($gamesTime);
        return View('admin.game.editNumber', compact('gamesNumber', 'games'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateGame(Request $request, $id) {
        DB::table('bid_category_amount')->where('game_id', $id)->delete();
        //BidCategoryAmount:where('game_id', $id)->delete();
        $game = Game::find($id);
        $validator = Validator::make($request->all(), [
                    'game_name' => 'required|max:255',
                    'win_percentage' => 'required',
                    'win_percentage_ab' => 'required',
                    'min_amount' => 'required',
                    'max_amount' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $game->name = $request->input('game_name');
        $game->min_amount = $request->input('min_amount');
        $game->max_amount = $request->input('max_amount');
        $game->status = $request->input('status');

        $gameJodi = BidCategoryAmount::create([
                    'bid_category_id' => 1,
                    'game_id' => $id,
                    'multiply' => $request->input('win_percentage')
        ]);

        $gameAndar = BidCategoryAmount::create([
                    'bid_category_id' => 2,
                    'game_id' => $id,
                    'multiply' => $request->input('win_percentage_ab')
        ]);
        $gameBahar = BidCategoryAmount::create([
                    'bid_category_id' => 3,
                    'game_id' => $id,
                    'multiply' => $request->input('win_percentage_ab')
        ]);

        $game->save();
        $gameJodi->save();
        $gameAndar->save();
        $gameBahar->save();

        return redirect('admin/game')->with('success', 'Game updated succesfully');
    }


    public function updateGameTime(Request $request, $id) {
        $gameTime = GameTime::find($id);
        $validator = Validator::make($request->all(), [
                    'game_date' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gameTime->game_date = $request->input('game_date');
        $gameTime->start_time = $request->input('start_time');
        $gameTime->end_time = $request->input('end_time');

        $gameTime->save();

        return redirect('admin/game-times')->with('success', 'Game Time updated succesfully');
    }

     public function updateGameNumber(Request $request, $id) {
        $gameNumber = DailyDeclareNumber::find($id);
        $validator = Validator::make($request->all(), [
                    'game_number' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gameNumber->number = $request->input('game_number');

        $gameNumber->save();

        return redirect('admin/game-number')->with('success', 'Game Number updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $currentUser = Auth::user();
        $user = User::findOrFail($id);
        $user->save();
        $user->delete();

        return redirect('admin/users')->with('success', trans('usersmanagement.deleteSuccess'));

        return back()->with('error', trans('usersmanagement.deleteSelfError'));
    }

    /**
     * Method to search the users.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
     public function searchWin(Request $request)
    {
        //DB::enableQueryLog();
        echo $game_id = $request->input('game_id');
        $reportrange = $request->input('reportrange');
        $dates =  explode(' - ', str_replace('/', '-', $reportrange));
       echo  $fromDate =  date('Y-m-d', strtotime($dates[0]));
        echo $toDate =  date('Y-m-d', strtotime($dates[1]));
        die;

         $commission = DB::table('transactions')
          ->join('games', 'games.id', '=', 'transactions.game_id')
          ->join('users', 'users.id', '=', 'transactions.to_user_id')
          ->join('bid_categories', 'bid_categories.id', '=', 'transactions.bid_category_id')
          ->select( 'users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category' ,'transactions.percent as comm_percent','transactions.bid_number as bid_number', 'transactions.bid_amount as on_amount', 'transactions.amount as comm_amount', 'transactions.created_at as date')
          ->where ('type', 'win_result')
                  ->where ('game_id', $game_id)
                ->get();

         $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/winResult', compact( 'commission','games'));


        return View('admin/userManage', compact('users', 'roles'));
    }

    public function generateUUID($role_id) {
        $uuid = '';
        switch ($role_id) {
            case '1':
                $amkUsers = User::where('role_id', '1')->OrderBy('id', 'DESC')->first();
                $lastUUID = $amkUsers['user_account'];
                if ($lastUUID == '') {
                    $uuid = env('SAKSERIES_PREFIX') . env('SAKSERIES');
                } else {
                    $uuid = substr($lastUUID, 3);
                    $uuid = env('SAKSERIES_PREFIX') . ($uuid + 1);
                }
                break;
            case '2':
                $amkUsers = User::where('role_id', '2')->OrderBy('id', 'DESC')->first();
                $lastUUID = $amkUsers['user_account'];
                if ($lastUUID == '') {
                    $uuid = env('AMKSERIES_PREFIX') . env('AMKSERIES');
                } else {
                    $uuid = substr($lastUUID, 3);
                    $uuid = env('AMKSERIES_PREFIX') . ($uuid + 1);
                }
                break;
            case '3':
                $dmkUsers = User::where('role_id', '3')->OrderBy('id', 'DESC')->first();
                $lastUUID = $dmkUsers['user_account'];
                if ($lastUUID == '') {
                    $uuid = env('DMKSERIES_PREFIX') . env('DMKSERIES');
                } else {
                    $uuid = substr($lastUUID, 3);
                    $uuid = env('DMKSERIES_PREFIX') . ($uuid + 1);
                }
                break;
            case '4':
                $cmkUsers = User::where('role_id', '4')->OrderBy('id', 'DESC')->first();
                $lastUUID = $cmkUsers['user_account'];

                if ($lastUUID == '') {
                    $uuid = env('CMKSERIES_PREFIX') . env('CMKSERIES');
                } else {
                    //echo $uuid =  $uuid + 1;
                    $uuid = substr($lastUUID, 3);
                    //$uuid =  $uuid + 1;
                    $uuid = env('CMKSERIES_PREFIX') . (((int) $uuid) + 1);
                }
                break;
        }

        return $uuid;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectUser() {
        $user = Auth::user();
        //print_r($user);
        //exit;
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('game');
            }
        } else {

            return redirect()->route('home111');
        }
    }

    /**
     * Get the currently authenticated user...
     *
     * @return \Illuminate\Http\Response
     */
    public function getCurrentUser() {
        if (Auth::check()) {
            $user = Auth::user();
            return $user;
        } else {
            return null;
        }
    }

    /**
     * Get the currently authenticated user...
     *
     * @return \Illuminate\Http\Response
     */
    public function getCurrentUserId() {
        if (Auth::check()) {
            $user = Auth::user();
            return $user->id;
        } else {
            return null;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userProfile($id) {

        $user = User::findOrFail($id);
        $roles = Role::all();
        $amkUsers = User::where('role_id', '2')->get();
        $dmkUsers = User::where('role_id', '3')->get();
        /*
          foreach ($user->roles as $user_role) {
          $currentRole = $user_role;
          }
         */
        $currentRole = '';
        $data = [
            'user' => $user,
            'roles' => $roles,
            'amkUsers' => $amkUsers,
            'dmkUsers' => $dmkUsers,
                //'currentRole' => $currentRole,
        ];

        return view('admin.userProfile')->with($data);
    }

}
