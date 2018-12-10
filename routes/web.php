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

Route::get('/', 'MemberController@index')->name('sitehome');
Route::get('/game', 'UserBidController@getGame')->name('game');
Route::get('/point-transfer', 'TransactionController@pointTransfer');
Route::post('/point-transfer-request', 'TransactionController@pointTransferRequest');

Route::get('admin/dashboard', 'DashboardController@myHome')->name('dashboard');
Route::get('admin/test', 'DashboardController@test');
//Route::get('admin/users/create', 'UserController@userCreate');
//Route::get('admin/users', 'UserController@index');
Route::get('/login1', 'UserBidController@getGame');
Route::get('/redirect', 'UserController@redirectUser')->name('redirect');


Route::resource('admin/users', 'UserController', [
    'names' => [
        'index'   => 'users',
        'destroy' => 'user.destroy',
    ],
    'except' => [
        'deleted',
    ],
]);


Route::get('/home', 'HomeController@index')->name('home');

Route::post('search-users', 'UserController@search')->name('search-users');
