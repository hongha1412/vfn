<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Common\Message;
use App\Http\Controllers\Common\PasswordHasher;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/';

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
        // Validate login info
        $rules = array(
            'username'      => 'required|string|min:6',
            'password'      => 'required|string|min:6',
        );

        // Run validator
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return (new Message(false, $validator->messages()->all()))->toJson();
        }

        $hasher = new PasswordHasher();
        $userData = array(
            'username'      => Input::get('username'),
            'password'      => $hasher->encrypt(Input::get('password'))
        );

        try {
            if (Auth::attempt($userData)) {
                return response((new Message(true, 'Login Success'))->toJson(), 200);
            } else {
                return response((new Message(false, 'Login Information Invalid'))->toJson(), 500);
            }
        } catch (\Exception $ex) {
            return response((new Message(false, $ex->getMessage()))->toJson(), 500);
        }
    }
}
