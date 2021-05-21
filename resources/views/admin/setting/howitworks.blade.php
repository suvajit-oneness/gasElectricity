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
                @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                <div class="card-body">
                    <form method="post" action="{{route('admin.setting.updatehow_it_works')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="howitWorkHeading" class="col-form-label">How it works Heading:</label>
                            <input type="text" class="form-control @error('howitWorkHeading') is-invalid @enderror" id="howitWorkHeading" name="howitWorkHeading" placeholder="How it works ..." value="" required>
                            @error('howitWorkHeading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <table class="table" style="width: 100% !important;">
                            <tr>
                                <th>Image</th>
                                <th>Choose File</th>
                                <th>Title</th>
                                <th>Description</th>
                            </tr>
                            @foreach($howitWork as $key => $howWork)
                                <input type="hidden" name="howitWorkId[]" value="{{$howWork->id}}">
                                <input type="hidden" name="old_howitWorkimage[]" value="{{$howWork->image}}">
                                <tr>
                                    <td><img src="{{asset($howWork->image)}}" height="100" width="100"></td>
                                    <td>
                                        <div class="form-group">
                                            <input type="file" name="howitWorkImage[]">
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-group">
                                            <input type="text" class="form-control" name="howitWorktitle[]" value="{{$howWork->title}}" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" name="howitWorkdescription[]" required="">{{$howWork->description}}</textarea>
                                        </div>
                                    </td>
                                    <!-- <td><a href="{{route('admin.setting.howitWork.delete',$howWork->id)}}" onclick="return confirm('Are you sure?')" class="text-danger">Delete</a></td> -->
                                </tr>
                            @endforeach
                        </table>

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
        // CKEDITOR.replace( 'title1' );
        // CKEDITOR.replace( 'title2' );
        // CKEDITOR.replace( 'description' );
        // CKEDITOR.replace( 'review_description' );
        // CKEDITOR.replace( 'compare_description' );
        // CKEDITOR.replace( 'switchonspot_description' );

        var howitWorksHeading = 'How it Works';
        @foreach($howitWork as $key => $howitWorks)
            howitWorksHeading = '{{$howitWorks->heading}}';
            $('#howitWorkHeading').val(howitWorksHeading);
            @break
        @endforeach
    </script>
@stop
@endsection
