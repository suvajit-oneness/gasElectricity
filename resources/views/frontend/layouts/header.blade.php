<header @if(Route::currentRouteName() != '') class="inner_head" @endif>
	<div class="container">
		<div class="inner-header">
			<a href="{{url('/')}}" class="logo">
				<img src="{{asset('forntEnd/images/logo.png')}}">
			</a>
			<div class="left-header">
				<a href="javascript:void(0)" onclick="openNav()" id="pull"><i class="fas fa-bars"></i> </a>
				<div class="navigation sidenav" id="mySidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<ul class="menu">
						<li><a href="{{route('aboutus')}}">About Us</a></li>
						<li><a href="{{route('contact-us')}}">Contact</a></li>
						<li><a href="{{route('indivisual.state')}}">Individual State</a></li>
						<li><a href="#">Individual Utility </a></li>
						<li><a href="{{route('blogs')}}">Blog</a></li>
						<li><a href="{{route('how-it-works')}}">How It Works? </a></li>
					</ul>
				</div>
				@if(Auth::user())
					<a href="{{url('login')}}" class="login-btm" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{Auth::user()->image}}" height="30" width="30"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{Auth::user()->name}} </h5>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
				@else
					<a href="{{url('login')}}" class="login-btm">Login <span><i class="fas fa-user-circle"></i></span></a>
				@endif
			</div>
		</div>
	</div>
</header>