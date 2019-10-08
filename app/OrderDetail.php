<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OrderDetail extends Authenticatable
{
    use Notifiable;
    protected $table = 'order_detail';

    public function order(){
        return $this->belongsTo('App/Order','order_id');
    }

    public function companyId(){
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
