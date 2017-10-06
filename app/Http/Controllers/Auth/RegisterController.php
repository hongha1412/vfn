<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Common\Message;
use App\Http\Controllers\Common\PasswordHasher;
use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create user
     *
     * @param Request $registerRequest
     * @return Message
     */
    protected function guestRegister(Request $registerRequest)
    {
        // Check valid data
        $validator = Validator::make($registerRequest->all(), [
            'fullname' => 'string|max:50',
            'email' => 'required|string|email|max:255',
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return (new Message(false, $validator->messages()->all()))->toJson();
        }

        // Create account
        $hasher = new PasswordHasher();
        $account = Account::create([
            'fullname'      => Input::get('fullname'),
            'mail'          => strtolower(Input::get('email')),
            'username'      => strtolower(Input::get('username')),
            'password'      => Hash::make($hasher->encrypt(Input::get('password'))),
        ]);

        if ($account) {
            return response((new Message(true, 'Register account success'))->toJson(), 200);
        } else {
            return response((new Message(false, 'Cannot create account'))->toJson(), 200);
        }
    }

    protected function index() {
        return view('guest.register.index');
    }
}
