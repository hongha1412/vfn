<?php

namespace App\Models;

use App\Enum\PackageType;
use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    protected $table = 'vip';
    public $timestamps = false;
    protected $fillable = [
        'idfb',
        'fbname',
        'userid',
        'package',
        'type',
        'expiretime',
        'speed',
        'reacttype',
        'limitpost',
        'note',
        'cmtcontent',
    ];

    public function account() {
        return $this->belongsTo(Account::class, 'userid', 'id');
    }

    public function package() {
        return $this->belongsTo(Package::class, 'package', 'id');
    }

    public static function getVipLikeList() {
        return Vip::where('package', '>', '0')
            ->where('type', '=', PackageType::LIKE)->inRandomOrder()->get();
    }

    public static function getVipCommentList() {
        return Vip::where('package', '>', '0')
            ->where('type', '=', PackageType::COMMENT)->inRandomOrder()->get();
    }

    public static function getVipShareList() {
        return Vip::where('package', '>', '0')
            ->where('type', '=', PackageType::SHARE)->inRandomOrder()->get();
    }

    public static function getVipReactList() {
        return Vip::where('package', '>', '0')
            ->where('type', '=', PackageType::REACT)->inRandomOrder()->get();
    }

    public static function getVipLikeByFbId($fbId) {
        return Vip::with(['account' => function($query) {
            $query->select(['id', 'username']);
        }])->where('idfb', '=', $fbId)->where('type', '=', PackageType::LIKE)->get();
    }

    public static function getVipCommentByFbId($fbId) {
        return Vip::with(['account' => function($query) {
            $query->select(['id', 'username']);
        }])->where('idfb', '=', $fbId)->where('type', '=', PackageType::COMMENT)->get();
    }

    public static function getVipShareByFbId($fbId) {
        return Vip::with(['account' => function($query) {
            $query->select(['id', 'username']);
        }])->where('idfb', '=', $fbId)->where('type', '=', PackageType::SHARE)->get();
    }

    public static function getVipReactByFbId($fbId) {
        return Vip::with(['account' => function($query) {
            $query->select(['id', 'username']);
        }])->where('idfb', '=', $fbId)->where('type', '=', PackageType::REACT)->get();
    }

    public static function getVipLikeByUserId($userId) {
        return Vip::with('package')->where('userid', '=', $userId)
            ->where('type', '=', PackageType::LIKE)->get();
    }

    public static function getVipCommentByUserId($userId) {
        return Vip::with('package')->where('userid', '=', $userId)
            ->where('type', '=', PackageType::COMMENT)->get();
    }

    public static function getVipShareByUserId($userId) {
        return Vip::with('package')->where('userid', '=', $userId)
            ->where('type', '=', PackageType::SHARE)->get();
    }

    public static function getVipReactByUserId($userId) {
        return Vip::with('package')->where('userid', '=', $userId)
            ->where('type', '=', PackageType::REACT)->get();
    }

    public static function getVipByPackage($packageId) {
        return Vip::where('package', '=', $packageId)->get();
    }

    public static function getVipBySpeed($speedId) {
        return Vip::where('speed', '=', $speedId)->get();
    }
}
