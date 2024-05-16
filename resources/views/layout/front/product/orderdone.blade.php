@extends('layout/front/app')
@section('title','Order')
@section('content')
   {{-- <h3> <center>Order Placed succesfully</center></h3> --}}
   <div class="cartempty" style="margin-top: 50px"> 
    <div class="wish-list-notice"><center><i class="icon-check"></i>Order Placed Successfully...!! <a href="{{url('products')}}">Click here</a> to continue shopping.</center></div>
</div>
@endsection