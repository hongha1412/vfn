<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';
    public $timestamps = false;
    protected $fillable = [
        'type',
        'total',
    ];

    public static function getPackageById($id, $type) {
        return Package::where('id', '=', $id)->where('type', '=', $type)->first();
    }

    public static function getPackageByType($type) {
        return Package::where('type', '=', $type)->get();
    }
}
