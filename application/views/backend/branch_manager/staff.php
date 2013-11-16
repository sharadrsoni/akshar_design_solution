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
					Staff
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
					<h4>Staff <small>Manage staff details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Staff">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Staff</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Staff</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblStaff">
										<thead>
											<tr>
												<th>User ID</th>
												<th>Staff Name</th>
												<th class="hidden-480">Email</th>
												<th class="hidden-480">ContactNo</th>
												<th colspan="2">View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($staff)) {
												foreach ($staff as $key) {
													echo "<tr class=\"odd gradeX\">													
<td class=\"center hidden-480\">{$key->branchName}</td>
<td class=\"center hidden-480\">{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</td>
<td class=\"center hidden-480\">{$key->userEmailAddress}</td>
<td class=\"center hidden-480\">{$key->userContactNumber}</td>
<td ><span class=\"label label-success\" onclick='updatestaff(\"{$key->userId}\");' >Edit</span> <span class=\"label label-success\"> <a href='" . base_url() . "admin/delete_staff/{$key->userId}'>Delete</a></span></td></tr>
</tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_staff');
							echo form_open('admin/staff', $attributes);
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
									<h3 class="form-section">Staff Info.</h3>
									
									<!-- Branch -->
									<?php
									$err=form_error('branchId');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Branch<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="branchId" id="branchId" value="<?php echo set_value("first_name"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($branch_list as $key) {
													echo "<option value='{$key->branchId}'>{$key->branchName}</option>";
												}
												?>
											</select>
											<span for="branchId" class="help-inline"><?php echo form_error('branchId'); ?></span>
										</div>
									</div>
									<!--/ Branch -->
									
									<!-- User Role -->
									<?php
									$err=form_error('userroleId');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">User Role<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="userroleId" id="userroleId" value="<?php echo set_value("first_name"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($userrole_list as $key) {
													echo "<option value='{$key->roleId}'>{$key->roleName}</option>";
												}
												?>
											</select>
											<span for="userroleId" class="help-inline"><?php echo form_error('userroleId'); ?></span>
										</div>
									</div>
									<!--/ User Role -->
									
									
									<!-- Staff Name -->
									<?php
									$err=form_error('first_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">First Name</label>
											<div class="controls">
												<input type="text" name="first_name" id="first_name" class="span8" value="<?php echo set_value("first_name"); ?>">
												<span for="first_name" class="help-inline"><?php echo form_error('first_name'); ?></span>
											</div>
									</div>
									<?php
									$err=form_error('middle_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Middle Name</label>
											<div class="controls">
												<input type="text" name="middle_name" id="middle_name" class="span8" value="<?php echo set_value("middle_name"); ?>">
												<span for="middle_name" class="help-inline"><?php echo form_error('middle_name'); ?></span>
											</div>
									</div>
									<?php
									$err=form_error('last_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" name="last_name" id="last_name" class="span8" value="<?php echo set_value("last_name"); ?>">
												<span for="last_name" class="help-inline"><?php echo form_error('last_name'); ?></span>
											</div>
									</div><!--/ Staff Name -->
									
									<!-- Contact Number -->
									<?php
									$err=form_error('contact_number');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Contact Number</label>
										<div class="controls">
											<input type="text" name="contact_number" id="contact_number" class="span8" value="<?php echo set_value("contact_number"); ?>">
											<span for="contact_number" class="help-inline"><?php echo form_error('contact_number'); ?></span>
										</div>
									</div><!--/ Contact Number -->
									
									<!-- Email -->
									<?php
									$err=form_error('email');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Email</label>
										<div class="controls">
											<input type="text" name="email" id="email" class="span8" value="<?php echo set_value("email"); ?>">
											<span for="email" class="help-inline"><?php echo form_error('email'); ?></span>
										</div>
									</div><!--/ Email -->
									
									<!-- Date Of Birth -->
									<?php
									$err=form_error('date_of_birth');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Date Of Birth<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="dob_datepicker">
												<input type="text" readonly="" name="date_of_birth" id="date_of_birth" class="m-wrap span7" value="<?php echo set_value("date_of_birth"); ?>">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
											<span for="date_of_birth" class="help-inline"><?php echo form_error('date_of_birth'); ?></span>
										</div>
									</div><!--/ Date Of Birth -->
																	
									<!-- Qualification -->
									<?php
									$err=form_error('qualification');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Qualification</label>
										<div class="controls">
											<input type="text" name="qualification" id="qualification" class="span8" value="<?php echo set_value("qualification"); ?>">
											<span for="qualification" class="help-inline"><?php echo form_error('qualification'); ?></span>
										</div>
									</div><!--/ Qualification -->
									
									<h3 class="form-section">Address</h3>
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
									$err=form_error('state');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">State/City<span class="required">*</span></label>
										<div class="controls">
											<div class="span4">
												<select class="span12" name="state" id="state" value="<?php echo set_value("state"); ?>">
													<option value="">Select...</option>
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
													<option value="Category 3">Category 5</option>
													<option value="Category 4">Category 4</option>
												</select>
												<span for="state" class="help-inline"><?php echo form_error('state'); ?></span>
											</div>
											<div class="span4">
												<select class="span12" name="city" id="city" value="<?php echo set_value("city"); ?>">
													<option value="">Select...</option>
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
													<option value="Category 3">Category 5</option>
													<option value="Category 4">Category 4</option>
												</select>
												<span for="city" class="help-inline"><?php echo form_error('city'); ?></span>
											</div>
										</div>
									</div><!--/ State -->
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
									<input type="hidden" name="staffId" id="staffId" value="" />
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary"  name="submitStaff" id="submitStaff">
											Add Staff User
										</button>
									</div><!--/ Form Action -->
								</div>
								</form>
							</div>
						</div>
					</div>
					<!--View Staff -->
<div style="display: none" class="form-horizontal form-view" id="ViewBatch">
	<h3> View Staff Info - Bob Nilson </h3>
	<h3 class="form-section">Person Info</h3>
	<div class="row-fluid">
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label" for="firstName">First Name:</label>
				<div class="controls">
					<span class="text">Bob</span>
				</div>
			</div>
		</div>
		<!--/span-->
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label" for="lastName">Last Name:</label>
				<div class="controls">
					<span class="text">Nilson</span>
				</div>
			</div>
		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<div class="row-fluid">
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label">Qualification</label>
				<div class="controls">
					<span class="text">MBA</span>
				</div>
			</div>
		</div>
		<!--/span-->
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label">Date of Birth:</label>
				<div class="controls">
					<span class="text bold">20.01.1984</span>
				</div>
			</div>
		</div>
		<!--/span-->
	</div>

	<div class="row-fluid">
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label">Branch Name:</label>
				<div class="controls">
					<span class="text">Ahmedabad Branch</span>
				</div>
			</div>
		</div>
		<!--/span-->
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label">Role:</label>
				<div class="controls">
					<span class="text bold">Faculty</span>
				</div>
			</div>
		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<h3 class="form-section">Contact Info</h3>
	<div class="row-fluid">
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label" for="firstName">Contact No.:</label>
				<div class="controls">
					<span class="text">9999999999</span>
				</div>
			</div>
		</div>
		<!--/span-->
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label" for="lastName">Email:</label>
				<div class="controls">
					<span class="text">Nilson@mail.com</span>
				</div>
			</div>
		</div>
		<!--/span-->
	</div>
	<!--/row-->

	<h3 class="form-section">Address</h3>
	<div class="row-fluid">
		<div class="span12 ">
			<div class="control-group">
				<label class="control-label">Street:</label>
				<div class="controls">
					<span class="text">#24 Sun Park Avenue, Rolton Str</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label">City:</label>
				<div class="controls">
					<span class="text">New York</span>
				</div>
			</div>
		</div>
		<!--/span-->
		<div class="span6">
			<div class="control-group">
				<label class="control-label">State:</label>
				<div class="controls">
					<span class="text">New York</span>
				</div>
			</div>
		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<div class="row-fluid">
		<div class="span6 ">
			<div class="control-group">
				<label class="control-label">Post Code:</label>
				<div class="controls">
					<span class="text">457890</span>
				</div>
			</div>
		</div>
		<!--/span-->

	</div>
</div><!-- End View Staff -->
					<!--/ End Tabs -->			
				</div>
				<!--/ END Row -->
			</div>
			<!--Page Content End  -->
		</div>
	<!--/ END Content -->
</section>
