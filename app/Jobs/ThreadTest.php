<?php

namespace App\Jobs;

use App\Console\Commands\CronJob\FacebookAuto;
use App\Enum\FacebookActionEnum;
use App\Enum\LikePackageEnum;
use App\Models\Token;
use App\Models\Vip;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ThreadTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Vip $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $delayTime = round(intval($this->user->time) / intval(LikePackageEnum::idToValue($this->user->goi))) - intval(env('DEFAULT_TIME_BUFFER'));
        $fbAutoLike = new FacebookAuto();
        $fbAutoLike->lsToken = Token::getTokenList();
        $fbAutoLike->userId = $this->user->idfb;
        $fbAutoLike->targetNumber = LikePackageEnum::idToValue($this->user->goi);
        $fbAutoLike->action = FacebookActionEnum::LIKE;
        $fbAutoLike->delayTime = $delayTime <= 0 ? 0 : $delayTime;
        $fbAutoLike->run();
    }
}
