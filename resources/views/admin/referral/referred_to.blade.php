@extends('layouts.master')
@section('title','Users')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">User List Referred By ({{$user->name}}) - (Referral Code : {{$user->referral_code}})
                        @if($user->user_type == 1)
                            <a class="headerbuttonforAdd" href="{{route('admin.user.create')}}">
                                <i class="fa fa-plus" aria-hidden="true"></i>Add User
                            </a>
                        @endif
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    @if($user->user_type == 1)
                                        <th>Referral Code</th>
                                        <th>Referred By</th>
                                        <th>Count Referred To</th>
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->referred_to as $key => $data)
                                    <tr>
                                        <td style="height: 100px; width: 100px"><img height="100px" width="100px" src="{{$data->image}}"></td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->mobile}}</td>
                                        @if($user->user_type == 1)
                                            <td>{{$data->referral_code}}</td>
                                            <td>
                                                @if($data->referred_through)
                                                    <a href="javascript:void(0)" class="getReferredByDetails" data-details="{{json_encode($data->referred_through)}}"><i class="fa fa-eye"></i></a>
                                                @else
                                                    {{('N/A')}}
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($data->referred_to) > 0)
                                                    <a href="{{route('admin.referral.referred_to',$data->id)}}">{{count($data->referred_to)}}</a>
                                                @else
                                                    {{('N/A')}}
                                                @endif
                                            </td>
                                            @if($data->user_type == 1)
                                                <td></td>
                                            @else
                                                <td>
                                                    @if($data->status == 1)
                                                        <a href="javascript:void(0)" class="text-danger blockUnblock" data-id="{{$data->id}}"><i class="fa fa-ban"></i></a>
                                                    @else
                                                        <a href="javascript:void(0)" class="blockUnblock" data-id="{{$data->id}}"><i class="fa fa-unlock-alt"></i></a>
                                                    @endif
                                                     | <a href="javascript:void(0)" class="text-danger userDelete" data-id="{{$user->id}}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            @endif
                                        @endif
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

<!-- Modal -->
<div class="modal fade" id="referredByModal" tabindex="-1" role="dialog" aria-labelledby="referredByModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referredByModalLabel">Referred By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="referredByData"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        @if($user->user_type == 1)
            $(document).on('click','.userDelete',function(){
                var userId = $(this).attr('data-id');
                var thisClickedbtn = $(this);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this user!",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        allinOneManageUsers(userId,'delete',thisClickedbtn)
                    }
                });
            });

            $(document).on('click','.blockUnblock',function(){
                var userId = $(this).attr('data-id');
                var thisClickedbtn = $(this);
                var action = 'unblock';
                if(thisClickedbtn.hasClass('text-danger')){
                    action = 'block';
                }
                allinOneManageUsers(userId,action,thisClickedbtn);
            });

            function allinOneManageUsers(userId,action,clickedBtn)
            {
                $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:"{{route('admin.user.manageUser')}}",
                    data: {userId:userId,action:action,'_token': $('input[name=_token]').val()},
                    success:function(data){
                        if(data.error == false){
                            if(action == 'delete'){
                                clickedBtn.closest('tr').remove();
                                swal('Success',"Poof! Your user has been deleted!");
                            }else{
                                if(action == 'block'){
                                    clickedBtn.removeClass('text-danger');
                                    clickedBtn.empty().append('<i class="fa fa-unlock-alt"></i>');
                                }else{
                                    clickedBtn.addClass('text-danger');  
                                    clickedBtn.empty().append('<i class="fa fa-ban"></i>');
                                }
                            }
                        }else{
                            swal('Error',data.message);
                        }
                    }
                });
            }
        @endif

        $(document).on('click','.getReferredByDetails',function(){
            var details = JSON.parse($(this).attr('data-details'));
            console.log(details);
            var data = '<h3>Name : '+details.name+'</h3>';
            data += '<h3>Email : '+details.email+'</h3>';
            data += '<h3>Phone : '+details.mobile+'</h3>';
            data += '<h3>Referral Code : '+details.referral_code+'</h3>';
            $('#referredByModal #referredByData').empty().append(data);
            $('#referredByModal').modal('show');
        });

    </script>
@stop
@endsection
