<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <button class="openbtn nav-toggler" id="openbutton" onclick="openNav()">
            <i class="fas fa-bars"></i>
        </button>
        
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('forntEnd/images/logo.png')}}" width="140px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
               
                @if($user = Auth::user())
                    @if($user->user_type == 1)
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img mt-1" href="javascript:void(0)" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                             </a>
                             <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <!-- <a href="{{route('admin.setting.points')}}" class="dropdown-item {{request()->routeIs('admin.setting.points')?'active':''}}"><i class="fas fa-user mr-2"></i>Points</a> -->
                                <a href="{{route('admin.setting.about_us')}}" class="dropdown-item {{request()->routeIs('admin.setting.about_us')?'active':''}}"><i class="fas fa-user mr-2"></i>About Us</a>
                                <a href="{{route('admin.setting.whychooseus')}}" class="dropdown-item {{request()->routeIs('admin.setting.whychooseus')?'active':''}}"><i class="fas fa-user mr-2"></i>Why choose us</a>
                                <a href="{{route('admin.setting.how_it_works')}}" class="dropdown-item {{request()->routeIs('admin.setting.how_it_works')?'active':''}}"><i class="fas fa-user mr-2"></i>How it works</a>
                                 <a href="{{route('admin.setting.individual_utility')}}" class="dropdown-item {{request()->routeIs('admin.setting.individual_utility')?'active':''}}"><i class="fas fa-user mr-2"></i>Individual Utility</a>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item dropdown nav-user user-icon-header">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset(Auth::user()->image)}}" alt="" class="user-avatar-md rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">{{Auth::user()->name}} </h5>
                            </div>
                            <a class="dropdown-item" href="{{route('home')}}"><i class="fas fa-user mr-2"></i>Dashboard</a>
                            <a class="dropdown-item" href="{{route('home')}}"><i class="fas fa-cog mr-2"></i>Setting</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <div id="custom-search" class="top-search-bar">
                            <a href="{{url('login')}}">Login</a> | <a href="{{url('register')}}">Register</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>