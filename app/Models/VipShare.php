<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VipShare extends Model
{
    protected $table = 'vipshare';
    public $timestamps = false;
    protected $fillable = [
        'idfb',
        'name',
        'user',
        'goi',
        'time',
        'soshare',
        'limitpost',
        'chuthich',
    ];

    public static function getVipShareList()
    {
        return Vip::where('goi', '>', '0')->inRandomOrder()->get();
    }
}
