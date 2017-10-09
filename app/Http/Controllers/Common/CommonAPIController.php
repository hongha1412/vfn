<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CommonAPIController extends Controller
{
    public function getFacebookUserInfo(Request $request) {
        $resultData = array();

        // Check valid data
        $validator = Validator::make($request->all(), [
            'fbURL' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Check valid URL format
        $fbURLPattern = '/(?:http:\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(\d.*))?([\w\-]*)?/';
        if (!preg_match($fbURLPattern, Input::get('fbURL'), $matches)) {
            return response((new Message(false, 'Định dạng URL không đúng'))->toJson(), 200);
        }

        // Get facebook site
        $options  = array('http' => array('user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.53 Safari/525.19'));
        $context = stream_context_create($options);
        try {
            $fbsite = file_get_contents(Input::get('fbURL'), false, $context);
        } catch(\Exception $ex) {
            return response((new Message(false, $ex->getMessage()))->toJson(), 200);
        }

        // Get facebook id
        $fbIDPattern = '/\"entity_id\":\"(\d+)\"/';
        if (!preg_match($fbIDPattern, $fbsite, $matches)) {
            return response((new Message(false, 'Không thể lấy thông tin facebook user id'))->toJson(), 200);
        }
        $resultData['fbid'] = $matches[1];

        // Get facebook name
        $fbUserPattern = '/\"setPageTitle\",\[\],\["([[:ascii:]]+)\",false\]/';
        if (!preg_match($fbUserPattern, $fbsite, $matches)) {
            return response((new Message(false, 'Không thể lấy thông tin tên facebook'))->toJson(), 200);
        }
        $resultData['fbname'] = $matches[1];

        return response((new Message(true, $resultData))->toJson(), 200);
    }
}
