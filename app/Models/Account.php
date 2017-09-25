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

    /**
     * Get account info from username and password
     *
     * @param $username
     * @param $password
     * @return $this account info
     */
    public static function login($username, $password) {
        return Account::where([
            ['username', '=', $username],
            ['password', '=', $password]
        ]);
    }
}
