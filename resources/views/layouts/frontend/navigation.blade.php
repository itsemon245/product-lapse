<header class="header_area header_area_inner">
    <nav class="navbar navbar-expand-lg menu_one menu_four">
        <div class="container custom_container p0">
            <a class="navbar-brand" href="#">
                <img src="img/logo-white.png" class="logo1" srcset="img/logo-white.png 2x" alt="logo">
                <img src="img/logo.png" class="logo2" srcset="img/logo.png 2x" alt="logo">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="nav-item hidden-md visible-sm">
                        <a class="nav-link" href="#tolink-6">
                           Notifications
                       <span class="notifi-num notifi-num2">25</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown submenu hidden-md visible-sm">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Send Invitaion</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">My Products</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Packages</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Certificate</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Settings</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
                        </ul>
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
                </ul>
            </div>
            @auth
            <div>
                <ul class="navbar-nav menu hidden-sm hidden-xs navbar-nav-signin">
                    <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle btn-bg btn-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-user"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Send Invitaion</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">My Products</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Packages</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Certificate</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Settings</a></li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <li class="nav-item"><button class="nav-link">Logout</button></li>
                                </form>
                            </ul>
                        </li>
                    <li class="nav-item dropdown submenu notifi-list">
                            <a class="nav-link dropdown-toggle btn-bg btn-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-bell"></i><span class="notifi-num">25</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="blog-grid.html" class="nav-link">
                                        <div class="feedback_item">
                                            <div class="feed_back_author">
                                                <div class="media">
                                                    <div class="img">
                                                        <img src="img/profile1.png" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="f_500"><span>Ahmed Mahmoud</span> Add you to his list</h5>
                                                        <h6 class="f_400">25 min ago</h6>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-grid.html" class="nav-link">
                                        <div class="feedback_item">
                                            <div class="feed_back_author">
                                                <div class="media">
                                                    <div class="img">
                                                        <img src="img/profile1.png" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="f_500"><span>Ahmed Mahmoud</span> Add you to his list</h5>
                                                        <h6 class="f_400">25 min ago</h6>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-grid.html" class="nav-link">
                                        <div class="feedback_item">
                                            <div class="feed_back_author">
                                                <div class="media">
                                                    <div class="img">
                                                        <img src="img/profile1.png" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="f_500"><span>Ahmed Mahmoud</span> Add you to his list</h5>
                                                        <h6 class="f_400">25 min ago</h6>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-grid.html" class="nav-link">
                                        <div class="feedback_item">
                                            <div class="feed_back_author">
                                                <div class="media">
                                                    <div class="img">
                                                        <img src="img/profile1.png" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="f_500"><span>Ahmed Mahmoud</span> Add you to his list</h5>
                                                        <h6 class="f_400">25 min ago</h6>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item text-center"><a href="#" class="nav-link">View all</a></li>
                            </ul>
                        </li>
                </ul>
            </div>
            @else
            <div>
                <a href="{{ route('login') }}" class="btn_get btn_hover hidden-sm hidden-xs btn-bg">Login</a>
            </div>
            @endauth
          
        </div>
    </nav>
</header>










{{-- <header class="header_area">
    <nav class="navbar navbar-expand-lg menu_one menu_four">
        <div class="container custom_container p0">
            @include('components.application-logo')
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

            <div class="collapse navbar-collapse text-black" id="navbarSupportedContent">
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
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn_get btn_hover hidden-sm hidden-xs btn-bg">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn_get btn_hover hidden-sm hidden-xs btn-bg">Login</a>
            @endauth


        </div>
    </nav>
</header> --}}
