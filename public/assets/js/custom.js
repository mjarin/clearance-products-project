$(document).ready(function(){
    loadcart();

    
       
    $('.leave_response').on('change', function() {
        var delivery_charge = $(this).val();
        var total=parseInt($('input#total_hidden').val());
        var  grand_total = total + parseInt(delivery_charge);
        $('span#grand_total_id').html('');
        $('span#grand_total_id').html(grand_total);
        $('input#grand_total_hidden').val(grand_total);
        $('#delivery_charge_span').html();
        $('#delivery_charge_span').html(delivery_charge);
        $('input#delivery_charge_hidden').val(delivery_charge);
        $('b#taka').show();
        // grand_total_id

    });

    // on click delivery charge get default value...................................
    // $('input[name="delivery_charge"]').on("click", function() {
    //     var delivery_charge = $('input[name="delivery_charge"]:checked').val();
    //     var total=parseInt($('input#total_hidden').val());
    //     var  grand_total = total + parseInt(delivery_charge);
    //     $('span#grand_total_id').html('');
    //     $('span#grand_total_id').html(grand_total);
    //     $('input#grand_total_hidden').val(grand_total);
    //     $('input#delivery_charge_hidden').val(delivery_charge);
        // var total=parseInt($('input#hidden_total').val());
    
    
    // });


    
// navbar search....................................
 $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$('#search-bar-id').on('keyup',function(){

    var value =$(this).val();

    // alert(value);

    $.ajax({
        type: "GET",
        url:"/search",
        data:{'product_name':value},
        success: function (data) {
            $('.search_result').html(data);
        }
    });

});
// End navbar search....................................


$(document).on('click','.addToCartFromCateSearch',function (e) {
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    var prod_qty = $(this).closest('.product_data').find('.qty-input').val();

// alert(prod_id)
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
        method: "POST",
        url: "/add-to-cart-from-cate-search",
        data: {
            'product_id' : prod_id,
            'product_qty' : prod_qty,
        },
        success: function (response) {
            
             loadcart();
             
          if(response.warning){
                $('i.success-icon').hide();
                $('i.modal-warning-icon').show();
                $('.item-added-to-cart').html();
                $('.item-added-to-cart').html(response.warning);

        }
        // elseif(response.success){
        //     $('i.modal-warning-icon').hide();
        //     $('i.success-icon').show();
        //     $('.item-added-to-cart').html();
        //     $('.item-added-to-cart').html(response.success);
        // }
            
        }
    });
    
});

function loadcart(){
    $.ajax({
        method: "GET",
        url: "/load-cart-item",
        success: function (response){
            $('.cart-count').html('');
            $('.cart-count').html(response.count);
            // console.log(response.count);
            
        }
    });
}


// alert(prod_id)
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    // $('.delete-cartItem').click(function (e) { 
        $(document).on('click', '.delete-cartItem', function (e) {
            e.preventDefault();
    
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    
            $.ajax({
                method: "POST",
                url: "delete_cart_item",
                data: {
    
                "product_id":prod_id,
    
                },
                success: function (response) {
                loadcart();
                $('.cartDivReload').load(location.href + " .cartDivReload");
                swal("",response.status,"success");
                }
    
            });
            
        });






// Price Range..................................




// End of doc.....

});