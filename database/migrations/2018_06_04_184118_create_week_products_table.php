<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_products', function (Blueprint $table) {
//             $table->increments('id');
//             $table->timestamps();

//             $table->integer('id_product');
            $table->unsignedInteger('id_week');
            $table->foreign('id_week')->references('id')->on('weeks');

//             $table->integer('id_product');
            $table->unsignedInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');

            $table->integer('max_threshold')->default(0);


            $table->primary(['id_week', 'id_product']); // PK : composite keys

        });


        // Each week, add all products

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('week_products');
    }
}
