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
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>City</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span>Add City</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblcity">
										<thead>
											<tr>
												<th>City Name</th>
												<th >View</th>
											</tr>
										</thead>
											<tbody>
													<?php
											if (isset($city)) {
												foreach ($city as $key) {
													echo "<tr class=\"odd gradeX\">
<td class=\"hidden-480\">{$key->cityName} </td>
<td ><span class=\"label label-success\" onclick='updatecity(\"{$key->cityId}\");'>Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "admin/delete_city/{$key->cityId}'>Delete</span></td></tr>
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
							echo form_open('admin/city', $attributes);
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
											<?php
									$err=form_error('state_id');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">State<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="state_id" id="state_id" value="<?php echo set_value("state_id"); ?>">
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
										<?php
									$err=form_error('city_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">City Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="city_name" id="city_name" class="span8" value="<?php echo set_value("city_name"); ?>">
											<span for="city_name" class="help-inline"><?php echo form_error('city_name'); ?></span>
										</div>
									</div><!--/ City Name -->
									<input type="hidden" name="cityId" id="cityId" value="" />
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="submitCity" id="submitCity">
											Add City
										</button>
										<a href="<?php echo base_url() . "admin/city"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
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
