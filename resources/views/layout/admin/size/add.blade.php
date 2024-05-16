@extends('layout/admin/app')
@section('title','Add Size')
 @section('content')
    <div class="topbar-left">
         <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Add Size</h4>
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
                                    <form action="{{url('admin/size')}}" method="post" name="add">
                                        <style type="text/css">.error{color: red!important;}</style>

                                            @csrf   
                                             <div class="form-group row">
                                                <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size:') }}</label>
                        
                                                <div class="col-md-8">
                                                    <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" maxlength="2" name="size" value="{{ old('size') }}" >
                                                    @error('size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Add Size') }}
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
            size:{
                required:true,
                digits:true,
            
            remote:{
                url:"{{url("admin/size/AdduniqueSize")}}",
                type:"GET",
                data:{
                    colorName:function(){
                        return $("#size").val();
                    }
                },
            }
            }
        },
        messages:{
            size:{
                required:"Please Enter Size ",
                digits:"Please Enter Only Number",
                remote:"Size Is Already Added"
            }
        },
        submitHandler:function(form){
            form.submit();
        }

    });
});
</script>
@endsection