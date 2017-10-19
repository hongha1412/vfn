<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view("admin.dashboard.index");
    }

    public function giftcode() {
        return view("admin.giftcode.index");
    }

    public function notice() {
        return view("admin.notice.index");
    }

    public function package() {
        return view("admin.package.index");
    }
}
