<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table='products';
    
    protected $fillable = [
       'name','color_id','brand_id','size_id','description','price','upc','status','stock','access_url'];

    // public function category(){
    //     return $this->belongsTo(Category::class,'category_id','id');
    // }
    // public function color(){
    //     return $this->belongsTo(Color::class,'color_id','id');
    // }
}
    