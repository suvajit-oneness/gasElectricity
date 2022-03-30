{{-- <header @if(Route::currentRouteName() != '') class="inner_head" @endif>
	<div class="container">
		<div class="inner-header">
			<a href="{{url('/')}}" class="logo">
				<img src="{{asset('forntEnd/img/logo.png')}}">
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
</header> --}}



<nav class="navbar navbar-expand-lg">
				<div class="container-fluid ps-lg-5 pe-lg-5">
					<a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('forntEnd/img/logo2.png')}}"></a>
					<div class="dropdown d-block d-lg-none">
						<a  href="{{url('login')}}" class="btn log_drop btn-sm" type="button">Log In</a>
						<!-- <button class="btn log_drop btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						  Log In
						</button>
						<ul class="dropdown-menu log_btn" aria-labelledby="dropdownMenuButton1">
						  <li><a class="dropdown-item" href="#">Action</a></li>
						  <li><a class="dropdown-item" href="#">Another action</a></li>
						  <li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul> -->
					</div>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
						<span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
					</button>
					<div class="collapse navbar-collapse" id="main_nav">
						<ul class="navbar-nav m-auto ps-lg-5">
							<li class="nav-item {{request()->routeIs('aboutus')?'active':''}}"> <a class="nav-link" href="{{route('aboutus')}}">ABOUT US</a> </li>
							<li class="nav-item {{request()->routeIs('contact-us')?'active':''}}"><a class="nav-link" href="{{route('contact-us')}}"> CONTACT</a></li>
							<li class="nav-item {{request()->routeIs('indivisual.state')?'active':''}}"><a class="nav-link" href="{{route('indivisual.state')}}">INDIVIDUAL STATE</a></li>
							<li class="nav-item {{request()->routeIs('indivisual.utility')?'active':''}}"><a class="nav-link" href="{{route('indivisual.utility')}}">INDIVIDUAL UTILITY</a></li>
							<li class="nav-item {{request()->routeIs('blogs')?'active':''}}"><a class="nav-link" href="{{route('blogs')}}"> BLOG </a></li>
							<li class="nav-item {{request()->routeIs('how-it-works')?'active':''}}"><a class="nav-link" href="{{route('how-it-works')}}"> HOW IT WORKS?  </a></li>
						</ul>
						<ul class="navbar-nav ms-auto d-none d-lg-block">
							<div class="dropdown">
								@guest
								<a href="{{url('login')}}" class="btn log_drop btn-sm" type="button">
									Log In
								</a>
								@endguest

								@auth
								<a href="{{route('home')}}" class="btn log_drop btn-sm" type="button">
									Profile
								</a>
								@endauth

								{{-- <a href="{{url('login')}}" class="login-btm"><small>Login </small><span><i class="fas fa-user-circle"></i></span></a> --}}
								<!-- <button class="btn log_drop btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								  Log In
								</button>
								<ul class="dropdown-menu log_btn" aria-labelledby="dropdownMenuButton1">
								  <li><a class="dropdown-item" href="#">Action</a></li>
								  <li><a class="dropdown-item" href="#">Another action</a></li>
								  <li><a class="dropdown-item" href="#">Something else here</a></li>
								</ul> -->
							</div>
						</ul>
					</div> <!-- navbar-collapse.// -->
				</div> <!-- container-fluid.// -->
				</nav>
		</header>