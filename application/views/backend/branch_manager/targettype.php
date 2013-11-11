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
					Target Type
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
					<h4>Target Type <small>Manage target type details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="targettype">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Target Type</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span>Add Target Type</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tbltargettype">
										<thead>
											<tr>
												<th style="width:8px;">
												<input type="checkbox" class="group-checkable" data-set="#tbltargettype .checkboxes" />
												</th>
												<th>Target Type Name</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($targettype_list)) {
												foreach ($targettype_list as $key) {
													echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>

<td class=\"hidden-480\">{$key->targetTypeName} </td>
<td ><span class=\"label label-success\">Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "admin/delete_targettype/{$key->targetTypeId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_targettype');
							echo form_open('admin/targettype', $attributes);
 ?>
							<!--<form class="form-horizontal span12 widget shadowed green" id="form_targettype">-->
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
									<h3 class="form-section">Target Type Info.</h3>
									<!-- Target Type Name -->
									<div class="control-group">
										<label class="control-label">Target Type Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="targettype_name" id="targettype_name" class="span8">
										</div>
									</div><!--/ Target Type Name -->

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
