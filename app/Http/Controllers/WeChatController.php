<?php

namespace App\Http\Controllers;

use App\Library\Helper\WxBizDataCrypt;
use App\User;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;


class WeChatController extends Controller
{

    /**
     * wechat serve
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function serve()
    {
        if (!request()->post() && !request()->get()) {
            exit('hacked!!!');
        }
        $app = new Application(\Config::get('wechat.phantom'));
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

    public function xiaoChengXu(Request $request)
    {
        $data = $request->post();
        $rowData = $data['rowData'] ?? 0;
        if (empty($rowData)) {
            throw new \Exception('授权信息不能为空', 100000);
        }

        try {
            $sessionKey = $data['sessionKey'] ?? '';
            $wechatConfig = \Config::get('wechat');
            $apiKey = $wechatConfig['apiKey'];
            $iv = $data['iv'];

            $pc = new WxBizDataCrypt($apiKey, $sessionKey);
            $errorCode = $pc->decryptData($rowData, $iv, $data);
        } catch (\Exception $ex) {
            throw new \Exception('授权信息不正确', 100001);
        }

        // todo: storage user info

        $user = User::where(['open_id', $data->open_id]);
        if (empty($user)) {
            $user = User::insert([

            ]);
        }

        unset($user['password']);
        return \Response::json($user);
    }


}
