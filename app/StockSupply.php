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
        //         return $this->hasOne(Product::class, 'id');
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

//     Method Illuminate\Database\Query\Builder::products does not exist. (View: F:\icademia\Controles_continus\FINAL\laravel\resources\views\stock\history\history.blade.php)
    public function productpourtest()
    {
//         return $this->hasOne(Product::class, 'id');
// dd("aaaaaaaaa");
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
//     Undefined property: Illuminate\Database\Eloquent\Relations\HasOne::$name (View: F:\icademia\Controles_continus\FINAL\laravel\resources\views\stock\history\history.blade.php)

    public function products()
    {
//         dd("camklmkbem");
//         return $this->hasOne(Product::class, 'id');
        return 'id_product';
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
