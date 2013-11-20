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
					<h4>Search <small>Search user details over here. </small></h4>
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
					</ul>
					<div class="tab-content">
						<div id="tab_1" class="tab-pane active">
							<div class="row-fluid search-forms search-default">
								<form class="form-search" action="#">
									<div class="chat-form">
										<div class="dataTables_filter" id="tblBranch_filter">
											<label>Search:
												<input type="text" aria-controls="tblBranch" id="searchUser">
											</label>
										</div>
										<button type="button" class="btn green" id="userSearch">
											Search &nbsp; <i class="m-icon-swapright icon-circle-arrow-right"></i>
										</button>
									</div>
								</form>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-hover" id="tblSearch" style="display: none;">
									<thead>
										<tr>
											<th>Photo</th>
											<th class="hidden-phone">Name</th>
											<th>Username</th>
											<th class="hidden-phone">Joined</th>
											<th class="hidden-phone">Courses</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="searchData">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--end tabbable-->
			</div>

		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>
