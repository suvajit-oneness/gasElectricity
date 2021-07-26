@extends('frontend.layouts.master')
@section('title','Welcome')
@section('content')
    
<section class="contact_wraper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact_form sign_in_form">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-12 d-none d-md-block">
                            <div class="contact_details_wrap contact_details_wrap-mod"></div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="sign_in_form_wrap">
                                <div class="form_container">
                                    <h3>Welcome Back :)</h3>
                                    <p>To keep connected with us please login with your personal information by email address and password.<span><img src="{{asset('forntEnd/images/bell-icon.png')}}"></span></p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form_group">
                                            <img src="{{asset('forntEnd/images/envelop-3.png')}}">
                                            <input type="email" name="email" class="custom_input @error('email'){{'is-invalid'}}@enderror" placeholder="EMAIL ADDRESS" value="{{old('email')}}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form_group">
                                            <img src="{{asset('forntEnd/images/lock.png')}}">
                                            <input type="password" name="password" class="custom_input @error('password'){{'is-invalid'}}@enderror" placeholder="PASSWORD">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="group_link">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="customControlAutosizing" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            @endif
                                        </div>
                                        <!-- <div class="">
                                            <img src="{{asset('forntEnd/images/verify-robot.png')}}">
                                        </div> -->
                                        <button class="blue-btm blue-btm-mod mr-md-3" type="submit">Login Now</button>
                                        @if (Route::has('register'))
                                            <a href="{{route('register')}}" class="white-btm">+ Create an Account</a>
                                        @endif
                                    </form>
                                    <div class="social_group">
                                        <p>Or you can join with</p>
                                        <ul>
                                            <li>
                                                <a href="#"><img src="{{asset('forntEnd/images/facebook-2.png')}}"></a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="{{asset('forntEnd/images/twitter-2.png')}}"></a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="{{asset('forntEnd/images/google-plus.png')}}"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection

