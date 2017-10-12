<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeSpeed extends Model
{
    protected $table = 'likespeed';
    public $timestamps = false;
    protected $fillable = [
        'value',
    ];
}
