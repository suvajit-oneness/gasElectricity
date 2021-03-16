@extends('admin.layouts.master')
@section('title','Blog')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Blogs
                        <a class="headerbuttonforAdd" href="{{route('admin.blogs.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Blog
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Posted By</th>
                                    <th>Posted at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td style="height: 100px; width: 100px"><img height="100px" width="100px" src="{{$blog->image}}"></td>
                                        <td>@if($blog->category){{$blog->category->name}}@else{{'N/A'}}@endif</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{!! $blog->description !!}</td>
                                        <!-- <td>{{strip_tags($blog->description)}}</td> -->
                                        <td>@if($blog->posted){{$blog->posted->name}}@else{{'N/A'}}@endif</td>
                                        <td>{{$blog->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('admin.blogs.edit',$blog->id)}}">Edit</a> | <a href="javascript:void(0)" class="deleteBlog text-danger" data-id="{{$blog->id}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example4').DataTable();
        });

        $(document).on('click','.deleteBlog',function(){
            var deleteBlog = $(this);
            var blogId = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this blog!",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route('admin.blogs.delete',"+blogId+")}}",
                        data: {id:blogId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deleteBlog.closest('tr').remove();
                                swal('Success',"Poof! Your blog has been deleted!");
                            }else{
                                swal('Error',data.message);
                            }
                        }
                    });
                    
                }
            });
        });
    </script>
@stop
@endsection
