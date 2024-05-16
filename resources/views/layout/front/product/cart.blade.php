@extends('layout/front/app')
@section('title','My Cart')
@section('content')
<div class="main-container col1-layout content-color color">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
						<li class="home"> <a href="{{url('home')}}" title="Go to Home Page">Home</a></li>
							<li> <strong>My Cart</strong></li>
						</ul>
					</div>
				</div><!--- .breadcrumbs-->
				
				<div class="container">
					<div class="content-top no-border">
						<h2>My Cart</h2>
					{{-- <div class="wish-list-notice"><i class="icon-check"></i>Product with Variants has been added to your wishlist. <a href="{{url('products')}}">Click here</a> to continue shopping.</div> --}}
					</div>
					<div class="table-responsive-wrapper">
					@if(!$products->isEmpty())

						<table class="table-order table-wishlist">
							<thead>
								<tr>
									<td>Remove</td>
									<td>Product Detail </td>
									{{-- <td>Name</td> --}}
									<td>Items</td>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $key=> $product)
								{{-- {{$product->name}} --}}
								<tr>
									<td>
									<button type="button" class="button-remove" id="{{$product->id}}"><i class="icon-close"></i></button></td>
									<td>
										<table class="table-order-product-item">
											<tr>
												<td class="text-center"> <img src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" class="img-thumbnail" width="150" id="images" alt=""></td>
												<td class="text-center"><p>	{{$product->name}}</p></td>
											</tr>
										</table>
									</td>
									<td class="wish-list-control">
										<div class="price">
											<i class="fa fa-inr"></i>{{$product->price*$pro_qty[$key]}}
										</div>
										<div class="number-input">
											<button type="button"  class="minus" min="1">-</button>
											<input type="text" value="{{$pro_qty[$key]}}" class="qty" maxlength="3"  name="qty" id="qty">
											<button type="button" class="plus">+</button>
											<input type="hidden" name="id" id="{{$product->id}}">
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="form-group text-right">
							<a  href="{{url('product/checkout')}}" ><button class="btn-step checkout" style="margin-top: 10px"> CHECKOUT</button></a>
						</div>
					@else
						<div class="cartempty"> 
								<div class="wish-list-notice"><i class="icon-check"></i>Cart Is Empty...!! <a href="{{url('products')}}">Click here</a> to continue shopping.</div>
						</div>
					@endif
					<div class="cartempt" style="display:none"> 
						<div class="wish-list-notice"><i class="icon-check"></i>Cart Is Empty...!! <a href="{{url('products')}}">Click here</a> to continue shopping.</div>
					</div>
						

					</div><!--- .table-responsive-wrapper-->
				</div><!--- .container-->
			</div><!--- .main-container -->
@endsection
@section('script')
<script>
	jQuery('.number-input').on('click input',"input[type='text'],.minus,.plus",function(){
		// alert('dfsdf');

		var price=jQuery(this).parent().parent().find('.price');
		
		jQuery.ajax({
			type:"get",
			url:"{{url('cart/update')}}",
			data:{
				id:jQuery(this).parent().find("input[name='id']").attr('id'),
				qty:jQuery(this).parent().find('#qty').val(),
			},
			success:function(response){
				price.html('<i class="fa fa-inr"></i>'+ response);
			}
		});
	});
	jQuery('.button-remove').click(function() {
		jQuery(this).parent().parent().remove();
		if(jQuery("tbody  >tr").length==0)
		{	
			jQuery('.cartempt').show();
			jQuery('.table-wishlist').hide();
			jQuery('.checkout').hide();
		}
		jQuery.ajax({
			type:"get",
			url:"{{url('cart/update')}}",
			data:{
				remove:jQuery(this).attr('id'),
				
			},
			success:function(response){
				// jQuery('.cartempty').html(response);
				
			},

		});
   });
	jQuery(".number-input").keypress(function(e){
		var keyCode = e.which;
	/*
		8 - (backspace)
		48-57 - (0-9)Numbers
	*/
	
	if ( (keyCode != 8) && (keyCode < 48 || keyCode > 57)) { 
		return false;
	}
	});
</script>
	
@endsection
