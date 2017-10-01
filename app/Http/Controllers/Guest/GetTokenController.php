<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Common\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GetTokenController extends Controller
{
    public function index() {
        return view('guest.get_token.index');
    }

    public function process(Request $request) {
        $data = array(
            "api_key" => "3e7c78e35a76a9299309885393b02d97",
            "email" => Input::get('user'),
            "format" => "JSON",
            "locale" => "vi_vn",
            "method" => "auth.login",
            "password" => Input::get('pass'),
            "return_ssl_resources" => "0",
            "v" => "1.0"
        );
        $data = sign_creator($data);
        return response((new Message(true, http_build_query($data)))->toJson(), 200);
    }

    public function sign_creator($data){
        $sig = "";
        foreach($data as $key => $value){
            $sig .= "$key=$value";
        }
        $sig .= 'c1e620fa708a1d5696fb991c1bde5662';
        $sig = md5($sig);
        return $data['sig'] = $sig;
    }
}
