<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        '\App\Console\Commands\CronJob\VipCommentCommand',
        '\App\Console\Commands\CronJob\VipLikeCommand',
        '\App\Console\Commands\CronJob\VipReactCommand',
        '\App\Console\Commands\CronJob\VipShareCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (Cache::has('likeCounter')) {
            Cache::forget('likeCounter');
        }
        $schedule->command('BotCmd:like')
            ->everyMinute()->withoutOverlapping();
        $schedule->command('BotCmd:like')
            ->everyMinute()->withoutOverlapping();
        $schedule->command('BotCmd:like')
            ->everyMinute()->withoutOverlapping();
//        $schedule->command('BotCmd:react')
//                ->everyMinute()->withoutOverlapping();
//        $schedule->command('BotCmd:comment')
//                ->everyMinute()->withoutOverlapping();
//        $schedule->command('BotCmd:share')
//                ->everyMinute()->withoutOverlapping();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
