<div class="navbar-collapse collapse " id="navbarSupportedContent">
    <ul class="navbar-nav menu pl_120">
        <li class="nav-item">
            <a class="nav-link" href="#tolink-1">
                Home
            </a>
        </li>
        @auth
            <li class="nav-item hidden-md visible-sm">
                <a class="nav-link" href="#tolink-6">
                    Notifications
                    <span class="notifi-num notifi-num2">25</span>
                </a>
            </li>
            <li class="nav-item dropdown submenu hidden-md visible-sm">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                @include('layouts.global.profile-menu')
            </li>
        @endauth
        <li class="nav-item">
            <a class="nav-link" href="#tolink-2">
                About us
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-3">
                Features
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-4">
                Packages
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-5">
                Faq
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tolink-6">
                Contact us
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('lang.toggle') }}" method="post">
                @csrf
                @if (app()->getLocale() == 'ar')
                    <button class="nav-link">
                        English
                    </button>
                @else
                    <button class="nav-link">
                        عربى
                    </button>
                @endif
            </form>
        </li>
        <li class="nav-item"><a class="btn_get btn_hover hidden-md visible-sm" href="{{route('login')}}">login</a>
        </li>
    </ul>
</div>
