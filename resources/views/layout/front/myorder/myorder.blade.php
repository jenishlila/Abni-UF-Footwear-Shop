@extends('layout/front/app')
@section('title','MY Order')
@section('content')
<div class="woocommerce">
					<div class="container">
						<div class="content-top">
							<h2>My Order</h2>
							{{-- <p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p> --}}
                        </div>
                            {{-- @foreach ($orders as $order)
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                <div class="ribbon ribbon-success">User Data</div>
                                    <p class="m-b-0"><b>Name:</b> {{$order->name}} <br>
                                        <b>Email:</b> {{$order->email}}<br>
                                        <b>Mobile:</b> {{$order->mobile}}<br>
                                    </p>
                                </div>
                            </div>
        
                                    <div class="col-lg-4">
                                    <div class="card-box ribbon-box">
                                        <div class="ribbon ribbon-success">Billing Address</div>
                                        <p class="m-b-0">
                                        <b>Name:</b>{{$order->bname}}<br>
                                        <b>Address:</b>{{$order->baddress}},
                                            {{$order->bcity}},
                                            {{$order->bstate}}<br>
                                        <b>Pincode:</b>{{$order->bpincode}}<br>
                                        <b>Email:</b>{{$order->bemail}}<br>
                                        <b>Mobile:</b> {{$order->bmobile}}</p>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-success">Shipping Address</div>
                                    <p class="m-b-0">
                                        <b>Name:</b>{{$order->sname}}<br>
                                        <b>Address:</b>{{$order->saddress}},
                                            {{$order->scity}},
                                            {{$order->sstate}}<br>
                                        <b>Pincode:</b>{{$order->spincode}}<br>
                                        <b>Email:</b>{{$order->semail}}<br>
                                        <b>Mobile:</b> {{$order->smobile}}
                                    </p>
                                    </div>
                                </div>
                                </div>
                                @endforeach   --}}
				
                        <div class="container">
                            <div class="content-top no-border">
                            </div>
                            <div class="table-responsive-wrapper">
                                <table class="table-order table-wishlist">
                                    <thead>
                                        <tr>
                                            <td>Image</td>
                                            <td>Product Name</td>
                                            <td>Qauntity</td>
                                            {{-- <td><td> --}}
                                            <td>Price</td>
                                            <td>Total Price</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $key=> $order)
                                        <tr class="cart">
                                            <td class="text-center">
                                                <img src="{{url('/')}}/resources/assets/admin/images/product/{{$order->upc}}/main.png?{{rand()}}" class="img-thumbnail" width="150" id="images" alt="">
                                            </td>
                                                 {{-- <table class="table-order-product-item"> --}}
                                                    {{-- <tr>  --}}
                                                        <td class="text-center">{{$order->pname}}</td>
                                                        <td class="text-center">{{$order->qty}}</td>
                                                        <td class="text-center">{{$order->price}}</td>
                                                        <td class="text-center">{{$order->total}}</td>


                                                        {{-- <td><td> --}}
                                                            {{-- <td class="text-center">{{$order->price}}</td>
                                                
                                                        <td class="text-center"><i class="fa fa-inr"></i>{{$order->price*$pro_qty[$key]}}</td> --}}
                                                        
                                                    
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                    </div>
                                </div><!--- .table-responsive-wrapper-->
                        </div><!--- .container-->
                        



						<div class="line-bottom"></div>
					</div><!--- .container--->
                </div><!--- .woocommerce--->
@endsection