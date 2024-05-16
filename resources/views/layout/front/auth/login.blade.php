    {{-- @extends('layout.front.app'); --}}
{{-- <!DOCTYPE html>
<html>
    <head>
        @section('title','Login')
        @include('layout.admin.common.head');
    </head> --}}
@extends('layout/front/app')
@section('title','Login')
@section('content')
    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container" style="padding-top:30px; padding-bottom:30px;">
                <div class="row">
                    <div class="col-md-8">
                        

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        {{-- <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="{{url('resources/assets/front/images/logo_dark.png')}}" alt="" height="30"></span>
                                            </a>
                                        </h2> --}}
                                        <p class="m-b-0">Login</p><br>
                                    </div>
                                    <div class="account-content">
                                        @if( Session::get('danger'))
                                        <div class="alert alert-danger">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>{{ session('danger')}}</strong>
                                        </div>
                                        @endif
                                    <form class="form-horizontal" method="POST" action="{{url('login')}}" id="login">
                                        @csrf

                                            <div class="form-group row">
                                                
                                                    <label class="col-md-4 col-form-label text-md-right" for="emailaddress">Email address</label>
                                                    <div class="col-md-6">
                                                    <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                  @enderror
                                                 
                                                
                                            </div>

                                            <div class="form-group row">
                                                
                                                <label class="col-md-4" for="password">Password</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" name="password" type="password" placeholder="Enter your password">
                                                    <a  href="{{url('/forgot')}}" class="text-muted"><small style="margin-left: 195px;">Forgot your password?</small></a>
                                                    </div>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                               
                                                
                                            </div>
{{-- 
                                            <div class="form-group row m-b-20">
                                                <div class="col-12">

                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" checked="">
                                                        <label for="remember">
                                                            Remember me
                                                        </label>
                                                    </div>

                                                </div>
                                            </div> --}}

                                            <div class="form-group row text-center" style="float: left">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-primary waves-effect waves-light text-center" type="submit" style="padding: 6px 28px;">Sign In</button>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="menu" style="margin-left:140px;">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="text-center">
                                                        <button type="button" class="btn m-r-5 btn-facebook waves-effect waves-light">
                                                            <i class="fa fa-facebook"></i>
                                                        </button>
                                                        <button type="button" class="btn m-r-5 btn-googleplus waves-effect waves-light">
                                                            <i class="fa fa-google"></i>
                                                        </button>
                                                        <button type="button" class="btn m-r-5 btn-twitter waves-effect waves-light">
                                                            <i class="fa fa-twitter"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row m-t-50">
                                                <div class="col-sm-12 text-center">
                                                    <p class="text-muted">Don't have an account? <a href="{{ url('register') }}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->
          @endsection


 @include('layout/front/common/scripts')
<script>
var resizefunc = [];
           
$(document).ready(function()
{
    $('#login').validate({
      rules:
      {
             email: {
                required: true,
                maxlength: 50,
                email: true,
            },
        password:{
            required:true,
        },
      },
        messages: {
           
             password:"Please Enter Password",
             
             email: {
                required: "Please enter valid email",
                email: "Please enter valid email",
                maxlength: "The email name should less than or equal to 50 characters",
        },
            },     
       submitHandler: function(form) {
           form.submit();
       }
 });

});
</script>

</body>
</html>