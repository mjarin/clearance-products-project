@extends('master')
@section('content')
<section class="padding-top" style="min-height:75vh;">
    <div class="container">
                <div class="row mb-2">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12  custom-position-for-list">
            <a href="{{url('/')}}" class="btn btn-outline-success float-end btn-sm btn-flat mt-3 px-5" style="border-radius:0;">Continue Shopping</a>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 custom-px">
            @php 
            $i=1;
            @endphp
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>SL.No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Item</th>
                         <th>Price</th>
                        <th>Quantity</th>
                        <th>Delivery Charge</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>
                            <img src="{{ asset('assets/images/' . $order->image ) }}" alt="imain-image"
                                                
                            style="height:50px; width:50px; border:#E62E04 2px solid;">
                           
                        </td>
                        <td>
                            {{ $order->unit_price }}
                            
                        </td>        
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->delivery_charge }}</td>
                        <td>{{ $order->order_date }}</td>
                    </tr>
                                            
                    @endforeach
             </tbody>
            </table>
        </div>
        </div> <!-- row.// --> 

     </div> <!-- container end.// -->
</section>
 @endsection    