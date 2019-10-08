<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stock extends Authenticatable
{
    use Notifiable;
    protected $table = 'stock';

    public function shop(){
        return $this->belongsTo('App\ShopeCenter','shop_id');
    }
    public function company_Id(){
        return $this->belongsTo('App\Company','company_id');
    }
    public function firstModel(){
        return $this->belongsTo('App\Company','first_model');
    }
    public function secondModel(){
        return $this->belongsTo('App\Company','second_model');
    }
    public function thirdModel(){
        return $this->belongsTo('App\Company','third_model');
    }
    public function item(){
        return $this->belongsTo('App\CompanyModel','item_id');
    }
}
