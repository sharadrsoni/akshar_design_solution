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
			</div>
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
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Targets</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span> Assign Tragets</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblTarget">
										<thead>
											<tr>
												<th style="width:8px;">
												<input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" />
												</th>
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
											if (isset($target_list)) {
												foreach ($target_list as $key) {
													echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>
<td class=\"hidden-480\">{$key->targetSubject}</td>
<td class=\"hidden-480\">{$key->targetStartDate}</td>
<td class=\"hidden-480\">{$key->targetEndDate}</td>
<td class=\"hidden-480\">{$key->targetIsAchieved}</td>
<td class=\"hidden-480\">{$key->targetTypeName}</td>
<td ><span class=\"label label-success\">Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_target/{$key->targetId}'>Delete</span></td></tr>
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
							echo form_open('branch_manager/target', $attributes);
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
									<div class="control-group">
										<label class="control-label">Branch<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="branch" id="branch">
												<option value="">Select...</option>
												<?php
												foreach ($branch as $key) 
												{
													echo "<option value='{$key->branchId}'>{$key->branchName}</option>";
												}
												?>
											</select>
										</div>
									</div><!--/ Branch Name -->

									<!-- Target Name-->
									<div class="control-group">
										<label class="control-label">Target Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="target_name" id="target_name" class="span8"/>
										</div>
									</div><!--/ Target Name	 -->

									<!-- Targer Type -->
									<div class="control-group">
										<label class="control-label">Target Type<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="target_type" id="target_type">
												<option value="">Select...</option>
												<?php
												foreach ($target_type as $key) 
												{
													echo "<option value='{$key->targetTypeId}'>{$key->targetTypeName}</option>";
												}
												?>
											</select>
										</div>
									</div><!--/ Target Type -->

									<!-- Start Date -->
									<div class="control-group">
										<label class="control-label">Start Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="start_date_datepicker">
												<input type="text" data-format="dd-MM-yyyy" name="start_date" id="start_date" class="m-wrap span7">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div><!--/ Start Date -->

									<!-- End Date -->
									<div class="control-group">
										<label class="control-label">End Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="end_date_datepicker">
												<input type="text" data-format="dd-MM-yyyy" name="end_date" id="end_date" class="m-wrap span7">
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
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary"  name="create" id="create">
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
