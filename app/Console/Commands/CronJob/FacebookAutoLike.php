<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/18
 * Time: 15:51
 */

namespace App\Console\Commands\CronJob;


class FacebookAutoLike
{
    public $userId, $lsToken, $targetLikeNumber;

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
            // Count like number
            $count = 0;
            // Facebook target post data
            $postData = $this->getPost($this->userId, $this->lsToken[0]);

            // Check if post data exists
            if ($postData != 0) {
                $postId = $postData['data'][0]['id'];
                foreach ($this->lsToken as $token) {
                    // if bot like enough, break and return like count
                    if ($count < $this->targetLikeNumber) {
                        if ($this->like($postId, $token)) {
                            $count++;
                        }
                    } else {
                        break;
                    }
                }
                return $count;
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
        $ch = curl_init();
        $url = 'https://graph.facebook.com/v2.10/' . $postId . '/likes';

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'access_token=' . $token);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

        $result = json_decode(curl_exec($ch));
        curl_close($ch);

        if ($result['success']) {
            return true;
        } else {
            return false;
        }
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
        $postData = file_get_contents('https://graph.facebook.com/' . $userId . '/feed?limit=1&access_token=' . $token);
        $postData = json_decode($postData, true);
        if ($postData['data'][0]['id']) {
            return $postData;
        } else {
            return 0;
        }
    }
}