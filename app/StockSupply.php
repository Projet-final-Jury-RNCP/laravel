<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockSupply extends Model
{
    //

    /**
     * Get the product
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
