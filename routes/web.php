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
});

Route::group(['domain' => $domain], function () {

    // Index register
    Route::get('/register/index', 'Auth\RegisterController@index')->name('guest.register.index');
    // Get token tool => Not recommend to develope
    Route::get('/get-token', 'Guest\GetTokenController@index')->name('guest.getToken');
    // Get token process controller
    Route::post('/get-token-process', 'Guest\GetTokenController@process')->name('guest.getTokenProcess');
    // Price
    Route::get('/price', 'PriceController@index')->name('guest.price');
    // Home
    Route::get('/', 'Guest\HomeController@index')->name('guest.index');
    // API
    // Login
    Route::post('/login', 'Auth\LoginController@guestLogin')->name('guest.login');
    // Register
    Route::post('/register', 'Auth\RegisterController@guestRegister')->name('guest.register');
    // Get logged in user info
    Route::post('/get-logged-in-user-info', 'Guest\UserController@getLoggedInUserInfo')->name('guest.getLoggedInUserInfo');

    Route::group(['prefix' => '/', 'middleware' => ['sessionTimeout', 'checkPermissionGuest']], function () {
        // User Info
        Route::get('/user', 'Guest\UserController@index')->name('guest.userIndex');
        // Change Password
        Route::get('/changePassword', 'Auth\ChangePasswordController@guestChangePassword')->name('guest.changePassword');
        // API
        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('guest.logout');
    });
});