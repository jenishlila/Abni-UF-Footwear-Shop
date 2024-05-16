@extends('layout/front/app')
@section('title','Shipping ')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
        <li class="home"> <a href="{{url('home')}}" title="Go to Home Page">Home</a></li>
            <li> <strong>Checkout</strong></li>
        </ul>
    </div>
</div><!--- .breadcrumbs-->

<div class="woocommerce">
    <div class="container">
        <div class="content-top">
            <h2>Address</h2>
        </div><!--- .content-top-->
        <div class="checkout-step-process">
            <ul>
                <li>
                    <div class="step-process-item"><i data-href="checkout-step1.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Checkout</span></div>
                </li>
                <li>
                    <div class="step-process-item "><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Address</span></div>
                </li>
                <li>
                    <div class="step-process-item active"><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">shipping</span></div>
                </li>
                <li>
                    <div class="step-process-item"><i data-href="checkout-step4.html"  class="redirectjs  step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
                </li>
                <li>
                    <div class="step-process-item"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
                </li>
            </ul>
        </div><!--- .checkout-step-process --->
        <form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout" action="{{url('product/shipupdatesave')}}" id="address" enctype="multipart/form-data">
            @csrf
            <ul class="row">
                <li class="col-md-9">
                    <div class="checkout-info-text">
                        <h3>Billing Address</h3>
                        {{-- <p>Already Registed? Please login below.</p> --}}
                    </div>
                    
                    <div class="woocommerce-billing-fields">
                        <ul class="row">
                            {{-- @foreach ($saddress as $baddress) --}}
                            <input type="hidden" name="id" value="{{$baddress->id}}">
                              <li class="col-md-12">
                                <p class="form-row validate-required" id="billing_first_name_field">
                                    <label for="billing_first_name" class="">Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="name" id="name" placeholder="" value="{{$baddress->name}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </li>
                            {{-- <li class="col-md-6">
                                <p class="form-row validate-required" id="billing_last_name_field">
                                    <label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="{{ old('color') }}">
                                </p>
                            </li> --}}
                            <li class="col-md-12  col-left-12">
                                <p class="form-row  validate-required validate-email" id="billing_email_field">
                                    <label for="billing_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="email" id="billing_email" placeholder="" value="{{$baddress->email}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </p>
                            </li>
                            <li class="col-md-12  col-left-12">
                                <p class="form-row  validate-required validate-email" id="address">
                                    <label for="billing_email" class="">Address<abbr class="required" title="required">*</abbr></label>
                                    <textarea type="text"  class="form-control" rows="5" class="input-text" name="address" id="address" placeholder="" style="">{{$baddress->address}}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row form-row-wide address-field validate-required" id="city">
                                    <label for="billing_city" class="">City <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="city" id="city" placeholder="" value="{{$baddress->city}}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row address-field validate-state" id="state">
                                    <label for="billing_state" class="">State</label>
                                    <input type="text" class="input-text " name="state" id="state" placeholder="" value="{{$baddress->state}}">
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row address-field validate-postcode woocommerce-validated" id="pincode">
                                    <label for="pincode" class="">pincode <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " maxlength="6" name="pincode" id="pincode" value="{{$baddress->pincode}}">
                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </p>
                            </li>
                            <li class="col-md-6">
                                <p class="form-row validate-required validate-phone woocommerce-validated" id="mobile">
                                    <label for="mobile" class="">Phone number <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" value="{{$baddress->mobile}}">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </p>
                            </li>
                            {{-- <li class="col-md-12 col-left-12 form-radios">
                                <span class="form-radio"><input type="radio" name="shipping" id="rs1" value="billing" checked><label for="rs1">Ship to this address</label></span>
                                <span class="form-radio"><input type="radio" name="shipping" class="shipping" id="rs2" value="shipping"><label for="rs2">Ship to different address</label></span>
                            </li> --}}
                            {{-- @endforeach --}}

                        </ul>
                    </div><!--- .woocommerce-billing-fields--->	
                    
                    <div class="checkout-col-footer">
                            <a  href="{{url('product/showorderreview')}}" ><button class="btn-step checkout" style="margin-top: 10px"> cancle</button></a>
                            <button type="submit" class="btn-step checkout" style="margin-top: 10px" > Save</button>
			
                        {{-- <input type="button"  value="Continue" class="btn-step"> --}}
                        <div class="note">(<span>*</span>) Required fields</div>
                    </div><!--- .checkout-col-footer--->	
                </li>
            </ul>
        </form><!--- form.checkout--->
        <div class="line-bottom"></div>
    </div><!--- .container--->
</div><!--- .woocommerce--->
@endsection

@section('script')
<script>

$(document).ready(function()
{
//     jQuery('.shipping').click(function() {
//         // alert('clcl');
// 		jQuery.ajax({
// 			type:"get",
// 			url:"{{url('product/shipping')}}",
// 			data:{
				
// 			},
// 			success:function(response){
// 				jQuery('.shipping').html(response);
				
// 			},

// 		});
//    });
$('#address').validate({
    rules:{
            name:{
                required:true,
                maxlength:50,
            },
            email: {
                required: true,
                maxlength: 50,
                email: true,
            },
            address:{
                required:true,
                maxlength:100,

            },
            city:{
                required:true,
            },
            state:{
                required:true,
            },
            pincode:{
                required:true,
                maxlength:6,
                digits:true,
                minlength:6,
            },
            mobile:{
            required:true,
            digits:true,
            minlength:10,
            maxlength:13
        },
    },
    messages:{
            address:{
               required:"Please Enter Address ",
               maxlength: "maxLength should be 100 charecter",
            },
        city:"Please Enter City",
        state:"Please Enter State",

            name:{
                required:"Please Enter Product Name",
                maxlength: "maxLength should be 50",
            },
            email: {
                required: "Please enter valid email",
                email: "Please enter valid email",
                maxlength: "The email name should less than or equal to 50 characters",
        },
        mobile:{ 
                required: "Please enter contact number",
                minlength: "The contact number should be 10 digits",
                digits: "Please enter only numbers",
                maxlength: "maxLength should be 13",
            },  
        pincode:{
                required: "Please enter pincode",
                minlength: "The pincode number should be 6 digits",
                maxlength: "maxLength should be 6",
                digits: "Please enter only numbers",

        },
    }

});
});


</script>
@endsection