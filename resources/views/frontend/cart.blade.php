@extends('layouts.front')

@section('title','My Cart')

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top" >
    <div class="container">
        <h6 class="mb-0">
        <a href="{{ url('/') }}">
            Home
        </a>  /
        <a href="{{ url('cart') }}">
           Cart
        </a>

        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow cartitems">
    @if($cartitems->count()>0)
        <div class="card-body">
            @php  $total = 0; @endphp

             @foreach($cartitems as $item)

            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image) }}" alt="" height="70px" width="70px">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{$item->products->name}}</h6>
                </div>
                <div class="col-md-2  my-auto">
                    <h6>$ {{$item->products->selling_price}}</h6>
                </div>

                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if( $item->products->qty >= $item->prod_qty )
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text changeQuantity decriment-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                        <button class="input-group-text changeQuantity  increment-btn">+</button>
                    </div>
                    @php  $total += $item->products->selling_price * $item->prod_qty  @endphp
                    @else
                       <h6>Out of stock</h6>
                    @endif

                </div>
                <div class="col-md-2">

                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i>  Remove</button>

                </div>


            </div>
             @endforeach
        </div>

        <div class="card-footer">
                <h6>Total Prise : $ {{$total}}

                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">By Shopping</a>
            </h6>
        </div>
    @else
        <div class="card-body text-center">

                <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
                <a href="{{ url('categorys') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>

        </div>
    @endif

    </div>
</div>

@endsection



@section('scripts')
    <script>
        $(document).ready(function(){
            loadcart();

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




           // $('.delete-cart-item').click(function (e){
            $(document).on('click','.delete-cart-item', function (e) {
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
                    //window.location.reload();
                    loadcart();
                    $('.cartitems').load(location.reload(true) + " .cartitems");
                    swal("",response.status,"success");
                }
            });


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
