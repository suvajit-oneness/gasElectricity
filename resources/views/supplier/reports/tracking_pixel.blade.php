@extends('layouts.master')
@section('title','Traking Pixel')
@section('content')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Customer Tracking List</h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                    <div class="row justify-content-end">
                        <div class="col-sm-8 text-right">
                            <form action="#" method="GET" role="search">
                                <div class="input-group">
                                  <span class="input-group-btn">
                                        <button class="btn btn-info btn-sm rounded-0" type="submit" title="Search projects">
                                            <i class="fas"></i> From
                                        </button>
                                    </span>
                                    <input type="date" class="form-control form-control-sm" name="from" placeholder="What are you looking for..." id="from" value="{{ (request()->from) ? request()->from : '' }}" autocomplete="off" max="{{date('Y-m-d')}}">
                                    <div class="input-group-append">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-sm rounded-0" type="submit" title="Search projects">
                                                <i class="fas"></i> To
                                            </button>
                                        </span>
                                    </div>
                                    <input type="date" class="form-control form-control-sm" name="to" placeholder="What are you looking for..." id="to" value="{{ (request()->to) ? request()->to : '' }}" autocomplete="off" max="{{date('Y-m-d')}}">
    
                                    <select name="stage" id="" class="form-control form-control-sm">
                                        <option value="" hidden {{ (request()->stage) ? '' : 'selected' }}>Select stage...</option>
                                        <option value="1" {{ (request()->stage) ? (request()->stage == 1 ? 'selected' : '') : '' }}>1</option>
                                        <option value="2" {{ (request()->stage) ? (request()->stage == 2 ? 'selected' : '') : '' }}>2</option>
                                        <option value="3" {{ (request()->stage) ? (request()->stage == 3 ? 'selected' : '') : '' }}>3</option>
                                        <option value="4" {{ (request()->stage) ? (request()->stage == 4 ? 'selected' : '') : '' }}>4</option>
                                    </select>
    
                                    <div class="input-group-append">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-sm rounded-0" type="submit" title="Search projects">
                                                <i class="fas"></i> Apply
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-btn">
                                            <a href="{{ route('admin.report.tracking') }}" class="btn btn-info btn-sm rounded-0">
                                                <i class="fas"></i> Remove
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>User</th>
                                    <th>Retailer</th>
                                    <th>Stage</th>
                                    <th>IP</th>
                                    <th>Page</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    {{-- <th>Button Name</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trackingPixels as $key => $tracking)
                                    <tr>
                                        <td>{{strtoupper($key +1)}}</td>
                                        <td>{{strtoupper($tracking->user ? $tracking->user->name : 'N/A')}}</td>
                                        <td>{{strtoupper($tracking->company ? $tracking->company->author->name : 'N/A')}}</td>
                                        <td> <h5 class="badge badge-dark fw-bold rounded-0" style="font-size: 18px">{{$tracking->stage}}</h5> </td>
                                        <td>{{strtoupper($tracking->ip)}}</td>
                                        <td>{{$tracking->page}}</td>
                                        <td>{{$tracking->desc}}</td>
                                        <td>{{strtoupper($tracking->time)}}</td>
                                        {{-- <td>{{strtoupper($tracking->button_id)}}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                    {{-- <div class="float-right">{{$trackingPixels->links()}}</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- See Details of Resolved By -->
{{-- <div class="modal" id="seeDetails" tabindex="-1" role="dialog">
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
</div> --}}

<!-- Submit the Remarks when Contacted -->
{{-- <div class="modal" id="submitContact" tabindex="-1" role="dialog">
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
</div> --}}


@endsection