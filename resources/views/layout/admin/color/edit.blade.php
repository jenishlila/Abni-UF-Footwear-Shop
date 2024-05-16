@extends('layout/admin/app')
@section('title','Edit Color')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Edit Color</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="form-group text-right">
                <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/color')}}" ><i class="fa fa-angle-left"></i> Back</a>
            </div>
                <div class="row">
                <form action="{{url('admin/color/update')}}" method="post" name="edit">
                        @csrf   
                <input type="hidden" name="id" value="{{$color->id}}">
                            <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Edit Color') }}</label>
    
                            <div class="col-md-8">
                            <input type="hidden" name="id" id="colorid" value="{{$color->id}}">
                            <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="name" value="{{$color->name}}" >
                                {{-- {{ $color->name}} --}}
    
                                @error('name')
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
            name:{
                required:true,
            
            remote:{
                url:"{{url("admin/color/AdduniqueColor")}}",
                type:"GET",
                data:{
                       id:$("#colorid").val(),
                        name:$("#name").val()
                    },
                }
            }
        },
        messages:{
            name:{
                required:"Please Enter Color Name",
                remote:"Name Already taken"
            }
        },
        submitHandler:function(form){
            form.submit();
        }

    });
});
</script>
@endsection
 
