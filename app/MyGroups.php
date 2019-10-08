<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyGroups extends Model
{
    protected $table = 'my_groups';


    public function userFor()
    {
        return $this->belongsTo('App\User','group_user_for');
    }

    public function owner()
    {
        return $this->belongsTo('App\User' ,'group_owner_id');
    }

    public function groupDetail(){
        return $this->hasMany('App\GroupDetail','group_id');
    }

}
