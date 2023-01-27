@extends('layouts.front')

@section('title',$products->name)

@section('content')

<link rel="stylesheet" type="text/css" href="{{ url('RER/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('RER/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('RER/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('RER/css/flexslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('RER/css/chosen.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('RER/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('RER/css/color-01.css') }}">
<script src="{{ url('RER/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ url('RER/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ url('RER/js/bootstrap.min.js') }}"></script>
<script src="{{ url('RER/js/jquery.flexslider.js') }}"></script>
<script src="{{ url('RER/js/chosen.jquery.min.js') }}"></script>
<script src="{{ url('RER/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('RER/js/jquery.countdown.min.js') }}"></script>
<script src="{{ url('RER/js/jquery.sticky.js') }}"></script>
<script src="{{ url('RER/js/functions.js') }}"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('/add-rating') }}" method="post">
            @csrf
        <input type="hidden" name="product_id" value="{{ $products->id }}">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{ $products->name }} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                    @if($user_rating)
                        @for($i = 1 ; $i <= $user_rating->stars_rated ; $i++)
                            <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                            <label for="rating{{$i}}" class="fa fa-star"></label>
                        @endfor
                        @for($j = $user_rating->stars_rated+1 ; $j <= 5 ; $j++)
                            <input type="radio" value="{{$j}}" name="product_rating"  id="rating{{$j}}">
                            <label for="rating{{$j}}" class="fa fa-star"></label>
                        @endfor
                    @else
                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="product_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top" >
    <div class="container">
        <h6 class="mb-0">
        <a href="{{ url('categorys') }}">
            Collections
        </a>
        <a href="{{ url('categorys/'.$products->category->slug ) }}">
            /{{ $products->category->name }}
        </a>
        <a href="{{ url('categorys/'.$products->category->slug.'/'.$products->slug) }}">
            /{{ $products->name}}
        </a>
        </h6>
    </div>
</div>
<br><br><br><br><br>

<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area " style="margin-left:12%;">
    @if($products->trending == '1')
    <label style="font-size:16px; margin-right:-10%;" class="float-end badge bg-danger trending_tag">Trending</label>
@endif

    <div class="wrap-product-detail">
        <div class="detail-media" >
            <div class="product-gallery">
              <ul class="slides" >

                <li data-thumb="{{ asset('assets/uploads/products/'.$products->image)}}">
                    <center><img src="{{ asset('assets/uploads/products/'.$products->image)}}" alt="product thumbnail"   /></center>
                </li>
                <li data-thumb="{{ asset('assets/uploads/products/3'.$products->image)}}">
                    <center><img src="{{ asset('assets/uploads/products/3'.$products->image)}}" alt="product thumbnail" /></center>
                </li>

                <li data-thumb="{{ asset('assets/uploads/products/4'.$products->image)}}">
                    <center><img src="{{ asset('assets/uploads/products/4'.$products->image)}}" alt="product thumbnail" /></center>
                </li>

                <li data-thumb="{{ asset('assets/uploads/products/5'.$products->image)}}">
                    <center><img src="{{ asset('assets/uploads/products/5'.$products->image)}}" alt="product thumbnail" /></center>
                </li>

                <li data-thumb="{{ asset('assets/uploads/products/6'.$products->image)}}">
                    <center><img src="{{ asset('assets/uploads/products/6'.$products->image)}}" alt="product thumbnail" /></center>
                </li>




              </ul>
            </div>
        </div>
    </div>
        <div  style="margin-left:60%;" class="detail-info">
            @php $ratenum = number_format($rating_value) @endphp
            <div class="rating">
               @for($i = 1 ; $i <= $ratenum ; $i++)
                   <i class="fa fa-star checked"></i>
               @endfor
               @for($j = $ratenum+1 ; $j <= 5 ; $j++)
                   <i class="fa fa-star"></i>
               @endfor
              <span>
                   @if($ratings->count() > 0)
                       {{ $ratings->count() }} Ratings
                   @else
                       No Ratings
                   @endif

               </span>
            </div>
<BR><BR><BR>

            <h2   class="product-name">{{$products->name}}</h2>
            <hr>
            <br><br>
            <div  class="wrap-price"><b><span style="font-size:160%;" class="product-price">${{ $products->original_price}} </span></b></div>
            @if($products->qty > 0)
                            <label for="" class="badge bg-success">In stock</label>
                    @else
                            <label for="" class="badge bg-danger">Out of stock</label>
                    @endif
                    <br><br><br>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <b><label for="Quantity">Quantity</label></b><br>
                                    <form action="{{ url('by-now') }}" method="POST">
                                        @csrf
                                                <div class="input-group text-center mb-2">
                                                    <button class="input-group-text decriment-btn">-</button>
                                                    <input type="text" name="quantity" value="1" class="form-control qty-input"/>
                                                    <button class="input-group-text increment-btn">+</button>
                                                    <input type="hidden" name="name" value="{{ $products->name }}" />
                                                    <input type="hidden" name="prix" value="{{ $products->selling_price }}" />
                                                    <input type="hidden" name="id" value="{{ $products->id }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-20">
                                            @if($products->qty > 0)
                                            <br>
                                            <button  type="submit" class="btn btn-outline-success ByNow "  style="width:70%; margin-left:55%; margin-top:-65%;"> By now </button>
                                            <br>   <br>
                                            <button class="btn btn-primary me-3 addToCartBtn float-start" style="width:70%; margin-left:55%;  margin-top:-30%;"> Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                            @endif
                                            <br><br><br>
                                            <button  class="btn btn-success me-3 addToWishlist float-start"  style="width:70%; margin-left:55%;  margin-top:-30%;"> Add to Wishlist <i class="fa fa-heart"></i></button>
                                            </div>
                                    </form>
                    </div>
                </div>


                <div class="col-md-12">
                    <br><br><br><br>
                    <hr>
                    <h2>Description</h2>
                    <p class="mt-3">
                    {!!  $products->description  !!}
                    </p>
                </div>
                <hr>


            <div class="row">
                <div class="col-md-10">
                    <button type="button"  class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this product
                    </button>
                    <a class="btn btn-primary me-3" href="{{ url('add-review/'.$products->slug.'/userreview') }}" class="btn btn-link">
                        Write a review
                    </a>
                </div>
                <div style="margin-left:50%;" class="col-md-8">
                    @foreach ($reviews as $item)
                        <div class="user-review">
                            <label for="">{{ $item->user->name.''.$item->user->lname}}</label>
                            @if($item->user_id == Auth::id())
                                <a class="btn btn-primary" style="margin-left:70%; height:15px; " href="{{ url('edit-review/'.$products->slug.'/userreview') }}">edit</a>
                            @endif
                            <br>
                            @php

                            $rating = App\Models\Rating::where('prod_id',$products->id)->where('user_id', $item->user->id)->first();

                            @endphp
                            @if($rating)
                                @php $user_rated = $rating->stars_rated @endphp
                                @for($i = 1 ; $i <= $ratenum ; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $ratenum+1 ; $j <= 5 ; $j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{ $item->user_review }}
                            </p>
                        </div>
                    @endforeach
                </div>


            </div>


        </div>



    </div>
</div>

@endsection

@section('scripts')




    <script>
        $(document).ready(function(){

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

            $('.addToCartBtn').click(function (e){
            e.preventDefault();

            var product_id = $('.prod_id').val();
            var product_qty = $('.qty-input').val();

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
                   // window.location.reload();
                    loadcart();
                    swal(response.status);

                }
            });
            });




            $('.addToWishlist').click(function (e){
            e.preventDefault();

            var product_id = $('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url:"/add-to-wishlist",
                data:{
                    'product_id' : product_id,
                },
                success: function (response) {
                   //window.location.reload();
                    loadwishlist();
                    swal(response.status);

                }
            });


            });



            $(document).on('click','.increment-btn', function (e) {

                e.preventDefault();

                var inc_value = $('.qty-input').val();

                var value = isNaN(inc_value) ? 0 : inc_value;
                if(value < 10){
                    value++;
                    $('.qty-input').val(value);
                }
                });

            //$('.decriment-btn').click(function (e){
            $(document).on('click','.decriment-btn', function (e) {

                e.preventDefault();

                var dec_value = $('.qty-input').val();
                var value = isNaN(dec_value) ? 0 : dec_value;
                if(value > 1){
                    value--;
                    $('.qty-input').val(value);
                }
                });

                $(document).on('click','.quantity', function (e) {

                    e.preventDefault();

                    var prod_id = $('.prod_id').val();
                    var qty = $('.qty-input').val();
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
