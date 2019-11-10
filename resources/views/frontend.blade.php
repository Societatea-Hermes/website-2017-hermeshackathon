<?php
$currentDT = Carbon\Carbon::now('Europe/Bucharest');
// $currentDT = Carbon\Carbon::createFromFormat('Y-m-d H:i', '2016-12-10 11:30');
$maxSignupTime = Carbon\Carbon::createFromFormat('Y-m-d H:i', '2019-11-22 00:00');
$canSignup = true;
if($currentDT->gte($maxSignupTime)) {
	$canSignup = false;
}

$isDone = true;
?>

@extends('template')

@section('mainPage')
			<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header transparent-header border-full-header dark static-sticky" data-sticky-class="not-dark" data-sticky-offset="full" data-sticky-offset-negative="100">
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
						<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
							<li><a href="#" data-href="#wrapper"><div>Home</div></a></li>
							<li><a href="#" data-href="#section-about"><div>About</div></a></li>
							<li><a href="#" data-href="#section-services"><div>Themes</div></a></li>
							<li><a href="#" data-href="#section-signup"><div>Sign up</div></a></li>
							@if($isDone)
								<li><a href="#" data-href="#section-timeline"><div>Event timeline</div></a></li>
								<li><a href="#" data-href="#section-partners"><div>Partners</div></a></li>
							@endif
							<li><a href="#" data-href="#section-contact"><div>Contact</div></a></li>
						</ul>
					</nav><!-- #primary-menu end -->
				</div>
			</div>
		</header><!-- #header end -->

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-parallax full-screen">
			<div class="slider-parallax-inner">
				<div class="full-screen dark section nopadding nomargin noborder ohidden" style="background-image: url('/images/register2.png'); background-size: cover; background-position: center center;">
					<div class="container clearfix">
						<div class="vertical-middle" style="max-width: 700px;">
							<div class="heading-block nobottomborder">
								<h1 style="font-size: 36px;" class="nott font-body">hermesHackathon 2019</h1>
								<span style="font-size: 18px;" class="t300 nott ls1 topmargin-sm">coding.start();</span>
							</div>
							<div class="bottommargin clearfix" style="display:block; border-top:1px solid rgba(255,255,255,0.2); border-bottom:1px solid rgba(255,255,255,0.2); max-width: 350px; padding: 15px 0; font-size: 16px;">
								<i class="icon-line-clock i-plain notopmargin nobottommargin"></i> <div id="countdown-ex4" class="countdown countdown-inline" style="margin-top: 7px;"></div>
							</div>
							<a href="#" data-scrollto="#section-signup" ata-easing="easeInOutExpo" data-speed="1250" data-offset="65" class="button button-red button-3d nomargin">Sign up</a>
						</div>
					</div>
					<div class="video-wrap">
						<div class="video-overlay" style="background-color: rgba(0,0,0,0.65);"></div>
					</div>
					<a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
				</div>
			</div>
		</section><!-- #slider end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap nopadding">
				<div id="section-about" class="center page-section">
					<div class="container clearfix">
						<h2 class="divcenter bottommargin font-body" style="max-width: 700px; font-size: 40px;">GENERAL INFORMATION</h2>
						<p class="lead divcenter bottommargin" style="max-width: 800px;">
							<b>Who?</b><br />
							hermesHackathon is aimed at students, freelancers or just anyone who’s passionate about programming and wants to contribute to a better society.
							<br /><br />
							<b>What?</b><br />
							A hackathon is a 24-hour coding marathon that involves creating a desktop, mobile or web application out of an idea. The aim of hermesHackathon is to find solutions that will improve the quality of life for our citizens and will help the environment.
							<br /><br />
							<b>How?</b><br />
							Each team can have a maximum number of 4 members, so you can gather your friends and participate together or you can participate on your own. There will be at least 2 mentoring sessions during the event where the contestants will get advice and will be helped to better understand the approach of a hackathon.</p>
						<p class="bottommargin" style="font-size: 16px;"><a href="#" data-scrollto="#section-services" data-easing="easeInOutExpo" data-speed="1250" data-offset="70" class="more-link">Themes <i class="icon-angle-right"></i></a></p>
					</div>
				</div>
				<div id="section-services" class="page-section nopadding">
					<div class="section nomargin nobottompadding">
						<div class="container clearfix">
							<div class="divcenter center" style="max-width: 900px;">
								<h2 class="nobottommargin t300 ls1">Themes</h2>
							</div>
						</div>
					</div>
					<div class="common-height nomargin nopadding section clearfix">
						<div class="col-md-12">
							<div class="max-height">
								<div class="row common-height grid-border clearfix">
									<div class="col-md-3 col-sm-6 col-padding">
										<div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
											<div class="fbox-icon">
												<img src="/images/categories_2018/education.png">
											</div>
											<h3>Education</h3>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-padding">
										<div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
											<div class="fbox-icon">
												<img src="/images/categories_2018/farming.png">
											</div>
											<h3>Smart agriculture</h3>
										</div>
									</div>

									<div class="col-md-3 col-sm-6 col-padding">
										<div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
											<div class="fbox-icon">
												<img src="/images/categories_2018/smart_city.png">
											</div>
											<h3>Smart city</h3>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-padding">
										<div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
											<div class="fbox-icon">
												<img src="/images/categories_2018/health_lifestyle.png">
											</div>
											<h3>Health & lifestyle</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@if($isDone)
				<div id="section-timeline" class="page-section nopadding">
					<div class="section nomargin nobottompadding dark">
						<div class="container clearfix">
							<div class="divcenter center" style="max-width: 900px;">
								<h2 class="nobottommargin t300 ls1">Event timeline</h2>
							</div>
						</div>
					</div>
					<div class="common-height nomargin notoppadding section clearfix dark">
						<div class="container">
							<div class="row">
								<div class="col-md-12 timeline">
									<section id="cd-timeline" class="cd-container">
										<?php $itemRedShown = 0; ?>
										@foreach($timeline as $key => $val)
											<?php
												$keyExploded = explode(' ', $val['start_date']);
												$dateExploded = explode('-', $keyExploded[0]);
												$dateTmp = Carbon\Carbon::createFromFormat('Y-m-d H:i', $val['start_date']);
												$dateTmpEnd = Carbon\Carbon::createFromFormat('Y-m-d H:i', $val['end_date']);
												if($dateTmp->gt($currentDT)) {
													$class = "cd-movie"; // Urmeaza sa fie..
													$itemRedShown++;
												} elseif($dateTmp->lte($currentDT) && $dateTmpEnd->gt($currentDT)) {
													$class = "cd-location"; // In desfasurare..
												} else {
													$class = "cd-picture"; // A fost..
												}

												$isHidden = false;
												if($class == "cd-picture") {
													$isHidden = true;
												} elseif($class == 'cd-movie' && $itemRedShown > 2) {
													$isHidden = true;
												}
											?>
											<div class="cd-timeline-block {{$isHidden ? 'hiddenItem' : ''}}">
												<div class="cd-timeline-img {{$class}}"></div> <!-- cd-timeline-img -->
												<div class="cd-timeline-content">
													<h2>{{$key}}</h2>
													<span class="cd-date">{{$keyExploded[1]}} ({{$dateExploded[2]}} Nov)</span>
												</div> <!-- cd-timeline-content -->
											</div> <!-- cd-timeline-block -->
										@endforeach
									</section> <!-- cd-timeline -->
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<button id="showTimelineBtn" class="button button-border button-circle button-light topmargin-sm" type="submit" onclick="showFullTimeline();return false;">Show full timeline</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif

				<div id="section-signup" class="page-section">
					<div class="nomargin">
						<div class="container clearfix">
							<div class="divcenter center" style="max-width: 900px;">
								<h2 class="nobottommargin t300 ls1">Sign up <br /><small>Your team can have up to 4 members.</small></h2>
								<h3><small>The sign-up form is open until November the 20nd at 12.00. Due to the large number of teams that signed up, we chose to end the formular earlier. Thank you for choosing hermesHackathon :) </small></h3>
							</div>
						</div>
					</div>
					@if(!$canSignup)
						<div class="alert alert-danger text-center">
							<b>Sign ups are closed!</b>
						</div>
					@else
						<div class="widget subscribe-widget clearfix" data-loader="button">
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form" role="form" method="post" class="nobottommargin">
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<input type="text" id="team-name" name="team-name" class="form-control input-lg required" placeholder="Team name">
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<input type="text" id="member1-name" name="member1-name" class="form-control input-lg required" placeholder="Team leader name">
									</div>
									<div class="col-md-2">
										<input type="email" id="member1-email" name="member1-email" class="form-control input-lg required" placeholder="Team leader email">
									</div>
									<div class="col-md-2">
										<input type="text" id="member1-phone" name="member1-phone" class="form-control input-lg required" placeholder="Team leader phone">
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<input type="text" id="member2-name" name="member2-name" class="form-control input-lg required" placeholder="Member 2 name">
									</div>
									<div class="col-md-2">
										<input type="email" id="member2-email" name="member2-email" class="form-control input-lg required" placeholder="Member 2 email">
									</div>
									<div class="col-md-2">
										<input type="text" id="member2-phone" name="member2-phone" class="form-control input-lg required" placeholder="Member 2 phone">
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<input type="text" id="member3-name" name="member3-name" class="form-control input-lg required" placeholder="Member 3 name">
									</div>
									<div class="col-md-2">
										<input type="email" id="member3-email" name="member3-email" class="form-control input-lg required" placeholder="Member 3 email">
									</div>
									<div class="col-md-2">
										<input type="text" id="member3-phone" name="member3-phone" class="form-control input-lg required" placeholder="Member 3 phone">
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<input type="text" id="member4-name" name="member4-name" class="form-control input-lg required" placeholder="Member 4 name">
									</div>
									<div class="col-md-2">
										<input type="email" id="member4-email" name="member4-email" class="form-control input-lg required" placeholder="Member 4 email">
									</div>
									<div class="col-md-2">
										<input type="text" id="member4-phone" name="member4-phone" class="form-control input-lg required" placeholder="Member 4 phone">
									</div>
								</div>
								<div class="row">
									<div class="nomargin">
										<div class="container clearfix topmargin-sm">
											<div class="divcenter center" style="max-width: 900px;">
												<h3><small><input class="topmargin-sm text-center" type="checkbox"  onclick="acceptGDPR()" id="accept" value="Politici">
														I accept the processing of personal data by the Hermes Society, within the Hermes Hackathon contest.<br>
													</small>
												</h3>
												<h3><small> <input type="checkbox" onclick="showDetailsGdpr()" id="showGdpr">
														See more about personal data processing:
													</small>
												</h3>
											</div>

											<div class="divcenter center" style="max-width: 900px;display: none" id="detailsGdpr" >
												<b>Agreement on the Privacy Policy</b><br>
												This form contains information about the data collected from you. In collecting this data,<br>
												according to the law, we must provide you with information about us, the reasons why we<br>
												collect the data and how we will use it, as well as the rights that you have regarding<br>
												your personal data. Through this form we ask you to express your consent in order to use<br>
												the processing of personal data, for the purposes specified herein. Please fill in this<br>
												form only if you agree to give us this consent for the purposes specified below.<br><br>

												<b>Who are we?</b>
												<br>
												The name of the company requesting your consent for the use of your data,  <br>
												for the purposes specified in this form, is:   <br>
												HERMES SOCIETY  <br>
												 str. Bogdan Petriceicu, nr.45, room H4   <br>
												 Cluj-Napoca, Cluj County, Romania  <br>
												 <br>

												 <b>We want to use the following personal data:</b>
												 <br>
												 Name and Surname  <br>
												 E-mail address  <br>
												 Phone number   <br><br>

												 <b>Use of your data</b>
												 <br>
												Your data will be used exclusively for contact purposes within the "Hermes Hackathon" contest.   <br>
												With your consent, your data can <b>only</b> be transmitted in the Hermes Society to be contacted <br>
												regarding the status of the event. You may at any time withdraw your consent for future use, storage,   <br>
												distribution or disclosure of your personal data. However, please note that withdrawing your consent <br>
												will only affect the further processing of your personal data and will not affect the legality  <br>
												of the processing already carried out.<br>

												<br>
												<b>Withdrawal of consent</b>   <br>
												You can withdraw your consent at any time by email:   <br>
												contact@societatea-hermes.ro.   <br>
												<br><br>

												<b>Duration of data retention</b>
												<br>
												We will keep your data for 2 months from the date of its supply to us.  <br><br>

												<b>Contact</b>
												<br>
												If you have questions, complaints or need you additional information about    <br>
												this Privacy Policy, please contact us at the email address:  <br>
												contact@societatea-hermes.ro.   <br>

											</div>
										</div>
									</div>
{{--									<div class="col-md-12 text-center" >--}}
{{--										<input class="topmargin-sm text-center" type="checkbox"  onclick="acceptGDPR()" id="accept" value="Politici"> Accept prelucrarea datelor personale de catre Societatea Hermes, in cadrul evenimentului Hermes Hackathon.<br>--}}
{{--									</div>--}}
									<div class="col-md-12 text-center"  id="gdpr" style="display: none">
										<button class="button button-border button-circle topmargin-sm" type="submit" onclick="signupTeam();return false;">Sign up</button>
									</div>
								</div>
							</form>
						</div>
					@endif
				</div>

				<div id="section-partners" class="page-section nopadding">
					<div class="section nomargin">
						<div class="container clearfix">
							<div class="divcenter center" style="max-width: 900px;">
								<h2 class="nobottommargin t300 ls1">Partners</h2>
								<h3 class="nobottommargin t300 lsl">To be announced</h3>
							</div>
						</div>
						<div class="container clearfix">
							<div id="oc-clients" class="owl-carousel topmargin image-carousel carousel-widget" data-margin="80" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5" data-items-lg="6">
{{--								<div class="oc-item"><a href="https://techntrade.ro/" target="_blank"><img src="/images/partners/2019/techntrade.jpg" alt="Techntrade"></a></div>--}}
{{--								<div class="oc-item"><a href="https://www.facebook.com/ThatDevSpaceClujNapoca/" target="_blank"><img src="/images/partners/2017/rendered/devspace.png" alt="thatdevspace"></a></div>--}}
{{--								<div class="oc-item"><a href="https://wayfare.ro/" target="_blank"><img src="https://wayfare.ro/wp-content/uploads/2016/11/logo_wayfare_rgb@1x.png" alt="WAYFARE"></a></div>--}}
						</div>
						</div>
					</div>
				</div>

				@if($isDone)
				<div id="section-contact" class="page-section nopadding">
					<div class="row noleftmargin nomargin bottommargin-lg common-height">
						<div id="headquarters-map" class="col-md-8 col-sm-6 gmap hidden-xs nopadding"></div>
						<div class="col-md-4 col-sm-6 dark" style="background-color: rgb(51, 51, 51);">
							<div class="col-padding max-height">
								<h3 class="font-body t400 ls1">hermesHackathon location</h3>
								<div style="font-size: 16px; line-height: 1.7;">
									<address style="line-height: 1.7;">
										<strong>Techntrade</strong><br>
										Teodor Mihali 62 Street, <br />Cluj-Napoca 400000, <br />Romania
									</address>
									<div class="clear topmargin"></div>
{{--									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (+40) 751.452-668<br>--}}
									<abbr title="Email Address"><strong>Email:</strong></abbr> hackathon@societatea-hermes.ro
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark noborder">
			<div class="container center">
				<div class="footer-widgets-wrap nobottompadding">
					<div class="row divcenter clearfix">
						<div class="col-md-6">
							<div class="widget clearfix">
								<h4>Site Links</h4>
								<ul class="list-unstyled footer-site-links nobottommargin">
									<li><a href="#" data-scrollto="#wrapper" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">Top</a></li>
									<li><a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">About</a></li>
									<li><a href="#" data-scrollto="#section-services" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">Themes</a></li>
									@if($isDone)
									<li><a href="#" data-scrollto="#section-timeline" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">Event timeline</a></li>
									<li><a href="#" data-scrollto="#section-partners" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">Partners</a></li>
									@endif
									<li><a href="#" data-scrollto="#section-signup" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">Sign up</a></li>
									<li><a href="#" data-scrollto="#section-contact" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">Contact</a></li>
								</ul>
							</div>
						</div>
{{--						<div class="col-md-4">--}}
{{--							<div class="widget subscribe-widget clearfix" data-loader="button">--}}
{{--								<h4>Subscribe</h4>--}}
{{--								<div class="widget-subscribe-form-result"></div>--}}
{{--								<form id="widget-subscribe-form" role="form" method="post" class="nobottommargin">--}}
{{--									<input type="email" id="email" name="email" class="form-control input-lg not-dark required email" placeholder="Your Email Address">--}}
{{--									<button class="button button-border button-circle button-light topmargin-sm" type="submit" onclick="subscribeToNewsletter();return false;">Subscribe Now</button>--}}
{{--								</form>--}}
{{--							</div>--}}
{{--						</div>--}}
						<div class="col-md-6">
							<div class="widget clearfix">
								<h4>Contact<br /><small>Societatea Hermes</small></h4>
								<p class="lead">Cantina Hasdeu, <br />Complex Studentesc Hasdeu, <br />Bogdan Petriceicu Hasdeu street, number 45, <br />Cluj-Napoca <br />Romania</p>
								<div class="center topmargin-sm">
									<a href="https://www.facebook.com/hermeshackathon" class="social-icon inline-block noborder si-small si-facebook" title="Facebook">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="copyrights">
				<div class="container center clearfix">
					Copyright Societatea Hermes {{date('Y')}} | All Rights Reserved
				</div>
			</div>
		</footer><!-- #footer end -->
	</div><!-- #wrapper end -->
@stop

@section('scripts')
		<!-- Google Map JavaScripts
	============================================= -->
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDKBgZCYVZhuda3TNQP_BBpvF6J5qW86kE"></script>
	<script type="text/javascript" src="../js/jquery.gmap.js"></script>

	<script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript" src="js/app/comming_soon.js"></script>

	<script type="text/javascript">
		jQuery(window).load(function(){

			// Google Map
			jQuery('#headquarters-map').gMap({
				address: 'Strada Teodor Mihali 62, Cluj-Napoca',
				maptype: 'ROADMAP',
				zoom: 16,
				markers: [
					{
						address: "Strada Teodor Mihali 62, Cluj-Napoca",
						html: "Strada Teodor Mihali 62",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [14,44]
						}
					}
				],
				doubleclickzoom: true,
				controls: {
					panControl: false,
					zoomControl: true,
					mapTypeControl: false,
					scaleControl: true,
					streetViewControl: false,
					overviewMapControl: false
				},
				styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":"-100"},{"lightness":"30"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"gamma":"0.00"},{"lightness":"74"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"lightness":"3"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
			});

		});

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88594324-1', 'auto');
  ga('send', 'pageview');

	</script>

	@yield('extraScripts')
@stop