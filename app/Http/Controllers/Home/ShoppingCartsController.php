<?php

namespace App\Http\Controllers\Home;

use App\Model\Products;
use App\Model\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->post('product_id');

        $user = \Auth::user();

        $product = Products::find()->where(['product_id' => $product_id])->find();
        if (!$product) {
            throw new \Exception('商品不存在', 50000);
        }

        $cart = ShoppingCart::find()->where(['product_id' => $product_id, 'status' => ShoppingCart::STATUS_SHOPPING, 'uid' => $user->uid, ])->find();
        if (!empty($cart)) {
            $cart->amount += $product->price;
            $cart->count++;
            $cart->save();
        } else {
            $cart->uid = $user->uid;
            $cart->amount = $product->price;
            $cart->price = $product->price;
            $cart->count = 1;
            $cart->save();
        }

        return \Response::json();
    }

    public function order(Request $request)
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
