@extends('layout/admin/app')
@section('title','Users')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">Users Data</h4>
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
                            </div>
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Activation Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userdata as $userdata)
                                        <tr>
                                            <td>{{ $userdata->name}}</td>
                                            <td>{{ $userdata->email}}</td>
                                            <td>{{ $userdata->mobile}}</td>
                                            <td>{{ $userdata->created_at}}</td>
                                            <td>
                                                @if($userdata->status=='Y') 
                                                    <input class="ChangeStatus" id="{{$userdata->id}}" name="status"  type="checkbox" data-plugin="switchery" data-color="#039cfd"  data-size="small" checked/>
                                               @else
                                                    <input class="ChangeStatus" id="{{$userdata->id}}" name="status"  type="checkbox" data-plugin="switchery" data-color="#039cfd" data-size="small" /> 
                                                @endif
    
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
                        'targets':[],
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
            });


 jQuery(function() {
        jQuery('#datatable').on('change','.ChangeStatus',function() {
            var status = $(this).prop('checked') == true ? 'Y' : 'N'; 
             
             
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{url('admin/users/changestatususer')}}",
                data: {
                        'status': status,
                        'id':$(this).attr('id')
                    },
                success: function(data){
                  console.log(data.success);    
                }
            });
    });
  });
</script>
@endsection       