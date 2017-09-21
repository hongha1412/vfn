<?php

namespace App\Http\Controllers\Guest;

use App\Console\Commands\CronJob\FacebookAuto;
use App\Enum\FacebookActionEnum;
use App\Enum\LikePackageEnum;
use App\Models\Token;
use App\Models\Vip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index() {
        $lsUser = Vip::getVipList();

        foreach ($lsUser as $user) {
            $fbAutoLike = new FacebookAuto();
            $fbAutoLike->lsToken = Token::getTokenList();
            $fbAutoLike->userId = $user->idfb;
            $fbAutoLike->targetNumber = LikePackageEnum::idToValue($user->goi);
            $fbAutoLike->action = FacebookActionEnum::LIKE;
            $fbAutoLike->run();
        }
        return view('guest.home.index');
    }
}
