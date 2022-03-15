<!DOCTYPE html>
<html lang="en">
{{-- <head>
	<title>{{config('app.name', 'Laravel')}} - @yield('title')</title>
	<link rel="icon" href="{{asset('forntEnd/images/logo.png')}}" type="image/gif" sizes="any">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="{{asset('forntEnd/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('forntEnd/css/slick.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('forntEnd/css/slick-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('forntEnd/css/style.css')}}">
	@yield('css')
</head> --}}
 <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="./favicon.ico">
		<title>{{config('app.name', 'Laravel')}} - @yield('title')</title>

        <!--CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link href="{{asset('forntEnd/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/aos.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/responsive.css')}}" rel="stylesheet" type="text/css">
		@yield('css')
    </head>

<body>

		<header class="header">
		</header>