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
                            <form action="{{ route('admin.report.tracking') }}" method="GET" role="search">
                                <div class="input-group">
                                  
    
                                    {{-- <select name="stage" id="" class="form-control form-control-sm">
                                        <option value="" hidden {{ (request()->stage) ? '' : 'selected' }}>Select stage...</option>
                                        <option value="1" {{ (request()->stage) ? (request()->stage == 1 ? 'selected' : '') : '' }}>1</option>
                                        <option value="2" {{ (request()->stage) ? (request()->stage == 2 ? 'selected' : '') : '' }}>2</option>
                                        <option value="3" {{ (request()->stage) ? (request()->stage == 3 ? 'selected' : '') : '' }}>3</option>
                                        <option value="4" {{ (request()->stage) ? (request()->stage == 4 ? 'selected' : '') : '' }}>4</option>
                                    </select> --}}
    
                                    {{-- <div class="input-group-append">
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
                                    </div> --}}
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
                                    <th>User Name</th>
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
                                        <td>{{strtoupper($tracking->user?$tracking->user->name : 'N/A')}}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection