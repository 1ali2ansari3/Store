<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="description" content="We are owner IPTV server | Provide IPTV and IPTV Reseller Panel | We have more than 12,000 channels and more Than 10,000 VOD and series.1 Month €15 | 3 Month €25 | 3 Month €45 | 12 Month €75">
    <meta name="keywords" content="iptv, iptv reseller, iptv, become  reseller, meniptv, channels, iptv channels, iptv subscribe, iptv subscription, german iptv, uk iptv, sky sports, bein sports, bein movie, supersport, free iptv, iptv trial, iptv free trial, iptv local, local channel, local restream, local stream, Romanian iptv channels, romanian iptv, iptvbox, magiptv, mag 256, iptv apk, iptv for android, iptv for ios, sky bundesliga, sky italy, sky uk, bt sports, albanian iptv, usa iptv, canada iptv, laliga iptv, netherland iptv, greece iptv, greek iptv, ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="home.html"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
          @yield('title')
    </title>

    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href=" {{ url('frontend/css/custom.css') }} "  rel="stylesheet" />

  <link  href=" {{ url('frontend/css/owl.carousel.min.css') }} "  rel="stylesheet" />
  <link  href=" {{ url('frontend/css/owl.theme.default.min.css') }} "  rel="stylesheet" />
  <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">

<!-- Font google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


<!-- Favicon -->
<link rel="icon" href="{{ url('img/FAOO.png') }}">

<!-- Stylesheet -->
<link rel="stylesheet" href="{{ url('style.css') }}">

</head>

    <!-- Preloader -->
    <!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- /Preloader -->
    <!-- Header Area Start -->

<body class="g-sidenav-show  bg-gray-200">
<header class="header-area" >
        <!-- Top Header Area Start -->

        <div class="main-header-area" >
            <div class="classy-nav-container breakpoint-off" >
                <div class="container" >
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="hamiNav" style="height:80px;">

                        <!-- Logo -->
                        <a class="nav-brand" href="{{url('/')}}"><img style="height:250px; width:250px; " src="{{ url('img/FAOO.png') }}" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="{{Request::is('/') ? 'active':''}}"><a class="nav-link " aria-current="page" href="{{ url('/') }}"><b>Home</b></a></li>
                                    <li class="{{Request::is('categorys') ? 'active':''}}"> <a class="nav-link"  href="{{ url('categorys') }}"><b>Category</b></a></li>
                                    <li class="{{Request::is('cart') ? 'active':''}}"> <a class="nav-link"  href="{{ url('cart') }}"><b>Cart</b>
                <span class="badge badge-pill bg-primary cart-count">0</span>
              </a></li>
                                    <li class="{{Request::is('wishlist') ? 'active':''}}"><a class="nav-link"  href="{{ url('wishlist') }}"><b>Wishlist</b>
                <span class="badge badge-pill bg-success wishlist-count">0</span>
              </a></li>

              @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}"><b>{{ __('Register') }}</b></a>
                  </li>
              @endif
          @else
          <li >
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->Username }}  <i class="fas fa-user fa-fw"></i></a>

              <ul class="dropdown-menu">
                  <li><a style="color:black;" class="dropdown-item" href="{{ url('my-orders') }}">My Orders</a></li><br><br>
                  <li><a style="color:black;" class="dropdown-item" href="#">My Profile</a></li><br><br>
                  <li><a style="color:black;" class="dropdown-item"  href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Logout') }}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form></li><br><br>
              </ul>
          </li>

          @endguest

                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


<!-- Welcome Area End -->

<!-- Price Plan Area Start -->

<!-- Price Plan Area End -->




    <div class="content">

                @yield('content')

    </div>



  <!--   Core JS Files   -->
  <script src=" {{ url('admin/js/popper.min.js')}} "></script>
  <script src=" {{ url('frontend/js/jquery-3.6.1.min.js') }} "></script>
  <script src=" {{ url('frontend/js/owl.carousel.min.js') }} "></script>
  <script src=" {{ url('frontend/js/custom.js') }} "></script>
  <script src=" {{ url('frontend/js/checkout.js') }} "></script>
  <script src="{{ url('frontend/js/jquery.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ url('js/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <!-- All Plugins -->
    <script src="{{ url('js/hami.bundle.js') }}"></script>
    <!-- Faq -->
    <script src="{{ url('js/faq.tree.js') }}"></script>
    <!-- Active -->
    <script src="{{ url('js/default-assets/active.js') }}"></script>
  <!--Start of Tawk.to Script-->

  <!--End of Tawk.to Script-->

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script type="text/javascript" charset="UTF-8" src="../chs03.cookie-script.com/s/ee4d1f3f84eb09c7a0e378ef218e103d.js"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="admin/js/material-dashboard.min.js?v=3.0.4"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->

  <script>

   var availableTags = [];

    $.ajax({
        method: "GET",
        url: "/product-list",
        success: function (response){
          startAutoComplete(response);
        }
    });



    function startAutoComplete(availableTags)
    {
        $( "#search_product").autocomplete({
            source: availableTags
        });
    }

    </script>


  @if(session('status'))
    <script>
          swal("{{ session('status') }}");
    </script>
  @endif
  @yield('scripts')

</body>
</html>





