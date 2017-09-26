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

    /**
     * Login user
     *
     * @param Request $loginRequest
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function guestLogin(Request $loginRequest) {
        // Validate login info
        $rules = array(
            'username'      => 'required|string|min:6',
            'password'      => 'required|string|min:6',
        );

        // Run validator
        $validator = Validator::make(Input::all(), $rules);

        // Validate input
        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Create user data from input
        $hasher = new PasswordHasher();
        $userData = array(
            'username'      => Input::get('username'),
            'password'      => $hasher->encrypt(Input::get('password'))
        );

        try {
            // Log user in
            if (Auth::attempt($userData)) {
                return response((new Message(true, 'Login Success'))->toJson(), 200);
            } else {
                return response((new Message(false, 'Login Information Invalid'))->toJson(), 200);
            }
        } catch (\Exception $ex) {
            return response((new Message(false, $ex->getMessage()))->toJson(), 200);
        }
    }

    /**
     * Logout user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function logout(Request $request)
    {
        // Check if user logged in
        if (Auth::check() && Auth::id() > 0) {
            // Execute logout
            Auth::logout();
            return redirect()->route('guest.index');
        } else {
            return redirect()->route('guest.index')->withErrors(['Message' => 'User not logged in']);
        }
    }
}
