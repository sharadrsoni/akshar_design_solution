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
					Event
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
					<h4>Event <small>Manage event deatils over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Event">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Events</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Event</a>
						</li>
						<li class="">
							<a href="#tab3" data-toggle="tab"><span class="icon icone-pencil"></span> Add Event Attendance</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblEvent">
										<thead>
											<tr>
												<th>EventName</th>
												<th class="hidden-480">Organize by</th>
												<th class="hidden-480">Veue</th>
											    <th class="hidden-480">Start Date</th>
												<th class="hidden-480">End Date</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($event)) {
												foreach ($event as $key) {
													echo "<tr class=\"odd gradeX\">
<td onclick='viewevent(\"{$key->eventId}\");'>{$key->eventName}</td>
<td class=\"hidden-480\">{$key->eventOrganizerName}</td>
<td class=\"hidden-480\">{$key->eventStreet1}<br>{$key->eventStreet2}<br>{$key->cityName}<br>{$key->stateName}</td>
<td class=\"hidden-480\">{$key->eventStartDate}</td>
<td class=\"hidden-480\">{$key->eventEndDate}</td>
<td ><span class=\"label label-success\" onclick='updateevent(\"{$key->eventId}\");'>Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_event/{$key->eventId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_event');
							echo form_open('branch_manager/event', $attributes);
							?>
							<!--form method="post" action="<?php echo base_url(); ?>branch_manager/event" class="form-horizontal span12 widget shadowed yellow" id="form_event">-->
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>

							<div class="body-inner">
								<h3 class="form-section">Event Info</h3>
								<!-- Event Name -->
								<?php
									$err=form_error('event_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
									<label class="control-label">Event Name<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="event_name" id="event_name" class="span8" value="<?php echo set_value("event_name"); ?>"/>
										<span for="event_name" class="help-inline"><?php echo form_error('event_name'); ?></span>
									</div>
								</div><!--/ Event Name	 -->

								<!-- Event Type -->
								<div class="control-group">
									<label class="control-label">Event Type<span class="required">*</span></label>
									<div class="controls">
										<select class="span4" name="event_type_id" id="event_type_id" >
											<option value="">Select...</option>
											<?php
											foreach ($event_type as $key) {
												echo "<option value='{$key->eventTypeId}'>{$key->eventTypeName}</option>";
											}
											?>
										</select>
									</div>
								</div><!--/ Event Type -->

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
											<span for="start_date" class="help-inline"><?php echo form_error('start_date'); ?></span>
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									</div>
								</div><!--/ Start Date -->

								<!-- End Date -->
								<?php
									$err=form_error('end_date');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">End Date<span class="required">*</span></label>
									<div class="controls">
										<div class="input-append span6" id="end_date_datepicker">
											<input type="text" data-format="dd-MM-yyyy" name="end_date" id="end_date" class="m-wrap span7" value="<?php echo set_value("end_date"); ?>">
											<span for="end_date" class="help-inline"><?php echo form_error('end_date'); ?></span>
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									</div>
								</div><!--/ End Date -->

								<!-- Description -->
								<?php
									$err=form_error('description');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
									<label class="control-label">Description<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="description" id="description" class="span8" value="<?php echo set_value("description"); ?>"/>
										<span for="description" class="help-inline"><?php echo form_error('description'); ?></span>
									</div>
								</div><!--/ Description	 -->

								<h3 class="form-section">Event Venue</h3>

								<!-- Street -->
								<?php
									$err=form_error('street_1');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Street<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="street_1" id="street_1" placeholder="Street1" class="span8" value="<?php echo set_value("street_1"); ?>"/>
										<span for="street_1" class="help-inline"><?php echo form_error('street_1'); ?></span>
									</div>

								</div>
								<?php
									$err=form_error('street_2');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label"><span class="required"></span></label>
									<div class="controls">
										<input type="text" name="street_2" id="street_2" placeholder="Street2" class="span8" value="<?php echo set_value("street_2"); ?>"/>
										<span for="street_2" class="help-inline"><?php echo form_error('street_2'); ?></span>
									</div>
								</div><!--/ Street -->
									<!-- State -->
								<?php
									$err=form_error('stateid');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									<label class="control-label">State<span class="required">*</span></label>
									<div class="controls">
											<select class="span4 select2" name="stateid" id="stateid" value="<?php echo set_value("stateid"); ?>">
											<option value="">Select...</option>
												<?php
												foreach ($State as $key) {
													echo "<option value='{$key->stateId}'>{$key->stateName}</option>";
												}
												?>
											</select>
											<span for="state" class="help-inline"><?php echo form_error('stateid'); ?></span>
									</div>
								</div><!--/ State -->
								<!-- City -->
								<?php
									$err=form_error('cityid');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									<label class="control-label">City<span class="required">*</span></label>
									<div class="controls">
											<select class="span4 select2" name="cityid" id="cityid" value="<?php echo set_value("cityid"); ?>">
												<option value="">Select...</option>
											</select>
											<span for="cityid" class="help-inline"><?php echo form_error('cityid'); ?></span>
									</div>
								</div><!--/ City -->
								<!-- Postal Code -->
								<?php
									$err=form_error('pin_code');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Postal Code<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="pin_code" id="pin_code" class="span8" value="<?php echo set_value("pin_code"); ?>"/>
										<span for="pin_code" class="help-inline"><?php echo form_error('pin_code'); ?></span>
									</div>
								</div><!--/ Postal Code -->
								<h3 class="form-section">Other Info</h3>
								<!-- Organize By -->
								<?php
									$err=form_error('organize_by');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Organize By<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="organize_by" id="organize_by" class="span8" value="<?php echo set_value("first_name"); ?>"/>
										<span for="organize_by" class="help-inline"><?php echo form_error('inventory_quantity'); ?></span>
									</div>
								</div><!--/ Organize By -->

								<!-- Faculty -->
								<div class="control-group">
									<label class="control-label">Responsible Person <span class="required">*</span></label>
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
								<input type="hidden" name="eventId" id="eventId" value="" />
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="submitEvent" id="submitEvent">
										Create
									</button>
								</div><!--/ Form Action -->
							</div>
							</form>
						</div>
						<div class="tab-pane" id="tab3">
							<?php
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_event_attendance');
							echo form_open('branch_manager/event', $attributes);
							?>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>

							<div class="body-inner">
								<!-- Event -->
								<?php
									$err=form_error('event_id');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Event Name<span class="required">*</span></label>
									<div class="controls">
										<select class="span4" name="event_id" id="event_id" value="<?php echo set_value("event_id"); ?>">
											<option value="">Select...</option>
											<?php
											foreach ($event as $key) {
												echo "<option value='{$key->eventId}'>{$key->eventName}</option>";
											}
											?>
										</select>
										<span for="event_id" class="help-inline"><?php echo form_error('event_id'); ?></span>
									</div>
								</div><!--/ Event -->
								<!-- Batch ID -->
								<?php
									$err=form_error('batch_id');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
									<label class="control-label">Batch ID<span class="required">*</span></label>
									<div class="controls">
										<select class="span4" name="batch_id" id="batch_id" value="<?php echo set_value("batch_id"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($batch_list as $key) {
													echo "<option value='{$key->batchId}'>{$key->batchId}</option>";
												}
												?>
										</select>
										<span for="batch_id" class="help-inline"><?php echo form_error('batch_id'); ?></span>
									</div>
								</div><!--/ Batch ID -->
								<table class="table table-striped table-bordered table-hover" id="attendance">
									<thead>
										<tr>
										<tr>
											<th>Student ID</th>
											<th class="hidden-480">Present/Absent </th>
										</tr>
									</thead>
									<tbody id="lst_students">
									</tbody>
								</table>
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" id="submitEventAttendance" name="submitEventAttendance" class="btn btn-primary">
										Save
									</button>
								</div><!--/ Form Action -->
							</div>
							</form>
						</div>
						<div class="tab-pane" id="tabView">
							<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover dataTable" id="viewtblevent">
													<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Event Name</td>
														<td id="viewEventName"></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Event Description</td>
														<td id="viewEventDescription"></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Event Start Date</td>
														<td id="viewEventStartDate"></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Event End Date</td>
														<td id="viewEventEndDate"></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Address</td>
														<td id="viewAddress"></td>
												   </tr>
												    <tr>
														<td class="unstyled profile-nav span3">Organizer Name</td>
														<td id="viewOrganizerName"></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Faculty ID</td>
														<td id="viewFacultyID"></td>
												   </tr>
												    <tr>
														<td class="unstyled profile-nav span3">Event Type ID</td>
														<td id="viewEventTypeID"></td>
													</tr>
												</table>
								</div></div>
					</div><!-- End tabView -->
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
