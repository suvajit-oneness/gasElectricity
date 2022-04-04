@extends('auth.layouts.master')
@section('title','Register')
@section('content')
<section class="contact_wraper d-none">
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
                                    <p>To keep connected with us please register with your personal information by
                                        providing their details.<span><img
                                                src="{{ asset('forntEnd/images/bell-icon.png') }}"></span>
                                    </p>
                                    <form method="POST" action="{{ route('register') }}"
                                        autocomplete="off">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img
                                                    src="{{ asset('forntEnd/images/user.png') }}">
                                                <input id="name" type="text"
                                                    class="mb-0 custom_input @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}"
                                                    autocomplete="name" autofocus placeholder="Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img
                                                    src="{{ asset('forntEnd/images/envelop-3.png') }}">
                                                <input id="email" type="email"
                                                    class="mb-0 custom_input @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}"
                                                    autocomplete="email" placeholder="Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img
                                                    src="{{ asset('forntEnd/images/envelop-3.png') }}">
                                                <input id="phone" type="phone"
                                                    class="mb-0 custom_input @error('phone') is-invalid @enderror"
                                                    name="phone" value="{{ old('phone') }}"
                                                    placeholder="Phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img
                                                    src="{{ asset('forntEnd/images/lock.png') }}">
                                                <input id="dateOfBirth" type="date"
                                                    class="mb-0 custom_input @error('dateOfBirth') is-invalid @enderror"
                                                    name="dateOfBirth"
                                                    max="{{ date('Y-m-d',strtotime('-12 years')) }}"
                                                    onkeypress="return false;">
                                                @error('dateOfBirth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img
                                                    src="{{ asset('forntEnd/images/lock.png') }}">
                                                <input id="password" type="password"
                                                    class="mb-0 custom_input @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="new-password" placeholder="Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img
                                                    src="{{ asset('forntEnd/images/lock.png') }}">
                                                <input id="password-confirm" type="password" class="mb-0 custom_input"
                                                    name="password_confirmation" autocomplete="new-password"
                                                    placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <label><b>Do you require life support medical equipment?</b></label>
                                                <input type="radio" class="requireLifeSupportMedicalEquipment"
                                                    name="requireLifeSupportMedicalEquipment" value="yes">Yes
                                                <input type="radio" class="requireLifeSupportMedicalEquipment"
                                                    name="requireLifeSupportMedicalEquipment" value="no" checked="">No
                                            </div>
                                        </div>

                                        <div id="nextFieldTobeAppear" style="display: none;">
                                            <div class="form-group row">
                                                <div class="col-md-12 iputIcon">
                                                    <label><b>Do you gas or electricity to operate life support medical
                                                            equipment?</b></label>
                                                    <input type="radio" class="operateLifeSupportMedicalEquipment"
                                                        name="operateLifeSupportMedicalEquipment" value="yes">Yes
                                                    <input type="radio" class="operateLifeSupportMedicalEquipment"
                                                        name="operateLifeSupportMedicalEquipment" value="no"
                                                        checked="">No
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 iputIcon">
                                                    <label><b>Life support machine type?</b></label>
                                                    <select name="LifeSupportMachineType" class="form-control">
                                                        <option value="" selected="" hidden="">Select Machine Type
                                                        </option>
                                                        <option value="Feeding tube">Feeding tube</option>
                                                        <option value="Parenteral nutrition">Parenteral nutrition
                                                        </option>
                                                        <option value="Mechanical ventilation">Mechanical ventilation
                                                        </option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 iputIcon">
                                                <img
                                                    src="{{ asset('forntEnd/images/reffer.png') }}">
                                                <input id="referral_code" type="text"
                                                    class="mb-0 custom_input @error('referral') is-invalid @enderror"
                                                    name="referral"
                                                    value="{{ ($req->referral_code ? $req->referral_code : (old('referral') ? old('referral') : '')) }}"
                                                    placeholder="Referal Code (optional)">
                                                @error('referral')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0 m-0">
                                            <button type="submit" class="blue-btm blue-btm-mod mt-0">Register</button>
                                            <!-- <a href="{{ route('login') }}" class="white-btm">+ Login</a> -->
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

 
<section class="contact_sec login_sec pt-0 pb-0 h-auto register_form">
    <div class="container">
        <div class="row m-0 ">
            <div class="col-12 col-lg-6 address_text pt-5 d-none d-lg-block">
                <img src="{{asset('forntEnd/img/login_swbg.png')}}">
            </div>
            <div class="col-12 col-lg-6 ps-lg-5 p-lg-0">
                <div class="card border-0 p-0 p-lg-4">
                    <div class="page_title">
                        <h1 data-aos="fade-down" data-aos-duration="1000" class="text-start">
                            Register
                            <small class="position-relative">Yourself
                                <div class="border_text" data-aos="fade-left" data-aos-duration="1400"></div>
                            </small>
                        </h1>
                        <p data-aos="fade-up" data-aos-duration="1400" class="mt-3 mb-3">To keep connected with us please register with your personal information by providing their details. <img src="{{ asset('forntEnd/img/moj.png') }}" class="ms-2"></p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <div class="mb-2 position-relative">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus
                                placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-2 position-relative">
                            <div class="col-md-12 iputIcon">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email"
                                    placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 row m-0">
                            <div class="col-md-6 iputIcon p-0 ps-lg-0 pe-lg-1 position-relative">
                                <input id="phone" type="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" placeholder="Phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 iputIcon p-0 pe-lg-0 ps-lg-1 mt-2 mt-lg-0 position-relative">
                                <input id="dateOfBirth" type="date"
                                    class="form-control @error('dateOfBirth') is-invalid @enderror"
                                    name="dateOfBirth"
                                    max="{{ date('Y-m-d',strtotime('-12 years')) }}"
                                    onkeypress="return false;">
                                @error('dateOfBirth')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 row m-0">
                            <div class="col-md-6 iputIcon p-0 ps-lg-0 pe-lg-1 position-relative">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 iputIcon p-0 pe-lg-0 ps-lg-1 mt-2 mt-lg-0 position-relative">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>
                        </div>

                        {{-- <div class="mb-2 position-relative">
                            <div class="col-md-12 iputIcon">
                                <label><b>Do you require life support medical equipment?</b></label>
                                <input type="radio" class="requireLifeSupportMedicalEquipment"
                                    name="requireLifeSupportMedicalEquipment" value="yes">Yes
                                <input type="radio" class="requireLifeSupportMedicalEquipment"
                                    name="requireLifeSupportMedicalEquipment" value="no" checked="">No
                            </div>
                        </div> --}}

                        <div class="mb-2 position-relative row m-0 reg_form">
                             <label class="p-0"><b>Do you require life support medical equipment?</b></label>
                            <div class="form-check ct_select col-5 ps-2">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" class="requireLifeSupportMedicalEquipment"
                                    name="requireLifeSupportMedicalEquipment" value="yes">
                                    Yes</a>.
                                </label>
                            </div>
                            <div class="form-check ct_select col-5 ps-0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" class="requireLifeSupportMedicalEquipment"
                                    name="requireLifeSupportMedicalEquipment" value="no" checked="">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="nextFieldTobeAppear" style="display: none;">
                            <div class="mb-2 position-relative">
                                <div class="col-md-12 iputIcon">
                                    <label><b>Do you gas or electricity to operate life support medical
                                            equipment?</b></label>
                                    <input type="radio" class="operateLifeSupportMedicalEquipment"
                                        name="operateLifeSupportMedicalEquipment" value="yes">Yes
                                    <input type="radio" class="operateLifeSupportMedicalEquipment"
                                        name="operateLifeSupportMedicalEquipment" value="no" checked="">No
                                </div>
                            </div>
                            <div class="mb-2 position-relative">
                                <div class="col-md-12 iputIcon">
                                    <label><b>Life support machine type?</b></label>
                                    <select name="LifeSupportMachineType" class="form-control">
                                        <option value="" selected="" hidden="">Select Machine Type
                                        </option>
                                        <option value="Feeding tube">Feeding tube</option>
                                        <option value="Parenteral nutrition">Parenteral nutrition
                                        </option>
                                        <option value="Mechanical ventilation">Mechanical ventilation
                                        </option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 position-relative">
                            <div class="col-md-12 iputIcon">
                                <input id="referral_code" type="text"
                                    class="form-control @error('referral') is-invalid @enderror" name="referral"
                                    value="{{ ($req->referral_code ? $req->referral_code : (old('referral') ? old('referral') : '')) }}"
                                    placeholder="Referal Code (optional)">
                                @error('referral')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="position-relative mb-5 mb-sm-0">
                            <button type="submit" class="btn log_drop">Register</button>
                            <a href="{{ route('login') }}" class="d-block d-sm-inline white-btm mt-4 mt-sm-0">< Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@section('script')
<script type="text/javascript">
    $(document).on('click', '.requireLifeSupportMedicalEquipment', function () {
        var thisRadiobtn = $(this);
        if (thisRadiobtn.val() == 'yes') {
            $('#nextFieldTobeAppear').show();
        } else {
            $('#nextFieldTobeAppear').hide();
        }
    });

</script>
@stop
    @endsection
