<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekProduct extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_product';

    public $incrementing = false;


    public function product()
    {
        return $this->hasOne('App\Product', 'id');
    }

    public function week()
    {
        return $this->belongsTo('App\Week', 'id_week');
    }



}
