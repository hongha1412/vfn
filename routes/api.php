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

$domainName = env('APP_DOMAIN_NAME');
$domain = env('APP_DOMAIN');
$adminDomain = $domainName . 'admin.' . $domain;

Route::group(['domain' => $adminDomain], function () {
    // account
    Route::get('account', 'Admin\AccountController@index');
    Route::delete('account/{id}', 'Admin\AccountController@destroy');
    Route::put('account/congtien/{id}', 'Admin\AccountController@updateVnd');
    Route::put('account/themid/{id}', 'Admin\AccountController@updateToiDa');
    // vip
    Route::get('viplike', 'Admin\VipController@index');
    Route::put('viplike/{id}', 'Admin\VipController@update');
    Route::delete('viplike/{id}', 'Admin\VipController@destroy');
    // vip cmt
    Route::get('vipcmt', 'Admin\VipCmtController@index');
    Route::put('vipcmt/{id}', 'Admin\VipCmtController@update');
    Route::delete('vipcmt/{id}', 'Admin\VipCmtController@destroy');
    // vip share
    Route::get('vipshare', 'Admin\VipShareController@index');
    Route::put('vipshare/{id}', 'Admin\VipShareController@update');
    Route::delete('vipshare/{id}', 'Admin\VipShareController@destroy');
    // cam xuc
    Route::get('camxuc', 'Admin\CamXucController@index');
    Route::delete('camxuc/{id}', 'Admin\CamXucController@destroy');
    // log card
    Route::get('logcard', 'Admin\LogCardController@index');
    // gift code
    Route::get('giftcode', 'Admin\GiftLikeController@index');
    Route::post('giftcode', 'Admin\GiftLikeController@store');
    Route::put('giftcode/{id}', 'Admin\GiftLikeController@update');
    Route::delete('giftcode/{id}', 'Admin\GiftLikeController@destroy');
    // notice
    Route::get('notice', 'Admin\NoticeController@index');
    Route::put('notice/{id}', 'Admin\NoticeController@update');
    Route::post('notice', 'Admin\NoticeController@store');
    // package
    Route::get('package', 'Admin\PackageController@index');
    Route::get('allpackage', 'Admin\PackageController@findAll');
    Route::put('package/{id}', 'Admin\PackageController@update');
    Route::post('package', 'Admin\PackageController@store');
    Route::delete('package/{id}', 'Admin\PackageController@destroy');
    // day package
    Route::get('daypackage', 'Admin\DayPackageController@index');
    Route::get('alldaypackage', 'Admin\DayPackageController@findAll');
    Route::put('daypackage/{id}', 'Admin\DayPackageController@update');
    Route::post('daypackage', 'Admin\DayPackageController@store');
    Route::delete('daypackage/{id}', 'Admin\DayPackageController@destroy');
    // speed
    Route::get('speed', 'Admin\SpeedController@index');
    Route::put('speed/{id}', 'Admin\SpeedController@update');
    Route::post('speed', 'Admin\SpeedController@store');
    Route::delete('speed/{id}', 'Admin\SpeedController@destroy');
    // price
    Route::get('price', 'Admin\PriceController@index');
    Route::put('price/{id}', 'Admin\PriceController@update');
    Route::post('price', 'Admin\PriceController@store');
    Route::delete('price/{id}', 'Admin\PriceController@destroy');
    // token
    Route::get('token', 'Admin\TokenController@index');
    Route::put('token/{id}', 'Admin\TokenController@update');
    Route::post('token', 'Admin\TokenController@store');
    Route::delete('token/{id}', 'Admin\TokenController@destroy');
    Route::post('token/removemultiple', 'Admin\TokenController@destroyMultiple');
});