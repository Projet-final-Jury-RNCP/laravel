<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//         Schema::create('stock_real', function (Blueprint $table) {
// //             $table->increments('id');
// //             $table->timestamps();

//             $table->primary('id_product');

//             $table->unsignedInteger('id_product');
//             $table->foreign('id_product')->references('id')->on('products');
//             $table->integer('quantity');
//         });

// //             https://stackoverflow.com/questions/15625721/laravel-4-database-statement-create-trigger#16136319
// //             The "clean" way to do this is to use database events ! lifecycle using the following methods: creating, created, updating, updated, saving, saved, deleting, deleted. : class User extends Eloquent ... { boot() static::creating(function($user)

// //         DB::statement('CREATE TRIGGER ...');
//         // SQLSTATE[HY000]: General error: 2014 Cannot execute queries while other unbuffered queries are active.  Consider using PDOStatement::fetchAll().  Alternatively, if your code is only ever going to run against mysql, you may enable query buffering by setting the PDO::MYSQL_ATTR_USE_BUFFERED_QUERY attribute. (SQL: ...)

//         DB::unprepared('DROP TRIGGER IF EXISTS trigger_stock_supplies_insert_after');
//         DB::unprepared('CREATE TRIGGER trigger_stock_supplies_insert_after AFTER INSERT ON stock_supplies FOR EACH ROW  BEGIN    DECLARE var_quantity int(11);       SET var_quantity = NEW.quantity_add - NEW.quantity_rem;    INSERT INTO stock_real (id_product, quantity) VALUES (NEW.id_product, var_quantity)   ON DUPLICATE KEY UPDATE quantity = quantity + var_quantity;  END;');

//         DB::unprepared('DROP TRIGGER IF EXISTS trigger_stock_flows_insert_after');
//         DB::unprepared('CREATE TRIGGER trigger_stock_flows_insert_after AFTER INSERT ON stock_flows FOR EACH ROW  BEGIN    DECLARE var_quantity int(11);       SET var_quantity = NEW.quantity_add - NEW.quantity_rem;    INSERT INTO stock_real (id_product, quantity) VALUES (NEW.id_product, var_quantity)   ON DUPLICATE KEY UPDATE quantity = quantity + var_quantity;  END;');

        // V2 (au lieu de la table stock_real, on stocke dans product la quantity)

        DB::unprepared('DROP TRIGGER IF EXISTS trigger_stock_supplies_insert_after');
        DB::unprepared('CREATE TRIGGER trigger_stock_supplies_insert_after AFTER INSERT ON stock_supplies FOR EACH ROW  BEGIN    DECLARE var_quantity int(11);       SET var_quantity = NEW.quantity_add - NEW.quantity_rem;    UPDATE products SET quantity = quantity + var_quantity WHERE id = NEW.id_product;  END;');

        DB::unprepared('DROP TRIGGER IF EXISTS trigger_stock_flows_insert_after');
        DB::unprepared('CREATE TRIGGER trigger_stock_flows_insert_after AFTER INSERT ON stock_flows FOR EACH ROW  BEGIN    DECLARE var_quantity int(11);       SET var_quantity = NEW.quantity_add - NEW.quantity_rem;      UPDATE products SET quantity = quantity + var_quantity WHERE id = NEW.id_product;  END;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_real');
    }
}
