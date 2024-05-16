<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class baddress extends Model
{
    public $table ='billing_address';

    protected $fillable = [
       'user_id','name','address','city','state','pincode','mobile','email', 
   ];
}
