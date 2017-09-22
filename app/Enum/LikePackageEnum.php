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
    const PACKAGE_0 = 0;
    const PACKAGE_1 = 1;
    const PACKAGE_2 = 2;
    const PACKAGE_3 = 3;
    const PACKAGE_4 = 4;
    const PACKAGE_5 = 5;
    const PACKAGE_6 = 6;
    const PACKAGE_7 = 7;

    public static function getEnum($package)
    {
        switch ($package) {
            case 0:
                return LikePackageEnum::PACKAGE_0;
            case 1:
                return LikePackageEnum::PACKAGE_1;
            case 2:
                return LikePackageEnum::PACKAGE_2;
            case 3:
                return LikePackageEnum::PACKAGE_3;
            case 4:
                return LikePackageEnum::PACKAGE_4;
            case 5:
                return LikePackageEnum::PACKAGE_5;
            case 6:
                return LikePackageEnum::PACKAGE_6;
            case 7:
                return LikePackageEnum::PACKAGE_7;
        }
    }

    public static function idToValue($id)
    {
        switch ($id) {
            case 0:
                return 0;
            case 1:
                return 150;
            case 2:
                return 300;
            case 3:
                return 500;
            case 4:
                return 700;
            case 5:
                return 1000;
            case 6:
                return 1500;
            case 7:
                return 2000;
        }
    }

    public static function value($likePackageEnum)
    {
        switch ($likePackageEnum) {
            case LikePackageEnum::PACKAGE_0:
                return 0;
            case LikePackageEnum::PACKAGE_1:
                return 150;
            case LikePackageEnum::PACKAGE_2:
                return 300;
            case LikePackageEnum::PACKAGE_3:
                return 500;
            case LikePackageEnum::PACKAGE_4:
                return 700;
            case LikePackageEnum::PACKAGE_5:
                return 1000;
            case LikePackageEnum::PACKAGE_6:
                return 1500;
            case LikePackageEnum::PACKAGE_7:
                return 2000;
        }
    }
}