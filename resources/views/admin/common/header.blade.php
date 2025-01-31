@php
    use Illuminate\Support\Facades\Crypt;
@endphp

      <!-- Navbar -->      
      <header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal" style="padding:0px;margin:0px;">
            <a href=".">
              <img src="{{ asset('storage/' . $logo) }}" style="width:auto; height:50px" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>{{ session('user_name') }}</div>
                  <div class="mt-1 small text-secondary">{{ session('user_role') }}</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="./profile.html" class="dropdown-item">Profile</a>
                <a href="./settings.html" class="dropdown-item">Change Password</a>
                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('dashboard')}}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('users.list')}}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg  xmlns="http://www.w3.org/2000/svg" class="icon"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users-group"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" /><path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M17 10h2a2 2 0 0 1 2 2v1" /><path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M3 13v-1a2 2 0 0 1 2 -2h2" /></svg>
                    </span>  
                    <span class="nav-link-title">
                      Users
                    </span>
                  </a>
                </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('page.list')}}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M17 13v4h4" /><path d="M12 3v4a1 1 0 0 0 1 1h4" /><path d="M11.5 21h-6.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v2m0 3v4" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Pages
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-sliders" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.956 11.107a9 9 0 1 0 -9.579 9.871" /><path d="M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z" /><path d="M12 7v5l.5 .5" /></svg>
                    </span>
                    <span class="nav-link-title">Settings</span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('admin.settings')}}">General Settings</a>
                    <a class="dropdown-item" href="{{route('hotel.list')}}">Hotels</a>
                    <a class="dropdown-item" href="{{route('testimonial.list')}}">Testimonials</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-menus" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M15 15l3.35 3.35"></path><path d="M9 15l-3.35 3.35"></path><path d="M5.65 5.65l3.35 3.35"></path><path d="M18.35 5.65l-3.35 3.35"></path></svg>
                    </span>
                    <span class="nav-link-title">
                      Menus
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    @if (!empty($menu_types))
                      @foreach ($menu_types as $menu_type)
                        @php
                          $encry_menu_type_id = Crypt::encrypt($menu_type->menu_type_id); 
                        @endphp
                        <a class="dropdown-item" href="{{ route('menus.list', ['encry_menu_type_id' => $encry_menu_type_id]) }}">
                          {!! $menu_type->menu_type_name !!}
                        </a>
                      @endforeach
                    @endif
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-sliders" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M15 15l3.35 3.35"></path><path d="M9 15l-3.35 3.35"></path><path d="M5.65 5.65l3.35 3.35"></path><path d="M18.35 5.65l-3.35 3.35"></path></svg>
                    </span>
                    <span class="nav-link-title">
                      Sliders
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    @if (!empty($slider_types))
                      @foreach ($slider_types as $slider_type)
                        @php
                          $encry_slider_type_id = Crypt::encrypt($slider_type->slider_type_id); 
                        @endphp
                        <a class="dropdown-item" href="{{ route('sliders.list', ['encry_slider_type_id' => $encry_slider_type_id]) }}">
                          {!! $slider_type->slider_type_name !!}
                        </a>
                      @endforeach
                    @endif
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-sliders" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.956 11.107a9 9 0 1 0 -9.579 9.871" /><path d="M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z" /><path d="M12 7v5l.5 .5" /></svg>
                    </span>
                    <span class="nav-link-title">Tours</span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('tour.list')}}">Tours</a>
                    <a class="dropdown-item" href="{{route('tourcategory.list')}}">Tour Category</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>