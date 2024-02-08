<li class="nav-item dropdown submenu notifi-list">
    <a class="nav-link dropdown-toggle btn-bg btn-icon" href="#" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ti-bell"></i><span class="notifi-num">{{ count(auth()->user()->notifications) }}</span>
    </a>
    <ul class="dropdown-menu">
        @foreach (auth()->user()->notifications as $notification)
        <li class="nav-item {{ $notification->read_at == null ? 'bg-light' : '' }}">
            @php
                $user = App\Models\User::with('image')->find($notification->data['owner_id']);
                // dd($user)
            @endphp
            <a href="blog-grid.html" class="nav-link">
                <div class="feedback_item">
                    <div class="feed_back_author">
                        <div class="media">
                            <div class="img">
                                <img src="{{ $user->image->url ?? asset('img/profile1.png') }} " alt="">
                            </div>
                            <div class="media-body">
                                <h5 class="f_500"><span>{{ $user->name . ' ' . '|' }} </span> {{ $notification->data['reason'] }} </h5>
                                <h6 class="f_400"> {{ $notification->created_at->diffForHumans() }} </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
        <li class="nav-item text-center"><a href="#" class="nav-link">View all</a></li>
    </ul>
</li>