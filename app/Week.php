<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{

    public function products()
    {
        return $this->hasMany('App\WeekProduct', 'id_week');    // force usage col "id_category" instead "category_id"        // products()->getResult() (SQL: select * from `products` where `products`.`category_id` = 1 and `products`.`category_id` is not null)
    }

//     public function productss()
//     {
// //         return $this->hasManyThrough('App\Product', 'App\WeekProduct', 'id_week', 'id');         // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'week_products.id' in 'on clause' (SQL: select `products`.*, `week_products`.`id_week` from `products` inner join `week_products` on `week_products`.`id` = `products`.`id` where `week_products`.`id_week` in (1, 2, 3))
//         return $this->hasManyThrough('App\Product', 'App\WeekProduct', 'id_week', 'product_id');    // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'week_products.id' in 'on clause' (SQL: select `products`.*, `week_products`.`id_week` from `products` inner join `week_products` on `week_products`.`id` = `products`.`product_id` where `week_products`.`id_week` in (1, 2, 3))
//     }



    // ??? week_products.max_threshold

//     232 Execute	select * from `weeks`
//     232 Execute	select `products`.*, `week_products`.`id_week` as `pivot_id_week`, `week_products`.`id_product` as `pivot_id_product` from `products` inner join `week_products` on `products`.`id` = `week_products`.`id_product` where `week_products`.`id_week` in (1, 2, 3)
    public function productss()
    {
        return $this->belongsToMany('App\Product', 'week_products', 'id_week', 'id_product');
    }

//     238 Execute	select * from `weeks`
//     238 Execute	select * from `week_products` where `week_products`.`id_week` in (1, 2, 3)
    public function productsss()
    {
        return $this->hasMany('App\WeekProduct', 'id_week');
    }

}
