<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<title> @yield('title')</title>
    @include('layout/front/common/head')
    
    {{-- <script>
        style{
        .d-none{
            display:none;
        }

        }
    </script> --}}
</head>
<body>
	<div class="wrapper">
			@include('layout/front/common/header')
			
			@section('content')
			@show
			@include('layout/front/common/footer')
		</div><!--- .wrapper -->
	
	@include('layout/front/common/scripts')

	</body>
<script>
// jQuery('#cart').trigger('hover');
jQuery(function() {
    jQuery('#cart').mouseover(function() {
    
         jQuery.ajax({
                type: "GET",
                url: "{{url('product/showcartdetail')}}",
                data: {
                       
                       },
                success: function(res){
                    jQuery('.showminicart').html(res);
                }
            });
        });
  });
</script>
</html>