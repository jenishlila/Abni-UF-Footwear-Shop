<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $table='color';
    
    protected $fillable = [
       'name', 
   ];

}
