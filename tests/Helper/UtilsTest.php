<?php

namespace Tests\Helper;


use App\Library\Helper\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{

    /**
     * 订单编号长度有效性测试
     */
    public function testOrderNumberGenerator()
    {
        $prifix = 'kl';
        $order_no = Utils::orderNumberGenerator($prifix, 923);
        var_dump($order_no);
        $this->assertStringStartsWith(strtoupper($prifix), $order_no);
        $this->assertTrue(strlen($order_no) == 24);
    }


}