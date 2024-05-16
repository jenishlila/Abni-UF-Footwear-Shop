<div class="list">
    <ol class="products-list" id="products-list">
    @foreach ($products as $product)
    <li class="item odd">
        <div class="row">
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
         <div class="col-mobile-12 col-xs-5 col-md-4 col-sm-4 col-lg-4">
            <div class="products-list-container">
                <div class="images-container">
                    <div class="product-hover">
                        <span class="sticker top-left"><span class="labelnew">New</span></span> 
                        <a href="#" title="" class="product-image">
                        <img id="product-collection-image-8" class="img-responsive" src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" width="278" height="355" alt="" style="height: 250px; width: 278px; margin-top: 10px"> 
                        </a>
                        <div class="product-hover-box">
                            <a class="detail_links" href="#"></a>
                            <div class="link-view"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="product-shop col-mobile-12 col-xs-7 col-md-8 col-sm-8 col-lg-8">
                <div class="f-fix">
                    <div class="product-primary products-textlink clearfix">
                        <h2 class="product-name"><a href="{{url('/',$product->access_url)}}" title="{{$product->name}}">{{$product->name}}</a></h2>
                        <div class="price-box"> <span class="regular-price"> <span class="price">Rs.{{$product->price}}</span> </span></div>
                    </div>
                    <div class="desc std">
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="product-secondary actions-no actions-list clearfix">
                        <p class="action"><button type="button" title="Add to Cart" id="{{$product->id}}" class="button btn-cart pull-left" data-toggle="modal" data-target="#myModal" ><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button></p>
                        {{-- <ul class="add-to-links">
                            <li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
                            <li class="pull-left"><a href="#" title="Add to Compare" class="link-compare"><i class="icon-bar-chart icons"></i>Add to Compare</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </li><!--- .item-->
    @endforeach   
</ol><!--- .products-list-->
</div>
