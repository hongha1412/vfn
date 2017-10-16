<?php

namespace App\Http\Controllers\Guest;

use App\Enum\PackageType;
use App\Http\Controllers\Common\CommonAPIController;
use App\Http\Controllers\Common\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StoreVipCmtController extends Controller
{
    public function index() {
        return view('guest.store_vipcmt.index');
    }

    /**
     * Calculate charge money
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function calculate(Request $request) {
        // Check valid data
        $validator = Validator::make($request->all(), [
            'cmtPackage' => 'required|numeric',
            'dayPackage' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Validate data in database
        $result = CommonAPIController::checkValidPackage(PackageType::COMMENT, Input::get('cmtPackage'), Input::get('dayPackage'));
        if ($result instanceof Message) {
            return response($result->toJson(), 200);
        }

        return response((new Message(true, $result[0]))->toJson(), 200);
    }
}
