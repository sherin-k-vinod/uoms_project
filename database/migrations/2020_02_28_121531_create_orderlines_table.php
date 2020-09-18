<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderlines', function (Blueprint $table) {
            $table->bigIncrements('orderline_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->foreign('variant_id')->references('varient_id')->on('productvarients')->onDelete('cascade');
            $table->smallInteger('quantity');
            $table->double('line_total');
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
        Schema::dropIfExists('orderlines');
    }
}
