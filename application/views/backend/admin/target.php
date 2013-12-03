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
					Target
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
					<h4>Target <small>Assign targets to brach over here.</small></h4>
				</div>
			</div
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Target">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Targets</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Assign Tragets</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblTarget">
										<thead>
											<tr>
												<th class="hidden-480">Target Name</th>
												<th class="hidden-480">Start Date</th>
												<th class="hidden-480">End Date</th>
												<th class="hidden-480">Target Status</th>
												<th class="hidden-480">Target Type</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($target)) {
												foreach ($target as $key) {
													echo "<tr class=\"odd gradeX\">
<td class=\"hidden-480\">{$key->targetSubject}</td>
<td class=\"hidden-480\">{$key->targetStartDate}</td>
<td class=\"hidden-480\">{$key->targetEndDate}</td>
<td class=\"hidden-480\">{$key->targetIsAchieved}</td>
<td class=\"hidden-480\">{$key->targetTypeName}</td>
<td ><span class=\"label label-success\" onclick='updatetarget(\"{$key->targetId}\");' >Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "admin/delete_target/{$key->targetId}'>Delete</a></span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_target');
							echo form_open('admin/target', $attributes);
 ?>
							<!---form method="post" action="<?php echo base_url(); ?>branch_manager/target" class="form-horizontal span12 widget shadowed yellow" id="form_target">-->
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
									<h3 class="form-section">Target Info </h3>
									<!-- Branch Name -->
									<?php
									$err=form_error('branch');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Branch<span class="required"><font color='red'>*</font></span></label>
										<div class="controls">
											<select class="span4" name="branch" id="branch" value="<?php echo set_value("branch"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($branch as $key) 
												{
													echo "<option value='{$key->branchCode}'>{$key->branchName}</option>";
												}
												?>
											</select>
											<span for="branch" class="help-inline"><?php echo form_error('branch'); ?></span>
										</div>
									</div><!--/ Branch Name -->

									<!-- Target Name-->
									<?php
									$err=form_error('target_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Target Name<span class="required"><font color='red'>*</font></span></label>
										<div class="controls">
											<input type="text" name="target_name" id="target_name" class="span8" value="<?php echo set_value("target_name"); ?>"/>
											<span for="target_name" class="help-inline"><?php echo form_error('target_name'); ?></span>
										</div>
									</div><!--/ Target Name	 -->

									<!-- Targer Type -->
									<?php
									$err=form_error('target_type');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Target Type<span class="required"><font color='red'>*</font></span></label>
										<div class="controls">
											<select class="span4" name="target_type" id="target_type" value="<?php echo set_value("target_type"); ?>">
												<option value="">Select...</option>
												<?php
												foreach ($target_type as $key) 
												{
													echo "<option value='{$key->targetTypeId}'>{$key->targetTypeName}</option>";
												}
												?>
											</select>
											<span for="target_type" class="help-inline"><?php echo form_error('target_type'); ?></span>
										</div>
									</div><!--/ Target Type -->

									<!-- Start Date -->
									<?php
									$err=form_error('start_date');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Start Date<span class="required"><font color='red'>*</font></span></label>
										<div class="controls">
											<div class="input-append span6" id="start_date_datepicker">
												<input type="text" readonly="" data-format="dd-MM-yyyy" name="start_date" id="start_date" class="m-wrap span7" value="<?php echo set_value("start_date"); ?>">
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
								
										<label class="control-label">End Date<span class="required"><font color='red'>*</font></span></label>
										<div class="controls">
											<div class="input-append span6" id="end_date_datepicker">
												<input type="text" readonly="" data-format="dd-MM-yyyy" name="end_date" id="end_date" class="m-wrap span7" value="<?php echo set_value("end_date"); ?>">
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
									
										<label class="control-label">Description<span class="required"><font color='red'>*</font></span></label>
										<div class="controls">
											<input type="text" name="description" id="description" class="span8" value="<?php echo set_value("description"); ?>"/>
											<span for="description" class="help-inline"><?php echo form_error('description'); ?></span>
										</div>
									</div><!--/ Description	 -->
									<input type="hidden" name="targetId" id="targetId" value="" />
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary"  name="submitTarget" id="submitTarget">
											Add Target
										</button>
										<a href="<?php echo base_url() . "admin/target"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
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
