<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Advertisement
 *
 * @mixin \Eloquent
 */
class Advertisement extends Model
{
    //
    const AD_TYPE_INDEX = 0x1;          // 首页

    const AD_STATUS_AUDIT = 0x1;        // 审核

    const AD_STATUS_PUBLISH = 0x2;      // 发布

    public static function typeMap()
    {
        return [
            self::AD_TYPE_INDEX => '首页',
        ];
    }

    public static function statusMap()
    {
        return [
            self::AD_STATUS_AUDIT => '审核',
            self::AD_STATUS_PUBLISH => '发布',
        ];
    }

}
