<header class="header_area {{ request()->routeIs('home') ? '' : 'header_area_inner' }}">
    <nav class="navbar navbar-expand-lg menu_one menu_four">
        <div class="container custom_container p0">
            <a class="navbar-brand" href="/">
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
            <ul class="navbar-nav menu hidden-sm hidden-xs navbar-nav-signin gap-4 items-center">
                <li class="nav-item dropdown submenu m-0">
                    @include('layouts.frontend.locale-switcher')
                </li>
                @auth

                    <li class="nav-item dropdown submenu m-0">
                        <a class="nav-link dropdown-toggle btn-bg btn-icon" href="{{ route('dashboard') }}" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-user"></i>
                        </a>
                        @include('layouts.global.profile-menu')
                    </li>
                    @include('layouts.global.notification-list')
                @else
                        <a class="btn_get btn_hover hidden-sm hidden-xs btn-bg"
                            href="{{ route('login') }}">@__('navigation.navbar.login')</a>
                    @endauth

            </ul>
        </div>
    </nav>
</header>
@pushOnce('scripts')
    <script>
        // $(document).ready(function() {
        //     let toggler = $('.navbar-toggler')
        //     toggler.click(function() {
        //         console.log('hello')
        //         $(toggler.data('target')).toggleClass('show')
        //     })
        // });
    </script>
@endPushOnce
