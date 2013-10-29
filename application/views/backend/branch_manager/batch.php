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
					<h4>Batch <small>Maintain batch details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Batch">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Batches</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Batch</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblBatch">
										<thead>
											<tr>
												<th>Batch Name</th>
												<th class="hidden-480">Weekdays</th>
												<th class="hidden-480">Course</th>
												<th class="hidden-480">Faculty</th>
												<th >Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($batch_list)) {
												foreach ($batch_list as $key) {
													echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>
<td>{$key->batchId}</td>
<td class=\"hidden-480\">{$weekdays[$key->batchId]}</td>
<td class=\"hidden-480\">{$key->courseName}</td>
<td class=\"center hidden-480\">{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</td>
<td ><span class=\"label label-success\">Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_batch/{$key->batchId}'>Delete</span></td></tr>
";
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<form class="form-horizontal span12 widget shadowed yellow" id="form_batch">
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
									<h3 class="form-section">Batch Info</h3>
									<!-- Course -->
									<div class="control-group">
										<label class="control-label">Course<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="course_id" id="course_id">
												<option value="">Select...</option>

												<?php
												foreach ($course as $key) {
													echo "<option value='{$key->courseCode}'>{$key->courseName} - {$key->courseCode}</option>";
												}
												?>
											</select>
										</div>
									</div><!--/ Course -->

									<!-- Faculty -->
									<div class="control-group">
										<label class="control-label">Faculty<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="faculty_id" id="faculty_id">
												<option value="">Select...</option>
												<?php
												foreach ($faculty as $key) {
													echo "<option value='{$key->userId}'>{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</option>";
												}
												?>
											</select>
										</div>
									</div><!--/ Faculty -->

									<!-- Start Date -->
									<div class="control-group">
										<label class="control-label">Start Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="start_date_datepicker">
												<input type="text" name="start_date" id="start_date" class="m-wrap span7">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div><!--/ Start Date -->

									<!-- Strength -->
									<div class="control-group">
										<label class="control-label">Strength<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="strength" id="strength" class="span2"/>
										</div>
									</div><!--/ Strength-->

									<h3 class="form-section">Batch Timing</h3>

									<!-- weekday -->
									<div class="control-group">
										<label class="control-label">weekday<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="weekday" id="weekday">
												<option value="">Select...</option>
												<option value="1">Monday - 1</option>
												<option value="2">Tuesday - 2</option>
												<option value="3">Wednesday - 3</option>
												<option value="4">Thursday - 4</option>
												<option value="5">Friday - 5</option>
												<option value="6">Saturday - 6</option>
												<option value="7">Sunday - 7</option>
											</select>
										</div>
									</div><!--/ weekday -->

									<!-- Batch Time -->
									<div class="control-group">
										<label class="control-label">Batch Time<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="start_time" id="start_time" value="2:30 PM" data-format="hh:mm A" class="m-wrap small clockface_1" />
											<span class="help-inline">To &nbsp;</span>
											<input type="text" name="end_time" id="end_time" value="2:30 PM" data-format="hh:mm A" class="m-wrap small clockface_1" />
										</div>
									</div><!--/ Batch Time -->

									<div class="control-group">
										<label class="control-label"></label>
										<div class="controls">
											<button type="button" class="btn green span4" id="btn_add_batch_timing">
												Add Batch Timing
											</button>
											<div class="span8"></div>
										</div>
									</div>

									<h3 class="form-section">List of Time Schedule</h3>

									<!-- LIst -->
									<div class="control-group">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="hidden-480">Weekday</th>
													<th class="hidden-480">Start Time</th>
													<th class="hidden-480">End Time</th>
													<th class="hidden-480">Action</th>
												</tr>
											</thead>

											<tbody id="lst_batch_timing">

											</tbody>
										</table>
									</div><!--/ List-->

									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="register" id="register">
											Register
										</button>
										<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">
											Cancel
										</button>
									</div><!--/ Form Action -->
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--/ End Tabs -->
			</div>
			<!--/ END Row -->
		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>