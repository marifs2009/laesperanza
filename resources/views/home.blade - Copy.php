<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Home - Andtourtravel </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.all.min.css')}}" />
    <link rel="stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <!-- navber css -->
    <link rel="stylesheet" href="{{asset('assets/css/navber.css')}}" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet">
    <style type="text/css">
        .main-navbar {
            padding: 0px;
        }
        @media (min-width: 1200px) {
            .container, .container-lg, .container-md, .container-sm, .container-xl {
                max-width: 100%;
            }
        }
        .topbar-list li a, .main-navbar .navbar .navbar-nav .nav-item a, 
        .topbar-list li i, .topbar-others-options li a { color: #111;}
        .btn_navber:before {background:#1CA8CB;margin-right:20px;}
        .btn_navber {margin-right:20px; border: 2px solid #1CA8CB;
        .navbar-area.is-sticky {background: #fff!important;}
    </style>
    <style>
        .plugins{ text-align: center;}
        .swiper-wrapper, .swiper-slide { width: 140px!important; height: auto;}
        .carousel-gallery {margin: 0; padding: 0;}
        .swiper-slide img {margin:auto 0;width:100%;height: auto;}
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:300,400,700,900");
        .caption {
          position: absolute;
          top: 35%;
          left: 3rem;
          z-index: 9;
          transform: translateY(-50%);
          opacity: 0;
          transition: 500ms ease opacity, 500ms ease transform;
          transform: translateY(60px);
          max-width:55%;
        }
        .caption.current-caption {
          transition-delay: 1000ms;
          opacity: 1;
          transform: translateY(0);
        }
        .caption.previous-caption {
          transform: translateY(-60px);
        }
        .caption .caption-heading {
          transition: 500ms ease-in all;
        }
        .caption .caption-heading h1 {
          margin-bottom: 1.5rem;
          font-family: "Montez", serif;
          font-weight: 400;
          font-style: normal;
          font-size:40px;line-height:50px;color:white;
        }
        .caption .caption-subhead {
            margin-bottom: 2.5rem;
            display: block;
            color: white;
            font-size: 75px;
            line-height: 90px;
            font-weight: 600;
            font-family: "Manrope", sans-serif;
            position: relative;
            margin-top:-0.8rem;
            margin-bottom:45px
        }

        @media (max-width: 480px){.caption .caption-subhead{font-size:30px;line-height:30px}}

        @media (max-width: 375px){.caption .caption-subhead{font-size:25px;line-height:25px}}
        .caption a.btn {
          color: #333;
          font-size: 0.8rem;
          text-decoration: none;
          background-color: white;
          padding: 0.5rem 1rem;
          text-transform: uppercase;
          letter-spacing: 0.2rem;
          position: relative;
          z-index: 9;
          transition: 250ms ease-in background-color, 500ms ease-in color;
        }
        .caption a.btn:hover {
          background-color: black;
          color: white;
        }
        .left-col,
        .right-col {
          width: 100%;
          box-sizing: border-box;
          min-height: 800px;
          overflow: hidden;
        }

        .left-col {
          background-size: cover;
          background-postion: center top;
          overflow: hidden;
          /*margin: 2rem;*/
          position: relative;
        }
        .left-col .slide {
          position: absolute;
          width: 100%;
          height: 100%;
          background-position: left top !important;
          background-size: cover !important;
          background-repeat: no-repeat;
          opacity: 0;
          transition: 1000ms cubic-bezier(1, 0.04, 0.355, 1) transform, 1000ms cubic-bezier(0.68, -0.55, 0.265, 1.55) clip-path;
          transform: translateY(-100%);
          scale: 1;
          z-index: -1;
        }
        .left-col .slide.previous {
          z-index: 1;
          opacity: 1;
          transform: translateY(0);
          animation-delay: 1s;
          clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
          transition: 3s ease transform;
          will-change: transform;
        }
        .left-col .slide.previous.change { transform: translateY(50%);}
        .left-col .slide.next { transform: translateY(-100%); z-index: 3; opacity: 1; clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%);}
        .left-col .slide.current { opacity: 1; transform: translateY(0) scale(1.25); z-index: 2; clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);}
        .right-col {  display: flex;  align-items: center;  justify-content: center;}

        .right-col .preview {  max-width: 400px;}
        #my_home_one_banner { min-height: 800px; }
        #my_home_one_banner .nav {  display: block;  position: absolute;  top: 0;  left: 0;  width: 100%;
          height: 100%;  z-index: 6;  overflow: hidden;}
        #my_home_one_banner .nav a {color: #fafafa; font-size: 3rem; text-shadow:1px 1px 4px rgba(0,0,0,0.4);}
        #my_home_one_banner .nav:hover .slide-up,
        #my_home_one_banner .nav:hover .slide-down {opacity: 0.5; transform: translateX(0);}
        #my_home_one_banner .nav .slide-up, #my_home_one_banner .nav .slide-down {  display: block;  position: absolute;  text-align: center;  padding: 1rem;  opacity: 0;  transition: 0.5s ease opacity, 0.5s ease transform;  z-index: 99;}
        #my_home_one_banner .nav .slide-up:hover, #my_home_one_banner .nav .slide-down:hover { opacity:1;}
        #my_home_one_banner .nav .slide-up a,#my_home_one_banner .nav .slide-down a {  text-decoration: none;  font-weight: 300 !important;}
        #my_home_one_banner .nav .slide-up {  top: 50%;  left: 0;  transform: translateX(-100%);}
        #my_home_one_banner .nav .slide-down {  top: 50%;  right: 0;  transform: translateX(100%);}
        #theme_search_form { margin-top: -80px;}
    </style>
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/2.1.99/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
</head>
<body>
    <!-- preloader Area -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Area -->
    <header class="main_header_arae" style="background-color: white!important;">
        <!-- Top Bar -->
        <div class="topbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-list">
                            <li>
                                <a href="#!"><i class="fab fa-facebook"></i></a>
                                <a href="#!"><i class="fab fa-twitter-square"></i></a>
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                                <a href="#!"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li><a href="tel:+911244381042"><span>{{$businessContact}}</span></a></li>
                            <li><a href="mailto:{{$businessEmail}}"><span>{{$businessEmail}}</span></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-others-options">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Sign up</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Bar -->
        <div class="navbar-area" style="border-top: 1px solid #ddd;">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="{{route('/')}}">
                                <img src="{{ asset('storage/'.$logo) }}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container" style="padding:0px;">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{route('/')}}">
                            <img src="{{ asset('storage/'.$logo) }}" alt="logo" style="max-width: 100%;height: 80px;">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            {!! $primary_menu !!}
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    
                                    <!--Carousel Gallery-->
                                    <div class="carousel-gallery">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="assets/img/partner/BaliExperts.png" alt="logo">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/img/partner/malaysia-truly.png" alt="logo">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/img/partner/Tanzania.png" alt="logo">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/img/partner/turelyasia.png" alt="logo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Carousel Gallery-->
                                </div>
                                <div class="option-item">
                                    <a href="#" class="search-box">
                                        <i class="fas fa-search" style="color:#1CA8CB"></i>
                                    </a>
                                </div>
                                <div class="option-item">
                                    <a href="#" class="btn btn_navber">Become a partner</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one" style="background: black;"></div>
                            <div class="circle circle-two" style="background: black;"></div>
                            <div class="circle circle-three" style="background: black;"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="#" class="search-box"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Banner Area -->
    <section id="my_home_one_banner" style="">
        <div class="container" id="container" style="margin: 0px;padding: 0px;height: 100vh;">
            <div class="caption" id="slider-caption">
                <div class="caption-heading">
                    <h1></h1>
                </div>
                <div class="caption-subhead">
                    <span></span>
                </div>
                <a class="btn btn-primary" href="#"></a>
            </div>
            <div class="left-col" id="left-col">
                <div id="left-slider"></div>
            </div>
            <ul class="nav">
                <li class="slide-up">
                    <a href="#"><</a>
                </li>
                <li class="slide-down">
                    <a id="down_button" href="#">></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- search -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Area -->
    <section id="theme_search_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme_search_form_area">
                        <div class="theme_search_form_tabbtn">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="flights-tab" data-bs-toggle="tab"
                                        data-bs-target="#flights" type="button" role="tab" aria-controls="flights"
                                        aria-selected="true"><i class="fas fa-plane-departure"></i>Flights</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tours-tab" data-bs-toggle="tab" data-bs-target="#tours"
                                        type="button" role="tab" aria-controls="tours" aria-selected="false"><i
                                            class="fas fa-globe"></i>Tours</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="hotels-tab" data-bs-toggle="tab"
                                        data-bs-target="#hotels" type="button" role="tab" aria-controls="hotels"
                                        aria-selected="false"><i class="fas fa-hotel"></i>Hotels</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="visa-tab" data-bs-toggle="tab"
                                        data-bs-target="#visa-application" type="button" role="tab" aria-controls="visa"
                                        aria-selected="false"><i class="fas fa-passport"></i> Trvel Deals</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="bus-tab" data-bs-toggle="tab"
                                        data-bs-target="#bus" type="button" role="tab" aria-controls="bus"
                                        aria-selected="false"><i class="fas fa-bus"></i> Bus</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="cruise-tab" data-bs-toggle="tab"
                                        data-bs-target="#cruise" type="button" role="tab" aria-controls="cruise"
                                        aria-selected="false"><i class="fas fa-ship"></i> Cruise</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="flights" role="tabpanel"
                                aria-labelledby="flights-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="flight_categories_search">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="oneway-tab" data-bs-toggle="tab"
                                                        data-bs-target="#oneway_flight" type="button" role="tab"
                                                        aria-controls="oneway_flight" aria-selected="true">One
                                                        Way</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="roundtrip-tab" data-bs-toggle="tab"
                                                        data-bs-target="#roundtrip" type="button" role="tab"
                                                        aria-controls="roundtrip"
                                                        aria-selected="false">Roundtrip</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="multi_city-tab" data-bs-toggle="tab"
                                                        data-bs-target="#multi_city" type="button" role="tab"
                                                        aria-controls="multi_city" aria-selected="false">Multi
                                                        city</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade show active" id="oneway_flight" role="tabpanel"
                                        aria-labelledby="oneway-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="oneway_search_form">
                                                    <form action="#!">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed">
                                                                    <p>From</p>
                                                                    <input type="text" value="New York">
                                                                    <span>JFK - John F. Kennedy International...</span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-departure"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed">
                                                                    <p>To</p>
                                                                    <input type="text" value="London ">
                                                                    <span>LCY, London city airport </span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>
                                                                    <div class="range_plan">
                                                                        <i class="fas fa-exchange-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4  col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Journey date</p>
                                                                            <input type="date" value="2022-05-05">
                                                                            <span>Thursday</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                <div
                                                                    class="flight_Search_boxed dropdown_passenger_area">
                                                                    <p>Passenger, Class </p>
                                                                    <div class="dropdown">
                                                                        <button class="dropdown-toggle final-count"
                                                                            data-toggle="dropdown" type="button"
                                                                            id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            0 Passenger
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown_passenger_info"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <div class="traveller-calulate-persons">
                                                                                <div class="passengers">
                                                                                    <h6>Passengers</h6>
                                                                                    <div class="passengers-types">
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count pcount">2</span>
                                                                                                <div class="type-label">
                                                                                                    <p>Adult</p>
                                                                                                    <span>12+
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                    class="btn-add">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count ccount">0</span>
                                                                                                <div class="type-label">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0">
                                                                                                        Children
                                                                                                    </p><span>2
                                                                                                        - Less than 12
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                    class="btn-add-c">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-c">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count incount">0</span>
                                                                                                <div class="type-label">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0">
                                                                                                        Infant
                                                                                                    </p><span>Less
                                                                                                        than 2
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                    class="btn-add-in">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-in">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cabin-selection">
                                                                                    <h6>Cabin Class</h6>
                                                                                    <div class="cabin-list">
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="muiButton-label">Economy
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn active">
                                                                                            <span
                                                                                                class="muiButton-label">
                                                                                                Business
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="MuiButton-label">First
                                                                                                Class </span>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <span>Business</span>
                                                                </div>
                                                            </div>
                                                            <div class="top_form_search_button">
                                                                <button class="btn btn_theme btn_md">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="roundtrip" role="tabpanel"
                                        aria-labelledby="roundtrip-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="oneway_search_form">
                                                    <form action="#!">
                                                        <div class="row">
                                                            <div class="col-lg-3  col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed">
                                                                    <p>From</p>
                                                                    <input type="text" value="New York">
                                                                    <span>JFK - John F. Kennedy International...</span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-departure"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3  col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed">
                                                                    <p>To</p>
                                                                    <input type="text" value="London ">
                                                                    <span>LCY, London city airport </span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>
                                                                    <div class="range_plan">
                                                                        <i class="fas fa-exchange-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4  col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Journey date</p>
                                                                            <input type="date" value="2022-05-05">
                                                                            <span>Thursday</span>
                                                                        </div>
                                                                        <div class="Journey_date">
                                                                            <p>Return date</p>
                                                                            <input type="date" value="2022-05-08">
                                                                            <span>Saturday</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                <div
                                                                    class="flight_Search_boxed dropdown_passenger_area">
                                                                    <p>Passenger, Class </p>
                                                                    <div class="dropdown">
                                                                        <button class="dropdown-toggle final-count"
                                                                            data-toggle="dropdown" type="button"
                                                                            id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            0 Passenger
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown_passenger_info"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <div class="traveller-calulate-persons">
                                                                                <div class="passengers">
                                                                                    <h6>Passengers</h6>
                                                                                    <div class="passengers-types">
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count pcount">2</span>
                                                                                                <div class="type-label">
                                                                                                    <p>Adult</p>
                                                                                                    <span>12+
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                    class="btn-add">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count ccount">0</span>
                                                                                                <div class="type-label">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0">
                                                                                                        Children
                                                                                                    </p><span>2
                                                                                                        - Less than 12
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                    class="btn-add-c">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-c">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count incount">0</span>
                                                                                                <div class="type-label">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0">
                                                                                                        Infant
                                                                                                    </p><span>Less
                                                                                                        than 2
                                                                                                        yrs</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                    class="btn-add-in">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-in">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cabin-selection">
                                                                                    <h6>Cabin Class</h6>
                                                                                    <div class="cabin-list">
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="muiButton-label">Economy
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn active">
                                                                                            <span
                                                                                                class="muiButton-label">
                                                                                                Business
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="MuiButton-label">First
                                                                                                Class </span>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <span>Business</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top_form_search_button">
                                                            <button class="btn btn_theme btn_md">Search</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="multi_city" role="tabpanel"
                                        aria-labelledby="multi_city-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="oneway_search_form">
                                                    <form action="#!">
                                                        <div class="multi_city_form_wrapper">
                                                            <div class="multi_city_form">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed">
                                                                            <p>From</p>
                                                                            <input type="text" value="New York">
                                                                            <span>DAC, Hazrat Shahajalal
                                                                                International...</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed">
                                                                            <p>To</p>
                                                                            <input type="text" value="London ">
                                                                            <span>LCY, London city airport </span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                            </div>
                                                                            <div class="range_plan">
                                                                                <i class="fas fa-exchange-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="form_search_date">
                                                                            <div
                                                                                class="flight_Search_boxed date_flex_area">
                                                                                <div class="Journey_date">
                                                                                    <p>Journey date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-05">
                                                                                    <span>Thursday</span>
                                                                                </div>
                                                                                <div class="Journey_date">
                                                                                    <p>Return date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-10">
                                                                                    <span>Saturday</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                        <div
                                                                            class="flight_Search_boxed dropdown_passenger_area">
                                                                            <p>Passenger, Class </p>
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="dropdown-toggle final-count"
                                                                                    data-toggle="dropdown" type="button"
                                                                                    id="dropdownMenuButton1"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    0 Passenger
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                    <div
                                                                                        class="traveller-calulate-persons">
                                                                                        <div class="passengers">
                                                                                            <h6>Passengers</h6>
                                                                                            <div
                                                                                                class="passengers-types">
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count pcount">2</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p>Adult</p>
                                                                                                            <span>12+
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count ccount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Children
                                                                                                            </p><span>2
                                                                                                                - Less
                                                                                                                than 12
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-c">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-c">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count incount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Infant
                                                                                                            </p><span>Less
                                                                                                                than 2
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-in">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-in">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cabin-selection">
                                                                                            <h6>Cabin Class</h6>
                                                                                            <div class="cabin-list">
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="muiButton-label">Economy
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn active">
                                                                                                    <span
                                                                                                        class="muiButton-label">
                                                                                                        Business
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="MuiButton-label">First
                                                                                                        Class </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span>Business</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="multi_city_form">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed">
                                                                            <p>From</p>
                                                                            <input type="text" value="New York">
                                                                            <span>DAC, Hazrat Shahajalal
                                                                                International...</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed">
                                                                            <p>To</p>
                                                                            <input type="text" value="London ">
                                                                            <span>LCY, London city airport </span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                            </div>
                                                                            <div class="range_plan">
                                                                                <i class="fas fa-exchange-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="form_search_date">
                                                                            <div
                                                                                class="flight_Search_boxed date_flex_area">
                                                                                <div class="Journey_date">
                                                                                    <p>Journey date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-05">
                                                                                    <span>Thursday</span>
                                                                                </div>
                                                                                <div class="Journey_date">
                                                                                    <p>Return date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-12">
                                                                                    <span>Saturday</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                        <div
                                                                            class="flight_Search_boxed dropdown_passenger_area">
                                                                            <p>Passenger, Class </p>
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="dropdown-toggle final-count"
                                                                                    data-toggle="dropdown" type="button"
                                                                                    id="dropdownMenuButton1"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    0 Passenger
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                    <div
                                                                                        class="traveller-calulate-persons">
                                                                                        <div class="passengers">
                                                                                            <h6>Passengers</h6>
                                                                                            <div
                                                                                                class="passengers-types">
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count pcount">2</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p>Adult</p>
                                                                                                            <span>12+
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count ccount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Children
                                                                                                            </p><span>2
                                                                                                                - Less
                                                                                                                than 12
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-c">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-c">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count incount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Infant
                                                                                                            </p><span>Less
                                                                                                                than 2
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-in">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-in">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cabin-selection">
                                                                                            <h6>Cabin Class</h6>
                                                                                            <div class="cabin-list">
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="muiButton-label">Economy
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn active">
                                                                                                    <span
                                                                                                        class="muiButton-label">
                                                                                                        Business
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="MuiButton-label">First
                                                                                                        Class </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span>Business</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="add_multy_form">
                                                                    <button type="button" id="addMulticityRow">+ Add
                                                                        another
                                                                        flight</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top_form_search_button">
                                                            <button class="btn btn_theme btn_md">Search</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tours" role="tabpanel" aria-labelledby="tours-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Journey date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Return date</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Passenger, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Passenger
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Passengers</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count pcount">2</span>
                                                                                        <div class="type-label">
                                                                                            <p>Adult</p>
                                                                                            <span>12+
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count ccount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Children
                                                                                            </p><span>2
                                                                                                - Less than 12
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Infant
                                                                                            </p><span>Less
                                                                                                than 2
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-in">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-in">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cabin-selection">
                                                                            <h6>Cabin Class</h6>
                                                                            <div class="cabin-list">
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span
                                                                                        class="muiButton-label">Economy
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn active">
                                                                                    <span class="muiButton-label">
                                                                                        Business
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="MuiButton-label">First
                                                                                        Class </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span>Business</span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hotels" role="tabpanel" aria-labelledby="hotels-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Journey date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Return date</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Passenger, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Passenger
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Passengers</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count pcount">2</span>
                                                                                        <div class="type-label">
                                                                                            <p>Adult</p>
                                                                                            <span>12+
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count ccount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Children
                                                                                            </p><span>2
                                                                                                - Less than 12
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Infant
                                                                                            </p><span>Less
                                                                                                than 2
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-in">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-in">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cabin-selection">
                                                                            <h6>Cabin Class</h6>
                                                                            <div class="cabin-list">
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span
                                                                                        class="muiButton-label">Economy
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn active">
                                                                                    <span class="muiButton-label">
                                                                                        Business
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="MuiButton-label">First
                                                                                        Class </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span>Business</span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="visa-application" role="tabpanel" aria-labelledby="visa-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Select country</p>
                                                            <input type="text" value="United states">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Your nationality</p>
                                                            <input type="text" value="Bangladesh">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Entry date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Exit date</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Traveller, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Traveller
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Traveller</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count pcount">2</span>
                                                                                        <div class="type-label">
                                                                                            <p>Adult</p>
                                                                                            <span>12+
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count ccount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Children
                                                                                            </p><span>2
                                                                                                - Less than 12
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Infant
                                                                                            </p><span>Less
                                                                                                than 2
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-in">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-in">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span>Business</span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="tab-pane fade" id="apartments" role="tabpanel" aria-labelledby="apartments-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Journey date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Return date</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Passenger, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Traveler
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Passengers</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count pcount">2</span>
                                                                                        <div class="type-label">
                                                                                            <p>Adult</p>
                                                                                            <span>12+
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count ccount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Children
                                                                                            </p><span>2
                                                                                                - Less than 12
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Infant
                                                                                            </p><span>Less
                                                                                                than 2
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-in">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-in">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cabin-selection">
                                                                            <h6>Cabin Class</h6>
                                                                            <div class="cabin-list">
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span
                                                                                        class="muiButton-label">Economy
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn active">
                                                                                    <span class="muiButton-label">
                                                                                        Business
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="MuiButton-label">First
                                                                                        Class </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span>Business</span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="tab-pane fade" id="bus" role="tabpanel" aria-labelledby="bus-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="oneway_search_form">
                                                            <form action="#!">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed">
                                                                            <p>From</p>
                                                                            <input type="text" value="Dhaka">
                                                                            <span>Bus Trtminal</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed">
                                                                            <p>To</p>
                                                                            <input type="text" value="Cox’s Bazar ">
                                                                            <span>Bus Trtminal</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                            </div>
                                                                            <div class="range_plan">
                                                                                <i class="fas fa-exchange-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4  col-md-6 col-sm-12 col-12">
                                                                        <div class="form_search_date">
                                                                            <div class="flight_Search_boxed date_flex_area">
                                                                                <div class="Journey_date">
                                                                                    <p>Journey date</p>
                                                                                    <input type="date" value="2022-05-05">
                                                                                    <span>Thursday</span>
                                                                                </div>
                                                                                <div class="Journey_date">
                                                                                    <p>Return date</p>
                                                                                    <input type="date" value="2022-05-08">
                                                                                    <span>Saturday</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                        <div
                                                                            class="flight_Search_boxed dropdown_passenger_area">
                                                                            <p>Passenger, Class </p>
                                                                            <div class="dropdown">
                                                                                <button class="dropdown-toggle final-count"
                                                                                    data-toggle="dropdown" type="button"
                                                                                    id="dropdownMenuButton1"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    0 Passenger
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                    <div class="traveller-calulate-persons">
                                                                                        <div class="passengers">
                                                                                            <h6>Passengers</h6>
                                                                                            <div class="passengers-types">
                                                                                                <div class="passengers-type">
                                                                                                    <div class="text"><span
                                                                                                            class="count pcount">2</span>
                                                                                                        <div class="type-label">
                                                                                                            <p>Adult</p>
                                                                                                            <span>12+
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="button-set">
                                                                                                        <button type="button"
                                                                                                            class="btn-add">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button type="button"
                                                                                                            class="btn-subtract">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="passengers-type">
                                                                                                    <div class="text"><span
                                                                                                            class="count ccount">0</span>
                                                                                                        <div class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Children
                                                                                                            </p><span>2
                                                                                                                - Less than 12
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="button-set">
                                                                                                        <button type="button"
                                                                                                            class="btn-add-c">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button type="button"
                                                                                                            class="btn-subtract-c">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="passengers-type">
                                                                                                    <div class="text"><span
                                                                                                            class="count incount">0</span>
                                                                                                        <div class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Infant
                                                                                                            </p><span>Less
                                                                                                                than 2
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="button-set">
                                                                                                        <button type="button"
                                                                                                            class="btn-add-in">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button type="button"
                                                                                                            class="btn-subtract-in">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cabin-selection">
                                                                                            <h6>Cabin Class</h6>
                                                                                            <div class="cabin-list">
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="muiButton-label">Economy
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn active">
                                                                                                    <span
                                                                                                        class="muiButton-label">
                                                                                                        Business
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="MuiButton-label">First
                                                                                                        Class </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span>Business</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="top_form_search_button">
                                                                        <button class="btn btn_theme btn_md">Search</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cruise" role="tabpanel" aria-labelledby="cruise-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Cruise line</p>
                                                            <input type="text" placeholder="American line">
                                                            <span>Choose your cruise</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Journey date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore our hot deals -->
    <section id="explore_area" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Explore our hot deals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="theme_nav_tab">
                        <nav class="theme_nav_tab_item">
                            <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                <button class="nav-link active" id="nav-hotels-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-hotels" type="button" role="tab" aria-controls="nav-hotels"
                                    aria-selected="true">Hotels</button>
                                <button class="nav-link" id="nav-tours-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-tours" type="button" role="tab" aria-controls="nav-tours"
                                    aria-selected="false">Tours</button>
                                <button class="nav-link" id="nav-space-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-space" type="button" role="tab" aria-controls="nav-space"
                                    aria-selected="false">Space</button>
                                <button class="nav-link" id="nav-events-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-events" type="button" role="tab" aria-controls="nav-events"
                                    aria-selected="false">Events</button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-hotels" role="tabpanel"
                            aria-labelledby="nav-hotels-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel1.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>New beach, Thailand</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Kantua hotel, Thailand</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel2.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Indonesia</p>
                                            <div class="discount_tab">
                                                <span>50%</span>
                                            </div>

                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Hotel paradise international</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel3.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Kualalampur</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Hotel kualalampur</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel4.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Mariana island</p>
                                            <div class="discount_tab">
                                                <span>50%</span>
                                            </div>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Hotel deluxe</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel5.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Kathmundu, Nepal</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Hotel rajavumi</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel6.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Beach view</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Thailand grand suit</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel7.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Long island</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Zefi resort and spa</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel8.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Philippine</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Manila international resort</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-tours" role="tabpanel" aria-labelledby="nav-tours-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel1.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>New beach, Thailand</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Kantua hotel, Thailand</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel3.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Kualalampur</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Hotel kualalampur</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel8.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Philippine</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Manila international resort</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-space" role="tabpanel" aria-labelledby="nav-space-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel1.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>New beach, Thailand</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Kantua hotel, Thailand</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel4.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Kualalampur</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Hotel kualalampur</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel1.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>New beach, Thailand</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Kantua hotel, Thailand</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="theme_common_box_two img_hover">
                                        <div class="theme_two_box_img">
                                            <a href="hotel-details.html">
                                                <img src="assets/img/tab-img/hotel8.png" alt="img">
                                            </a>
                                            <p><i class="fas fa-map-marker-alt"></i>Philippine</p>
                                        </div>
                                        <div class="theme_two_box_content">
                                            <h4><a href="hotel-details.html">Manila international resort</a></h4>
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                            <h3>$99.00 <span>Price starts from</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Top destinations -->
    <section id="top_destinations" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Top destinations</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="destinations_content_box img_animation">
                        <img src="assets/img/destination/big-img.png" alt="img">
                        <div class="destinations_content_inner">
                            <h2>Up to</h2>
                            <div class="destinations_big_offer">
                                <h1>50</h1>
                                <h6><span>%</span> <span>Off</span></h6>
                            </div>
                            <h2>Holiday packages</h2>
                            <a href="top-destinations.html" class="btn btn_theme btn_md">Book now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination1.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">China</a></h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination2.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">Darjeeling</a></h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination3.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">Malaysia</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination4.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">Gangtok</a></h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination5.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">Thailand</a></h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination6.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">Australia</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination7.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">London</a></h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="top-destinations.html">
                                    <img src="assets/img/destination/destination8.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="top-destinations.html">USA</a></h3>
                                </div>
                            </div>
                            <div class="destinations_content_box">
                                <a href="top-destinations.html" class="btn btn_theme btn_md w-100">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Offer Area -->
    <section id="offer_area" class="section_padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="offer_area_box d-none-phone img_animation">
                        <img src="assets/img/offer/offer1.png" alt="img">
                        <div class="offer_area_content">
                            <h2>Special Offers</h2>
                            <p>Invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                accusam et justo duo dolores et ea rebum. Stet clita kasd dolor sit amet. Lorem ipsum
                                dolor sit amet.</p>
                            <a href="#!" class="btn btn_theme btn_md">Holiday deals</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="offer_area_box img_animation">
                        <img src="assets/img/offer/offer2.png" alt="img">
                        <div class="offer_area_content">
                            <h2>News letter</h2>
                            <p>Invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et.</p>
                            <a href="#!" class="btn btn_theme btn_md">Subscribe now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="offer_area_box img_animation">
                        <img src="assets/img/offer/offer3.png" alt="img">
                        <div class="offer_area_content">
                            <h2>Travel tips</h2>
                            <p>Invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et.</p>
                            <a href="#!" class="btn btn_theme btn_md">Get tips</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style type="text/css">
    .call-to-action{
        background-image:url('https://andit.co/projects/html/and-tour/demo/assets/img/banner/bg.png');
        padding:150px 50px;
        padding-bottom:0px;
        margin-top:130px;
        background-repeat: no-repeat;
    }
    .call-to-action-heading h1 {
      margin-bottom: 1.5rem;
      font-family: "Montez", serif!important;
      font-weight: 400;
      font-style: normal;
      font-size:40px;line-height:50px;color:white;
    }
    .call-to-action .call-to-action-subhead {
        margin-bottom: 2.5rem;
        display: block;
        color: white;
        font-size: 75px;
        line-height: 90px;
        font-weight: 600;
        font-family: "Manrope", sans-serif;
        position: relative;
        margin-top:-0.8rem;
        margin-bottom:45px
    }

@media (max-width: 480px){.caption .caption-subhead{font-size:30px;line-height:30px}}

@media (max-width: 375px){.caption .caption-subhead{font-size:25px;line-height:25px}}
.separator{
  display:flex;
  align-items: center;
  margin:50px 0;
}

.separator .line{
  height: 1px;
  flex: 1;
  background-color: #fff;
}

.separator p{
  padding: 0 2rem;color:white;font-weight:700;
}
</style>
    <!-- call-to-action Area -->
    <section class="call-to-action">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="call-to-action-heading">
                        <h1>Book your tour now and</h1>
                    </div>
                    <div class="call-to-action-subhead">
                        <span>get unforgettable adventure today!</span>
                    </div>
 
                    <div class="input-group">
                        <a href="tel:+919654642200" class="btn btn_theme btn_md call-to-action-btn" type="button">Talk to a travel expert</a>
                    </div>
                    <div class="separator">
                        <div class="line"></div>
                            <p>OR</p>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="col-lg-12" style="padding-bottom: 150px;">
                    <div class="call-to-action-heading">
                        <h1>Write your query here</h1>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-2" style="color:white">Name
                            <div class="input-group">                        
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-lg-2" style="color:white">Email
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="col-lg-2" style="color:white">Contact number
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your contact number">
                            </div>
                        </div>
                        <div class="col-lg-2" style="color:white">City
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your city">
                            </div>
                        </div>
                        <div class="col-lg-2" style="color:white">Seeking for
                            <div class="input-group" >
                                <textarea rows="1" class="form-control" placeholder="Write your message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="cat_form">
                                <form id="cta_form_wrappper">
                                    <div class="input-group">
                                        <button style="margin-top:30px;" class="btn btn_theme btn_md" type="button">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 
    <section id="cta_area">
        <div class="container">            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Quick Enquiry</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-2">Name
                    <div class="input-group">                        
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>
                </div>
                <div class="col-lg-2">Email
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-lg-2">Contact number
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your contact number">
                    </div>
                </div>
                <div class="col-lg-2">City
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your city">
                    </div>
                </div>
                <div class="col-lg-2">Seeking for
                    <div class="input-group" >
                        <textarea rows="1" class="form-control" placeholder="Write your message"></textarea>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="cat_form">
                        <form id="cta_form_wrappper">
                            <div class="input-group">
                                <button style="margin-top:30px;" class="btn btn_theme btn_md" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<style type="text/css">
    .owl-carousel.owl-drag .owl-item {

    margin-right: 40px !important;
    padding: 10px;
    height: 80px;
    border-radius: 5px;
    border: 1px solid #eee;
}
</style>

    <!-- Our partners Area -->
    <section id="our_partners" class="section_padding" style="padding-bottom: 0px;">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Our partners</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="partner_slider_area owl-theme owl-carousel">
                        
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/img/partner/BaliExperts.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/img/partner/malaysia-truly.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/img/partner/Tanzania.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/img/partner/turelyasia.png" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Cta Area -->
    <section id="cta_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="cta_left">
                        <div class="cta_icon">
                            <img src="{{asset('assets/img/common/email.png')}}" alt="icon">
                        </div>
                        <div class="cta_content">
                            <h4>Get the latest news and offers</h4>
                            <h2>Subscribe to our newsletter</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cat_form">
                        <form id="cta_form_wrappper">
                            <div class="input-group"><input type="text" class="form-control"
                                    placeholder="Enter your mail address"><button class="btn btn_theme btn_md"
                                    type="button">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
#footer_area {
    padding-top: 100px;
    padding-bottom: 0px;
}
.footer_heading_area h5 {
    border-bottom: 1px solid #878787;
    display: inline-flex;
    padding-bottom: 5px;
    font-weight: 500;
    color: #878787;
}

.footer_link_area ul li a { display: block;
    color: #878787;
    font-size: 15px;
    font-weight: 400;
    transition: var(--transition);
}
.footer_link_area ul li:hover a {
/*    color: #1CA8CB;*/
}
.footer_link_area ul li {padding-bottom:5px; border-bottom: 1px solid #787878;margin-bottom:5px; }

.footer_link_area ul li:hover { border-bottom: 1px solid var(--main-color);}
</style>
    <!-- Footer  -->
    <footer id="footer_area" style="background-image: url(assets/img/footer-bg.png);background-repeat: no-repeat;background-position: bottom;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <img src="assets/img/logo-gray.png" style="height:90px;">
                    </div>
                    <div class="footer_first_area">
                        <div class="footer_inquery_area">
                            <h5>Visit Us at our office</h5>
                            <a href="tel:+911244381042">La Esperanza Travels<br>
                                Unit No-606, Vipul Business Park,<br>
                                Sohna Road, Sector 48, Gurgaon,<br>
                                122018, Haryana, India
                            </a>                             
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Call us for any help</h5>
                            <a href="tel:+911244381042">+91 124 4381042</a><br>
                            <a href="tel:+911244381043">+91 124 4381043</a><br>
                            <a href="tel:+919654642200">+91 965 464 2200</a><br>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Mail to our support team</h5>
                            <a href="mailto:info@laesperanza.co.in">info@laesperanza.co.in</a>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Follow us on</h5>
                            <ul class="soical_icon_footer">
                                <li><a href="#!"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Company</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faqs.html">Rewards</a></li>
                            <li><a href="terms-service.html">Work with Us</a></li>
                            <li><a href="tour-guides.html">Meet the Team </a></li>
                            <li><a href="news.html">Blog</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faqs.html">Rewards</a></li>
                            <li><a href="terms-service.html">Work with Us</a></li>
                            <li><a href="tour-guides.html">Meet the Team </a></li>
                            <li><a href="news.html">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Support</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="dashboard.html">Account</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="testimonials.html">Legal</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="top-destinations.html"> Affiliate Program</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faqs.html">Rewards</a></li>
                            <li><a href="terms-service.html">Work with Us</a></li>
                            <li><a href="tour-guides.html">Meet the Team </a></li>
                            <li><a href="news.html">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Other Services</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="top-destinations-details.html">Community program</a></li>
                            <li><a href="top-destinations-details.html">Investor Relations</a></li>
                            <li><a href="flight-search-result.html">Rewards Program</a></li>
                            <li><a href="room-booking.html">PointsPLUS</a></li>
                            <li><a href="testimonials.html">Partners</a></li>
                            <li><a href="hotel-search.html">List My Hotel</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faqs.html">Rewards</a></li>
                            <li><a href="terms-service.html">Work with Us</a></li>
                            <li><a href="tour-guides.html">Meet the Team </a></li>
                            <li><a href="news.html">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Top cities</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="room-details.html">Chicago</a></li>
                            <li><a href="hotel-details.html">New York</a></li>
                            <li><a href="hotel-booking.html">San Francisco</a></li>
                            <li><a href="tour-search.html">California</a></li>
                            <li><a href="tour-booking.html">Ohio </a></li>
                            <li><a href="tour-guides.html">Alaska</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="background-color:black;padding:20px; margin-top:50px;">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>{{ $copyright }}</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="assets/img/common/cards.png" alt="img">
                    </div>
                </div>
                <div class="co-lg-12 col-md-12 col-sm-12 col-12">
                    <small style="font-size:12px">Note : All claims, disputes and litigation relating to online booking through this website anywhere from India or abroad shall be subject to jurisdiction of Courts of Delhi only. All Images shown here are for representation purpose only.</small>
                </div>
            </div>
        </div>
    </footer>    
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
    <!-- Meanu js -->
    <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
    <!-- owl carousel js -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- wow.js -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/add-form.js')}}"></script>
    <script src="{{asset('assets/js/form-dropdown.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script>
let slide_data = [
  {
    src:
      "https://andit.co/projects/html/and-tour/demo/assets/img/banner/bg.png",
    title: "Get unforgetable pleasure with us",
    copy: "Natural Wonder of the world",
    sub_title: "Natural Wonder of the world",
  },
  {
    src:
      "https://andit.co/projects/html/and-tour/demo/assets/img/banner/bg.png",
    title: "Get unforgetable pleasure with us",
    copy: "Let’s make your best trip with us",
    sub_title: "Let’s make your best trip with us",
  },
  {
    src:
      "https://andit.co/projects/html/and-tour/demo/assets/img/banner/bg.png",
    title: "Get unforgetable pleasure with us",
    copy: "Explore beauty of the whole world",
    sub_title: "Explore beauty of the whole world",
  }
];
let slides = [],
  captions = [];

let autoplay = setInterval(function () {
  nextSlide();
}, 5000);
let container = document.getElementById("container");
let leftSlider = document.getElementById("left-col");
// console.log(leftSlider);
let down_button = document.getElementById("down_button");
// let caption = document.getElementById('slider-caption');
// let caption_heading = caption.querySelector('caption-heading');

down_button.addEventListener("click", function (e) {
  e.preventDefault();
  clearInterval(autoplay);
  nextSlide();
  autoplay;
});

for (let i = 0; i < slide_data.length; i++) {
  let slide = document.createElement("div"),
    caption = document.createElement("div"),
    slide_title = document.createElement("div");
    slide_sub_title = document.createElement("div");
    btn = document.createElement("div");

  slide.classList.add("slide");
  slide.setAttribute("style", "background:url(" + slide_data[i].src + ")");
  caption.classList.add("caption");
  slide_title.classList.add("caption-heading");
  slide_title.innerHTML = "<h1>" + slide_data[i].title + "</h1>";
  slide_sub_title.classList.add("caption-subhead");
  slide_sub_title.innerHTML = '<div class="caption-subhead"><span>'+ slide_data[i].sub_title +'</span></div>';

  btn .innerHTML ='<a style="z-index:9999999!important;" href="#" class="btn btn_theme btn_md">Explore Tours</a>';
  switch (i) {
    case 0:
      slide.classList.add("current");
      caption.classList.add("current-caption");
      break;
    case 1:
      slide.classList.add("next");
      caption.classList.add("next-caption");
      break;
    case slide_data.length - 1:
      slide.classList.add("previous");
      caption.classList.add("previous-caption");
      break;
    default:
      break;
  }
  caption.appendChild(slide_title);
  caption.appendChild(slide_sub_title);
  caption.appendChild(btn);
  caption.insertAdjacentHTML(
    "beforeend",
    ''
  );
  slides.push(slide);
  captions.push(caption);
  leftSlider.appendChild(slide);
  container.appendChild(caption);
}
// console.log(slides);

function nextSlide() {
  // caption.classList.add('offscreen');

  slides[0].classList.remove("current");
  slides[0].classList.add("previous", "change");
  slides[1].classList.remove("next");
  slides[1].classList.add("current");
  slides[2].classList.add("next");
  let last = slides.length - 1;
  slides[last].classList.remove("previous");

  captions[0].classList.remove("current-caption");
  captions[0].classList.add("previous-caption", "change");
  captions[1].classList.remove("next-caption");
  captions[1].classList.add("current-caption");
  captions[2].classList.add("next-caption");
  let last_caption = captions.length - 1;

  // console.log(last);
  captions[last].classList.remove("previous-caption");

  let placeholder = slides.shift();
  let captions_placeholder = captions.shift();
  slides.push(placeholder);
  captions.push(captions_placeholder);
}

let heading = document.querySelector(".caption-heading");

// https://jonsuh.com/blog/detect-the-end-of-css-animations-and-transitions-with-javascript/
function whichTransitionEvent() {
  var t,
    el = document.createElement("fakeelement");

  var transitions = {
    transition: "transitionend",
    OTransition: "oTransitionEnd",
    MozTransition: "transitionend",
    WebkitTransition: "webkitTransitionEnd"
  };

  for (t in transitions) {
    if (el.style[t] !== undefined) {
      return transitions[t];
    }
  }
}

var transitionEvent = whichTransitionEvent();
caption.addEventListener(transitionEvent, customFunction);

function customFunction(event) {
  caption.removeEventListener(transitionEvent, customFunction);
  console.log("animation ended");

  // Do something when the transition ends
}
</script>

<script>
$(function(){
    var swiper = new Swiper('.carousel-gallery .swiper-container', {
      effect: 'slide',
      speed: 900,
      slidesPerView: 1,
      spaceBetween: 20,
      simulateTouch: true,
      autoplay: {
        delay: 5000,
        stopOnLastSlide: false,
        disableOnInteraction: false
      },
      pagination: {
        el: '.carousel-gallery .swiper-pagination',
        clickable: true
      },
      breakpoints: {
        // when window width is <= 320px
        320: { slidesPerView: 1, spaceBetween: 5},
        // when window width is <= 480px
        425: { slidesPerView: 2, spaceBetween: 10},
        // when window width is <= 640px
        768: { slidesPerView: 3, spaceBetween: 20}
      }
    }); /*http://idangero.us/swiper/api/*/
});
 </script>
<style>
.whatsapp {
    position: fixed;
    left: 30px;
    bottom: 30px;
    z-index: 9999999;
    border-radius: 10px;
    text-align: center;
}
.social-icon {
    display: block;
    width: 40px;
    height: 40px;
    background: transparent;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), inset 0 1px 1px rgba(255, 255, 255, 0.2);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), inset 0 1px 1px rgba(255, 255, 255, 0.2);
    border-radius: 2px;
    -webkit-transition: background 0.3s ease-in-out;
    -moz-transition: background 0.3s ease-in-out;
    -o-transition: background 0.3s ease-in-out;
    -ms-transition: background 0.3s ease-in-out;
    transition: background 0.3s ease-in-out;
}
.social-icon:hover {
    width: 45px;
    height: 45px;
}
</style>
<a target="_new" href="https://api.whatsapp.com/send?phone=+{{$whatsApp}}&amp;text=Hi, I am interested in your services" class="whatsapp social-icon">
    <img src="{{asset('assets/img/whatsapp-icon.png')}}">
</a>

</body>

</html>