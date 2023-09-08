@extends('Backend.backend-master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Product List</li>
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
                        <button type="button" class="btn btn-info mb-2" data-toggle="modal"
                            data-target="#add-product">
                            <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Product</button>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body scrollable">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-bordered data_table_product">
                            <thead>
                                <tr role="row">
                                    <th style="width:20%;">name</th>
                                    <th style="width:10%;">image</th>
                                    <th style="width:10%;">Category</th>
                                    <th style="width:5%;">SKU</th>
                                    <th style="width:5%;">Offer Price</th>
                                    <th style="width:5%;">Regular Price</th>
                                    <th style="width:5%;">Quantity</th>
                                    <th style="width:5%;">status</th>
                                    <th style="width:5%;">Deal</th>
                                    <th style="width:25%;">Deal Start Date</th>
                                    <th style="width:25%;">Deal End Date</th>
                                    <th style="width:25%;">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name}}</td>
                                        <td>
                                        <img src="{{ asset('assets/images/'.$product->image) }}" width="70" height="80">
                                        </td>
                                        <td>{{ $product->category->category_name}}</td>
                                        <td>{{ $product->sku}}</td>
                                        <td>{{ $product->selling_price}}</td>
                                        <td>{{ $product->offer_price}}</td>
                                        <td>
                                            @if($product->qty > 0)
                                            {{ $product->qty}}
                                            @else
                                            <label class="badge bg-danger mt-3 mb-2"><b>Out of stock</b></label>
                                            @endif
                                        </td>
                                        <td>{{ $product->status}}</td>
                                        <td>{{ $product->deal}}</td>
                                        <td>{{ $product->deal_start_date}}</td>
                                        <td>{{ $product->deal_end_date}}</td>
                                        {{-- Toools td starts --}}
                                        <td>
                                        <a href="{{url('edit-product/'.$product->id)}}" target="_blank">
                                            <button type="button" class="btn btn-success btn-sm btn-flat" data-toggle="modal"
                                            data-target="#updateproduct">
                                                <i class="fa fa-edit"></i></button>
                                            <br>
                                        </a>
                                        <form method="POST" action="{{ url('delete/'.$product->id) }}">
                                            @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-danger btn-sm btn-flat mb-2 show_confirm" data-toggle="tooltip">
                                         <i class="fa fa-trash"></i>&nbsp;&nbsp;</button>
                                        </form>
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

@include('Backend.layouts.inc.add-product-modal')
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
  
</script>
<script>
   $('.data_table_product').DataTable({
    "scrollX": true,
    "scrollY": true,
    "ordering": false,

  });

</script>
@endsection