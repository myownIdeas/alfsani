<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupDetail extends Model
{
    protected $table = 'group_detail';

    public function getShop(){
        return $this->belongsTo('App\ShopeCenter','shop_id');
    }
}
