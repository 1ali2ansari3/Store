$(document).ready(function(){

    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadcart()
    {
        
        $.ajax({
            method: "GET",
            url:"/load-cart-data",
           
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
           
            }
        });

    }

    function loadwishlist()
    {
        
        $.ajax({
            method: "GET",
            url:"/load-wishlist-count",
           
            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
           
            }
        });

    }



   
});