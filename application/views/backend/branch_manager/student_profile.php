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
					Profile
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
					<h4>Profile <small>Manage your profile over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="StudentProfile">
			<!-- START Row -->
			<div class="row-fluid profile">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab">Overview</a>
						</li>
						<li>
							<a href="#tab2" data-toggle="tab">Account Setting </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<ul class="unstyled profile-nav span3">
								<li><img src="<?php echo base_url() . "images/avatar/"; ?><?php echo $profile -> userPhotograph; ?>" alt="" /><a href="#" class="profile-edit">edit</a>
								</li>
								<li>
									<a href="#"><?php echo $profile -> userId; ?></a>
								</li>
								<li>
									<a href="#"><?php echo $profile -> branchName; ?></a>
								</li>				
							</ul>
							<div class="span9">
								<div class="row-fluid">
									<div class="span8 profile-info">

										
										<div class="">
											<h4><?php echo $username; ?></h4>
											<h4>Address</h4>
											<address>
												
												<?php echo $profile -> userStreet1; ?>
												<br>
												<?php echo $profile -> userStreet2; ?>												
												<br>
												<?php echo $profile -> cityId; ?>-<?php echo $profile -> userPostalCode; ?>												
												<br>
												<?php echo $profile -> stateId; ?>												
												<br>
											
												<abbr title="Phone">P:</abbr> <?php echo $profile -> userContactNumber; ?>
											</address>
											<address>
												<strong>Email</strong>
												<br>
												<a href="mailto:#"><?php echo $profile -> userEmailAddress; ?></a>
											</address>
										</div>

										<ul class="unstyled inline">
											<li>
												<i class="icon-map-marker"></i> <?php echo $profile -> cityId; ?>
											</li>
											<li>
												<i class="icon-calendar"></i><?php echo $profile -> userDOB; ?>
											</li>
										</ul>
									</div>
									<!--end span8-->
									<div class="span4">
										<div class="portlet sale-summary">
											<div class="portlet-body">
												<ul class="unstyled">
													<li>
														<span class="sale-info">Attendence<i class="icon-img-up"></i></span>
														<span class="sale-num"><?php echo $attendancePercentage; ?>%</span>
													</li>
													<li>
														<span class="sale-info">Performance<i class="icon-img-down"></i></span>
														<span class="sale-num"><?php echo $testPercentage; ?>%</span>
													</li>
													<li>
														<span class="sale-info"><i class="icon-img-down"></i></span>
														<span class="sale-num"></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!--end span4-->
								</div>
								<!--end row-fluid-->
								<div class="tabbable tabbable-custom tabbable-custom-profile">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_1_11" data-toggle="tab">Test Marks</a>
										</li>
										<li >
											<a href="#tab_1_22" data-toggle="tab">Attedence Details</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1_11">
											<div class="portlet-body" style="display: block;">
												<table class="table table-striped table-bordered table-advance table-hover">
													<thead>
														<tr>
															<th><i class="icon-star"></i> Test Name</th>
															<th><i class="icon-star"></i> Test Date</th>
															<th class="hidden-phone"><i class="icon-question-sign"></i> Course</th>
															<th><i class="icon-bookmark"></i> Marks</th>
															<th><i class="icon-bookmark"></i> Percentage</th>
														</tr>
													</thead>
													<tbody>
														
														<?php
														
														foreach($testresult as $key)
														{
															echo "<tr>
															<td><a href=\"#\">{$key->testName}</a></td>
															<td><a href=\"#\">{$key->testDate}</a></td>
															<td><a href=\"#\">{$key->courseName}</a></td>
															<td><a href=\"#\">{$key->testResultObtainedMarks}</a></td>
															<td><a href=\"#\">{$key->testPercent}%</a></td>
															</tr>";
														}
														
														?>
														
														
															
															
															
															
													</tbody>
												</table>
											</div>
										</div>
										<!--tab-pane-->
										<div class="tab-pane" id="tab_1_22">
											<div class="portlet-body" style="display: block;">
												<table class="table table-striped table-bordered table-advance table-hover">
													<thead>
														<tr>
															<th><i class="icon-star"></i> Course</th>
															<th class="hidden-phone"><i class="icon-question-sign"></i> Attendence</th>
															<th class="hidden-phone"><i class="icon-question-sign"></i> Attendence Percentage</th>
														</tr>
													</thead>
													<tbody>
														<?php
														foreach($attendanceList as $key)
														{
															echo "<tr>
															<td><a href=\"#\">{$key->courseName}</a></td>
															<td><a href=\"#\">{$key->attendanceCount}</a></td>
															<td><a href=\"#\">{$key->attendancePercent}</a></td>
															</tr>";
														}
														
														?>
													</tbody>
												</table>
											</div>
										</div>
										<!--tab-pane-->
									</div>
								</div>

								<div class="row-fluid" style="height:20px;"></div>
							</div>
							<!--end span9-->
						</div>
						<div class="tab-pane tabs-left profile-account" id="tab2">
							<div class="tabbable tabs-left" style="margin-bottom: 25px;">
								<ul class="nav nav-tabs span3">
									<li class="active">
										<a data-toggle="tab" href="#tab_1-1"> <i class="icon-cog"></i> Personal info </a>
										<span class="after"></span>
									</li>
									<li >
										<a data-toggle="tab" href="#tab_2-2"><i class="icon-picture"></i> Change Avatar</a>
									</li>
									<li >
										<a data-toggle="tab" href="#tab_3-3"><i class="icon-lock"></i> Change Password</a>
									</li>
									<li >
										<a data-toggle="tab" href="#tab_4-4"><i class="icon-eye-open"></i>Upload Resume</a>
									</li>
								</ul>
								<div class="tab-content span9">
									<div class="tab-content">
										<div id="tab_1-1" class="tab-pane active">
											<div style="height: auto;" id="accordion1-1" class="accordion collapse">
												
													
													<?php
													$attributes = array('id' => 'form_studet_profile');
													echo form_open('student/profile', $attributes);
													 ?>
													<div class="alert alert-error hide">
														<button class="close" data-dismiss="alert"></button>
														You have some form errors. Please check below.
													</div>
													<div class="alert alert-success hide">
														<button class="close" data-dismiss="alert"></button>
														Your form validation is successful!
													</div>

													<h3 class="form-section">Student Info</h3>
													<!-- Name -->
													<div class="control-group">
														<label class="control-label">First Name:</label>
														<div class="controls" >
															<input type="text" name="first_name" id="first_name" class="span6" value="<?php echo $profile -> userFirstName; ?>">
														</div>
													</div></td>
													<td>
													<div class="control-group">
														<label class="control-label">Middle Name:</label>
														<div class="controls" >
															<input type="text" name="middle_name" id="middle_name" class="span6" value="<?php echo $profile -> userMiddleName; ?>">
														</div>
													</div></td>
													<td>
													<div class="control-group">
														<label class="control-label">Last Name:</label>
														<div class="controls" >
															<input type="text" name="last_name" id="last_name" class="span6" value="<?php echo $profile -> userLastName; ?>">
														</div>
													</div><!--/ Name--><!-- Date of Birth -->
													<div class="control-group">
														<label class="control-label">Date of Birth</label>
														<div class="input-append" id="dob_datepicker">
															<input type="text" readonly="" name="date_of_birth" id="date_of_birth" class="m-wrap span6." value="<?php echo $profile -> userDOB; ?>">
															<span class="add-on"><i class="icon-calendar"></i></span>
														</div>
													</div><!--/ Date of Birth --><!-- Mobile No -->
													<div class="control-group">
														<label class="control-label">Mobile No.</label>
														<div class="controls">
															<input type="text" name="mobile_no" id="mobile_no" class="span6" value="<?php echo $profile -> userContactNumber; ?>">
														</div>
													</div><!--/ Mobile No--><!-- E-mail -->
													<div class="control-group">
														<label class="control-label">E-mail</label>
														<div class="controls">
															<input type="text" name="email" id="email" class="span6" value="<?php echo $profile -> userEmailAddress; ?>">
														</div>
													</div><!--/ E-mail --><!-- Qualification -->
													<div class="control-group">
														<label class="control-label">Qualification</label>
														<div class="controls">
															<input type="text" name="qualification" id="qualification" class="span6" value="<?php echo $profile -> userQualification; ?>">
														</div>
													</div><!--/ Qualification --><h3 class="form-section">Address</h3><!-- Street -->
													<div class="control-group">
														<label class="control-label">Street<span class="required">*</span></label>
														<div class="controls">
															<input type="text" name="street_1" id="street_1" class="span6"/ value="<?php echo $profile -> userStreet1; ?>">
														</div>
													</div>
													<div class="control-group">
														<label class="control-label"><span class="required"></span></label>
														<div class="controls">
															<input type="text" name="street_2" id="street_2" class="span6"/ value="<?php echo $profile -> userStreet2; ?>">
														</div>
													</div><!--/ Street -->
													<!-- State -->
													<div class="control-group">
														<label class="control-label">State<span class="required"></span></label>
														<div class="controls">
															<select class="select2 span6" name="stateid" id="stateid" value=<?php echo $profile -> stateId; ?>>
											<option value="">Select...</option>
												<?php
												foreach ($State as $key) {
													echo "<option value='{$key->stateId}'>{$key->stateName}</option>";
												}
												?>
											</select>
											<div class=" span6"></div>
														</div>
													</div><br/><br/>
													<div class="control-group">
														<label class="control-label">City<span class="required"></span></label>
														<div class="controls">
															<select class="select2 span6" name="cityid" id="cityid"  value=<?php echo $profile -> cityId; ?>>
												<option value="">Select...</option>
											</select>
											<div class=" span6"></div>
														</div>
													</div><br/><br/>
													
								
								
													
													<!-- City -->
													<div class="control-group">
														<label class="control-label">Postal Code<span class="required">*</span></label>
														<div class="controls">
															<input type="text" name="pin_code" id="pin_code" class="span4"/ value="<?php echo $profile -> userPostalCode; ?>">
														</div>
													</div><!--/ City --><!-- State -->
													<!--/ Name of Institute/Industry --><!-- Guardian Name -->
													<div class="control-group">
														<label class="control-label">Guardian Name</label>
														<div class="controls">
															<input type="text" name="guardian_name" id="guardian_name" class="span8" value="<?php echo $profile -> studentGuardianName; ?>">
														</div>
													</div><!--/ Guradian Name --><!-- ccupation of Guardian\Self -->
													<div class="control-group">
														<label class="control-label">Occupation of Guardian\Self</label>
														<div class="controls">
															<input type="text" name="occupation_of_guardian" id="occupation_of_guardian" class="span8" value="<?php echo $profile -> studentGuardianOccupation; ?>">
														</div>
													</div><!--/ ccupation of Guardian\Self --><!-- Reference -->
													<div class="control-group">
														<label class="control-label">Reference</label>
														<div class="controls">
															<input type="text" name="reference" id="reference" class="span8" value="<?php echo $profile -> studentReferenceName; ?>">
														</div>
													</div><!--/ name_of_institute --><!-- Form Action -->
													<div class="control-group">
														<label class="control-label">Name Of Institute</label>
														<div class="controls">
															<input type="text" name="name_of_institute" id="name_of_institute" class="span8" value="<?php echo $profile -> studentInstituteName; ?>">
														</div>
													</div><!--/ Reference --><!-- Form Action -->
													<div class="form-actions">
														<button type="submit" class="btn blue" name="edit_profile" id="edit_profile">
															Edit Profile
														</button>
													</div><!--/ Form Action -->
												</form>
											</div>
										</div>
										
										<div id="tab_2-2" class="tab-pane">
											<div style="height: auto;" id="accordion2-2" class="accordion collapse">
												<?php
												$attributes = array('id' => 'form_change_avtar', 'class' => 'form-horizontal');

												echo form_open_multipart('student/profile', $attributes);
												?>
													<div class="alert alert-error hide">
														<button class="close" data-dismiss="alert"></button>
														You have some form errors. Please check below.
													</div>
													<div class="alert alert-success hide">
														<button class="close" data-dismiss="alert"></button>
														Your form validation is successful!
													</div>
													<div class="control-group">
														<label class="control-label">Select Avtar</label>
														<div class="controls">
															<div class="fileupload fileupload-new" data-provides="fileupload">
																<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																	<img src="" alt="" />
																</div>
																<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
																	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
																	
																</div>
																<div>
																	<span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
																		<input type="file" id="student_avtar" name="student_avtar" class="default" />
																	</span>
																	<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
																</div>
															</div>
															<span class="label label-important">NOTE!</span>
															<span> Attach file should be less than 2MB and jpg, jpeg and png format. </span>
														</div>
													</div>
													<!-- Form Action -->
													<div class="form-actions">
														<button type="submit" class="btn yellow" name="change_avatar" id="change_avatar">
															Change Avtar
														</button>
													</div><!--/ Form Action -->
												</form>
											</div>
											</div>
										</div>
										<div id="tab_3-3" class="tab-pane">
											<div style="height: auto;" id="accordion3-3" class="accordion collapse">
												
													<?php
													$attributes = array('id' => 'form_change_password');
													echo form_open('student/profile', $attributes);
													 ?>
												
													<div class="alert alert-error hide">
														<button class="close" data-dismiss="alert"></button>
														You have some form errors. Please check below.
													</div>
													<div class="alert alert-success hide">
														<button class="close" data-dismiss="alert"></button>
														Your form validation is successful!
													</div>
													<!-- password -->
													<div class="control-group">
														<label class="control-label">Current Password<span class="required">*</span></label>
														<div class="controls">
															<input type="password" name="current_password" id="current_password" class="span8"/>
															<span for="strength" class="help-inline"><?php echo form_error('current_password'); ?></span>
														</div>
													</div><!--/ password -->
													<!-- New password -->
													<div class="control-group">
														<label class="control-label">New Password<span class="required">*</span></label>
														<div class="controls">
															<input type="password" name="new_password" id="new_password" class="span8"/>
															<span for="strength" class="help-inline"><?php echo form_error('new_password'); ?></span>
														</div>
													</div><!--/ New password -->
													<!-- Re-type New password -->
													<div class="control-group">
														<label class="control-label">Re-type New Password<span class="required">*</span></label>
														<div class="controls">
															<input type="password" name="re_new_password" id="re_new_password" class="span8"/>
															<span for="strength" class="help-inline"><?php echo form_error('re_new_password'); ?></span>
														</div>
													</div><!--/ Re-type New password -->
													<!-- Form Action -->
													<div class="form-actions">
														<button type="submit" class="btn green" id="change_password" name="change_password"> 
															Change Password
														</button>
													</div><!--/ Form Action -->
												</form>
											</div>
										</div>
										<div id="tab_4-4" class="tab-pane">
											<div style="height: auto;" id="accordion4-4" class="accordion collapse">
												
												
												<?php
												$attributes = array('id' => 'form_student_resume', 'class' => 'form-horizontal');

												echo form_open_multipart('student/profile', $attributes);
													 ?>
													<div class="alert alert-error hide">
														<button class="close" data-dismiss="alert"></button>
														You have some form errors. Please check below.
													</div>
													<div class="alert alert-success hide">
														<button class="close" data-dismiss="alert"></button>
														Your form validation is successful!
													</div>
													<div class="control-group">
														<label class="control-label">Select Resume</label>
														<div class="controls">
															<div class="fileupload fileupload-new" data-provides="fileupload">
																<span class="btn btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span>
																	<input type="file" id="student_resume" name="student_resume" class="default" />
																	
																</span>
																<span class="fileupload-preview"></span>
																<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a>
															</div>
														</div>
													</div><!-- Form Action -->
													<div class="form-actions">
														<button type="submit" class="btn blue" id="change_resume" name="change_resume">
															Upload
														</button>
													</div><!--/ Form Action -->
												</form>
											</div>
										</div>
									</div>
								</div>
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
