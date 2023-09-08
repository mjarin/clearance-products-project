@extends('master')
@section('content')
    <!-- ================ SECTION INTRO ================ -->
       <!-- ================ SECTION INTRO ================ -->
       <section class="section-intro padding-top-sm py-2" style="background:#F7F8F9!important;">
        <div class="container-fluid px-5" style="background:#F7F8F9!important;">
            <div class="row" style="background:#F7F8F9!important;">
                    <div class="shadow-lg p-3 mb-5 bg-body rounded"  style="background:#F7F8F9 max-height:20%!important;">
                        <h2 class="text-uppercase text-center">SPOTLIGHT DEAL</h2>
                        <hr class="mb-5">
                        <div class="row">
                        @foreach ($deal_product as $deal)
                        @php
                        $first = Carbon\Carbon::create($deal->deal_start_date);
                        $second = Carbon\Carbon::create($deal->deal_end_date);
                        $diff = now()->between($first, $second);
                        @endphp
                            @if ($diff)
                            <div class="col-lg-5 col-md-6 col-sm-12 col-12 text-center mt-2 ml-3">
                                    <img src="{{ asset('assets/images/'.$deal->image) }}" alt="imain-image"
                                        class=" mb-5 img-fluid"
                                        style=" border:#E1E1E1 3px solid; max-width:700px!important; max-height:400px!important;"
                                        >
                                    {{-- <hr style="background:#E62E04!important;"> --}}
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-12 col-12 product_data pl-0 pl-5">
                                <h2 class="py-2">{{ $deal->name }}</h2> 
                                <div class="">
                                    <hr>
                                    <span style="color:#000!important; font-weight:bold; font-size:35px;">Price :</span>

                                    <strong style="color:#E62E04!important; font-weight:bold; font-size:35px;">
                                        <span style="font-weight:bold; font-size:35px;">৳</span>&nbsp;{{ $deal->selling_price }}
                                    </strong>/1 pic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <del class="price-old" style="font-size:25px;"><b>&#2547;</b>{{$deal->offer_price}}</del>/1 pic
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5 mr-5">
                                        <p class="font-weight-bold" style="color:#E62E04!important;"><b>Sold
                                                by:&nbsp;&nbsp;&nbsp;BD clearence</b></p>
                                    </div>
                                    <div class="col-md-7 float-left ml-5">
                                        <a href="{{url('/')}}" class="btn btn-info text-white" role="button"
                                            style="background:#E62E04!important; border:none; border-radius:0!important;">Visit
                                            Store</a>
                                    </div>
                                </div>
                                <hr>
    
                                @if ($deal->qty > 0)
                                    <label class="badge bg-success mr-2 mt-2 mb-2"><b>In stock</b></label> (<small
                                        class="text-danger m-2"> <b>{{ $deal->qty }}
                                            available</b></small>)
                                @else
                                    <label class="badge bg-danger mt-3 mb-2"><b>Out of stock</b></label>
                                @endif
    
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-3 col-sm-6 col-6">
    
                                        <input type="hidden" value="{{ $deal->id }}" class="prod_id">
    
                                        <label for="Quantity mb-2"><b>Quantity</b></label>
                                        <div class="input-group text-center mt-2">
                                            <button class="input-group-text decrement-btn"
                                                style="border-radius:0!important;">-</button>
                                            <input type="text" name="quantity" value="1"
                                                class="form-control qty-input text-center">
                                            <button class="input-group-text increment-btn"
                                                style="border-radius:0!important;">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-6 col-6 mt-2 text-left">
                                        @if ($deal->qty > 0)
                                            <button type="button"
                                                class="btn addToCartFromCateSearch float-start mt-4 text-white"
                                                data-bs-toggle="modal" data-bs-target="#cart_modal_id"
                                                value="{{ $deal->id }}"
                                                style="border-radius:0!important; background-color:#E62E04;!important ;"><i
                                                    class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;<b>Add to
                                                    Cart</b></button>
                                        @endif
                                    </div>
                                </div><!-- End sidebar categories-->
                                {{-- @else
                                <h3 class="text-danger">Please Set Deal Product</h3>--}}
                                @endif 
                                @endforeach
                            </div>
                        </div>
                    </div>
                @include('layouts.inc.cart-modal')
            </div>
        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION INTRO END.// ================ -->

    <!-- ================ SECTION PRODUCTS ================ -->
    <div class="px-5">
        <div class="card text-center">
            <h3 class="section-title text-uppercase py-2">Featured Deals</h3>
        </div>
    </div>
    <section class="padding-top">
        <div class="container-fluid px-5">
            <div class="row mb-2 noUiSliderDiv">
                <h5 class="mb-2"><label for="amount">Search by Price range:</label></h5>
                <div class="col-lg-2 col-md-4 col-sm-12 col-12 mb-3">
                    <div id="slider-range" class="mb-2"></div>
                    <p class="float-start">
                        <input type="text" class="" id="amount_start" name="start_price" value="10"
                            size="2">
                        <input type="text" class="" id="amount_end" name="end_price" value="800" size="2">
                    </p>

                    {{-- <button class="click-button">Click</button> --}}


                </div>
                <div class="col-lg-10 col-md-8 col-sm-12 col-12">
                </div>
            </div>
            {{-- <header class="section-heading">
        </header>  --}}

            <div class="row mt-3" id="updateDiv">

                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6" style="max-height:20%">
                        <figure class="card card-product-grid">

                            <a href="{{ url('single-from-multiple-product/' . $product->id) }}" class="img-wrap">
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
                                <a href="{{ url('single-from-multiple-product/' . $product->id) }}"
                                    class="text-dark text-decoration-none mb-2"><b>{{ $product->name }}</b></a>

                               @if ($product->qty > 0)    
                                <a href="{{ url('add-to-cart/' . $product->id) }}"
                                    class="float-end btn btn-light btn-icon"> <i
                                        class="fa fa-shopping-cart text-danger"></i> </a>
                                  @endif
                                <a href="{{ url('single-from-multiple-product/' . $product->id) }}"
                                    class="text-decoration-none">
                                    <div class="price-wrap">
                                        <span class="price"
                                            style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{ $product->selling_price }}</span>
                                        @if ($product->offer_price != '')
                                            <del class="price-old"
                                                style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{ $product->offer_price }}</del>
                                        @endif
                                    </div> <!-- price-wrap.// -->
                                </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                @endforeach
            </div> <!-- row end.// -->

        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION PRODUCTS END.// ================ -->


    <div class="px-5">
        <div class="card py-3 text-center">
            <h2 class="section-title text-uppercase">Category wise Deals</h2>
        </div>
    </div>
    <section class="padding-top">
        <div class="container-fluid px-5">
            <div class="row">
                @foreach ($categories_wise_product as $category)
                    <h3 class="section-title py-2">{{ $category->category_name }}</h3>
                    @foreach ($category->products as $product)
                        {{-- <header class="section-heading">
                </header>  --}}
                        <div class="col-lg-3 col-md-2 col-sm-6">
                            <figure class="card card-product-grid">

                                <a href="{{ url('single-from-multiple-product/' . $product->id) }}" class="img-wrap">
                                    @if ($product->qty > 0)
                                        @if ($product->offer_price != '')
                                            <span class="topbar"> <b class="badge bg-success"> Offer </b> </span>
                                        @endif
                                    @else
                                        <span class="topbar float-end"> <b class="badge bg-danger">Out Of Stock</b>
                                        </span>
                                    @endif
                                    <img src="{{ asset('assets/images/' . $product->image) }}">
                                </a>
                                <figcaption class="info-wrap border-top">
                                    <a href="{{ url('single-from-multiple-product/' . $product->id) }}"
                                        class="mt-5 text-dark text-decoration-none"><b>{{ $product->name }}</b></a>
                                    
                                    @if ($product->qty > 0)     
                                    <a href="{{ url('add-to-cart/' . $product->id) }}"
                                        class="float-end btn btn-light btn-icon"> <i
                                            class="fa fa-shopping-cart text-danger"></i></a>
                                        @endif        
                                    <a href="{{ url('single-from-multiple-product/' . $product->id) }}"
                                        class="text-decoration-none">
                                        <div class="price-wrap">
                                            <span class="price"
                                                style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{ $product->selling_price }}</span>
                                            @if ($product->offer_price != '')
                                                <del class="price-old"
                                                    style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{ $product->offer_price }}</del>
                                            @endif
                                        </div> <!-- price-wrap.// -->
                                    </a>
                                </figcaption>
                            </figure>
                        </div> <!-- col end.// -->
                    @endforeach
                @endforeach
            </div> <!-- row end.// -->

        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION PRODUCTS END.// ================ -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.increment-btn', function(e) {
                e.preventDefault();

                var incValue = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(incValue, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }

            });

            // for decrement.........................................

            $(document).on('click', '.decrement-btn', function(e) {
                e.preventDefault();

                var decValue = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(decValue, 10);
                value = isNaN(value) ? 0 : value;

                if (value > 1) {
                    value--;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }

            });


            // Price Range...................... 

            // $(document).on('click','.click-button',function(){

            // var start = $('#amount_start').val();
            // var end = $('#amount_end').val();



            // });



            // End of doc ......................... 
        });
    </script>
@endsection
