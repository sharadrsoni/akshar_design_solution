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
					State
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
					<h4>State <small>Manage state details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="state">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1"  data-toggle="tab"><span class="icon icone-eraser"></span>State</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2"  data-toggle="tab"><span class="icon icone-pencil"></span>Add State</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblstate">
										<thead>
											<tr>
												<th>State Name</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($state)) {
												foreach ($state as $key) {
													echo "<tr class=\"odd gradeX\">
<td class=\"hidden-480\">{$key->stateName} </td>
<td ><span class=\"label label-success\" onclick='updatestate(\"{$key->stateId}\");'>Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "admin/delete_state/{$key->stateId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_state');
							echo form_open('admin/state', $attributes);
							?>
							<!--				<form class="form-horizontal span12 widget shadowed green" id="form_state"> -->
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>

							<div class="body-inner">
								<h3 class="form-section">State Info.</h3>
								<!-- State Name -->
									<?php
									$err=form_error('state_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">State Name<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="state_name" id="state_name" class="span8" value="<?php echo set_value("state_name"); ?>">
										<span for="state_name" class="help-inline"><?php echo form_error('state_name'); ?></span>
									</div>
								</div><!--/ State Name -->
								<input type="hidden" name="stateId" id="stateId" value="" />
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="submitState" id="submitState">
										Add State
									</button>
									<a href="<?php echo base_url() . "admin/state"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
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
