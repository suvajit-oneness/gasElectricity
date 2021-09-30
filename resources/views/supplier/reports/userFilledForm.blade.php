@extends('layouts.master')
@section('title','User Contacted')
@section('content')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                @if(count($supplier) > 0)
                    <form method="post" action="{{route('admin.report.user_enrolled')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label for="suppliers">Suppliers</label>
                                <select name="supplier" class="form-control" id="suppliers">
                                    <option value="" selected="" hidden="">Select Supplier</option>
                                    @foreach($supplier as $index => $suppl)
                                        <option value="{{$suppl->id}}" @if(($req->supplier ?? '') == $suppl->id){{('selected')}}@endif>{{$suppl->name}} {{$suppl->email}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- <div class="col-md-3">
                                <label for="dateFrom">Date from</label>
                                <input type="date" class="form-control form-control-sm mr-2" placeholder="Date from" name="dateFrom" id="dateFrom" max="{{date('Y-m-d')}}" value="{{($req->dateFrom ?? '')}}">
                            </div>

                            <div class="col-md-3">
                                <label for="dateTo">Date to</label>
                                <input type="date" class="form-control form-control-sm mr-2" placeholder="Date to" name="dateTo" id="dateTo" max="{{date('Y-m-d')}}" value="{{($req->dateTo ?? '')}}">
                            </div> -->

                            <div class="col-md-3 text-right">
                                <div style="margin-top: 30px"></div>
                                <button type="submit" class="btn btn-sm btn-primary mr-2"> <i class="fa fa-check"></i> Apply</button>
                            </div>
                        </div>
                    </form>
                @endif
                <div class="card-header">
                    <h5 class="mb-0">User Enrolled</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Info Id</th>
                                    <th>User Info</th>
                                    <th>For Company</th>
                                    <th>For Product</th>
                                    <th>RFQ Data</th>
                                    <th>RFQ Emailed</th>
                                    <th>Form Filled Data</th>
                                    <th>Date / Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userEnrolled as $index => $enrolled)
                                    <tr>
                                        <td>{{$enrolled->id}}</td>
                                        <td>
                                            @if($enrolled->user_data)
                                                <ul>
                                                    <li>Name : {{$enrolled->user_data->name}}</li>
                                                    <li>Email : {{$enrolled->user_data->email}}</li>
                                                </ul>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($enrolled->product_data)
                                                @if($enrolled->product_data->company)
                                                    {{$enrolled->product_data->company->name}}
                                                @else
                                                    {{('N/A')}}
                                                @endif
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($enrolled->product_data)
                                                {{$enrolled->product_data->name}}
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="getDetailsofRFQInfo('{{$enrolled->id}}')"><i class="fa fa-eye"></i></a>
                                            @if($enrolled->rfq_data)
                                                @php $rfq = $enrolled->rfq_data; @endphp
                                                <!-- Modal View Start -->
                                                <div class="modal fade" id="userFormRFQInfo{{$enrolled->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                            <th>Gas/Electricity Usage</th>
                                                                            <td>{{strtoupper($rfq->electricity_usage)}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>KWH Usage</th>
                                                                            <td>{{$rfq->kwh_usage}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>KWH Rate</th>
                                                                            <td>{{$rfq->kwh_rate}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Service Charge Period</th>
                                                                            <td>{{$rfq->serviceChargedPeriod}} days</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Service Charge Rate</th>
                                                                            <td>{{$rfq->serviceChargedRate}}</td>
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
                                        <td>
                                            @if($enrolled->rfq_data)
                                                @if($rfq->email_request == 1){{('Yes')}}@else{{('NO')}}@endif
                                            @else
                                                {{('NO')}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($enrolled->userFilledForm)
                                                <a href="javascript:void(0)" onclick="getDetailsofFormInfo('{{$enrolled->id}}')"><i class="fa fa-eye"></i></a>
                                                <!-- Modal View Start -->
                                                <div class="modal fade" id="userFormFilledInfo{{$enrolled->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Details Of Form Filled Info</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Question</th>
                                                                            <th>Answer</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php $infoHistory = getFormHistoryInfo($supplierForm,$enrolled->userFilledForm->user_form_details); @endphp
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
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>{{date('M d,Y / H:i:A',strtotime($enrolled->created_at))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">{{ $userEnrolled->links() }}</div>
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