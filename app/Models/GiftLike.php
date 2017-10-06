<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftLike extends Model
{
    protected $table = 'gift_like';
    public $timestamps = false;
    protected $fillable = [
        'userid',
        'giftcode',
        'expiretime',
        'amount',
        'usedtime',
    ];

    public function account() {
        return $this->hasOne(Account::class, 'id', 'userid');
    }

    /**
     * Get list log gift by user id
     *
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getLogByUserId($userId) {
        return GiftLike::with('account')->where('userid', '=', $userId)->orderBy('usedtime', 'DESC')->get();
    }

    /**
     * Get valid gift code
     *
     * @param $giftCode
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public static function getValidGiftCode($giftCode) {
        return GiftLike::with('account')
            ->where(function($query) {
                $query->where('userid', '=', '')->orWhereNull('userid');
            })->where('giftcode', '=', $giftCode)->get();
    }
}
