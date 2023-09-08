@extends('master')
@section('content')
    <!-- ================ SECTION INTRO ================ -->
    <section class="section-intro padding-top-sm py-1">
        <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <main class="card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 co-6"></div>
                <div class="col-lg-4 col-md-4 col-sm-6 co-6">
                <a href="{{url('/')}}" class="btn btn-outline-success float-end btn-sm btn-flat">Continue Shopping</a> 
                </div>
                </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12 text-center mt-2 ml-5">
                            <article class="">
                                <img src="{{ asset('assets/images/'.$product['image'])}}" alt="imain-image" 
                                class=" mb-3  mt-2 img-fluid" style="height:62vh; width:65wh; border:#E62E04 2px solid;">
                                {{-- <hr style="background:#E62E04!important;"> --}}
                            </article>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12 product_data pl-0 ml-0">
                            <h3 class="py-3">{{$product->name}}</h3>
                    
                            <div class="">
                                <hr>

                                <span style="color:#000!important; font-weight:bold; font-size:30px;">Price
                                    :</span>
                                <strong
                                    style="color:#E62E04!important; font-weight:bold; font-size:30px;">
                                    <span style="font-weight:bold; font-size:30px;">৳</span>&nbsp;{{ $product->selling_price }}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <del class="price-old" style="font-size:25px;"><b>&#2547;</b>{{$product->offer_price}}</del>/1 pic
                            </div>
                            <hr>
                                <div class="row">
                                    <div class="col-md-5 mr-5">
                                        <p class="font-weight-bold" style="color:#E62E04!important;"><b>Sold
                                                by:&nbsp;&nbsp;&nbsp;BD  Clearence</b></p>
                                    </div>
                                    <div class="col-md-7 float-left ml-5">
                                        <a href="#" class="btn btn-info text-white" role="button"
                                            style="background:#E62E04!important; border:none; border-radius:0!important;">Visit
                                            Store</a>
                                    </div>
                                </div>
                                <hr>

                                @if ($product->qty > 0)
                                    <label class="badge bg-success mr-2 mt-3 mb-2"><b>In stock</b></label> (<small
                                        class="text-danger m-2"> <b>{{ $product->qty }}
                                            available</b></small>)
                                @else
                                    <label class="badge bg-danger mt-3 mb-2"><b>Out of stock</b></label>
                                @endif

                                <div class="row mt-5">
                                    <div class="col-md-4 col-sm-6 col-6">

                                        <input type="hidden" value="{{ $product->id }}" class="prod_id">

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
                                    <div class="col-md-8 col-sm-6 col-6 mt-4 text-left">
                                        @if ($product->qty > 0)
                                            <button  type="button"
                                                class="btn addToCartFromCateSearch float-start mt-2 text-white" 
                                        data-bs-toggle="modal" data-bs-target="#cart_modal_id" value="{{ $product->id }}"
                                                style="border-radius:0!important; background-color:#E62E04;!important ;"><i
                                                    class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;<b>Add to
                                                    Cart</b></button>
                                        @endif
                                       
                                    </div>
                                    <hr class="mt-3">
                                </div><!-- End sidebar categories-->
                                {{-- @endforeach --}}

                                <div class="row pl-5 text-right">

                                    <div class="mw-100 overflow-hidden text-right aiz-editor-data">

                                        <div class="col-sm-12 mb-2">
                                            <h4 class="mb-2 fs-20 fw-600 " style="font-weight: bolder;"> 
                                                
                                                {{-- <u>Product Description</u> --}}
                                            </h4>
                                            <div class="mw-100 overflow-hidden text-right aiz-editor-data">
                                                {{-- <hr> --}}
                                            <p style="font-weight: bolder;" class="mt-2 text-reset">Product Description:&nbsp;
                                                </p>

                                            </div>

                                            {!! $product->description !!}

                                        </div>
                                    </div>


                        </div>

                                </div>
                                    {{-- Product Description --}}
                                   

                </main>
            </div>
            @include('layouts.inc.cart-modal') 
            <div class="col-md-1"></div>
        </div>
        </div> <!-- container end.// -->
    </section>
@endsection
@section('scripts') 

<script>
    $(document).ready(function(){

        $(document).on('click','.increment-btn', function (e) {    
    e.preventDefault();

    var incValue =$(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(incValue , 10);
    value =isNaN(value) ? 0 : value;
    if(value < 10){   
        value++;
        $(this).closest('.product_data').find('.qty-input').val(value);
    }
    
 });

 // for decrement.........................................

 $(document).on('click','.decrement-btn', function (e) { 
    e.preventDefault();

    var decValue = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(decValue , 10);
    value =isNaN(value) ? 0 : value;

    if(value > 1){    
        value--;
        $(this).closest('.product_data').find('.qty-input').val(value); 
    }

    });

// End of doc ......................... 
});
</script>
@endsection