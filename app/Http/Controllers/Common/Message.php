<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/22
 * Time: 15:45
 */

namespace App\Http\Utils;


class Message
{
    // success: true - success / false - fail; message: return message
    private $success, $message = array();

    /**
     * Message constructor.
     *
     * @param $success boolean
     * @param $message string[]
     */
    public function __construct($success, $message)
    {
        $this->success = $success;
        $this->putMessage($message);
    }

    public function putMessage($message) {
        array_push($this->message, $message);
    }

    public function toJson() {
        return json_encode($this);
    }
}