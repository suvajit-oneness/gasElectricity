@extends('layouts.master')
@section('title','How it works')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">How it works</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.setting.updatehow_it_works')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="howItWorksId" value="{{$howitWork->id}}" required readonly>

                        <div class="form-group">
                            <label for="main_heading" class="col-form-label">Main Heading:</label>
                            <input type="text" class="form-control @error('main_heading') is-invalid @enderror" id="main_heading" name="main_heading" placeholder="How it works ..." value="{{$howitWork->main_heading}}" required>
                            @error('main_heading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title1" class="col-form-label">Title 1:</label>
                            <textarea id="title1" name="title1" class="form-control" required>{{$howitWork->title1}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="title2" class="col-form-label">Title 2:</label>
                            <textarea id="title2" name="title2" class="form-control" required>{{$howitWork->title2}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea id="description" name="description" class="form-control" required>{{$howitWork->description}}</textarea>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="image" class="col-form-label">Media Upload:</label>
                                <input type="file" name="media">
                            </div>
                        </div>
                        <!-- Review Details -->
                        <div class="form-group">
                            <label for="review_heading" class="col-form-label">Review Heading</label>
                            <input type="text" name="review_heading" id="review_heading" class="form-control" value="{{$howitWork->review_heading}}">
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <img src="{{$howitWork->review_image}}" height="200" width="200">
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Update Image for Review:</label>
                                <input type="file" name="review_image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="review_description" class="col-form-label">Review Description:</label>
                            <textarea id="review_description" name="review_description" class="form-control" required>{{$howitWork->review_description}}</textarea>
                        </div>

                        <!-- Compare Details -->
                        <div class="form-group">
                            <label for="compare_heading" class="col-form-label">Compare Heading</label>
                            <input type="text" name="compare_heading" id="compare_heading" class="form-control" value="{{$howitWork->compare_heading}}" required>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <img src="{{$howitWork->compare_image}}" height="200" width="200">
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Update Image for Compare:</label>
                                <input type="file" name="compare_image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="compare_description" class="col-form-label">Compare Description:</label>
                            <textarea id="compare_description" name="compare_description" class="form-control" required>{{$howitWork->compare_description}}</textarea>
                        </div>

                        <!-- Switch on Spot Details -->
                        <div class="form-group">
                            <label for="switchonspot_heading" class="col-form-label">Switch on Spot Heading</label>
                            <input type="text" name="switchonspot_heading" id="switchonspot_heading" class="form-control" value="{{$howitWork->switchonspot_heading}}" required>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <img src="{{$howitWork->switchonspot_image}}" height="200" width="200">
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Update Image for Switch on Spot:</label>
                                <input type="file" name="switchonspot_image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="switchonspot_description" class="col-form-label">Switch on Spot Description:</label>
                            <textarea id="switchonspot_description" name="switchonspot_description" class="form-control" required>{{$howitWork->switchonspot_description}}</textarea>
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
      CKEDITOR.replace( 'title1' );
      CKEDITOR.replace( 'title2' );
      CKEDITOR.replace( 'description' );
      CKEDITOR.replace( 'review_description' );
      CKEDITOR.replace( 'compare_description' );
      CKEDITOR.replace( 'switchonspot_description' );
    </script>
@stop
@endsection
