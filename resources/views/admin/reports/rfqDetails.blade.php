@extends('layouts.master')
@section('title','RFQ')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">RFQ List</h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
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
                                    <th>Contacted By</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rfqs as $rfq)
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
                    <div class="float-right">{{$rfqs->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- See Details of Resolved By -->
<div class="modal" id="seeDetails" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details of the Contacted By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="seeDetailsOfUser"></tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Submit the Remarks when Contacted -->
<div class="modal" id="submitContact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Claimed Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('admin.report.rfqSaveRemark')}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="rfqId" value="">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remarks" class="form-control" id="remarks" placeholder="Your remark" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        $(document).on('click','.seeDetails',function(){
            var Id = $(this).attr('data-id'),name = $(this).attr('data-name'),email = $(this).attr('data-email'),mobile = $(this).attr('data-mobile');
            var data = '<td>'+Id+'</td><td>'+name+'</td><td>'+email+'</td><td>'+mobile+'</td>';
            $('#seeDetails #seeDetailsOfUser').empty().append(data);
            $('#seeDetails').modal('show');
        });
        $(document).on('click','.contactUpdate',function(){
            var id = $(this).attr('data-id');
            $('#submitContact input[name=rfqId]').val(id);
            $('#submitContact #remarks').val('');
            $('#submitContact').modal('show');
        });
    </script>
@stop
@endsection
