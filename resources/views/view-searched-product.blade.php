@extends('master')
@section('content') 
<h5 class="" style="margin-left:3%;">
    <a href="{{url('/')}}" class="text-dark">Home</a>/
    <a href="#" class="text-dark"><b>Product</b></a>
</h5> 


<section class="padding-top">
    <div class="container">
    
        <header class="section-heading">
            <h3 class="section-title">Searched products</h3>
        </header> 
    
        <div class="row">
            @foreach ($products as $product)  
            <div class="col-lg-3 col-md-6 col-sm-6">
                <figure class="card card-product-grid">
                    <a href="{{url('single-product-from-cate/'.$product->id)}}" class="img-wrap"> 
                        @if($product->offer_price !='') 
                        <span class="topbar"> <b class="badge bg-success"> Offer </b> </span>
                        @endif
                        <img src="{{ asset('assets/images/'.$product->image)}}"> 
                    </a>
                    <figcaption class="info-wrap border-top">
            <a href="#" class="float-end btn btn-light btn-icon"> <i class="fa fa-shopping-cart text-danger"></i> </a>
            <a href="#" class="float-end btn btn-light btn-icon"> <i class="fa fa-heart text-success"></i> </a>
                        <a href="#" class="title text-truncate"><b>{{$product->name}}</b></a>
                        <!--<small class="text-muted">Sizes: S, M, XL</small>-->
                        <div class="price-wrap">
                            <span class="price" style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{$product->selling_price}}</span>
                            @if($product->offer_price !='') 
                            <del class="price-old" style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{$product->offer_price}}</del>
                            @endif 
                        </div> <!-- price-wrap.// -->
                    </figcaption>
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