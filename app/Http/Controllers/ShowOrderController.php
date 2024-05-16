<?php

namespace App\Http\Controllers;
use App\OrderDetail;
use App\order;
use App\cart;
use Session;
use App\baddress;
use App\saddress;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


use function Symfony\Component\VarDumper\Dumper\esc;

class ShowOrderController extends Controller
{
    //
    public function index()
    {  
       
        // return $saddress;
        $orders = order::select('order.*','users.name','users.email')
        ->join('users','users.id','=','order.user_id')
        ->get();
        // return $orders;
        return view('layout/admin/order/showorder',compact('orders'));
    }
    public function detail($id)
    {
        // return $id;
        $orders=order::join('billing_address','billing_address.id','=','order.b_id')
        ->join('shipping_address','shipping_address.id','=','order.s_id')
        ->join('users','users.id','=','order.user_id')
        ->select('billing_address.*','billing_address.name as bname','billing_address.user_id as buser_id','billing_address.email as bemail','billing_address.address as baddress','billing_address.mobile as bmobile','billing_address.city as bcity','billing_address.state as bstate','billing_address.pincode as bpincode','billing_address.created_at as borderdate',
        'shipping_address.*','shipping_address.name as sname','shipping_address.user_id as suser_id','shipping_address.email as semail','shipping_address.address as saddress','shipping_address.mobile as smobile','shipping_address.city as scity','shipping_address.state as sstate','shipping_address.pincode as spincode','shipping_address.created_at as sorderdate',
        'users.*','users.name as uname')
        ->where('order.id','=',$id)
        ->get();
        // return $orders;
        
        $orderdetails=OrderDetail::join('products','products.id','=','order_detail.product_id')
        ->where('order_id','=',$id)
        ->get();


        // return $orderdetails;
        return view('layout/admin/order/orderdetail',compact('orderdetails','orders'));
    }
    public function ChangeStatus(Request $request)
    {
        # code...
        $content= $request->status;
        // return $content;
        $data=order::where('id',$request->id)->update(['order_status'=>$request->status]);
       
        $orders=OrderDetail::join('products','products.id','=','order_detail.product_id')
        ->where('order_id','=',$request->id)
        ->get();

        $mail=Mail::send('layout/admin/order/sendmail', compact('orders','content'), function($message)use($request)
        {
            $message->to($request->email)->subject('Your Order Status');
        });
        session::flash('status', 'Your Order Status Was Changed...Check Your Email...!');
        return redirect('admin/showorder');
    }

    public function UserData()
    {
        # code...
        $userdata=User::where('role','=','0')->get()->all();
            return view('layout/admin/user/users',compact('userdata'));
        // return $userdata;
    }

    public function ChangeStatusUser(Request $request)
    {
        // return "hiiiii";

       $result= User::where('id',$request->id)->update(['status'=>$request->status]);
       if(isset($result)){
            return json_encode(true);
        }
        else
             Return json_encode(false);
    }
}
