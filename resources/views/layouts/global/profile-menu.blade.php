<ul class="dropdown-menu">
    <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link">@__('navigation.profile.profile')</a></li>
    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">
            @if (auth()->user()->type == 'admin')
                @__('navigation.profile.dashboard')
            @else
                @__('navigation.profile.products')
            @endif
        </a></li>
    @if (auth()->user()->type == 'subscriber' || auth()->user()->type == 'member')
        <li class="nav-item"><a href="{{ route('invitation.index') }}" class="nav-link">@__('navigation.profile.invitation')</a></li>
        <li class="nav-item"><a href="{{ route('report.index') }}" class="nav-link">@__('navigation.profile.report')</a></li>
        @hasanyrole('account holder|product manager|assistant product manager')
        <li class="nav-item"><a href="{{ route('select.index') }}" class="nav-link">@__('navigation.profile.select')</a></li>
        @endhasanyrole
        @hasanyrole('account holder')
        <li class="nav-item"><a href="{{ route('get.certificate') }}" class="nav-link">@__('navigation.profile.certificate')</a></li>
        @endhasanyrole
    @endif
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <li class="nav-item" style="margin-top: 0px; margin-bottom: 0px;">
            <button class="nav-link">
                @__('navigation.profile.logout')
            </button>
        </li>
    </form>
</ul>
