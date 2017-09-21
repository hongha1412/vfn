<?php

namespace App\Console\Commands\CronJob;

use App\Enum\FacebookActionEnum;
use App\Enum\LikePackageEnum;
use App\Enum\ReactionsEnum;
use App\Models\Token;
use App\Models\VipReact;
use Illuminate\Console\Command;

class VipReactCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BotCmd:react';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute bot react when user has new post';

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
        $lsUser = VipReact::getVipReactList();

        foreach ($lsUser as $user) {
            $delayTime = round(intval($user->time) / intval(LikePackageEnum::idToValue($user->goi))) - intval(env('DEFAULT_TIME_BUFFER'));
            $fbAutoLike = new FacebookAuto();
            $fbAutoLike->lsToken = Token::getTokenList();
            $fbAutoLike->userId = $user->idfb;
            $fbAutoLike->targetNumber = LikePackageEnum::idToValue($user->goi);
            $fbAutoLike->action = FacebookActionEnum::REACT;
            $fbAutoLike->reactionValue = $user->type == ReactionsEnum::RANDOM ? ReactionsEnum::random() : $user->type;
            $fbAutoLike->delayTime = $delayTime <= 0 ? 0 : $delayTime;
            $fbAutoLike->run();
        }
    }
}
