@extends('layouts.master')
@section('title','Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Feature ({{$product->id}} - {{$product->name}})
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.products')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.products.feature.create',$product->id)}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Product Feature
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
                                @foreach($product->feature as $feature)
                                    <tr>
                                        <td>{{$feature->title}}</td>
                                        <td>{!!$feature->description!!}</td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.product.feature.edit',[$product->id,$feature->id])}}">Edit</a> | <a href="javascript:void(0)" class="deleteproductfeature text-danger" data-feature_id="{{$feature->id}}">Delete</a>
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

        $(document).on('click','.deleteproductfeature',function(){
            var deleteproductfeature = $(this);
            var featureId = $(this).attr('data-feature_id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route(urlPrefix().'.products.feature.delete',"+featureId+")}}",
                        data: {productId:'{{$product->id}}',featureId:featureId,_token:'{{csrf_token()}}'},
                        success:function(data){
                            if(data.error == false){
                                deleteproductfeature.closest('tr').remove();
                                swal('Success',"Poof! Product feature has been deleted!", 'success');
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
