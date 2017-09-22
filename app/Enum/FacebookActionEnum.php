<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/18
 * Time: 17:21
 */

namespace App\Enum;

abstract class FacebookActionEnum extends BaseEnum
{
    const LIKE      = 0;
    const REACT     = 1;
    const COMMENT   = 2;
    const SHARE     = 3;

    public static function toEnum($value) {
        switch ($value) {
            case 0:
                return FacebookActionEnum::LIKE;
            case 1:
                return FacebookActionEnum::REACT;
            case 2:
                return FacebookActionEnum::COMMENT;
            case 3:
                return FacebookActionEnum::SHARE;
            default:
                return null;
        }
    }
}