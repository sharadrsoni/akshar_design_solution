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
					Send Notification
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
					<h4>Send Notification <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="SendNotification">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<!--li class="active">
						<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Branches</a>
						</li-->
						<li class="active">
							<a href="#tab1" data-toggle="tab"><span class="icon icone-pencil"></span> Send Notification</a>
						</li>
					</ul>
					<div class="tab-content">
						<!--div class="tab-pane active" id="tab1">

						</div-->
						<div class="tab-pane active" id="tab1">
							<form class="form-horizontal span12 widget shadowed purple" id="form_sendnotification">
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
								<h3 class="form-section">Send Notification Info.</h3>
									<!-- Student/Staff -->
									<div class="control-group">
										<label class="control-label">Student/Staff<span class="required">*</span></label>
										<div class="controls">
											<div class="text-toggle-Userrole" data-on="Student" data-off="Staff" >
												<input type="checkbox" checked="" name="user_role" id="user_role"  class="toggle" />
											</div>
										</div>
									</div><!--/ Student/Staff -->
									<!-- Individual/Batch -->
									<div class="control-group">
										<label class="control-label">Individual/Batch<span class="required">*</span></label>
										<div class="controls">
											<div class="text-toggle-Individual_Batch" data-on="Individual" data-off="Branch|Batch">
												<input type="checkbox" name="individual_Batch" id="individual_Batch"  class="toggle" />
											</div>
										</div>
									</div><!--/ Individual/Batch -->
										<?php
									$role=$this->session->userdata('roleId');
									if($role==1)
									{
									?>
									<!-- Branch -->
									<div class="control-group">
										<label class="control-label">Branch<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="branch_name" id="branch_name">
												<option value="">Select...</option>
													<?php
												foreach ($branch as $key) {
													echo "<option value='{$key->branchId}'>{$key->branchName} - {$key->branchId}</option>";
												}
												?>
												
											</select>
											<span for="branch_name" class="help-inline"><?php echo form_error('branch_name'); ?></span>
										</div>
									</div><!--/ Branch -->
										<?php } ?>
									<!-- Batch -->
									<div class="control-group" id="lst_batch_div">
										<label class="control-label">Batch<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="batch_name" id="batch_name">
												<option value="All">All...</option>
												<option value="Category 1">Category 1</option>
												<option value="Category 2">Category 2</option>
												<option value="Category 3">Category 5</option>
												<option value="Category 4">Category 4</option>
											</select>
										</div>
									</div><!--/ Batch -->
								
									<!-- Individual Name -->
									<div class="control-group" style="display:none" id="lst_user_div">
										<label class="control-label">Name<span class="required">*</span></label>
										<div class="controls">
											<select name="user_name" id="user_name" class="span4 select2">
												<option value="">Select...</option>
												<option>Dallas Cowboys</option>
												<option>New York Giants</option>
												<option>Philadelphia Eagles</option>
												<option>Washington Redskins</option>
												<option>Chicago Bears</option>
												<option>Detroit Lions</option>
												<option>Green Bay Packers</option>
												<option>Minnesota Vikings</option>
											</select>
										</div>
									</div><!--/ Individual Name -->
									<!-- Message -->
									<div class="control-group">
										<label class="control-label">Message<span class="required">*</span></label>
										<div class="controls">
											<textarea type="textarea" name="message" id="message" class="span8"/>
											</textarea>
										</div>
									</div><!--/ Message -->
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="register" id="register">
											Register
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
