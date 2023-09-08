@extends('Backend.backend-master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Orders</li>
                        <li class="breadcrumb-item active">Order List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        {{-- <div class="container-fluid">
            <div class="row"> --}}
                {{-- <div class="col-md-12"> --}}
                <div class="card">
                    <div class="card-header bg-white">
                        {{-- <button type="button" class="btn btn-info mb-2" data-toggle="modal"
                            data-target="#add-product">
                            <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Product</button> --}}
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body scrollable">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-bordered data_table" data-order='[[ 0, "desc" ]]'>
                            <thead>
                                <tr role="row">
                                    <th style="width:10%;">Order Id</th>
                                    <th style="width:10%;">Customer Name</th>
                                    <th style="width:7%;">Phone</th>
                                    <th style="width:8%;">Address</th>
                                    <th style="width:10%;">Delivery Date</th>
                                    <th style="width:10%;">Delivery Status</th>
                                    <th style="width:5%;">Delivery Charge</th>
                                    <th style="width:5%;">Total</th>
                                    <th style="width:5%;">remarks</th>
                                    <th style="width:50%;">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id}}</td>
                                        <td>{{ $order->customer_name}}</td>
                                        <td>{{ $order->phone}}</td>
                                        <td>{{ $order->shipping_address}}</td>
                                        <td>{{ $order->delivery_date}}</td>
                                        <td>{{ $order->delivery_status}}</td>
                                        <td>{{ $order->delivery_charge}}</td>
                                        <td>{{ $order->grand_total}}</td>
                                        <td>{{ $order->remarks}}</td>
                                        {{-- Toools td starts --}}
                                        <td>

                                            <button type="button" class="btn btn-success btn-sm btn-flat edit-btn-order" data-toggle="modal"
                                            data-target="#updateorders" value="{{$order->id}}">
                                                <i class="fa fa-edit"></i>&nbsp;&nbsp;Update</button>
                                            <br>
                                       <a href="{{url('view-single-order/'.$order->id)}}" target="_blank">
                                        <button type="button" class="btn btn-warning btn-sm btn-flat edit-btn-order" data-toggle="modal"
                                         data-target="#" value="{{$order->id}}">
                                          <i class="fa fa-eye"></i>&nbsp;&nbsp;view Order</button>
                                          <br>
                                         </a>
                                         <a href="{{url('generate-pdf/'.$order->id)}}" target="_blank">
                                            <button type="button" class="btn btn-info btn-sm btn-flat edit-btn-order" data-toggle="modal"
                                             data-target="#" value="{{$order->id}}">
                                              <i class="fa fa-eye"></i>&nbsp;&nbsp;View Invoice</button>
                                              <br>
                                             </a>
                                             <a href="{{url('download-pdf/'.$order->id)}}" target="_blank">
                                                <button type="button" class="btn btn-primary btn-sm btn-flat edit-btn-order" data-toggle="modal"
                                                 data-target="#" value="{{$order->id}}">
                                                  <i class="fa fa-book"></i>&nbsp;&nbsp;Download Invoice</button>
                                                  <br>
                                                 </a>
                                        </td>
                                        {{-- Toools td End --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                {{-- </div> --}}
                <!-- /.col -->
            {{-- </div> --}}
            <!-- /.row -->
        {{-- </div> --}}
        <!-- /.container-fluid -->

@include('Backend.layouts.inc.update-orders-modal')
</section>
    <!-- /.content -->
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: ``,
              text: "You Want To Delete Product?",
              icon: "warning",
              width: "200px",
              height:"120px",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

// edit Order............................................................................
$(document).on('click','.edit-btn-order', function () {

var order_id =$(this).val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    $.ajax({
      method: "GET",
      url: "/edit_order/"+ order_id,
      success: function (response) {
        console.log(response);
        $('#order_id_hidden').val(response.Orders.id);
        $('#order_id').val(response.Orders.id);
        $('#delivery_date').val(response.Orders.delivery_date);
        $('#delivery_status').val(response.Orders.delivery_status);
        
      }
    });
    
  });
  
</script>
@endsection