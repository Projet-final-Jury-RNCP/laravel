<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockFlow extends Model
{
    //

    /**
     * Get the product
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }

}
