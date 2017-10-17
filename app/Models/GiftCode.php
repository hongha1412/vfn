<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCode extends Model
{
    protected $table = 'gift_like';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'userid',
        'giftcode',
        'expiretime',
        'amount',
        'usedtime'
    ];

    public static function getGiftCodeList()
    {
        return Notice::all();
    }
}
