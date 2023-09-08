@extends('Backend.backend-master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header bg-white">
                <h3>Update Products</h3>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group row">
                                <input type="hidden" name="no-status-order-id" id="no-status-order-id">
                                <label for="" class="col-sm-4 col-form-label">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"  name ="product_name" value="{{$product->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-sm-4 control-label">Slect Category </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="category" id="category">
                                        <option value="{{ $product->category->id }}" selected>{{ $product->category->category_name}}</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sku" class="col-sm-4 col-form-label">SKU</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="sku" value="{{$product->sku}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="advancePayment" class="col-sm-4 col-form-label">Slug</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="slug" value="{{$product->slug}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Small Description</label>
                                <div class="col-sm-8">
                                        <textarea name="smallDescription"  rows="1" class="form-control">{{$product->small_description	}}</textarea> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                        <textarea name="description"  id="summernote" rows="1" class="form-control">{{$product->description	}}</textarea> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Original Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="original_price" value="{{$product->original_price}}">
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Selling Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="selling_price" value="{{$product->selling_price}}">
                                </div>
                            </div>
                            
                           <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Price to set offer</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="offer_price" value="{{$product->	offer_price}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Deal Start Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name ="deal-start-date" value="{{$product->deal_start_date}}">
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Deal End Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name ="deal-end-date" value="{{$product->deal_end_date}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Tax</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="tax" value="{{$product->tax}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="qty" value="{{$product->qty}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8" >
                                    <select class="form-control" name="status" id="status">
                                        <option value="{{$product->status}}" slected="">
                                            @if($product->status == 1)
                                                Active
                                               @else
                                                Deactive
                                               @endif
                                            </option>
                                        <option value="1">Active</option>
                                           <option value="0">Deactive</option>     
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Deal</label>
                                <div class="col-sm-8" >
                                    <select class="form-control" name="deal" id="deal">
                                        <option value="{{$product->deal}}" slected="">
                                        @if($product->deal == 1)
                                            Active
                                           @else
                                            Deactive
                                           @endif
                                        </option>
                                        <option value="1" >Active</option>
                                           <option value="0">Deactive</option>     
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Meta title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Meta Description</label>
                                <div class="col-sm-8">          
                                    <textarea name="meta_description"  rows="1" class="form-control">{{$product->meta_description}}</textarea> 
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Meta Keywords</label>
                                <div class="col-sm-8">
                                    <textarea name="meta_keyword"  rows="1" class="form-control">{{$product->meta_keyword}}</textarea> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Choose Image</label>
                                <div class="col-sm-8">
                                <input name ="image" type="file" class="form-control">
                                    </div>
                                </div> 
                           
                           <div class="row mt-2 mb-2">
                                <label for="" class="col-sm-4 col-form-label">Image</label>
                                <div class="col-sm-8">
                            @if($product->image)
                            <img src="{{asset('assets/images/'.$product->image)}}" class="cate-img" alt="product image" height="60" width="60">
                            @endif
                        </div>
                    </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update Order</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-2"></div>
                </div>
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
