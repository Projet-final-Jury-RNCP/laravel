<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

    /**
     * Get the product that owns the category.
     */
    public function category()
    {
//         return $this->belongsTo('App\Category');
        return $this->belongsTo('App\Category', 'id_category');
    }

    public function measureUnit()
    {
        //         return $this->belongsTo('App\MeasureUnit');
        return $this->belongsTo('App\MeasureUnit', 'id_measure_unit');
    }



}
