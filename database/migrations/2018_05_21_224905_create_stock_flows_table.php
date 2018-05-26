<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_flows', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

//             $table->integer('id_product');
            $table->unsignedInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');
//             $table->integer('id_meal');
            $table->unsignedInteger('id_meal');
            $table->foreign('id_meal')->references('id')->on('meals');
            $table->integer('quantity_add');
            $table->integer('quantity_rem');
            $table->float('unit_price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_flows');
    }
}
