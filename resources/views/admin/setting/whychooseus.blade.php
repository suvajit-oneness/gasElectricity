@extends('layouts.master')
@section('title','Why Choose Us')
@section('content')
<style type="text/css">
    textarea{resize: none;}
</style>
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Why Choose Us</h5>
                </div>
                @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                <div class="card-body">
                    <form method="post" action="{{route('admin.setting.whychooseus.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="whychooseheading" class="col-form-label">Why choose us Heading:</label>
                            <input type="text" class="form-control @error('whychooseheading') is-invalid @enderror" id="whychooseheading" name="whychooseheading" placeholder="Why Choose Us" value="" required>
                            @error('whychooseheading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <caption><h4>Why Choose us Content</h4></caption>
                        
                        <table class="table" style="width: 100%">
                            <tr>
                                <th>Image</th>
                                <th>Choose File</th>
                                <th>Title</th>
                                <th>Description</th>
                                <!-- <th>Action</th> -->
                            </tr>
                            @foreach($whychooseUs as $key => $whychoose)
                                <input type="hidden" name="whychooseId[]" value="{{$whychoose->id}}">
                                <input type="hidden" name="old_whychooseimage[]" value="{{$whychoose->image}}">
                                <tr>
                                    <td><img src="{{$whychoose->image}}" height="100" width="100"></td>
                                    <td>
                                        <div class="form-group">
                                            <input type="file" name="whychooseimage[]">
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-group">
                                            <input type="text" class="form-control" name="whychoosetitle[]" value="{{$whychoose->title}}" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" name="whychoosedescription[]" required="">{{$whychoose->description}}</textarea>
                                        </div>
                                    </td>
                                    <!-- <td><a href="{{route('admin.setting.whychooseus.delete',$whychoose->id)}}" onclick="return confirm('Are you sure?')" class="text-danger">Delete</a></td> -->
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
    <!-- <script type="text/javascript" src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> -->
    <script>
        var whyChooseUsHeading = 'Why Choose Us';
        @foreach($whychooseUs as $key => $choose)
            whyChooseUsHeading = '{{$choose->heading}}';
            $('#whychooseheading').val(whyChooseUsHeading);
            @break
        @endforeach
    </script>
@stop
@endsection
