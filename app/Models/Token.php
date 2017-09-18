<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'token';
    public $timestamps = false;
    protected $fillable = [
        'idfb',
        'ten',
        'token',
    ];

    public function getTokenList()
    {
        return Token::inRandomOrder()->get();
    }
}
