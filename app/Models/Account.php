<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

/**
 * Class Account
 * @package App\Models
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property double $vnd
 * @property string $toida
 * @property string $fullname
 * @property string $mail
 * @property string $sdt
 * @property string $level
 * @property string $kichhoat
 * @property string $avt
 * @property string $about
 * @property string $facebook
 * @property string $ip
 * @property string $macode
 * @property string $remember_token
 */

class Account extends User
{
    protected $table = 'account';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'username',
        'password',
        'vnd',
        'toida',
        'fullname',
        'mail',
        'sodt',
        'level',
        'kichhoat',
        'avt',
        'about',
        'facebook',
        'ip',
        'macode',
    ];

    public function logCard() {
        return $this->belongsToMany(LogCard::class);
    }

    public function logGift() {
        return $this->hasMany(GiftLike::class);
    }

    public function vip() {
        return $this->hasMany(Vip::class);
    }

    /**
     * Get user from username
     *
     * @param $username
     * @return user object
     */
    public static function getUserByUsername($username) {
        return Account::where('username', '=', strtolower($username))->limit(1)->get();
    }
}
