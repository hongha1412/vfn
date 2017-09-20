<?php

namespace App\Console\Commands\CronJob;

use App\Enum\FacebookActionEnum;
use App\Enum\LikePackageEnum;
use App\Models\Token;
use App\Models\Vip;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class VipLikeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BotCmd:like';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute bot like when user has new post';

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
        $lsUser = Vip::getVipList();

        foreach ($lsUser as $user) {
            $fbAutoLike = new FacebookAuto();
            $fbAutoLike->lsToken = Token::getTokenList();
            $fbAutoLike->userId = $user->idfb;
            $fbAutoLike->targetLikeNumber = LikePackageEnum::idToValue($user->goi);
            $fbAutoLike->action = FacebookActionEnum::LIKE;
            $fbAutoLike->run();
        }
    }
}
