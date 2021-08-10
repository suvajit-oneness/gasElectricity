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
						<li class="{{request()->routeIs('aboutus')?'active':''}}"><a href="{{route('aboutus')}}">About Us</a></li>
						<li class="{{request()->routeIs('contact-us')?'active':''}}"><a href="{{route('contact-us')}}">Contact</a></li>
						<li class="{{request()->routeIs('indivisual.state')?'active':''}}"><a href="{{route('indivisual.state')}}">Individual State</a></li>
						<li class="{{request()->routeIs('indivisual.utility')?'active':''}}"><a href="{{route('indivisual.utility')}}">Individual Utility </a></li>
						<li class="{{request()->routeIs('blogs')?'active':''}}"><a href="{{route('blogs')}}">Blog</a></li>
						<li class="{{request()->routeIs('how-it-works')?'active':''}}"><a href="{{route('how-it-works')}}">How It Works? </a></li>
					</ul>
				</div>
				@if(Auth::user())
					<a href="{{url('login')}}" class="login-btm" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{Auth::user()->image}}" height="30" width="30"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <!--<div class="nav-user-info">
                            <h5 class="mb-0 nav-user-name">{{Auth::user()->name}} </h5>
                        </div>-->
                        <a class="dropdown-item mb-2 pb-2" style="border-bottom: 1px solid #bbbbbb;">{{Auth::user()->name}} </a>
                        <a class="dropdown-item" href="{{route('home')}}"><i class="fas fa-user mr-2"></i>Dashboard</a>
                        <a class="dropdown-item" href="{{route('home')}}"><i class="fas fa-cog mr-2"></i>Setting</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
				@else
					<a href="{{url('login')}}" class="login-btm"><small>Login </small><span><i class="fas fa-user-circle"></i></span></a>
				@endif
			</div>
		</div>
	</div>
</header>