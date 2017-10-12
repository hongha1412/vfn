<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Common\CommonAPIController;
use App\Http\Controllers\Common\Message;
use App\Models\DayPackage;
use App\Models\Vip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class StoreVipLikeController extends Controller
{
    public function index() {
        return view('guest.store_viplike.index');
    }

    public function init(Request $request) {

    }

    public function calculate(Request $request) {
        // Check valid data
        $validator = Validator::make($request->all(), [
            'likePackage' => 'required|numeric',
            'dayPackage' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Validate data in database
        $result = CommonAPIController::checkValidPackage(Input::get('likePackage'), Input::get('dayPackage'));
        if ($result instanceof Message) {
            return response($result->toJson(), 200);
        }

        return response((new Message(true, $result[0]))->toJson(), 200);
    }

    public function buyVipLike(Request $request) {
        // Check valid data
        $validator = Validator::make($request->all(), [
            'likePackage'   => 'required|numeric',
            'dayPackage'    => 'required|numeric',
            'fbId'          => 'required|string|max:50',
            'fbName'        => 'required|string',
            'likeSpeed'     => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Validate data in database
        $packageResult = CommonAPIController::checkValidPackage(Input::get('likePackage'), Input::get('dayPackage'));
        if ($packageResult instanceof Message) {
            return response($packageResult->toJson(), 200);
        }

        // Check funds
        $fundsResult = CommonAPIController::checkFundsAccount($packageResult[0]->vnd);
        if ($fundsResult instanceof Message) {
            return response($fundsResult->toJson(), 200);
        }

        // Insert vip like table
        $vip = Vip::create([
            'idfb'          => Input::get('fbId'),
            'fbname'        => Input::get('fbName'),
            'userid'        => $fundsResult->id,
            'package'       => Input::get('likePackage'),
            'expiretime'    => Carbon::now()->addDays(DayPackage::getPackageById(Input::get('dayPackage'))->daytotal),
            'likespeed'     => Input::get('likeSpeed'),
            'note'          => Input::get('note') ? Input::get('note') : '',
        ]);

        // Update account
        if ($vip) {
            $fundsResult->vnd -= $packageResult[0]->vnd;
            $fundsResult->save();
        } else {
            return response((new Message(false, 'Không thể đăng ký gói vip like, vui lòng thử lại sau'))->toJson(), 200);
        }

        return response((new Message(true, 'Đăng ký gói vip like thành công'))->toJson(), 200);
    }
}
