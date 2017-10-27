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
// package
Route::get('admin/package', 'Admin\PackageController@index');
Route::get('admin/allpackage', 'Admin\PackageController@findAll');
Route::put('admin/package/{id}', 'Admin\PackageController@update');
Route::post('admin/package', 'Admin\PackageController@store');
Route::delete('admin/package/{id}', 'Admin\PackageController@destroy');
// day package
Route::get('admin/daypackage', 'Admin\DayPackageController@index');
Route::get('admin/alldaypackage', 'Admin\DayPackageController@findAll');
Route::put('admin/daypackage/{id}', 'Admin\DayPackageController@update');
Route::post('admin/daypackage', 'Admin\DayPackageController@store');
Route::delete('admin/daypackage/{id}', 'Admin\DayPackageController@destroy');
// speed
Route::get('admin/speed', 'Admin\SpeedController@index');
Route::put('admin/speed/{id}', 'Admin\SpeedController@update');
Route::post('admin/speed', 'Admin\SpeedController@store');
Route::delete('admin/speed/{id}', 'Admin\SpeedController@destroy');
// price
Route::get('admin/price', 'Admin\PriceController@index');
Route::put('admin/price/{id}', 'Admin\PriceController@update');
Route::post('admin/price', 'Admin\PriceController@store');
Route::delete('admin/price/{id}', 'Admin\PriceController@destroy');
// token
Route::get('admin/token', 'Admin\TokenController@index');
Route::put('admin/token/{id}', 'Admin\TokenController@update');
Route::post('admin/token', 'Admin\TokenController@store');
Route::delete('admin/token/{id}', 'Admin\TokenController@destroy');
Route::post('admin/token/removemultiple', 'Admin\TokenController@destroyMultiple');