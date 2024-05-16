@extends('layout/admin/app')
@section('title','Orders')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                    <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">Orders</h4>
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
                                        <th>User Name</th>
                                        <th>Total Items</th>
                                        <th>Total Price</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->qty}}</td>
                                            <td>{{$order->total}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->order_status == "OTW" ? "On The Way" : ($order->order_status == "P" ? "Pending": "Deliverd" )}}</td>

                                        <td class="actions status">
                                                  <a href="" class="on-default edit-row edit" data-toggle="modal" data-target=".{{$order->id}}" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil" ></i></a>&nbsp;&nbsp;
                                                    <div class="modal {{$order->id}}" id="myModal" style="margin-top:250px">
                                                    <div class="modal-dialog" style="max-width: 300px">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Order Status</h4>
                                                        </div>
                                                        <div class="model-body text-center select" id="{{$order->id}}" style="margin-top: 10px">
                                                             <input type="hidden" name="email" id="email" value="{{$order->email}}">

                                                            {{-- <input type="hidden" name="orderid" value="{{$order->id}}"> --}}

                                                            <input type="radio" class="check" name="status" value="P" checked> Pendding &nbsp;&nbsp;
                                                            <input type="radio" class="check" name="status" value="OTW"> OTW &nbsp;&nbsp;
                                                            <input type="radio" class="check" name="status" value="D"> Deliverd
                                                        </div>
                                                             <button type="button" class="btn btn-danger btn-center" data-dismiss="modal" style="margin-top: 10px">Close</button>
                                                        </div>
                                                    </div> 
                                                 </div>
                                                    <a href="{{url('admin/orderdetail',$order->id)}}" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail"><i class="fa fa-eye"></i></a>

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
                $(".alert").delay(2000).fadeOut(3000);
                $('#datatable').DataTable({
                    'columnDefs':[{
                        'targets':[5],
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
        jQuery('.status').on('change','.select',function() {
            // alert('hiii');
             var status = $(".check:checked").val();

             $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{url('admin/order/orderstatus')}}",
                data: {
                        'status': status,
                        'id':$(this).attr('id'),
                        // 'email':$(this).val()
                         'email':jQuery(this).parent().find('#email').val(),
                        },
                success: function(data){
                  console.log(data.success);    
                }
            });
    });
//     jQuery('.edit').click(function(){
//         // alert('hiii');

//         if ($(this).attr("checked") == "checked") {
//             alert("checked");
//              }
//             });
  });

</script>
@endsection  