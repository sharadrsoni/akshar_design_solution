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
					Role
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
					<h4>Role <small>Manage Role details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="role">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1"  data-toggle="tab"><span class="icon icone-eraser"></span>Role</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2"  data-toggle="tab"><span class="icon icone-pencil"></span>Add Role</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblrole">
										<thead>
											<tr>
												<th>Role Name</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($role)) {
												foreach ($role as $key) {
													echo "<tr class=\"odd gradeX\">
<td class=\"hidden-480\">{$key->roleName} </td>
<td ><span class=\"label label-success\" onclick='updaterole(\"{$key->roleId}\");'>Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "admin/delete_role/{$key->roleId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_role');
							echo form_open('admin/role', $attributes);
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
								<h3 class="form-section">Role Info.</h3>
								<!-- Role Name -->
									<?php
									$err=form_error('role_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Role Name<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="role_name" id="role_name" class="span8" value="<?php echo set_value("role_name"); ?>">
										<span for="role_name" class="help-inline"><?php echo form_error('role_name'); ?></span>
									</div>
								</div><!--/ Role Name -->
								<input type="hidden" name="roleId" id="roleId" value="" />
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="submitRole" id="submitRole">
										Add Role
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
