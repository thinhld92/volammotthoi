<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BannerType extends Enum
{
    const HOMEPAGE  =   1;
    const HEADER    =   2;
    const SIDEBAR   =   3;
    const FOOTER    =   4;
}
