<?php

namespace App\Http\Controllers\Admin;

use App\Model\Products;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
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
        $products = Products::where($where)->orderBy($sort)->paginate();

        return view('admin.products.index', [
            'result' => $products,
            'page' => $products->render(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->post();

        $product = new Products();
        $product->product_name = $postData['product_name'];
        $product->product_desc = $postData['product_desc'];
        $product->amount = $postData['amount'];
        $product->count = $postData['count'];
        $product->left = $postData['left'];
        $product->cover_image = $postData['cover_image'];
        $product->created_at = PHANTOM_TIMESTAMP;
        $product->updated_at = PHANTOM_TIMESTAMP;
        $product->save();

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::find($id);

        return view('admin.products.store', [
            'products' => $products,
        ]);
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
        $data = $request->post();
        $product = Products::find($id);
        foreach ($data as $k => $datum) {
            $product->{$k} = $datum;
        }
        $product->updated_at = PHANTOM_TIMESTAMP;
        $product->save();

        return response()->json($product);
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
