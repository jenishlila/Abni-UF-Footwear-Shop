<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiimage extends Model
{
    public $table='multiimage';
    protected $fillable = [
        'name','product_id','sort',
    ];
}
