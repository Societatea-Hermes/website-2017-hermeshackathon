@extends('frontend')

@section('page')
	<!-- Header
	============================================= -->
	<header id="header" class="full-header">

		<div id="header-wrap">

			<div class="container clearfix">

				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

				<!-- Logo
				============================================= -->
				<div id="logo">
					<a href="index.html" class="standard-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" alt="Canvas Logo"></a>
					<a href="index.html" class="retina-logo" data-dark-logo="images/logo@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
				</div><!-- #logo end -->

				<!-- Primary Navigation
				============================================= -->
				<nav id="primary-menu">
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
	<section id="page-title">
		<div class="container clearfix">
			<h1>{{$articleDetails->title}}</h1>
			<ol class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">{{$articleDetails->title}}</li>
			</ol>
		</div>
	</section><!-- #page-title end -->

	<!-- Content
	============================================= -->
	<section id="content">
		<div class="content-wrap">
			<div class="container clearfix">
				<div class="single-post nobottommargin">
					<!-- Single Post
					============================================= -->
					<div class="entry clearfix">
						<!-- Entry Content
						============================================= -->
						<div class="entry-content notopmargin">
							{{$articleDetails->content}}
						</div>
					</div><!-- .entry end -->
				</div>
			</div>
		</div>
	</section><!-- #content end -->
@stop
