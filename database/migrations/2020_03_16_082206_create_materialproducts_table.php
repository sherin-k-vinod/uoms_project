<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialproducts', function (Blueprint $table) {
            $table->bigIncrements('material_product_id');
            $table->unsignedBigInteger('material_id')->nullable();
            $table->foreign('material_id')->references('material_id')->on('materials')->onDelete('cascade');
            $table->unsignedBigInteger('varient_id')->nullable();
            $table->foreign('varient_id')->references('varient_id')->on('productvarients')->onDelete('cascade');
            $table->smallInteger('required_size');
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
        Schema::dropIfExists('materialproducts');
    }
}
