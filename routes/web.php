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
use Illuminate\Support\Facades\Route;

$domainName = env('APP_DOMAIN_NAME');
$domain = env('APP_DOMAIN');
$adminDomain = $domainName . 'admin.' . $domain;

App::setLocale('en');

Route::group(['domain' => $adminDomain], function () {

    // Login action
    Route::get('/login', 'Auth\LoginController@adminLogin')->name('admin.login');

    Route::group(['prefix' => '/', 'middleware' => ['sessionTimeout', 'checkPermissionAdmin']], function () {
    });

    // Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
});

Route::group(['domain' => $domain], function () {

    // Index register
    Route::get('/register', 'Auth\RegisterController@index')->name('guest.register.index');
    // Get token tool => Not recommend to develope
    Route::get('/get-token', 'Guest\GetTokenController@index')->name('guest.getToken');
    // Price
    Route::get('/price', 'Guest\PriceController@index')->name('guest.price');
    // Home
    Route::get('/', 'Guest\HomeController@index')->name('guest.index');
    // API
    // Login
    Route::post('/login', 'Auth\LoginController@guestLogin')->name('guest.login');
    // Register
    Route::post('/register-process', 'Auth\RegisterController@guestRegister')->name('guest.register');
    // Get logged in user info
    Route::post('/get-logged-in-user-info', 'Guest\UserController@getLoggedInUserInfo')->name('guest.getLoggedInUserInfo');
    // Get token process controller
    Route::post('/get-token-process', 'Guest\GetTokenController@process')->name('guest.getTokenProcess');

    Route::group(['prefix' => '/', 'middleware' => ['sessionTimeout', 'checkPermissionGuest']], function () {
        // User Info
        Route::get('/user', 'Guest\UserController@index')->name('guest.userIndex');
        // Change Password
        Route::get('/change-password', 'Auth\ChangePasswordController@guestChangePassword')->name('guest.changePassword');
        // Recharge
        Route::get('/recharge', 'Guest\RechargeController@index')->name('guest.recharge');
        // Gift
        Route::get('/gift', 'Guest\GiftController@index')->name('guest.gift');
        // Store vip like
        Route::get('/store-viplike', 'Guest\StoreVipLikeController@index')->name('guest.storeVipLike');
        // API
        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('guest.logout');
        // Process recharge
        Route::post('/recharge-process', 'Guest\RechargeController@process')->name('guest.rechargeProcess');
        // Get recharge log
        Route::post('/recharge-log', 'Guest\RechargeController@getRechargeLog')->name('guest.rechargeLog');
        // Process gift
        Route::post('/gift-process', 'Guest\GiftController@gift')->name('guest.giftProcess');
        // Gift log
        Route::post('/gift-log', 'Guest\GiftController@giftLog')->name('guest.giftLog');
        // Store vip like init data
        Route::get('/store-viplike-init', 'Guest\StoreVipLikeController@init')->name('guest.storeVipLikeInit');
    });
});