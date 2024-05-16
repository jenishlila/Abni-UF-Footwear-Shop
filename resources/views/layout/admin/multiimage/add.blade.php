@extends('layout/admin/app')
@section('title','Add Multiple Image')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">File Uploads</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <form class="form-horizontal" role="form" action="{{url('admin/multiimage/store')}}" method="post" name="add" enctype="multipart/form-data" id="addmultiimage">
                @csrf 
                {{-- <input type="hidden" name="upc" value="{{$products->upc}}"> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        @include('layout/admin/common/message')
                        <div class="p-20 p-b-0">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Product UPC</label>
                                        <div class="col-10">
                                            <select name="upc" class="form-control">
                                                <option value='none' hidden disabled selected>Select upc</option>
                                                @foreach ($products as $product)
                                                <option value="{{$product->upc}}">{{$product->upc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-12 padding-left-0 padding-right-0">
                                    <input type="file" name="image[]" id="filer_input1"
                                           multiple="multiple">
                                           <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
@endsection
