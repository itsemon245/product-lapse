<header class="header_area header_area_inner">
    <nav class="navbar navbar-expand-lg menu_one menu_four">
        <div class="container custom_container p0">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo-white.png') }}" class="logo1" srcset="{{ asset('img/logo-white.png') }} 2x"
                    alt="logo">
                <img src="{{ asset('img/logo.png') }}" class="logo2" srcset="{{ asset('img/logo.png') }} 2x"
                    alt="logo">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="menu_toggle">
                    <span class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <span class="hamburger-cross">
                        <span></span>
                        <span></span>
                    </span>
                </span>
            </button>
            @include('layouts.frontend.navigation')
            <ul class="navbar-nav menu hidden-sm hidden-xs navbar-nav-signin">
                <li class="nav-item dropdown submenu">

<label class="relative inline-flex items-center cursor-pointer">
  <span class="text-sm font-medium text-gray-900 dark:text-gray-300">En</span>
                        <input type="checkbox" name="toggle" value="{{request()->cookie('locale')}}" class="sr-only peer" hx-post="{{route('lang.toggle')}}"
hx-include="next input, [name='toggle']">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" class=".include-lang-data">
  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
  <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Ar</span>
</label>

                </li>
                @auth

                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle btn-bg btn-icon" href="{{ route('dashboard') }}" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-user"></i>
                        </a>
                        @include('layouts.global.profile-menu')
                    </li>
                    @include('layouts.global.notification-list')
                @else
                    <a class="btn_get btn_hover hidden-sm hidden-xs btn-bg" href="{{ route('login') }}">login</a>
                @endauth

            </ul>
        </div>
    </nav>
</header>
