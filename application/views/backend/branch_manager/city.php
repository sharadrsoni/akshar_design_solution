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
					City
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
					<h4>City <small>Manage city details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="city">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>City</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span>Add City</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblcity">
										<thead>
											<tr>
												<th style="width:8px;">
												<input type="checkbox" class="group-checkable" data-set="#tblcity .checkboxes" />
												</th>
												<th>City Name</th>
												<th >View</th>
											</tr>
										</thead>
											<tbody>
													<?php
											if (isset($city_list)) {
												foreach ($city_list as $key) {
													echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>

<td class=\"hidden-480\">{$key->cityName} </td>
<td ><span class=\"label label-success\">Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_city/{$key->cityId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_city');
							echo form_open('branch_manager/city', $attributes);
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
									<h3 class="form-section">City Info.</h3>
										<!-- State -->
									<div class="control-group">
										<label class="control-label">State<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="state_id" id="state_id">
												<option value="">Select...</option>
												<?php
												foreach ($state as $key) {
													echo "<option value='{$key->stateId}'>{$key->stateName} - {$key->stateId}</option>";
												}
												?>
											</select>
											<span for="state_id" class="help-inline"><?php echo form_error('state_id'); ?></span>
										</div>
									</div><!--/ State -->
									<!-- City Name -->
									<div class="control-group">
										<label class="control-label">City Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="city_name" id="city_name" class="span8">
										</div>
									</div><!--/ City Name -->

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
