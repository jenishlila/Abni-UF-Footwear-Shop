<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use App\order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $baddress=baddress::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();

        // return "hiii";
        $products=Product::orderBy('created_at','desc')->where('status','=','Y')->get()->all();
        // return $products;
        return view('layout/front/home',compact('products'));
        // return view('home');
    }
    
    public function NewArrival()
    {
        return "hiii";
        # code...
    }
    public function MyOrder()
    {
        # code...
        // return "hiii";
        // $data=User::where('id',Auth::user()->id)->get();
        // return $data;
        // $orders = order::select('order.*','users.name','users.email')
        // ->join('users','users.id','=','order.user_id')
        // ->where('users.id',Auth::user()->id)
        // ->get();
        // return $orders;
        $orders=order::join('billing_address','billing_address.id','=','order.b_id')
        ->join('shipping_address','shipping_address.id','=','order.s_id')
        ->join('users','users.id','=','order.user_id')
        ->join('order_detail','order_detail.order_id','=','order.id')
        ->join('products','products.id','=','order_detail.product_id')
        ->select('order_detail.*','billing_address.*','products.*','products.name as pname','billing_address.name as bname','billing_address.user_id as buser_id','billing_address.email as bemail','billing_address.address as baddress','billing_address.mobile as bmobile','billing_address.city as bcity','billing_address.state as bstate','billing_address.pincode as bpincode','billing_address.created_at as borderdate',
        'shipping_address.*','shipping_address.name as sname','shipping_address.user_id as suser_id','shipping_address.email as semail','shipping_address.address as saddress','shipping_address.mobile as smobile','shipping_address.city as scity','shipping_address.state as sstate','shipping_address.pincode as spincode','shipping_address.created_at as sorderdate',
        'users.*','users.name as uname')
        // ->where('order.id','=',$id)
        ->where('users.id',Auth::user()->id)
        ->get();
        // return $orders;
        return view('layout/front/myorder/myorder',compact('orders'));

    }
}
