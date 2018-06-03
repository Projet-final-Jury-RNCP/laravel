<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->softDeletes();
            $table->boolean('active')->default(true);

            $table->integer('quantity')->default(0);

//             $table->integer('id_measure_unit');
            $table->unsignedInteger('id_measure_unit');
            $table->foreign('id_measure_unit')->references('id')->on('measure_units');
//             $table->integer('id_category');
            $table->unsignedInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories'); // ->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('min_threshold')->default(0);
            $table->integer('max_threshold')->default(0);

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
        Schema::dropIfExists('products');
    }
}
