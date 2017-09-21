<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VipReact extends Model
{
    protected $table = 'vipreact';
    public $timestamps = false;
    protected $fillable = [
        'idfb',
        'name',
        'user',
        'goi',
        'time',
        'soreact',
        'type',
        'limitpost',
        'chuthich',
    ];

    public static function getVipReactList()
    {
        return Vip::where('goi', '>', '0')->inRandomOrder()->get();
    }
}
