<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/18
 * Time: 15:51
 */

namespace App\Console\Commands\CronJob;


use App\Enum\FacebookActionEnum;
use App\Enum\ReactionsEnum;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class FacebookAuto
{
    public $userId, $lsToken, $targetLikeNumber, $action;

    public function __construct()
    {
        $this->lsToken = array();
        $this->targetLikeNumber = 0;
        $this->userId = '';
    }

    /**
     * Main function, auto like
     *
     * @return int number of like success
     */
    public function run()
    {
        // Check valid input data
        if (count($this->lsToken) > 0 && $this->targetLikeNumber > 0 && $this->userId != '') {
            // Facebook target post data
            foreach ($this->lsToken as $token) {
                if ($postData = $this->getPost($this->userId, $token['token']) != 0) {
                    break;
                }
            }
            if (!Cache::has('likeCounter')) {
                Cache::forever('likeCounter', 0);
            }

            // Check if post data exists
            if ($postData != 0) {
                $postId = $postData['data'][0]['id'];
                foreach ($this->lsToken as $token) {
                    // if bot like enough, break and return like count
                    if (Cache::get('likeCounter') < $this->targetLikeNumber) {
                        if ($this->action($postId, $token['token'], $this->action)) {
                            Cache::increment('likeCounter');
                        }
                    } else {
                        break;
                    }
                }
                return Cache::get('likeCounter');
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     * Facebook like post
     *
     * @return boolean true: success / false: fail
     */
    public function like($postId, $token)
    {
        $host = 'https://graph.facebook.com/';
        $uri = 'v2.10/' . $postId . '/likes';

        $client = new Client(['base_uri' => $host]);

        try {
            $response = $client->request('POST', $uri, [
                'form_params' => [
                    'access_token' => $token
                ],
                'headers' => [
                    'content-type' => 'application/x-www-form-urlencoded'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            $result = json_decode('{"success": false}');
        }

        return $result->success;
    }

    public function action($postId, $token, $action, $reactionValue = ReactionsEnum::NONE) {
        // Declare url setting
        $host = 'https://graph.facebook.com/';
        $uri = 'v2.10/' . $postId;

        // Create client http request
        $client = new Client(['base_uri' => $host]);
        $data = [];
        $data['form_param']['access_token'] = $token;
        $data['headers']['content-type'] = 'application/x-www-form-urlencoded';

        // Action like
        if ($action == FacebookActionEnum::LIKE) {
            $uri  .= '/likes';
        }
        // Action react
        else if ($action == FacebookActionEnum::REACT) {
            $uri .= '/reactions';
            $data['form_param']['type'] = $reactionValue;
        }
        // Action comment
        else if ($action == FacebookActionEnum::COMMENT) {

        }
        // Action share
        else if ($action == FacebookActionEnum::SHARE) {

        }
        // Invalid action
        else {
            return false;
        }

        try {
            $response = $client->request('POST', $uri, $data);
            $result = json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            $result = json_decode('{"success": false}');
        }

        return $result->success;
    }

    /**
     * Get post data infor
     *
     * @param $userId
     * @param $token
     * @return bool|int|mixed|string if no post exists: 0
     */
    public function getPost($userId, $token)
    {
        try {
            $postData = file_get_contents('https://graph.facebook.com/' . $userId . '/feed?limit=1&access_token=' . $token);
        } catch (\Exception $e) {
            return 0;
        }
        $postData = json_decode($postData, true);
        if ($postData['data'][0]['id']) {
            return $postData;
        } else {
            return 0;
        }
    }
}