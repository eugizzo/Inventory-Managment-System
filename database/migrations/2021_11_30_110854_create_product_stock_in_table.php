<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStockInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock_in', function (Blueprint $table) {
            $table->integer('purchasedQuantity');
            $table->integer('unityPrice');
            $table->string('supplier');
            $table->unsignedBigInteger('stock_in_id');
            $table->foreign('stock_in_id')->references('id')->on('stock_ins');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_stock_in');
    }
}
