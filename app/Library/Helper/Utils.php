<?php

namespace App\Library\Helper;

class Utils
{

    public static function orderNumberGenerator($type, $uid)
    {
        // 20170919150430
        $current_time = date('YmdHis');
        $rand = random_int(0, 0x270f);

        return sprintf('%2s%04d%s%04d', strtoupper($type), $uid % 0x270f, $current_time, $rand);
    }

}