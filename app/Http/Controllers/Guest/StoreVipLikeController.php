<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Common\Message;
use App\Models\DayPackage;
use App\Models\LikePackage;
use App\Models\LikePrice;
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
        $likePackage = LikePackage::getPackageById(Input::get('likePackage'));
        $dayPackage = DayPackage::getPackageById(Input::get('dayPackage'));
        if ($likePackage === null || $dayPackage === null) {
            return response((new Message(false, 'Dữ liệu không đúng'))->toJson(), 200);
        }

        // Get price from day package and like package
        $price = LikePrice::getPriceByPackage($likePackage, $dayPackage);

        if ($price === null) {
            return response((new Message(false, 'Không có giá tiền tương ứng với gói hiện tại'))->toJson(), 200);
        }

        return response((new Message(true, $price[0]))->toJson(), 200);
    }
}
