<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>Course Detail | Akshar Design Solution</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    
   
    <link href="<?php echo base_url() ."assets/plugins/bootstrap/css/bootstrap.min.css";?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap-responsive.min.css";?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()."assets/css/reset.css";?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()."assets/css/style-metro.css";?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()."assets/css/style.css";?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()."assets/css/style-responsive.css";?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/fancybox/source/jquery.fancybox.css";?>">               
    <link href="<?php echo base_url()."assets/plugins/font-awesome/css/font-awesome.min.css";?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/bxslider/jquery.bxslider.css" ;?>"/>    
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url()."assets/css/themes/blue.css";?>" rel="stylesheet" type="text/css" id="style_color"/>    
    <link rel="shortcut icon" href="<?php echo base_url()."favicon.ico";?>" />
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
            <li> <a href="<?php echo base_url()?>"> 
              Home </a> </li>
            <li  class="active"><a href="<?php echo base_url()."courses"; ?>">Courses</a></li>
            <li><a href="<?php echo base_url()."event"; ?>">Event</a></li>
            <li><a href="<?php echo base_url()."about_us"; ?>">About Us</a></li>
            <li><a href="<?php echo base_url()."contact_us"; ?>">Contact Us</a></li>
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
                <h1>Course Detail</h1>
            </div>
            <div class="span8">
                <ul class="pull-right breadcrumb">
                    <li><a href="<?php echo base_url()?>">Home</a> <span class="divider">/</span></li>
                    <li class="active">Courses</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
        <!-- BEGIN PORTFOLIO ITEM -->
        <div class="row-fluid margin-bottom-30">
            <!-- BEGIN CAROUSEL -->            
            <div class="span5 front-carousel">
                <div id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                    
        <div class="carousel-inner"> 
          <div class="active item"> <img src="<?php echo base_url()."assets/img/works/img1.jpg";?>" alt=""> 
          </div>        
        </div>
                    <!-- Carousel nav -->
                    
                </div>                
            </div>
            <!-- END CAROUSEL -->                             

            <!-- BEGIN PORTFOLIO DESCRIPTION -->            
            <div class="span7">
                <h2><?php echo $course_details[0]->courseName ;?></h2>
                <p>
                	
                	<?php echo $course_details[0]->courseDescription ;?>
                </p>
                <br>
                <div class="row-fluid front-lists-v2 margin-bottom-15">
                    <div class="span6">
                        <ul class="unstyled">
                            <li><i class="icon-star"></i>Course Code  : <font color="#0DA3E2"><?php echo $course_details[0]->courseCode ;?></font></li>
                            <li><i class="icon-star"></i>Course Duration : <font color="#0DA3E2"><?php echo $course_details[0]->courseDuration ;?>-Months</font></li>
                               
                         </ul>
                    </div>
                    
                </div>
              <a href="<?php echo base_url()."contact_us/query/".$course_details[0]->courseCode;?>" class="btn theme-btn">Query</a>
              
              

            </div>
            <!-- END PORTFOLIO DESCRIPTION -->            
        </div>
        <!-- END PORTFOLIO ITEM --> 

        </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
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
    <script src="<?php base_url()."assets/plugins/jquery-1.10.1.min.js";?>" type="text/javascript"></script>
    <script src="<?php base_url()."assets/plugins/jquery-migrate-1.2.1.min.js";?>" type="text/javascript"></script>
    <script src="<?php base_url()."assets/plugins/bootstrap/js/bootstrap.min.js";?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php base_url()."assets/plugins/back-to-top.js";?>"></script>    
    <script type="text/javascript" src="<?php base_url()."assets/plugins/bxslider/jquery.bxslider.js";?>"></script>
    <script type="text/javascript" src="<?php base_url()."assets/plugins/fancybox/source/jquery.fancybox.pack.js";?>"></script>
    <script type="text/javascript" src="<?php base_url()."assets/plugins/hover-dropdown.js";?>"></script>                 
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->
    <script src="<?php base_url()."assets/scripts/app.js";?>"></script>      
    <script>
        jQuery(document).ready(function() {    
            App.init();                  
            App.initBxSlider();           
        });
    </script>
    <!-- END JAVASCRIPTS -->
<!-- END BODY -->
</html>