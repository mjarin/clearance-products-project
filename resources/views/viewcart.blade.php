@extends('master')
@section('content')

{{-- <div class=" mb-4 shadow-sm border-top" >
    <div class="container">
        <h6 class="mb-0 font-weight-bold mt-2">
            <a href="{{url('/')}}" class="text-dark"><b>Home</b>/</a>
            <a href="{{url('cart')}}" class="text-dark"><b>Cart</b></a>
        </h6>
    </div>
</div> --}}

<div class="container py-3 mt-3">
    <div class="card shadow cartDivReload">
        @if ($cartitems->count() > 0 ) 
            <div class="card-header bg-white">
                <h6 class="text-center mb-2">Your Cart</h6>
            </div>
        <div class="card-body"> 
            @php $total = 0; @endphp
            @foreach ($cartitems as $item)
            <div class="row product_data cart-div-position mb-5" style="margin-left:3%;">
                <div class="col-lg-2 col-md-2 col-sm-4 col-4 ">
                    <img class="" width="80" height="80" src="{{asset('assets/images/'.$item->products->image)}}" alt="Product image">
                </div>
                <div class="col-lg-4 col-md-2 col-sm-4 col-4  my-auto">
                 <p><b>{{$item->products->name}}</b></p>
                </div>{{-- end of col-md-3 --}}

                <div class="col-lg-2 col-md-2 col-sm-4 col-4 my-auto" >
                    <p><b><b>&#2547;</b>&nbsp;{{$item->products->selling_price}}</b></p>
                   </div>{{-- end of col-md-2 --}}

                <div class="col-lg-2 col-md-4 col-sm-6 col-6" >
                 <div class="row">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                    @if($item->products->qty >= $item->prod_qty )
                    <label for="Quantity">Quantity</label>
                    <div class="input-group mb-3 quantity-div">
                         <button class="input-group-text changeQuantity decrement-btn">-</button>
                         <input type="text" name="quantity" value="{{$item->prod_qty}}" class="form-control font-weight-bold text-center qty-input">
                         <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price * $item->prod_qty ; @endphp  
                    @else 
                     <h6 class="mt-4 text-danger font-weight-bold"><b>Out of stock</b></h6>
                   @endif
                   </div>
                </div>{{-- end of col-md-3 --}} 

                <div class="col-lg-2 col-md-2 col-sm-6 col-6 ml-5 divcartRemovebutton" style="margin-top:2%;">

                <button type="button" class="btn btn-danger rounded-circle delete-cartItem cartRemovebutton">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                </div>{{-- end of col-md-2 --}}
            </div>{{-- end of row --}}         
            @endforeach
        </div>{{-- end of card-body --}}
        <hr>
        <div class="total-price-div py-3 px-5 mt-3">
        {{-- <h5 class="mb-5" style="margin-left:20%"><span class=""><b id="total-price">Total Price :</b></span><span><b  id="total-price-value"><b>&#2547;</b>&nbsp;{{$total }}</b>&nbsp;&nbsp;&nbsp;&nbsp;</span></h5> --}}
        <a href="{{url('/')}}" class="btn btn-outline-success float-start mt-2">Continue Shopping</a> 
        <a href="{{url('/checkout')}}" class="btn btn-outline-danger float-end mt-2">Proceed to Checkout </a>
        </h5>
        </div>
            
        @else
        <div class="card-body text-center mt-3">
         <h2>Your&nbsp;&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Cart is empty</h2>
         <a href="{{url('/')}}" class="btn btn-outline-success float-right mt-3">Continue Shopping</a>
        </div>
        @endif
        
    </div>{{-- end of card --}}
</div>{{-- end of container-fluid --}}
@endsection
@section('scripts') 
<script>

$(document).ready(function(){
            // for increment.........................................    
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
    
    $(document).on('click','.changeQuantity', function (e) {
            
            e.preventDefault();
    
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
    
            $.ajax({
                method : "POST",
                url: "update-cart",
                data: {
                    "product_id" : prod_id , 
                     "quantity"  :qty, 
                     },
                success: function (response) {
                    $('.cartDivReload').load(location.href + " .cartDivReload");
                }
            });
    
            
        });

        // for Delete cart item........................................
         
    $(document).on('click','.changeQuantity', function (e) {
            
            e.preventDefault();
    
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
    
            $.ajax({
                method : "POST",
                url: "update-cart",
                data: {
                    "product_id" : prod_id , 
                     "quantity"  :qty, 
                     },
                success: function (response) {
                    $('.cartDivReload').load(location.href + " .cartDivReload");
                }
            });
    
            
        });
    });  

</script>
@endsection    