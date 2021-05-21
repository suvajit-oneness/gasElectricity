@extends('layouts.master')
@section('title','Product Gas data')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Electricity Data
                        <a class="headerbuttonforAdd" href="{{route('admin.products.electricity.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Product Electricity Data
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
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($electricity as $data)
                                    <tr>
                                        <td><a href="{{route('admin.products',$data->product->id)}}">{{$data->product->name}}</a></td>
                                        <td>{{$data->title}}</td>
                                        <td>${{$data->price}}</td>
                                        <td>
                                            <a href="{{route('admin.products.electricity.edit',$data->id)}}">Edit</a> | <a href="javascript:void(0)" class="deleteProductElectric text-danger" data-id="{{$data->id}}">Delete</a>
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

        $(document).on('click','.deleteProductElectric',function(){
            var deleteProductElectric = $(this);
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
                        url:"{{route('admin.products.electricity.delete',"+productId+")}}",
                        data: {id:productId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deleteProductElectric.closest('tr').remove();
                                swal('Success',"Poof! Electricity data has been deleted!", 'success');
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
