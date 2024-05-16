<div class="grid">
    <div class="modal" id="myModal" style="margin-top:250px">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">product add to cart successfully</h4>
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div> 
     </div>
<ul class="products-grid row products-grid--max-3-col last odd">
@foreach ($products as $product)
    <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item">
        <div class="category-products-grid">
            <div class="images-container">
                <div class="product-hover"> 
                    <span class="sticker top-left"><span class="labelnew">New</span></span> 
                    <a href="#" title="Configurable Product" class="product-image"> 
                        <img id="product-collection-image-8" class="img-responsive" src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" alt="" height="355" width="278" style="height: 250px; width: 278px; margin-top: 10px"> 
                        <span class="product-img-back"> <img class="img-responsive" src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" alt="" height="355" width="278" style="height: 250px; width: 278px; margin-top: 10px"> </span> 
                    </a>
                </div>
                <div class="actions-no hover-box">
                    <div class="actions">
                        <button type="button" title="Add to Cart" class="button btn-cart " id="{{$product->id}}" data-toggle="modal" data-target="#myModal"><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button>
                        {{-- <ul class="add-to-links pull-left">
                            <li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
                            <li class="pull-left"><a href="#" title="Add to Compare" class="link-compare"><i class="icon-bar-chart icons"></i>Add to Compare</a></li>
                            <li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="product-info products-textlink clearfix">
                <h2 class="product-name"><a href="{{url('/',$product->access_url)}}" title="{{$product->name}}">{{$product->name}}</a></h2>
                <ul class="configurable-swatch-list configurable-swatch-color clearfix">
                    {{-- <li class="option-blue is-media"> <a href="javascript:void(0)" name="blue" class="swatch-link swatch-link-92 has-image" title="blue"> <span class="swatch-label"> <img src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" alt="blue" height="15" width="15"> </span> </a></li>
                    <li class="option-red is-media"> <a href="javascript:void(0)" name="red" class="swatch-link swatch-link-92 has-image" title="red"> <span class="swatch-label"> <img src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" alt="red" height="15" width="15"> </span> </a></li> --}}
                </ul>
                <div class="price-box"> <span class="regular-price"> <span class="price">Rs.{{$product->price}}</span> </span></div>
                {{-- <div class="ratings">
                    <div class="rating-box">
                        <div class="rating" style="width:80%"></div>
                    </div>
                    <span class="amount"><a href="#">1 Review(s)</a></span>
                </div> --}}
            </div>
        </div>
    </li>
@endforeach
</div>
</ul><!--- .products-grid-->
{{-- @section('script')
<script>
    jQuery(function() {
    jQuery('.addtocart').on('click','.btn-cart',function() {
         jQuery.ajax({
                type: "GET",
                url: "{{url('product/addtocart')}}",
                data: {
                        id:jQuery(this).attr('id'),
                        qty:jQuery("#qty").val(),
                       },
               
            });
        });
  });


</script>
    
@endsection --}}

    