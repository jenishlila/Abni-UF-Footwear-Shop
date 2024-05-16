@extends('layout/admin/app')
@section('title','Category Detail')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">Category Detail</h4>
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
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/category/add')}}" ><i class="fa fa-plus m-r-5"></i> Add </a>
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-danger m-b-20" href="{{ url('admin/category/trash') }}" ><i class="fa fa-trash-o"></i> Trash</a>
                                {{-- <button type="button" class="btn btn-sm btn-primary  w-md waves-effect waves-light pull-right">Add Color</button> --}}
                            </div>
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                       
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category as $category)
                                        <tr>
                                           
                                            <td>{{ $category->name}}</td>
                                            {{-- <td><input class="selectpicker" id="#" name="status"  type="checkbox" data-plugin="switchery" data-color="#039cfd"  data-size="small" checked/></td> --}}
                                            {{-- <td><input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/></td> --}}
                                            <td>
                                            @if($category->status=='Y') 
                                                <input class="ChangeStatus" id="{{$category->id}}" name="status"  type="checkbox" data-plugin="switchery" data-color="#039cfd"  data-size="small" checked/>
                                           @else
                                                <input class="ChangeStatus" id="{{$category->id}}" name="status"  type="checkbox" data-plugin="switchery" data-color="#039cfd" data-size="small" /> 
                                            @endif

                                            </td>
                                            {{-- <td><input type="checkbox"></td> --}}
                                            <td class="actions">
                                                {{-- {{url('admin/color/edit',$colo->id)}} --}}
                                                <a href="{{url('admin/category/edit',$category->id)}}" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                            <a href="{{url('admin/category/delete',$category->id)}}" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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

 @section('scripts')
         <script type="text/javascript">
            $(document).ready(function() {
                $('.alert').delay(2000).fadeOut(2000);
                $('#datatable').DataTable({
                    'columnDefs':[{
                        'targets':[1,2],
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
                url: "{{url('admin/category/changeCategoryStatus')}}",
                data: {'status': status,'id':$(this).attr('id')},
                success: function(data){
                  console.log(data.success);    
                }
            });
    });
  });
</script>
@endsection       