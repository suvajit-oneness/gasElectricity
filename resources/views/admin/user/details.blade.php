@extends('layouts.master')
@section('title','Details of the user')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">User Details - {{$user->name}}
                        <a class="headerbuttonforAdd" href="{{route('admin.users')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    @php
                        $userType = 'User';
                        switch($user->user_type){
                            case 1 : $userType = 'Admin';break;
                            case 2 : $userType = 'Supplier';break;
                            case 3 : $userType = 'Customer';break;
                        }
                    @endphp
                    <h3>Type : "{{$userType}}"</h3>
                    <h3>Name : {{$user->name}}</h3>
                    <h3>Email : {{$user->email}}</h3>
                    <h3>Phone : {{$user->mobile}}</h3>
                    <h3>Referral Code : {{$user->referral_code}}</h3>
                    @if($user->user_type == 3)
                        @php $identification = user_identification($user);@endphp
                        <h4 class="text-center">Identification Details</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Number</th>
                                        <th>Expiry</th>
                                        <th>Concession Card holder</th>
                                        <th>Type of Concession card</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$identification->identification_type}}</td>
                                        <td>{{$identification->identification_number}}</td>
                                        <td>{{$identification->identification_expiry}}</td>
                                        <td>
                                            @php
                                                $consessionCard = 'No';
                                                switch($identification->concession_card_holder){
                                                    case 0 : $consessionCard = 'No';break;
                                                    case 1 : $consessionCard = 'Yes';break;
                                                }
                                            @endphp
                                            {{$consessionCard}}
                                        </td>
                                        <td>{{$identification->type_of_concession_card}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        @php $homeandUsage = user_homeandUsageDetails($user);@endphp
                        <h4 class="text-center">Home and Usage</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Service Address</th>
                                        <th>Meter Number</th>
                                        <th>NMI</th>
                                        <th>Solar</th>
                                        <th>Usage Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$homeandUsage->serviceAddress}}</td>
                                        <td>{{$homeandUsage->meterNumber}}</td>
                                        <td>{{$homeandUsage->nmi}}</td>
                                        <td>{{$homeandUsage->solar}}</td>
                                        <td>{{$homeandUsage->usageInfo}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif
                    <h4 class="text-center">Referral To List</h4>
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->referred_to as $key => $data)
                                    <tr>
                                        <td style="height: 100px; width: 100px"><img height="100px" width="100px" src="{{$data->image}}"></td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->mobile}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">

    </script>
@stop
@endsection
