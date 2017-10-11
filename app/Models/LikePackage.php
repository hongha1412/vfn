<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikePackage extends Model
{
    protected $table = 'likepackage';
    public $timestamps = false;
    protected $fillable = [
        'liketotal',
    ];

    public static function getPackageById($id) {
        return LikePackage::where('id', '=', $id)->first();
    }
}
