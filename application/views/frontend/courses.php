<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>Courses | Akshar Design Solution</title>
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
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES --> 
    <link href="assets/css/pages/portfolio.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->    
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
            <li><a href="<?php echo base_url()."courses"; ?>">Courses</a></li>
            <li><a href="<?php echo base_url()."photo_gallery"; ?>">Photo Gallery</a></li>
            <li><a href="<?php echo base_url()."about_us"; ?>">About Us</a></li>
            <li class="active"><a href="<?php echo base_url()."contact_us"; ?>">Contact Us</a></li>
            <li> <span class="sep"></span> <a href="<?php echo base_url()."login"; ?>">Login</a></li>
           </ul>
          <div class="search-box"> 
            <div class="input-append"> 
              <form>
                <input style="background:#fff;" class="m-wrap" type="text" placeholder="Search" />
                <button type="submit" class="btn theme-btn">Go</button>
              </form>
            </div>
          </div>
        </div>
        <!-- BEGIN TOP NAVIGATION MENU -->
      </div>
    </div>
  </div>
</div>  
    <!-- END HEADER -->

    <!-- BEGIN BREADCRUMBS -->   
    <div class="row-fluid breadcrumbs margin-bottom-40">
        <div class="container">
            <div class="span4">
                <h1>Portfolio 4 Column</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Courses</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
  <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
        <!-- BEGIN FILTER -->           
        <div class="filter-v1 margin-bottom-40">
            <ul class="filter-category">
            	 <li class="filter" data-filter="all">All</li>
            	<?php 
            		foreach($course_category as $key)
					{
						echo "<li class=\"filter\" data-filter={$key->courseCategoryId}> {$key->courseCategoryName}</li>"; 
					}
            	?>
               </ul>
            <ul class="grid-v1 thumbnails">
            		
            	<?php
            	
            		foreach($course as $key)
					{
									
            	
                   echo "<li class='span3 mix {$key->courseCategoryId}'>
                   	<img src='assets/img/works/img1.jpg' alt=''>
                    <div class='hover-portfolio hover-portfolio-small'>
                        <h2>{$key->courseName}</h2>
                        <a class='hover-portfolio-lft' href='" . base_url() . "courses/course_details/{$key->courseCode}'><i class='icon-link'></i></a>
                    </div>                                        
                </li>";
					}
            	?>
            	
                          </ul>
        </div>
        <!-- END FILTER -->           
    </div>
    <!-- END CONTAINER -->

  
      <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->

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
    <script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
    <script src="assets/plugins/jquery.mixitup.min.js"></script>      
    <script type="text/javascript" src="assets/plugins/hover-dropdown.js"></script>                
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->
    <script src="assets/scripts/app.js"></script>      
    <script>
        jQuery(document).ready(function() {    
           App.init();
           App.gridOption1();
        });
    </script>
    <!-- END JAVASCRIPTS -->
<!-- END BODY -->
</html>