@extends('layouts.master')
@section('title','Users')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm p-3">
                <div class="card-header">
                    <h5 class="mb-0">All User List
                        <a class="headerbuttonforAdd" href="{{route('admin.user.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add User
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>User Type</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Referral Code</th>
                                    <th>Referred By</th>
                                    <th>Count Referred To</th>
                                    <!-- <th>Total Points</th> -->
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            @php
                                                $userType = 'User';
                                                switch($user->user_type){
                                                    case 1 : $userType = 'Admin';break;
                                                    case 2 : $userType = 'Supplier';break;
                                                    case 3 : $userType = 'Customer';break;
                                                }
                                            @endphp
                                            {{$userType}}
                                        </td>
                                        <td class="text-center"><img height="35px" width="auto" src="{{asset($user->image)}}"></td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile}}</td>
                                        <td>{{$user->referral_code}}</td>
                                        <td>
                                            @if($user->referred_through)
                                                <a href="javascript:void(0)" class="getReferredByDetails" data-details="{{json_encode($user->referred_through)}}"><i class="fa fa-eye"></i></a>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($user->referred_to) > 0)
                                                <a href="{{route('admin.referral.referred_to',$user->id)}}">{{count($user->referred_to)}}</a>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <!-- <td>
                                            <a href="{{route('admin.user.points',$user->id)}}">{{getSumOfPoints($user->user_points)}}</a>
                                        </td> -->
                                        <td><a href="{{route('admin.user.details',[$user->id,'username'=>$user->name])}}"><i class="fa fa-info-circle"></i></a></td>
                                        @if($user->user_type == 1)
                                            <td></td>
                                        @else
                                            <td>
                                                @if($user->status == 1)
                                                    <a href="javascript:void(0)" class="text-danger blockUnblock" data-id="{{$user->id}}"><i class="fa fa-ban"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" class="blockUnblock" data-id="{{$user->id}}"><i class="fa fa-unlock-alt"></i></a>
                                                @endif
                                                 | <a href="javascript:void(0)" class="text-danger userDelete" data-id="{{$user->id}}"><i class="fa fa-trash"></i></a>
                                            </td>
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
        $(document).on('click','.getReferredByDetails',function(){
            var details = JSON.parse($(this).attr('data-details'));
            var data = '<h3>Name : '+details.name+'</h3>';
            data += '<h3>Email : '+details.email+'</h3>';
            data += '<h3>Phone : '+details.mobile+'</h3>';
            data += '<h3>Referral Code : '+details.referral_code+'</h3>';
            $('#referredByModal #referredByData').empty().append(data);
            $('#referredByModal').modal('show');
        });

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

    </script>
@stop
@endsection
