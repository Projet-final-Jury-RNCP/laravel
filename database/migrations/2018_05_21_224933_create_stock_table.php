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

        DB::unprepared('DROP TRIGGER IF EXISTS trigger_stock_supplies_insert_after');

        DB::unprepared('DROP TRIGGER IF EXISTS trigger_stock_flows_insert_after');
    }
}
