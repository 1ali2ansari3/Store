@extends('layouts.front')

@section('title','My Wishlist')

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top" >
    <div class="container">
        <h6 class="mb-0">
        <a href="{{ url('/') }}">
            Home
        </a>  /      
        <a href="{{ url('wishlist') }}">
           Wishlist
        </a>  
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow wishitems">
        <div class="card-body">
            @if($wishlist->count() > 0)
    
                 @foreach($wishlist as $item)
    
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products->image) }}" alt="" height="70px" width="70px">
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>{{$item->products->name}}</h6>
                    </div>
                    <div class="col-md-2  my-auto">
                        <h6>Rs {{$item->products->selling_price}}</h6>
                    </div>
                    
                    <div class="col-md-2 my-auto">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        @if( $item->products->qty >= $item->prod_qty )
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                            <button class="input-group-text decriment-btn">-</button> 
                            <input type="text" name="changeQuantity" value="1" class="form-control qty-input"/>
                            <button class="input-group-text increment-btn">+</button> 
                        </div>
                        @else
                           <h6>Out of stock</h6>
                        @endif
    
                    </div>
                    <div class="col-md-2 my-auto">
    
                        <button class="btn btn-primary addToCartBtn"><i class="fa fa-shopping-cart"></i>  Add to Cart</button>
                                
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i>  Remove</button>
                    </div>
    
    
                </div>
                 @endforeach
            </div>
    
           
            @else
                <h4>There are no products in your Wishlist</h4>
            @endif
        </div>
    </div>
</div>

@endsection





@section('scripts')
    <script>
        $(document).ready(function(){

            function loadcart()
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    method: "GET",
                    url:"/load-cart-data",
                
                    success: function (response) {
                        $('.cart-count').html('');
                        $('.cart-count').html(response.count);
                
                    }
                });

            }

            $('.addToCartBtn').click(function (e){
            e.preventDefault();
            
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url:"/add-to-cart",
                data:{
                    'product_id' : product_id,
                    'product_qty': product_qty,
                },
                success: function (response) {
                    swal(response.status);
                    loadcart();
                }
            });
         

            });
            




            $('.delete-cart-item').click(function (e){
                e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data:{
                    'prod_id' : prod_id,
                },
                success: function (response) {
                    window.location.reload();
                    swal("",response.status,"success");
                }
            });
             
            
            });
           

            
            //$('.remove-wishlist-item').click(function (e){
            $(document).on('click','.remove-wishlist-item', function (e) {
                e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "delete-wishlist-item",
                data:{
                    'prod_id' : prod_id,
                },
                success: function (response) {
                    //window.location.reload();
                    $('.wishitems').load(location.reload(true) + " .wishitems");
                    swal("",response.status,"success");
                }
            });
             
            
            });


             //$('.increment-btn').click(function (e){
                $(document).on('click','.increment-btn', function (e) {

                    e.preventDefault();

                    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(inc_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value < 10){
                        value++;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                    }
                    });
                    //$('.decriment-btn').click(function (e){
                    $(document).on('click','.decriment-btn', function (e) {

                    e.preventDefault();

                    var dec_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(dec_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value > 1){
                        value--;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                    }
});








//$('.changeQuantity').click(function (e){
        $(document).on('click','.changeQuantity', function (e) {

            e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "update-cart",
            data:{
                'prod_id' : prod_id,
                'prod_qty' : qty,
            },
            success: function (response) {
                $('.cartitems').load(location.reload(true) + " .cartitems");
            // window.location.reload();
            }
        });


        });



 });


        
    </script>
@endsection