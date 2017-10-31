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

    public function daypackage() {
        return view("admin.daypackage.index");
    }

    public function speed() {
        return view("admin.speed.index");
    }

    public function price() {
        return view("admin.price.index");
    }

    public function token() {
        return view("admin.token.index");
    }

    public function tokenkiemtra() {
        return view("admin.token.check");
    }

    public function tokenreport() {
        return view("admin.token.report");
    }
}
