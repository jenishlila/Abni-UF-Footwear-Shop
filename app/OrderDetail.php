<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    public $table ='order_detail';

    protected $fillable = [
       'product_id','order_id','total','qty', 
   ];
}
