<?php

namespace App\Http\Controllers\Common;

use App\Enum\PackageType;
use App\Http\Controllers\Common\VO\VipOutVO;
use App\Models\Account;
use App\Models\DayPackage;
use App\Models\Package;
use App\Models\Price;
use App\Models\Speed;
use App\Models\Vip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $fbUserPattern = '/\"setPageTitle\",\[\],\["([^"]+)\",false\]/';
        if (!preg_match($fbUserPattern, $fbsite, $matches)) {
            return response((new Message(false, 'Không thể lấy thông tin tên facebook'))->toJson(), 200);
        }
        $resultData['fbname'] = $matches[1];

        return response((new Message(true, $resultData))->toJson(), 200);
    }

    public function getPackage(Request $request) {
        $result = array();

        if (!is_null(Input::get('packageType'))) {
            switch (intval(Input::get('packageType'))) {
                case PackageType::LIKE:
                    $result['likePackage'] = Package::getPackageByType(PackageType::LIKE);
                    break;
                case PackageType::COMMENT:
                    $result['commentPackage'] = Package::getPackageByType(PackageType::COMMENT);
                    break;
                case PackageType::SHARE:
                    $result['sharePackage'] = Package::getPackageByType(PackageType::SHARE);
                    break;
                case PackageType::REACT:
                    $result['reactPackage'] = Package::getPackageByType(PackageType::REACT);
                    break;
            }
        }
        $result['dayPackage'] = DayPackage::all();

        return response((new Message(true, $result))->toJson(), 200);
    }

    public function getSpeed(Request $request) {
        return response((new Message(true, Speed::getSpeedByType(Input::get('type'))))->toJson(), 200);
    }

    /**
     * Check valid like, day, price package info
     *
     * @param $selectedLikePackage
     * @param $selectedDayPackage
     * @return Message: fail | Price: success
     */
    public static function checkValidPackage($selectedLikePackage, $selectedDayPackage) {
        // Validate data in database
        $dayPackage = DayPackage::getPackageById($selectedDayPackage);

        // Check package type
        $package = Package::getPackageById($selectedLikePackage);
        if ($package === null || $dayPackage === null) {
            return new Message(false, 'Dữ liệu không đúng');
        }

        // Get price from day package and like package
        $price = Price::getPriceByPackage($package, $dayPackage);
        if ($price === null) {
            return new Message(false, 'Không có giá tiền tương ứng với gói hiện tại');
        }

        return $price;
    }

    /**
     * Check funds account
     *
     * @param $money money to charge
     * @return Message: fail | \Illuminate\Foundation\Auth\User: logged in user info
     */
    public static function checkFundsAccount($money) {
        $loggedUser = Account::getUserByUsername(Auth::user()->username)[0];
        if ($loggedUser->vnd < $money) {
            return new Message(false, 'Tài khoản không đủ tiền để mua gói này');
        }

        return $loggedUser;
    }

    /**
     * Calculate charge money
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function calculate(Request $request) {
        $rule = array();
        $packageValue = -1;

        $rule['dayPackage'] = 'required|numeric';
        if (!is_null(Input::get('likePackage'))) {
            $rule['likePackage'] = 'required|numeric';
            $packageValue = Input::get('likePackage');
        } else if (!is_null(Input::get('cmtPackage'))) {
            $rule['cmtPackage'] = 'required|numeric';
            $packageValue = Input::get('cmtPackage');
        } else if (!is_null(Input::get('sharePackage'))) {
            $rule['sharePackage'] = 'required|numeric';
            $packageValue = Input::get('sharePackage');
        } else if (!is_null(Input::get('reactPackage'))) {
            $rule['reactPackage'] = 'required|numeric';
            $packageValue = Input::get('reactPackage');
        }

        // Check valid data
        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }

        // Validate data in database
        $result = CommonAPIController::checkValidPackage($packageValue, Input::get('dayPackage'));
        if ($result instanceof Message) {
            return response($result->toJson(), 200);
        }

        return response((new Message(true, $result[0]))->toJson(), 200);
    }

    /**
     * Get list vip of logged in user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function listVipID(Request $request) {
        $vipOutVO = new VipOutVO();

        if (!is_null(Input::get('packageType'))) {
            switch (Input::get('packageType')) {
                case PackageType::LIKE:
                    $vipOutVO->setLsVipLike(Vip::getVipLikeByUserId(Auth::id()));
                    break;
                case PackageType::COMMENT:
                    $vipOutVO->setLsVipComment(Vip::getVipCommentByUserId(Auth::id()));
                    break;
                case PackageType::SHARE:
                    $vipOutVO->setLsVipShare(Vip::getVipShareByUserId(Auth::id()));
                    break;
                case PackageType::REACT:
                    $vipOutVO->setLsVipReact(Vip::getVipReactByUserId(Auth::id()));
                    break;
            }
        }

        return response((new Message(true, $vipOutVO))->toJson(), 200);
    }
}
