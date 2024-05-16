<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public $table='cart';
    
    protected $fillable = [
       'product_id','user_id','qty' 
   ];
}
