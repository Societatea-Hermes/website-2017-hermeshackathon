@extends('frontend')

@section('page')
	<!-- Header
	============================================= -->
	<header id="header" class="transparent-header full-header dark" data-sticky-class="not-dark">
		<div id="header-wrap">
			<div class="container clearfix">
				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
				<!-- Logo
				============================================= -->
				<div id="logo">
					<a href="index.html" class="standard-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" ></a>
					<a href="index.html" class="retina-logo" data-dark-logo="images/logo@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
				</div>
				<!-- Primary Navigation
				============================================= -->
				<nav id="primary-menu" class="not-dark">
					<ul>
						<li class="current"><a href="#"><div>Home</div></a></li>
						<li class="fright clearfix"><a href="https://www.facebook.com/SSMIUBB" target="_blank"><div class=""><i class="icon-facebook"></i></div></a></li>
						<li class="fright clearfix"><a href="/facebookLogin" target="_blank"><div class="">Facebook profile overlay</div></a></li>
					</ul>
				</nav><!-- #primary-menu end -->
			</div>
		</div>
	</header><!-- #header end -->

	<!-- Page Title
	============================================= -->
	<section id="page-title" class="page-title-parallax page-title-dark page-title-right" style="padding: 250px 0; background-image: url('{{$eventDetails->banner}}'); background-size: cover; background-position: center center;" data-stellar-background-ratio="0.2">
		<div class="container clearfix">
			<h1>{{$eventDetails->title}}</h1>
		</div>
	</section><!-- #page-title end -->

	<!-- Content
	============================================= -->
	<section id="content">
		<div class="content-wrap">
			<div class="container clearfix">
				<div class="row clearfix">
					<div class="col-md-6">
						<h3>Details</h3>
						Type: {{$eventType}} <br />
						Date: {{$eventDetails->date}} <br />
						Time: {{$eventDetails->time}} <br />
						Location: {{$eventDetails->location_text}}
					</div>
					<div class="col-md-6">
						<h3>Description</h3>
						{{$eventDetails->description}}
					</div>
				</div>
			</div>
			@if(count($articles) > 0) 
				<div class="section">
					<div class="container clearfix">
						<div class="heading-block center nobottommargin nobottomborder">
							<h3>Event articles</h3>
						</div>
					</div>
				</div>
				<div class="container clearfix">
					<!-- Posts
					============================================= -->
					<div id="posts">
						@foreach($articles as $article)

							<div class="entry clearfix">
								<div class="entry-title">
									<h2><a href="/article/{{$article->id}}">{{$article->title}}</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> {{$article->created_at->format('Y-m-d')}}</li>
									<li><i class="icon-user"></i> {{$article->fullname}}</li>
								</ul>
								<div class="entry-content">
									{{substr($article->content, 0, 250)}}... <br />
									<a href="/article/{{$article->id}}" class="more-link">Read More</a>
								</div>
							</div>
						@endforeach
					</div><!-- #posts end -->
				</div>
			@endif
		</div>
	</section><!-- #content end -->
@stop
