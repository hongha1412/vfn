<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/20
 * Time: 17:02
 */

namespace App\Enum;


class ReactionsEnum extends BaseEnum
{
    const NONE      = 'NONE';
    const LIKE      = 'LIKE';
    const LOVE      = 'LOVE';
    const WOW       = 'WOW';
    const HAHA      = 'HAHA';
    const SAD       = 'SAD';
    const ANGRY     = 'ANGRY';
    const THANKFUL  = 'THANKFUL';
    const RANDOM    = 'RANDOM';

    public static function random() {
        $result = rand(0, 6);
        switch ($result) {
            case 0:
                return ReactionsEnum::LIKE;
            case 1:
                return ReactionsEnum::LOVE;
            case 2:
                return ReactionsEnum::WOW;
            case 3:
                return ReactionsEnum::HAHA;
            case 4:
                return ReactionsEnum::SAD;
            case 5:
                return ReactionsEnum::ANGRY;
            case 6:
                return ReactionsEnum::THANKFUL;
        }
    }

    /**
     * Function check reaction type exists
     *
     * @param $reactType
     * @return bool true: exists / false: not exists
     */
    public static function checkExists($reactType) {
        switch ($reactType) {
            case ReactionsEnum::LIKE:
            case ReactionsEnum::LOVE:
            case ReactionsEnum::WOW:
            case ReactionsEnum::HAHA:
            case ReactionsEnum::SAD:
            case ReactionsEnum::ANGRY:
            case ReactionsEnum::THANKFUL:
                return true;
            default:
                return false;
        }
    }
}