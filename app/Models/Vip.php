<?php

namespace App\Models;

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
        'expiretime',
        'likespeed',
        'limitpost',
        'note',
    ];

    public function account() {
        return $this->belongsTo(Account::class, 'userid', 'id');
    }

    public function likePackage() {
        return $this->belongsTo(LikePackage::class, 'package', 'id');
    }

    public static function getVipList()
    {
        return Vip::where('package', '>', '0')->inRandomOrder()->get();
    }

    public static function getVipByFbId($fbId) {
        return Vip::with(['account' => function($query) {
            $query->select(['id', 'username']);
        }])->where('idfb', '=', $fbId)->get();
    }

    public static function  getVipByUserId($userId) {
        return Vip::with('likePackage')->where('userid', '=', $userId)->get();
    }
}
