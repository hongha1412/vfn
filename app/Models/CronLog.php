<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CronLog extends Model
{
    protected $table = 'cron_log';
    protected $fillable = [
        'post_id',
        'action',
        'counter',
    ];

    public static function log($postId, $action, $counter) {
        $log = new CronLog();
        $log->post_id = $postId;
        $log->action = $action;
        $log->counter = $counter;
        $log->created_at = Carbon::now();
        $log->save();
    }

    public static function getLog($postId, $action) {
        return CronLog::where([
            ['post_id', '=', $postId],
            ['action', '=', $action]
        ])->get();
    }
}
