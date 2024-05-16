@extends('layout/front/app')
@section('title','Show Product')
@section('content')
<div class="container">
    <div class="main sort">
        <div class="row addtocart">
            
            <div class="col-left sidebar col-lg-3 col-md-3 left-color color">
                    <div class="anav-container">
                        <div class="block block-anav">
                        <div class="block-title"> <strong><span>Brand</span></strong></div>
                            {{-- <ul style="" class="nav-accordion">
                                <li class="level0 nav-1 first active level-top parent">
                                    <a href="#" class="level-top"><span>Brand List</span></a> --}}
                                    {{-- <ul style="display: block;" class="level0">
                                        <li class="level1 nav-1-1 first last parent"> --}}
                                            {{-- <a href="#"><span>Brand List</span></a> --}}
                                        <ul class="level1">
                                            @foreach($categories as $category)
                                                <li class="level2 nav-1-1-1 first">
                                                <label><input type="checkbox" name="brand" value="{{$category->id}}" class="brand"><span> {{$category->name}}</span></label>
                                            @endforeach
                                                </li>
                                        </ul>
                                        {{-- </li>
                                    </ul> --}}
                                {{-- </li>
                            </ul> --}}
                        </div><!--- .block-anav-->
                        <div class="block block-anav">
                            <div class="block-title"> <strong><span>Color</span></strong></div>
                            {{-- <ul style="" class="nav-accordion">
                                <li class="level0 nav-1 first active level-top parent">
                                    <a href="#" class="level-top"><span>Color List</span></a> --}}
                                    {{-- <ul style="display: block;" class="level0">
                                        <li class="level1 nav-1-1 first last parent">
                                            <a href="#"><span>Color List</span></a> --}}
                                            <ul class="level1">
                                                @foreach($colors as $color)
                                                    <li class="level2 nav-1-1-1 first">
                                                    <label><input type="checkbox" name="color" value="{{$color->id}}" class="color"><span> {{$color->name}}</span></label>
                                               @endforeach
                                                    </li>
                    
                                            </ul>
                                        {{-- </li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </div><!--- .block-anav-->

                        <div class="block block-anav">
                            <div class="block-title"> <strong><span>Size</span></strong></div>
                                <ul class="level1">
                                    @foreach($size as $size)
                                        <li class="level2 nav-1-1-1 first">
                                        <label><input type="checkbox" name="size" value="{{$size->id}}" class="size"><span> {{$size->size}}</span></label>
                                    @endforeach
                                        </li>
        
                                </ul>
                        </div><!--- .block-anav-->

                    </div><!--- .anav-container-->
                <div class="block block-layered-nav block-layered-nav--no-filters">
                    <div class="block-title"> <strong><span>Shop By</span></strong></div>
                    <div class="block-content toggle-content">
                        <p class="block-subtitle block-subtitle--filter">Filter</p>
                        <dl id="narrow-by-list">
                            <dt class="even">By Price</dt>
                            <dd class="even price">
                                <div class="slider-ui-wrap">
                                    <div id="price-range" class="slider-ui" slider-min="0" slider-max="20000" slider-min-start="0" slider-max-start="20000"></div>
                                </div>
                                <form action="#" class="price-range-form">
                                    <input type="text" class="range_value range_value_min" target="#price-range" /> - <input type="text" class="range_value range_value_max" target="#price-range" />
                                    <input type="button" class="btn-submit" value="OK" />
                                </form> 
                            </dd>
                            {{-- <dt class="odd">By Brands</dt>
                            <dd class="odd">
                                @foreach($categories as $category)
                                <ul style="" class="nav-accordion">
                                <li class="level0 level-top"><a href="#" class="level-top"><span>{{$category->name}}</span></a></li>
                                 </ul>
                                @endforeach
                            </dd>
                            <dt class="even">By Colors</dt>
                            <dd class="even">
                                @foreach($colors as $color)
                                <ol class="configurable-swatch-list">
                                <li> <a href="#" class="swatch-link has-image"> <span class="swatch-label"> <img src="assets/images/black.png" alt="Black" title="Black" height="15" width="15"> </span> <span class="count">{{$color->name}}</span> </a></li>
                                   
                                </ol>
                                @endforeach
                            </dd> --}}
                           
                        </dl>
                    </div>
                </div><!--- .block-layered-nav-->
            </div><!--- .sidebar-->
            <div class="col-main col-lg-9 col-md-9 content-color color">
                <div class="page-title category-title">
                    {{-- <h1>Men</h1> --}}
                </div>
                <p class="category-image"><img src="http://placehold.it/875x360" alt="Men" title="Men"></p>
                <div class="category-products">
                    <div class="toolbar">
                        <div class="sorter">
                            <p class="view-mode"> <label>View as:</label> 
                                <a title="Grid" id="grid" class="redirectjs grid_list "> <i class="icon-grid icons"></i> </a> 
                                <a title="List" id="list" class="list grid_list active"> <i class="icon-list icons"></i> </a></p>
                            {{-- <div class="sort-by">
                                <label>Sort By</label> 
                                <select>
                                    <option value="position" selected="selected"> Position</option>
                                    <option value="name"> Name</option>
                                    <option value="price"> Price</option>
                                </select>
                                <a href="#" title="Set Descending Direction"><img src="assets/images/i_asc_arrow.gif" alt="Set Descending Direction" class="v-middle"></a>
                            </div> --}}
                            {{-- <div class="limiter">
                                <label>Show</label> 
                                <select>
                                    <option value="9" selected="selected"> 9</option>
                                    <option value="12"> 12</option>
                                    <option value="15"> 15</option>
                                </select>
                            </div> --}}
                            {{-- <div class="pager">
                                <div class="pages">
                                    <strong>Page:</strong>
                                    <ol>
                                        <li class="current">1</li>
                                        <li><a href="#">2</a></li>
                                        <li class="bor-none"> <a class="next i-next" href="#" title="Next"> <i class="fa fa-angle-right">&nbsp;</i> </a></li>
                                    </ol>
                                </div>
                            </div> --}}
                        </div>
                    </div><!--- .toolbar-->
                    
                    {{-- master class --}}
                    <div class="show">
                        
                    </div>
                    
                    {{-- <div class="page-nav-bottom">
                        <div class="left">Items 13 to 24 of 38 total</div>
                        <div class="right">
                            <ul class="page-nav-category">
                                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a class="selected" href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div><!--- .page-nav-bottom--> --}}
                </div><!--- .category-products-->
            </div><!--- .col-main-->
        </div><!--- .row-->
    </div><!--- .main-->
</div><!--- .container-->
@endsection

@section('script')
<script>


jQuery(document).ready(function(){
    jQuery(".price").keypress(function(e){
     var keyCode = e.which;
    /*
      8 - (backspace)
      48-57 - (0-9)Numbers
    */
 
    if ( (keyCode != 8) && (keyCode < 48 || keyCode > 57)) { 
      return false;
    }
  });

jQuery(function() {
    jQuery('.addtocart').on('click','.btn-cart',function() {
        // jQuery('.popup').show();
         jQuery.ajax({
                type: "GET",
                url: "{{url('product/addtocart')}}",
                data: {
                        id:jQuery(this).attr('id')
                       },
               
            });
        });
  });
    
    jQuery.ajax({
            type:"get",
            url:"{{url('product/sort')}}",
            dataType:"HTML",
            data:{

             },
             success:function(response){
                 jQuery('.show').html(response);
                 
             }
        });

jQuery('.view-mode').on('click','a',function(){
    if(jQuery(this).attr('id')=='grid')
    {
        jQuery(this).addClass('active');
        jQuery('#list').removeClass('active');
    }
    else
    {
        jQuery(this).addClass('active');
        jQuery('#grid').removeClass('active');
    }
});

    jQuery('.sort').on('click',"input[type='checkbox'],input[type='button'],.grid_list",function(){
        var brand = [];
        jQuery("input[name='brand']:checked").each(function(){
            brand.push(jQuery(this).val());
        });

        var color = [];
        jQuery("input[name='color']:checked").each(function(){
            color.push(jQuery(this).val());
        });

        var size = [];
        jQuery("input[name='size']:checked").each(function(){
            size.push(jQuery(this).val());
        });

        jQuery.ajax({
            type:"get",
            url:"{{url('product/sort')}}",
            dataType:"HTML",
            data:{
                brand:brand,
                color:color,
                size:size,
                grid_list:jQuery('#grid').hasClass('active'),
                max_price:jQuery(".range_value_max").val(),
                min_price:jQuery(".range_value_min").val()                

            },
             success:function(response){
                 jQuery('.show').html(response);
                 
             }
        });

    });
    });
</script>
@endsection