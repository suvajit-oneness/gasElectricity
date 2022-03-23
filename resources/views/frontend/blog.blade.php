@extends('frontend.layouts.master')
@section('title','Blogs')
@section('content')

<section class="blog">
			<div class="container">
				<div class="row">
					@if(count($data->blogFirst) > 0)
						@foreach($data->blogFirst as $blog)
							<div class="col-12 col-lg-6">
								<div class="position-relative">
									<img src="{{asset($blog->image)}}" class="w-100">
									<div class="itm_type">{!! $blog->title !!}</div>
								</div>
								<div class="b_content">
									<p>{{date('l, M d, Y',strtotime($blog->created_at))}}</p>
									<a href="{{route('blog.detail',$blog->id)}}"><h6>{!!$blog->title!!}</h6></a>
								</div>
							</div> 
						@endforeach
					@endif
					@if(count($data->blogThree) > 0)
						<div class="col-12 col-lg-6">
							@foreach($data->blogThree as $key => $blog)
								<div class="card border-0 bg-transparent mb-2">
									<div class="row m-0">
										<div class="col-12 col-lg-3 p-0 blog_img">
											<img src="{{asset($blog->image)}}">
										</div>
										<div class="col-12 col-lg-9 ps-lg-4">
											<div class="b_content">
												<p><span>{{$blog->category->name}}</span>{{date('l, M d, Y',strtotime($blog->created_at))}}</p>
												<a href="{{route('blog.detail',$blog->id)}}"><h6>{!! $blog->title !!}</h6></a>
												<a href="{{route('blog.detail',$blog->id)}}" class="btn log_drop mt-3">Read <i class="fa-solid fa-plus ms-2"></i></a>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							{{-- <div class="card border-0 bg-transparent mb-2">
								<div class="row m-0">
									<div class="col-12 col-lg-3 p-0 blog_img">
										<img src="./img/blog_3.png">
									</div>
									<div class="col-12 col-lg-9 ps-lg-4">
										<div class="b_content">
											<p><span>Electricity</span>1 Year ago</p>
											<a href="blog_details.html"><h6>Aenean sollicitudin lorem quis bibendum auctor.</h6></a>
											<a href="blog_details.html" class="btn log_drop mt-3">Read <i class="fa-solid fa-plus ms-2"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="card border-0 bg-transparent mb-2">
								<div class="row m-0">
									<div class="col-12 col-lg-3 p-0 blog_img">
										<img src="./img/blog_3.png">
									</div>
									<div class="col-12 col-lg-9 ps-lg-4">
										<div class="b_content">
											<p><span>Electricity</span>1 Year ago</p>
											<a href="blog_details.html"><h6>Aenean sollicitudin lorem quis bibendum auctor.</h6></a>
											<a href="blog_details.html" class="btn log_drop mt-3">Read <i class="fa-solid fa-plus ms-2"></i></a>
										</div>
									</div>
								</div>
							</div> --}}
						</div>
					@endif
				</div>
			</div>
		</section>
		@if(count($data->allBlogs) > 0)
			<section class="more_blog py-4 py-lg-5">
				<div class="container">
					<div class="row m-0">
						<div class="page_title">
							<h1 data-aos="fade-down" data-aos-duration="1000">More from <small class="position-relative">Switchr<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
						</div>
					</div>
					<div class="row m-0 mt-4 mt-lg-5">
						@foreach ($data->allBlogs as $blog)
							<div class="col-12 col-lg-4 mb-3 mb-lg-0">
							<div class="card border-0">
								<div class="l_blog position-relative">
									<img src="{{asset($blog->image)}}" class="card-img-top">
									<div class="itm_type"><a href="{{route('blog.detail',$blog->id)}}">Read <i class="fa-solid fa-plus ms-2"></i></a></div>
								</div>
								<div class="card-body b_content">
									<p><span class="bg-slight">{{$blog->title}}</span>{{date('l, M d, Y',strtotime($blog->created_at))}}</p>
									<a href="{{route('blog.detail',$blog->id)}}"><h6></h6></a>
								</div>
							</div>
						</div>
						@endforeach
						
						{{-- <div class="col-12 col-lg-4 mb-3 mb-lg-0">
							<div class="card border-0">
								<div class="l_blog position-relative">
									<img src="./img/blog_1.png" class="card-img-top">
									<div class="itm_type"><a href="blog_details.html">Read <i class="fa-solid fa-plus ms-2"></i></a></div>
								</div>
								<div class="card-body b_content">
									<p><span class="bg-slight">Electricity</span>1 Year ago</p>
									<a href="blog_details.html"><h6>Aenean sollicitudin lorem quis bibendum auctor.</h6></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4 mb-3 mb-lg-0">
							<div class="card border-0">
								<div class="l_blog position-relative">
									<img src="./img/blog_2.png" class="card-img-top">
									<div class="itm_type"><a href="blog_details.html">Read <i class="fa-solid fa-plus ms-2"></i></a></div>
								</div>
								<div class="card-body b_content">
									<p><span class="bg-slight">Electricity</span>1 Year ago</p>
									<a href="blog_details.html"><h6>Aenean sollicitudin lorem quis bibendum auctor.</h6></a>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</section>
		@endif
		<!--end_more_blog-->

		<section class="bg-light py-4 py-lg-5 free_start">
			<div class="container gt_start">
				<div class="row m-0">
					<div class="col-12 col-lg-7 free_bg">
						<div class="page_title">
							<h1 class="text-start">Start your <small class="position-relative">free trial<div class="border_text" data-aos="fade-right" data-aos-duration="1400"></div></small></h1>
							<h6>Ready to get started?</h6>
							<div class="input_sec mb-3">
							<form action="{{route('rfq.product.listing')}}" method="get" autocomplete="off">
								<div class="input-group">
									{{-- <input type="text" class="form-control" placeholder="Enter your postcode or suburb...">
									<button class="btn btn-comp">Compare</button> --}}

									<datalist id="suppliersPincode">
										@foreach($data->pincode as $key => $pincde)
											<option value="{{$pincde->autocomplete}}"></option>
										@endforeach
									</datalist>
									@error('eneryType')<span class="text-danger">{{$message}}</span>@enderror
									@error('search')<span class="text-danger">{{$message}}</span>@enderror
									<input type="text" class="form-control postCodeSearch"  name="search" id="postcodesearch" placeholder="Enter your postcode or suburb..." required value="{{old('search')}}" list="suppliersPincode">
									<button class="btn btn-comp" type="submit">Compare</button>
								</div>
							</form>
						</div>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
							</p>
						</div>
					</div>
					<div class="col-12 col-lg-4 start_img">
						<img src="{{asset('forntEnd/img/start_img.png')}}">
					</div>
				</div>
			</div>
		</section>
@section('script')
    <script type="text/javascript"></script>
@stop
@endsection