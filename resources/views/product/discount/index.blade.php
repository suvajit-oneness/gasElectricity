@extends('layouts.master')
@section('title','Product Discount')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Discount ({{$product->id}} - {{$product->name}})
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.products')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                        
                        <a class="headerbuttonforAdd" href="javascript:void(0);" data-toggle="modal" data-target="#addMomentaModal">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Product Discount
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="addMomentaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Discount</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route(urlPrefix().'.products.discount.save',$product->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title" class="col-form-label">Product Discount Title:</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Discount Title" value="{{old('title')}}">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="description" class="col-form-label">Discount Description:</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Discount Description">{{old('description')}}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->product_discount as $discount)
                                    <tr>
                                        <td>{{$discount->title}}</td>
                                        <td>{!!$discount->description!!}</td>
                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$discount->id}}">Edit</a> | <a href="javascript:void(0)" class="deleteproductdiscount text-danger" data-discount_id="{{$discount->id}}">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$discount->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Discount</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{route(urlPrefix().'.products.discount.update',[$discount->productId,$discount->id])}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="title" class="col-form-label">Product Discount Title:</label>
                                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Discount Title" value="{{$discount->title}}">
                                                            @error('title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                
                                                        <div class="form-group">
                                                            <label for="description" class="col-form-label">Discount Description:</label>
                                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Discount Description">{!!$discount->description!!}</textarea>
                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        $(document).on('click','.deleteproductdiscount',function(){
            var deleteproductdiscount = $(this);
            var discountId = $(this).attr('data-discount_id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this product discount!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route(urlPrefix().'.products.discount.delete',"+discountId+")}}",
                        data: {productId:'{{$product->id}}',discountId:discountId,_token:'{{csrf_token()}}'},
                        success:function(data){
                            console.log(data);
                            if(data.error == false){
                                deleteproductdiscount.closest('tr').remove();
                                swal('Success',"Poof! Product discount has been deleted!", 'success');
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
