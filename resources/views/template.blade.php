<?php
// Determining application environment
$isProduction = App::environment() == 'production' ? true : false;
?>
<!DOCTYPE html>
<html dir="ltr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="Glitch" />

		<!-- Stylesheets
		============================================= -->
		<link href="//fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="/style.css" type="text/css" />
		<link rel="stylesheet" href="/css/dark.css" type="text/css" />
		<link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
		<link rel="stylesheet" href="/css/animate.css" type="text/css" />
		<link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />
		<link rel="stylesheet" href="/css/calendar.css" type="text/css" />
		<link rel="stylesheet" href="/css/et-line.css" type="text/css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" type="text/css" />

		<link rel="stylesheet" href="css/responsive.css" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="/css/onepage.css" type="text/css" />
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->

		@yield('extraCss')

		<!-- Document Title
		============================================= -->
		<title>{{$isProduction ? "" : "[DEV] "}}hermesHackathon 2017</title>

	</head>

	<body class="stretched" data-loader="11" data-loader-color="#543456">
		
		@yield('mainPage')
		

		<!-- Go To Top
		============================================= -->
		<div id="gotoTop" class="icon-angle-up"></div>

		<!-- External JavaScripts
		============================================= -->
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

		<!-- Footer Scripts
		============================================= -->
		@yield('scripts')

	</body>
</html>