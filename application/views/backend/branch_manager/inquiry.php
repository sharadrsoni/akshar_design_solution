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
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Inquiry</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Inquiry</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblInquiry">
										<thead>
											<tr>
												<th style="width:8px;">
												<input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" />
												</th>
												
												<th class="hidden-480">Student Name</th>
												<th class="hidden-480">E-mail Address</th>
												<th class="hidden-480">Inquiry State</th>
												<th class="hidden-480">Contact Number</th>
												<th class="hidden-480">Inquiry_Qualification</th>
												
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($inquiry_list)) {
												foreach ($inquiry_list as $key) {
													echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>

<td class=\"hidden-480\">{$key->inquiryStudentFirstName} {$key->inquiryStudentMiddleName} {$key->inquiryStudentLastName}</td>
<td class=\"hidden-480\">{$key->inquiryEmailAddress}</td>
<td class=\"hidden-480\">{$key->inquiryState}
<td class=\"hidden-480\">{$key->inquiryContactNumber}</td>
<td class=\"hidden-480\">{$key->inquiryQualification}</td>
<<<<<<< HEAD
<td ><span class=\"label label-success\">Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_inquiry/{$key->inquiryId}'>Delete</span></td></tr>
=======
<td ><span class=\"label label-success\">Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_batch/{$key->inquiryId}'>Delete</span></td></tr>
>>>>>>> bd7dc1ff5d45dc61aa2907e6506cb2d8031d3c2a
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
							<form method="post" action="<?php echo base_url(); ?>branch_manager/inquiry" class="form-horizontal span12 widget shadowed yellow" id="form_inquiry">
							
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
									<!-- User Name -->
									<div class="control-group">
										<label class="control-label">User Name</label>
										<div class="controls">
											<input type="text" name="user_name" id="user_name" class="span8">
										</div>
									</div><!--/ User Name -->
									<!-- Date of Birth -->
									<div class="control-group">
										<label class="control-label">Date of Birth</label>
										<div class="input-append span6" id="dob_datepicker">
											<input type="text" name="date_of_birth" id="date_of_birth" class="m-wrap span7">
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									</div><!--/ Date of Birth -->
									<!-- Mobile No -->
									<div class="control-group">
										<label class="control-label">Mobile No.</label>
										<div class="controls">
											<input type="text" name="mobile_no" id="mobile_no" class="span8">
										</div>
									</div><!--/ Mobile No-->
									<!-- E-mail -->
									<div class="control-group">
										<label class="control-label">E-mail</label>
										<div class="controls">
											<input type="text" name="email" id="email" class="span8">
										</div>
									</div><!--/ E-mail -->
									<!-- Qualification -->
									<div class="control-group">
										<label class="control-label">Qualification</label>
										<div class="controls">
											<input type="text" name="qualification" id="qualification" class="span8">
										</div>
									</div><!--/ Qualification -->
									<h3 class="form-section">Address</h3>
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
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
													<option value="Category 3">Category 5</option>
													<option value="Category 4">Category 4</option>
												</select>
											</div>
											<div class="span4">
												<input type="text" name="pin_code" id="pin_code" class="span12"/>
											</div>
										</div>
									</div><!--/ StateState -->
									<h3 class="form-section">Other Info</h3>
									<!-- Name of Institute/Industry -->
									<div class="control-group">
										<label class="control-label">Name of Institute/Industry</label>
										<div class="controls">
											<input type="text" name="name_of_institute" id="name_of_institute" class="span8">
										</div>
									</div><!--/ Name of Institute/Industry -->
									<!-- ccupation of Guardian\Self -->
									<div class="control-group">
										<label class="control-label">Occupation of Guardian\Self</label>
										<div class="controls">
											<input type="text" name="occupation_of_guardian" id="occupation_of_guardian" class="span8">
										</div>
									</div><!--/ ccupation of Guardian\Self -->
									<!-- Reference -->
									<div class="control-group">
										<label class="control-label">Reference</label>
										<div class="controls">
											<input type="text" name="reference" id="reference" class="span8">
										</div>
									</div><!--/ Reference -->
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="register" id="register">
											Register
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
