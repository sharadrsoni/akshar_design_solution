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
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Batches</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Batch</a>
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

													echo "<tr class=\"odd gradeX\">
<td onclick='viewbatch(\"{$key->batchId}\");'>{$key->batchId}</td>
<td class=\"hidden-480\">{$weekdays[$key->batchId]}</td>
<td class=\"hidden-480\">{$key->courseName}</td>
<td class=\"center hidden-480\">{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</td>
<td ><span class=\"label label-success\" onclick='updatebatch(\"{$key->batchId}\");' >Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_batch/{$key->batchId}'>Delete</a></span></td></tr>
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
							<?php
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_batch');
							echo form_open('branch_manager/batch', $attributes);
 ?>
							<!--<form method="post" action="<?php echo base_url(); ?>branch_manager/batch" class="form-horizontal span12 widget shadowed yellow" id="form_batch">-->
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
									<?php
									$err=form_error('course_id');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Course<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="course_id" id="course_id" value="<?php echo set_value("course_id"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($course as $key) {
													echo "<option value='{$key->courseCode}'>{$key->courseName} - {$key->courseCode}</option>";
												}
												?>
											</select>
											<span for="course_id" class="help-inline"><?php echo form_error('course_id'); ?></span>
										</div>
									</div><!--/ Course -->

									<!-- Faculty -->
									<?php
									$err=form_error('faculty_id');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
										<label class="control-label">Faculty<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="faculty_id" id="faculty_id" value="<?php echo set_value("faculty_id"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($faculty as $key) {
													echo "<option value='{$key->userId}'>{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</option>";
												}
												?>
											</select>
											<span for="faculty_id" class="help-inline"><?php echo form_error('faculty_id'); ?></span>
										</div>
									</div><!--/ Faculty -->

									<!-- Start Date -->
									<?php
									$err=form_error('start_date');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Start Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="start_date_datepicker">
												<input type="text" data-format="dd-MM-yyyy" name="start_date" id="start_date" class="m-wrap span7" value="<?php echo set_value("start_date"); ?>">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
											<span for="start_date" class="help-inline"><?php echo form_error('start_date'); ?></span>
										</div>
									</div><!--/ Start Date -->
								
								<?php
									$err=form_error('duration');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Duration <small>(in months)</small><span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="duration" id="duration" class="span2" value="<?php echo set_value("duration"); ?>"/>
											<span for="duration" class="help-inline"><?php echo form_error('duration'); ?></span>
										</div>
									</div>
									<!-- Strength -->
									<?php
									$err=form_error('strength');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Strength<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="strength" id="strength" class="span2" value="<?php echo set_value("strength"); ?>"/>
											<span for="strength" class="help-inline"><?php echo form_error('strength'); ?></span>
										</div>
									</div><!--/ Strength-->

									<h3 class="form-section">Batch Timing</h3>

									<!-- weekday -->
									<?php
									$err=form_error('weekday');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">weekday<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="weekday" id="weekday" value="<?php echo set_value("weekday"); ?>">
												<option value="">Select...</option>
												<option value="1">Monday</option>
												<option value="2">Tuesday</option>
												<option value="3">Wednesday</option>
												<option value="4">Thursday</option>
												<option value="5">Friday</option>
												<option value="6">Saturday</option>
												<option value="7">Sunday</option>
											</select>
											<span for="weekday" class="help-inline"><?php echo form_error('weekday'); ?></span>
										</div>
									</div><!--/ weekday -->

									<!-- Batch Time -->
									<?php
									$err=form_error('start_time');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									<div class="control-group">
										<label class="control-label">Batch Time<span class="required">*</span></label>
										<div id="start_time_picker" class="input-append span3">
											<input type="text" name="start_time" id="start_time" placeholder="Start Time" readonly="" class="m-wrap small" data-format="hh:mm:ss" value="<?php echo set_value("start_time"); ?>"/>
											<span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i> </span>
											<span for="start_time" class="help-inline"><?php echo form_error('start_time'); ?></span>
										</div>

										<div id="end_time_picker" class="input-append span3">
											<input type="text" name="end_time" id="end_time" placeholder="End Time" readonly="" class="m-wrap small" data-format="hh:mm:ss" value="<?php echo set_value("end_time"); ?>"/>
											<span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i> </span>
											<span for="end_time" class="help-inline"><?php echo form_error('end_time'); ?></span>
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
									<input type="hidden" name="batchId" id="batchId" value="" />
									<input type="hidden" name="flagbtalter" id="flagbtalter" value="" />
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="register" id="register">
											Add Batch
										</button>
											<a href="<?php echo base_url() . "branch_manager/batch"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
									</div><!--/ Form Action -->
								</div>
							</form>
						</div>
						<!--End of tabView -->
					</div>
						<div class="tab-pane" id="tabView">
							<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover dataTable" id="viewtblBatch">
													<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Batch Name</td>
														<td><viewBatchName></viewBatchName></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Course</td>
														<td><viewCourseName></viewCourseName></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Week Days</td>
														<td><viewWeek Days></viewWeek></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Faculty Name</td>
														<td><viewFacultyName></viewFacultyName></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Start Date</td>
														<td><viewStartDate></viewStartDate></td>
												   </tr>
												    <tr>
														<td class="unstyled profile-nav span3">Duration</td>
														<td><viewDuration></viewDuration></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Strength</td>
														<td><viewStrength></viewStrength></td>
												   </tr>
											
												 </table>
								</div></div>
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
														<td class="unstyled profile-nav span3"><viewMonday>5 to 6</viewMonday></td>
														<td class="unstyled profile-nav span3"><viewTuesday>5 to 6</viewTuesday></td>
														<td class="unstyled profile-nav span3"><viewWednesday>5 to 6</viewWednesday></td>
														<td class="unstyled profile-nav span3"><viewThursday>5 to 6</viewThursday></td>
														<td class="unstyled profile-nav span3"><viewFriday>5 to 6</viewFriday></td>
														<td class="unstyled profile-nav span3"><viewSaturday>5 to 6</viewSaturday></td>
												   </tr>
												 
								</table>
								</div>
								</div>
						</div><!--End tabView -->
				</div><!--/ End Tabs -->
				
			</div>
			<!--/ END Row -->
		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>