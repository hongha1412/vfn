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

    public static function getVipList()
    {
        return Vip::where('package', '>', '0')->inRandomOrder()->get();
    }
}
