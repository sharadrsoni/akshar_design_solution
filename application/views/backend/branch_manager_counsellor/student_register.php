<section id="main">
	<!-- START Bootstrap Navbar -->
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<!-- Breadcrumb -->
			<ul class="breadcrumb page-title">
				<li>
					<a href="#">Dashboard</a><span class="divider"></span>
				</li>
				<li class="active">
					Index
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
					<h4>Student Registration <small>Register student over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="StudnetRegistration">
			<div class="row-fluid">
				<div class="span3">
					<ul class="nav nav-tabs nav-stacked">
						<li class="active">
							<a data-toggle="tab" href="#tab1"><span class="icon icone-cog"></span>Student Register</a>
						</li>
						<li >
							<a data-toggle="tab" href="#tab2"><span class="icon icone-picture"></span>Courses Register</a>
						</li>
					</ul>
				</div>
				<div class="tab-content span9">
					<div class="tab-pane active" id="tab1">
						<?php
							$attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'form_student_register1');
							echo form_open('branch_manager_counsellor/studentregistration', $attributes);
						?>
							<h3 class="block">Provide Student personal Info.</h3>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
							<!-- First Name -->
									<?php
									$err=form_error('firstname');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
								<label class="control-label">First Name<span class="required">*</span></label>
								<div class="controls">
									<input type="text" class="m-wrap span6" name="firstname" id="firstname" placeholder="First Name" value="<?php echo set_value("firstname"); ?>">
									<span for="firstname" class="help-inline"><?php echo form_error('firstname'); ?></span>
								</div>
							</div><!-- /First Name -->
							<!-- Middle Name -->
									<?php
									$err=form_error('middlename');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
						
								<label class="control-label">Middle Name</label>
								<div class="controls">
									<input type="text" class="m-wrap span6" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo set_value("middlename"); ?>">
									<span for="middlename" class="help-inline"><?php echo form_error('middlename'); ?></span>
								</div>
							</div><!-- /Middle Name -->
							<!-- Last Name -->
							
										<?php
									$err=form_error('lastname');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								<label class="control-label">Last Name</label>
								<div class="controls">
									<input type="text" class="m-wrap span6" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo set_value("lastname"); ?>">
									<span for="lastname" class="help-inline"><?php echo form_error('lastname'); ?></span>
								</div>
							</div><!-- /Last Name -->
							<!-- Email Address -->
							
										<?php
									$err=form_error('email');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								<label class="control-label">Email Address</label>
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on">@</span>
										<input class="m-wrap span12" type="text" name="email" id="email" placeholder="Email Address" value="<?php echo set_value("email"); ?>"/>
										<span for="email" class="help-inline"><?php echo form_error('email'); ?></span>
									</div>
								</div>
							</div><!-- /Email Address -->
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
									<div class="input-prepend">
										<span class="add-on">MO/LL</span>
										<input class="m-wrap span12" type="text" name="contact_number" id="contact_number" placeholder="Contact Number" value="<?php echo set_value("contact_number"); ?>"/>
										<span for="contact_number" class="help-inline"><?php echo form_error('contact_number'); ?></span>
									</div>
								</div>
							</div><!-- /Contact Number -->
							<div class="form-actions clearfix">
								<button type="submit" class="btn purple-stripe" name="registerStudent" id="registerStudent">
									Register
								</button>
								<a href="<?php echo base_url() . "branch_manager/studentregistration"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="tab2">
						<?php
							$attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'form_student_register2');
							echo form_open('branch_manager_counsellor/studentregistration', $attributes);
						?>
							<h3 class="block">Select Courses &amp; Batches</h3>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
							<!-- Student -->
									<?php
									$err=form_error('studentid');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
								<label class="control-label">Select Student<span class="required">*</span></label>
								<div class="controls">
									<select name="studentid" id="studentid" class="span6" value="<?php echo set_value("studentid"); ?>">
											<option value="">Select...</option>
											<?php
											foreach ($student as $key) {
												echo "<option value='{$key->userId}'>{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</option>";
											}
											?>
									</select>
									<span for="studentid" class="help-inline"><?php echo form_error('studentid'); ?></span>
								</div>
							</div><!-- /Student -->
							<!-- Course -->
									<?php
									$err=form_error('courseid');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
								<label class="control-label">Course<span class="required">*</span></label>
								<div class="controls">
									<select name="courseid" id="courseid" class="span6" value="<?php echo set_value("courseid"); ?>">
<<<<<<< HEAD
=======
											<option value="">Select...</option>
											<?php
											foreach ($course as $key) {
												echo "<option value='{$key->courseCode}'>{$key->courseName}</option>";
											}
											?>
>>>>>>> upstream/master
									</select>
									<span for="courseid" class="help-inline"><?php echo form_error('courseid'); ?></span>
								</div>
							</div><!-- /Course -->
							<!-- Batch -->
									<?php
									$err=form_error('batchid');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
								<label class="control-label">Batch<span class="required">*</span></label>
								<div class="controls">
									<select name="batchid" id="batchid" class="span6 " value="<?php echo set_value("batchid"); ?>">
									</select>
									<span for="batchid" class="help-inline"><?php echo form_error('batchid'); ?></span>
								</div>
							</div><!-- /Batch -->
							<!-- Book receive or not -->
							<div class="control-group">
								<label class="control-label">Books issue<span class="required">*</span></label>
								<div class="controls">
									<div class="switch" id="isbookissuetogglediv" data-on="info" data-off="success" data-on-label="Yes" data-off-label="No">
										<input name="isbookissue" id="isbookissue" value="1" type="checkbox" class="toggle"/>
									</div>
								</div>
							</div><!-- /Book receive or not -->
							<!-- Course Fee -->
							<div class="control-group">
								<label class="control-label">Course Fees</label>
								<div class="controls">
									<div class="input-prepend">
										<input class="m-wrap span12" type="text" name="course_fees" id="course_fees"/>
									</div>
								</div>
							</div><!-- /Course Fee -->
							<!-- Add -->
							<div class="form-actions clearfix">
								<button type="submit" class="btn purple-stripe" name="registerCourse" id="registerCourse">
									Course Register
								</button>
								<a href="<?php echo base_url() . "branch_manager/studentregistration"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
							</div><!-- Add -->
						</form>
						<!-- LIst -->
						<div class="control-group">
							<table id="tbl_courses" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="hidden-480">Course</th>
										<th class="hidden-480">Batch</th>
										<th class="hidden-480">Action</th>
									</tr>
								</thead>
								<tbody id="lst_Courses">
									
								</tbody>
							</table>
						</div><!--/ List-->
					</div>
				</div>
			</div>
		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>
