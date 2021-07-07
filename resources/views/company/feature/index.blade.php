@extends('layouts.master')
@section('title','Company Feature')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Feature ({{$company->id}} - {{$company->name}})
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.companies')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.companies.feature.create',$company->id)}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Company Feature
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Feature</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($company->feature as $feature)
                                    <tr>
                                        <td>{{$feature->title}}</td>
                                        <td>{!!$feature->description!!}</td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.companies.feature.edit',[$company->id,$feature->id])}}">Edit</a> | <a href="javascript:void(0)" class="deleteCompanyfeature text-danger" data-feature_id="{{$feature->id}}">Delete</a>
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

        $(document).on('click','.deleteCompanyfeature',function(){
            var deleteCompanyfeature = $(this);
            var featureId = $(this).attr('data-feature_id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Feature!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route(urlPrefix().'.companies.feature.delete',[$company->id,"+featureId+"])}}",
                        data: {companyId:'{{$company->id}}',featureId:featureId,_token:'{{csrf_token()}}'},
                        success:function(data){
                            if(data.error == false){
                                deleteCompanyfeature.closest('tr').remove();
                                swal('Success',"Poof! Feature has been deleted!", 'success');
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
