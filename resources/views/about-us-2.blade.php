@extends('master')
@section('content')
<div class="container custom-mb">

    <div class="row mt-3">

        <main id="main" style="margin-top:4%;">
   
           <div class="card">
               <div class="card-header text-center bg-white">
                <div class="col-lg-12"><a class="btn btn-outline-success mt-2 float-end"
                     href="{{url('/')}}" style="border-radius:0;">Go back to shop</a></div>
                   <h2>About Us</h2>
               </div>
               <div class="card-body" style="padding:5%;">
                   <!--<h5 class="mb-3">INTRODUCTION</h5>-->

                <p>Welcome to our online clearance store!!!</p> 
                <p>
                We are bd clearance, your one-stop shop for all things clearance. From fashion to gadgets to home and lifestyle items, we have something for everyone.
                
                We offer great discounts on all our products, and we also offer cash on delivery for your convenience.
                
                So browse our selection and take advantage of our great deals today! Thank you for shopping with us!
                </p>
                </div>
            </div>
             </main>
               {{-- @endsection         --}}
                    
                </div>{{-- End of row --}}
               </div>  {{-- End of container --}}

@endsection