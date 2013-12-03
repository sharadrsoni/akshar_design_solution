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
					Course Category
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
					<h4>Course Category <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="CourseCategory">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Course Categories</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Course Category</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblCourseCategory">
										<thead>
											<tr>
												<th>CourseCategory Name</th>
												<th >View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($coursecategory)) {
												foreach ($coursecategory as $key) {
													echo "<tr class=\"odd gradeX\">
<td class=\"hidden-480\">{$key->courseCategoryName} </td>
<td ><span class=\"label label-success\" onclick='updatecoursecategory(\"{$key->courseCategoryId}\");'>Edit</span> </span class=\"label label-success\"><a href='" . base_url() . "admin/delete_course_category/{$key->courseCategoryId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_coursecategory');
							echo form_open('admin/course_category', $attributes);
 ?>
							<!-- <form class="form-horizontal span12 widget shadowed yellow" id="form_coursecategory"> -->
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
									<h3 class="form-section">Course Category Info.</h3>
									<!-- Course Category Name -->
									<?php
									$err=form_error('coursecategory_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
										<label class="control-label">Course Category Name<span class="required"><font color='red'>*</font></span></label>
										<div class="controls">
											<input type="text" name="coursecategory_name" id="coursecategory_name" class="span8" value="<?php echo set_value("coursecategory_name"); ?>">
											<span for="coursecategory_name" class="help-inline"><?php echo form_error('coursecategory_name'); ?></span>
										</div>
									</div><!--/ Course Category Name -->
									<input type="hidden" name="coursecategoryId" id="coursecategoryId" value="" />
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="submitCourseCategory" id="submitCourseCategory">
											Add Course Category
										</button>
										<a href="<?php echo base_url() . "admin/course_category"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
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
