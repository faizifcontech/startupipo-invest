<nav class="navbar navbar-default navbar-fixed-top be-top-header">
    <div class="container-fluid">
        <div class="navbar-header"><a href="{{ url('/home') }}" class="navbar-brand"></a></div>
        <div class="be-right-navbar">
            <ul class="nav navbar-nav navbar-right be-user-nav">
                @if(Auth::check())
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                        class="dropdown-toggle"><img
                                @if(Gravatar::exists(Auth::user()->email)) src="{{ Gravatar::get(Auth::user()->email) }}"
                                @else src="{{ asset('assets/img/avatar-main.jpg') }}"
                                @endif alt="Avatar"><span
                                class="user-name">{{ Auth::user()->name }}</span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <div class="user-info">
                                <div class="user-name">{{ Auth::user()->name }}</div>
                            </div>
                        </li>
                        <li><a href="{{ action('ProfileController@index') }}"><span class="icon mdi mdi-face"></span> Account</a></li>
                        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#md-footer-primary"><span class="icon mdi mdi-power"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
            @endif
            <div class="page-title"><span>{{ $title or 'Dashboard' }}</span></div>
        </div>
    </div>
</nav>
