@extends('layouts.master')
@section('title','Individual Utility')
@section('content')
<style type="text/css">
textarea {
    resize: none;
}
</style>
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Individual Utility</h5>
                </div>
                @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                <div class="card-body">
                    <form method="post" action="{{route('admin.setting.individual_utility')}}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="utilityheading" class="col-form-label">Individual Utility Heading:</label>
                            <input type="text" class="form-control @error('utilityheading') is-invalid @enderror"
                                id="utilityheading" name="utilityheading" placeholder="Individual Utility ..." value=""
                                required>
                            @error('utilityheading')
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
                            @foreach($utility as $key => $howWork)
                            <input type="hidden" name="utilityId[]" value="{{$howWork->id}}">
                            <input type="hidden" name="old_utilityimage[]" value="{{$howWork->image}}">
                            <tr>
                                <td><img src="{{asset($howWork->image)}}" height="100" width="100"></td>
                                <td>
                                    <div class="form-group">
                                        <input type="file" name="utilityimage[]">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="utilitytitle[]"
                                            value="{{$howWork->title}}" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" name="utilitydescription[]"
                                            required="">{{$howWork->description}}</textarea>
                                    </div>
                                </td>
                                <!-- <td><a href="#" onclick="return confirm('Are you sure?')" class="text-danger"><i class="fa fa-trash"></i></a></td> -->
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

var utilityHeading = 'Individual Utility';
@foreach($utility as $key => $utilitys)
utilityHeading = "{{$utilitys->heading}}";
$('#utilityheading').val(utilityHeading);
@break
@endforeach
</script>
@stop
@endsection