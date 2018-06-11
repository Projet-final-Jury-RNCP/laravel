<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Make the association between units of measurement and products
 * a unit of measurement has many products
 */

class MeasureUnit extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product', 'id_measure_unit');
    }
}
