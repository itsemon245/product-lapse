<ul class="dropdown-menu">
    <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link">@__('navigation.profile.profile')</a></li>
    <li class="nav-item"><a href="{{ route('invitation.index') }}" class="nav-link">@__('navigation.profile.invitation')</a></li>
    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">@__('navigation.profile.products')</a></li>
    <li class="nav-item"><a href="#" class="nav-link">@__('navigation.profile.report')</a></li>
    <li class="nav-item"><a href="{{ route('select.index') }}" class="nav-link">@__('navigation.profile.select')</a></li>
    <li class="nav-item"><a href="{{ route('get.certificate') }}" class="nav-link">@__('navigation.profile.certificate')</a></li>
    <form  action="{{ route('logout') }}" method="post">
        @csrf
    <li class="nav-item" style="margin-top: 0px; margin-bottom: 0px;" >
        <button class="nav-link" >
            @__('navigation.profile.logout')
        </button>
    </li>
    </form> 
</ul>