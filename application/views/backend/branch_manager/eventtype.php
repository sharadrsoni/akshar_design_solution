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
					Event Type
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
					<h4>Event Type <small>Manage event type details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="eventtype">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Event Type</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span>Add Event Type</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tbleventtype">
										<thead>
											<tr>
												<th style="width:8px;">
												<input type="checkbox" class="group-checkable" data-set="#tbleventtype .checkboxes" />
												</th>
												<th>Event Type Name</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($eventtype)) {
												foreach ($eventtype as $key) {
													echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>

<td class=\"hidden-480\">{$key->eventTypeName} </td>
<td ><span class=\"label label-success\" onclick='updateeventtype(\"{$key->eventTypeId}\");' >Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "admin_branch_manager/delete_eventtype/{$key->eventTypeId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_eventtype');
							echo form_open('admin_branch_manager/eventtype', $attributes);
 ?>
							<!--<form class="form-horizontal span12 widget shadowed green" id="form_eventtype">-->
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
									<h3 class="form-section">Event Type Info.</h3>
									<!-- Event Type Name -->
									<div class="control-group">
										<label class="control-label">Event Type Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="eventtype_name" id="eventtype_name" class="span8">
										</div>
									</div><!--/ Event Type Name -->
									<input type="hidden" name="eventtypeId" id="eventtypeId" value="" />
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="submitEventType" id="submitEventType">
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
