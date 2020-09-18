<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitorders', function (Blueprint $table) {
            $table->bigIncrements('unit_order_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->date('expected_completion_date')->nullable();
            $table->time('expected_completion_time')->nullable();
            $table->boolean('status')->comment('0 : new, 1 : unit confirmed, 2 : unit rejected 3 : send for client confirmation, 4 : client reject, 5 : client confirmed ');
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
        Schema::dropIfExists('unitorders');
    }
}
