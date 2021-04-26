@extends('layouts.master')
@section('title','About us')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">About us</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.setting.save_aboutUs')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="aboutUsId" value="{{$aboutus->id}}" required readonly>

                        <img src="{{$aboutus->image}}" height="300" width="300">
                        <div class="form-group">
                            <label for="aboutusheading" class="col-form-label">About Us Image:</label>
                            <input type="file" name="aboutusImage" id="aboutusheading">
                        </div>

                        <div class="form-group">
                            <label for="aboutusheading" class="col-form-label">About Us Heading:</label>
                            <input type="text" class="form-control @error('aboutusheading') is-invalid @enderror" id="aboutusheading" name="aboutusheading" placeholder="About Us Heading" value="{{$aboutus->heading}}" required>
                            @error('aboutusheading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="aboutustitle" class="col-form-label">About Us Title:</label>
                            <input type="text" class="form-control @error('aboutustitle') is-invalid @enderror" id="aboutustitle" name="aboutustitle" placeholder="About Us Heading" value="{{$aboutus->title}}" required>
                            @error('aboutustitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="aboutusdescription" class="col-form-label">About Us Description:</label>
                            <textarea class="form-control @error('aboutusdescription') is-invalid @enderror" id="aboutusdescription" name="aboutusdescription" required>{{$aboutus->description}}</textarea>
                            @error('aboutusdescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="whychooseheading" class="col-form-label">Why choose us Heading:</label>
                            <input type="text" class="form-control @error('whychooseheading') is-invalid @enderror" id="whychooseheading" name="whychooseheading" placeholder="Why Choose Us" value="{{$aboutus->whychooseus}}" required>
                            @error('whychooseheading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label>Why Choose us Content</label>
                        @foreach($aboutus->whychoose as $whychoose)
                            <div class="row">
                                <input type="hidden" name="whychooseId[]" value="{{$whychoose->id}}">
                                <img src="{{$whychoose->image}}">
                                <div class="form-group">
                                    <label for="image{{$whychoose->id}}">Image</label>
                                    <input type="file" name="whychooseimage[]">
                                </div>
                                <div class="form-group">
                                    <label for="title{{$whychoose->id}}">Title</label>
                                    <input type="text" name="whychoosetitle[]" value="{{$whychoose->title}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description{{$whychoose->id}}">Description</label>
                                    <input type="text" name="whychoosedescription[]" value="{{$whychoose->description}}" required>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
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
      CKEDITOR.replace( 'aboutusdescription' );
    </script>
@stop
@endsection
