@extends('layouts.master')
@section('title','OCR')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">OCR Report</h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Full Text</th>
                                    <th>State</th>
                                    <th>Pincode</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Unit-consumption</th>
                                    <th>Bill Amount</th>
                                    <th>Uploaded By</th>
                                    <th>Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ocr_data as $index => $ocr)
                                    <tr>
                                        <td>{{$ocr->id}}</td>
                                        <td>{{$ocr->full_text}}</td>
                                        <td>{{$ocr->state}}</td>
                                        <td>{{$ocr->pincode}}</td>
                                        <td>{{$ocr->name}}</td>
                                        <td>{{$ocr->email}}</td>
                                        <td>{{$ocr->phone}}</td>
                                        <td>{{$ocr->unit_consumed}}</td>
                                        <td>{{$ocr->bill_amount}}</td>
                                        <td>N/A</td>
                                        <td>{{date('d M, Y h:i A',strtotime($ocr->created_at))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">{{ $ocr_data->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript"></script>
@stop
@endsection
