<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RechargeController extends Controller
{
    public function index() {
        return view('guest.recharge.index');
    }
}
