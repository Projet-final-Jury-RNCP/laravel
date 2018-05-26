<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // https://laravel.com/docs/5.6/eloquent-relationships
//     return $this->hasOne('App\Phone');
//     return $this->hasOne('App\Phone', 'foreign_key');

//     /**
//      * Get the user that owns the phone.
//      */
//     public function product()
//     {
//         return $this->belongsTo('App\Product');
//     }
//     /**
//      * Get the user that owns the phone.
//      */
//     public function product()
//     {
//         return $this->belongsTo('App\Product');
//     }

    /**
     * Get the phone record associated with the user.
     */
    public function products()
    {
//         return $this->hasMany('App\Product');
        return $this->hasMany('App\Product', 'id_category');    // force usage col "id_category" instead "category_id"        // products()->getResult() (SQL: select * from `products` where `products`.`category_id` = 1 and `products`.`category_id` is not null)
    }

//     /**
//      * Get the phone record associated with the user.
//      */
//     public function stocks()
//     {
//         //         return $this->hasMany('App\Product');
//         return $this->hasMany('App\StockReal', 'id_category');    // force usage col "id_category" instead "category_id"        // products()->getResult() (SQL: select * from `products` where `products`.`category_id` = 1 and `products`.`category_id` is not null)
//     }

}
