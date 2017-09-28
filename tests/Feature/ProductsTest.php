<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddProduct()
    {

        $this->post('/api/orders/create');
        $this->assertTrue(true);
    }
}
