<footer class="footer">
			<div class="container">
				<div class="row m-0 justify-content-between">
					<div class="col-12 col-lg-4">
						<div class="f-menu">
							<h6><a href="{{url('/')}}"><img src="{{asset('forntEnd/img/logo2.png')}}" width="140px"></a></h6>
							<p>
								Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over..

							</p>
							<div class="d-flex align-items-center mt-3">
								<img src="{{asset('forntEnd/img/icf.png')}}" class="az_img">
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-2">
						<div class="f-menu">
							<h6>Link</h6>
							<ul class="us_link">
								<li><a href="{{route('aboutus')}}">About Us</a></li>
								<li><a href="javascript:void(0);">services</a></li>
								<li><a href="{{route('contact-us')}}">Contact Us</a></li>
								<li><a href="javascript:void(0);">Terms Of Service</a></li>
								<li><a href="javascript:void(0);">Privacy Policy</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="f-menu">
							<h6>Contact</h6>
							<div class="d-flex mb-3 addre_text">
								<a href="tel:+88 657524332"><i class="fas fa-phone-alt"></i>
								[88] 657 524 332</a>
							</div>
							<div class="d-flex mb-3 addre_text">
								<a href="mailto:info@example.com"><i class="fas fa-envelope-open-text"></i>
								demo@gmail.com</a>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-2 ps-2 pe-2 ps-lg-0 pe-lg-0">
						<div class="f-menu">
							<h6>Social Media</h6>
							<div class="social_link">
								<a href="{{$contact->facebook}}"><i class="fab fa-facebook-f"></i></a>
								<a href="{{$contact->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
								<a href="{{$contact->youtube}}"><i class="fab fa-youtube"></i></a>
							</div>
							<p class="mt-3 mt-lg-5"><small>© SwitchR 2022 All rights reserved.</small></p>
						</div>
					</div>
					<!-- <div class="col-12 pt-3 mt-3 border-top text-center">
						<p><small>Copyright © 2021 XYZ. All Rights Reserved</small></p>
					</div> -->
				</div>
			</div>
		</footer>

