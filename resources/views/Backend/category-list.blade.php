@extends('Backend.backend-master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item active">Category List</li>
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
                    data-target="#add-category">
                    <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Category</button>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-stripped data_table">
                        <thead>
                            <tr role="row">
                                <th style="width:10%;">name</th>
                                <th style="width:7%;">slug</th>
                                <th style="width:8%;">status</th>
                                <th style="width:10%;">Trending</th>
                                <th style="width:5%;">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $category)
                                <tr>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>{{ $category->trending }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm btn-flat edit-btn-cate"
                                            value="{{ $category->id }}" data-toggle="modal" data-target="#update-category">
                                            <i class="fa fa-edit"></i></button>
                                        <br>
                                            <button class="btn btn-danger btn-sm btn-flat delete-category-btn" value="{{ $category->id }}" 
                                            data-toggle="modal" data-target="#delete_category_modal_id"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                    </td>
                                    {{-- Toools td End --}}
                                </tr>
                            @endforeach


                            <!--....Modal -->
                            {{-- {{--  --}}
                                @include('Backend.layouts.inc.add-category-modal')
                                @include('Backend.layouts.inc.update-category-modal')
                                @include('Backend.layouts.inc.delete-category-modal')

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
    <script>
        $(document).ready(function ($){

            $(document).on('click','.edit-btn-cate', function () { 
            var cate_id=$(this).val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    $.ajax({
      method: "GET",
      url: "/edit_category/"+ cate_id,
      success: function (response) {
        console.log(response);
        $('#cate_id_hidden').val(response.category.id);
        $('#cate_name').val(response.category.category_name);
        
      }
    });
    
  });


$(document).on('click','.delete-category-btn', function () { 
var cate_id=$(this).val();

// alert(cate_id);

    $.ajax({
      method: "GET",
      url: "/edit_category-delete/"+ cate_id,
      success: function (response) {
        // console.log(response);
        $('#hidden_cate_id').val(response.Category.id);
        $('p#h_id').html(response.Category.category_name);
        
      }
    });
    
  });



// end of doc..............

 });
    </script>
@endsection
