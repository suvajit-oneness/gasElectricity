@extends('layouts.master')
@section('title','Profile')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Your Profile</h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.profile.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">Name:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{(old('name') ? old('name') : $user->name)}}" autofocus="">
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email eg: abc@xyz.com" value="{{(old('email') ? old('email') : $user->email)}}" readonly="">
                                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile" class="col-form-label">Phone:</label>
                                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile" value="{{(old('mobile') ? old('mobile') : $user->mobile)}}" onkeypress="return isNumberKey(event);" maxlength="20">
                                @error('mobile')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender" class="col-form-label">Gender:</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="" selected="" hidden="">Select Gender</option>
                                    <option value="Male" @if($user->gender=='Male'){{('selected')}}@endif>Male</option>
                                    <option value="Female" @if($user->gender=='Female'){{('selected')}}@endif>Female</option>
                                    <option value="Not specified" @if($user->gender=='Not specified'){{('selected')}}@endif>Not specified</option>
                                </select>
                                @error('gender')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob" class="col-form-label">Date of Birth:</label>
                                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" @if($user->dob != '0000-00-00' || old('dob'))value="{{(old('dob') ? old('dob') : $user->dob)}}"@endif>
                                @error('dob')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="form-group col-md-6">
                                <label for="referral" class="col-form-label">Referral Code: 
                                    <a href="javascript:void(0)" id="copyToClipboard">Copy the Link to share</a><input id="linkToCopy" value="{{route('register')}}?referral_code={{$user->referral_code}}" readonly="" style="position: absolute; z-index: -999; opacity: 0;">
                                </label>
                                <input type="text" name="referral" class="form-control @error('referral') is-invalid @enderror" value="{{$user->referral_code}}" readonly disabled>
                                @error('referral')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div> -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if($user->user_type == 3)
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Identification</h5>
                        <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('user.identification.save')}}">
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label">Identification type</label>
                                <select name="identification_type" class="form-control @error('identification_type') {{('is-invalid')}} @enderror">
                                    <option value="" selected="" hidden="">---Select Type---</option>
                                    <option value="Passport" @if(old('identification_type') ?? $identification->identification_type == 'Passport'){{('selected')}}@endif>Passport</option>
                                    <option value="Drivers Licence" @if(old('identification_type') ?? $identification->identification_type == 'Drivers Licence'){{('selected')}}@endif>Drivers Licence</option>
                                    <option value="Medicare Card" @if(old('identification_type') ?? $identification->identification_type == 'Medicare Card'){{('selected')}}@endif>Medicare Card</option>
                                </select>
                                @error('identification_type')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="identification_number" class="col-form-label">Identification Number:</label>
                                <input type="text" name="identification_number" class="form-control @error('identification_number') is-invalid @enderror" placeholder="Identification Number" value="{{(old('identification_number') ?? $identification->identification_number)}}">
                                @error('identification_number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="identification_expiry" class="col-form-label">Identification Expiry:</label>
                                <input type="date" name="identification_expiry" class="form-control @error('identification_expiry') is-invalid @enderror" placeholder="Identification Number" value="{{(old('identification_expiry') ?? $identification->identification_expiry)}}" min="{{date('Y-m-d')}}" onkeypress="return false;">
                                @error('identification_expiry')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="firm-group col-md-6">
                                <label for="identification_expiry" class="col-form-label">Are you a concession card holder?</label>
                                <br>
                                <input class="concession_card_holder d-inline-block" type="radio" @if($identification->concession_card_holder == 1){{('checked')}}@endif name="concession_card_holder" id="card_yes" value="1" class="d-inline-block">
                                <label for="card_yes">YES</label>
                                <input class="concession_card_holder d-inline-block" type="radio" @if($identification->concession_card_holder == 0){{('checked')}}@endif name="concession_card_holder" id="card_no" value="0" class="d-inline-block">
                                <label for="card_no">NO</label>
                            </div>

                            <div class="form-group col-md-6 concession_card_holderRelated @if($identification->concession_card_holder == 0){{('d-none')}}@endif">
                                <label for="type_of_concession_card" class="col-form-label">Type of concession card</label>
                                <select name="type_of_concession_card" class="form-control @error('type_of_concession_card') {{('is-invalid')}} @enderror">
                                    <option value="" selected="" hidden="">---Select Type---</option>
                                    <option value="Commonwealth Seniors Health Card" @if(old('type_of_concession_card') ?? $identification->type_of_concession_card == 'Commonwealth Seniors Health Card'){{('selected')}}@endif>Commonwealth Seniors Health Card</option>
                                    <option value="Seniors Card" @if(old('type_of_concession_card') ?? $identification->type_of_concession_card == 'Seniors Card'){{('selected')}}@endif>Seniors Card</option>
                                    <option value="Other concession cards" @if(old('type_of_concession_card') ?? $identification->type_of_concession_card == 'Other concession cards'){{('selected')}}@endif>Other concession cards</option>
                                    <option value="Low Income Health Care Card" @if(old('type_of_concession_card') ?? $identification->type_of_concession_card == 'Low Income Health Care Card'){{('selected')}}@endif>Low Income Health Care Card</option>
                                </select>
                                @error('type_of_concession_card')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.changepassword.save')}}">
                        @csrf
                        
                        <div class="form-group col-md-6">
                            <label for="old_password" class="col-form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" autofocus="" placeholder="Old password" value="{{old('old_password')}}">
                            @error('old_password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password" class="col-form-label">New Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New password">
                            @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                        </div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','a#copyToClipboard',function(){
                $(this).siblings('input#linkToCopy').select();
                document.execCommand("copy");
                $(".toast").toast('show');
            });
            
            $(document).on('click','.concession_card_holder',function(){
                var thisClicked = $(this).val();
                if(thisClicked == 1 || thisClicked == '1'){
                    $('.concession_card_holderRelated').removeClass('d-none');
                }else{
                    $('.concession_card_holderRelated').addClass('d-none');
                }
            });
            $('.concession_card_holder')

        });
    </script>
@stop
@endsection
