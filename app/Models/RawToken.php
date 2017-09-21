<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawToken extends Model
{
    protected $table = 'rawtoken';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'token',
    ];

    public static function getTokenList() {
        return RawToken::orderBy('id', 'ASC')->get();
    }
}
