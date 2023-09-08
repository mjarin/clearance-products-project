@extends('master')
@section('content')
    <div class="container custom-mb">

        <div class="row mt-3">

            <main id="main" style="margin-top:4%;">

                <div class="card">
                    <div class="card-header text-center bg-white">
                        <div class="col-lg-12"><a class="btn btn-outline-success mt-2 float-end" 
                            href="{{ url('/') }}" style="border-radius:0;">Go back
                            to shop</a></div>
                        <h3>Return Policy</h3>
                    </div>
                    <div class="card-body" style="padding:5%;">
                        {{-- <h5 class="mb-3">INTRODUCTION</h5> --}}

                        <p>• Returns Accepted: Yes</p>
                        <p>• Return Deadline: 3 days after item receipt</p>
                        <p>• Type of Credit: Full Refund to Original Product price</p>
                        <p>• Refund Timeframe: Upon receipt of return product a refund will be issued within 1-2 business
                            days</p>
                        <p>• Replacement Timeframe: Replacements will ship out 3-5 business days after original return
                            product is received</p>
                        <p>• Restocking Fees: No Restocking Fees but all the delivery charge will be beared by the customer
                        </p>
                        <h5 class="mt-5 mb-3">Eligibility Window</h5>
                        <p>All of us here at bdclearance.com stand behind the quality of our products. We do, however, offer
                            returns if you're not completely happy with your purchase. you can return the product with the
                            delivery man during delivery without incurring any cost. You may return the product afterwards
                            within 3 days of your original order delivery date. The product must be intact and you will be
                            responsible for the delivery charge.
                            <br>
                            <br>
                            We have pretty basic guidelines. We will take care of you if you are honest with us. We shall
                            uphold any manufacturer warranties against flaws that apply to your device starting at the time
                            of purchase.
                        </p>

                        <h5 class="mt-5 mb-3">RETURNING AN ITEM</h5>
                        <p>1. Before the delivery person leaves: You can inspect the product and, if it doesn't meet the
                            stated quality, return it with the delivery person.</p>
                        <p>2. After receiving the product (Customer has to pay all the delivery charges):</p>
                        <p>Step 1: Fill out the form to request a return.</p>
                        <p>Step 2: After receiving your request and reviewing it, we will send you an email with additional
                            directions on how to return the item.</p>
                        <p>Step 3: After we get the returned item, we'll process the refund and get in touch with you if any
                            more details are required. Normally, we process exchanges and refunds within 72 hours of
                            receiving them.</p>



                    </div>
                </div>
            </main>
            {{-- @endsection         --}}

        </div>{{-- End of row --}}
    </div> {{-- End of container --}}
@endsection
