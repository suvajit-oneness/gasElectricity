@extends('layouts.master')
@section('title','Membership')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Membership List
                        <a class="headerbuttonforAdd" href="{{route('admin.membership.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Membership
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($membership as $member)
                                    <tr>
                                        <td>{{$member->title}}</td>
                                        <td>{!! $member->description !!}</td>
                                        <td>$ {{$member->price}}</td>
                                        <td>{{$member->duration}} Year</td>
                                        <td class="text-center">
                                            <div class="toggle-button-cover margin-auto">
                                                <div class="button-cover">
                                                    <div class="button-togglr b2" id="button-11">
                                                        <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-member_id="{{ $member->id }}" {{ $member->is_active == 1 ? 'checked' : '' }}>
                                                        <div class="knobs"><span>Inactive</span></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example4').DataTable();
        });

        $('input[id="toggle-block"]').change(function() {
            var membership_id = $(this).data('member_id');
            var CSRF_TOKEN = '{{csrf_token()}}';
            var check_status = 0;
            if($(this).is(":checked")){
                check_status = 1;
            }
            $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.membership.updateMembershipStatus')}}",
                data:{ _token: CSRF_TOKEN, id:membership_id, is_active:check_status},
                success:function(response)
                {
                    if(response.error == false){
                        swal("Success!", response.message, "success");
                    }else{
                        swal("Error!", response.message, "error");
                    }
                },
                error: function(response)
                {
                    swal("Error!", response.message, "error");
                }
            });
        });
    </script>
@stop
@endsection
