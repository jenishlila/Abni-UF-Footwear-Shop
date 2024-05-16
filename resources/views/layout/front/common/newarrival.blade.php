<div class="modal" id="myModal" style="margin-top:250px">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">product add to cart successfully</h4>
            <button type="button" class="btn btn-danger btn-center" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div> 
 </div>

<div class="std" style="margin-bottom: 50px">
    <div class="block-custom block-custom1">
        <div class="block-title">
            <h2><span class="title-top">New Arrival</span></h2>
        </div>
        <div class="featured-product-tab">
            <div class="magicproduct">
                <div class="block-title-tabs">
                    <ul class="magictabs">
                        <li class="item active" data-type ="mc-featured"><span class ="title">Latest</span></li>
                        {{-- <li class="item" data-type ="mc-bestseller"><span class ="title">Top Rated</span></li>
                        <li class="item" data-type ="mc-latest"><span class ="title">Latest</span></li> --}}
                    </ul>
                </div>
                <div class="content-products">
                    <div class="mage-magictabs mc-featured active">
                        <div class="flexisel-content products-grid featured zoomOut play">
                            <ul class="products-grid-rows addtocart">
                            @foreach ($products as $product)    

                                {{-- <li class="item item-animate">
                                    <div class="per-product">
                                        <div class="images-container">
                                            <div class="product-hover"> 
                                                <a href="#" title="Clemence Blouse" class="product-image">
                                                    <img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Clemence Blouse" /> 
                                                </a>
                                            </div>
                                            <div class="actions-no hover-box">
                                                <div class="actions"> 
                                                    <button type="button" title="Add to Cart" class="button btn-cart pull-left"><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button>
                                                    <ul class="add-to-links pull-left">
                                                        <li class="pull-left">
                                                            <a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
                                                        </li>
                                                        <li class="pull-left">
                                                            <span class="separator">|</span>
                                                            <a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
                                                        </li>
                                                        <li class="link-view pull-left"> 
                                                            <a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-textlink clearfix">
                                            <h2 class="product-name">
                                                <a href="#">Clemence Blouse</a>
                                            </h2>
                                            <div class="price-box"> 
                                                <p class="regular-price" >
                                                    <span class="price">$229.00</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                                <li class="item item-animate">
                                    <div class="per-product">
                                        <div class="images-container">
                                            <div class="product-hover"> 
                                                <span class="sticker top-right">
                                                    <span class="labelnew">New</span>
                                                </span>
                                                <a href="{{url('/',$product->access_url)}}" title="Short Sleeve Dress" class="product-image"> 
                                                    <img class="img-responsive" src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" width="278" height="355" alt="Short Sleeve Dress" /> 
                                                </a>
                                            </div>
                                            <div class="actions-no hover-box">
                                                <div class="actions"> 
                                                    <button type="button" title="Add to Cart" class="button btn-cart pull-left" id="{{$product->id}}" data-toggle="modal" data-target="#myModal">
                                                   {{-- <p class="action"><button type="button"  title="Add to Cart" id="{{$product->id}}" class="button btn-cart pull-left" data-toggle="modal" data-target="#myModal" ><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button></p> --}}

                                                        <span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
                                                    </button>
                                                    <ul class="add-to-links pull-left">
                                                        {{-- <li class="pull-left">
                                                            <a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
                                                        </li>
                                                        <li class="pull-left">
                                                            <span class="separator">|</span> 
                                                            <a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
                                                        </li> --}}
                                                        <li class="link-view pull-left"> 
                                                            <a title="Quick View" href="{{url('/',$product->access_url)}}" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-textlink clearfix">
                                            <h2 class="product-name">
                       
                                                {{-- <h2 class="product-name"><a href="{{url('/',$product->access_url)}}" title="{{$product->name}}">{{$product->name}}</a></h2> --}}

                                            <a href="{{url('/',$product->access_url)}}" title="{{$product->name}}">{{$product->name}}</a>
                                            </h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span> 
                                                    <span class="price"> Rs.{{$product->price}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- .mc-featured -->
                </div><!-- .content-products -->
            </div>
        </div>
    </div>
    
</div>



@section('script')
<script>
$(function() {
    $('.addtocart').on('click','.btn-cart',function() {
        // jQuery('.popup').show();
         jQuery.ajax({
                type: "GET",
                url: "{{url('product/addtocart')}}",
                data: {
                        id:$(this).attr('id')
                       },
               
            });
        });
  });
</script>
@endsection