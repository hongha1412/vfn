<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreVipLikeController extends Controller
{
    public function index() {
        return view('guest.store_viplike.index');
    }

    public function init(Request $request) {

    }
}
