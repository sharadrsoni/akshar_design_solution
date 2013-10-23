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
					Search
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
					<h4>Search <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Search">
			<div class="row-fluid">
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active">
							<a data-toggle="tab" href="#tab_1">User Search</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab_2">Booking Search 1</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="tab_1" class="tab-pane active">
							<div class="row-fluid search-forms search-default">
								<form class="form-search" action="#">
									<div class="chat-form">
										<div class="input-cont">
											<input type="text" placeholder="Search..." class="span12" />
										</div>
										<button type="button" class="btn green">
											Search &nbsp; <i class="m-icon-swapright icon-circle-arrow-right"></i>
										</button>
									</div>
								</form>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Photo</th>
											<th class="hidden-phone">Fullname</th>
											<th>Username</th>
											<th class="hidden-phone">Joined</th>
											<th class="hidden-phone">Points</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><img src="assets/img/avatar1.jpg" alt="" /></td>
											<td class="hidden-phone">Mark Nilson</td>
											<td>makr124</td>
											<td class="hidden-phone">19 Jan 2012</td>
											<td class="hidden-phone">1245</td>
											<td><span class="label label-success">Approved</span></td>
											<td><a class="btn mini red-stripe" href="#">View</a></td>
										</tr>
										<tr>
											<td><img src="assets/img/avatar2.jpg" alt="" /></td>
											<td class="hidden-phone">Filip Rolton</td>
											<td>jac123</td>
											<td class="hidden-phone">09 Feb 2012</td>
											<td class="hidden-phone">15</td>
											<td><span class="label label-info">Pending</span></td>
											<td><a class="btn mini blue-stripe" href="#">View</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!--end tab-pane-->
						<div id="tab_2" class="tab-pane">
							<div class="row-fluid">
								<div class="span12 booking-search">
									<form action="#">
										<div class="clearfix margin-bottom-10">
											<label>Distanation</label>
											<div class="controls">
												<i class="input-icon-i icon-map-marker"></i>
												<input class="input-icon-input span12" type="text" placeholder="Canada, Malaysia, Russia ...">
											</div>
										</div>
										<div class="clearfix margin-bottom-20">
											<div class="control-group pull-left margin-right-20">
												<label class="control-label">Check-in:</label>
												<div class="controls">
													<div class="input-append date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
														<input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" value="12-02-2012" />
														<span class="add-on"><i class="icon-calendar"></i></span>
													</div>
												</div>
											</div>
											<div class="control-group pull-left">
												<label class="control-label">Check-out:</label>
												<div class="controls">
													<div class="input-append date date-picker" data-date="102/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
														<input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" value="02/2012" />
														<span class="add-on"><i class="icon-calendar"></i></span>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix margin-bottom-10">
											<div class="pull-left margin-right-20">
												<label>How Many</label>
												<div>
													<i class="input-icon-i icon-user"></i>
													<input class="input-icon-input" type="text" placeholder="1 Room, 2 Adults, 0 Children">
												</div>
											</div>
											<div class="pull-left">
												<div class="control-group">
													<label class="control-label">Choose Option</label>
													<div class="control">
														<label class="radio inline">
															<input type="radio" name="optionsRadios2" value="option1" />
															Option1 </label>
														<label class="radio inline">
															<input type="radio" name="optionsRadios2" value="option2" checked />
															Option2 </label>
													</div>
												</div>
											</div>
										</div>
										<button class="btn blue btn-block">
											SEARCH <i class="m-icon-swapright icon-circle-arrow-right"></i>
										</button>
									</form>
								</div>
								<!--end booking-search-->
							</div>
							<!--end row-fluid-->
							<div class="space40"></div>
							<div class="row-fluid">
								<div class="row-fluid margin-bottom-20">
									<div class="span6 booking-blocks">
										<div class="pull-left booking-img">
											<img src="assets/img/gallery/image4.jpg" alt="">
											<ul class="unstyled">
												<li>
													<i class="icon-money"></i> From $126
												</li>
												<li>
													<i class="icon-map-marker"></i> Tioman, Malaysia
												</li>
											</ul>
										</div>
										<div style="overflow:hidden;">
											<h2><a href="#">Here Any Title</a></h2>
											<ul class="unstyled inline">
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star-empty"></i>
												</li>
											</ul>
											<p>
												At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum. <a href="#">read more</a>
											</p>
										</div>
									</div>
									<div class="span6 booking-blocks">
										<div class="pull-left booking-img">
											<img src="assets/img/gallery/image5.jpg" alt="">
											<ul class="unstyled">
												<li>
													<i class="icon-money"></i> From $157
												</li>
												<li>
													<i class="icon-map-marker"></i> London, UK
												</li>
											</ul>
										</div>
										<div style="overflow:hidden;">
											<h2><a href="#">Here Any Title</a></h2>
											<ul class="unstyled inline">
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star"></i>
												</li>
												<li>
													<i class="icon-star"></i>
												</li>
											</ul>
											<p>
												Lorem ipsum dolor sit eos et accusamus et iusto odio amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus usce condimentum eleifend enim a sunt in culpa qui officia feugiat. Pellentesque dolores et quas molestias viverra vehicula sem ut volutpat. Integer sed arcu. <a href="#">read more</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end tab-pane-->
					</div>
				</div>
				<!--end tabbable-->
			</div>

		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>
