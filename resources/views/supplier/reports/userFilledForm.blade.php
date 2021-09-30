@extends('layouts.master')
@section('title','User Contacted')
@section('content')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">User Form Info</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Info Id</th>
                                    <th>User Info</th>
                                    <th>For Company</th>
                                    <th>For Product</th>
                                    <th>RFQ Data</th>
                                    <th>Rfq Emailed</th>
                                    <th>Info Data</th>
                                    <th>Date / Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($info as $index => $inf)
                                    @php
                                        $user = $inf->user;
                                        $company = $inf->company;
                                        $product = $inf->product;
                                        $rfq = $inf->rfq_details;
                                    @endphp
                                    <tr>
                                        <td>{{$inf->id}}</td>
                                        <td>
                                            @if($user)
                                                <ul>
                                                    <li>Name : {{$user->name}}</li>
                                                    <li>Email : {{$user->email}}</li>
                                                </ul>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>{{($company ? $company->name : 'N/A')}}</td>
                                        <td>{{($product ? $product->name : 'N/A')}}</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="getDetailsofRFQInfo('{{$inf->id}}')"><i class="fa fa-eye"></i></a>
                                            @if($rfq)
                                                <!-- Modal View Start -->
                                                <div class="modal fade" id="userFormRFQInfo{{$inf->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Details Of RFQ</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-striped table-bordered" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Question</th>
                                                                            <th>Answer</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Looking to Compare</th>
                                                                            <td>{{strtoupper($rfq->energy_type)}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Type of Property</th>
                                                                            <td>{{strtoupper($rfq->type_of_property)}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Rent / OWN</th>
                                                                            <td>{{strtoupper($rfq->property_type)}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Moving Into Property</th>
                                                                            <td>{{strtoupper($rfq->areyoumovingintothisproperty)}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Moving Date</th>
                                                                            <td>{{($rfq->moving_date == '0000-00-00') ? 'N/A' : date('d M, Y',strtotime($rfq->moving_date))}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Entertainment Service</th>
                                                                            <td>{{strtoupper($rfq->entertainment_service)}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Gas Connection</th>
                                                                            <td>{{strtoupper($rfq->gas_connection)}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Electricity Usage</th>
                                                                            <td>{{strtoupper($rfq->electricity_usage)}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal View End -->
                                            @endif
                                        </td>
                                        <td>@if($rfq->email_request == 1){{('Yes')}}@else{{('NO')}}@endif</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="getDetailsofFormInfo('{{$inf->id}}')"><i class="fa fa-eye"></i></a>
                                            <!-- Modal View Start -->
                                            <div class="modal fade" id="userFormFilledInfo{{$inf->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Details Of Info</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Question</th>
                                                                        <th>Answer</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $infoHistory = getFormHistoryInfo($supplierForm,$inf->user_form_details); @endphp
                                                                    @if(count($infoHistory) > 0)
                                                                        @foreach($infoHistory as $index => $history)
                                                                            <tr>
                                                                                <td>{{$history['label']}}</td>
                                                                                <td>{{$history['value']}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal View End -->
                                        </td>
                                        <td>{{date('M d,Y / H:i:A',strtotime($inf->created_at))}}</td>
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
    <script>
        function getDetailsofFormInfo(infoId){
            $('#userFormFilledInfo'+infoId).modal('show');
        }

        function getDetailsofRFQInfo(infoId){
            $('#userFormRFQInfo'+infoId).modal('show');
        }
    </script>
@stop
@endsection