<?php

namespace App\Console\Commands\CronJob;

use App\Enum\FacebookActionEnum;
use App\Enum\LikePackageEnum;
use App\Models\RawToken;
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
//        $this->rawTokenProcess();
        $lsUser = Vip::getVipLikeList();

        foreach ($lsUser as $user) {
            $delayTime = round(intval($user->time) / intval(LikePackageEnum::idToValue($user->package))) - intval(env('DEFAULT_TIME_BUFFER'));
            $fbAutoLike = new FacebookAuto();
            $fbAutoLike->lsToken = Token::getTokenList();
            $fbAutoLike->userId = $user->idfb;
            $fbAutoLike->targetNumber = LikePackageEnum::idToValue($user->package);
            $fbAutoLike->action = FacebookActionEnum::LIKE;
            $fbAutoLike->delayTime = $delayTime <= 0 ? 0 : $delayTime;
            $fbAutoLike->run();
        }
    }

    public function rawTokenProcess() {
        $rawToken = RawToken::getTokenList();
        foreach ($rawToken as $token) {
            $this->getInfo($token->token);
        }
    }

    public function getInfo($token) {
        try {
            $postData = file_get_contents('https://graph.facebook.com/me?access_token=' . $token);
        } catch (\Exception $e) {
            return 0;
        }
        $postData = json_decode($postData, true);
        if ($postData['id']) {
            $tokenData = new Token();
            $tokenData->idfb = $postData['id'];
            $tokenData->ten = $postData['name'];
            $tokenData->token = $token;
            $tokenData->save();
            return 1;
        } else {
            return 0;
        }
    }
}
