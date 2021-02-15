@extends('admin.layouts.master')
@section('title','Add Blog')
@section('css')

@stop
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">ADD NEW Blog
                        <a class="headerbuttonforAdd" href="{{route('admin.blogs')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>BACK</a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.blogs.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image" class="col-form-label">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-form-label">Blog Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Blog Title" value="{{old('title')}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Blog Description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Blog Description">{{old('description')}}</textarea>
                            @error('description')
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
