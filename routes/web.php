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

Route::get('/', 'MemberController@index');
Route::get('/game', 'UserBidController@getGame');

Route::get('admin/dashboard', 'DashboardController@myHome');
Route::get('admin/test', 'DashboardController@test');

Route::get('admin/user/create', 'DashboardController@userCreate');
Route::get('admin/user/manage', 'DashboardController@userManage');
