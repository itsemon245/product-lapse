<header class="header_area">
    <nav class="navbar navbar-expand-lg menu_one menu_four">
        <div class="container custom_container p0">
            <a class="navbar-brand" href="#">
                <img src="img/logo-white.png" class="logo1" srcset="img/logo-white.png 2x" alt="logo">
                <img src="img/logo.png" class="logo2" srcset="img/logo.png 2x" alt="logo">
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

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav menu pl_120">
                    <li class="nav-item">
                        <a class="nav-link" href="#tolink-1">
                            Home
                        </a>
                    </li>
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
                        <a class="nav-link" href="#">
                            عربى
                        </a>
                    </li>
                    <li class="nav-item"><a class="btn_get btn_hover hidden-md visible-sm" href="#get-app">login</a>
                    </li>
                </ul>
            </div>
            <a class="btn_get btn_hover hidden-sm hidden-xs btn-bg" href="#">login</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn_get btn_hover hidden-sm hidden-xs btn-bg">logout</button>
            </form>

        </div>
    </nav>
</header>
