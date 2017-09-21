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

    public static function getVipCmtList()
    {
        return Vip::where('goi', '>', '0')->inRandomOrder()->get();
    }
}
