<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>Contact Us | Akshar Design Solution</title>
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
    <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">               
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/plugins/bxslider/jquery.bxslider.css" />    
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>    
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
<!-- BEGIN TOP BAR -->
    <div class="front-topbar">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <ul class="unstyled inline">
                        <li><i class="icon-phone topbar-info-icon top-2"></i>Call us: <span>(1) 456 6717</span></li>
                        <li class="sep"><span>|</span></li>
                        <li><i class="icon-envelope-alt topbar-info-icon top-2"></i>Email: <span>info@akshardesignsolution.com</span></li>
                    </ul>
                </div>
                <div class="span6 topbar-social">
                    <ul class="unstyled inline">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
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
        <a class="brand logo-v1" href="index-2.html"> <img src="assets/img/logo_blue.png" id="logoimg" alt=""> 
        </a> 
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
        </a> 
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="nav-collapse collapse"> 
          <ul class="nav">
            <li> <a href="index.html"> Home </a> </li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="photo_gallery.html">Photo Gallery</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li class="active"><a href="contact_us.html">Contact Us</a></li>
            <li> <span class="sep"></span> <a href="#">Login</a></li>
          </ul>
        </div>
        <!-- BEGIN TOP NAVIGATION MENU -->
      </div>
    </div>
  </div>
</div>  
    <!-- END HEADER -->

    <!-- BEGIN BREADCRUMBS -->   
    <div class="row-fluid breadcrumbs">
        <div class="container">
            <div class="span4">
                <h1>Our Contacts</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN GOOGLE MAP -->
    <div class="row-fluid">
        <div id="map" class="gmaps margin-bottom-40" style="height:400px;"></div>
    </div>
    <!-- END GOOGLE MAP -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
        <div class="row-fluid">
            <div class="span9">
                <h2>Contact Form</h2>
                <div class="space20"></div>
                <!-- BEGIN FORM-->
                <form action="#" class="horizontal-form margin-bottom-40">
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input type="text" class="m-wrap span12" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Email <span class="color-red">*</span></label>
                        <div class="controls">
                            <input type="text" class="m-wrap span12" >
                        </div>
                    </div>
                    <div class="control-group">
										<label class="control-label">Course<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="course_id" id="course_id">
												<option value="">Select...</option>
												<?php
												foreach ($course as $key) {
													echo "<option value='{$key->courseCode}'>{$key->courseName}</option>";
												}
												?>
											</select>
											<span for="course_id" class="help-inline"><?php echo form_error('course_id'); ?></span>
										</div>
									</div>
					<div class="control-group">
										<label class="control-label">Branch<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="branch_id" id="branch_id">
												<option value="">Select...</option>
												<?php
												foreach ($branch as $key) {
													echo "<option value='{$key->branchId}'>{$key->branchName}</option>";
												}
												?>
											</select>
											<span for="branch_id" class="help-inline"><?php echo form_error('branch_id'); ?></span>
										</div>
									</div>
                    <div class="control-group">
                        <label class="control-label" >Message</label>
                        <div class="controls">
                            <textarea class="m-wrap span12" rows="8"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn theme-btn"><i class="icon-ok"></i> Send</button>
                    <button type="button" class="btn">Cancel</button>
                </form>
                <!-- END FORM-->                  
            </div>

            <div class="span3">
                <h2>Our Contacts</h2>
                <address>
                    <strong>Loop, Inc.</strong><br>
                    795 Park Ave, Suite 120<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (234) 145-1810
                </address>
                <address>
                    <strong>Email</strong><br>
                    <a href="mailto:#">info@email.com</a><br>
                    <a href="mailto:#">support@example.com</a>
                </address>
                <ul class="social-icons margin-bottom-10">
                    <li><a href="#" data-original-title="facebook" class="social_facebook"></a></li>
                    <li><a href="#" data-original-title="github" class="social_github"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                    <li><a href="#" data-original-title="linkedin" class="social_linkedin"></a></li>
                    <li><a href="#" data-original-title="rss" class="social_rss"></a></li>
                </ul>

                <div class="clearfix margin-bottom-30"></div>

                <h2>About Us</h2>
                <p>Sediam nonummy nibh euismod tation ullamcorper suscipit</p>
                <ul class="unstyled">
                    <li><i class="icon-ok"></i> Officia deserunt molliti</li>
                    <li><i class="icon-ok"></i> Consectetur adipiscing </li>
                    <li><i class="icon-ok"></i> Deserunt fpicia</li>
                </ul>                                
            </div>            
        </div>
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN COPYRIGHT -->
    <div class="front-copyright">
        <div class="container">
            <div class="row-fluid">
                <div class="span8">
                    <p>
                        <span class="margin-right-10">2013 © Metronic. ALL Rights Reserved.</span> 
                        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                    </p>
                </div>
                <div class="span4">
                    <ul class="social-footer">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
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
    <script type="text/javascript" src="assets/plugins/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>    
    <script type="text/javascript" src="assets/plugins/hover-dropdown.js"></script>
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->
    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
    <script src="assets/plugins/gmaps/gmaps.js" type="text/javascript"></script>
    <script src="assets/scripts/contact-us.js"></script>  
    <script src="assets/scripts/app.js"></script>      
    <script>
		jQuery(document).ready(function() {
			App.init();
			ContactUs.init();
		});
    </script>
    <!-- END JAVASCRIPTS -->
<!-- END BODY -->
</html>