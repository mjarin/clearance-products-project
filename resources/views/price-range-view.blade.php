@foreach ($products as $product)  
<div class="col-lg-3 col-md-6 col-sm-6">
    <figure class="card card-product-grid">

        <a href="{{url('single-from-multiple-product/'.$product->id)}}" class="img-wrap"> 
            @if ($product->qty > 0)
            @if ($product->offer_price != '')
                <span class="topbar"> <b class="badge bg-success"> Offer </b> </span>
            @endif
        @else
            <span class="topbar float-end"> <b class="badge bg-danger">Out Of Stock</b> </span>
        @endif
            <img src="{{ asset('assets/images/'.$product->image)}}"> 
        </a>
        <figcaption class="info-wrap border-top">
            <a href="{{ url('single-from-multiple-product/'.$product->id)}}" class="text-dark text-decoration-none  mb-2"><b>{{$product->name}}</b></a>
            @if ($product->qty > 0)
            <a href="{{ url('add-to-cart/'.$product->id) }}" class="float-end btn btn-light btn-icon"> <i class="fa fa-shopping-cart text-danger"></i></a>
            @endif
            <a href="{{ url('single-from-multiple-product/' . $product->id) }}" class="text-dark text-decoration-none mb-2">
            <div class="price-wrap">
                            <span class="price" style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{$product->selling_price}}</span>
                            @if($product->offer_price !='') 
                            <del class="price-old" style="color:#E62E04!important; font-weight:bold;"><b>&#2547;</b>{{$product->offer_price}}</del>
                            @endif 
            </div> <!-- price-wrap.// -->
        </a>
        </figcaption>
    </figure>
</div> <!-- col end.// -->

@endforeach