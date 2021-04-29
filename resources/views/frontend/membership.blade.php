@extends('frontend.layouts.master')
@section('title','Membership')
@section('content')

<section class="page_banner">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading text-white pb-0 mb-0 text-center">Membership</h1>
			</div>
		</div>
	</div>
</section>

<section class="blog_wrapper">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-12 col-lg-9 col-md-12">
				<div class="blog_list_container">
					<ul>
						@foreach($membership as $key => $mem)
							<li>
								<!-- <img src="{{$mem->image}}"> -->
								<div class="blog_info">
									<h5>{!! $mem->title !!}</h5>
									<p class="publist_date">valid for {{$mem->duration}} Year</p>
									<p class="blog_content">{!! $mem->description !!}.</p>
									<a href="javascript:void(0)" class="read_post enrollMembership" data-id="{{$mem->id}}"><p>Buy Now ($ {{$mem->price}})</p></a>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
    	$(document).on('click','.enrollMembership',function(){
			var membershipId = $(this).attr('data-id');
			console.log(membershipId);
			swal({
			  	title: "Are you sure?",
			  	text: "you want to proceed to buy",
			  	icon: "warning",
			  	buttons: true,
			  	dangerMode: true,
			})
			.then((willDelete) => {
			  	if (willDelete) {
			  		window.location.href = "{{url('membership/purchase')}}/"+btoa(membershipId);
			  	}
			});
		});

    </script>
@stop
@endsection