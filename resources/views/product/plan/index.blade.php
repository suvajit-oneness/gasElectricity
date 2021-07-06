@extends('layouts.master')
@section('title','Product Plan')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Product Plan : ({{$product->id}} - {{$product->name}})
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.products')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                        <a class="headerbuttonforAdd addPlanModal" href="javascript:void(0)">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Product Plan
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Plan Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->product_plan as $plan)
                                    <tr>
                                        <td>@if($plan->type == 1){{('Bonuses and Fees')}}@elseif($plan->type == 2){{('Other Details')}}@else{{('-')}}@endif</td>
                                        <td>{{$plan->title}}</td>
                                        <td>{!! $plan->description !!}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="editPlanModal" data-details="{{json_encode($plan)}}">Edit</a> | <a href="javascript:void(0)" class="deleteProductPlan text-danger" data-feature_id="{{$plan->id}}">Delete</a>
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

<!-- Add Plan Details -->
<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelAdd" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelAdd">Add Product Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route(urlPrefix().'.products.plan.saveorUpdate',$product->id)}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="form_type" value="add">
                    <input type="hidden" name="productId" value="{{$product->id}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Type</label>
                            <select name="type" class="form-control @error('type'){{('is-invalid')}}@enderror">
                                <option value="1" @if(old('type') == 1){{('selected')}}@endif>Bonuses and Fees</option>
                                <option value="2" @if(old('type') == 2){{('selected')}}@endif>Other Details</option>
                            </select>
                            @error('type')<span class="text-danger errorMessage">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control @error('title'){{('is-invalid')}}@enderror" value="{{old('title')}}" placeholder="Plan Title">
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

<!-- Edit Plan Details -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabeledit">Edit Product Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route(urlPrefix().'.products.plan.saveorUpdate',$product->id)}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="form_type" value="edit">
                    <input type="hidden" name="productId" value="{{$product->id}}">
                    <input type="hidden" name="planId" id="planIdForUpdate" value="{{old('planId')}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Type</label>
                            <select name="type" id="typeIdforUpdate" class="form-control @error('type'){{('is-invalid')}}@enderror">
                                <option value="1" @if(old('type') == 1){{('selected')}}@endif>Bonuses and Fees</option>
                                <option value="2" @if(old('type') == 2){{('selected')}}@endif>Other Details</option>
                            </select>
                            @error('type')<span class="text-danger errorMessage">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input type="text" id="titleForUpdate" name="title" class="form-control @error('title'){{('is-invalid')}}@enderror" value="{{old('title')}}" placeholder="Plan Title">
                            @error('title')<span class="text-danger errorMessage">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description2ForUpdate" name="description">{{old('description')}}</textarea>
                            @error('description')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description');
        var editor = CKEDITOR.replace('description2ForUpdate');
        $(document).ready(function() {
            $('#example4').DataTable();
        });

        @if(old('form_type') == 'add')
            $('#exampleModalAdd').modal('show');
        @endif

        @if(old('form_type') == 'edit')
            $('#exampleModalEdit').modal('show');
        @endif

        $(document).on('click','.addPlanModal',function(){
            $('.errorMessage').remove();
            $('#exampleModalAdd .form-control').removeClass('is-invalid');
            $('#exampleModalAdd').modal('show');
        });

        $(document).on('click','.editPlanModal',function(){
            var details = JSON.parse($(this).attr('data-details'));
            $('#exampleModalEdit #planIdForUpdate').val(details.id);
            $('#exampleModalEdit #typeIdforUpdate').val(details.type);
            $('#exampleModalEdit #titleForUpdate').val(details.title);
            CKEDITOR.instances['description2ForUpdate'].setData(details.description)
            $('#exampleModalEdit .form-control').removeClass('is-invalid');
            $('.errorMessage').remove();
            $('#exampleModalEdit').modal('show');
        });

        $(document).on('click','.deleteProductPlan',function(){
            var deleteProductPlan = $(this);
            var planId = $(this).attr('data-feature_id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this product plan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route(urlPrefix().'.products.plan.delete',[$product->id,"+planId+"])}}",
                        data: {productId:'{{$product->id}}',planId:planId,_token:'{{csrf_token()}}'},
                        success:function(data){
                            if(data.error == false){
                                deleteProductPlan.closest('tr').remove();
                                swal('Success',"Poof! Product Plan has been deleted!", 'success');
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
