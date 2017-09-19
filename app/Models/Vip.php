<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    protected $table = 'vip';
    public $timestamps = false;
    protected $fillable = [
        'idfb',
        'name',
        'user',
        'goi',
        'time',
        'solike',
        'limitpost',
        'chuthich',
    ];

    public static function getVipList()
    {
        return Vip::inRandomOrder()->get();
    }
}
