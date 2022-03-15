@extends('frontend.layouts.master')
@section('title','Blog Details')
@section('content')

<section class="blg_det_bg">
			<div class="container">
				<div class="row m-0 justify-content-center">
					<div class="col-12 col-lg-9 blg_det_p">
						<p><span>{{ $data->blog->category->name}}</span></p>
						<div class="page_title">
							<h1 class="text-center" data-aos="fade-down" data-aos-duration="1000">{{$data->blog->title}} <small class="position-relative"><div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
						</div>
						<ul class="detail_user">
							<li>
								<div class="user_pic"></div>
							</li>
							<li>Johnathon Doe</li>
							<li>December</li>
							<li>5 Minutes Read</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section class="">
			<div class="container-fluid p-0">
				<div class="blog_img_det">
					<img src="{{asset('forntEnd/img/blog_4.png')}}" class="w-100">
				</div>
				<div class="row m-0 justify-content-center">
					<div class="col-12 col-lg-7 py-4 blog_text">
						<p>
							{!! $data->blog->description !!}
						</p>
						{{-- <p>
							Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum.
						</p>
						<div class="py-4">
							<h6>Dolor sit amet!</h6>
						</div>
						<p>
							Mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
						</p>
						<p>
							Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum.
						</p>
						<ol>
							<li>Proin gravida nibh vel velit auctor aliquet.</li>
							<li>Aenean sollicitudin, lorem quis bibendum auctor</li>
							<li>Nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
							<li>Duis sed odio sit amet nibh vulputate cursus.</li>
						</ol>
						<div class="py-4">
							<h6>Dolor sit amet!</h6>
						</div>
						<p>
							Mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
						</p>
						<p>
							Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum.
						</p> --}}
					</div>
				</div>
			</div>
		</section>
		<section class="more_blog py-4 py-lg-5 bg_l_green">
			<div class="container">
				<div class="row m-0">
					<div class="page_title">
						<h1 data-aos="fade-down" data-aos-duration="1000">You may <small class="position-relative">also like!<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
					</div>
				</div>
				<div class="row m-0 mt-4 mt-lg-5">
				@foreach ($data->blogs as $blog)
					<div class="col-12 col-lg-4 mb-3 mb-lg-0">
						<div class="card border-0">
							<div class="l_blog position-relative">
								<img src="{{asset($blog->image)}}" class="card-img-top">
								<div class="itm_type"><a href="{{route('blog.detail',$blog->id)}}">Read <i class="fa-solid fa-plus ms-2"></i></a></div>
							</div>
							<div class="card-body b_content">
								<p><span class="bg-slight">{{ $blog->category->name}}</span>{{date('l, M d, Y',strtotime($blog->created_at))}}</p>
								<a href="{{route('blog.detail',$blog->id)}}"><h6>{{ $blog->title}}</h6></a>
							</div>
						</div>
					</div>
				@endforeach
					
					
				</div>
			</div>
		</section>

@section('script')
    <script type="text/javascript">
    	$(document).on('click','.leaveComment',function(){
    		@guest
				<?php Session::put('url.intended', URL::full()); ?>
				window.location.href = '{{route('login')}}';
			@else
				var comment = $('#commentMessage').val();
				if(comment == ''){
					alert('Please provide all the details');
				}else{
					blogCommentSave(comment);
				}
			@endguest
    	});
		@auth
			$(document).on('click','.likeMainButton',function(){
				var status = 1;
				likeAddOrRemove(status);
			});

			function likeAddOrRemove(status)
			{
				$.ajax({
					url : '{{route("api.blog.like_or_unlike")}}',
					type : 'post',
					data : {blogId: '{{$data->blog->id}}', userId: '{{auth()->user()->id}}',like: status},
					success:function(response){
						if(response.error == false){
							console.log(response);
							var nowLike = $('#countBlogsLike').text();
							if(response.data.count != 0){
								if(response.data.count == -1 && parseInt(nowLike) == 0){}
								else{
									nowLike = parseInt(nowLike) + parseInt(response.data.count);
								}
							}
							$('#countBlogsLike').text(nowLike);
						}
					}
				});
			}

	    	function blogCommentSave(comment)
	    	{
	    		$.ajax({
					url : "{{route('api.blog.comment.post')}}",
					type : 'post',
					data : {blogId : '{{$data->blog->id}}', userId:'{{auth()->user()->id}}',comment : comment},
					success:function(res){
						console.log(res);
						$('.loading-data').hide();
						$('button').attr('disabled', false);
						if(res.error == false){
							$('#commentMessage').val('');
							var nowCount = $('#countBlogsComments').text();
							nowCount = parseInt(nowCount) + 1;
							$('#countBlogsComments').text(nowCount);
							$('#commentLogs').prepend('<div class="d-flex border-bottom mb-4"><div class="comment-img"><img src="{{asset(auth()->user()->image)}}"></div><div><h5>Posted By : {{ucfirst(auth()->user()->name)}}</h5><time datetime="2020-01-01">Posted at : '+res.data.time+'</time><p>Comment : '+res.data.comment+'</p></div></div>');
						}
					}
	    		});
	    	}
		@endauth
    </script>
@stop
@endsection