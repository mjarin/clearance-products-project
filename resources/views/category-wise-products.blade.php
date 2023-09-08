@extends('master')
@section('content')
    <!-- ================ SECTION PRODUCTS ================ -->
    <div class="py-3 mb-4 shadow-sm border-top">
        <div class="container">
            <h6 class="mb-0 font-weight-bold">
                <a href="{{ url('/') }}" class="text-dark"><b>Home</b>/</a>
                <a href="#" class="text-dark"><b>Categories</b>/</a>
                <a href="#" class="text-dark">"<b>
                        {{ $cateId->category_name }}
                    </b>"</a>
            </h6>
        </div>
    </div>


    </h5>
    <section class="padding-top" style="min-height:50vh;">
        <div class="container-fluid">

            <header class="section-heading">
                <h3 class="section-title text-center">Searched products</h3>
            </header>

            <div class="col-lg-2 col-md-4 col-sm-12 col-12 mb-5">
                <b><label for="" class="mb-3">Search By Price Range:</label></b>
                <div id="slider-range-for-cate-product" class="mb-3"></div>
                <p>
                    <input type="text" class="" id="amount_start-cate" name="start_price-cate" value="25"
                        size="2">
                    <input type="text" class="" id="amount_end-cate" name="end_price-cate" value="100"
                        size="2">
                </p>
            </div>

            <div class="row" id="updateDiv-cate">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <figure class="card card-product-grid">
                            <a href="{{ url('single-product-from-cate/' . $product->id) }}" class="img-wrap">
                                @if ($product->qty > 0)
                                    @if ($product->offer_price != '')
                                        <span class="topbar"> <b class="badge bg-success"> Offer </b> </span>
                                    @endif
                                @else
                                    <span class="topbar float-end"> <b class="badge bg-danger">Out Of Stock</b> </span>
                                @endif
                                <img src="{{ asset('assets/images/' . $product->image) }}">
                            </a>
                            <figcaption class="info-wrap border-top">
                                @if ($product->qty > 0)
                                <a href="{{ url('add-to-cart/' . $product->id) }}"
                                    class="float-end btn btn-light btn-icon mt-5"> <i
                                        class="fa fa-shopping-cart text-danger"></i> </a>
                                        @endif        
                                <a href="{{ url('single-from-multiple-product/' . $product->id) }}"
                                    class="text-dark text-decoration-none mb-2"><b>{{ $product->name }}</b>

                                    <div class="price-wrap">
                                        <span class="price"
                                            style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{ $product->selling_price }}</span>
                                        @if ($product->offer_price != '')
                                            <del class="price-old"
                                                style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{ $product->offer_price }}</del>
                                        @endif
                                    </div> <!-- price-wrap.// -->
                            </figcaption>
                            </a>
                        </figure>
                    </div> <!-- col end.// -->
                @endforeach
            </div> <!-- row end.// -->
        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION PRODUCTS END.// ================ -->
@endsection

@section('scripts')
@endsection
