<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopeCenter extends Model
{
    protected $table = 'shopes';

    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }

    public function shopDetailContent(){
        return $this->hasMany('App\ShopDetailContext','shop_id');
    }
}
