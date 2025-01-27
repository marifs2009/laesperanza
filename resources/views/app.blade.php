<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>@yield('title')</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.all.min.css')}}" />
    <!-- <link rel="stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css"> -->
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
    @yield('page_css')
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
    @include('common.header')
    @yield('content')
    @include('common.footer')
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
    
    @yield('page_script')
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