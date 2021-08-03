@extends('layouts.master')
@section('title','Edit Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Product
                        <a class="headerbuttonforAdd" href="{{route(urlPrefix().'.products')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route(urlPrefix().'.products.update',$product->company_id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="productId" value="{{$product->id}}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="company_id" class="col-form-label">Company</label>
                                <select name="companyId" class="form-control @error('companyId') is-invalid @enderror" id="company_id">
                                    <option value="">Select Company</option>
                                    @foreach($companies as $item)
                                        <option value="{{$item->id}}" @if($product->company_id == $item->id){{('selected')}}@endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('companyId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                @php $productFor = explode(',',$product->product_for); @endphp
                                <label for="product_for" class="col-form-label w-100">Product For</label>
                                <select name="product_for[]" class="w-100 form-control multipleSelect" id="product_for" multiple>
                                    <option value="home" @if(in_array('home',$productFor)){{('selected')}}@endif>Home</option>
                                    <option value="business" @if(in_array('business',$productFor)){{('selected')}}@endif>Business</option>
                                </select>
                                @error('product_for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">Product Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" value="{{$product->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tag" class="col-form-label">Product tag:</label>
                                <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" placeholder="Product tag" value="{{$product->tag}}">
                                @error('tag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tag_description" class="col-form-label">Product Tag Description:</label>
                            <textarea class="form-control @error('tag_description') is-invalid @enderror" id="description" name="tag_description" placeholder="Product Tag Description">{{$product->tag_description}}</textarea>
                            @error('tag_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <?php $gasData = $product->product_gas; ?>
                            <div class="form-group col-md-6">
                                <label for="gas_title" class="col-form-label">Gas Title:</label>
                                <input type="text" class="form-control @error('gas_title') is-invalid @enderror" id="gas_title" name="gas_title" placeholder="Product Gas Title" value="{{$gasData->title}}">
                                @error('gas_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="gas_price" class="col-form-label">Gas Price:</label>
                                <input type="text" class="form-control @error('gas_price') is-invalid @enderror" id="gas_price" name="gas_price" placeholder="Gas Price" value="{{$gasData->price}}" onkeypress="return isNumberKey(event)" maxlength="5">
                                @error('gas_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <?php $electrictyData = $product->product_electricty; ?>
                            <div class="form-group col-md-6">
                                <label for="electricty_title" class="col-form-label">Electricity Title:</label>
                                <input type="text" class="form-control @error('electricty_title') is-invalid @enderror" id="electricty_title" name="electricty_title" placeholder="Product Electricity Title" value="{{$electrictyData->title}}">
                                @error('electricty_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="electricty_price" class="col-form-label">Electricity Price:</label>
                                <input type="text" class="form-control @error('electricty_price') is-invalid @enderror" id="electricty_price" name="electricty_price" placeholder="Product Electricity Price" value="{{$electrictyData->price}}" onkeypress="return isNumberKey(event)" maxlength="5">
                                @error('electricty_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="terms_condition" class="col-form-label">Terms and Condition Link:</label>
                                <input type="url" class="form-control @error('terms_condition') is-invalid @enderror" id="terms_condition" name="terms_condition" placeholder="Terms and Condition Link" value="{{$electrictyData->terms_condition}}">
                                @error('terms_condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'description' );
    </script>
@stop
@endsection
