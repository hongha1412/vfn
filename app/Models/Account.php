<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
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
