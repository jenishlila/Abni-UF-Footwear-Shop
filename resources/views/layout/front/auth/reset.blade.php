@extends('layout/front/app')
@section('title','Reset')
@section('content')
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <div class="col-md-8">
                        <div class="wrapper-page">
                            <h3>RESET PASSWORD</h3>

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="text-center account-logo-box">
                                        <h2 class="text-uppercase">
                                            <a href="index.html" class="text-success">
                                                {{-- <span><img src="assets/images/logo_dark.png" alt="" height="30"></span> --}}
                                            </a>
                                        </h2>
                                        <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                    </div>
                                    <div class="account-content">
                                        <div class="text-center col-md-8">
                                            
                                            @if( Session::get('status'))
                                            <div class="alert alert-success">
                                                <button class="close" data-dismiss="alert"></button>
                                                <strong>{{ session('status')}}</strong>
                                            </div>
                                            @endif
                                              
                                            @if( Session::get('success'))
                                            <div class="alert alert-success">
                                                <button class="close" data-dismiss="alert"></button>
                                                <strong>{{ session('success')}}</strong>
                                            </div>
                                            @endif

                                            {{-- <p class="text-muted col-md-4">reset password </p> --}}

                                        </div>
                                    <form class="form-horizontal" method="POST" action="{{ route('password.email')}}" id="reset">
                                            @csrf
                                            {{-- <h3>Reset</h3> --}}
                                            <div class="form-group" style="margin-top: 20px">
                                                <div class="col-md-8">
                                                    <label for="emailaddress">Email address :</label>
                                                    <input class="form-control" name="email" type="email"  placeholder="john@gmail.com">
                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-md-3">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Reset Password</button>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="clearfix"></div>

                                        <div class="row col-md-8">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Back to <a href="page-login.html" class="text-dark m-l-5"><b>Sign In</b></a></p>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- end card-box-->
                            </div>


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
    $(".alert").delay(2000).fadeOut(2000);

    $('#reset').validate({
        rules:
        {
    
       email:{
            required:true,
            email:true
        },
        
        },
        messages: {
        
           email:"Please Enter Email Address",
            
        },  
        submitHandler: function(form) {
            form.submit();
        }
    });

});
</script>
       
       

    </body>
</html>