<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Common\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {

    }

    /**
     * Get logged in user info
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getLoggedInUserInfo() {
        // Check login and id valid
        if (Auth::check() && Auth::id() > 0) {
            return response((new Message(true, json_encode(Auth::user())))->toJson(), 200);
        } else {
            return response((new Message(false, "User not login or user id invalid"))->toJson(), 500);
        }
    }
}
