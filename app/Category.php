<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * Make the association between categories and products
     * a category has many products
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'id_category');    // force usage col "id_category" instead "category_id"
    }

}
