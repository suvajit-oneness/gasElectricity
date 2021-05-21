@extends('layouts.master')
@section('title','Edit Product')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Product
                        <a class="headerbuttonforAdd" href="{{route('admin.products')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.products.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="productId" value="{{$product->id}}">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" value="{{$product->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company_id" class="col-form-label">Company</label>
                            <select name="company_id" class="form-control" id="company_id">
                                <option value="">Select Company</option>
                                @foreach($companies as $item)
                                    <option value="{{$item->id}}" @if($product->company_id == $item->id){{('selected')}}@endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tag" class="col-form-label">Product tag:</label>
                            <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" placeholder="Product tag" value="{{$product->tag}}">
                            @error('tag')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
