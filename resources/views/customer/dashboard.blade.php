@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Welcome, {{Auth::user()->name}}</h5>
                </div>
                <div class="card-body">
                    @if($data->userProductChoice)
                        <div class="row">
                            @php
                                $product = $data->userProductChoice->product_data;
                                $rfq = $data->userProductChoice->rfq_data;
                            @endphp
                            @if($product && $rfq)
                                <div class="col-lg-6 customer-details">
                                    <h4 class="name mb-0">Product Info</h4>
                                    <p class="company-name mb-0">{{$product->name}}</p>
                                    <h4 class="name mb-0">Seller</h4>
                                    <p class="address mb-0">{{$product->author->name}}</p>
                                    <p class="city mb-0">{{$product->author->email}}</p>
                                </div>
                                <div class="col-lg-6 invoice-details">
                                    <P class="invoice-id"><span class="invoice">Enquiry Id:</span>{{$rfq->id}}</p>
                                    <P class="invoice-date"><span class="invoice">Date:</span>{{date('d M, Y',strtotime($rfq->created_at))}}</p>
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    <h3>Your Enquiry</h3>
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
                                    <th>Date</th>
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
                                        <td>{{date('d M, Y',strtotime($rfq->created_at))}}</td>
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