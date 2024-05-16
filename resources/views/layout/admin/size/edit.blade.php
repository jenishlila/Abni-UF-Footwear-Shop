@extends('layout/admin/app')
@section('title','Edit Size')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Edit Size</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="form-group text-right">
                <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/size')}}" ><i class="fa fa-angle-left"></i> Back</a>
            </div>
                <div class="row">
                <form action="{{url('admin/size/update')}}" method="post" name="edit">
                    <style type="text/css">.error{color: red!important;}</style>

                        @csrf   
                <input type="hidden" name="id" value="{{$size->id}}">
                            <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Edit Size') }}</label>
    
                            <div class="col-md-8">
                            <input type="hidden" name="id" id="sizeid" value="{{$size->id}}">
                            <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{$size->size}}" >
                                {{-- {{ $color->name}} --}}
    
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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

@section('scripts')
<script>       
$(function(){
    $("form[name='edit']").validate({

        rules:{
            size:{
                required:true,
            
            remote:{
                url:"{{url("admin/size/AdduniqueSize")}}",
                type:"GET",
                data:{
                       id:$("#sizeid").val(),
                        // size:$("#size").val()
                    },
                }
            }
        },

        messages:{
            size:{
                required:"Please Enter Size",
                remote:"size Already taken"
            }
        },
        submitHandler:function(form){
            form.submit();
        }

    });
});
</script>
@endsection
 
