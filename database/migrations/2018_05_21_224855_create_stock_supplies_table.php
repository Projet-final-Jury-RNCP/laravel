<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

//             $table->integer('id_product');
            $table->unsignedInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');
            $table->date('expiry_date')->nullable()->default(null);
            $table->integer('quantity_add')->default(0);
            $table->integer('quantity_rem')->default(0);
            $table->float('unit_price', 8, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_supplies');
    }
}
