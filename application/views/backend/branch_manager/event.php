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
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Events</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Event</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblEvent">
										<thead>
											<tr>
												<th style="width:8px;">
												<input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" />
												</th>
												<th>EventName</th>
												<th class="hidden-480">Organize by</th>
												<th class="hidden-480">Veue</th>
												<th class="hidden-480">Description</th>
												<th class="hidden-480">Start Date</th>
												<th class="hidden-480">End Date</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($event_list)) {
												foreach ($event_list as $key) {
													echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>
<td class=\"hidden-480\">{$key->eventName}</td>
<td class=\"hidden-480\">{$key->eventOrganizerName}</td>
<td class=\"hidden-480\">{$key->eventState}</td>
<td class=\"hidden-480\">{$key->eventDescription}</td>
<td class=\"hidden-480\">{$key->eventStartDate}</td>
<td class=\"hidden-480\">{$key->eventEndDate}</td>
<td ><span class=\"label label-success\">Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_event/{$key->eventId}'>Delete</span></td></tr>
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
							<form method="post" action="<?php echo base_url(); ?>branch_manager/event" class="form-horizontal span12 widget shadowed yellow" id="form_event">
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
									<div class="control-group">
										<label class="control-label">Event Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="event_name" id="event_name" class="span8"/>
										</div>
									</div><!--/ Event Name	 -->
									
									<!-- Event Type -->
									<div class="control-group">
										<label class="control-label">Event Type<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="event_type_id" id="event_type_id">
												<option value="">Select...</option>
												<?php
												foreach ($event_type as $key) 
												{
													echo "<option value='{$key->eventTypeId}'>{$key->eventTypeName}</option>";
												}
												?>
											</select>
										</div>
									</div><!--/ Event Type -->

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

									<!-- End Date -->
									<div class="control-group">
										<label class="control-label">End Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="end_date_datepicker">
												<input type="text" name="end_date" id="end_date" class="m-wrap span7">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div><!--/ End Date -->

									<!-- Description -->
									<div class="control-group">
										<label class="control-label">Description<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="description" id="description" class="span8"/>
										</div>
									</div><!--/ Description	 -->

									<h3 class="form-section">Event Venue</h3>

									<!-- Street -->
									<div class="control-group">
										<label class="control-label">Street<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="street_1" id="street_1" class="span8"/>
										</div>

									</div>
									<div class="control-group">
										<label class="control-label"><span class="required"></span></label>
										<div class="controls">
											<input type="text" name="street_2" id="street_2" class="span8"/>
										</div>
									</div><!--/ Street -->
									<!-- City -->
									<div class="control-group">
										<label class="control-label">City<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="city" id="city" class="span8"/>
										</div>
									</div><!--/ City -->
									<!-- State -->
									<div class="control-group">
										<label class="control-label">State<span class="required">*</span></label>
										<div class="controls">
											<div class="span4">
												<select class="span12" name="state" id="state">
													<option value="">Select...</option>
													<option value="Gujrat">Gujrat</option>
													<option value="Rajasthan">Rajasthan</option>
													<option value="Harayana">Harayana</option>
													<option value="Goa">Goa</option>
												</select>
											</div>
											<div class="span4">
												<input type="text" name="pin_code" id="pin_code" class="span12"/>
											</div>
										</div>
									</div><!--/ State -->

									<h3 class="form-section">Other Info</h3>

									<!-- Organize By -->
									<div class="control-group">
										<label class="control-label">Organize By<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="organize_by" id="organize_by" class="span8"/>
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
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="create" id="create">
											Create
										</button>
										<button type="button" class="btn">
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
