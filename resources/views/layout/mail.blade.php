@section('title','Forget Password');
<!DOCTYPE html>
<html>
    <head>
        @include('layout.admin.common.head');
    </head>
    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                   <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="{{url('resources/assets/admin/images/logo_dark.png')}}" alt="" height="30"></span>
                                            </a>
                                        </h2>
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Reset Password</h5>
                                      
                                    </div>
                                    <div class="account-content">
                                    <form class="form-horizontal" id="update" method="POST" action="{{route('password.update')}}">
                                        @csrf
                                        <input type="hidden" name="token" value={{$token}}>   

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="emailaddress">Email</label>
                                                    <input class="form-control" name="email" type="email" id="emailaddress" placeholder="john@deo.com">
                                                </div>
                                            </div>
                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="Passsword">Password</label>
                                                    <input class="form-control" name="password" type="password" id="password"  placeholder="******">
                                                </div>
                                            </div>
                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="confirm_Password">Confirm Password</label>
                                                    <input class="form-control" name="confirm_Password" type="password" id="confirm_Password"  placeholder="******">
                                                </div>
                                            </div>


                                            
                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Confirm</button>
                                                </div>
                                            </div>

                                        </form>

                                      

                                        

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



        {{-- <script>
            var resizefunc = [];
        </script> --}}
 @include('layout/front/common/scripts')
 <script>
 var resizefunc = [];
            
 $(document).ready(function()
 {
     $('#update').validate({
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