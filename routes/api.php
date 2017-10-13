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

Route::get('admin/account', 'Admin\AccountController@index');
Route::get('admin/viplike', 'Admin\VipController@index');
Route::get('admin/vipcmt', 'Admin\VipCmtController@index');
Route::get('admin/vipshare', 'Admin\VipShareController@index');
Route::get('admin/logcard', 'Admin\LogCardController@index');
Route::get('admin/camxuc', 'Admin\CamXucController@index');
