<!-- by dips -->
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
					Batch
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
					<h4>Dashboard <small>Batch details and timing.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Dashboard">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>View Batch</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<!-- Batch -->
							<div class="control-group" id="lst_batch_div">
								<label class="control-label">Batch<span class="required">*</span></label>
								<div class="controls">
									<select class="span4" name="batch_name" id="batch_name">
										<option value="">Select...</option>
										<?php
										foreach ($batch_list as $key) {
											echo "<option value='{$key->batchId}'>{$key->batchId}</option>";
										}
										?>
									</select>
								</div>
							</div><!--/ Batch -->
							<div class="tab-pane active" id="tab1">
								<div class="body-inner">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover dataTable" id="viewtblBatch">
											<tr>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Batch Name</td>
												<td id="viewBatchName"></td>
											</tr>
											<tr>
												<td class="unstyled profile-nav span3">Course</td>
												<td id="viewCourseName"></td>
											</tr>
											<tr>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Faculty Name</td>
												<td id="viewFacultyName"></td>
											</tr>
											<tr>
												<td  class="unstyled profile-nav span3">Start Date</td>
												<td id="viewStartDate"></td>
											</tr>
											<tr>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Duration</td>
												<td id="viewDuration"></td>
											</tr>
										</table>
									</div>
								</div>
								<br>
								<h4>Batch Time</h4>
								<div class="body-inner">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover dataTable" id="viewtblBatchTime">
											<tr>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Monday</td>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Tuesday</td>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Wednesday</td>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Thursday</td>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Friday</td>
												<td style='background:#f0f6fa' class="unstyled profile-nav span3">Saturday</td>
											</tr>
											<tr>
												<td class="unstyled profile-nav span3" id="viewWeekday1" ></td>
												<td class="unstyled profile-nav span3" id="viewWeekday2"></td>
												<td class="unstyled profile-nav span3" id="viewWeekday3"></td>
												<td class="unstyled profile-nav span3" id="viewWeekday4"></td>
												<td class="unstyled profile-nav span3" id="viewWeekday5"></td>
												<td class="unstyled profile-nav span3" id="viewWeekday6"></td>
											</tr>

										</table>
									</div>
								</div>
							</div><!--End tabView -->

						</div>
						<!--End of tabView -->
					</div>
				</div>
				<!--/ END Row -->
			</div>
			<!--Page Content End  -->
		</div>
		<!--/ END Content -->
</section>