@extends('layout/front/app')
@section('title','Order')
@section('content')
<div class="woocommerce">
					<div class="container">
						<div class="content-top">
							<h2>Checkout</h2>
							{{-- <p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p> --}}
						</div>
						<div class="checkout-step-process">
							<ul>
								<li>
									<div class="step-process-item active"><i data-href="checkout-step1.html" class="redirectjs step-icon icon-note"></i><span class="text">Checkout</span></div>
								</li>
								<li>
									<div class="step-process-item"><i  data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Address</span></div>
								</li>
								<li>
									<div class="step-process-item"><i class="step-icon-truck step-icon"></i><span class="text">Shipping</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step5.html" class="redirectjs step-icon icon-notebook"></i><span class="text">Order Review</span></div>
								</li>
							</ul>
						</div><!--- .checkout-step-process--->
						{{-- <ul class="row">
							<h4> checkout <h4>
                        </ul> --}}
                        <div class="container">
                            <div class="content-top no-border">
                            </div>
                            <div class="table-responsive-wrapper">
                                <table class="table-order table-wishlist">
                                    <thead>
                                        <tr>
                                            <td>Image</td>
                                            <td>Product Name</td>
                                            <td>Items</td>
                                            {{-- <td><td> --}}
                                            <td>Price</td>
                                            <td>Total Price</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $key=> $product)
                                        <tr class="cart">
                                            <td class="text-center">
                                                <img src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" class="img-thumbnail" width="150" id="images" alt="">
                                            </td>
                                                 {{-- <table class="table-order-product-item"> --}}
                                                    {{-- <tr>  --}}
                                                        <td class="text-center">{{$product->name}}</td>
                                                        <td class="text-center">{{$pro_qty[$key]}}</td>
                                                        {{-- <td><td> --}}
                                                            <td class="text-center">{{$product->price}}</td>
                                                
                                                        <td class="text-center"><i class="fa fa-inr"></i>{{$product->price*$pro_qty[$key]}}</td>
                                                        
                                                        
                                                    {{-- </tr> --}}
                                                    {{-- </table> --}}
                                            {{-- </td> --}}
                                            {{-- <td class="wish-list-control">
                                                <div class="price">
                                                    <i class="fa fa-inr"></i>{{$product->price*$pro_qty[$key]}}
                                                </div>
                                                <div class="number-input">
                                                    <button type="button"  class="minus" min="1">-</button>
                                                    <input type="text" value="{{$pro_qty[$key]}}" class="qty" maxlength="3"  name="qty" id="qty">
                                                    <button type="button" class="plus">+</button>
                                                    <input type="hidden" name="id" id="{{$product->id}}">
                                                    <input type="hidden" name="price" id="{{$product->price}}">
                                                </div>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="text-right"> 
                                                <span>Total Item :{{$totalqty}}</span> ||
                                                <span>Grand Total:{{$totalprice}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group text-right">
                                    <a  href="{{url('product/cart')}}" ><button class="btn-step checkout" style="margin-top: 10px"> previous</button></a>
                                    
                                    <a  href="{{url('product/address')}}" ><button class="btn-step checkout" style="margin-top: 10px"> Next</button></a>
                                </div>
                                {{-- @else
                                    <div class="cartempty"> 
                                        <div class="wish-list-notice"><i class="icon-check"></i>Cart Is Empty...!! <a href="{{url('products')}}">Click here</a> to continue shopping.</div>
                                    </div>
                                    @endif
                                    <div class="cartempt" style="display:none"> 
                                        <div class="wish-list-notice"><i class="icon-check"></i>Cart Is Empty...!! <a href="{{url('products')}}">Click here</a> to continue shopping.</div> --}}
                                    </div>
                                    
    
                                    @forelse ($products as $key=>$product)
                                    @empty
                                    <p>No Product Available...!!
                                    </p>
                                    @endforelse
        
                            </div><!--- .table-responsive-wrapper-->
                        </div><!--- .container-->
                        



						<div class="line-bottom"></div>
					</div><!--- .container--->
                </div><!--- .woocommerce--->
@endsection