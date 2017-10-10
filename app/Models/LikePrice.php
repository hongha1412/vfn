<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikePrice extends Model
{
    protected $table = 'price';
    public $timestamps = false;
    protected $fillable = [
        'vnd',
        'likepackage',
        'daypackage',
    ];

    public function likePackage() {
        return $this->hasOne(LikePackage::class, 'id', 'likepackage');
    }

    public function dayPackage() {
        return $this->hasOne(DayPackage::class, 'id', 'daypackage');
    }

    public static function getPriceByPackage(LikePackage $likePackage, DayPackage $dayPackage) {
        return LikePrice::where('likepackage', '=', $likePackage->id)
            ->where('daypackage', '=', $dayPackage->id)->get();
    }
}
