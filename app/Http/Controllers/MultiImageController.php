<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;

class MultiImageController extends Controller
{
    public function insert()
    {
        $products=Product::where('status','Y')->get();
        return view('layout/admin/multiimage/add',compact('products'));
    }
    public function store(Request $request)
    {
        if($request->file('image')){
            $images=$request->file('image');
            
            foreach ($images as $image){

                if($image->isValid()){
                    $image_path=resource_path('assets\admin\images\product\\'.$request->upc);
                    dd($image_path);
                    if (!file_exists($image_path)) {
                       mkdir($image_path);
                       $image->move($image_path,'1.png');
                   }
                }
            }
        }
    }
}
