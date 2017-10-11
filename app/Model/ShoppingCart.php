<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ShoppingCart
 *
 * @mixin \Eloquent
 */
class ShoppingCart extends Model
{

    const STATUS_SHOPPING = 0x1;        // 购物中

    const STATUS_ORDERED = 0x2;         // 已下单

    const STATUS_DELETE = 0x3;          // 删除

}
