@extends('layout/front/app')
@section('title','Register')
@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div><br>

                <div class="card-body">
                    <form method="POST" action="{{ url('register') }}" id="register">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" name="name"  type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus>
                                {{-- <span class="text-danger">{{ $errors->first('name') }}</span> --}}

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender"  class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input id="male" type="radio"  name="gender" value="M" autocomplete="gender">Male
                                <input id="female" type="radio"  name="gender" value="F" autocomplete="gender">Female
                                <input id="other " type="radio"  name="gender" value="O"  autocomplete="gender">Other

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    
<script>

$(document).ready(function()
{
    $('#register').validate({
        rules:
      {
        name:{
            required:true
            },
        mobile:{
            required:true,
            digits:true,
            minlength:10,
            maxlength:13
        },
        email:{
            required:true,
            email:true,
            
            remote:{
                    url:"{{url("abani/Adduniqueemail")}}",
                    type:"GET",
                    data:{
                        email:function(){
                            return $("#email").val();
                    }
                },
            }
        },
        password:{
            required:true,
            minlength:8,
        },
        password_confirmation:{
            required:true,
            equalTo:'#password',
            
        },
      
      },
        messages: {
             name: "Please Enter Name",
             email:{
                required:"Please Enter Email Address",
                email:"Please Enter Valid Email",
                remote:"Email Is Already been taken",
             },

             password:
             {
                 required:"Please Enter Password",
                minlength: "Password Must Have 8 Charecter",

             },
             password_confirmation:
             {
                 required:"Please Enter confirm Password",
                 equalTo:"password does not match"
             },
        
         mobile:{ 
                required: "Please Enter Mobile number",
                minlength: "The contact number should be 10 digits",
                digits: "Please enter only numbers",
                maxlength: "maxLength should be 13",
                 },
            },     
       submitHandler: function(form) {
           form.submit();
       }
 });

});

</script>


@endsection