@extends('layouts.master')
@section('title','Add Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add New Product
                        <a class="headerbuttonforAdd" href="{{route('admin.products')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.products.save')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="company_id" class="col-form-label">Company</label>
                            <select name="company_id" class="form-control" id="company_id">
                                <option value="">Select Company</option>
                                @foreach($companies as $item)
                                    <option value="{{$item->id}}" @if(old('company_id') == $item->id){{('selected')}}@endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">Product Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" value="{{old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tag" class="col-form-label">Product tag:</label>
                                <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" placeholder="Product tag" value="{{old('tag')}}">
                                @error('tag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tag_description" class="col-form-label">Product Tag Description:</label>
                            <textarea class="form-control @error('tag_description') is-invalid @enderror" id="description" name="tag_description" placeholder="Product Tag Description">{{old('tag_description')}}</textarea>
                            @error('tag_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="gas_title" class="col-form-label">Gas Title:</label>
                                <input type="text" class="form-control @error('gas_title') is-invalid @enderror" id="gas_title" name="gas_title" placeholder="Product Gas Title" value="{{old('gas_title')}}">
                                @error('gas_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="gas_price" class="col-form-label">Gas Price:</label>
                                <input type="text" class="form-control @error('gas_price') is-invalid @enderror" id="gas_price" name="gas_price" placeholder="Gas Price" value="{{old('gas_price')}}" onkeypress="return isNumberKey(event)">
                                @error('gas_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="electricty_title" class="col-form-label">Electricity Title:</label>
                                <input type="text" class="form-control @error('electricty_title') is-invalid @enderror" id="electricty_title" name="electricty_title" placeholder="Product Electricity Title" value="{{old('electricty_title')}}">
                                @error('electricty_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="electricty_price" class="col-form-label">Electricity Price:</label>
                                <input type="text" class="form-control @error('electricty_price') is-invalid @enderror" id="electricty_price" name="electricty_price" placeholder="Product Electricity Price" value="{{old('electricty_price')}}" onkeypress="return isNumberKey(event)">
                                @error('electricty_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add</button>
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
