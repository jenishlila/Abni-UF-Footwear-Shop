<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Category;
use App\Product;
use App\Size;
use App\Multiimage;

class IndexController extends Controller
{
   public function ShowProductList()
   {
      $products=Product::where('status',"=",'Y')->get();
      $colors=Color::where('status',"=",'Y')->get();
      $size=Size::where('status',"=",'Y')->get();
      $categories=Category::where('status',"=",'Y')->get();
      //    dd ($products);
      return view('layout/front/product/show',compact('products','colors','categories','size'));
   }
   public function DetailPage($access_url)
   {
      // return $access_url;
    $products=Product::where('access_url',$access_url)->where('status',"=",'Y')->first();

    if(!isset($products))
    {
      return view('layout/front/product/404');
    }
    else
    {
      $images=Multiimage::where('product_id',$products->id)->get();
      return view('layout/front/product/detail',compact('products','images'));
    }
   }
   public function sort(Request $request)   
   {
      // return $request->size;
         if(isset($request->brand) && isset($request->color) && isset($request->size))
         {
            $products=Product::whereIn('color_id',$request->color)->whereIn('brand_id',$request->brand)->whereIn('size_id',$request->size)->where('status','Y')->whereBetween('price',[$request->input('min_price'),$request->input('max_price')])->get();
         }
         elseif(isset($request->brand) && isset($request->size))
         {
            $products=Product::whereIn('brand_id',$request->brand)->whereIn('size_id',$request->size)->where('status','Y')->whereBetween('price',[$request->input('min_price'),$request->input('max_price')])->get();
         }
         elseif(isset($request->color) && isset($request->size))
         {
            $products=Product::whereIn('color_id',$request->color)->whereIn('size_id',$request->size)->where('status','Y')->whereBetween('price',[$request->input('min_price'),$request->input('max_price')])->get();
         }
         elseif(isset($request->brand))
         {
            $products=Product::whereIn('brand_id',$request->brand)->where('status','Y')->whereBetween('price',[$request->input('min_price'),$request->input('max_price')])->get();;
         }
         elseif(isset($request->color))
         {
            $products=Product::whereIn('color_id',$request->color)->where('status','Y')->whereBetween('price',[$request->input('min_price'),$request->input('max_price')])->get();;
         }
         elseif(isset($request->size))
         {
            // return $request->size;
            $products=Product::whereIn('size_id',$request->size)->where('status','Y')->whereBetween('price',[$request->input('min_price'),$request->input('max_price')])->get();;
         }
         elseif(isset($request->min_price) && isset($request->max_price))
         {
            $products=Product::whereBetween('price',[$request->input('min_price'),$request->input('max_price')])->where('status','Y')->get();
         }
        else{
            $products=Product::where('status','Y')->get();
         }

         if(!$products->isEmpty())
         {
            if($request->grid_list=='true')
            {
               return view('layout/front/product/grid',compact('products'));
            }
            else
            {
               return view('layout/front/product/list',compact('products'));
            }
         }
         else{
            return view('layout/front/common/404');
         }
   }
   
}
   