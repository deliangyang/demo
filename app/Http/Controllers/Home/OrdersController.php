<?php

namespace App\Http\Controllers\Home;

use App\Model\Order;
use App\Model\Products;
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
