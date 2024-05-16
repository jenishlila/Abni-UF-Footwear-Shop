<p class="block-subtitle">Recently added item(s)</p>
        <ol id="cart-sidebar" class="mini-products-list clearfix">
            @foreach ($products as $key=>$product)
                <li class="item clearfix">
                    <div class="cart-content-top">
                        <a href="#" class="product-image"><img src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" width="60" height="77" alt="Brown Arrows Cushion"></a>
                        <div class="product-details">
                        <p class="product-name">{{$product->name}}</a></p>
                        <strong>{{$pro_qty[$key]}}</strong> x <span class="price">{{$product->price*$pro_qty[$key]}}</span>
                        </div>
                    </div>
                    <div class="cart-content-bottom">
                        <div class="clearfix"> <a href="#" title="Edit item" class="btn-edit"><i class="fa fa-pencil-square-o"></i></a>
                            
                            </div>
                    </div>
                </li>
            @endforeach
         @forelse ($products as $key=>$product)
        {{-- <li>{{ $user->name }}</li> --}}
        @empty
        <p>Cart Is Empty...!!
            {{-- <div class="wish-list-notice"><i class="icon-check"></i>Cart Is Empty...!! <a href="{{url('products')}}">Click here</a> to continue shopping.</div> --}}
        </p>
        @endforelse
            {{-- <div class="minicartempty" style="display:none"> 
                <h4>Cart Is Empty...!!</h4>
                <div class="wish-list-notice"><i class="icon-check"></i>Cart Is Empty...!! <a href="{{url('products')}}">Click here</a> to continue shopping.</div>
            </div> --}}
        </ol>
       
         