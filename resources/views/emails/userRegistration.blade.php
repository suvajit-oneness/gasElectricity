<body>
	<h3>Hello {{ $name }}</h3>

	<h3>{{$content}}</h3>

	@if(!empty($email)) <h3>Email : {{$email}}</h3> @endif
	
	@if(!empty($password)) <h3>Password : {{$password}}</h3> @endif

	<h3>Greetings from the team Switchr.</h3>
	
	<h3>We hope you are going to have a great time with us.</h3>
	
	<h4>Best Wishes,</h4><br>
	
	<h4>Switchr</h4>
</body>