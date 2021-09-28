@extends('layouts.master')
@section('title','Home & Usage Details')
@section('content')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Home & usage Details</h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.home_and_usage.details.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="serviceAddress" class="col-form-label">Service Address:</label>
                                <input type="text" name="serviceAddress" class="form-control @error('serviceAddress') is-invalid @enderror" placeholder="Service Address" value="{{(old('serviceAddress') ?? $homeAndUsage->serviceAddress)}}">
                                @error('serviceAddress')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="meterNumber" class="col-form-label">Meter Number:</label>
                                <input type="text" name="meterNumber" class="form-control @error('meterNumber') is-invalid @enderror" placeholder="Meter number" value="{{(old('meterNumber') ?? $homeAndUsage->meterNumber)}}">
                                @error('meterNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="nmi" class="col-form-label">NMI:</label>
                                <input type="text" name="nmi" class="form-control @error('nmi') is-invalid @enderror" placeholder="NMI" value="{{(old('nmi') ?? $homeAndUsage->nmi)}}">
                                @error('nmi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="solar" class="col-form-label">Solar:</label>
                                <input type="text" name="solar" class="form-control @error('solar') is-invalid @enderror" placeholder="Solar" value="{{(old('solar') ?? $homeAndUsage->solar)}}">
                                @error('solar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="usageInfo" class="col-form-label">Usage Info:</label>
                                <input type="text" name="usageInfo" class="form-control @error('usageInfo') is-invalid @enderror" placeholder="Usage Info" value="{{(old('usageInfo') ?? $homeAndUsage->usageInfo)}}">
                                @error('usageInfo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label><b>Do you require life support medical equipment?</b></label>
                                <input type="radio" class="requireLifeSupportMedicalEquipment d-inline-block" name="requireLifeSupportMedicalEquipment" value="yes" @if($user->requireLifeSupportMedicalEquipment == 'yes'){{('checked')}}@endif>Yes
                                <input type="radio" class="requireLifeSupportMedicalEquipment d-inline-block" name="requireLifeSupportMedicalEquipment" value="no" @if($user->requireLifeSupportMedicalEquipment == 'no'){{('checked')}}@endif>No
                            </div>
                        </div>

                        <div id="nextFieldTobeAppear" class="@if($user->requireLifeSupportMedicalEquipment == 'no') d-none @endif">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label><b>Do you gas or electricity to operate life support medical equipment?</b></label>
                                    <input type="radio" class="operateLifeSupportMedicalEquipment d-inline-block" name="operateLifeSupportMedicalEquipment" value="yes" @if($user->operateLifeSupportMedicalEquipment == 'yes'){{('checked')}}@endif>Yes
                                    <input type="radio" class="operateLifeSupportMedicalEquipment d-inline-block" name="operateLifeSupportMedicalEquipment" value="no" @if($user->operateLifeSupportMedicalEquipment == 'no'){{('checked')}}@endif>No
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label><b>Life support machine type?</b></label>
                                    <select name="LifeSupportMachineType" class="form-control">
                                        <option value="" selected="" hidden="">Select Machine Type</option>
                                        <option value="Feeding tube" @if($user->LifeSupportMachineType == 'Feeding tube'){{('selected')}}@endif>Feeding tube</option>
                                        <option value="Parenteral nutrition" @if($user->LifeSupportMachineType == 'Parenteral nutrition'){{('selected')}}@endif>Parenteral nutrition</option>
                                        <option value="Mechanical ventilation" @if($user->LifeSupportMachineType == 'Mechanical ventilation'){{('selected')}}@endif>Mechanical ventilation</option>
                                        <option value="Others" @if($user->LifeSupportMachineType == 'Others'){{('selected')}}@endif>Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
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
        $(document).on('click','.requireLifeSupportMedicalEquipment',function(){
            var thisRadiobtn = $(this);
            if(thisRadiobtn.val() == 'yes'){
                $('#nextFieldTobeAppear').removeClass('d-none');
            }else{
                $('#nextFieldTobeAppear').addClass('d-none');
            }
        });
    </script>
@stop
@endsection
