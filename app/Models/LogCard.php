<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogCard extends Model
{
    protected $table = 'log_card';
    protected $fillable = [
        'userid',
        'receive_userid',
        'telco',
        'serial',
        'cardcode',
        'amount',
        'price',
        'transid',
    ];

    public function accountUserId() {
        return $this->hasOne(Account::class, 'id', 'userid');
    }

    public function accountReceiveUserId() {
        return $this->hasOne(Account::class, 'id', 'receive_userid');
    }

    public static function getLogByUserId($userId) {
        return LogCard::with('accountUserId')->with('accountReceiveUserId')->where('userid', '=', $userId)->orderBy('created_at', 'DESC')->get();
    }
}
