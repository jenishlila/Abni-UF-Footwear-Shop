<?php

namespace App\Http\Controllers;
use App\baddress;
use App\saddress;
use App\cart;
use App\Product;
use App\order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $cartdata=cart::where('user_id',Auth::user()->id)->get();
        if(!$cartdata->isEmpty())
        {
            $baddress=baddress::where('user_id',Auth::user()->id)->limit(3)->get();
            return view('layout/front/product/biling_address',compact('baddress'));
        }
        else
        {
            return redirect('products');
        }
    }
    public function ShippingIndex(Request $request)
    {
        $cartdata=cart::where('user_id',Auth::user()->id)->get();

        if(!$cartdata->isEmpty())
        {
            $saddress=saddress::where('user_id',Auth::user()->id)->limit(3)->get();
            return view('layout/front/product/shipping_address',compact('saddress'));
        }
        else
        {
            return redirect('products');
        }
    }
    
    public function Store(Request $request)
    {
        // return $request->data;
        $totalprice =0;
        $totalqty =0;
        // return $request;
        // $validateData=$request->validate([
        //     'name' => 'required|max:100',
        //     'address' => 'required|max:100',
        //     'email' =>'required|email',
        //     'city' =>'required',
        //     'state' =>'required',
        //     'pincode'=>'required|numeric',
        //     'mobile'=>'required|numeric',
        // ]);
      
        if(isset($request->data))
        {
            // return $request->data;
            $baddress=baddress::where('id',$request->data)->first();
            $data=baddress::where('id',$request->data)->update(['user_id'=>Auth::user()->id,'name'=>$baddress->name,'address'=>$baddress->address,'email'=>$baddress->email,'state'=>$baddress->state,'pincode'=>$baddress->pincode,'mobile'=>$baddress->mobile,'city'=>$baddress->city]);
           
          
            if($request->shipping=='billing')
           {
                $data=saddress::create(['user_id'=>Auth::user()->id,'name'=>$baddress->name,'address'=>$baddress->address,'email'=>$baddress->email,'state'=>$baddress->state,'pincode'=>$baddress->pincode,'mobile'=>$baddress->mobile,'city'=>$baddress->city]);
                return redirect('product/showorderreview');
           }
           else
           {
               return redirect('product/shipindex');
           }
        }

        else
        {
            // return "else";
            if($request->shipping=='billing')
            {
                $data=baddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
                $shipdata=saddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
                return redirect('product/showorderreview');
            }
            else
            {
                $data=baddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
                $saddress=saddress::where('user_id',Auth::user()->id)->limit(3)->get();
                return view('layout/front/product/shipping_address',compact('saddress'));
            }
    
        }
    }
    public function ShippingStore(Request $request)
    {
        // return $request;
        $totalprice =0;
        $totalqty =0;
        // $validateData=$request->validate([
        //     'name' => 'required|max:100',
        //     'address' => 'required|max:100',
        //     'email' =>'required|email',
        //     'city' =>'required',
        //     'state' =>'required',
        //     'pincode'=>'required|numeric',
        //     'mobile'=>'required|numeric',
        // ]);
        # code...
        if(isset($request->data))
        {
            $saddress=saddress::where('id',$request->data)->first();
            $data=saddress::where('id',$request->data)->update(['user_id'=>Auth::user()->id,'name'=>$saddress->name,'address'=>$saddress->address,'email'=>$saddress->email,'state'=>$saddress->state,'pincode'=>$saddress->pincode,'mobile'=>$saddress->mobile,'city'=>$saddress->city]); 
            return redirect('product/showorderreview');
        }
        else
        {
             $data=saddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
            return redirect('product/showorderreview');
        }
    }
    public function BillingUpdate($id)
    {
        $baddress=baddress::where('id',$id)->get();
        return view('layout/front/product/billingupdate',compact('baddress'));
    }
    public function ShippingUpdate($id)
    {
        $baddress=saddress::where('id',$id)->first();
        return view('layout/front/product/shippingupdate',compact('baddress'));
    }
    public function BillingUpdateSave(Request $request)
    {
        
        $data=saddress::where('id',$request->id)->update(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
        return redirect('product/showorderreview');


        // return $request;
        # code...
        //  $reqdata=$request->except('_token');
        //  return $reqdata;
        // $data=$request->id;
        // $baddress=baddress::select('id','name','email','address','city','state','pincode','mobile')->where('id',$data)->get();
        // $bdata=$baddress->except('created_at');
        // return $baddress;
        // if(isset($reqdata))
        // {
        //     if($baddress==$reqdata)
        //         {
        //             return "if";
        //         }
        //     else
        //         {
        //             return "else";
        //         }
        // }

        // return redirect('product/showorderreview');
        // $data=baddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);

        // $data=baddress::where('id',$request->id)->update(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
        // return "done";
    }  
    public function ShippingUpdateSave(Request $request)
    {
        # code...
        $data=saddress::where('id',$request->id)->update(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
        return redirect('product/showorderreview');
    } 
    public function ShowOrderReview(Request $request)
    {
        $cartdata=cart::where('user_id',Auth::user()->id)->get();
        if(!$cartdata->isEmpty())
        {

            $totalprice =0;
            $totalqty =0;

            $products = Cart::join('products','products.id','=','cart.product_id')
                ->where('cart.user_id',Auth::user()->id)
                ->select('products.*','cart.*')->get();      
                
                foreach ($products as $key => $cartdata) 
                {
                    $pro_id[]= $cartdata['product_id'];
                    $pro_qty[]= $cartdata['qty'];
                }
                // return $pro_qty;
                foreach($products as $key=>$product)
                {
                    $totalqty +=$product->qty; 
                    $totalprice +=$product->price*$product->qty;
                }

            $baddress=baddress::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();
            $saddress=saddress::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();

            return view('layout/front/product/order', compact('products', 'pro_qty','totalqty','totalprice','baddress','saddress'));
        }
        else
        {
            return redirect('products');
        }

    }
    public function PlaceOrder(Request $request)
    {
        # code...
        $cartdata=cart::where('user_id',Auth::user()->id)->get();
        if(!$cartdata->isEmpty())
        {
            $totalprice =0;
            $totalqty =0;

            $products = Cart::join('products','products.id','=','cart.product_id')
                ->where('cart.user_id',Auth::user()->id)
                ->select('products.*','cart.*')->get();   
            
                foreach($products as $key=>$product)
                {
                    $totalqty +=$product->qty; 
                    $totalprice +=$product->price*$product->qty;
                }
                // return $totalprice;

            $baddress=baddress::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();
            $saddress=saddress::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();

            $data=order::Create(['user_id'=>Auth::user()->id,'b_id'=>$baddress->id,'s_id'=>$saddress->id,'total'=>$totalprice,'qty'=>$totalqty]);
            $orderdata= $data->id;

            foreach($products as $key => $cartdata)
                {
                    // echo $cartdata;
                    $pro_id= $cartdata['product_id'];
                    $pro_qty= $cartdata['qty'];
                    $pro_price= $cartdata['qty'] * $cartdata['price'];
                    // return $pro_qty;

                    // return $pro_id;
                    $data=OrderDetail::Create(['product_id'=>$pro_id,'order_id'=>$orderdata,'qty'=>$pro_qty,'total'=>$pro_price]);
    
                }

            //     $data=[
            //         'title'=>'Order Status',
            //         'content'=>$request->status,
            //         'name'=>$orders->name,
            //         'qty' =>$orders->qty,
            //         'price'=>$orders->price,
            //         'total'=>$orders->total,
            //         'orders'=>$data
            //     ];

            // $mail=Mail::send('layout/admin/order/sendmail', $data, function($message)use($request)
            // {
            //     $message->to($request->email)->subject('Your Order Status');
            // });

            // session::flash('status', 'Your Order Status Was Changed...Check Your Email...!');
            // return redirect('admin/showorder');


            $data=cart::where('user_id',Auth::user()->id)->delete();
            return view('layout/front/product/orderdone');
       
        }
        else
        {
            return redirect('products');
        }
    }
}


