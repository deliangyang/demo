<?php

namespace Tests\Feature;

use App\Model\Products;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddProduct()
    {

        $products = factory(Products::class)->times(1)->make();

        foreach ($products as $product) {
            $response = $this->post('/admin/products', $product->toArray());
            $response->assertStatus(200);
        }


    }
}
