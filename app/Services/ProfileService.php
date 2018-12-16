<?php

namespace App\Services;

use App\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use Validator;
use Hash;

class ProfileService {

    /**
     * TransactionService constructor.
     */
    public function __construct()
    {
    }

          public function updateProfileRequest($request) {
              try {
                  $currentUser = (new UserController())->getCurrentUser();
                  //$currentUser = Auth::user();
                  $user = (new UserController())->getCurrentUser();
                  $validator = Validator::make($request->all(), [
                      'first_name'     => 'required|max:255',
                      'email'          => 'nullable|email|max:255',
                      'password'       => 'nullable|confirmed|min:6',
                      'pin'            => 'nullable|min:4|max:4',
                      'city'           => 'required|max:255',
                      'day'            => '',
                      'month'          => '',
                      'year'           => '',
                  ]);

                  if ($validator->fails()) {
                      return back()->withErrors($validator)->withInput();
                  }

                  $user->first_name = $request->input('first_name');
                  $user->last_name = $request->input('last_name');

                  $user->address = $request->input('address');
                  $user->city = $request->input('city');
                  $user->country = $request->input('country');
                  $user->phone = $request->input('phone');

                  if($request->input('year') != '' && $request->input('month') != '' && $request->input('day') != '') {
                    $dob = date('Y-m-d', strtotime($request->input('year').'-'.$request->input('month').'-'.$request->input('day')));
                    $user->dob = $dob;
                  }
                  $user->active = ($request->input('status') != '')?$request->input('status'):0;
                  $user->save();
                  return back()->with('success', trans('Your profile has been updated successfully.'));

          }catch (\Exception $exception) {
              return ['result' => false, 'message' => $exception->getMessage()];
          }
      }

      public function passwordsUpdateRequest($request) {
          try {
              $user = (new UserController())->getCurrentUser();

              $validator = Validator::make($request->all(), [
                'oldpassword'              => 'required',
                'password'                 => 'required|min:6|max:20|confirmed',
                'password_confirmation'    => 'required|same:password',
              ]);
              if ($validator->fails()) {
                  return ['result' => false, 'message' => implode('</br>',$validator->errors()->all())];
              }


              $storedPassword = $user->password;
              $oldpassword = $request->input('oldpassword');

              if (!(\Hash::check($oldpassword, $storedPassword))) {
                return ['result' => false, 'message' => 'Invalid current password'];
              }

              $user->password = bcrypt($request->input('password'));
              $user->save();
              return ['result' => true, 'message' => 'Your password has been updated successfully.'];

      }catch (\Exception $exception) {
          return ['result' => false, 'message' => $exception->getMessage()];
      }
      }

      public function pinUpdateRequest($request) {
          try {
              $user = (new UserController())->getCurrentUser();

              $validator = Validator::make($request->all(), [
                'oldpin'              => 'required',
                'pin'                 => 'required|min:4|max:4',
                'confirm_pin'          => 'required|same:pin',
              ]);
              if ($validator->fails()) {
                  return ['result' => false, 'message' => implode('</br>',$validator->errors()->all())];
              }


              $storedPin = $user->pin;

              if ($request->oldpin != $storedPin) { //to validate pin
                  return ['result' => false, 'message' => 'Invalid current PIN'];
              }

              $user->pin = $request->pin;
              $user->save();
              return ['result' => true, 'message' => 'Your PIN has been updated successfully.'];

      }catch (\Exception $exception) {
          return ['result' => false, 'message' => $exception->getMessage()];
      }
      }

}
