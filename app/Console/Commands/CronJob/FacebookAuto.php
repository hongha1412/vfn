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
use App\Models\CronLog;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class FacebookAuto
{
    public $userId, $lsToken, $targetNumber, $action, $reactionValue = ReactionsEnum::LIKE, $message, $delayTime = 0;

    public function __construct()
    {
        $this->lsToken = array();
        $this->targetNumber = 0;
        $this->userId = '';
    }

    /**
     * Main function, auto like
     *
     * @return int number of like success / 0: error / -1: success from other thread
     */
    public function run()
    {
        // Check valid input data
        if (count($this->lsToken) > 0 && $this->targetNumber > 0 && $this->userId != '') {
            // Facebook target post data
            foreach ($this->lsToken as $token) {
                // Get post data
                if (($postData = $this->getPost($this->userId, $token['token'])) != 0) {
                    break;
                }
            }

            // Check if post data exists
            if ($postData != 0) {
                $postId = $postData['data'][0]['id'];

                // Check post's like counter
                $logData = CronLog::getLog($postId, $this->action);
                if (count($logData) > 0 && $logData->counter >= $this->targetNumber) {
                    // Return if enough counter
                    return 0;
                }

                // Init cache counter
                if (!Cache::has('counter' . $this->action . $postId)) {
                    Cache::forever('counter' . $this->action . $postId, 0);
                }
                foreach ($this->lsToken as $token) {
                    // if bot counter enough, break and return counter
                    if (Cache::has('counter' . $this->action . $postId) && Cache::get('counter' . $this->action . $postId) < $this->targetNumber) {
                        if ($this->action($postId, $token['token'], $this->action, $this->reactionValue)) {
                            Cache::increment('counter' . $this->action . $postId);
                            sleep($this->delayTime);
                        }
                    } else {
                        break;
                    }
                }
                // Write log
                CronLog::log($postId, $this->action, Cache::get('counter' . $this->action . $postId));
                return Cache::has('counter' . $this->action . $postId) ? Cache::get('counter' . $this->action . $postId) : -1;
            } else {
                // Write log
                CronLog::log('Unknow', $this->action, 0);
                return 0;
            }
        } else {
            // Write log
            CronLog::log('Invalid', $this->action, 0);
            return 0;
        }
    }

    /**
     * Facebook action request
     *
     * @param $postId target post id
     * @param $token access token
     * @param $action action type
     * @return bool true: success / false: fail
     */
    public function action($postId, $token, $action) {
        // Set default message
        if (!$this->message) {
            $this->message = env('DEFAULT_COMMENT');
        }
        // Declare url setting
        $host = 'https://graph.facebook.com/';
        $uri = 'v2.10/' . $postId;

        // Create client http request
        $client = new Client(['base_uri' => $host]);
        $data = [];
        $data['form_params']['access_token'] = $token;
        $data['headers']['content-type'] = 'application/x-www-form-urlencoded';

        // Action like
        if ($action == FacebookActionEnum::LIKE) {
            $uri  .= '/likes';
        }
        // Action react
        else if ($action == FacebookActionEnum::REACT) {
            $uri .= '/reactions';
            $data['form_param']['type'] = $this->reactionValue;
        }
        // Action comment
        else if ($action == FacebookActionEnum::COMMENT) {
            $uri .= '/comments';
            $data['form_param']['message'] = $this->message;
        }
        // Action share
        else if ($action == FacebookActionEnum::SHARE) {
            $uri .= '/sharedposts';
        }
        // Invalid action
        else {
            return false;
        }

        try {
            // Like and reactions result
            $response = $client->request('POST', $uri, $data);
            $result = json_decode($response->getBody()->getContents());
            // Share and comment result
            if ($this->action == FacebookActionEnum::SHARE || $this->action == FacebookActionEnum::COMMENT) {
                if ($result->id) {
                    $result = json_decode('{"success": true}');
                } else {
                    $result = json_decode('{"success": false}');
                }
            }
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