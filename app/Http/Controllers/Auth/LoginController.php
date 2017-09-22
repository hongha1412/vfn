<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Utils\Message;
use App\Http\Utils\PasswordHasher;
use App\Models\Account;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function guestLogin(Request $loginRequest) {
        $hasher = new PasswordHasher();
        $accountInfo = Account::login($loginRequest->username, $hasher->encrypt($loginRequest->password));
        if ($accountInfo) {
            return (new Message(true, 'Login Success'))->toJson();
        } else {
            return (new Message(false, 'Login Information Invalid'))->toJson();
        }
    }
}
