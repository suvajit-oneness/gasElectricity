@extends('layouts.master')
@section('title','Company')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm p-3">
                <div class="card-header">
                    <h5 class="mb-0">Companies
                        @if(urlprefix() != 'admin')
                            <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.companies.create')}}">
                                <i class="fa fa-plus" aria-hidden="true"></i>Add Company
                            </a>
                        @endif
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table">
                            <thead>
                                <tr>
                                    <th>Company Id</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Features</th>
                                    <th>Discounts</th>
                                    <th>Rates Details</th>
                                    <th>Plan Details</th>
                                    @if(urlprefix() == 'admin')
                                        <th>Created By</th>
                                    @endif
                                    @if(urlprefix() != 'admin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td><img height="35px" width="auto" src="{{asset($company->logo)}}"></td>
                                        <td>{{$company->name}}</td>
                                        <td class="description"><p>{!! $company->description !!}</p>
                                            <button type="button" class="table-button" onclick="showFullDescription('Description','{{$company->description}}')">More</button>
                                        </td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.companies.feature',$company->id)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.companies.discount',$company->id)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.companies.rate',$company->id)}}" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.companies.plan',$company->id)}}" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        @if(urlprefix() == 'admin')
                                            <?php $author = $company->author;?>
                                            <td>
                                                @if($author)
                                                    <ul class="pl-0">
                                                        <li>UID : {{$author->id}}</li>
                                                        <li>Name : {{$author->name}}</li>
                                                        <li>Email : {{$author->email}}</li>
                                                    </ul>
                                                @else
                                                    {{('N/A')}}
                                                @endif
                                            </td>
                                        @endif
                                        @if(urlprefix() != 'admin')
                                            <td>
                                                <a href="{{route(urlPrefix().'.companies.edit',$company->id)}}"><i class="fa fa-edit"></i></a> | <a href="javascript:void(0)" class="deletecompany text-danger" data-id="{{$company->id}}"><i class="fa fa-trash"></i></a>
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
<!--Feature Modal -->
<div class="modal fade dashboard-modal" id="featuremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title modalHeadingForDescription" id="exampleModalLabel">All features</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body modalDescription"></div>
        </div>
    </div>
</div>
<!-- <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolores in sed illo fugit, eum porro. Iste voluptate ducimus cum, in, ex quos ipsam quaerat enim mollitia error harum consequatur.</div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolores in sed illo fugit, eum porro. Iste voluptate ducimus cum, in, ex quos ipsam quaerat enim mollitia error harum consequatur.</div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolores in sed illo fugit, eum porro. Iste voluptate ducimus cum, in, ex quos ipsam quaerat enim mollitia error harum consequatur.</div> -->
@section('script')
    <script type="text/javascript">
        
        function showFullDescription(heading, description){
            $('#featuremodal .modalHeadingForDescription').empty().append(heading);
            $('#featuremodal .modalDescription').empty().append(description);
            $('#featuremodal').modal('show');
        }

        $(document).on('click','.deletecompany',function(){
            var deletecompany = $(this);
            var companyId = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this company!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route(urlPrefix().'.companies.delete',"+companyId+")}}",
                        data: {id:companyId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deletecompany.closest('tr').remove();
                                swal('Success',"Poof! Your company has been deleted!", 'success');
                            }else{
                                swal('Error',data.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@stop
@endsection
