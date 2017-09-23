<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/22
 * Time: 15:45
 */

namespace App\Http\Controllers\Common;


class Message implements \JsonSerializable
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

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'success'   => $this->success,
            'message'   => $this->message,
        ];
    }
}