<?php

namespace Tests\Helper;


use App\Library\Helper\Utils;
use Faker\Factory;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class UtilsTest extends HttpRequestTest
{

    protected static $primaryKey;

    /**
     * 订单编号长度有效性测试
     */
    public function testOrderNumberGenerator()
    {
        $prifix = 'kl';
        $order_no = Utils::orderNumberGenerator($prifix, 923);
        $this->assertStringStartsWith(strtoupper($prifix), $order_no);
        $this->assertTrue(strlen($order_no) == 24);
    }

    public function testAddProduct()
    {
        $data = [
            'product_name' => '可口可乐大瓶装' . date('YmdHis'),
            'product_desc' => '600ML可口可乐大瓶装',
            'amount' => 100.00,
            'count' => 1000,
            'left' => 1000,
            'cover_image' => 'http://ww.baidu.com/logo.png',
        ];

        $this->data($data)->request('/admin/products', function (Response $response) {
            $this->assertArrayHasKey('id', $response->getData);
            self::$primaryKey = isset($response->getData['id']) ? $response->getData['id'] : 0;
        });
    }

    public function testUpdateProduct()
    {
        $this->method = 'PUT';
        $this->assertTrue(self::$primaryKey > 0);
        $data = [
            'product_name' => 'update-可口可乐大瓶装' . date('YmdHis'),
            'product_desc' => '600ML可口可乐大瓶装',
            'amount' => 100.00,
            'count' => 1000,
            'left' => 1000,
            'cover_image' => 'http://ww.baidu.com/logo.png',
        ];

        $this->data($data)->request('/admin/products/' . self::$primaryKey,
            function (Response $response) use ($data) {
                $this->assertArrayHasKey('id', $response->getData);
                $this->assertTrue($response->getData['product_name'] == $data['product_name']);
            }
        );
    }

}