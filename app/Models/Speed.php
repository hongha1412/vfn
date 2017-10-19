<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speed extends Model
{
    protected $table = 'speed';
    public $timestamps = false;
    protected $fillable = [
        'type',
        'value',
    ];

    public static function getSpeedByType($type) {
        return Speed::where('type', '=', $type)->get();
    }
}
