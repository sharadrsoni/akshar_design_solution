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
					Inquiry
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
					<h4>Inquiry <small>Manage inquiry details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Inquiry">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Inquiry</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Inquiry</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblInquiry">
										<thead>
											<tr>
												<th class="hidden-480">Student Name</th>
												<th class="hidden-480">E-mail Address</th>
												<th class="hidden-480">Inquiry State</th>
												<th class="hidden-480">Contact Number</th>
												<th class="hidden-480">Course Code</th>
												<th class="hidden-480">Expected Date of Joining</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($inquiry)) {
												foreach ($inquiry as $key) {
													echo "<tr class=\"odd gradeX\">
		<td onclick='viewinquiry(\"{$key->inquiryId}\");'>{$key->inquiryStudentFirstName} {$key->inquiryStudentMiddleName} {$key->inquiryStudentLastName}</td>
<td class=\"hidden-480\">{$key->inquiryEmailAddress}</td>
<td class=\"hidden-480\">{$key->stateId}
<td class=\"hidden-480\">{$key->inquiryContactNumber}</td>
<td class=\"hidden-480\">{$key->courseCode}</td>
<td class=\"hidden-480\">{$key->inquiryExpectedJoiningDate}</td>
<td ><span class=\"label label-success\" onclick='updateinquiry(\"{$key->inquiryId}\");'>Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "branch_manager_counsellor/delete_inquiry/{$key->inquiryId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_inquiry');
							echo form_open('branch_manager/inquiry', $attributes);
 ?>
							<!--form method="post" action="<?php echo base_url(); ?>branch_manager/inquiry" class="form-horizontal span12 widget shadowed yellow" id="form_inquiry">-->
							
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>
								<div class="body-inner">
									<h3 class="form-section">User Info</h3>
									<!-- First Name -->
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
									</div><!--/ First Name -->
									<!-- Middle Name -->
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
									</div><!--/ MIddle Name -->
									<!-- Last Name -->
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
									</div><!--/ Last Name -->
									<!-- Date of Birth -->
										<?php
									$err=form_error('date_of_birth');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Date of Birth</label>
										<div class="input-append span6" id="dob_datepicker">
											<input type="text" readonly="" data-format="dd-MM-yyyy" name="date_of_birth" id="date_of_birth" class="m-wrap span7" value="<?php echo set_value("date_of_birth"); ?>">
											<span for="date_of_birth" class="help-inline"><?php echo form_error('date_of_birth'); ?></span>
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									</div><!--/ Date of Birth -->
									<!-- Mobile No -->
										<?php
									$err=form_error('mobile_no');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Mobile No.</label>
										<div class="controls">
											<input type="text" name="mobile_no" id="mobile_no" class="span8" value="<?php echo set_value("mobile_no"); ?>">
											<span for="mobile_no" class="help-inline"><?php echo form_error('mobile_no'); ?></span>
										</div>
									</div><!--/ Mobile No-->
									<!-- E-mail -->
										<?php
									$err=form_error('email');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">E-mail</label>
										<div class="controls">
											<input type="text" name="email" id="email" class="span8" value="<?php echo set_value("email"); ?>">
											<span for="email" class="help-inline"><?php echo form_error('email'); ?></span>
										</div>
									</div><!--/ E-mail -->
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
									<!-- ccupation of Self -->
									<div class="control-group">
										<label class="control-label">Occupation of Self</label>
										<div class="controls">
											<input type="text" name="occupation_of_student" id="occupation_of_student" class="span8">
										</div>
									</div><!--/ ccupation of Self -->
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
											<input type="text" name="street_1" id="street_1" class="span8" value="<?php echo set_value("street_1"); ?>"/>
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
											<input type="text" name="street_2" id="street_2" class="span8" value="<?php echo set_value("street_2"); ?>"/>
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
										<!-- Course Category -->
								<?php
									$err=form_error('coursecategory');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Course Category<span class="required">*</span></label>
										<div class="controls">
											<div class="span4">
												<select class="span12" name="coursecategory" id="coursecategory" value="<?php echo set_value("coursecategory"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($category as $key) {
													echo "<option value='{$key->courseCategoryId}'>{$key->courseCategoryName}</option>";
												}
												?>
												</select>
												<span for="coursecategory" class="help-inline"><?php echo form_error('coursecategory'); ?></span>
											</div>
										</div>
									</div>
												<!-- Course Category --> 
													<!-- Course -->
									<?php
									$err=form_error('course');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Course Name<span class="required">*</span></label>
										<div class="controls">
											<div class="span4">
												<select class="span12" name="course" id="course" value="<?php echo set_value("course"); ?>">
												</select>
												<span for="course" class="help-inline"><?php echo form_error('course'); ?></span>
											</div>
												</div>
									</div>
												<!-- Course-->
													<!-- Expected DOJ -->
										<?php
									$err=form_error('date_of_doj');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Expected Date of Joining</label>
										<div class="input-append span6" id="doj_datepicker">
											<input type="text" readonly="" data-format="dd-MM-yyyy" name="date_of_doj" id="date_of_doj" class="m-wrap span7" value="<?php echo set_value("date_of_doj"); ?>">
											<span for="date_of_doj" class="help-inline"><?php echo form_error('date_of_doj'); ?></span>
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									</div><!--/ Expected DOJ --> 
									<!-- Name of Institute/Industry -->
										<?php
									$err=form_error('name_of_institute');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Name of Institute/Industry</label>
										<div class="controls">
											<input type="text" name="name_of_institute" id="name_of_institute" class="span8" value="<?php echo set_value("name_of_institute"); ?>">
											<span for="name_of_institute" class="help-inline"><?php echo form_error('name_of_institute'); ?></span>
										</div>
									</div><!--/ Name of Institute/Industry -->
									<!-- Name of Guardian -->
										<?php
									$err=form_error('name_of_guardian');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Guardian Name</label>
										<div class="controls">
											<input type="text" name="name_of_guardian" id="name_of_guardian" class="span8" value="<?php echo set_value("name_of_guardian"); ?>">
											<span for="name_of_institute" class="help-inline"><?php echo form_error('name_of_guardian'); ?></span>
										</div>
									</div><!--/ Name of Guardian -->
									<!-- Occupation of Guardian\Self -->
										<?php
									$err=form_error('occupation_of_guardian');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Occupation of Guardian</label>
										<div class="controls">
											<input type="text" name="occupation_of_guardian" id="occupation_of_guardian" class="span8" value="<?php echo set_value("occupation_of_guardian"); ?>">
											<span for="occupation_of_guardian" class="help-inline"><?php echo form_error('occupation_of_guardian'); ?></span>
										</div>
									</div><!--/ ccupation of Guardian\Self -->
									<!-- Reference -->
									<?php
									$err=form_error('reference');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Reference</label>
										<div class="controls">
											<input type="text" name="reference" id="reference" class="span8" value="<?php echo set_value("reference"); ?>">
											<span for="reference" class="help-inline"><?php echo form_error('reference'); ?></span>
										</div>
									</div><!--/ Reference -->
									<input type="hidden" name="inquiryId" id="inquiryId" value="" />
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="submitInquiry" id="submitInquiry">
											Add Inquiry
										</button>
											<a href="<?php echo base_url() . "branch_manager/inquiry"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
									</div><!--/ Form Action -->
								</div>
							</form>
						</div>
						<div class="tab-pane" id="tabView">
								<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover dataTable" id="viewtblinquiry">
													<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Inquiry Date</td>
														<td id="viewInquiryDate"></td>
												   </tr>
												   <tr>
														<td  class="unstyled profile-nav span3">Course Code</td>
														<td id="viewCourseCode"></td>
												   </tr>
												   <tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Expected Joining Date</td>
														<td id="viewDOJ"></td>
												   </tr>
													<tr>
														<td  class="unstyled profile-nav span3">Student Name</td>
														<td id="viewStudentName"></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Date of Birth</td>
														<td id="viewDOB"></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Contact Number</td>
														<td id="viewContactNumber"></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Email</td>
														<td id="viewEmail"></td>
												   </tr>
												   	<tr>
														<td  class="unstyled profile-nav span3">Qualification</td>
														<td id="viewQualification"></td>
												   </tr>
												    <tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Address</td>
														<td id="viewAddress"></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Institute Name</td>
														<td id="viewInstituteName"></td>
												   </tr>
												    <tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Student Occupation</td>
														<td id="viewOccupation"></td>
													</tr>
											 		<tr>
														<td  class="unstyled profile-nav span3">Guardian Name</td>
														<td id="viewGuardianName"></td>
												   </tr>
												    <tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Guardian Occupation</td>
														<td id="viewGuradianOccupation"></td>
													</tr>
													<tr>
														<td  class="unstyled profile-nav span3">Reference Name</td>
														<td id="viewReference"></td>
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
