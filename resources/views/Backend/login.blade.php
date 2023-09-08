
<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Sep 2022 04:49:00 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Type some info">
  <meta name="author" content="Type name">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>BD Clearence</title>
  <!-- Favicons -->
 <link href="{{ asset('assets/images/logo-bdclearence.jpeg') }}" rel="icon">
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
<body class="bg-light">

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
            margin-top: 4%;
        }

        .custom-mb {
            margin-bottom: 15%;
        }
        
        .btn-dark{
            display:none!important;
        }

    </style>
</head>



<body style="background-color:#F2F3F8;height: 100vh; background-position: center;background-repeat: no-repeat;background-size:cover;">
    
    {{-- include Header.......... --}}

    <div class="container custom-mb">
        <div class="login-box">
            <div class="login-logo">
                <p id="date"></p>
                <p id="time" class="bold"></p>
            </div>

            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-5 bg-white py-5 px-5 custom-mt shadow-lg p-3  bg-body rounded">
                    <h3 class="font-weight-bold text-center">Admin Login</h3>
                    <p class="text-secondary text-center mt-4 ">Sign in to start your session</p>
                    <form class="mt-3 py-1" action="{{ url('admin/login') }}" method="POST"
                        style="background:#FFFFFF!important;">
                        @csrf
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <div class="input-group mb-4 mt-4">
                            <input type="text" name="email" class="form-control py-3 ss " placeholder="Input Email"
                                value="{{ old('email') }}" autofocus>
                            <div class="input-group-append">
                                <span class="input-group-text" for="inputGroupSelect02"
                                    style="border-radius: 0px !important;"><i class="fa fa-user"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <span class="text-danger mt-2">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="input-group mb-4  mt-2">
                            <input type="password" name="password" class="form-control py-3 ss"
                                placeholder="Input password">
                            <div class="input-group-append">
                                <span class="input-group-text" for="inputGroupSelect02"
                                    style="border-radius: 0px !important;">
                                    <i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <span class="text-danger mt-2 mb-3">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="input-group mb-4  mt-2">
                            <select class="custom-select form-control" name="role" required
                                style="border-radius: 0px !important;">
                                <option value="admin" class="ss py-2">Admin</option>
                            </select>
                        </div>
                        <span class="text-danger mt-2">
                            @error('role')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" name="remember">
                                    <span class="opacity-60">Remember Me</span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#" class="text-reset opacity-60 fs-14">Forgot password?</a>
                            </div>
                        </div>

                        <div class="mb-5 py-2">
                            <button type="submit" class="btn btn-block fw-600 py-2 text-white"
                                style="background:#E62E04!important; border:0; font-size:130%;
                            font-weight:bold;">Login</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>

    </div> 
    
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
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  --}}
{{-- @if(Session::has("status"))
<script>
swal("","{!! Session::get('status') !!}","success" );
</script> --}}
{{-- @endif --}}


<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/vendor/aos/aos.js ') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/checkout.js') }}"></script>
</body>
</html>