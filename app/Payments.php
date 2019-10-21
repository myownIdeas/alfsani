<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Payments extends Model
{
    use Notifiable;
    protected $table = 'order_payment_detail';

}
