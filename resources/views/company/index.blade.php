@extends('layouts.master')
@section('title','Company')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Companies
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.companies.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Company
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Company Id</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td style="height: 100px; width: 100px"><img height="100px" width="100px" src="{{asset($company->logo)}}"></td>
                                        <td>{{$company->name}}</td>
                                        <td>{!! $company->description !!}</td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.companies.edit',$company->id)}}">Edit</a> | <a href="javascript:void(0)" class="deletecompany text-danger" data-id="{{$company->id}}">Delete</a>
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
