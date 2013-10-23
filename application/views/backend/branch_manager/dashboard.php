<section id="main">
	<!-- START Bootstrap Navbar -->
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<!-- Breadcrumb -->
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a><span class="divider"></span>
				</li>
				<li class="active">
					Index
				</li>
			</ul>
			<!--/ Breadcrumb -->
		</div>
	</div>
	<!--/ END Bootstrap Navbar -->

	<!-- START Content -->
	<div class="container-fluid">
		<!-- START Row -->
		<div class="row-fluid">
			<!-- START Page/Section header -->
			<div class="span12">
				<div class="page-header line1">
					<h4>Dashboard <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->

		<!--Page Content Start  -->
		<div id="Dashboard">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Circular Summary -->
				<div class="span12 widget borderless">
					<section class="body">
						<div class="body-inner no-padding" style="text-align:center;">
							<div class="span3">
								<div class="dashboard-stat blue">
									<div style="text-align:center;" class="details">
										<div class="number">
											1349
										</div>
										<div class="desc">
											Pending Targets
										</div>
									</div>
									<a class="more" href="#"> View more <i class="m-icon-swapright m-icon-white"></i> </a>
								</div>
							</div>
							<div class="span3">
								<div class="dashboard-stat green">
									<div class="details">
										<div class="number">
											549
										</div>
										<div class="desc">
											New Inquiry
										</div>
									</div>
									<a class="more" href="#"> View more <i class="m-icon-swapright m-icon-white"></i> </a>
								</div>
							</div>
							<div class="span3">
								<div class="dashboard-stat purple">
									<div class="details">
										<div class="number">
											500
										</div>
										<div class="desc">
											Student Register
										</div>
									</div>
									<a class="more" href="#"> View more <i class="m-icon-swapright m-icon-white"></i> </a>
								</div>
							</div>
							<div class="span3">
								<div class="dashboard-stat yellow">
									<div class="details">
										<div class="number">
											50
										</div>
										<div class="desc">
											Total Faculty
										</div>
									</div>
									<a class="more" href="#"> View more <i class="m-icon-swapright m-icon-white"></i> </a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!--/ END Circular Summary -->
			</div>
			<!--/ END Row -->

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Page/Section header -->
				<div class="span12">
					<div class="page-header line1">
						<h4>Charts <small>organizing days for social, religious, commercial, or administrative purposes.</small></h4>
					</div>
				</div>
				<!--/ END Page/Section header -->
			</div>
			<!--/ END Row -->

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Line Chart - Filled -->
				<div class="span12 widget stacked">
					<header>
						<h4 class="title">Rich Chart</h4>
					</header>
					<section class="body">
						<div class="body-inner">
							<!-- START nested Grid -->
							<div class="row-fluid">
								<div class="span6">
									<div class="flot" id="site_activities" style="height:300px;"></div>
								</div>
								<div class="span6">
									<div class="flot" id="site_statistics" style="height:300px;"></div>
								</div>
							</div>
							<!--/ END nested Grid -->
						</div>
						<div class="footer" align="center">
							<!-- START Circular -->
							<figure class="stats borderless circular">
								<div class="gauge gauge-teal" data-percent="20">
									<span class="icon icone-lightbulb"></span>
								</div>
								<figcaption>
									<h4>Server Load<small>20% CPU Usage</small></h4>
								</figcaption>
							</figure><!--/ END Circular -->

							<!-- START Circular -->
							<figure class="stats borderless circular">
								<div class="gauge gauge-red" data-percent="70">
									<span class="icon icone-exchange"></span>
								</div>
								<figcaption>
									<h4>Bandwidth<small>70% Used</small></h4>
								</figcaption>
							</figure><!--/ END Circular -->

							<!-- START Progress 1 -->
							<figure class="stats prog borderless">
								<figcaption>
									<span class="text pull-left"><span class="icone-cloud-upload"></span> Upload Progress</span>
									<span class="text pull-right">10%/100%</span>
								</figcaption>
								<div class="progress progress-striped active">
									<div class="bar bar-danger" style="width: 20%;"></div>
								</div>
							</figure><!--/ END Progress 1 -->

							<!-- START Progress 2 -->
							<figure class="stats prog borderless">
								<figcaption>
									<span class="text pull-left"><span class="icone-cloud-download"></span> Download Progress</span>
									<span class="text pull-right">99MB</span>
								</figcaption>
								<div class="progress progress-striped active">
									<div class="bar bar-success" style="width: 99%;"></div>
								</div>
							</figure><!--/ END Progress 2 -->
						</div>
					</section>
				</div>
				<!--/ END Line Chart - Filled -->
			</div>
			<!--/ END Row -->

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Page/Section header -->
				<div class="span12">
					<div class="page-header line1">
						<h4>Calendar <small>organizing days for social, religious, commercial, or administrative purposes.</small></h4>
					</div>
				</div>
				<!--/ END Page/Section header -->
			</div>
			<!--/ END Row -->

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Default Calendar -->
				<div class="span12">
					<div id="calendar" style="margin-bottom:20px;"></div>
				</div>
				<!--/ END Default Calendar -->
			</div>
			<!--/ END Row -->
		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->

</section>
