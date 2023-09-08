
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

  <!-- Bootstrap css -->
  <link href="{{ asset('assets/css/bootstrap3661.css')}}" rel="stylesheet" type="text/css" />

  <!-- Custom css -->
  <link href="{{ asset('assets/css/ui3661.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/responsive3661.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
  <!-- Font awesome 5 -->
  <link href="{{ asset('assets/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  
  
  <style>
  

     .btn-dark{
        display:none!important;
        }
       
/* Start of media query.............................*/
        @media only screen and (max-width: 756px) {
         .cartRemovebutton{
             margin-top: 16px!important;
            }
            
         .modal-dialog {
             max-width: 150px!important; /* New width for default modal */
             max-height: 80px!important;
        }
        
        
        .cart-div-position{
                      margin-top: 22%!important;
        }
        

            
        }
        /* end of media query */
    
  </style>
</head>
<body class="bg-light productPage">
  @include('layouts.inc.header')
    @yield('content')
    
    @include('layouts.inc.footer')

<script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Custom js -->
<script src="{{ asset('assets/js/script3661.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$(document).ready(function(){
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 10,
      max: 800,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount_start" ).val(ui.values[0]);
        $( "#amount_end" ).val(ui.values[1]);

        var start = $('#amount_start').val();
         var end = $('#amount_end').val();

      $.ajax({
      type: "GET",
      dataType:'html',
      url: "",
      // data:"start="+ start +"& end" + end,
      data: {
        'start' : start,
        'end':end,
      },
    success: function (response) {

//   console.log(response)

   $('#updateDiv').html(response);
    
}
});
      }
    });
  } );
  
   // price Range for category product......

  $( function() {
    $( "#slider-range-for-cate-product" ).slider({
      range: true,
      min: 10,
      max: 800,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount_start-cate" ).val(ui.values[0]);
        $( "#amount_end-cate" ).val(ui.values[1]);

        var start = $('#amount_start-cate').val();
         var end = $('#amount_end-cate').val();

      $.ajax({
      type: "GET",
      dataType:'html',
      data: {
        'start' : start,
        'end':end,
      },
    success: function (response) {

  //  console.log(response)

   $('#updateDiv-cate').html(response);
    
}
});
      }
    });
  } );

   
// end of doc................................
  } );
</script>
<script>



    // navbar search...............
    var availableTags = [];
    $.ajax({
            method: "GET",
            url: "/search-product-list",
            success: function (response){
              satartAutoComplete(response);
                
            }
        });

        function satartAutoComplete(availableTags){
          $( "#search-bar-id" ).autocomplete({
          source: availableTags
    });
}

</script>
<script src="{{ asset('assets/js/typed.js') }}"></script>
<script>
   var typed4 = new Typed('#search-bar-id', {
    strings: ['Search by Womens Categorys Product (Ex-Salware Kamez)', 'Search by Mens Category Product (Ex-Mens T-shart)', 'Search by Baby Category Product (Ex.-Baby Frok)', 'Search Product by price (Ex.-550)'],
    typeSpeed: 60,
    backSpeed: 60,
    attr: 'placeholder',
    // bindInputFocusEvents: true,
    loop: true
  });
    
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
@if(Session::has("status"))
<script>
swal("","{!! Session::get('status') !!}","success" );
</script>
@endif

@if(Session::has("error"))
<script>
swal("","{!! Session::get('error') !!}","warning" );
</script>
@endif
<script src="{{ asset('assets/js/custom.js')}}"></script>
@yield('scripts')
</body>
</html>