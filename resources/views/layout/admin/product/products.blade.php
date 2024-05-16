@extends('layout/admin/app')
@section('title','Product Detail')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                    <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">Product Detail</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    
                    <div class="row">
                       
                        <div class="col-12">
                           <div class="card-box table-responsive">
                                @include('layout/admin/common/message')
                                <div class="form-group text-right">
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/product/add')}}" ><i class="fa fa-plus m-r-5"></i> Add </a>
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-danger m-b-20" href="{{ url('admin/product/trash') }}" ><i class="fa fa-trash-o"></i> Trash</a>
                                {{-- <button type="button" class="btn btn-sm btn-primary  w-md waves-effect waves-light pull-right">Add Color</button> --}}
                            </div>
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>UPC</th>
                                        <th>Detail</th>
                                          <th>Price</th>
                                        <th>Stock</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td><img src="{{url('/')}}/resources/assets/admin/images/product/{{$product->upc}}/main.png?{{rand()}}" class="img-thumbnail" width="60px" id="multiImage" alt="">
                                            </td>
                                            <td>{{$product->upc}}</td>
                                           
                                            <td><b>ColorName:</b>{{$product->colorname}}<br>
                                                   <b>BrandName:</b> {{$product->brandname}}<br>
                                                    <b>Size:</b>{{$product->prosize}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->stock}}</td>
                                            <td>{{$product->created_at}}</td>

                                            {{-- <td><input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/></td> --}}
                                            <td>
                                            @if($product->status=='Y') 
                                                <input class="ChangeStatus" id="{{$product->id}}" name="status"  type="checkbox" data-plugin="switchery" data-color="#039cfd"  data-size="small" checked/>
                                           @else
                                                <input class="ChangeStatus" id="{{$product->id}}" name="status"  type="checkbox" data-plugin="switchery" data-color="#039cfd" data-size="small" /> 
                                            @endif

                                            </td>
                                            {{-- <td><input type="checkbox"></td> --}}
                                            <td class="actions">
                                                <a href="{{url('admin/product/edit',$product->id)}}" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                            <a href="{{url('admin/product/delete',$product->id)}}" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;
                                            <a href="{{url('/',$product->access_url)}}" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail"><i class="fa fa-eye"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- container -->
            </div> <!-- content -->
        {{-- </div> --}}
@endsection
    <!-- END wrapper -->
{{-- @include('layout/admin/common/scripts'); --}}
 @section('scripts')
         <script type="text/javascript">
            $(document).ready(function() {
                $(".alert").delay(2000).fadeOut(3000);
                $('#datatable').DataTable({
                    'columnDefs':[{
                        'targets':[1,7,8],
                        'orderable':false,
                    }]
                });

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });


                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );


    jQuery(function() {
        jQuery('#datatable').on('change','.ChangeStatus',function() {
            var status = $(this).prop('checked') == true ? 'Y' : 'N'; 
        $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{url('admin/product/changestatus')}}",
                data: {
                        'status': status,
                        'id':$(this).attr('id')
                    },
               
                success: function(data)
                {
                    console.log(data.success);    
                }
            });
    });
  });
</script>
@endsection       