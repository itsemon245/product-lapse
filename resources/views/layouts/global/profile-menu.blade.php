<ul class="dropdown-menu">
    <li class="nav-item"><a href="{{ route('profile.edit') }}" class="nav-link">Profile</a></li>
    <li class="nav-item"><a href="{{ route('invitation.index') }}" class="nav-link">Send Invitaion</a></li>
    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">My Products</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
    <li class="nav-item"><a href="{{ route('select.index') }}" class="nav-link">Select</a></li>
    <li class="nav-item"><a href="{{ route('get.certificate') }}" class="nav-link">Certificate</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Settings</a></li>
    <form  action="{{ route('logout') }}" method="post">
        @csrf
    <li class="nav-item" style="margin-top: 0px; margin-bottom: 0px;" >
        <button class="nav-link" >
            Logout
        </button>
    </li>
    </form>
</ul>