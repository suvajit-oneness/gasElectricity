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
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Admin Dashboard</h5>
                </div>
                <div class="card-body">
                    <!-- <p>Welcome to the Dashboard</p> -->
                    <div class="dashboard-body-content-upper p-0">
                        <div class="row m-0">
                            <div class="col-12 col-md-3 mb-3">
                                <div class="card shadow-sm border-0">
                                   <div class="card-body">
                                        <a href="{{route('admin.users')}}?userType=2" class="gpcVCf">
                                            <div class="icon-sec w-25">
                                                <img src="{{asset('image/total_vendors.png')}}">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{count($data->supplier)}} <span>Total Suppliers</span></h3>
                                            </div>
                                        </a>
                                   </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <div class="card shadow-sm border-0">
                                   <div class="card-body">
                                        <a href="{{route('admin.users')}}?userType=3" class="gpcVCf">
                                            <div class="icon-sec w-25">
                                                <img src="{{asset('image/total_customers.png')}}">
                                            </div>
                                            <div class="text-sec">
                                                <h3>{{count($data->customer)}} <span>New Customers</span></h3>
                                            </div>
                                        </a>
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