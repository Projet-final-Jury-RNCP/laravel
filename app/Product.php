<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * Make the association between products and category
     * a product belongs to one category
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category');
    }

    /**
     * Make the association between products and units of measurement
     * a product belongs to one unit of measurement
     */
    public function measureUnit()
    {
        return $this->belongsTo('App\MeasureUnit', 'id_measure_unit');
    }

}
