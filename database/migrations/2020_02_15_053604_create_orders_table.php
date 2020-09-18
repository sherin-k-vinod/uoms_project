<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('order_id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('client_id')->on('clients')->->onDelete('cascade');
            $table->boolean('status')->comment('0 : new, 1 : admin processed, 2: send for unit confirmation 3 : unit accepted 4 : unit rejected, 4 : client confirmed, 5 : client reject');
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
