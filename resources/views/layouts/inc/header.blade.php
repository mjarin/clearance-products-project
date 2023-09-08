
    <!-- ================ SECTION HEADER ================ -->
    <header class="section-header">	
        <section class="header-main bg-white ">
            <div class="container">
                <div class="row gy-3 align-items-center">
                    <div class="col-lg-2 col-sm-4 col-4">
                        <a href="{{ url('/')}}" class="navbar-brand" style="color:#E62E04!important;">
                            <img class="logo" height="60" src="{{ asset('assets/images/logo-bdclearence.jpeg')}}">
                        </a> <!-- brand end.// -->
                    </div>
                    <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                        <div class="float-end" style="position:relative; right:0!important;">
                           <!--<a target="_blank"  href="{{ url('/return-request') }}" class="btn btn-outline-warning"> -->
                           <!--     <i class="fa fa-user"></i>  <span class="ms-1 d-none d-sm-inline-block">Send Return Request  </span> -->
                           <!-- </a>-->
                        <a  href="{{ url('/return-request') }}" class="btn btn-outline-success"> 
                                 <b>Send Return Request</b>
                        </a>
                            <a data-bs-toggle="offcanvas" href="{{ url('/view-cart')}}" class="btn btn-light PositionCartCount"> 
                                <i class="fa fa-shopping-cart" style="color:#E62E04!important;"></i>
                                <span class="ms-1" style="color:#E62E04!important;">Your Cart </span> 
                            </a>
                            <a href="{{ url('/view-cart')}}" class=""> 
                            <span class="cart-count badge rounded-pill text-white PositionCartSpan" 
                            style="background:#E62E04!important;">0</span>
                        </a>
                        </div>

                    </div> <!-- col end.// -->

                    <div class="col-lg-5 col-md-12 col-12" >
                        <form action="{{url('submit-search')}}" method="POST">
                            @csrf
                          <div class="input-group">
                            <input type="search" name="product_name" id="search-bar-id" class="form-control" style="width:55%" class="form-control" placeholder="Search product" required aria-describedby="basic-addon1">
                            
                            <button type="submit" class="btn" style="background:#E1E1E1 !important; border-radius:0;">
                              <i class="fa fa-search"></i> 
                            </button>
                          </div> <!-- input-group end.// -->
                        </form>
                       
                    </div> <!-- col end.// -->

    
                </div> <!-- row end.// -->
            </div> <!-- container end.// -->
        </section> <!-- header-main end.// -->
    
        <nav class="navbar navbar-dark  navbar-expand-lg" style="border-top:#E1E1E1 3px solid; border-bottom:#E1E1E1 3px solid;">
            <div class="container">
                <button style="background:#E1E1E1; border-radius:0;" class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color:#E1E1E1"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbar_main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="{{url('/')}}">Home</a>
                        </li>	
                        @foreach ($categories as $cate)
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="{{url('categories/'.$cate->id )}}">{{ $cate->category_name }}</a>
                        </li>	
                        @endforeach					
                    </ul>
                </div> <!-- collapse end.// -->
            </div> <!-- container end.// -->
        </nav> <!-- navbar end.// -->
    </header> <!-- section-header end.// -->