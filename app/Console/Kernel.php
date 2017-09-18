<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->command('BotCmd:like')
                ->everyMinute();
//        $schedule->command('BotCmd:react')
//                ->everyMinute();
//        $schedule->command('BotCmd:comment')
//                ->everyMinute();
//        $schedule->command('BotCmd:share')
//                ->everyMinute();
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
