<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="javascript:void(0)">{{config('app.name', 'Laravel')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <a href="#">About us</a>
                        <a href="#">How it Works</a>
                        @auth
                            <a href="{{route('home')}}">Home</a>
                        @else
                            @if (Route::has('login'))
                                <a href="{{url('login')}}">Login</a>
                            @endif
                            @if (Route::has('register'))
                                | <a href="{{url('register')}}">Register</a>
                            @endif
                        @endauth
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>