@extends('layout/admin/app')
@section('title','Edit Product')
 @section('content')
    <div class="topbar-left">
         <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Edit Product</h4>
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
                                <form class="form-horizontal" role="form" action="{{url('admin/product/update')}}" method="post" name="add" enctype="multipart/form-data" id="editproduct">
                                    @csrf  
                                <input type="hidden" name="id" value="{{$products->id}}">
                                <input type="hidden" name="upc" value="{{$products->upc}}">

                                <div class="form-group row">
                                        <label class="col-2 col-form-label">Brand Name</label>
                                        <div class="col-10">
                                            <select name="brand_id" class="form-control">

                                           {{-- <option value='none' hidden disabled selected>Select Brand Name</option> --}}
                                         @foreach ($categories as $category)
                                        @if($category->id==$products->brand_id)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                         @endforeach
                                    
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Color Name</label>
                                        <div class="col-10">
                                            <select name="color_id" class="form-control">
                                            {{-- <option value='none' hidden disabled selected>Select Color Name</option> --}}
                                         @foreach ($colors as $color)
                                         @if($color->id==$products->color_id)
                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endif
                                         @endforeach
                                             </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Size</label>
                                        <div class="col-10">
                                            <select name="size_id" class="form-control">
                                            {{-- <option value='none' hidden disabled selected>Select Color Name</option> --}}
                                         @foreach ($size as $size)
                                         @if($size->id==$products->size_id)
                                            <option value="{{$size->id}}">{{$size->size}}</option>
                                        @endif
                                         @endforeach
                                             </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">UPC</label>
                                        <div class="col-10">
                                        <span name="upc" class="form-control">{{$products->upc}}
                                            @error('upc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Product Name</label>
                                        <div class="col-10">
                                            <input type="text" name="name" class="form-control" value="{{$products->name}}">
                                            {{-- <input type="hidden" name="ccess_url" id="access_url" value="{{$products->access_url}}"> --}}

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span>{{url('/')}}/ 
                                            <span  class="access_url_spantag">{{$products->access_url}}</span>
                                            <input type="text" name="access_url" id="access_url_spantag" style="display:none;" value="{{$products->access_url}}">
                                       </span>
                                    <span class="edit_save btn btn-action"><i class="fa fa-edit"></i></span>
                                    <span class="save btn btn-action" style="display:none;"><i class="fa fa-save"></i></span>
                                
                                        </div>
                                    </div>
                                 <div class="form-group row">
                                        <label class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" rows="5" name="description" >{{$products->description}}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Price</label>
                                        <div class="col-10">
                                            <input type="text" name="price" class="form-control" value="{{$products->price}}" id="priceValidation">
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
                                            <input type="text" name="stock" class="form-control" value="{{$products->stock}}">
                                            @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Image update</label>
                                        <div class="controls">
                                            <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg" onchange="url(this);"/>
                                        <img src="{{url('/')}}/resources/assets/admin/images/product/{{$products->upc}}/main.png?{{rand()}}" class="img-thumbnail" width="150" id="images" alt="">
                                        </div>
                                    </div> 
                                    <br> <label class="col-2 col-form-label">Edit Multiple Image</label>
                                    @foreach ($images as $image)
                                

                                    <div class="moreimage">
                                     <div class="form-group addmultiimage">
                                         <div class="row">
                                             <div class="co l-md-2 ml-1">
                                                 <input type="file"  class="form-control" data-buttonname="btn-primary" name="multiimage[]" class="form-control" accept="image/png, image/gif, image/jpeg" onchange="url(this);" >
                                                 <img src="{{url('/')}}/resources/assets/admin/images/product/{{$products->upc}}/{{$image->name}}?{{rand()}}" class="img-thumbnail" width="100" id="multiImage" alt="">
                                                 <input type="hidden" name="Image_id[]" value="{{$image->id}}">
                                                 @error('multiimage[]')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong class="text-danger">{{ $message }}</strong>
                                                 </span>
                                                 @enderror
                                             </div>
                                             <div class="col-md-2 ml-1">
                                             <input type="text"  class="form-control" value="{{$image->sort}}" name="sort[]" placeholder="Sort Number" maxlength="2" onkeypress="if(this.value.length==2);">
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
                                                 <button type="button" id="{{$image->id}}" class="form-control remove_image  btn btn-danger">
                                                    
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
                                    @endforeach
                                    
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4 text-md-right" >
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
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

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  
<script> 
$(document).on("click",".edit_save",function(){
    $('#access_url_spantag').val($('.access_url_spantag').text()).show();
    // addClass('form-control');
    $('.save').show();
    $('.access_url_spantag').hide();
    $('.edit_save').hide();

    
});

$(document).on("input ","#name",function(){
    var curvalue=$(this).val();
    var access_url=curvalue.trim().replace(/[^a-z0-9\s]/gi,'').replace(/ +/g,'-');
    $(document).find(".access_url_spantag").text(access_url.toLowerCase());
    $('.access_url_spantag').val($('#access_url_spantag').text());
    
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
});
function url(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function (e) {
                $('#images')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(100);
            };
        reader.readAsDataURL(input.files[0]);
        }
    }  
    
$(function(){
    jQuery.validator.addMethod("currency", function (value, element) {
      return this.optional(element)
        || /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(value);
    }, "Please Enter valid amount");

$(function(){
    $('.moreimage').on('click','.add',function(){
        $(this).closest('.addmultiimage').clone().find("input").val("").end().insertAfter($(this).closest('.addmultiimage'));
        if ($(".addmultiimage").length != 1)
        {
            $('.remove_image').show();
        }

    });
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

// $('.remove_image').click( function() {
//         $.ajax({
//                 type: "GET",
//                 dataType: "json",
//                 url: "{{url('admin/product/ImageDelete')}}",
//                 data: {id:$(this).attr('id')},
//                 success: function(data){
//                   console.log(data.success);    
//                 }
//             });
//     });

    $('#editproduct').validate({
        rules:{
            name:{
                required:true,
                maxlength:50,
            },
        
            description:{
                required:true,
                maxlength:100,
            },
            price:{
                required:true,
                maxlength:8,
                currency:true,
                
            },
            stock:{
                required:true,
                maxlength:5,
                digits:true,
            },
            image:{
                accept:'png,jpg,jpeg,gif',
            },
            
        },
        messages:{
            name:{
                required:"Please Enter Product Name",
                maxlength: "maxLength should be 50",
            },
        description:{
            required:"Please Enter description",
            maxlength: "Maxlength should be 100",
             },
        price:{
                required:"Please Enter Price",
                maxlength:"The price may not be greater than 999999",
        },
        stock:{
                required:"Please Enter Stock",
                maxlength:"The stock may not be greater than 99999",
                digits: "Please enter Valid Stock",
        },
        image:{
               accept:'File Must Have png,jpg,jpeg'
           },
    },
        submitHandler:function(form){
            form.submit();
        }

    });
});

</script>
@endsection