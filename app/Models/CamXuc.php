<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CamXuc extends Model
{
    protected $table = 'camxuc';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'access_token',
        'camxuc',
        'user',
        'time'
    ];
}
