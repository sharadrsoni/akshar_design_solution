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
							echo form_open('branch_manager_counsellor/studentregistation', $attributes);
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
							<div class="control-group">
								<label class="control-label">First Name<span class="required">*</span></label>
								<div class="controls">
									<input type="text" class="m-wrap span6" name="firstname" id="firstname" placeholder="First Name">
								</div>
							</div><!-- /First Name -->
							<!-- Middle Name -->
							<div class="control-group">
								<label class="control-label">Middle Name</label>
								<div class="controls">
									<input type="text" class="m-wrap span6" name="middlename" id="middlename" placeholder="Middle Name">
								</div>
							</div><!-- /Middle Name -->
							<!-- Last Name -->
							<div class="control-group">
								<label class="control-label">Last Name</label>
								<div class="controls">
									<input type="text" class="m-wrap span6" name="lastname" id="lastname" placeholder="Last Name">
								</div>
							</div><!-- /Last Name -->
							<!-- Email Address -->
							<div class="control-group">
								<label class="control-label">Email Address</label>
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on">@</span>
										<input class="m-wrap span12" type="text" name="email" id="email" placeholder="Email Address" />
									</div>
								</div>
							</div><!-- /Email Address -->
							<!-- Contact Number -->
							<div class="control-group">
								<label class="control-label">Contact Number</label>
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on">MO/LL</span>
										<input class="m-wrap span12" type="text" name="contact_number" id="contact_number" placeholder="Contact Number" />
									</div>
								</div>
							</div><!-- /Contact Number -->
							<div class="form-actions clearfix">
								<button type="submit" class="btn purple-stripe" name="registerStudent" id="registerStudent">
									Register
								</button>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="tab2">
						<?php
							$attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'form_student_register2');
							echo form_open('branch_manager_counselor/studentregistation', $attributes);
						?>
							<h3 class="block">Select Courses & Batches</h3>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
							<!-- Student -->
							<div class="control-group">
								<label class="control-label">Select Student<span class="required">*</span></label>
								<div class="controls">
									<select name="studentid" id="studentid" class="span6">
											<option value="">Select...</option>
											<?php
											foreach ($student as $key) {
												echo "<option value='{$key->userId}'>{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</option>";
											}
											?>
									</select>
								</div>
							</div><!-- /Student -->
							<!-- Course -->
							<div class="control-group">
								<label class="control-label">Course<span class="required">*</span></label>
								<div class="controls">
									<select name="courseid" id="courseid" class="span6">
											<option value="">Select...</option>
											<?php
											foreach ($course as $key) {
												echo "<option value='{$key->courseCode}'>{$key->courseName}</option>";
											}
											?>
									</select>
								</div>
							</div><!-- /Course -->
							<!-- Batch -->
							<div class="control-group">
								<label class="control-label">Batch<span class="required">*</span></label>
								<div class="controls">
									<select name="batchid" id="batchid" class="span6 ">
											<option value="">Select...</option>
											<?php
											foreach ($batchId as $key) {
												echo "<option value='{$key->batchId}'>{$key->batchStartDate}</option>";
											}
											?>
									</select>
								</div>
							</div><!-- /Batch -->
							<!-- Book receive or not -->
							<div class="control-group">
								<label class="control-label">Books issue<span class="required">*</span></label>
								<div class="controls">
									<div class="switch" data-on="info" data-off="success" data-on-label="Yes" data-off-label="No">
										<input name="isbookissue" id="isbookissue" type="checkbox" class="toggle"/>
									</div>
								</div>
							</div><!-- /Book receive or not -->
							<!-- Add -->
							<div class="form-actions clearfix">
								<button type="submit" class="btn purple-stripe">
									Course Register
								</button>
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
