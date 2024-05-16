<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Product;
use App\cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // public function __construct()
    // {
    //     $hii=parent:: __construct();
    //     // dd ($hii);
    // }
    public $items = null;
    public function index()
    {
        $pro_id = [];
        $pro_qty = [];
       
        if(Auth::user())
        {
             $data=Cart::where('user_id',Auth::user()->id)->get();
                // return($data);
                if(isset($data))
                {
                    foreach ($data as $key => $cartdata) {
                        $pro_id[] = $cartdata['product_id'];
                        $pro_qty[] = $cartdata['qty'];
                    }
                    // $products = Product::whereIn('id', $pro_id)->get();
                    $products = Cart::join('products','products.id','=','cart.product_id')
                    ->where('user_id',Auth::user()->id)
                    ->select('products.*')->get();
                    
                    return view('layout/front/product/cart', compact('products', 'pro_qty'));

                }
        }
        else
        {
            $cartData = Session::has('cart') ? Session::get('cart') : null;
            // dd($cartData);
            if(isset($cartData))
            {
                foreach ($cartData as $key => $cartdata) {
                    // dd($cartdata['id']);
                    $pro_id[] = $cartdata['id'];
                    $pro_qty[] = $cartdata['qty'];
                }
                // dd($pro_qty);
                $products = Product::whereIn('id', $pro_id)->get();
                //  dd($products);
                return view('layout/front/product/cart', compact('products', 'pro_qty'));
            }
        
            else{
                return view('layout/front/product/404');
            }
    }
    }
    public function add(Request $request)
    {
        // return($request);
       
        if(Auth::user())
        {
            $data=Cart::where('user_id',Auth::user()->id)->where('product_id',$request->id)->first();
            if(isset($data)){
                $data->update(['qty'=>$request->qty]);
            }
            else{
            $data=Cart::Create(['product_id'=>$request->id,'qty'=>(isset($request->qty) ? $request->qty:1),'user_id'=>Auth::user()->id]);
            // dd ($data);
            return response()->json($request->session()->get('cart'));
            // return $data;
            }
        }
        else
        {
            if ($oldcart = Session::get('cart')) {
                $this->items = $oldcart;
            }
                $additem = ['qty' => (isset($request->qty) ? $request->qty:1), 'id' => $request->id];
                // dd($additem->$request);
                $this->items[$request->id] = $additem;
                $request->session()->put('cart', $this->items);
                // $request->session()->flush('cart');
                return response()->json($request->session()->get('cart'));
        }
    }
    public function UpdateCart(Request $request)
    {
        $oldcart = Session::get('cart');
        if(Auth::user())
        {
            if (isset($request->remove)) 
            {
                $result = Cart::where('product_id',$request->remove)->where('user_id',Auth::user()->id)->delete();
                // dd($result);
            }
            else
            {
                $data=Cart::where('user_id',Auth::user()->id)->where('product_id',$request->id)->update(['qty'=>$request->qty]);
                // return $data
                $pricedata=Product::where('id',$request->id)->first();
                $price=$request->qty * $pricedata->price; 
                return response()->json($price); 
            }
        }
        else
        {
            // dd($oldcart);
            if (isset($request->remove)) {
                // return $request->remove; 
                unset($oldcart[$request->remove]);
                session()->put('cart',$oldcart);
                // dd($oldcart);
            }
            else
            {
                $oldcart[$request->id]['qty']=$request->qty;
                $pricedata=Product::where('id',$request->id)->first();
                $price=$request->qty * $pricedata->price; 
                session()->put('cart',$oldcart);
                return response()->json($price);
            }
        }
    }
   
    public function ShowCartDetail(Request $request)
    {
        # code...
         $pro_id = [];
         $pro_qty = [];
         if(Auth::user())
         {
             $data=Cart::where('user_id',Auth::user()->id)->get();
            // return($data);
            if(isset($data))
            {
                foreach ($data as $key => $cartdata) {
                    // dd($cartdata['id']);
                    $pro_id[] = $cartdata['product_id'];
                    $pro_qty[] = $cartdata['qty'];
                }
                $products = Cart::join('products','products.id','=','cart.product_id')
                ->where('user_id',Auth::user()->id)
                ->select('products.*')->get();

                return view('layout/front/product/minicart', compact('products', 'pro_qty'));
            }

         }
         else
         {
         $cartData = Session::has('cart') ? Session::get('cart') : null;
         // dd($cartData);
         if(isset($cartData))
         {
            foreach ($cartData as $key => $cartdata) 
            {
                 // dd($cartdata['id']);
                 $pro_id[] = $cartdata['id'];
                 $pro_qty[] = $cartdata['qty'];
            }
            //  dd($cartdata);
             $products = Product::whereIn('id', $pro_id)->get();
            //   dd($products);
             return view('layout/front/product/minicart',compact('products','pro_qty'));
         }
         else{
            //  return view('layout/front/product/404');
         }
        }
    }
    public function Checkout(Request $request)
    {
        // return $request;
        $cartdata=cart::where('user_id',Auth::user()->id)->get();
        // return $cartdata;
         if(!$cartdata->isEmpty())
        {
            $pro_id=[];
            $pro_qty=[];
            $totalprice =0;
            $totalqty =0;
        
            $products = Cart::join('products','products.id','=','cart.product_id')
            ->where('cart.user_id',Auth::user()->id)
            ->select('products.*','cart.*')->get();
            // dd($products);

            
            foreach ($products as $key => $cartdata) 
            {
                // dd($cartdata['id']);
                $pro_id[]= $cartdata['product_id'];
                $pro_qty[]= $cartdata['qty'];
            }
            // return $pro_qty;
            foreach($products as $key=>$product)
            {
                    $totalqty +=$product->qty; 
                    $totalprice +=$product->price*$product->qty;
                    
            }
            
            return view('layout/front/product/checkout', compact('products', 'pro_qty','totalqty','totalprice'));
        }
        else
        {
            return redirect('products');
        }
    }
    // public function Address(Request $request)
    // {
    //     # code...
    //     // return $request;
    //     return view('layout/front/product/address');
    // }
      
}