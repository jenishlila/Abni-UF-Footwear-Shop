@extends('layout/admin/app')
@section('title','Order Detail')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                    <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">Order Detail</h4>
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
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/showorder')}}" ><i class="fa fa-back m-r-5"></i> Back </a>
                            </div>
                        @foreach ($orders as $order)
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="card-box ribbon-box">
                              <div class="ribbon ribbon-success">User Data</div>
                                <p class="m-b-0"><b>Name:</b> {{$order->name}} <br>
                                    <b>Email:</b> {{$order->email}}<br>
                                    <b>Mobile:</b> {{$order->mobile}}<br>
                                </p>
                            </div>
                          </div>
      
                                <div class="col-lg-4">
                                  <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-success">Billing Address</div>
                                    <p class="m-b-0">
                                      <b>Name:</b>{{$order->bname}}<br>
                                      <b>Address:</b>{{$order->baddress}},
                                        {{$order->bcity}},
                                        {{$order->bstate}}<br>
                                      <b>Pincode:</b>{{$order->bpincode}}<br>
                                      <b>Email:</b>{{$order->bemail}}<br>
                                      <b>Mobile:</b> {{$order->bmobile}}</p>
                                  </div>
                              </div>
                              
                              <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                  <div class="ribbon ribbon-success">Shipping Address</div>
                                  <p class="m-b-0">
                                      <b>Name:</b>{{$order->sname}}<br>
                                      <b>Address:</b>{{$order->saddress}},
                                        {{$order->scity}},
                                        {{$order->sstate}}<br>
                                      <b>Pincode:</b>{{$order->spincode}}<br>
                                      <b>Email:</b>{{$order->semail}}<br>
                                      <b>Mobile:</b> {{$order->smobile}}
                                  </p>
                                </div>
                              </div>
                            </div>
                            @endforeach   

                              <table id="datatable" class="table table-bordered" style="margin-top: 50px">
                                    <thead>
                                    <tr>
                                        <th>product Name</th>
                                        <th>Image</th>
                                        <th>qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($orderdetails as $orderdetail)
                                        <tr>
                                            <td>{{$orderdetail->name}}</td>
                                            <td><img src="{{url('/')}}/resources/assets/admin/images/product/{{$orderdetail->upc}}/main.png?{{rand()}}" class="img-thumbnail" width="60px" id="multiImage" alt=""></td>
                                            <td>{{$orderdetail->qty}}</td>
                                            <td>{{$orderdetail->price}}</td>
                                            <td>{{$orderdetail->total}}</td>

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
                        'targets':[1],
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
</script>
@endsection 