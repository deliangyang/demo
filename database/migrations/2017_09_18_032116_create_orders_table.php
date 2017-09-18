<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no', 40)->index()->unique();
            $table->string('title', 40);
            $table->string('body', 100);
            $table->tinyInteger('status');
            $table->float('amount');
            $table->string('vendor_trade_no', 32);
            $table->string('vendor', 10);
            $table->integer('count');
            $table->timestamp('confirm_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
