@extends('layouts.master')
@section('title','Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Products
                        @if(urlprefix() != 'admin')
                            <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.products.create')}}">
                                <i class="fa fa-plus" aria-hidden="true"></i>Add Product
                            </a>
                        @endif
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
                                    <th>Product For</th>
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
                                    @if(urlprefix() != 'admin')
                                        <th>Action</th>
                                    @endif
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
                                        <td>{{strtoupper($product->product_for)}}</td>
                                        <td>
                                            <a href="{{route(urlPrefix().'.products.momenta',$product->id)}}">
                                                @if(count($product->product_momentum) > 0)
                                                    <i class="fa fa-eye"></i>
                                                @else
                                                    {{('N/A')}}
                                                @endif
                                            </a>
                                        </td>
                                        <td>{{$product->tag}}</td>
                                        <td>{!! $product->tag_description !!}</td>
                                        <td>
                                            <?php $gasData = $product->product_gas; ?>
                                            @if($gasData)
                                                <li>Title : {{$gasData->title}}</li>
                                                <li>Price : {{moneyFormat($gasData->price)}} / unit</li>
                                            @else
                                                {{('N/A')}}
                                            @endif
                                        </td>
                                        <td>
                                            <?php $electricityData = $product->product_electricty; ?>
                                            @if($electricityData)
                                                <li>Title : {{$electricityData->title}}</li>
                                                <li>Price : {{moneyFormat($electricityData->price)}} / unit</li>
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
                                        <td><a href="{{route('product.details',$product->id)}}" target="_blank"><i class="fa fa-eye"></i></a></td>
                                        @if(urlprefix() == 'admin')
                                            <?php $author = $product->author;?>
                                            <td>
                                                @if($author)
                                                    <ul>
                                                        <li>UID : {{$author->id}}</li>
                                                        <li>Name : {{$author->name}}</li>
                                                        <li>Email : {{$author->email}}</li>
                                                    </ul>
                                                @else
                                                    {{('N/A')}}
                                                @endif
                                            </td>
                                        @endif
                                        @if(urlprefix() != 'admin')
                                            <td>
                                                <a href="{{route(urlPrefix().'.products.edit',$product->id)}}"><i class="fa fa-edit"></i></a> | <a href="javascript:void(0)" class="deleteProduct text-danger" data-id="{{$product->id}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        @endif
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
