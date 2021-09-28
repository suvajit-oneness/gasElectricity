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
                                                <img src="{{asset('forntEnd/images/envelop-3.png')}}">
                                                <input id="phone" type="phone" class="mb-0 custom_input @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img src="{{asset('forntEnd/images/lock.png')}}">
                                                <input id="dateOfBirth" type="date" class="mb-0 custom_input @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" max="{{date('Y-m-d',strtotime('-12 years'))}}" onkeypress="return false;">
                                                @error('dateOfBirth')
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
                                                <label><b>Do you require life support medical equipment?</b></label>
                                                <input type="radio" class="requireLifeSupportMedicalEquipment" name="requireLifeSupportMedicalEquipment" value="yes">Yes
                                                <input type="radio" class="requireLifeSupportMedicalEquipment" name="requireLifeSupportMedicalEquipment" value="no" checked="">No
                                            </div>
                                        </div>

                                        <div id="nextFieldTobeAppear">
                                            <div class="form-group row">
                                                <div class="col-md-12 iputIcon">
                                                    <label><b>Do you gas or electricity to operate life support medical equipment?</b></label>
                                                    <input type="radio" class="operateLifeSupportMedicalEquipment" name="operateLifeSupportMedicalEquipment" value="yes">Yes
                                                    <input type="radio" class="operateLifeSupportMedicalEquipment" name="operateLifeSupportMedicalEquipment" value="no" checked="">No
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 iputIcon">
                                                    <label><b>Life support machine type?</b></label>
                                                    <select name="LifeSupportMachineType" class="form-control">
                                                        <option value="" selected="" hidden="">Select Machine Type</option>
                                                        <option value="Feeding tube">Feeding tube</option>
                                                        <option value="Parenteral nutrition">Parenteral nutrition</option>
                                                        <option value="Mechanical ventilation">Mechanical ventilation</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
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
                                            <!-- <a href="{{route('login')}}" class="white-btm">+ Login</a> -->
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
@section('script')
    <script type="text/javascript">
        $(document).on('click','.requireLifeSupportMedicalEquipment',function(){
            var thisRadiobtn = $(this);
            if(thisRadiobtn.val() == 'yes'){
                $('#nextFieldTobeAppear').show();
            }else{
                $('#nextFieldTobeAppear').hide();
            }
        });
    </script>
@stop
@endsection
