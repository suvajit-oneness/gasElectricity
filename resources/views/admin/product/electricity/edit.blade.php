@extends('layouts.master')
@section('title','Edit Product Electricity Data')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Product Electricity Data
                        <a class="headerbuttonforAdd" href="{{route('admin.products.electricity')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.products.electricity.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="electricityId" value="{{$electricity->id}}">
                        <div class="form-group">
                            <label for="product_id" class="col-form-label">Product Name</label>
                            <select name="product_id" class="form-control" id="product_id">
                                <option value="">Select Product</option>
                                @foreach($products as $item)
                                <option value="{{$item->id}}" @if($electricity->product_id == $item->id){{('selected')}}@endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-form-label">Electricity Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Product Electricity Title" value="{{$electricity->title}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price:</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Electricity Price" value="{{$electricity->price}}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
