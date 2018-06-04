<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekProduct extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_product'; // 'id';
//     protected $primaryKey = array('id_week', 'id_product'); // array_key_exists(): The first argument should be either a string or an integer

    public $incrementing = false;

    // https://laravel.com/docs/5.6/eloquent-relationships
    //     return $this->hasOne('App\Phone');
    //     return $this->hasOne('App\Phone', 'foreign_key');

    // hasOne
    // hasMany
    // belongsTo
    // belongsToMany        Many To Many

    // hasManyThrough
    // Polymorphic *morph*

//     /**
//      * Get the phone record associated with the user.
//      */
//     public function category()
//     {
//         return $this->hasOne('App\Category');
//     }

//     /**
//      * Make the association between products and category
//      * a product belongs to one category
//      */
//     public function category()
//     {
// //         return $this->belongsTo('App\Category');
//         return $this->belongsTo('App\Category', 'id_category');
// //         return $this->hasOne('App\Category', 'id_category');
//     }

//     /**
//      * Make the association between products and units of measurement
//      * a product belongs to one unit of measurement
//      */
//     public function measureUnit()
//     {
//         //         return $this->belongsTo('App\MeasureUnit');
//         return $this->belongsTo('App\MeasureUnit', 'id_measure_unit');
//     }

// //     public function stockReal()
// //     {
// //         return $this->hasOne(StockReal::class, 'id_product');   // (SQL: select * from `stock_real` where `stock_real`.`id_product` in (1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))
// // //         return $this->belongsTo('App\StockReal', 'id_product');
// //     }




// //     public function stockFlow()
// //     {
// //         //         return $this->belongsTo('App\Category');
// // //         dd("aaa");
// //         return $this->belongsTo('App\StockFlow', 'id');
// //         //         return $this->hasOne('App\Category', 'id_category');
// //     }


    public function product()
    {
        return $this->hasOne('App\Product', 'id');
    }

    public function week()
    {
        return $this->belongsTo('App\Week', 'id_week');
    }



}
