<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Order
 *
 * @mixin \Eloquent
 */
class Order extends Model
{
    //

    const STATUS_UNSURE = 0x1;

    const STATUS_WAITING_PAY = 0x2;

    const STATUS_WAITING_DELIVERY = 0x3;

    const STATUS_WAITING_RECEIVE = 0x4;

    const STATUS_RECEIVED = 0x5;


    const PAY_STATUS_UN_PAY = 0x0;

    const PAY_STATUS_WAITING_PAY = 0x1;

    const PAY_STATUS_PAYED = 0x2;
}
