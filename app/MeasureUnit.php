<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasureUnit extends Model
{
    public function products()
    {
        //         return $this->hasMany('App\Product');
        return $this->hasMany('App\Product', 'id_measure_unit');
    }
}
