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
					Book Inventory
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
					<h4>Book Invntory <small>Manage Inventory details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="inventory">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1"  data-toggle="tab"><span class="icon icone-eraser"></span>Book Inventory</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2"  data-toggle="tab"><span class="icon icone-pencil"></span>Add Book Inventory</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblinventory">
										<thead>
											<tr>
												<th>Inventory Inward Quantity</th>
												<th>Course ID</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($inventory)) {
												foreach ($inventory as $key) {
													echo "<tr class=\"odd gradeX\">
<td class=\"hidden-480\">{$key->courseId} </td>
<td class=\"hidden-480\">{$key->inventoryInwardQuantity} </td>
<td ><span class=\"label label-success\" onclick='updatebookinventory(\"{$key->inventoryInwardId}\")'>Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_inventory/{$key->inventoryInwardId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_inventory');
							echo form_open('branch_manager/book_inventory', $attributes);
							?>
							<!--				<form class="form-horizontal span12 widget shadowed green" id="form_inventory"> -->
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>

							<div class="body-inner">
								<h3 class="form-section">Inventory Info.</h3>
										<!-- course name -->
									<div class="control-group">
										<label class="control-label">Course Name<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="course_id" id="course_id">
												<option value="">Select...</option>
												<?php
												foreach ($course as $key) {
													echo "<option value='{$key->courseCode}'>{$key->courseName} - {$key->courseCode}</option>";
												}
												?>
											</select>
											<span for="course_id" class="help-inline"><?php echo form_error('course_id'); ?></span>
										</div>
									</div><!--/ course name -->
								<!-- Inventory Quantity -->
								<div class="control-group">
									<label class="control-label">Inventory Inward Quantity<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="inventory_quantity" id="inventory_quantity" class="span8">
									</div>
								</div><!--/ Inventory Quantity -->
								<input type="hidden" name="inventoryInwardId" id="inventoryInwardId" value="" />
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="submitInventory" id="submitInventory">
										Add Inventory
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
