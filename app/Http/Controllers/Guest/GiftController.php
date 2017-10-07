<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Common\Message;
use App\Models\Account;
use App\Models\GiftLike;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class GiftController extends Controller
{
    public function index() {
        return view('guest.gift.index');
    }

    public function gift(Request $request) {
        // Check valid data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50',
            'giftCode' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Check valid gift code
        $giftLike = GiftLike::getValidGiftCode(Input::get('giftCode'));
        if (count($giftLike) > 0) {
            $giftLike = $giftLike[0];
            // Get user info
            $userInfo = Account::getUserByUsername(Auth::user()->username);
            if (count($userInfo) > 0) {
                $userInfo = $userInfo[0];
            } else {
                return response((new Message(false, 'Cannot get user info'))->toJson(), 200);
            }
            // Add funds to user
            $userInfo->vnd += $giftLike->amount;
            $userInfo->save();
            // Update status gift card
            $giftLike->userid = $userInfo->id;
            $giftLike->usedtime = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $giftLike->save();
            // Return success message
            return response((new Message(true, 'Bạn đã nhận thành công mã gift LIKEFB mệnh giá ' . $giftLike->amount . ' VNĐ'))->toJson(), 200);
        }
        // Gift code used or not valid
        else {
            return response((new Message(false, 'Mã Sai Hoặc Đã Được Sử Dụng!'))->toJson(), 200);
        }
    }

    public function giftLog() {
        $giftLog = GiftLike::getLogByUserId(Auth::id());
        return response((new Message(true, json_encode($giftLog)))->toJson(), 200);
    }
}
