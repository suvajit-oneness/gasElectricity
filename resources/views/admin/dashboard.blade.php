@extends('layouts.master')
@section('title','Dashboard')
<style>
.gpcVCf {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    text-decoration: none !important;
}
.icon-sec i{
    font-size: 28px;
    color: #9ea9bd;
}
.text-sec{
    padding-left: 15px;
    border-left: 1px solid #efefef;
}
.text-sec h3{
    font-size: 22px;
    margin-bottom: 5px;
    font-weight: 400;
    line-height: 24px;
    color: #3f4b60;
}
.text-sec h3 span{
    font-size: 13px;
    color: rgb(134, 142, 174);
    font-weight: 400;
    display: block;
}
</style>
@section('content')

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="dash_card">
                <div class="card-header dashboard-header">
                    <h5 class="mb-0">Admin Dashboard</h5>
                </div>
                <div class="card-body">
                    <!-- <p>Welcome to the Dashboard</p> -->
                    <div class="dashboard-body-content-upper p-0">
                        <div class="row m-0">
                            <div class="col-12 col-md-4 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0 p-0">
                                    <div class="card-body card-body-inner">
                                        <a href="{{route('admin.users')}}?userType=2" class="gpcVCf">
                                            <div class="icon-sec card-1">
                                                <img src="{{asset('image/agreement.png')}}">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{count($data->supplier)}} <span>Total Suppliers</span></h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0">
                                   <div class="card-body card-body-inner">
                                        <a href="{{route('admin.users')}}?userType=3" class="gpcVCf">
                                            <div class="icon-sec card-2">
                                                <img src="{{asset('image/team.png')}}">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{count($data->customer)}} <span>New Customers</span></h3>
                                            </div>
                                        </a>
                                   </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0">
                                   <div class="card-body card-body-inner">
                                        <a href="{{route('admin.report.rfqs')}}" class="gpcVCf">
                                            <div class="icon-sec card-3">
                                                <img src="{{asset('image/customer-service.png')}}" height="40" width="40">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{count($data->rfqs)}} <span>Total Customer Requests</span></h3>
                                            </div>
                                        </a>
                                   </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0 p-0">
                                   <div class="card-body card-body-inner">
                                        <a href="{{route('admin.users')}}?userType=2" class="gpcVCf">
                                            <div class="icon-sec card-1">
                                                <img src="{{asset('image/office-building.png')}}">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{$data->company}} <span>Companies registered</span></h3>
                                            </div>
                                        </a>
                                   </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0">
                                   <div class="card-body card-body-inner">
                                        <a href="{{route('admin.users')}}?userType=3" class="gpcVCf">
                                            <div class="icon-sec card-2">
                                                <img src="{{asset('image/product 4.png')}}">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{$data->products}} <span>Products uploaded</span></h3>
                                            </div>
                                        </a>
                                   </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0">
                                   <div class="card-body card-body-inner">
                                        <a href="{{route('admin.blogs')}}" class="gpcVCf">
                                            <div class="icon-sec card-3">
                                                <img src="{{asset('image/blogger.png')}}" height="40" width="40">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{$data->blogs}} <span>Total no of Blogs</span></h3>
                                            </div>
                                        </a>
                                   </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-0 mt-4">
                            <div class="col-12 col-md-12 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0 p-0">
                                   <div class="card-body card-body-inner">
                                        <h3 class="mb-4">Latest 5 Customer Requests</h3>

                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>User Info</th>
                                                    <th>Looking to Compare</th>
                                                    <th>Type of Property</th>
                                                    <th>Kwh Usage</th>
                                                    <th>Kwh Rate</th>
                                                    <th>Service Charged Rate</th>
                                                    <th>Service Charged Period</th>
                                                    <th>Electricity Usage</th>
                                                    <th>Emailed this Request</th>
                                                    <th>Date</th>
                                                    <th>Contacted By</th>
                                                    <th>Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->rfqs as $rfqIndex => $rfq)
                                                    @php if($rfqIndex == 5) {break;}  @endphp
                                                    @php
                                                        $user = $rfq->user;
                                                        $resolvedBy = $rfq->contacted_by;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            @if($user)
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <p class="mb-0">{{$user->name}}</p>
                                                                        <p class="text-muted mb-0">{{$user->email}}</p>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                {{('N/A')}}
                                                            @endif
                                                        </td>
                                                        <td>{{strtoupper($rfq->energy_type)}}</td>
                                                        <td>{{strtoupper($rfq->type_of_property)}}</td>
                                                        <td>{{strtoupper($rfq->kwh_usage)}}</td>
                                                        <td>{{strtoupper($rfq->kwh_rate)}}</td>
                                                        <td>{{strtoupper($rfq->serviceChargedRate)}}</td>
                                                        <td>{{strtoupper($rfq->serviceChargedPeriod)}}</td>
                                                        <td>{{strtoupper($rfq->electricity_usage)}}</td>
                                                        <td>@if($rfq->email_request == 1){{('Yes')}}@else{{('NO')}}@endif</td>
                                                        <td>{{date('d M, Y',strtotime($rfq->created_at))}}</td>
                                                        <td>
                                                            @if($resolvedBy)
                                                                <a href="javascript:void(0)" class="seeDetails" data-id="{{$resolvedBy->id}}" data-name="{{$resolvedBy->name}}" data-email="{{$resolvedBy->email}}" data-mobile="{{$resolvedBy->mobile}}">{{$resolvedBy->name}}</a>
                                                            @else
                                                                <a href="javascript:void(0)" class="contactUpdate" data-id="{{$rfq->id}}">N/A</a>
                                                            @endif
                                                        </td>
                                                        <td>{{$rfq->remarks}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                   </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-0 mt-4">
                            <div class="col-12 col-md-12 mb-3 pl-0">
                                <div class="mb-0 shadow-sm border-0 p-0">
                                   <div class="card-body card-body-inner">
                                        <h3 class="mb-4">Recent 10 Customers</h3>

                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>User Type</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Referral Code</th>
                                                    <th>Referred By</th>
                                                    <th>Count Referred To</th>
                                                    <!-- <th>Total Points</th> -->
                                                    <th>Details</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->customer as $userIndex => $user)
                                                    @php if($userIndex == 10) {break;}  @endphp
                                                    <tr>
                                                        <td>
                                                            @php
                                                                $userType = 'User';
                                                                switch($user->user_type){
                                                                    case 1 : $userType = 'Admin';break;
                                                                    case 2 : $userType = 'Supplier';break;
                                                                    case 3 : $userType = 'Customer';break;
                                                                }
                                                            @endphp
                                                            {{$userType}}
                                                        </td>
                                                        <td class="text-center"><img height="35px" width="auto" src="{{asset($user->image)}}"></td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->mobile}}</td>
                                                        <td>{{$user->referral_code}}</td>
                                                        <td>
                                                            @if($user->referred_through)
                                                                <a href="javascript:void(0)" class="getReferredByDetails" data-details="{{json_encode($user->referred_through)}}"><i class="fa fa-eye"></i></a>
                                                            @else
                                                                {{('N/A')}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(count($user->referred_to) > 0)
                                                                <a href="{{route('admin.referral.referred_to',$user->id)}}">{{count($user->referred_to)}}</a>
                                                            @else
                                                                {{('N/A')}}
                                                            @endif
                                                        </td>
                                                        <!-- <td>
                                                            <a href="{{route('admin.user.points',$user->id)}}">{{getSumOfPoints($user->user_points)}}</a>
                                                        </td> -->
                                                        <td><a href="{{route('admin.user.details',[$user->id,'username'=>$user->name])}}"><i class="fa fa-info-circle"></i></a></td>
                                                        @if($user->user_type == 1)
                                                            <td></td>
                                                        @else
                                                            <td>
                                                                @if($user->status == 1)
                                                                    <a href="javascript:void(0)" class="text-danger blockUnblock" data-id="{{$user->id}}"><i class="fa fa-ban"></i></a>
                                                                @else
                                                                    <a href="javascript:void(0)" class="blockUnblock" data-id="{{$user->id}}"><i class="fa fa-unlock-alt"></i></a>
                                                                @endif
                                                                | <a href="javascript:void(0)" class="text-danger userDelete" data-id="{{$user->id}}"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        @endif
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
            </div>
        </div>
    </div>
</div>
@endsection