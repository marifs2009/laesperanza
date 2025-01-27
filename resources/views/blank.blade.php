<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>@yield('title')</title>
        <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="HandheldFriendly" content="True"/>
        <meta name="MobileOptimized" content="320"/>
        <link rel="icon" href="{{URL::asset('img/favicon.ico')}}" type="image/x-icon"/>
        <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
        <meta name="description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!"/>
        <!-- CSS files -->
        <link href="{{ URL::asset('css/tabler.min.css?1685973381')}}" rel="stylesheet"/>
        <link href="{{ URL::asset('css/tabler-flags.min.css?1685973381')}}" rel="stylesheet"/>
        <link href="{{ URL::asset('css/tabler-payments.min.css?1685973381')}}" rel="stylesheet"/>
        <link href="{{ URL::asset('css/tabler-vendors.min.css?1685973381')}}" rel="stylesheet"/>
        <link href="{{ URL::asset('css/demo.min.css?1685973381')}}" rel="stylesheet"/>


        <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
        </style>
        @yield('page_css')
    </head>
    <body>
        <div class="page">
            @include('common.header')
            <div class="page-wrapper">
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl d-flex flex-column justify-content-center">
                        @yield('content')
                    </div>
                </div>
                @include('common.footer')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{ URL::asset('js/tabler.min.js?1685973381')}}" defer></script>
        <script src="{{ URL::asset('js/demo.min.js?1685973381')}}" defer></script>
<!--   
  <script>
    tinymce.init({
      selector: ''
    });
  </script>  -->  

        @yield('page_script')

    </body>
</html>