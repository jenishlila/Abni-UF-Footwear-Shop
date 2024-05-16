<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

use App\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    //     // $pro_id = [];
    //     // $pro_qty = [];
    //     // $cartData = Session::has('cart') ? Session::get('cart') : null;
    //     // dd($cartData);
    //     // if(isset($cartData))
    //     // {
    //         // foreach ($cartData as $key => $cartdata) {
    //         //     // dd($cartdata['id']);
    //         //     $pro_id[] = $cartdata['id'];
    //         //     $pro_qty[] = $cartdata['qty'];
    //         // }
    //         // // dd($pro_qty);
    //         // return $cartData;
    //         // $products = Product::whereIn('id', $pro_id)->get();
    //         //  dd($products);
    //         // return view('layout/front/product/cart', compact('products', 'pro_qty'));
    //     // }
    //     // else{
    //     //     return view('layout/front/product/404');
    //     // }
        
    // }
}
