@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Dashboard</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 customer-details">
                            <h6 class="name mb-0">Lorem Ipsum</h6>
                            <p class="company-name mb-0">Switcher</p>
                            <p class="address mb-0">Kolkata</p>
                            <p class="city mb-0">Kolkata</p>
                            <p class="pincode mb-0">700102</p>
                            <p class="phone-number mb-0">9876543210</p>
                            <p class="email mb-0">example@gmail.com</p>
                        </div>
                        <div class="col-lg-6 invoice-details">
                            <P class="invoice-id"><span class="invoice">Invoice Id:</span>2035</p>
                            <P class="invoice-date"><span class="invoice">Date:</span>21/09/2021</p>
                            <P class="invoice-customer-id"><span class="invoice">Customer Id:</span>2035</p>
                            <P class="invoice-terms"><span class="invoice">Terms:</span>Due upon receipt</p>
                        </div>
                    </div>
                    
                    <h3>RFQ Enquiry</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Looking to Compare</th>
                                    <th>Type of Property</th>
                                    <th>Electricity Usage</th>
                                    <th>Kwh Usage</th>
                                    <th>Kwh Rate</th>
                                    <th>Service Charged Rate</th>
                                    <th>Service Charged Period</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->rfqs as $rfq)
                                    <tr>
                                        <td>{{strtoupper($rfq->energy_type)}}</td>
                                        <td>{{strtoupper($rfq->type_of_property)}}</td>
                                        <td>{{strtoupper($rfq->electricity_usage)}}</td>
                                        <td>{{strtoupper($rfq->kwh_usage)}}</td>
                                        <td>{{strtoupper($rfq->kwh_rate)}}</td>
                                        <td>{{strtoupper($rfq->serviceChargedRate)}}</td>
                                        <td>{{strtoupper($rfq->serviceChargedPeriod)}}</td>
                                        <td>
                                            @if($rfq->resolved_by == 0)
                                                {{('We will contact you soon')}}
                                            @else
                                                {{('Closed')}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">{{$data->rfqs->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection