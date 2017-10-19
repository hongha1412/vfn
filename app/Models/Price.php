<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';
    public $timestamps = false;
    protected $fillable = [
        'vnd',
        'type',
        'package',
        'daypackage',
    ];

    public function likePackage() {
        return $this->hasOne(Package::class, 'id', 'likepackage');
    }

    public function dayPackage() {
        return $this->hasOne(DayPackage::class, 'id', 'daypackage');
    }

    public static function getPriceByPackage(Package $package, DayPackage $dayPackage) {
        return Price::where('package', '=', $package->id)
            ->where('daypackage', '=', $dayPackage->id)->get();
    }
}
