<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;


class WeChatController extends Controller
{

    /**
     * wechat serve
     *
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function serve(Application $app)
    {
        $server = $app->server;
        $server->setMessageHandler(function($message) {
            return '欢迎关注!';
        });

        $response = $server->serve();
        return $response;
    }

    /**
     * 支付回调
     *
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callbackPay(Application $app)
    {
        $payment = $app->payment;
        $response = $payment->handleNotify(function($notify, $successful) {
            $order_no = $notify->out_trade_no;
            // 获取订单信息

            if ($successful) {

            } else {

            }

        });

        return $response;
    }

}
