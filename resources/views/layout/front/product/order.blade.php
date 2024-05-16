@extends('layout/front/app')
@section('title','Order')
@section('content')
<div class="woocommerce">
					<div class="container">
						<div class="content-top">
							<h2>Order Review</h2>
							{{-- <p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p> --}}
						</div>
						<div class="checkout-step-process">
							<ul>
								<li>
									<div class="step-process-item"><i data-href="checkout-step1.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Checkout method</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step2.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Address</span></div>
								</li>
								<li>
									<div class="step-process-item"><i class="fa fa-check step-icon"></i><span class="text">Shipping</span></div>
								</li>
								{{-- <li>
									<div class="step-process-item"><i data-href="checkout-step3.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Delivery & Payment</span></div>
								</li> --}}
								<li>
									<div class="step-process-item active"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-notebook"></i><span class="text">Order Review</span></div>
								</li>
							</ul>
						</div><!--- .checkout-step-process-->						
						
						<ul class="row">
							<li class="col-md-9 col-padding-right">
								<table class="table-order table-order-review">
									<thead>
										<tr>
											<td width="68">Product Name</td><td width="14">price</td><td width="14">QTY</td><td width="14">Total</td>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($products as $key=>$product)
                                            
										<tr>
                                        <td class="name">{{$product->name}}</td><td>{{$product->price}}</td><td>{{$pro_qty[$key]}}</td><td class="price">Rs.{{$product->price*$pro_qty[$key]}}</td>
										</tr>
										{{-- <tr>
                                            <td class="name">Product name here</td><td>£220.00</td><td>1</td><td class="price">£220.00</td>
										</tr>
										<tr>
                                            <td class="name">Product name here</td><td>£220.00</td><td>1</td><td class="price">£220.00</td>
										</tr> --}}
                                        @endforeach
									</tbody>
								</table>
								<table class="table-order table-order-review-bottom">
									<tr>
										<td class="first" width="80%">Total Item</td>
										<td width="20%">{{$totalqty}}</td>
									</tr>
									{{-- <tr>
										<td class="first">Shipping Fee</td>
										<td>Free:</td>
									</tr>
									<tr>
										<td class="first">Voucher code</td>
										<td>£20.00</td>
									</tr> --}}
									<tr>
										<td class="first large">Total Payment</td>
										<td class="price large">Rs.{{$totalprice}}</td>
									</tr>
									<tfoot>
										<td colspan="2">
                                        <div class="left">Forgot an Item? <a href="{{url('product/cart')}}">Edit Your Cart</a></div>
											<div class="right">
												<a href="{{url('home')}}"><input type="button" value="Cancel" class="btn-step"></a>
												<a href="{{url('product/placeorder')}}"><input type="button" value="Place order" class="btn-step btn-highligh"></a>
											</div>
										</td>
									</tfoot>
								</table>
							</li>
							<li class="col-md-3">
								<ul class="step-list-info">
									<li>
										{{-- @foreach ($baddress as $baddress) --}}
										{{-- <input type="hidden" name="id" value="{{$baddress->id}}">	 --}}
										<div class="title-step">Billing Address<a  href="{{url('product/billingupdate/'.$baddress->id)}}">CHANGE</a>
										</div>
									{{-- <input type="hidden" value="{{$baddress}}"> --}}
									
                                                  <p><strong>{{$baddress->name}}</strong><br>
                                                    {{$baddress->address}}, {{$baddress->city}}<br>
                                                    {{$baddress->state}}, {{$baddress->pincode}}<br>
                                                    {{$baddress->email}}<br>
                                                    +91 {{$baddress->mobile}}
										</p>
                                        {{-- @endforeach --}}
									</li>
									<li>
                                        {{-- @foreach ($saddress as $saddress) --}}
                                        <div class="title-step">Shipping Address<a  href="{{url('product/shippingupdate/'.$saddress->id)}}">CHANGE</a></div>
										<p><strong>{{$saddress->name}}</strong><br>
                                            {{$saddress->address}}, {{$saddress->city}}<br>
                                            {{$saddress->state}}, {{$saddress->pincode}}<br>
                                            {{$saddress->email}}<br>
                                            +91 {{$saddress->mobile}}
                                        </p>
                                        {{-- @endforeach --}}
                                        
									</li>
								</ul>
							</li>
						</ul>
						<div class="line-bottom"></div>
					</div><!--- .container-->	
				</div><!--- .woocommerce-->
@endsection