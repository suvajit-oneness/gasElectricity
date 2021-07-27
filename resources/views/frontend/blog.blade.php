@extends('frontend.layouts.master')
@section('title','Blogs')
@section('content')

<section class="page_banner">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading text-white pb-0 mb-0 text-center">Blogs</h1>
			</div>
		</div>
	</div>
</section>

<section class="blog_wrapper">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-12 col-lg-3 col-md-12">
				<div class="energy_plan">
					<h3 class="text-white">Compare <span class="bold">Energy Plans</span> Here – <span class="bold lightgreen">Free!</span></h3>
					<a href="javascript:void(0)" class="white_btn">view all <span><img src="{{asset('forntEnd/images/button-small-icon-3.png')}}"></span></a>
				</div>
				<!-- <div class="search_form_wrap">
					<form>
						<div class="search_container">
							<input type="search" name="" placeholder="Enter Your Keyword...">
							<button><img src="{{asset('forntEnd/images/search.png')}}"></button>
						</div>
					</form>
				</div> -->
				<div class="blog_category_wrap">
					<h4 class="category_title">Categories</h4>
					<ul>
						<li><a href="{{route('blogs')}}">All</a></li>
						@foreach($data->category as $category)
							<li><a href="{{route('blogs')}}?category={{base64_encode($category->id)}}">{{$category->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<!-- <div class="newsletter_wrap">
					<img src="{{asset('forntEnd/images/Layer.png')}}">
					<h3>Stay Tuned !</h3>
					<p>Subscribe our Newsletter & get notifications to stay update</p>
					<form>
						<div class="email_wrapper">
							<input type="email" name="" placeholder="Enter your e-mail Address">
							<button><img src="{{asset('forntEnd/images/submit.png')}}"></button>
						</div>
					</form>
				</div> -->
				<!-- <div class="blog_wraper_social">
					<h6>Follow us On :</h6>
					<ul>
						<li><a href="#"><img src="{{asset('forntEnd/images/facebook.png')}}"></a></li>
						<li><a href="#"><img src="{{asset('forntEnd/images/linkedin.png')}}"></a></li>
						<li><a href="#"><img src="{{asset('forntEnd/images/youtube.png')}}"></a></li>
					</ul>
				</div> -->
			</div>
			<div class="col-12 col-lg-9 col-md-12">
				<div class="blog_list_container">
					@if(count($data->blogs) > 0)
						<ul>
							@foreach($data->blogs as $key => $blog)
								<li>
									<img src="{{asset($blog->image)}}">
									<div class="blog_info">
										<p class="publist_date">{{date('l, M d, Y',strtotime($blog->created_at))}}</p>
										<h5>{!! $blog->title !!}</h5>
										@if($blog->posted)
											<p class="publish_author">By <span>{{$blog->posted->name}}</span></p>
										@endif
										{!! Str::limit($blog->description, 220) !!}
										<a href="{{route('blog.detail',$blog->id)}}" class="read_post"><span>Read More</span> <img src="{{asset('forntEnd/images/button-small-icon-2.png')}}"></a>
									</div>
								</li>
							@endforeach
						</ul>
					@else
						<h1>Oops! No Blog Found</h1>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection