<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayPackage extends Model
{
    protected $table = 'daypackage';
    public $timestamps = false;
    protected $fillable = [
        'daytotal',
    ];

    public static function getPackageByValue($value) {
        return DayPackage::where('daytotal', '=', $value)->first();
    }
}
