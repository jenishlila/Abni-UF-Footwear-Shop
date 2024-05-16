<!DOCTYPE html>
<html>

<head>
   
    @include('layout.admin.common.head')
</head>    
    <body>
        <div id="wrapper">
         <!-- Begin page -->
            @include('layout.admin.common.header')
            @include('layout/admin/common/sidebar')
            {{-- @yield('content') --}}
            @section('content')  
            @show

            @include('layout/admin/common/footer')
        </div>
        @include('layout/admin/common/scripts')

    </body>
</html>