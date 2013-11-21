</head>
<body>
	<div id="wrapper" class="fixed-header fixed-sidebar">
		<!-- START Template Canvas -->
		<div id="canvas">
			<!-- START Template Header -->
			<header id="header">
				<!-- START Logo -->
				<div class="logo hidden-phone hidden-tablet">
					<a href="#"><img src="img/logo-white.png" alt=""></a>
					<small class="version"></small>
				</div>
				<!--/ END Logo -->

				<!-- START Mobile Sidebar Toggler -->
				<a href="#" class="toggler" data-toggle="sidebar"><span class="icon icone-reorder"></span></a>
				<!--/ END Mobile Sidebar Toggler -->

				<!-- START Toolbar -->
				<ul class="toolbar" id="toolbar">
					<!-- START Task -->
					
					<!--/ END Task -->

					<!-- START Notification -->
					<li class="notification">
						<a href="#" data-toggle="dropdown"> <span class="badge"></span> <span class="icon iconm-bell-2"></span> </a>
						<!-- START Dropdown Menu -->
						<div class="dropdown-menu" role="menu">
							<header>
								Notifications
							</header>
							<ul class="body">
								<?php foreach ($notification as $key): ?>
									<li>
									<a href="#" class="text"><?php echo $key->notificationDescription ?>
									<br>
									<small><?php echo $key->userFirstName . " " . $key->userMiddleName . " " . $key->userLastName ?></small> </a>
								</li>
								<?php endforeach ?>
							</ul>
							<footer>
								<a href="#">Clear Notifications</a>
							</footer>
						</div>
						<!--/ END Dropdown Menu -->
					</li>
					<!--/ END Notification -->

					<!-- START Message -->
					
					<!--/ END Message -->

					<!-- START Profile -->
					<li class="profile">
						<a href="#" data-toggle="dropdown"> <span class="avatar"><img src="<?php echo base_url() . "img/avatar/avatar4.jpg"; ?>"  alt=""></span> <span class="text hidden-phone"><?php echo $username; ?>
							<span class="role"><?php echo $role; ?></span></span> <span class="arrow icone-caret-down"></span> </a>
						<!-- START Dropdown Menu -->
						<div class="dropdown-menu" role="menu">
							<header>
								<a href="<?php echo base_url() . 'staff/profile'; ?>" style="color: white;">Your Profile</a>
							</header>
							
							<footer>
								<a href="<?php echo base_url() . 'login'; ?>" class="text"><span class="icon icone-off"></span> Sign Off</a>
							</footer>
						</div>
						<!--/ END Dropdown Menu -->
					</li>
					<!--/ END Profile -->
				</ul>
				<!--/ END Toolbar -->
			</header>
			<aside id="sidebar">
				<!-- START Sidebar Content -->
				<div class="sidebar-content">
					<!-- START Sidebar Tab -->
					<!--
					<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab-menu" data-toggle="tab"><span class="icon icone-file"></span></a>
											</li>
											
											<li class="">
																		<a href="#tab-overview" data-toggle="tab"><span class="icon icone-beaker"></span></a>
																	</li>
											
										</ul>-->
					
					<!--/ END Sidebar Tab -->

					<!-- START Tab Content -->
					<div class="tab-content">
						<!-- START Tab Pane(menu) -->
						<div class="tab-pane active" id="tab-menu">
							<!-- START Sidebar Menu -->
							<nav id="nav" class="accordion">
								<ul id="navigation">
									<!-- START Menu Divider -->
									<li class="divider">
										Main Menu
									</li>
									<!--/ END Menu Divider -->

									<!-- START Menu -->
									<?php if(strtolower($menu) == "dashboard"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href="<?php
										$href;
										switch ($roleId) {
											case 1 :
												$href = "admin";
												echo base_url() . $href;
												break;
											case 2 :
												$href = "branch_manager";
												echo base_url() . $href;
												break;
											case 3 :
												$href = "faculty";
												echo base_url() . $href;
												break;
											case 4 :
												$href = "counsellor";
												echo base_url() . $href;
												break;
											case 5 :
												$href = "student";
												echo base_url() . $href;
												break;
										}
										?>"><span class="icon icone-dashboard"></span> <span class="text">Dashboard</span></a>
									</li>
									<!--/ END Menu -->

									<!-- START Menu -->
									<?php if ($roleId == 1): ?>
										<?php if(strtolower($menu) == "branch"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/branch" ?>'> <span class='icon icone-th-list'></span> <span class='text'>Branch</span> </a></li>

										<?php if(strtolower($menu) == "staff"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/staff" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Staff</span> </a></li>

										<?php if(strtolower($menu) == "role"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/role" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>role</span> </a></li>

										<?php if(strtolower($menu) == "course" || strtolower($menu) == "course category"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a data-toggle='collapse' data-parent='#navigation' href='#submenuCourse'> <span class='icon icone-beaker'></span> <span class='text'>Course</span> <span class='arrow icone-caret-down'></span> </a>
										<!-- START Submenu Menu -->
										<ul id='submenuCourse' class='collapse <?php if(strtolower($menu) == "course" || strtolower($menu) == "course category"): echo "in"; endif; ?> '>
											<li class='<?php if(strtolower($menu) == "course category"): echo "active"; endif; ?>'>
												<a href='<?php echo base_url() . $href . "/course_category" ?>'><span class='icon icone-angle-right'></span>Course Category</a>
											</li>
											<li class='<?php if(strtolower($menu) == "course"): echo "active"; endif; ?>'>
												<a href='<?php echo base_url() . $href . "/course" ?>'><span class='icon icone-angle-right'></span>Course</a>
											</li>
										</ul>
										<!--/ END Submenu Menu -->
										</li>

										<?php if(strtolower($menu) == "target" ||strtolower($menu) == "target type" ): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a data-toggle='collapse' data-parent='#navigation' href='#submenuTarget'> <span class='icon icone-beaker'></span> <span class='text'>Target</span> <span class='arrow icone-caret-down'></span> </a>
										<!-- START Submenu Menu -->
										<ul id='submenuTarget' class='collapse <?php if(strtolower($menu) == "target" ||strtolower($menu) == "target type" ): echo "in"; endif; ?>'>
										<li class="<?php if(strtolower($menu) == "target type"): echo "active"; endif; ?>">
										<a href='<?php echo base_url() . $href . "/target_type" ?>'><span class='icon icone-angle-right'></span>Target Type</a>
										</li>
										<li class='<?php if(strtolower($menu) == "target"): echo "active"; endif; ?>'>
										<a href='<?php echo base_url() . $href . "/target" ?>'><span class='icon icone-angle-right'></span>Target</a>
										</li>
										</ul>
										<!--/ END Submenu Menu -->
										</li>

										<?php if(strtolower($menu) == "event type"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/event_type" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Event Type</span> </a></li>

										<?php if(strtolower($menu) == "state"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/state" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>State</span> </a></li>

										<?php if(strtolower($menu) == "city"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/city" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>City</span></a></li>							
									<?php endif; ?>
									
									<?php if ($roleId == 2): ?>						
										<?php if(strtolower($menu) == "batch"): ?>
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/batch" ?>'><span class='icon icone-dashboard'></span> <span class='text'>Batch</span> </a></li>
									<?php endif; ?>

									<?php if ($roleId == 2 || $roleId == 4): ?>
										<?php if(strtolower($menu) == "student inquiry"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/inquiry" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Student Inquiry</span></a></li>

										<?php if(strtolower($menu) == "student registration"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a data-toggle='collapse' data-parent='#navigation' href='#submenu2'> <span class='icon icone-beaker'></span> <span class='text'>Student Registration</span> <span class='arrow icone-caret-down'></span> </a>
										<!-- START Submenu Menu -->
										<ul id='submenu2' class='collapse '>
										<li class=''>
										<a href='<?php echo base_url() . $href . "/studentregistration" ?>'><span class='icon icone-angle-right'></span>Registration</a>
										</li>
										<li class=''>
										<a href='<?php echo base_url() . $href . "/fees_payment" ?>'><span class='icon icone-angle-right'></span>Fees Receipt</a>
										</li>
										</ul>
										<!--/ END Submenu Menu -->
										</li>

										<?php if(strtolower($menu) == "book inventory"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
											<a href='<?php echo base_url() . $href . "/book_inventory" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Book Inventory</span> </a></li>

										<?php if(strtolower($menu) == "event"): ?>
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/event" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Event</span> </a></li>
									
									<?php endif; ?>
									
									<?php if ($roleId == 2): ?>
										<?php if(strtolower($menu) == "target report"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/target_report" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Target Report</span> </a></li>
									<?php endif; ?>

									<?php if ($roleId == 3): ?>	
										<?php if(strtolower($menu) == "student attendance"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/student_attendance" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Student Attendance</span></a></li>

										<?php if(strtolower($menu) == "test"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/test" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Test</span> </a></li>

									<?php endif; ?>
									
									<?php if ($roleId == 5): ?>
										<?php if(strtolower($menu) == "attndance"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/show_attendance" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Attendance</span> </a></li>

										<?php if(strtolower($menu) == "test result"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/test_result" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Test Result</span></a></li>
										
									<?php endif; ?>

									<?php if ($roleId != 5): ?>
										<?php if(strtolower($menu) == "search"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
											<a href='<?php echo base_url() . $href . "/search" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Search</span> </a></li>
									
										<?php if(strtolower($menu) == "send notification"): ?> 
											<li class='accordion-group active'>
										<?php else: ?>
											<li class='accordion-group'>
										<?php endif; ?>
										<a href='<?php echo base_url() . $href . "/send_notification" ?>'> <span class='icon icone-dashboard'></span> <span class='text'>Send Notification</span> </a></li>
									<?php endif; ?>
								</ul>
							</nav>
							<!--/ END Sidebar Menu -->
						</div>
						<!--/ END Tab Pane(menu) -->

						<!-- START Tab Pane(overview) -->
						<!--
						<div class="tab-pane" id="tab-overview">
													<nav id="nav" class="accordion">
														<ul id="navigation">
															<li class="divider">
																Main Menu
															</li>
															
															<li class="accordion-group">
															<a href="<?php echo base_url() . $href . "/profile"; ?>"> <span class="icon icone-dashboard"></span> <span class="text">Student Profile</span> </a>
															</li>						
														</ul>
													</nav>
												</div>
												-->
						
						<!--/ END Tab Pane(overview) -->
					</div>
					<!--/ END Tab Content -->
				</div>
				<!--/ END Sidebar Content -->
			</aside>