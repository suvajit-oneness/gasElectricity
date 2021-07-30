@extends('layouts.master')
@section('title','Testimonials')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Testimonials
                        <a class="headerbuttonforAdd" href="{{route('admin.testimonial.create')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Testimonial
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
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Designation</th>
                                    <th>Quotation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td style="height: 100px; width: 100px"><img height="100px" width="100px" src="{{$testimonial->image}}"></td>
                                        <td>{{$testimonial->name}}</td>
                                        <td>{{$testimonial->title}}</td>
                                        <td>{{$testimonial->designation}}</td>
                                        <td>{{$testimonial->quote}}</td>
                                        <td>
                                            <a href="{{route('admin.testimonial.edit',$testimonial->id)}}">Edit</a> | <a href="javascript:void(0)" class="deleteTestimonial text-danger" data-id="{{$testimonial->id}}">Delete</a>
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
        $(document).on('click','.deleteTestimonial',function(){
            var deleteTestimonial = $(this);
            var testimonialId = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this testimonial!",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route('admin.testimonial.delete',"+testimonialId+")}}",
                        data: {id:testimonialId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deleteTestimonial.closest('tr').remove();
                                swal('Success',"Poof! Your testimonial has been deleted!");
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
