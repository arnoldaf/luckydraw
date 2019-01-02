<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/auth/game-over-time', function() {
    $hours = date('H');
    if ($hours > 11 ) {
        return strtotime(date("Y-m-d 11:59:59", time() + 86400))*1000;
    }
    return strtotime(date("Y-m-d 11:59:59"))*1000;
});
Route::get('/', 'MemberController@index')->name('sitehome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login1', 'UserBidController@getGame');
Route::get('/redirect', 'UserController@redirectUser')->name('redirect');

Route::group(['middleware' => ['member']], function() {
  Route::get('/game', 'UserBidController@getGame')->name('playgame');
  Route::get('/point-transfer', 'TransactionController@pointTransfer')->name('point-transfer');
  Route::post('/point-transfer-request', 'TransactionController@pointTransferRequest');
  Route::post('/point-transfer-cancel', 'TransactionController@pointTransferCancel');
  //Route::post('/point-transfer-update', 'TransactionController@pointTransferUpdate');
  Route::post('/confirm-bid', 'UserBidController@confirmBid');

  //Front end Route
  Route::get('/profile', 'ProfileController@profileUpdate')->name('profile');
  Route::put('/updateProfileRequest', 'ProfileController@updateProfileRequest')->name('updateProfileRequest');
  Route::get('/passwords', 'ProfileController@passwords')->name('passwords');
  Route::post('/update-password-request', 'ProfileController@passwordsUpdateRequest')->name('updatePasswordRequest');
  Route::post('/update-pin-request', 'ProfileController@pinUpdateRequest')->name('updatePinRequest');

//=========

  //Downline Data
  Route::get('/downline-list', 'DownlineController@downlineList')->name('downline-list');

});


Route::post('member/point-transfer-update', 'TransactionController@pointTransferUpdate');
Route::group(['middleware' => ['superadmin']], function() {
  Route::get('admin/dashboard', 'DashboardController@myHome')->name('dashboard');
  Route::get('admin/test', 'DashboardController@test');
  Route::resource('admin/users', 'UserController', [
      'names' => [
          'index'   => 'users',
          'destroy' => 'user.destroy',
      ],
      'except' => [
          'deleted',
      ],
  ]);

  Route::post('search-users', 'UserController@search')->name('search-users');
  //Super Admin Routes
  Route::get('admin/userProfile/{id}', 'UserController@userProfile')->name('userprofile');
  // Bid Listing
  Route::get('/admin/all-bids', 'AdminBidController@index')->name('all-bids');

  //Game Mgmt
Route::get('/admin/game', 'GameController@index')->name('game');
Route::post('/admin/addGame', 'GameController@addGame')->name('addGame');
Route::get('/admin/game/{id}', 'GameController@editGame')->name('editGame');
Route::post('/admin/update-game/{id}', 'GameController@updateGame')->name('update-game');


Route::get('/admin/game-times', 'GameController@indexGameTimes')->name('game-times');
Route::post('/admin/addGameTime', 'GameController@addGameTime')->name('addGameTime');
Route::get('/admin/game-times/{id}', 'GameController@editGameTime')->name('editGameTime');
Route::post('/admin/update-game-time/{id}', 'GameController@updateGameTime')->name('update-game-time');

Route::get('/admin/game-number', 'GameController@indexGameNumber')->name('game-number');
Route::post('/admin/addGameNumber', 'GameController@addGameNumber')->name('addGameNumber');
Route::get('/admin/game-number/{id}', 'GameController@editGameNumber')->name('editGameNumber');
Route::post('/admin/update-game-number/{id}', 'GameController@updateGameNumber')->name('update-game-number');

Route::get('/admin/game-commission', 'GameController@indexGameCommission')->name('game-commission');
Route::get('/admin/game-win-result', 'GameController@indexWinResult')->name('game-win-result');
Route::get('/admin/game-bids', 'GameController@indexGameBids')->name('game-bids');
Route::get('/admin/points-transaction-history', 'GameController@indexPointTransaction')->name('points-transaction-history');

Route::post('/admin/search-win', 'GameController@searchWin')->name('search-win');
Route::post('/admin/search-bid', 'GameController@searchBid')->name('search-bid');
Route::post('/admin/search-commission', 'GameController@searchCommission')->name('search-commission');

Route::post('/admin/game-number-result/{id}', 'GameController@gameResultDeclare')->name('game-number-result');


Route::get('/admin/admin-points-history', 'GameController@indexAdminPointTransaction')->name('admin-points-history');
Route::get('/admin/admin-points-transfer', 'GameController@indexAdminPointTransfer')->name('admin-points-transfer');
Route::get('/admin/admin-points-receive', 'GameController@indexAdminPointReceive')->name('admin-points-receive');
//Route::post('/admin/search-transaction', 'GameController@searchPointsTransaction')->name('search-points-commission');
Route::post('/point-transfer-admin', 'GameController@pointTransferRequest')->name('pointTransferRequest');

Route::post('/point-receive-admin', 'GameController@pointReceiveUpdate')->name('pointReceiveRequest');

});
