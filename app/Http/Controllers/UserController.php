<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Item;
use Validator;
use Auth;
use App\Traits\CaptureIpTrait;
use Illuminate\Http\Response;
use DB;


class UserController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin/userManage');
        $pagintaionEnabled = config('usersmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $users = User::paginate(config('usersmanagement.paginateListSize'));
        } else {
            $users = User::all();
        }
        $roles = Role::all();
        $filteredRoles = [];
        foreach ($roles as $key=> $val) {
          $filteredRoles[$val->id] = $val->name;
        }

        foreach ($users as $key=> $val) {
          $val->role_name = '';
          if($val->role_id) {
            $val->role_name = $filteredRoles[$val->role_id];
          }
            $users[$key] = $val;
        }


        //return View('usersmanagement.show-users', compact('users', 'roles'));
        return View('admin/userManage', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all();
        $amkUsers = User::where('role_id', '2')->get();
        $dmkUsers = User::where('role_id', '3')->get();

        $currentRole = '';
        $data = [
            'roles'       => $roles,
            'amkUsers'   => $amkUsers,
            'dmkUsers'   => $dmkUsers,
        ];
        return view('admin.userCreate')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'first_name'            => 'required|max:255',
                'last_name'             => '',
                'email'                 => 'nullable|email|max:255',
                'password'              => 'required|min:6|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
                'role'                  => 'required',
                'day'                   => '',
                'month'                 => '',
                'year'                  => '',
                'comission'             => '',
                'pin'                   => 'required|min:4|max:4',
            ],
            [
                'name.unique'         => trans('auth.userNameTaken'),
                'name.required'       => trans('auth.userNameRequired'),
                'email.required'      => trans('auth.emailRequired'),
                'email.email'         => trans('auth.emailInvalid'),
                'password.required'   => trans('auth.passwordRequired'),
                'password.min'        => trans('auth.PasswordMin'),
                'password.max'        => trans('auth.PasswordMax'),
                'role.required'       => trans('auth.roleRequired'),
                'pin.min'         => "Pin should be of 4 digit",
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        if($request->input('role') == 4) {
          $parent_id = $request->input('distributor_manager');
        } else if($request->input('role') == 3) {
          $parent_id = $request->input('distributor_manager');
        } else {
          $parent_id = 0;
        }



        $uuid = $this->generateUUID($request->input('role'));


        $dob = '0000-00-00';
        if($request->input('year') != '' && $request->input('month') != '' && $request->input('day') != '') {
          $dob = date('Y-m-d', strtotime($request->input('year').'-'.$request->input('month').'-'.$request->input('day')));
        }

        $user = User::create([
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'email'            => $request->input('email'),
            'password'         => bcrypt($request->input('password')),
            'role_id'          => $request->input('role'),
            'parent_id'        => $parent_id,
            'phone'            => $request->input('phone'),
            'address'          => $request->input('address'),
            'city'             => $request->input('city'),
            'country'          => $request->input('country'),
            'comission'        => $request->input('comission'),
            'patti'            => $request->input('patti'),
            'status'           => $request->input('status'),
            'pin'              => $request->input('pin'),
            'dob'              => $dob,
            'user_account'     => $uuid,
            'token'            => str_random(64),
            'activated'        => 1,
        ]);
        //$user->profile()->save($profile);
        //$user->attachRole($request->input('role'));
        $user->save();
        return redirect('admin/users')->with('success', trans('usersmanagement.createSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function edit($id)
    {
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
            'user'        => $user,
            'roles'       => $roles,
            'amkUsers'    => $amkUsers,
            'dmkUsers'    => $dmkUsers,
            //'currentRole' => $currentRole,
        ];

        return view('admin.edit-user')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currentUser = Auth::user();
        $user = User::find($id);
        $action = $request->input('action');
        switch ($action) {
          case 'profile-settings':
                $emailCheck = true;
                if ($emailCheck) {
                    $validator = Validator::make($request->all(), [
                        'first_name'     => 'required|max:255',
                        'email'    => 'nullable|email|max:255',
                        'password' => 'nullable|confirmed|min:6',
                        'pin'      => 'nullable|min:4|max:4',
                        'day'      => '',
                        'month'    => '',
                        'year'     => '',
                    ]);
                }

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }

                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');

                $user->address = $request->input('address');
                $user->city = $request->input('city');
                $user->country = $request->input('country');
                $user->phone = $request->input('phone');
                //$user->role_id = $request->input('role');
                $user->comission = $request->input('comission');
                $user->patti = $request->input('patti');

                if($request->input('year') != '' && $request->input('month') != '' && $request->input('day') != '') {
                  $dob = date('Y-m-d', strtotime($request->input('year').'-'.$request->input('month').'-'.$request->input('day')));
                  $user->dob = $dob;
                }
                $user->active = ($request->input('status') != '')?$request->input('status'):0;
                $user->save();
            break;

            case 'password':
                $emailCheck = true;
                $validator = Validator::make($request->all(),
                    [
                        'password'              => 'nullable|min:6|max:20|confirmed',
                        'password_confirmation' => 'nullable|same:password',
                    ],
                    [
                        'password.required'   => trans('auth.passwordRequired'),
                        'password.min'        => trans('auth.PasswordMin'),
                        'password.max'        => trans('auth.PasswordMax'),
                    ]
                );

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if ($request->input('password') != null) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            break;

            case 'pin':
                $emailCheck = true;
                $validator = Validator::make($request->all(),
                    [
                        'pin'      => 'nullable|min:4|max:4',
                    ],
                    [
                        'pin.min'  => "Pin should be of 4 digit",
                    ]
                );

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if ($request->input('pin') != null) {
                $user->password = $request->input('pin');
            }
            $user->save();
            break;

          default:
            break;
        }

        return back()->with('success', trans('usersmanagement.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
    public function search(Request $request)
    {
        DB::enableQueryLog();
        $userid = $request->input('userid');
        $name = $request->input('name');
        $emailid = $request->input('emailid');
        $phone = $request->input('phone');
        $status = $request->input('status');
        $reportrange = $request->input('reportrange');
        $dates =  explode(' - ', $reportrange);
        $fromDate =  date('Y-m-d', strtotime($dates[0]));
        $toDate =  date('Y-m-d', strtotime($dates[1]));
        /*
        $searchTerm = $request->input('user_search_box');
        $searchRules = [
            'user_search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'user_search_box.required' => 'Search term is required',
            'user_search_box.string'   => 'Search term has invalid characters',
            'user_search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);


        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }


        $results = User::where('uuid', 'like', $searchTerm.'%')
                            ->orWhere('name', 'like', $searchTerm.'%')
                            ->orWhere('uuid', 'like', $searchTerm.'%')
                            ->orWhere('email', 'like', $searchTerm.'%')->get();

        */
        $filters = [];
        if($userid != '')
          $filters['user_account'] = $userid;
        if($name != '')
            $filters['first_name'] = $name;
        if($emailid != '')
            $filters['email'] = $emailid;
        if($phone != '')
          $filters['phone'] = $phone;

       //print_r($filters);
       if($status == '') {
         $status = 1;
       }
       if($status != '')
          $users = User::where('active', '=', $status);
       foreach($filters as $key=>$val) {
         $users = $users->where("$key", 'like', $val.'%');
       }
       if($reportrange != '')
           $users->whereBetween('created_at', array($fromDate, $toDate));


        $users = $users->get();
        /*
        echo '<pre>';
        print_r($users);
        dd(
            DB::getQueryLog()
        );
       exit;
       */

        // Attach roles to results
        $roles = Role::all();
        $filteredRoles = [];
        foreach ($roles as $key=> $val) {
          $filteredRoles[$val->id] = $val->name;
        }

        foreach ($users as $key=> $val) {
          $val->role_name = '';
          if($val->role_id) {
            $val->role_name = $filteredRoles[$val->role_id];
          }
            $users[$key] = $val;
        }

        return View('admin/userManage', compact('users', 'roles'));
    }

    public function generateUUID($role_id){
       $uuid = '';
       switch ($role_id){
         case '1':
             $amkUsers = User::where('role_id', '1')->OrderBy('id', 'DESC')->first();
             $lastUUID = $amkUsers['user_account'];
             if($lastUUID == '') {
               $uuid = env('SAKSERIES_PREFIX').env('SAKSERIES');
             } else {
               $uuid = substr($lastUUID, 3) ;
               $uuid = env('SAKSERIES_PREFIX'). ($uuid+1);
             }
           break;
         case '2':
           $amkUsers = User::where('role_id', '2')->OrderBy('id', 'DESC')->first();
           $lastUUID = $amkUsers['user_account'];
           if($lastUUID == '') {
             $uuid = env('AMKSERIES_PREFIX').env('AMKSERIES');
           } else {
             $uuid = substr($lastUUID, 3) ;
             $uuid = env('AMKSERIES_PREFIX'). ($uuid+1);
           }
           break;
         case '3':
             $dmkUsers = User::where('role_id', '3')->OrderBy('id', 'DESC')->first();
             $lastUUID = $dmkUsers['user_account'];
             if($lastUUID == '') {
               $uuid = env('DMKSERIES_PREFIX').env('DMKSERIES');
             } else {
               $uuid = substr($lastUUID, 3) ;
               $uuid = env('DMKSERIES_PREFIX'). ($uuid+1);
             }
           break;
         case '4':
             $cmkUsers = User::where('role_id', '4')->OrderBy('id', 'DESC')->first();
            $lastUUID = $cmkUsers['user_account'];

             if($lastUUID == '') {
               $uuid = env('CMKSERIES_PREFIX').env('CMKSERIES');
             } else {
               //echo $uuid =  $uuid + 1;
                $uuid = substr($lastUUID, 3) ;
                //$uuid =  $uuid + 1;
                $uuid = env('CMKSERIES_PREFIX').(((int)$uuid)+1);
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
    public function redirectUser()
    {
        $user = Auth::user();
        //print_r($user);
        //exit;
        if( Auth::check() ){
          $user = Auth::user();
          if($user->role_id ==1) {
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
    public function getCurrentUser()
    {
      if( Auth::check() ){
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
    public function getCurrentUserId()
    {
      if( Auth::check() ){
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
    public function userProfile($id)
    {

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
          'user'        => $user,
          'roles'       => $roles,
          'amkUsers'    => $amkUsers,
          'dmkUsers'    => $dmkUsers,
          //'currentRole' => $currentRole,
      ];

      return view('admin.userProfile')->with($data);



    }


}
