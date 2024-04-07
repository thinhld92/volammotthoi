<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentStatus extends Enum
{
    const INIT          = 1;
    const PENDING       = 2;
    const CANCEL        = 3;
    const COMPLETED     = 4;
    const REJECTED      = 5;
    const EXPIRED       = 6;
    const BONUS         = 7;
}
