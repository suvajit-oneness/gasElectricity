@extends('layouts.master')
@section('title','Company Rate')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Company Rate : ({{$company->id}} - {{$company->name}})
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.companies')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                        <a class="headerbuttonforAdd addRateModal" href="javascript:void(0)">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Company Rate
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Rate Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($company->company_rates as $rate)
                                    <tr>
                                        <td>@if($rate->type == 1){{('Single Rate')}}@elseif($rate->type == 2){{('Single + Controlled')}}@else{{('Time of Use')}}@endif</td>
                                        <td>{{$rate->title}}</td>
                                        <td>{!!$rate->description!!}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="editRateModal" data-details="{{json_encode($rate)}}">Edit</a> | <a href="javascript:void(0)" class="deleteCompanyRate text-danger" data-feature_id="{{$rate->id}}">Delete</a>
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

<!-- Add Rate Details -->
<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelAdd" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelAdd">Add Company Rate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route(urlPrefix().'.companies.rate.saveorUpdate',$company->id)}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="form_type" value="add">
                    <input type="hidden" name="companyId" value="{{$company->id}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Type</label>
                            <select name="type" class="form-control @error('type'){{('is-invalid')}}@enderror">
                                <option value="1" @if(old('type') == 1){{('selected')}}@endif>Single Rate</option>
                                <option value="2" @if(old('type') == 2){{('selected')}}@endif>Single + Controlled</option>
                                <option value="3" @if(old('type') == 3){{('selected')}}@endif>Time of Use</option>
                            </select>
                            @error('type')<span class="text-danger errorMessage">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control @error('title'){{('is-invalid')}}@enderror" value="{{old('title')}}" placeholder="Rate Title">
                            @error('title')<span class="text-danger errorMessage">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
                            @error('description')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Rate Details -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelEdit">Edit Company Rate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route(urlPrefix().'.companies.rate.saveorUpdate',$company->id)}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="form_type" value="edit">
                    <input type="hidden" name="companyId" value="{{$company->id}}">
                    <input type="hidden" name="rateId" value="{{old('rateId')}}" id="rateIdForUpdate">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Type</label>
                            <select name="type" class="form-control @error('type'){{('is-invalid')}}@enderror" id="typeIdforUpdate">
                                <option value="1" @if(old('type') == 1){{('selected')}}@endif>Single Rate</option>
                                <option value="2" @if(old('type') == 2){{('selected')}}@endif>Single + Controlled</option>
                                <option value="3" @if(old('type') == 3){{('selected')}}@endif>Time of Use</option>
                            </select>
                            @error('type')<span class="text-danger errorMessage">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control @error('title'){{('is-invalid')}}@enderror" value="{{old('title')}}" placeholder="Rate Title" id="titleForUpdate">
                            @error('title')<span class="text-danger errorMessage">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description2" name="description">{{old('description')}}</textarea>
                            @error('description')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description');CKEDITOR.replace('description2');

        $(document).ready(function() {
            $('#example4').DataTable();
        });

        @if(old('form_type') == 'add')
            $('#exampleModalAdd').modal('show');
        @endif

        @if(old('form_type') == 'edit')
            $('#exampleModalEdit').modal('show');
        @endif

        $(document).on('click','.addRateModal',function(){
            $('#exampleModalAdd').modal('show');
        });

        $(document).on('click','.editRateModal',function(){
            var details = JSON.parse($(this).attr('data-details'));
            $('#exampleModalEdit #rateIdForUpdate').val(details.id);
            $('#exampleModalEdit #typeIdforUpdate').val(details.type);
            $('#exampleModalEdit #titleForUpdate').val(details.title);
            CKEDITOR.instances['description2'].setData(details.description)
            $('#exampleModalEdit .form-control').removeClass('is-invalid');
            $('.errorMessage').remove();
            $('#exampleModalEdit').modal('show');
        });

        $(document).on('click','.deleteCompanyRate',function(){
            var deleteCompanyRate = $(this);
            var rateId = $(this).attr('data-feature_id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this company rate!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route(urlPrefix().'.companies.rate.delete',[$company->id,"+rateId+"])}}",
                        data: {companyId:'{{$company->id}}',rateId:rateId,_token:'{{csrf_token()}}'},
                        success:function(data){
                            if(data.error == false){
                                deleteCompanyRate.closest('tr').remove();
                                swal('Success',"Poof! Company Rate has been deleted!", 'success');
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
