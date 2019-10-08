<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable
{
    use Notifiable;
    protected $table = 'orders';

    public function shop(){
        return $this->belongsTo('App\ShopeCenter','shop_id');
    }

    public function group(){
        return $this->belongsTo('App\MyGroups','group_id');
    }
    public function agent(){
        return $this->belongsTo('App\User','agent_id');
    }
}
