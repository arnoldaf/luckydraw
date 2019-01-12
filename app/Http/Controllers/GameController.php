<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use App\Role;
use App\Transaction;
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
            ->select('daily_declare_number.id as id', 'daily_declare_number.status as status', 'games.id as game_id', 'name as name', 'declare_date','daily_declare_number.created_at', 'number')
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

        foreach ($roles as $key => $val) {
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

        $adminBalance = User::where('id', 1)->first();
        $adminLastBalance = $adminBalance->last_balance;

        $users = User::all();
        $roles = Role::all();
        $filteredRoles = [];
        $filteredUsers = [];

        foreach ($roles as $key => $val) {
            $filteredRoles[$val->id] = $val->name;
        }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }


        $sql = "select * from transactions as trans where type='transfer' and (to_user_id = 1 or from_user_id = 1)";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            $val->from_user_balance = '';
            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
                $val->from_user_balance = $filteredUsers[$val->from_user_id]->last_balance;
            }

            $transactions[$key] = $val;
            //  echo '<pre>';
            //  print_r($transactions);
            //  exit;
        }
        //print_r($transactions);
        // die;
        //return $transactions;


        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/point/index', compact('adminLastBalance', 'transactions', 'games'));
    }

    public function indexMemberPointTransaction($CurrentUser) {
        //echo "<pre>";


        $adminBalance = User::where('id', 1)->first();
        $adminLastBalance = $adminBalance->last_balance;

        $users = User::all();
        $roles = Role::all();
        $games = Game::all();
        $filteredRoles = [];
        $filteredUsers = [];
        $filteredGames = [];

        foreach ($roles as $key => $val) {
            $filteredRoles[$val->id] = $val->name;
        }

        foreach ($games as $key => $val) {
            $filteredGames[$val->id] = $val->name;
        }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }


        $sql = "select * from transactions as trans where (to_user_id = $CurrentUser or from_user_id = $CurrentUser)";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            $val->from_user_balance = '';
            // $val->game_name = '';
            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
                $val->from_user_balance = $filteredUsers[$val->from_user_id]->last_balance;
                // $val->game_name = $filteredGames[$val->game_id]->name;
            }

            $transactions[$key] = $val;
            // echo '<pre>';
            //  print_r($transactions);
            //  exit;
        }
        // print_r($transactions);
        // die;
        //return $transactions;
        // $games = Game::all();
        return $transactions;
        //return view('admin/winResult')->withCommission($commission);
        //return View('member.points-history', compact('transactions'));
    }

    public function indexMemberGameBids($currentUser) {

        // $games = Game::all();
        $bids = DB::table('user_bid')
                ->join('games', 'games.id', '=', 'user_bid.game_id')
                ->join('users', 'users.id', '=', 'user_bid.user_id')
                //->join('user', 'user.id', '=', 'transaction.from_user_id')
                ->join('bid_categories', 'bid_categories.id', '=', 'user_bid.bid_category_id')
                ->select('users.user_account as user_name', 'games.name as game_name', 'bid_categories.name as bid_category', 'user_bid.*')
                ->where('user_bid.user_id', $currentUser)
                ->orderBy('user_bid.created_at', 'DESC')
                ->get();
        // echo '<pre>';
        // print_r($bids);
        // die;
        //$games = Game::all();
        return $bids;
        //return view('admin/winResult')->withCommission($commission);
        // return View('admin/bid', compact('bids', 'games'));
    }

    public function indexAdminPointReceive() {
        //echo "<pre>";

        $users = User::all();
        $roles = Role::all();
        $filteredRoles = [];
        $filteredUsers = [];

        $adminBalance = User::where('id', 1)->first();
        $adminLastBalance = $adminBalance->last_balance;


        foreach ($roles as $key => $val) {
            $filteredRoles[$val->id] = $val->name;
        }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }


        $sql = "select * from transactions as trans where type='transfer' and to_user_id = 1 and status=0";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            $val->from_user_balance = '';
            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
                $val->from_user_balance = $filteredUsers[$val->from_user_id]->last_balance;
            }

            $transactions[$key] = $val;
            //  echo '<pre>';
            //  print_r($transactions);
            //  exit;
        }
        //print_r($transactions);
        //die;
        //return $transactions;


        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/point/receivePoints', compact('adminLastBalance', 'transactions', 'games'));
    }

    public function indexAdminPointTransfer() {
        //echo "<pre>";

        $users = User::all();
        $roles = Role::all();
        $filteredRoles = [];
        $filteredUsers = [];

        $adminBalance = User::where('id', 1)->first();
        $adminLastBalance = $adminBalance->last_balance;

        foreach ($roles as $key => $val) {
            $filteredRoles[$val->id] = $val->name;
        }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }


        $sql = "select * from transactions as trans where type='transfer' and from_user_id = 1 and status=0";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            $val->to_user_balance = '';

            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
                $val->to_user_balance = $filteredUsers[$val->to_user_id]->last_balance;
            }

            $transactions[$key] = $val;
            //echo '<pre>';
            //  print_r($transactions);
            //  exit;
        }
        // print_r($transactions);
        //die;
        //return $transactions;


        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/point/transferPoints', compact('adminLastBalance', 'transactions', 'games'));
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
        $validator = Validator::make($request->all(), [
                                'game_id' => 'required',
                                'game_number' => 'required',
                                'game_date' => 'required',
                                ]
            );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $gameID = $request->input('game_id');
        $status = $request->input('status');
        $dateArray = explode("/", $request->input('game_date'));
        $gameDate = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0];
        
        $yesterdayDate = date('Y-m-d',strtotime("-1 days"));
        $todayHour = date('H');
        if($yesterdayDate == $gameDate && $todayHour <= 12) {
            return redirect('admin/game-number')->withInput()->with('error', 'Game result can be declared for '.$request->input('game_date').' after 12PM today.');
        } elseif( $gameDate > date('Y-m-d')){
            return redirect('admin/game-number')->withInput()->with('error', 'Game result for future date can\'t bedeclared.');
        }

        $existNumber = DB::table('daily_declare_number')
                ->where('game_id', $gameID)
                ->where('declare_date', $gameDate)
                ->first();
        if (!$existNumber) {
            
            $status = 0;
            $gameNumber = DailyDeclareNumber::create([
                        'game_id' => $request->input('game_id'),
                        'number' => $request->input('game_number'),
                        'declare_date' => $gameDate,
                        'status' => $status,
            ]);
            $gameNumber->save();
            return redirect('admin/game-number')->with('success', 'Game result has been declared for '.$request->input('game_date'));
        } else {
            return redirect('admin/game-number')->withInput()->with('error', 'Game result has already declared for '.$request->input('game_date'));
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
        
         $validator = Validator::make($request->all(), [
                                'game_id' => 'required',
                                'game_number' => 'required',
                                'game_date' => 'required',
                                ]
            );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $gameNumber = DailyDeclareNumber::find($id);
        $gameID = $request->input('game_id');
        $dateArray = explode("/", $request->input('game_date'));
        $gameDate = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0];
        
        $yesterdayDate = date('Y-m-d',strtotime("-1 days"));
        $todayHour = date('H');
        if($yesterdayDate == $gameDate && $todayHour <= 12) {
            return back()->withInput()->with('error', 'Game result can be declared for '.$request->input('game_date').' after 12PM today.');
        } elseif(date('Y-m-d') >= $gameDate ){
            return back()->withInput()->with('error', 'Game result for future date can\'t bedeclared.');
        }

        $existNumber = DB::table('daily_declare_number')
                ->where('id', '<>', $id)
                ->where('game_id', $gameID)
                ->where('declare_date', $gameDate)
                ->first();
        if (!$existNumber) {
            $status = 0;
            $gameNumber->number = $request->input('game_number');
            $gameNumber->game_id = $gameID;
            $gameNumber->declare_date = $gameDate;
            $gameNumber->save();
            return redirect('admin/game-number')->with('success', 'Game result has updated for '.$request->input('game_date'));
        } else {
            return back()->withInput()->with('error', 'Game result has already declared for '.$request->input('game_date'));
        }
        
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

    public function searchAdminPoints(Request $request) {
        //DB::enableQueryLog();
        $userid = $request->input('userid');
        $name = $request->input('name');

        $status = $request->input('status');
        $reportrange = $request->input('reportrange');

        $dates = explode(' - ', str_replace('/', '-', $reportrange));
        $fromDate = date('Y-m-d', strtotime($dates[0])) . " 00:00:00";
        $toDate = date('Y-m-d', strtotime($dates[1])) . " 23:59:59";

        $adminBalance = User::where('id', 1)->first();
        $adminLastBalance = $adminBalance->last_balance;

        $users = User::all();
        $roles = Role::all();
        $filteredRoles = [];
        $filteredUsers = [];

        foreach ($roles as $key => $val) {
            $filteredRoles[$val->id] = $val->name;
        }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }

        $sql = "select * from transactions as trans where type='transfer' and (to_user_id = 1 or from_user_id = 1) "
                . "and trans.updated_at between '$fromDate' and '$toDate' and trans.status=$status ";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            $val->from_user_balance = '';
            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
                $val->from_user_balance = $filteredUsers[$val->from_user_id]->last_balance;
            }

            $transactions[$key] = $val;
        }
        // print_r($transactions);
        //die;
        //return $transactions;


        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/point/index', compact('adminLastBalance', 'transactions', 'games'));
    }

    public function searchTransferPoints(Request $request) {
        //DB::enableQueryLog();
        $userid = $request->input('userid');
        $name = $request->input('name');

        $status = $request->input('status');
        $reportrange = $request->input('reportrange');

        $dates = explode(' - ', str_replace('/', '-', $reportrange));
        $fromDate = date('Y-m-d', strtotime($dates[0])) . " 00:00:00";
        $toDate = date('Y-m-d', strtotime($dates[1])) . " 23:59:59";

        $adminBalance = User::where('id', 1)->first();
        $adminLastBalance = $adminBalance->last_balance;

        $users = User::all();
        $roles = Role::all();
        $filteredRoles = [];
        $filteredUsers = [];

        foreach ($roles as $key => $val) {
            $filteredRoles[$val->id] = $val->name;
        }

        foreach ($users as $key => $val) {
            $val->role_name = '';
            if ($val->role_id) {
                $val->role_name = $filteredRoles[$val->role_id];
            }
            $filteredUsers[$val->id] = $val;
        }

        $sql = "select * from transactions as trans where type='transfer' "
                . "and trans.updated_at between '$fromDate' and '$toDate' and trans.status=$status ";
        $transactions = DB::select($sql);
        foreach ($transactions as $key => $val) {
            $val->to_user_name = '';
            $val->to_user_account = '';
            $val->from_user_name = '';
            $val->from_user_account = '';
            $val->from_user_balance = '';
            if (array_key_exists($val->to_user_id, $filteredUsers) && array_key_exists($val->from_user_id, $filteredUsers)) {
                $val->to_user_name = $filteredUsers[$val->to_user_id]->first_name . ' ' . $filteredUsers[$val->to_user_id]->last_name;
                $val->to_user_account = $filteredUsers[$val->to_user_id]->user_account;
                $val->from_user_name = $filteredUsers[$val->from_user_id]->first_name . ' ' . $filteredUsers[$val->from_user_id]->last_name;
                $val->from_user_account = $filteredUsers[$val->from_user_id]->user_account;
                $val->from_user_balance = $filteredUsers[$val->from_user_id]->last_balance;
            }

            $transactions[$key] = $val;
        }
        // print_r($transactions);
        //die;
        //return $transactions;


        $games = Game::all();
        //return view('admin/winResult')->withCommission($commission);
        return View('admin/reports/index', compact('adminLastBalance', 'transactions', 'games'));
    }

    public function gameResultDeclare($id) {
        $game_id = $id;
        $result = (new WinResultService())->winPayout($id);
        return redirect()->route('game-number')->with('success', 'Payout done for '.date('d M Y', strtotime($result['declare_date'])).' successfully.');
    }

    public function pointTransferRequest(Request $request) {
        try {
            // print_r($request->user_account);
            // die;
            $currentUser = (new UserController())->getCurrentUser();
            $fromUserId = $currentUser->id;
            $storedPin = $currentUser->pin;
            $userTotalAmount = $currentUser->last_balance;
            $userAccount = $request->user_account;
            if ($request->pin != (String) $storedPin) { //to validate pin
                //return ['result' => false, 'message' => 'Invalid PIN'];
                return redirect('admin/admin-points-transfer')->with('success', 'Invalid PIN');
            }
            $toUser = (new User())->findByFieldName('user_account', $userAccount);
            if (empty($toUser)) {
                //return ['result' => false, 'message' => 'Invalid User Account'];
                return redirect('admin/admin-points-transfer')->with('success', 'Invalid User Account');
            }
            $toUserId = $toUser[0]['id'];
            /* $bool = $this->isValidUserAccount($fromUserId, $toUserId);
              if (!$bool || $toUserId == $fromUserId) {
              // return ['result' => false, 'message' => 'Invalid User Account'];
              return redirect('admin/admin-points-transfer')->with('success', 'Invalid User Account');
              }
             * 
             */
            //$pendingAmountResult = (new Transaction())->getTotalRequestedAmount($fromUserId);
            if ($request->amount > $userTotalAmount) { // validate amount
                //return ['result' => false, 'message' => 'Insufficient Balance'];
                return redirect('admin/admin-points-transfer')->with('success', 'Insufficient Balance');
            }
            $transaction = new Transaction();
            $transaction->from_user_id = $fromUserId;
            $transaction->to_user_id = $toUserId;
            $transaction->amount = $request->amount;
            $transaction->status = 0;
            $transaction->type = "transfer";
            $transaction->save();
            //to deduct this requested amount from user account
            $user = User::find($fromUserId);
            $user->last_balance = $user->last_balance - $request->amount;
            $user->save();

            return redirect('admin/admin-points-transfer')->with('success', 'Request made successfully');

            //return ['result' => true, 'message' => 'Request made successfully', 'data' => $transaction];
        } catch (\Exception $exception) {
            //return ['result' => false, 'message' => $exception->getMessage()];
            return redirect('admin/admin-points-transfer')->with('success', $exception->getMessage());
        }
    }

    public function pointReceiveUpdate(Request $request) {
        // echo "<pre>";


        $loggedInUser = (new UserController())->getCurrentUser();
        $toUserId = $loggedInUser->id;

        if ((String) $loggedInUser->pin != $request->pin) {
            return redirect('admin/admin-points-receive')->with('success', 'Please enter valid pin');
            //return ['result' => false, 'message' => 'Please enter valid pin'];
        }
        $ids = implode(',', $request->ids);
        // ec
        $idsArray = $request->ids;

        // die;
        $status = $request->statusa;

        if ($status == '') {
            return ['result' => false, 'message' => 'Status required'];
        }
        if ($status == 'accept') { // need to update user's balance
            $sqlSumAmount = "select sum(amount) as total_amount from transactions where type='transfer' "
                    . "and status=0 and to_user_id=$toUserId and id in ($ids)";
            $reSumAmount = DB::select($sqlSumAmount);
            //echo ($reSumAmount[0]->total_amount);
            //die;

            /* $sumAmount = DB::table('transactions')
              ->select('sum(amount) as total_amount ')
              // ->select(DB::raw("SUM(amount) as total_amount"))
              ->whereIn('id', $ids)
              ->where(['to_user_id' => $toUserId, 'status' => 0, 'type' => 'transfer'])
              ->first();
              print_r($sumAmount);
              die;
             * 
             */
        }
        //if ((new Transaction())->updateTransferRequest($ids, $toUserId, $status) > 0) {
        $statusBool = ($status == 'accept') ? 1 : 2;

        // echo $statusBool;
        // die;

        Transaction::whereIn('id', $request->ids)->update(['status' => $statusBool]);
        // print_r($updateT);
        // die;
        // $statusUpdate = Transaction::find($ids);
        //$statusUpdate->status = $statusBool;
        // $statusUpdate->save();

        if ($statusBool > 0) {

            if ($status == 'accept') {
                $user = User::find($toUserId);
                $user->last_balance = $user->last_balance + $reSumAmount[0]->total_amount;
                $user->save();
            } else { // case of reject
                // need to add back amount to sender account
                for ($i = 0; $i < count($idsArray); $i++) {

                    $fromUser = Transaction::where(['id' => $idsArray[$i], 'to_user_id' => $toUserId, 'type' => 'transfer'])->first();
                    $fromUserDetail = User::find($fromUser->from_user_id);
                    $fromUserDetail->last_balance = $fromUserDetail->last_balance + $fromUser->amount;
                    $fromUserDetail->save();
                }
            }
            return redirect('admin/admin-points-receive')->with('success', 'Request updated successfully');
            // return ['result' => true, 'message' => 'Request updated successfully'];
        }


        return redirect('admin/admin-points-receive')->with('success', 'Sorry! Try again later');
        // return ['result' => false, 'message' => 'Sorry! Try again later'];
    }

    public function isValidUserAccount($fromUserId, $toUserId) {
        /**
         * toUserId should be direct upline, direct downline or on same level
         */
        $user = new User();
        $directUser = $user->checkDirectUplineOrDownline($fromUserId, $toUserId);
        if (!empty($directUser)) {
            return true;
        }
        if ($user->isOnSameLevel($fromUserId, $toUserId)) {
            return true;
        }

        return false;
    }

}
