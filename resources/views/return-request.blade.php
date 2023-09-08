@extends('master')
@section('content')

<section class="section-intro padding-top-sm py-2" style="background:#F7F8F9!important;">
    <div class="container px-5">
        <div class="row py-5">
            <div class="col-lg-3 co-md-1"></div>
            <div class="col-lg-6 col-sm-12">
                <div class="card pb-5 pl-2">
                    <div class="card-body">

                     <form action="{{ url('/send-return-request') }}" method="POST" class="form" id="order_form" >
                            @csrf
                            @method('PUT')  
                            <p class="text-center py-3">
                                Please Provide relivant information of returning order 
                            </p>
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
                                <input type="text" name="phone" id="phone" class="form-control form-control-sm phone rounded-0" required>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label class="col-form-label" for=" ">Order Id<span
                                            class="text-danger">*</span></span></label>
                                    <input type="text" name="order_id" class="form-control form-control-sm  rounded-0"
                                        value=""  id="order_id" required>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label class="col-form-label" for="state">Return Reason<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="return_reason" id="return_reason"
                                        class="form-control form-control-sm return_reason mb-5 rounded-0" value="" required>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary rounded-0" type="submit" style="background:#E62E04!important; border:0;" 
                                >Send Request</button>
                              </div>
                         </form>
                    </div>
                </div>
            </div>{{-- end ofol-lg-6 col-sm-12 1st --}}
              <div class="col-lg-3 co-md-1"></div>
        </div>
    </div>
</div>        
    
@endsection

@section('scripts') 

<script>
    
</script>
@endsection




