<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockReal extends Model
{
    //

    protected $table = 'stock_real';

    protected $primaryKey = 'id_product';

    public $incrementing = false;

//     /**
//      * Get the product that owns the category.
//      */
//     public function category()
//     {
//         //         return $this->belongsTo('App\Category');
//         return $this->belongsTo('App\Category', 'id_category');
//     }

    /**
     * Get the product
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }

}
