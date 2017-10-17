<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VipCmt extends Model
{
    protected $table = 'vipcmt';
    public $timestamps = false;
    protected $fillable = [
        'idfb',
        'name',
        'user',
        'noidung',
        'goi',
        'time',
        'socmt',
        'limitpost',
    ];

    public function account() {
        return $this->belongsTo(Account::class, 'userid', 'id');
    }

    public function package() {
        return $this->belongsTo(Package::class, 'package', 'id');
    }

    public static function getVipCmtList()
    {
        return VipCmt::where('goi', '>', '0')->inRandomOrder()->get();
    }

    public static function getVipByFbId($fbId) {
        return VipCmt::with(['account' => function($query) {
            $query->select(['id', 'username']);
        }])->where('idfb', '=', $fbId)->get();
    }

    public static function  getVipByUserId($userId) {
        return VipCmt::with('package')->where('userid', '=', $userId)->get();
    }
}
