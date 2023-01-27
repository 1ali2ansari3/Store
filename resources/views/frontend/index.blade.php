@extends('layouts.front')

@section('title','Welcome to NAMAPP')

@section('content')

<section class="welcome-area">

    <!-- Welcome Pattern -->
    <div class="welcome-pattern">
        <img src="img/core-img/welcome-pattern.png" alt="">
    </div>

    <!-- Welcome Slide -->
    <div style="margin-top:-5%;" class="welcome-slides owl-carousel">

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-9 col-lg-7">
                            <div class="welcome-text mb-50">
                                <h2 data-animation="fadeInLeftBig" data-delay="200ms" data-duration="1s">GI-Shop,</h2>
                                <h3 data-animation="fadeInLeftBig" data-delay="400ms" data-duration="1s">only if you want the best.</h3>
                                <p data-animation="fadeInLeftBig" data-delay="600ms" data-duration="1s">Best delivery and payment services</p>
                                <a href="#py-5" class="btn hami-btn btn-2" data-animation="fadeInLeftBig" data-delay="800ms" data-duration="1s">Shop Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Welcome Thumbnail -->
            <div class="welcome-thumbnail">

                <img src="img/bg-img/1.png" alt="">
            </div>
        </div>

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-9 col-lg-7">
                            <div class="welcome-text mb-50">
                                <h2 data-animation="fadeInUpBig" data-delay="200ms" data-duration="1s">The best products<br> provider </h2>
                                <h3 data-animation="fadeInUpBig" data-delay="400ms" data-duration="1s">starting at <s>75$</s> 40$/products</h3>
                                <p data-animation="fadeInUpBig" data-delay="600ms" data-duration="1s"></p>
                                <a href="#py-5" class="btn hami-btn btn-2" data-animation="fadeInUpBig" data-delay="800ms" data-duration="1s">Shop Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Welcome Thumbnail -->
            <div class="welcome-thumbnail">
                <img src="img/bg-img/2.png" alt="">
            </div>
        </div>

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-9 col-lg-7">
                            <div class="welcome-text mb-50">
                                <h2 data-animation="fadeInUpBig" data-delay="200ms" data-duration="1s">Make the most of </h2>
                                <h3 data-animation="fadeInUpBig" data-delay="400ms" data-duration="1s">our offers and</h3>
                                <p data-animation="fadeInUpBig" data-delay="600ms" data-duration="1s">discounts on trending products</p>
                                <a href="#py-5" class="btn hami-btn btn-2" data-animation="fadeInUpBig" data-delay="800ms" data-duration="1s">Shop Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Thumbnail -->
            <div class="welcome-thumbnail">
                <img src="img/bg-img/3.png" alt="">
            </div>
        </div>

    </div>

    <!-- Clouds -->
    <div class="clouds">
        <img style="margin-top:5%;" src="img/core-img/cloud-1.png" alt="" class="cloud-1">
        <img style="margin-top:5%;" src="img/core-img/cloud-2.png" alt="" class="cloud-2">
        <img style="margin-top:5%;" src="img/core-img/cloud-3.png" alt="" class="cloud-3">
        <img style="margin-top:5%;" src="img/core-img/cloud-4.png" alt="" class="cloud-4">
        <img style="margin-top:5%;" src="img/core-img/cloud-5.png" alt="" class="cloud-5">
    </div>
    </section>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel owl-theme">
                        @foreach ($featured_products as $prod)
                            <div class="item">
                                <a href="{{ url('categorys/'.$prod->category->slug.'/'.$prod->slug) }}">
                                <div class="card">
                                        <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" height="250px"alt="Product image">
                                        <div class="card-body">
                                            <h5>{{ $prod->name }}</h5>
                                            <span class="float-start">${{ $prod->selling_price }}</span>
                                            <span class="float-end"><s>${{ $prod->original_price }}</s></span>
                                        </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="py-5" class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                <div class="owl-carousel owl-theme">
                        @foreach ($trending_category as $tcategory)
                            <div class="item">
                                <a href="{{ url('categorys/'.$tcategory->slug) }}">
                                <div class="card">
                                        <img src="{{ asset('assets/uploads/categpry/'.$tcategory->image) }}" height="250px"alt="Product image">
                                        <div class="card-body">
                                            <h5>{{ $tcategory->name }}</h5>
                                           <p>
                                                {{ $tcategory->description }}
                                           </p>
                                        </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>




@endsection

@section('scripts')
        <script>
        $('.owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    dots:false,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:4
                        }
                    }
                })
        </script>

@endsection
