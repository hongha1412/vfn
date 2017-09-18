<?php

namespace App\Console\Commands\CronJob;

use Illuminate\Console\Command;

class VipCommentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BotCmd:comment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute bot comment when user has new post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
