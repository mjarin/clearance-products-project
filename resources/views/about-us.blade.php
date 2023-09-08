
<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Sep 2022 04:49:00 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Type some info">
  <meta name="author" content="Type name">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>New project</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
  integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Favicons -->
<link href="{{ asset('assets/img/source_n_supply.jpg') }}" rel="icon">
{{-- <link href="{{ asset('assets/img/sns.PNG') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
  rel="stylesheet">

  <!-- Bootstrap css -->
  <link href="{{ asset('assets/css/bootstrap3661.css')}}" rel="stylesheet" type="text/css" />

  <!-- Custom css -->
  <link href="{{ asset('assets/css/ui3661.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/responsive3661.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
  <!-- Font awesome 5 -->
  <link href="{{ asset('assets/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

  <style>
  </style>

</head>
{{-- <body class="bg-light"> --}}

    <style>
        input.ss {
            border-radius: 0px !important;
            font-size: 110%;
            font-weight: 400;
        }

        .btn {
            border-radius: 0px !important;
        }



        .custom-mt {
            margin-top: 7%;
        }

        .custom-mb {
            margin-bottom: 8%;
        }
        
        .btn-dark{
        display:none!important;
        }
    </style>

</head>



<body style="background-color:#F2F3F8;height: 100vh; background-position: center;background-repeat: no-repeat;background-size:cover;">

    <nav class="navbar navbar-dark   navbar-expand-lg" style=" background:#fff; border-top:#E1E1E1 3px solid; border-bottom:#E1E1E1 3px solid;">
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
    {{-- include Header.......... --}}

    <div class="container custom-mb">

            <div class="row mt-3">

                <main id="main" style="margin-top:4%;">
           
                   <div class="card">
                       <div class="card-header text-center bg-white">
                        <div class="col-lg-12"><a class="btn btn-outline-success mt-2 float-end" href="{{url('/')}}">Go back to shop</a></div>
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
                           @include('layouts.inc.footer')

                           <script  src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
                           <!-- Bootstrap js -->
                           <script src="http://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                           <script src="{{ asset('assets/js/custom.js')}}"></script>
                           <!-- Custom js -->
                           <script src="{{ asset('assets/js/script3661.js')}}"></script>
                           @yield('scripts')
                           <script src="{{ asset('assets/js/typed.js') }}"></script>
                           <script>
                              var typed4 = new Typed('#search-bar-id', {
                               strings: ['Search by Womens Category Product (Ex-Salware Kamez)', 'Search by Mens Category Product (Ex-Mens T-shart)', 'Search by Baby Category Product (Ex.-Baby Frok)'],
                               typeSpeed: 60,
                               backSpeed: 60,
                               attr: 'placeholder',
                               // bindInputFocusEvents: true,
                               loop: true
                             });
                               
                           </script>
                           
                           <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                           <script src="{{ asset('assets/vendor/aos/aos.js ') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                           <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
                           <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
                           {{-- <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script> --}}
                           <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
                           <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
                           
                           <script src="{{ asset('assets/js/custom.js') }}"></script>

                           </body>
                           </html>