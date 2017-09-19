<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/18
 * Time: 17:21
 */

namespace App\Enum;

abstract class LikePackageEnum extends BaseEnum
{
    const PACKAGE_1 = 1;
    const PACKAGE_2 = 2;
    const PACKAGE_3 = 3;
    const PACKAGE_4 = 4;
    const PACKAGE_5 = 5;
    const PACKAGE_6 = 6;
    const PACKAGE_7 = 7;
    const PACKAGE_8 = 8;

    public static function value($likePackageEnum)
    {
        switch ($likePackageEnum) {
            case LikePackageEnum::PACKAGE_1:
                return 0;
            case LikePackageEnum::PACKAGE_2:
                return 150;
            case LikePackageEnum::PACKAGE_3:
                return 300;
            case LikePackageEnum::PACKAGE_4:
                return 500;
            case LikePackageEnum::PACKAGE_5:
                return 700;
            case LikePackageEnum::PACKAGE_6:
                return 1000;
            case LikePackageEnum::PACKAGE_7:
                return 1500;
            case LikePackageEnum::PACKAGE_8:
                return 2000;
        }
    }
}