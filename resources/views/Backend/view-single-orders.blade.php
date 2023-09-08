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
                        <table class="table table-bordered data_table">
                            <thead>
                                <tr role="row">
                                    <th style="width:5%;">Order Id</th>
                                    <th style="width:10%;">Item</th>
                                    <th style="width:10%;">Name</th>
                                    <th style="width:5%;">Unit Price</th>
                                    <th style="width:5%;">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id}}</td>
                                        <td>
                                        <img src="{{ asset('assets/images/'.$order->image) }}" width="70" height="80">
                                        </td>
                                        <td>{{ $order->name}}</td>
                                        <td>{{ $order->unit_price}}</td>
                                        <td>{{ $order->qty}}</td>
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
</section>
    <!-- /.content -->
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
    //  $('.show_confirm').click(function(event) {
    //       var form =  $(this).closest("form");
    //       var name = $(this).data("name");
    //       event.preventDefault();
    //       swal({
    //           title: ``,
    //           text: "You Want To Delete Product?",
    //           icon: "warning",
    //           width: "200px",
    //           height:"120px",
    //           buttons: true,
    //           dangerMode: true,
    //       })
    //       .then((willDelete) => {
    //         if (willDelete) {
    //           form.submit();
    //         }
    //       });
    //   });

// edit Order............................................................................
// $(document).on('click','.edit-btn-order', function () {

// var order_id =$(this).val();

// $.ajaxSetup({
//   headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });

//     $.ajax({
//       method: "GET",
//       url: "/edit_order/"+ order_id,
//       success: function (response) {
//         console.log(response);
//         $('#order_id_hidden').val(response.Orders.id);
//         $('#order_id').val(response.Orders.id);
//         $('#delivery_date').val(response.Orders.delivery_date);
//         $('#delivery_status').val(response.Orders.delivery_status);
        
//       }
//     });
    
//   });
  
</script>
@endsection