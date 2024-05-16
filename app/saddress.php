<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saddress extends Model
{
    //
    public $table ='shipping_address';

    protected $fillable = [
       'user_id','name','address','city','state','pincode','mobile','email', 
   ];
}
