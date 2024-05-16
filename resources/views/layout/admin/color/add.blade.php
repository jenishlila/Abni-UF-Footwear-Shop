@extends('layout/admin/app')
@section('title','Add Color')
 @section('content')
    <div class="topbar-left">
         <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Add Color</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                       
                        <div class="row">
                     <div class="col-sm-12">
                            <div class="card-box text-left">
                                <div class="form-group text-right">
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/color')}}" ><i class="fa fa-angle-left"></i> Back</a>
                            </div>
                                    <div class="row">
                                        <form action="{{url('admin/color')}}" method="post" name="add">
                                        <style type="text/css">.error{color: red!important;}</style>

                                            @csrf   
                                             <div class="form-group row">
                                                <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color Name:') }}</label>
                        
                                                <div class="col-md-8">
                                                    <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="name" value="{{ old('color') }}" >
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Add Color') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div> <!-- end Panel -->
                </div> <!-- container -->
            </div> <!-- content -->
        </div>
@endsection
{{-- @include('layout/admin/common/footer') --}}

@section('scripts')
<script>       
$(function(){
    $("form[name='add']").validate({

        rules:{
            name:{
                required:true,
            
            remote:{
                url:"{{url("admin/color/AdduniqueColor")}}",
                type:"GET",
                data:{
                    colorName:function(){
                        return $("#name").val();
                    }
                },
            }
            }
        },
        messages:{
            name:{
                required:"Please Enter Color Name",
                remote:"Color Is Already taken"
            }
        },
        submitHandler:function(form){
            form.submit();
        }

    });
});
</script>
@endsection