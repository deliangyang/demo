<?php

namespace App\Http\Controllers\Home;

use App\Library\Helper\Utils;
use App\Model\Order;
use App\Model\Products;
use App\Model\ShoppingCart;
use App\User;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = [];
        $sort = [];
        $orders = Order::where($where)->orderBy($sort)->paginate();
        return response()->json($orders);
    }

    public function pay(Request $request, $order_no = '')
    {
        if (empty($order_no)) {
            throw new \Exception('订单号不能为空', 200000);
        }

        $order = Order::where(['order_no' => $order_no]);
    }

    public function shoppingCart(Request $request)
    {
        $user = \Auth::user();

        $products = ShoppingCart::find()->where(['status' => ShoppingCart::STATUS_SHOPPING, ])->all();

        $totalAmount = 0;
        $productDetail = [];
        $cartIds = [];
        foreach ($products as $k => $product) {
            $totalAmount += $product['amount'];
            $cartIds[] = $product['cart_id'];
            $productDetail[] = [
                'product_id' => $product['product_id'],
                'count' => $product['count'],
                'price' => $product['price'],
                'cart_id' => $product['cart_id'],
            ];
        }

        $order_no = Utils::orderNumberGenerator(0x1, $user->uid);
        $res = Order::find()->save([
            'uid' => $user->uid,
            'order_no' => $order_no,
        ]);

        if ($res) {
            ShoppingCart::find()->where(['cart_id' => ['IN', $cartIds]])->update([
                'status' => ShoppingCart::STATUS_ORDERED,
            ]);
        }

        \Response::redirectTo('/wx/orders/pay/' . $order_no);
    }

    /**
     *
     * 
     * @param Application $app
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Application $app)
    {

        $payment = $app->payment;
        $payment->configForJSSDKPayment();

        return response()->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product_id = (int) $request->post('product_id');
        $product = Products::find($product_id);

        $order = new Order();
        $order->order_no = '';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
