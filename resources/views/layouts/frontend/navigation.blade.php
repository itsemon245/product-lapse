<div class="navbar-collapse collapse " id="navbarSupportedContent">
    <ul class="navbar-nav menu pl_120">
        <li class="nav-item">
            <a class="nav-link" href="#tolink-1">
                @__('navigation.navbar.home')
            </a>
        </li>
        @auth
            <li class="nav-item hidden-md visible-sm">
                <a class="nav-link" href="#tolink-6">
                    @__('navigation.notifications')
                    <span class="notifi-num notifi-num2">25</span>
                </a>
            </li>
            <li class="nav-item dropdown submenu hidden-md visible-sm">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @__('navigation.navbar.login')
                </a>
                @include('layouts.global.profile-menu')
            </li>
        @endauth
        <li class="nav-item">
            <a class="nav-link" href="#tolink-2">
                @__('navigation.navbar.about')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-3">
                @__('navigation.navbar.features')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-4">
                @__('navigation.navbar.packages')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-5">
                @__('navigation.navbar.features')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-6">
                @__('navigation.navbar.contact')
            </a>
        </li>
        <li class="nav-item hidden-md ">
            <form action="{{ route('lang.toggle') }}" method="post">
                @csrf
                @if (app()->getLocale() == 'ar')
                    <button class="nav-link w-full text-start rtl:text-end">
                        English
                    </button>
                @else
                    <button class="nav-link w-full text-start rtl:text-end ">
                        عربى
                    </button>
                @endif
            </form>
        </li>
        <li class="nav-item"><a class="btn_get btn_hover hidden-md visible-sm" href="{{route('login')}}">@__('navigation.navbar.login')</a>
        </li>
    </ul>
</div>
