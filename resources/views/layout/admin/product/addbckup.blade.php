@extends('layout/admin/app')
@section('title','Product List')
 @section('content')
    <div class="topbar-left">
         <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Add Product</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                       
                        <div class="row">
                     <div class="col-sm-12">
                            <div class="card-box text-left">
                                    <div class="form-group text-right">
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-primary  m-b-20" href="{{url('admin/product')}}" ><i class="fa fa-angle-left"></i> Back</a>
                                    </div>
                                <form class="form-horizontal" role="form" action="{{url('admin/product')}}" method="post" name="add" enctype="multipart/form-data" id="addproduct">
                                    @csrf  
                                    

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Product Name</label>
                                        <div class="col-10">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Product Name..." value="{{ old('name') }}">
                                            <input type="hidden" name="access_url" id="access_url">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span>{{url('/')}}/
                                                <input type="text"  id="access_url_spantag" class="access_url_spantag">
                                            </span>
                                        
                                            {{-- <span id="access_url_spantag" class="access_url_spantag"></span> --}} 
                                        <span class="edit_save btn btn-action"><i class="fa fa-edit"></i></span>
                                        <span class="save btn btn-action" style="display:none;"><i class="fa fa-save"></i></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">UPC</label>
                                        <div class="col-10">
                                            <input type="text" name="upc" maxlength="12" onkeypress="if(this.value.length==12);" class="form-control" placeholder="Enter Universal Product Code..." value="{{ old('upc') }}">
                                            @error('upc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                 <div class="form-group row">
                                        <label class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" rows="5" name="description" value="{{ old('description') }}"></textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Brand Name</label>
                                        <div class="col-10">
                                            <select name="brand_id" class="form-control">
                                           <option value='none' hidden disabled selected>Select Brand Name</option>
                                         @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                         @endforeach
                                    
                                            </select>
                                            @error('brand_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Color Name</label>
                                        <div class="col-10">
                                            <select name="color_id" class="form-control">
                                            <option value='none' hidden disabled selected>Select Color Name</option>
                                         @foreach ($colors as $color)
                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                         @endforeach
                                             </select>
                                             @error('color_id')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                         @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Price</label>
                                        <div class="col-10">
                                            <input type="text" name="price" class="form-control" id="priceValidation" value="{{ old('price') }}">
                                            @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Stock</label>
                                        <div class="col-10">
                                            <input type="text" name="stock" class="form-control" value="{{ old('stock') }}" >
                                            @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Image upload</label>
                                        <div class="controls">
                                            <input type="file"  name="image" id="image" accept="image/png, image/gif, image/jpeg" value="{{ old('image') }}"/>
                                            <span class="text-danger">{{$errors->first('image')}}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="moreimage">
                                       <br> <label class="col-2 col-form-label">Add Multiple Image</label>
                                    <div class="form-group addmultiimage">
                                        <div class="row">
                                            <div class="call-md-2 ml-1">
                                                <input type="file"  class="form-control" data-buttonname="btn-primary" name="multiimage[]" class="form-control" accept="image/png, image/gif, image/jpeg" value="{{ old('multiimage[]') }}">
                                                @error('multiimage[]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 ml-1">
                                                <input type="text"  class="form-control sort"  name="sort[]" placeholder="Sort Number" maxlength="2" onkeypress="if(this.value.length==2);" value="{{ old('sort[]') }}">
                                                @error('sort[]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div>
                                                 <button type="button" class="form-control add btn btn-primary" >
                                                     ADD                
                                                </button>
                                                @error('add')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="ml-1">
                                                <button type="button" class="form-control remove_image  btn btn-danger" style="display:none">
                                                    REMOVE                                                   
                                               </button>
                                               @error('remove')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                           </div>
                                    </div>
                                    
                                    </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4 text-md-right" >
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                         </div>
                    </div> <!-- end Panel -->
                </div> <!-- container -->
            </div> <!-- content -->
        </div>
        $shipId = $shipdata->id;
            return $shipId;

            $products = Cart::join('products','products.id','=','cart.product_id')
            ->where('cart.user_id',Auth::user()->id)
            ->select('products.*','cart.*')->get();      
            
            foreach ($products as $key => $cartdata) 
            {
                $pro_id[]= $cartdata['product_id'];
                $pro_qty[]= $cartdata['qty'];
            }
            foreach($products as $key=>$product)
            {
                $totalqty +=$product->qty; 
                $totalprice +=$product->price*$product->qty;
                    
            }
                $baddress=baddress::where('id',$billId)->get();
                $saddress=saddress::where('id',$shipId)->get();
                return view('layout/front/product/order', compact('products', 'pro_qty','totalqty','totalprice','baddress','saddress'));
@endsection

@section('scripts')
<script> 
$(document).on("click",".edit_save",function(){
    $('#access_url_spantag').addClass('form-control').attr('contenteditable',true);
    $('.save').show();
});

$(document).on("input ","#name",function(){
    var curvalue=$(this).val();
    var access_url=curvalue.trim().replace(/[^a-z0-9\s]/gi,'').replace(/ +/g,'-').replace(/^-|-$/g,'');
    $(document).find("#access_url_spantag").text(access_url.toLowerCase());
    $(document).find("#access_url").val(access_url.toLowerCase());
});
// /^[a-z0-9]+$/i
// $(".access_url_spantag").keypress(function(e){
//      var keyCode = e.which;
//      if((keyCode >= 65 && keyCode <= 90) && (keyCode != 32 && keyCode != 0)){
//     //  if ( (keyCode != 8) && (keyCode < 48 || keyCode > 57) && (keyCode >= 65 || keyCode <= 90)) { 
//       return false;
//     }
//   });
// && (keyCode >= 48 && keyCode <= 57) 
// $(".access_url_spantag").keypress(function(e){
//         var keyCode = e.which;
//         if(!(keyCode  >= 65 && keyCode  <= 120)  && (keyCode  != 32)) { 
//                 return false;
//         }
//     });

$(document).on("input ",".access_url_spantag",function(){
    $(this).text($(this).text().toLowerCase().replace(/[^a-z0-9\s]/gi,'').replace(/ +/g,'-').replace(/^-|-$/g,''));
});
//     $(this).text($(this).text().toLowerCase();


$('.save').click(function(){
    $("#access_url_spantag").removeClass("form-control").attr("contenteditable",false);
    $('#access_url').val($('#access_url_spantag').text());
    $(".save").hide();
});


$(function(){
    
    $('.moreimage').on('click','.add',function(){
        $(this).closest('.addmultiimage').clone().find("input").val("").end().insertAfter($(this).closest('.addmultiimage'));
        if ($(".addmultiimage").length != 1)
        {
            $('.remove_image').show();
        }

    });
$('.moreimage').on("click", ".remove_image", function() {
    if ($(".addmultiimage").length > 1) 
    {
        $(this).closest(".addmultiimage").remove();
    }
    if ($(".addmultiimage").length == 1) 
    {
         $('.remove_image').hide();
    }
});

jQuery.validator.addMethod("currency", function (value, element) {
      return this.optional(element)
        || /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(value);
    }, "Please Enter valid amount");
    
$(".sort").keypress(function(e){
     var keyCode = e.which;
    /*
      8 - (backspace)
      48-57 - (0-9)Numbers
    */
 
    if ( (keyCode != 8) && (keyCode < 48 || keyCode > 57)) { 
      return false;
    }
  });
   

    $('#addproduct').validate({
        ignore:[],
        rules:{
            name:{
                required:true,
                maxlength:50,
            },
            upc:{
                required:true,
                digits:true,
                minlength:12,
                maxlength:12,
               
            remote:{
                url:"{{url("admin/product/AdduniqueProduct")}}",
                type:"GET",
                data:{
                    colorName:function(){
                        return $("#upc").val();
                    }
                },
            }
            },

            access_url:{
                remote:{
                url:"{{url("admin/product/AdduniqueAccessUrl")}}",
                type:"GET",
                data:{
                    product:function(){
                        return $("#access_url").val();
                    }
                },
            }

            },
            description:{
                required:true,
                maxlength:100,
            },
            brand_id:{
                required:true,
            },
            color_id:{
                required:true,
                digits:true,
            },
            image:{
                required:true,
                accept:'png,jpg,jpeg,gif',
                maxsize : 5242880,
            },
            price:{
                required:true,
                maxlength:8,
                currency:true,
                
                
            },
            stock:{
                required:true,
                digits:true,
                maxlength:5,
            },
            'multiimage[]':{
                accept:'png,jpg,jpeg,gif',
               
            },
            
            'sort[]':{
                digits:true,
            },
            
        },
        messages:{
            name:{
                required:"Please Enter Product Name",
                maxlength: "maxLength should be 50",
            },
            
            upc:{
            required:"Please Enter UPC",
            digits: "Please enter only numbers",
            minlength: "The UPC should be 12",
            maxlength: "Maxlength should be 12 Digits",
            remote:"UPC Already Exists",
          

        },
        description:{
            required:"Please Enter description",
            maxlength: "Maxlength should be 100",

        },
        brand_id:"Please Select Brand Name",
        color_id:"Please Select Color Name",
        
        image:{
               required:'Please Choose Image',
               accept:'File Must Have png,jpg,jpeg',
           },
        price:{
                required:"Please Enter Price",
                maxlength:"The price may not be greater than 999999",
                
        },
        stock:{
                required:"Please Enter Stock",
                digits: "Please enter Valid Stock",
                maxlength:"The stock may not be greater than 99999",
                
        },
        'sort[]':{
                digits: "Please enter only numbers",

            },
        'multiimage[]':{
                accept:'File Must Have png,jpg,jpeg',
                
            },
        access_url:{
            remote:"Access URL Already taken"
        },

        },
        
        submitHandler:function(form){
            form.submit();
        }

    });
}); 
  // $id = $request->input('product_id');
        // $session = $request->session();
        // $cartData = ($session->get('cart')) ? $session->get('cart') : array();
        // if (array_key_exists($id, $cartData)) {
        //     $cartData[$id]['qty']++;
        // } else {
        //     $cartData[$id] = array(
        //         'qty' => 1
        //     );
        // }
        // $request->session()->put('cart', $cartData);

        $oldcart=Session::get('cart',[]);
        if(isset($request->remove))
        {
            unset($oldcart[$request->remove]);
            $request->session()->put('cart',$oldcart);
        }
        else
        {
            $oldcart[$request->id]['qty']=$request->qty;
            $price=$request->qty * $request->price;
            session()->put('cart',$oldcart);
            return response()->json($price);
        }



        $oldcart=Session::get('cart');
        if(isset($request->remove))
        {
            unset($oldcart[$request->id]);
        }
        else
        {
            $oldcart[$request->id]['qty']=$request->qty;
            $price=$request->qty * $request->price;
        }
        session()->put('cart',$oldcart);
        return response()->json($price);
        jQuery(function() {
       jQuery("input[type='radio']").change(function(){
            // alert('hiii');
             var status = $(".check:checked").val();
		    var id=jQuery(this).find('orderid').val();
            // var id=jQuery(this).parent().parent().find('.check');
		    // var id=jQuery(this).parent().find('orderid').val();
            // alert(id);
            alert(id);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{url('admin/order/orderstatus')}}",
                data: {
                        'status': status,
                        'id':$(this).attr('id')
                        },
                success: function(data){
                  console.log(data.success);    
                }
            });
    });
</script>
@endsection
@extends('layout/front/app')
@section('title','Shipping Address')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
        <li class="home"> <a href="{{url('home')}}" title="Go to Home Page">Home</a></li>
            <li> <strong>Checkout</strong></li>
        </ul>
    </div>
</div><!--- .breadcrumbs-->

<div class="woocommerce shipping">
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
                    <div class="step-process-item"><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Address</span></div>
                </li>
                <li>
                    <div class="step-process-item active"><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Shipping Address</span></div>
                </li>
                <li>
                    <div class="step-process-item"><i data-href="checkout-step4.html"  class="redirectjs  step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
                </li>
                <li>
                    <div class="step-process-item"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
                </li>
            </ul>
        </div><!--- .checkout-step-process --->
        <form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout" action="{{url('product/shippingstore')}}" id="address" enctype="multipart/form-data">
            <form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout" action="{{url('product/shippingstore')}}" id="address" enctype="multipart/form-data">
            @csrf
            <ul class="row">
                <li class="col-md-9">
                    <div class="checkout-info-text">
                        <h3>Shipping Address</h3>
                    </div>
                    
                    <div class="woocommerce-billing-fields">
                             
                        
                        <!--dnone block -->
                              <div class="dnoneblock" style="display: none">
                                <ul class="row main" style="margin-top: 20px;">
                                    <li class="col-md-12">
                                        <p class="form-row validate-required" id="billing_first_name_field">
                                        <label for="billing_first_name" class="">Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="name" id="name" placeholder="" value="{{old('name')}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </li>
                                <li class="col-md-12  col-left-12">
                                    <p class="form-row  validate-required validate-email" id="billing_email_field">
                                        <label for="billing_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="email" id="billing_email" placeholder="" value="{{old('email')}}">
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
                                        <textarea type="text"  class="form-control" rows="5" class="input-text " name="address" id="address" placeholder="" value="{{ old('address') }}"></textarea>
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
                                        <input type="text" class="input-text " name="city" id="city" placeholder="" value="{{ old('city') }}">
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
                                        <input type="text" class="input-text " name="state" id="state" placeholder="" value="{{ old('state') }}">
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
                                        <input type="text" class="input-text " maxlength="6" name="pincode" id="pincode" value="{{ old('pincode') }}">
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
                                        <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" value="{{ old('mobile')}}">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </p>
                                </li>
                            </ul>
                            </div>
                                <!-- end block --> 
                        


                        <div class="available"> 
                            <ul class="row">
                                <li class="col-md-12">
                                   <p><span>Available Address</span></p>
                                   {{-- <strong>Available Address</strong> --}}
                                   <ul>
                                    @if(!$saddress->isEmpty())
                                    @foreach ($saddress as $saddress)
                                        <li class="col-md-4">
                                    <input type="radio" name="shipping" id="{{$saddress->id}}" value="{{$saddress->id}}"><label for="rs1">Shipping Address</label></span>
                                                <p><strong>{{$saddress->name}}</strong><br>
                                                {{$saddress->address}}, {{$saddress->city}}<br>
                                                {{$saddress->state}}, {{$saddress->pincode}}<br>
                                                {{$saddress->email}}<br>
                                                +91 {{$saddress->mobile}}<br>
                                            </p>
                                            
                                        </li>
                                        @endforeach
                                        {{-- @endif --}}
                                    </ul>
                                </li>
                            </ul>
                                <button type="button" class="btn-step add">+</button>
                           </div>
                            <ul class="row text-right plus" style="display: none;">
                                <button type="button" class="btn-step" id="plus" style="margin-top: 10px">Show Available Address</button>
                            </ul>
                        
                        @else
                        <ul class="row" style="margin-top: 20px;">
                            <li class="col-md-12">
                                <p class="form-row validate-required" id="billing_first_name_field">
                                    <label for="billing_first_name" class="">Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="name" id="name" placeholder="" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </li>
                            <li class="col-md-12  col-left-12">
                                <p class="form-row  validate-required validate-email" id="billing_email_field">
                                    <label for="billing_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text " name="email" id="billing_email" placeholder="" value="{{ old('email') }}">
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
                                    <textarea type="text"  class="form-control" rows="5" class="input-text " name="address" id="address" placeholder="" value="{{ old('address') }}"></textarea>
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
                                    <input type="text" class="input-text " name="city" id="city" placeholder="" value="{{ old('city') }}">
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
                                    <input type="text" class="input-text " name="state" id="state" placeholder="" value="{{ old('state') }}">
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
                                    <input type="text" class="input-text " maxlength="6" name="pincode" id="pincode" value="{{ old('pincode') }}">
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
                                    <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </p>
                            </li>
                        </ul>


                  
                        @endif
                        



                    </div><!--- .woocommerce-billing-fields--->	
                    
                    <div class="checkout-col-footer">
                        {{-- <div class="form-group text-right"> --}}
                            <a  href="{{url('product/address')}}" ><button class="btn-step checkout" style="margin-top: 10px"> previous</button></a>

							<button type="submit" class="btn-step checkout" style="margin-top: 10px"> continue</button>
			
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
    jQuery('.add').click(function() {
        jQuery('.dnoneblock').show();
        jQuery('.available').hide();
        jQuery('.plus').show();
        
   });
   jQuery('.plus').click(function(){
    //    alert ('cxx');
        jQuery('.available').show();
        jQuery('.main').hide();
        jQuery('#plus').hide();
});

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

// if($request->shipping=='billing')
            // {
            //     $data=baddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
            //     // $billId = $data->id;
            //     $shipdata=saddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
            //     return redirect('product/showorderreview');
            // }
            // else
            // {
            //     $data=baddress::Create(['user_id'=>Auth::user()->id,'name'=>$request->name,'address'=>$request->address,'email'=>$request->email,'state'=>$request->state,'pincode'=>$request->pincode,'mobile'=>$request->mobile,'city'=>$request->city]);
            //     $saddress=saddress::where('user_id',Auth::user()->id)->limit(3)->get();
            //     // return $saddress;
            //     return view('layout/front/product/shipping_address',compact('saddress'));
            // }




        // return $request;
        // if(isset($request->status))
        // {
        //     if($request->status=='OTW')
        //     {
        //         // $data=[
        //         //         'title'=>'Order Status',
        //         //         'content'=>$request->status,
        //         //         // 'name'=>$orders->name,
        //         //         // 'qty' =>$orders->qty,
        //         //         // 'price'=>$orders->price,
        //         //         // 'total'=>$orders->total,
        //         //         // 'orders'=>$data
        //         //     ];

        //         foreach($orders as $key=> $order)
        //         {
        //             return $order->name;
        //         }
        //         return $orders;
            
        //         $mail=Mail::send('layout/admin/order/sendmail', compact('orders'), function($message)use($request)
        //         {
        //             $message->to($request->email)->subject('Your Order Status');
        //         });
        //         session::flash('status', 'Your Order Status Was Changed...Check Your Email...!');
        //         return redirect('admin/showorder');
                

        //     }
        //     elseif($request->status=='P')
        //     {
        //         $data=order::where('id',$request->id)->update(['order_status'=>$request->status]);
                
        //         $data=[
        //             'title'=>'Order Status',
        //             'content'=>$request->status,
        //             'name'=>$orders->name,
        //             'qty' =>$orders->qty,
        //             'price'=>$orders->price,
        //             'total'=>$orders->total,
        //             'orders'=>$data
        //         ];
            
        //         $mail=Mail::send('layout/admin/order/sendmail', $data, function($message)use($request)
        //         {
        //             $message->to($request->email)->subject('Your Order Status');
        //         });
        //         session::flash('status', 'Your Order Status Was Changed...Check Your Email...!');
        //         return redirect('admin/showorder');

        //     }
        //     else
        //     {
        //         $data=order::where('id',$request->id)->update(['order_status'=>$request->status]);

        //         $data=[
        //             'title'=>'Order Status',
        //             'content'=>$request->status,
        //             'name'=>$orders->name,
        //             'qty' =>$orders->qty,
        //             'price'=>$orders->price,
        //             'total'=>$orders->total,
        //             'orders'=>$data
        //         ];
            
        //         $mail=Mail::send('layout/admin/order/sendmail', $data, function($message)use($request)
        //         {
        //             $message->to($request->email)->subject('Your Order Status');
        //         });
        //         session::flash('status', 'Your Order Status Was Changed...Check Your Email...!');
        //         return redirect('admin/showorder');
                
        //     }

        // }