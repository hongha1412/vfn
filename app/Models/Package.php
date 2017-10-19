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

    public static function getPackageById($id) {
        return Package::where('id', '=', $id)->first();
    }

    public static function getPackageByType($type) {
        return Package::where('type', '=', $type)->get();
    }
}
