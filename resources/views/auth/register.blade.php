@extends('frontend.layouts.master')
@section('title','Register')
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
                                    <h3>Register Yourself :)</h3>
                                    <p>To keep connected with us please register with your personal information by providing their details.<span><img src="{{asset('forntEnd/images/bell-icon.png')}}"></span></p>
                                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img src="{{asset('forntEnd/images/user.png')}}">
                                                <input id="name" type="text" class="mb-0 custom_input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">
            
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img src="{{asset('forntEnd/images/envelop-3.png')}}">
                                                <input id="email" type="email" class="mb-0 custom_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img src="{{asset('forntEnd/images/lock.png')}}">
                                                <input id="password" type="password" class="mb-0 custom_input @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
            
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img src="{{asset('forntEnd/images/lock.png')}}">
                                                <input id="password-confirm" type="password" class="mb-0 custom_input" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img src="{{asset('forntEnd/images/reffer.png')}}">
                                                <input id="referral_code" type="text" class="mb-0 custom_input @error('referral') is-invalid @enderror" name="referral" value="{{($req->referral_code ? $req->referral_code : (old('referral') ? old('referral') : ''))}}" placeholder="Referal Code (optional)">
                                                @error('referral')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="form-group row mb-0 m-0">
                                            <button type="submit" class="blue-btm blue-btm-mod mt-0">Register</button>
                                            <!-- <a href="{{route('register')}}" class="white-btm">+ Login</a> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referral_code" class="col-md-4 col-form-label text-md-right">{{ __('Referal Code') }}</label>

                            <div class="col-md-6">
                                <input id="referral_code" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{($req->referral_code ? $req->referral_code : (old('referral') ? old('referral') : ''))}}" placeholder="Referal Code (optional)">
                                @error('referral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
