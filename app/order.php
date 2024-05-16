<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    public $table ='order';

    protected $fillable = [
       'user_id','b_id','s_id','total','qty', 
   ];
}
