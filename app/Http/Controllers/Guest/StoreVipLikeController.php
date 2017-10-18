<?php

namespace App\Http\Controllers\Guest;

use App\Enum\PackageType;
use App\Http\Controllers\Common\CommonAPIController;
use App\Http\Controllers\Common\Message;
use App\Models\DayPackage;
use App\Models\Vip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class StoreVipLikeController extends Controller
{
    public function index() {
        return view('guest.store_viplike.index');
    }

    public function init(Request $request) {

    }

    /**
     * Action buy vip like package
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function buyVipLike(Request $request) {
        // Check valid data
        $validator = Validator::make($request->all(), [
            'package'   => 'required|numeric',
            'dayPackage'    => 'required|numeric',
            'fbId'          => 'required|string|max:50',
            'fbName'        => 'required|string',
            'speed'     => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Validate data in database
        $packageResult = CommonAPIController::checkValidPackage(PackageType::LIKE, Input::get('package'), Input::get('dayPackage'));
        if ($packageResult instanceof Message) {
            return response($packageResult->toJson(), 200);
        }

        // Check funds
        $fundsResult = CommonAPIController::checkFundsAccount($packageResult[0]->vnd);
        if ($fundsResult instanceof Message) {
            return response($fundsResult->toJson(), 200);
        }

        // Check exists in vip table
        $vip = Vip::getVipLikeByFbId(Input::get('fbId'));
        if (count($vip) > 0) {
            $existsMessage = $vip[0]->account->id === Auth::id() ? 'Facebook này đã được đăng ký' :
                'Facebook này đã được đăng ký bởi ' . $vip[0]->account->username;

            return response((new Message(false, $existsMessage))->toJson(), 200);
        }

        // Insert vip like table
        $vip = Vip::create([
            'idfb'          => Input::get('fbId'),
            'fbname'        => Input::get('fbName'),
            'userid'        => $fundsResult->id,
            'package'       => Input::get('package'),
            'type'          => PackageType::LIKE,
            'expiretime'    => Carbon::now()->addDays(DayPackage::getPackageById(Input::get('dayPackage'))->daytotal),
            'speed'         => Input::get('speed'),
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
