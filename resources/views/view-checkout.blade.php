@extends('master')
@section('content')
<section class="padding-top">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <a href="{{url('/')}}" class="btn btn-outline-warning float-end btn-sm btn-flat mt-3 " style="border-radius:0;">Continue Shopping</a>
            <a href="{{url('/view-cart')}}" class="btn btn-outline-success btn-sm btn-flat mt-3" style="border-radius:0; margin-left:60%;">Go Back</a>&nbsp;&nbsp; 
        </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card pb-5 pl-2">
                    <div class="card-body">

                     <form action="{{ url('/place-order') }}" method="POST" class="form" id="order_form" >
                            @csrf
                            <h5 class=" text-uppercase" style="font-weight:bold;">
                                Billing details
                            </h5>
                            <hr class="mt-2">
                            <div class="row checkout-form px-4">
                                <div class="col-sm-12 form-group">
                                    <label class="col-form-label" for="">Your Name<span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="customer_name" id="customer_name"
                                        class="form-control form-control-sm customer_name rounded-0" value="" required >
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="col-form-label" for="phone number">Phone Number<span
                                            class="text-danger">*</span></span></label>
                                    <input type="text" name="phone" class="form-control form-control-sm phone rounded-0"
                                        value=""  id="phone" required>
                                    <span id="phone_error" class="text-danger"></span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label class="col-form-label" for="state">Address<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="shipping_address" id="shipping_address"
                                        class="form-control form-control-sm shipping_address mb-3 rounded-0" value="" required>
                                </div>

                                <div class="col-sm-12 form-group">
                            <label class="col-form-label" for="state">Delivery Charge<span
                                            class="text-danger">*</span></label>
                                    <select value="" name="delivery_charge" class="form-select rounded-0 leave_response" required>
                                        <option value="">Select Delivery Charge </option>
                                        <option value="60">Inside Dhaka</option>
                                        <option value="120">Outside Dhaka</option>
                                      </select>
                                      {{-- <div class="invalid-feedback">Example invalid select feedback</div> --}}
                                </div>
                                

              <div class="d-grid mt-5">
  <button type="submit" class="btn btn-primary btn-block rounded-0" style="background:#E62E04!important; border:0;">Place Your Order</button>
</div>
                            </div>
                    </div>
                </div>
            </div>{{-- end ofol-lg-6 col-sm-12 1st --}}
            <div class="col-lg-6 col-sm-12 mr-5 pr-5">
                <div class="card py-3">
                    <div class="card-body">
                        <h6 class="mt-2 text-uppercase" style="font-weight:bold;">Your Order Details
                        </h6>
                        <hr class="mt-2">
                        <div class="side-table">

                            <div class="mb-5">
                                <table class="table table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th>Product's Name</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                        $total = 0;
                                        @endphp
                                        @foreach($cartitems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>
                                                <img src="{{ asset('assets/images/' . $item->products->image) }}" alt="imain-image"
                                                
                                                style="height:50px; width:50px; border:#E62E04 2px solid;">
                                            </td>
                                            <td>
                                                @if($item->products->qty >= $item->prod_qty )
                                                {{$item->prod_qty}}
                                                @else
                                                    <b class="text-danger">Out of Stock</b>
                                                
                                                @endif
                                            </td>
                                            <td><b>&#2547;</b>&nbsp;{{$item->products->selling_price}}</td>
                                        </tr>
                                        @php 
                                        $total += $item->products->selling_price * $item->prod_qty ;
                                        @endphp
                                        @endforeach

                                        <tr>
                                            <td><b>Total :</b></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                            <b style="color:#E62E04; font-size:20px;">&nbsp;&nbsp;&#2547;&nbsp;{{$total}}</b>
                                                <input type="hidden" value="{{$total}}" name="total_hidden" id="total_hidden">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Delivery Charge :</td>
                                            <td></td>
                                            <td>
                                            </td>
                                            <td>
                                               <strong style="color:#E62E04; font-size:20px;">&nbsp;&nbsp;&nbsp;<b id="taka" style="display:none;">&#2547;</b><span id="delivery_charge_span"></span></strong> 
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Grand Total:</b></td>
                                            <td></td>
                                            <td>
                                            </td>
                                            <td>
                                               <strong  style="color:#E62E04; font-size:20px;"><span>&nbsp;&nbsp;&#2547;</b>&nbsp;</span><span id="grand_total_id">{{$total}}</span></strong> 
                                            </td>
                                        </tr>
                                        <input  type="hidden" name="delivery_charge_hidden" id="delivery_charge_hidden">

                        
                                    </tbody>
                                </table>

                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- end of row under 1st row --}}

        <div class="row" style="margin-top:4%; margin-bottom:10%;">

            <!--<div class="d-grid gap-2 col-6 mx-auto">-->
            <!--    <button class="btn btn-primary rounded-0" type="submit" style="background:#E62E04!important; border:0;" -->
            <!--    >Place Your Order</button>-->
            <!--  </div>-->

        </div>

    </form> <!-- form end.// -->
        </div>
   </div> <!-- container end.// -->
</section>
@endsection
@section('scripts')
  
@endsection
