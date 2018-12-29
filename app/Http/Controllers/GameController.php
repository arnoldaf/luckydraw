<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use App\Role;
use App\BidCategoryAmount;
use App\GameTime;
use App\DailyDeclareNumber;
use Validator;
use App\Services\WinResultService;
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

        $gameall = Game::all();
        //echo "<pre>";

        foreach ($gameall as $game) {

            $jodiPer = BidCategoryAmount::where('game_id', $game->id)->where('bid_category_id', 1)->get();

            $ABPer = BidCategoryAmount::where('game_id', $game->id)->where('bid_category_id', 2)->get();


            $games[] = [
                'id' => $game->id,
                'name' => $game->name,
                'jodi' => isset($jodiPer[0]->multiply) ? $jodiPer[0]->multiply : 0,
                'ab' => isset($ABPer[0]->multiply) ? $ABPer[0]->multiply : 0,
                'min_amount' => $game->min_amount,
                'max_amount' => $game->max_amount,
                'status' => $game->status,
            ];
        }

        //$games
        //print_r($games);
        // print_r((object) $games);
        // die;

        return view('admin/game/index')->withGames($games);
    }

    public function indexGameTimes() {

        // $times = GameTime::all();

        $times = DB::table('game_times')
                ->join('games', 'games.id', '=', 'game_times.game_id')
                ->select('game_times.id as id', 'name as name', 'game_date', 'start_time', 'end_time', 'status')
                ->orderBy('game_times.game_date', 'DESC')
                ->get();

        $games = Game::all();
        //return view('admin/game/gameTime')->withTimes($times);
        return View('admin/game/gameTime', compact('times', 'games'));
    }

    public function indexGameNumber() {

        // $number = DailyDeclareNumber::all();
        $number = DB::table('daily_declare_number')
                ->join('games', 'games.id', '=', 'daily_declare_number.game_id')
                ->select('daily_declare_number.id as id', 'daily_declare_number.status as status', 'games.id as game_id', 'name as name', 'declare_date', 'number')
                ->orderBy('daily_declare_number.created_at', 'DESC')
                ->get();

        $games = Game::all();
        //return view('admin/game/gameTime')->withTimes($times);
        return View('admin/game/gameNumber', compact('number', 'games'));
    }

    public function indexGameCommission() {

        // $games = Game::all();
        $commission = DB::table('transactions')
                ->join('games', 'games.id', '=', 'transactions.game_id')
                ->join('users', 'users.id', '=', 'transactions.to_user_id')
                //->join('user', 'user.id', '=', 'transaction.from_user_id')
                // ->join('bid_categories', 'bid_categories.id', '=', 'transaction.bid_category_id')
                ->select('users.user_account as user_name', 'games.name as game_name', 'transactions.percent as comm_percent', 'transactions.bid_amount as on_amount', 'transactions.amount as comm_amount', 'transactions.created_at as date', 'transactions.game_date as game_date')
                ->where('type', 'commission')
                ->orderBy('transactions.created_at', 'DESC')
                ->get();

        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/commissionResult', compact('commission', 'games'));
    }

    public function indexWinResult() {

        // $games = Game::all();
        $commission = DB::table('transactions')
                ->join('games', 'games.id', '=', 'transactions.game_id')
                ->join('users', 'users.id', '=', 'transactions.to_user_id')
                //->join('user', 'user.id', '=', 'transaction.from_user_id')
                ->join('bid_categories', 'bid_categories.id', '=', 'transactions.bid_category_id')
                ->select('users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category', 'transactions.percent as comm_percent', 'transactions.bid_number as bid_number', 'transactions.bid_amount as on_amount', 'transactions.amount as comm_amount', 'transactions.created_at as date', 'transactions.game_date as game_date')
                ->where('type', 'win_result')
                ->orderBy('transactions.created_at', 'DESC')
                ->get();

        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/winResult', compact('commission', 'games'));
    }

    public function indexGameBids() {

        // $games = Game::all();
        $bids = DB::table('user_bid')
                ->join('games', 'games.id', '=', 'user_bid.game_id')
                ->join('users', 'users.id', '=', 'user_bid.user_id')
                //->join('user', 'user.id', '=', 'transaction.from_user_id')
                ->join('bid_categories', 'bid_categories.id', '=', 'user_bid.bid_category_id')
                ->select('users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category', 'user_bid.bid_number as bid_number', 'user_bid.amount as amount', 'user_bid.created_at as date', 'user_bid.game_date as game_date')
                ->orderBy('user_bid.created_at', 'DESC')
                ->get();
        //echo '<pre>';
        //print_r($commission);
        //die;
        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/bid', compact('bids', 'games'));
    }

    public function indexPointTransaction() {
        //echo "<pre>";

        $users = User::all();
        $roles = Role::all();
        $filteredRoles = [];
        $filteredUsers = [];
        
         foreach ($roles as $key=> $val) {
                        $filteredRoles[$val->id] = $val->name;
                      }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }


        $sql = "select * from transactions as trans where type='transfer'";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
            }

            $transactions[$key] = $val;
            //  echo '<pre>';
            //  print_r($transactions);
            //  exit;
        }
       // print_r($transactions);
        //die;
        //return $transactions;


        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/reports/index', compact('transactions', 'games'));
    }
    
    
    public function indexAdminPointTransaction() {
        //echo "<pre>";

        $users = User::all();
        $roles = Role::all();
        $filteredRoles = [];
        $filteredUsers = [];
        
         foreach ($roles as $key=> $val) {
                        $filteredRoles[$val->id] = $val->name;
                      }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }


        $sql = "select * from transactions as trans where type='transfer'  and (to_user_id = 1 or  from_user_id = 1)";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
            }

            $transactions[$key] = $val;
            //  echo '<pre>';
            //  print_r($transactions);
            //  exit;
        }
       // print_r($transactions);
        //die;
        //return $transactions;


        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/point/index', compact('transactions', 'games'));
    }

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
        $gameID = $request->input('game_id');
        $today = date("Y-m-d");

        $existNumber = DB::table('daily_declare_number')
                ->where('game_id', $gameID)
                ->where('declare_date', $today)
                ->first();
        if (!$existNumber) {
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
            $status = 0;
            $gameNumber = DailyDeclareNumber::create([
                        'game_id' => $request->input('game_id'),
                        'number' => $request->input('game_number'),
                        'declare_date' => $today,
                        'status' => $status,
            ]);


            $gameNumber->save();
            return redirect('admin/game-number')->with('success', 'Game Number created successfully.');
        } else {
            return redirect('admin/game-number')->with('success', 'Game Result Already Declared.');
        }
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

    public function searchWin(Request $request) {

        $game_id = $request->input('game_id');
        $gameName = Game::where('id', $game_id)->get();

        $name = ($gameName[0]->name);

        $reportrange = $request->input('reportrange');
        $dates = explode(' - ', str_replace('/', '-', $reportrange));
        //$fromDate = date('Y-m-d', strtotime($dates[0])) . " 00:00:00";
        //$toDate = date('Y-m-d', strtotime($dates[1])) . " 23:59:59";
        $fromDate = date('Y-m-d', strtotime($dates[0]));
        $toDate = date('Y-m-d', strtotime($dates[1]));

        $header = "For " . $name . " Between (" . $fromDate . " - " . $toDate . ")";

        $commission = DB::table('transactions')
                ->join('games', 'games.id', '=', 'transactions.game_id')
                ->join('users', 'users.id', '=', 'transactions.to_user_id')
                ->join('bid_categories', 'bid_categories.id', '=', 'transactions.bid_category_id')
                ->select('users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category', 'transactions.percent as comm_percent', 'transactions.bid_number as bid_number', 'transactions.bid_amount as on_amount', 'transactions.amount as comm_amount', 'transactions.created_at as date', 'transactions.game_date as game_date')
                ->where('type', 'win_result')
                ->where('game_id', $game_id)
                ->where('transactions.game_date', '>=', $fromDate)
                ->where('transactions.game_date', '<=', $toDate)
                ->get();

        $games = Game::all();
        return View('admin/winResult', compact('header', 'commission', 'games'));
    }

    public function searchBid(Request $request) {



        $game_id = $request->input('game_id');
        $gameName = Game::where('id', $game_id)->get();

        $name = ($gameName[0]->name);

        $reportrange = $request->input('reportrange');
        $dates = explode(' - ', str_replace('/', '-', $reportrange));
        //$fromDate = date('Y-m-d', strtotime($dates[0])) . " 00:00:00";
        //$toDate = date('Y-m-d', strtotime($dates[1])) . " 23:59:59";

        $fromDate = date('Y-m-d', strtotime($dates[0]));
        $toDate = date('Y-m-d', strtotime($dates[1]));

        $header = "For " . $name . " Between (" . $fromDate . " - " . $toDate . ")";

        $bids = DB::table('user_bid')
                ->join('games', 'games.id', '=', 'user_bid.game_id')
                ->join('users', 'users.id', '=', 'user_bid.user_id')
                ->join('bid_categories', 'bid_categories.id', '=', 'user_bid.bid_category_id')
                ->select('users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category', 'user_bid.bid_number as bid_number', 'user_bid.amount as amount', 'user_bid.created_at as date', 'user_bid.game_date as game_date')
                ->where('game_id', $game_id)
                ->where('user_bid.game_date', '>=', $fromDate)
                ->where('user_bid.game_date', '<=', $toDate)
                ->get();

        $games = Game::all();
        return View('admin/bid', compact('header', 'bids', 'games'));
    }

    public function searchCommission(Request $request) {

        $game_id = $request->input('game_id');
        $gameName = Game::where('id', $game_id)->get();

        $name = ($gameName[0]->name);

        $reportrange = $request->input('reportrange');
        $dates = explode(' - ', str_replace('/', '-', $reportrange));
        //$fromDate = date('Y-m-d', strtotime($dates[0])) . " 00:00:00";
        // $toDate = date('Y-m-d', strtotime($dates[1])) . " 23:59:59";

        $fromDate = date('Y-m-d', strtotime($dates[0]));
        $toDate = date('Y-m-d', strtotime($dates[1]));

        $header = "For " . $name . " Between (" . $fromDate . " - " . $toDate . ")";

        $commission = DB::table('transactions')
                ->join('games', 'games.id', '=', 'transactions.game_id')
                ->join('users', 'users.id', '=', 'transactions.to_user_id')
                //->join('user', 'user.id', '=', 'transaction.from_user_id')
                // ->join('bid_categories', 'bid_categories.id', '=', 'transaction.bid_category_id')
                ->select('users.user_account as user_name', 'games.name as game_name', 'transactions.percent as comm_percent', 'transactions.bid_amount as on_amount', 'transactions.amount as comm_amount', 'transactions.created_at as date', 'transactions.game_date as game_date')
                ->where('type', 'commission')
                ->where('game_id', $game_id)
                ->where('transactions.game_date', '>=', $fromDate)
                ->where('transactions.game_date', '<=', $toDate)
                ->get();

        $games = Game::all();
        return View('admin/commissionResult', compact('header', 'commission', 'games'));
    }

    public function gameResultDeclare($id) {
        //$game_id = $id;
        (new WinResultService())->winPayout($id);
        //die;
        //return back()->with('success', 'Game updated succesfully');
        return redirect()->route('game-number');
        //return redirect('admin/game-number')->with('success', 'Game updated succesfully');
        //return View('admin/game/gameNumber', compact('number', 'games'));
    }

}