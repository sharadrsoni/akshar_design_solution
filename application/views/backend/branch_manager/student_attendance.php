<!-- START Template Main Content -->
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
					Student Attendance
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
					<h4>Attendance <small>Manage Attendance of Student</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Attendance">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab"><span class="icon icone-pencil"></span> Attendance</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<?php
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_attendance');
							echo form_open('faculty/student_attendance', $attributes);
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
									<!-- Batch ID -->
									<div class="control-group">
										<label class="control-label">Batch ID<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="batch_id" id="batch_id">
												<option value="">Select...</option>
												<?php
												foreach ($batch_list as $key) {
													echo "<option value='{$key->batchId}'>{$key->batchId}</option>";
												}
												?>
											</select>
										</div>
									</div><!--/ Batch ID -->
									<!-- Date -->
									<div class="control-group">
										<label class="control-label">Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="Attendance_date_datepicker">
												<input type="text" data-format="dd-MM-yyyy" name="Attendance_date" id="Attendance_date" class="m-wrap span7">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div><!--/Date -->
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
										<button type="submit" class="btn btn-primary" name="saveAttendance" id="saveAttendance">
											Save
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
<!--/ END Template Main Content -->
