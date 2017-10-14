<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// account
Route::get('admin/account', 'Admin\AccountController@index');
Route::delete('admin/account/{id}', 'Admin\AccountController@destroy');
Route::put('admin/account/congtien/{id}', 'Admin\AccountController@updateVnd');
Route::put('admin/account/themid/{id}', 'Admin\AccountController@updateToiDa');
// vip
Route::get('admin/viplike', 'Admin\VipController@index');
Route::delete('admin/viplike/{id}', 'Admin\VipController@destroy');
// vip cmt
Route::get('admin/vipcmt', 'Admin\VipCmtController@index');
Route::delete('admin/vipcmt/{id}', 'Admin\VipCmtController@destroy');
// vip share
Route::get('admin/vipshare', 'Admin\VipShareController@index');
Route::delete('admin/vipshare/{id}', 'Admin\VipShareController@destroy');
// cam xuc
Route::get('admin/camxuc', 'Admin\CamXucController@index');
Route::delete('admin/camxuc/{id}', 'Admin\CamXucController@destroy');
// log card
Route::get('admin/logcard', 'Admin\LogCardController@index');
