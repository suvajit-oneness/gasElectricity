@extends('layouts.master')
@section('title','Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Products
                        <a class="headerbuttonforAdd" href="{{route('admin.products.feature.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Product Feature
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Feature</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($features as $feature)
                                    <tr>
                                        <td><a href="{{route('admin.products',$feature->product->id)}}">{{$feature->product->name}}</a></td>
                                        <td>{{$feature->title}}</td>
                                        <td>{!!$feature->description!!}</td>
                                        <td>
                                            <a href="{{route('admin.products.feature.edit',$feature->id)}}">Edit</a> | <a href="javascript:void(0)" class="deleteproductfeature text-danger" data-id="{{$feature->id}}">Delete</a>
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
            var productId = $(this).attr('data-id');
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
                        url:"{{route('admin.products.feature.delete',"+productId+")}}",
                        data: {id:productId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deleteproductfeature.closest('tr').remove();
                                swal('Success',"Poof! Your product has been deleted!", 'success');
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
