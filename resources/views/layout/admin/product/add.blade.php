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
                                    <style type="text/css">.error{color: red!important;}</style>
                                    @csrf  
                                    

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Product Name</label>
                                        <div class="col-10">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Product Name..." value="{{ old('name') }}">
                                            {{-- <input type="hidden" name="access_url" id="access_url"> --}}
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span>{{url('/')}}/<span  class="access_url_spantag" ></span><input type="text" name="access_url"  id="access_url_spantag" style="display:none;">
                                           </span>
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
                                        <label class="col-2 col-form-label">Size</label>
                                        <div class="col-10">
                                            <select name="size_id" class="form-control">
                                            <option value='none' hidden disabled selected>Select Size</option>
                                         @foreach ($size as $size)
                                                {{-- <input type="checkbox" name="size_id[]" value="{{$size->id}}"> {{$size->size}} --}}

                                            <option value="{{$size->id}}">{{$size->size}}</option>
                                         @endforeach
                                             </select>
                                             @error('size_id')
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
@endsection

@section('scripts')
<script> 
$(document).on("click",".edit_save",function(){
    $('#access_url_spantag').val($('.access_url_spantag').text()).show();
    // addClass('form-control');
    $('.save').show();
    $('.edit_save').hide();
    $('.access_url_spantag').hide();

    
});

$(document).on("input ","#name",function(){
    var curvalue=$(this).val();
    var access_url=curvalue.trim().replace(/[^a-z0-9\s]/gi,'').replace(/ +/g,'-');
    $(document).find(".access_url_spantag").text(access_url.toLowerCase());
    // $('.access_url_spantag').val($('#access_url_spantag').text());

    
});

$(document).on("input ","#access_url_spantag",function(){
    console.log("here");
    console.log($(this).val());
    
    var one = $(this).val().toLowerCase().replace(/[\s]+/gi,'-').replace(/[\s]?[^a-z0-9-]/gi,'').replace(/[-]+/g,'-');
    // console.log(one);
    $(this).val(one);

    // $(this).focus();
});

$('.save').click(function(){
    $("#access_url_spantag").hide();
    $('.access_url_spantag').text($('#access_url_spantag').val());
    $(".save").hide();
    $('.access_url_spantag').show();
    $('.edit_save').show();


    // $('input[name="access_url"]').val($('.access_url_spantag').text());
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
   

    // $('#addproduct').validate({
    //     ignore:[],
    //     rules:{
    //         name:{
    //             required:true,
    //             maxlength:50,
    //         },
    //         upc:{
    //             required:true,
    //             digits:true,
    //             minlength:12,
    //             maxlength:12,
                  
    //         remote:{
    //             url:"{{url("admin/product/AdduniqueProduct")}}",
    //             type:"GET",
    //             data:{
    //                 colorName:function(){
    //                     return $("#upc").val();
    //                 }
    //             },
    //         }
    //         },

    //         access_url:{
    //             required:true,
    //             remote:{
    //             url:"{{url("admin/product/AdduniqueAccessUrl")}}",
    //             type:"GET",
    //             data:{
    //                 product:function(){
    //                     return $("#access_url").val();
    //                 }
    //             },
    //         }

    //         },
    //         description:{
    //             required:true,
    //             maxlength:100,
    //         },
    //         brand_id:{
    //             required:true,
    //         },
    //         color_id:{
    //             required:true,
    //             digits:true,
    //         },
    //         image:{
    //             required:true,
    //             accept:'png,jpg,jpeg,gif',
    //             maxsize : 5242880,
    //         },
    //         price:{
    //             required:true,
    //             maxlength:8,
    //             currency:true,
                
                
    //         },
    //         stock:{
    //             required:true,
    //             digits:true,
    //             maxlength:5,
    //         },
    //         'multiimage[]':{
    //             accept:'png,jpg,jpeg,gif',
               
    //         },
            
    //         'sort[]':{
    //             digits:true,
    //         },
            
    //     },
    //     messages:{
    //         name:{
    //             required:"Please Enter Product Name",
    //             maxlength: "maxLength should be 50",
    //         },
            
    //         upc:{
    //         required:"Please Enter UPC",
    //         digits: "Please enter only numbers",
    //         minlength: "The UPC should be 12",
    //         maxlength: "Maxlength should be 12 Digits",
    //         remote:"UPC Already Exists",
          

    //     },
    //     description:{
    //         required:"Please Enter description",
    //         maxlength: "Maxlength should be 100",

    //     },
    //     brand_id:"Please Select Brand Name",
    //     color_id:"Please Select Color Name",
        
    //     image:{
    //            required:'Please Choose Image',
    //            accept:'File Must Have png,jpg,jpeg',
    //        },
    //     price:{
    //             required:"Please Enter Price",
    //             maxlength:"The price may not be greater than 999999",
                
    //     },
    //     stock:{
    //             required:"Please Enter Stock",
    //             digits: "Please enter Valid Stock",
    //             maxlength:"The stock may not be greater than 99999",
                
    //     },
    //     'sort[]':{
    //             digits: "Please enter only numbers",

    //         },
    //     'multiimage[]':{
    //             accept:'File Must Have png,jpg,jpeg',
                
    //         },
    //     access_url:{
    //         remote:"Access URL Already taken",
    //         required:"Access URL Required",

    //     },

    //     },
        
    //     submitHandler:function(form){
    //         form.submit();
    //     }

    // });
}); 

</script>
@endsection