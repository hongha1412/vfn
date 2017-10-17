<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'thongbao';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'text',
        'time'
    ];

    public static function getNoticeLastest()
    {
        return Notice::orderBy("id", "desc")->get()->first();
    }
}
