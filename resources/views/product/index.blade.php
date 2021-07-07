@extends('layouts.master')
@section('title','Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Products
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.products.create')}}">
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
                                    <th>Company</th>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Momentum</th>
                                    <th>Tag</th>
                                    <th>Tag Description</th>
                                    <th>Gas</th>
                                    <th>Electricity</th>
                                    <th>Terms and Condition</th>
                                    <th>View Details</th>
                                    @if(urlprefix() == 'admin')
                                        <th>Created By</th>
                                    @endif
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>
                                            <?php $company = $product->company; ?>
                                            @if($company)
                                                {{$company->name}}
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.products.momenta',$product->id)}}">
                                                @forelse ($product->product_momentum as $item)
                                                    <li>{{$item->title}}</li>
                                                @empty
                                                    N/A
                                                @endforelse
                                            </a>
                                        </td>
                                        <td>{{$product->tag}}</td>
                                        <td>{!! $product->tag_description !!}</td>
                                        <td>
                                            <?php $gasData = $product->product_gas; ?>
                                            @if($gasData)
                                                <ul>
                                                    <li>Title : {{$gasData->title}}</li>
                                                    <li>Price : {{moneyFormat($gasData->price)}}</li>
                                                </ul>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>
                                            <?php $electricityData = $product->product_electricty; ?>
                                            @if($electricityData)
                                                <ul>
                                                    <li>Title : {{$electricityData->title}}</li>
                                                    <li>Price : {{moneyFormat($electricityData->price)}}</li>
                                                </ul>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->terms_condition != '')
                                                <a href="{{$product->terms_condition}}" target="_blank">Click Here</a>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td><a href="{{route('product.details',$product->id)}}" target="_blank">View</a></td>
                                        @if(urlprefix() == 'admin')
                                            <?php $author = $product->author;?>
                                            <td><ul>
                                                <li>UID : {{$author->id}}</li>
                                                <li>Name : {{$author->name}}</li>
                                                <li>Email : {{$author->email}}</li>
                                            </ul></td>
                                        @endif
                                        <td>
                                            <a href="{{route(urlPrefix().'.products.edit',$product->id)}}">Edit</a> | <a href="javascript:void(0)" class="deleteProduct text-danger" data-id="{{$product->id}}">Delete</a>
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

        $(document).on('click','.deleteProduct',function(){
            var deleteProduct = $(this);
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
                        url:"{{route(urlPrefix().'.products.delete',"+productId+")}}",
                        data: {productId:productId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deleteProduct.closest('tr').remove();
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
