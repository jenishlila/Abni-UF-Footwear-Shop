@extends('layout/admin/app')
@section('title','Trash Record')
@section('content')
    <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">Trash Record</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <?php
                     $id=0;
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                @include('layout/admin/common/message')
                                <div class="form-group text-right">
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/color')}}" ><i class="fa fa-angle-left"></i> Back</a>
                                </div>
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Color Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trash as $trash)
                                        <tr>
                                            <td>{{++$id}}</td>
                                            <td>{{ $trash->name}}</td>
                            
                                            <td class="actions">
                                                <a type="submit" id="demo-btn-addrow" class="btn btn-primary" href="{{url('admin/color/restore',$trash->id)}}" >Restore</a>
                                                <a type="submit" id="demo-btn-addrow" class="btn btn-danger" href="{{url('admin/color/destroy',$trash->id)}}" >Delete</a>
                                                
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
 @section('scripts')
         <script type="text/javascript">
            $(document).ready(function() {
                $(".alert").delay(2000).fadeOut(3000);
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
</script>
@endsection       