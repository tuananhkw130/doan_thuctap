<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * User role (ADMIN || FREE_USER || PAID_USER)
 * @method static ADMIN
 * @method static FREE_USER
 * @method static PAID_USER
 */
final class OrderStatus extends Enum
{
    const ORDER = 0;
    const DELIVERY = 1;
    const ORDER_SUCCESS = 2;
    const CANCEL_ORDER = 3;
}
