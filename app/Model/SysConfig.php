<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SysConfig
 *
 * @mixin \Eloquent
 */
class SysConfig extends Model
{
    const CONF_TYPE_WEBSITE = 0x1;

    const CONF_TYPE_SMS = 0x2;

    const CONF_TYPE_WECHAT = 0x3;

    const CONF_TYPE_ALIPAY = 0x4;


}
