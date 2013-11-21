<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
	<!--<![endif]-->

	<head>
		<!-- START META SECTION -->
		<title>Login</title>
		<!--/ END META SECTION -->

		<!-- START STYLESHEET SECTION -->
		<!-- Stylesheet(Bootstrap) -->
		<link href="<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap.min.css"; ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap-responsive.min.css" ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . "assets/plugins/font-awesome/css/font-awesome.min.css"; ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . "assets/plugins/uniform/css/uniform.default.css"; ?>" rel="stylesheet" type="text/css"/>
		<!--/ Stylesheet(Bootstrap) -->

		<!-- Stylesheet(Application) -->
		<link rel="stylesheet" href="<?php echo base_url() . "css/style.css"; ?>">
		<link rel="stylesheet" href="<?php echo base_url() . "css/custom.css"; ?>">
		<link rel="stylesheet" id="base-color" href="<?php echo base_url() . "css/color/serene.css"; ?>">
		<!--/ Stylesheet(Application) -->

		<link href="<?php echo base_url() . "assets/plugins/bootstrap-modal/css/bootstrap-modal.css"; ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . "css/style-metro.css"; ?>" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css"; ?>"/>
	</head>
	<body>
		<!-- START Template Wrapper -->
		<!-- If you want to enable the fixed header, just add `.fixed-header` class to the `#wrapper` div below -->
		<div id="wrapper">
				<!-- START Content -->
				<div class="container-fluid">
					<!-- START Row -->
					<div class="row-fluid">
						<!-- START Login Widget Form -->
						<p>
							&nbsp;
						</p>
						<?php
							$attributes = array('class' => 'widget stacked teal widget-login', 'id' => 'form_forgot_password');
							echo form_open('login', $attributes);
 ?>
							<section class="body">
								<div class="body-inner">
									<!-- START Logo -->
									<!--
									<div class="logo" align="center">
																			<a href="#"><img src="img/logo-dark.png"></a>
																		</div>-->
									
									<!--/ END Logo -->
								<div class="span12">
									<div class="page-header line1">
									<center><h4>Forgot Password</h4></center>
								</div>
								</div>

									<!-- Avatar -->
									<div class="avatar">
										<!--<span class="mask"></span>-->
										<img src="img/avatar/avatar1.jpg">
										<!--<h5 align="center">Hye john!</h5>-->
									</div><!--/ Avatar -->
									
					

									<!-- Email -->
									<div class="control-group">
										<div class="controls">
											<input type="text" placeholder="Email ID" id="email" name="email" class="span12" />
											<i class="icon-user input-icon"></i>
										</div>
									</div><!--/ Email -->

								</div>
								<!-- Form Action -->
								<!-- Place out form `.body-inner` -->
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="sendpassword">
										Send Password
									</button>
								</div>
								<!--/ Form Action -->
							</section>
						</form>
						<!--/ END Login Widget Form -->
					</div>
					<!--/ END Row -->
				</div>
				<!--/ END Content -->

			</div>
			<!--/ END Template Canvas -->
		</div>
		<!--/ END Template Wrapper -->

		<!--/ Javascript(Vendors) -->
		<script src="<?php echo base_url() . "assets/plugins/jquery-1.10.1.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . "assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . "assets/plugins/jquery-migrate-1.2.1.min.js"; ?>" type="text/javascript"></script>
		<!--/ Javascript(Vendors) -->

		<script src="<?php echo base_url() . "assets/plugins/moment/js/moment.min.js"; ?>"></script>
		<!--/ Slider -->

		<!-- Javascript (Application) -->
		<script src="<?php echo base_url() . "js/application.js"; ?>"></script>
		<script src="<?php echo base_url() . "js/flot.sample.js"; ?>"></script>
		<script src="<?php echo base_url() . "js/easypiechart.sample.js"; ?>"></script>

		<!-- BEGIN CORE PLUGINS -->

		<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="<?php echo base_url() . "assets/plugins/bootstrap/js/bootstrap.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . "assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"; ?>" type="text/javascript" ></script>
		<!--[if lt IE 9]>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script src="assets/plugins/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url() . "assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . "assets/plugins/jquery.blockui.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . "assets/plugins/jquery.cookie.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . "assets/plugins/uniform/jquery.uniform.min.js"; ?>" type="text/javascript" ></script>
		<!-- END CORE PLUGINS -->
	</body>
</html>