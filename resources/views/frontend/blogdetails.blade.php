@extends('frontend.layouts.master')
@section('title','Blog Details')
@section('content')

<section class="page_banner blog_details_banner">
	<div class="container">
		<?php $blogCategory = $data->blogs->category; ?>
		<div class="row">
			<div class="col-12">
				<h1 class="heading text-white pb-0 mb-0 text-center">{{$data->blogs->title}}</h1>
				<div class="blog_date">
					<img src="{{asset('forntEnd/images/calender.png')}}">
					<h5>{{date('M d, Y',strtotime($data->blogs->created_at))}}</h5>
				</div>
				<div class="blog_category_group">
					<ul>
						<!-- <li><a href="#">#Fashion,</a></li>
						<li><a href="#">#Creativity,</a></li>
						<li><a href="#">#Culture,</a></li>
						<li><a href="#">#Nature</a></li> -->
						<li><a href="javascript:void(0)">#{{strtoupper($blogCategory->name)}}</a></li>
					</ul>
				</div>
			</div>
			<?php $blogAuthor = $data->blogs->posted; ?>
			@if($blogAuthor)
				<div class="col-12 text-right">
					<div class="blog_author_box">
						<img src="{{asset($blogAuthor->image)}}">
						<p>{{$blogAuthor->name}}</p>
					</div>
				</div>
			@endif
		</div>
	</div>
</section>

<section class="blog_wrapper">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-12 col-lg-3 col-md-12">
				<div class="energy_plan">
					<h3 class="text-white">Compare <span class="bold">Energy Plans</span> Here – <span class="bold lightgreen">Free!</span></h3>
					<a href="#" class="white_btn">view all <span><img src="{{asset('forntEnd/images/button-small-icon-3.png')}}"></span></a>
				</div>
				<div class="search_form_wrap">
					<form>
						<div class="search_container">
							<input type="search" name="" placeholder="Enter Your Keyword...">
							<button><img src="{{asset('forntEnd/images/search.png')}}"></button>
						</div>
					</form>
				</div>
				<div class="blog_category_wrap">
					<h4 class="category_title">Categories</h4>
					<ul>
						<li><a href="{{route('blogs')}}">All</a></li>
						@foreach($data->category as $category)
							<li><a href="{{route('blogs')}}?category={{base64_encode($category->id)}}">{{$category->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="newsletter_wrap">
					<img src="{{asset('forntEnd/images/Layer.png')}}">
					<h3>Stay Tuned !</h3>
					<p>Subscribe our Newsletter & get notifications to stay update</p>
					<form>
						<div class="email_wrapper">
							<input type="email" name="" placeholder="Enter your e-mail Address">
							<button><img src="{{asset('forntEnd/images/submit.png')}}"></button>
						</div>
					</form>
				</div>
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
				<div class="blog_details_container">
					<div class="blog_title_wrap">
						<img src="{{asset($data->blogs->image)}}">
						<div class="content_title">
							<h2>{{$data->blogs->title}}</h2>
							<!-- <h2>Lorem Ipsum is <span>simply dummy text</span></h2> -->
						</div>
					</div>
					<div class="blog_details_content">
						{!! $data->blogs->description !!}
					</div>
					<!-- <div class="blog_details_content">
						<p class="details_title">Lorem Ipsum is simply dummy text</p>
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
						<p class="details_title">What is Lorem Ipsum?</p>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
						<div class="row align-items-center">
							<div class="col-12 col-md-5">
								<img src="{{asset('forntEnd/images/141645.png')}}">
							</div>
							<div class="col-12 col-md-7">
								<p class="details_title">Lorem Ipsum is simply dummy text</p>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. ing at its layout. The point of using Lorem Ipsum is that it has a more-or-sing 'Content here, content here', making it lookMany desktop publishing packages and web over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
							</div>
						</div>
					</div> -->
					<div class="share_story_wrap">
						<!-- <div class="story_wrap">
							<p>Share This Story On :</p>
							<ul class="blog_share">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
							</ul>
						</div> -->
						<?php $blogComments = $data->blogs->comment;
							$blogLikes = $data->blogs->likes;
						?>
						<div class="social_count_wrap">
							<ul>
								<li>
									<a href="javascript:void(0)" class="likeMainButton">
										<img src="{{asset('forntEnd/images/like.png')}}"><span id="countBlogsLike">{{count($blogLikes)}}</span>&nbsp;&nbsp;Likes <i class="fas fa-chevron-down"></i>
									</a>
								</li>
								<li>
									<a href="javascript:void(0)">
										<img src="{{asset('forntEnd/images/chat.png')}}"><span id="countBlogsComments">{{count($blogComments)}}</span>&nbsp; Comments
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="tag_wrap">
						<p>Tags : </p>
						<ul>
							<!-- <li><a href="#">#Fashion,</a></li>
							<li><a href="#">#Creativity,</a></li>
							<li><a href="#">#Culture,</a></li>
							<li><a href="#">#Nature</a></li> -->
							<li><a href="javascript:void(0)">#{{$blogCategory->name}}</a></li>
						</ul>
					</div>

					<div class="reply_form_wrap">
						<h3>Leave A Reply</h3>
						<p>Your Email Address Will Not Be Published. Required Fields Are Marked</p>
						<div class="form_wrap">
							<form onsubmit="return false" id="blogCommentFrom">
								<div class="form-row">
									<div class="col-12">
										<textarea class="custom_textarea" name="commentMessage" id="commentMessage" placeholder="Please type your comment" required></textarea>
									</div>
								</div>
								<button class="blue-btm leaveComment">LEAVE A COMMENT <span><i class="fas fa-arrow-circle-right"></i></span></button>
								<!-- <a href="javascript:void(0)" class="blue-btm leaveComment">LEAVE A COMMENT <span><i class="fas fa-arrow-circle-right"></i></span></a> -->
							</form>
						</div>
					</div>

					<div id="commentLogs">
						@foreach($blogComments as $comment)
							<p>{{$comment->comment}} by {{$comment->user->name}}</p><hr>
						@endforeach
					</div>
				</div>
			</div>
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
					url : '{{route("user.blog.like_or_unlike")}}',
					type : 'POST',
					dataType : 'JSON',
					data : {blogId: '{{$data->blogs->id}}', userId: '{{auth()->user()->id}}',like: status},
					success:function(response){
						if(response.error == false){
							console.log(response);
							var nowLike = $('#countBlogsLike').text();
							if(parseInt(nowLike) != 0){
								nowLike = parseInt(nowLike) + parseInt(response.data.count);
							}else{
								nowLike = 0;
							}
							$('#countBlogsLike').text(nowLike);
						}
					}
				});
			}
	    	function blogCommentSave(comment)
	    	{
	    		$.ajax({
					url : "{{route('user.blog.comment.post')}}",
					type : 'POST',
					dataType : 'JSON',
					data : {blogId : '{{$data->blogs->id}}', userId:'{{auth()->user()->id}}',comment : comment},
					success:function(res){
						console.log(res);
						$('.loading-data').hide();
						$('button').attr('disabled', false);
						if(res.error == false){
							$('#commentMessage').val('');
							var nowCount = $('#countBlogsComments').text();
							nowCount = parseInt(nowCount) + 1;
							$('#countBlogsComments').text(nowCount);
							$('#commentLogs').prepend('<p>'+res.data.comment+' by '+'{{auth()->user()->name}}'+'</p>');
						}
					}
	    		});
	    	}
		@endauth
    </script>
@stop
@endsection