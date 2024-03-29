@extends('layouts.master')
@section('title','RFQ')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">RFQ List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
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
                                @foreach($rfqs as $rfq)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection
