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
Route::put('admin/viplike/{id}', 'Admin\VipController@update');
Route::delete('admin/viplike/{id}', 'Admin\VipController@destroy');
// vip cmt
Route::get('admin/vipcmt', 'Admin\VipCmtController@index');
Route::put('admin/vipcmt/{id}', 'Admin\VipCmtController@update');
Route::delete('admin/vipcmt/{id}', 'Admin\VipCmtController@destroy');
// vip share
Route::get('admin/vipshare', 'Admin\VipShareController@index');
Route::put('admin/vipshare/{id}', 'Admin\VipShareController@update');
Route::delete('admin/vipshare/{id}', 'Admin\VipShareController@destroy');
// cam xuc
Route::get('admin/camxuc', 'Admin\CamXucController@index');
Route::delete('admin/camxuc/{id}', 'Admin\CamXucController@destroy');
// log card
Route::get('admin/logcard', 'Admin\LogCardController@index');
// gift code
Route::get('admin/giftcode', 'Admin\GiftLikeController@index');
Route::post('admin/giftcode', 'Admin\GiftLikeController@store');
Route::put('admin/giftcode/{id}', 'Admin\GiftLikeController@update');
Route::delete('admin/giftcode/{id}', 'Admin\GiftLikeController@destroy');
// notice
Route::get('admin/notice', 'Admin\NoticeController@index');
Route::put('admin/notice/{id}', 'Admin\NoticeController@update');
Route::post('admin/notice', 'Admin\NoticeController@store');
