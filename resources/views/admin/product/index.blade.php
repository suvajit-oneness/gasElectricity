@extends('layouts.master')
@section('title','Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Products
                        <a class="headerbuttonforAdd" href="{{route('admin.products.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Product
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Company Name</th>
                                    <th>Features</th>
                                    <th>Gas</th>
                                    <th>Electricity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td><a href="{{route('admin.companies',$product->company->id)}}">{{$product->company->name}}</a></td>
                                        <td>
                                            @forelse ($product->feature as $item)
                                                <li><a href="{{route('admin.products.feature',$item->id)}}">{{$item->title}}</a></li>
                                            @empty
                                                N/A
                                            @endforelse
                                        </td>
                                        @if ($product->gas_data)
                                            <td><a href="{{route('admin.products.gas',$product->gas_data->id)}}">{{$product->gas_data->title}}</a></td>
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        @if ($product->electricity_data)
                                            <td><a href="{{route('admin.products.electricity',$product->electricity_data->id)}}">{{$product->electricity_data->title}}</a></td>
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        <td>
                                            <a href="{{route('admin.products.edit',$product->id)}}">Edit</a> | <a href="javascript:void(0)" class="deleteproduct text-danger" data-id="{{$product->id}}">Delete</a>
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

        $(document).on('click','.deleteproduct',function(){
            var deleteproduct = $(this);
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
                        url:"{{route('admin.products.delete',"+productId+")}}",
                        data: {id:productId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deleteproduct.closest('tr').remove();
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
