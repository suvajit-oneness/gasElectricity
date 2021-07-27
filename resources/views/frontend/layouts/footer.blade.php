<footer>
	<div class="container">
		<div class="row">
			<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12">
				<div class="foot_info">
					<a href="#" class="foot_logo">
						<img src="{{asset('forntEnd/images/switchr_logo_footer.png')}}">
					</a>
					<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin</p>
				</div>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
				<div class="foot_links">
					<h6 class="foot_title">Links</h6>
					<ul>
						<li>
							<a href="{{url('/')}}">HOME</a>
						</li>
						<li>
							<a href="{{route('aboutus')}}">ABOUT</a>
						</li>
						<li>
							<a href="{{route('contact-us')}}">CONTACT</a>
						</li>
						<li>
							<a href="{{route('indivisual.state')}}">Individual State</a>
						</li>
						<li>
							<a href="#">Individual Utility</a>
						</li>
						<li>
							<a href="{{route('blogs')}}">blogs</a>
						</li>
						<li>
							<a href="{{route('how-it-works')}}">how it works?</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-2 col-lg-4 col-md-3 col-sm-6 col-12 px-md-0 ">
				<h6 class="foot_title">Contact</h6>
				<ul class="address_links">
					<li>
						<img src="{{asset('forntEnd/images/call.png')}}">
						<a href="tel:+88 657524332">[88] 657 524 332</a>
					</li>
					<li>
						<img src="{{asset('forntEnd/images/envelop.png')}}">
						<a href="mailto:info@example.com">info@example.com</a>
					</li>
				</ul>
			</div>
			<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="foot_title">Contact</h6>
				<ul class="social_links">
					<li>
						<a href="{{$contact->facebook}}" target="_blank"><img src="{{asset('forntEnd/images/facebook.png')}}"></a>
					</li>
					<li>
						<a href="{{$contact->linkedin}}" target="_blank"><img src="{{asset('forntEnd/images/linkedin.png')}}"></a>
					</li>
					<li>
						<a href="{{$contact->youtube}}" target="_blank"><img src="{{asset('forntEnd/images/youtube.png')}}"></a>
					</li>
				</ul>
				<ul class="foot_logo_items">
					<li>
						<img src="{{asset('forntEnd/images/crown.png')}}">
					</li>
					<li>
						<img src="{{asset('forntEnd/images/aws.png')}}">
					</li>
					<li>
						<img src="{{asset('forntEnd/images/cyber-agency.png')}}">
					</li>
				</ul>
				<p class="text-right copyright_text">© SwitchR 2021. All rights reserved.</p>
			</div>
		</div>
	</div>
</footer>