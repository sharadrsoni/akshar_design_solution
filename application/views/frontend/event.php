<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->

	<!-- Mirrored from www.keenthemes.com/preview/metronic_frontend/blog.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 13 Sep 2013 11:47:56 GMT -->
	<!-- Added by HTTrack -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<!-- /Added by HTTrack -->
	<head>
		<meta charset="utf-8" />
		<title>Events | Akshar Design Solution</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/reset.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
		<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
		<link href="assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
		<link rel="shortcut icon" href="favicon.ico" />
	</head>
	<!-- END HEAD -->

	<!-- BEGIN BODY -->
	<body>
		<div class="front-topbar">
			<div class="container">
				<div class="row-fluid">
					<div class="span6">
						<ul class="unstyled inline">
							<li>
								<i class="icon-phone topbar-info-icon top-2"></i>Call us: <span>(1) 456 6717</span>
							</li>
							<li class="sep">
								<span>|</span>
							</li>
							<li>
								<i class="icon-envelope-alt topbar-info-icon top-2"></i>Email: <span>info@akshardesignsolution.com</span>
							</li>
						</ul>
					</div>
					<div class="span6 topbar-social">
						<ul class="unstyled inline">
							<li>
								<a href="#"><i class="icon-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon-google-plus"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon-linkedin"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END TOP BAR -->

		<!-- BEGIN HEADER -->
		<div class="front-header">
			<div class="container">
				<div class="navbar">
					<div class="navbar-inner">
						<!-- BEGIN LOGO (you can use logo image instead of text)-->
						<a class="brand logo-v1" href="index-2.html"> <img src="assets/img/logo_blue.png" id="logoimg" alt=""> </a>
						<!-- END LOGO -->
						<!-- BEGIN RESPONSIVE MENU TOGGLER -->
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
						<!-- END RESPONSIVE MENU TOGGLER -->
						<!-- BEGIN TOP NAVIGATION MENU -->
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li>
									<a href="index.html">Home</a>
								</li>
								<li >
									<a href="courses.html">Courses</a>
								</li>
								<li class="active">
									<a href="event.html">Event</a>
								</li>
								<li>
									<a href="about_us.html">About Us</a>
								</li>
								<li>
									<a href="contact_us.html">Contact Us</a>
								</li>
								<li>
									<span class="sep"></span><a href="#">Login</a>
								</li>
							</ul>
						</div>
						<!-- BEGIN TOP NAVIGATION MENU -->
					</div>
				</div>
			</div>
		</div>
		<!-- END HEADER -->
		<!-- BEGIN BREADCRUMBS -->
		<div class="row-fluid breadcrumbs margin-bottom-40">
				<div class="span11">
					<ul class="pull-right breadcrumb">
						<li>
							<a href="index.html">Home</a><span class="divider">/</span>
						</li>
						<li class="active">
							Events
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END BREADCRUMBS -->

		<!-- BEGIN CONTAINER -->
		<div class="container min-hight">
			<!-- BEGIN BLOG -->
			<div class="row-fluid">
				<!-- BEGIN LEFT SIDEBAR -->
				<div class="span12 blog-posts margin-bottom-40">
					<?php
					foreach ($newsCategories as $key) {
						echo "<div class='row-fluid'>
<div class='span4'>
<!-- BEGIN CAROUSEL -->
<div class='front-carousel'>
<div id='myCarousel' class='carousel slide'>
<!-- Carousel items -->
<div class='carousel-inner'>";
						foreach ($newCategoryDetails[$key->newsCategoryId] as $key2) {
							echo "<div class='active item'>
<img src='$key2->newsCategoryDetailsPhotograph' alt=''>
</div>";
						}
						echo "</div>
<!-- Carousel nav -->
<a class='carousel-control left' href='#myCarousel' data-slide='prev'>
<i class='icon-angle-left'></i>
</a>
<a class='carousel-control right' href='#myCarousel' data-slide='next'>
<i class='icon-angle-right'></i>
</a>
</div>
</div>
<!-- END CAROUSEL -->
</div>
<div class='span8'>
<h2>$key->newsCategoryTitle</h2>
<ul class='blog-info'>
<li><i class='icon-calendar'></i> $key->newsCategoryDate</li>
</ul>
<p>$key->newsCategoryDescription</p>
</div>
</div>
<hr class='blog-post-sep'>";
					}
					?>
					<div class="pagination pagination-centered">
						<ul>
							<li>
								<a href="#">Prev</a>
							</li>
							<li>
								<a href="#">1</a>
							</li>
							<li>
								<a href="#">2</a>
							</li>
							<li class="active">
								<a href="#">3</a>
							</li>
							<li>
								<a href="#">4</a>
							</li>
							<li>
								<a href="#">5</a>
							</li>
							<li>
								<a href="#">Next</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- END LEFT SIDEBAR -->
			</div>
			<!-- END BEGIN BLOG -->
		</div>
		<!-- END CONTAINER -->

		<!-- BEGIN COPYRIGHT -->
		<div class="front-copyright">
			<div class="container">
				<div class="row-fluid">
					<div class="span8">
						<p>
							<span class="margin-right-10">2013 © Akshar Design Solution. ALL Rights Reserved.</span>
							<a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
						</p>
					</div>
					<div class="span4">
						<ul class="social-footer">
							<li>
								<a href="#"><i class="icon-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon-google-plus"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon-linkedin"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon-twitter"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- END COPYRIGHT -->

		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
		<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="assets/plugins/hover-dropdown.js"></script>
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<![endif]-->
		<!-- END CORE PLUGINS -->
		<script src="assets/scripts/index.js"></script>
		<script src="assets/scripts/app.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				App.init();

			});
		</script>
		<!-- END JAVASCRIPTS -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-37564768-1']);
			_gaq.push(['_setDomainName', 'keenthemes.com']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
	<!-- END BODY -->

	<!-- Mirrored from www.keenthemes.com/preview/metronic_frontend/blog.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 13 Sep 2013 11:48:10 GMT -->
</html>