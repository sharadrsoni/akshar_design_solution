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
					Course
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
					<h4>Course <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Course">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1"  data-toggle="tab"><span class="icon icone-eraser"></span>Courses</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Course</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblCourse">
										<thead>
											<tr>
												<th>Course Name</th>
												<th class="hidden-480">Course Code</th>
												<th class="hidden-480">Course Duration</th>
												<th class="hidden-480">Course Category Id</th>
												<th >Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($course as $key) {
												echo "<tr class=\"odd gradeX\">
<td>{$key->courseName}</td>
<td class=\"hidden-480\">{$key->courseCode}</td>
<td class=\"hidden-480\">{$key->courseDuration}</td>
<td class=\"hidden-480\">{$key->courseCategoryId}</td>
<td ><span class=\"label label-success\" onclick='updateCourse(\"{$key->courseCode}\");'>Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "admin/delete_course/{$key->courseCode}'>Delete</a></span></td></tr>
";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							
				<!--View Course -->
				<div class="form-horizontal form-view" id="ViewBatch">
					<h3> View Course Info </h3>
					
					<div class="row-fluid">
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label" for="firstName">Course Category:</label>
								<span class="text" id="view_coursecategory_id"></span>
							</div>
							
							
						</div>
						<!--/span-->
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label" for="lastName">Course Name:</label>
								<div class="controls">
									<span class="text" id="view_course_name"></span>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row-fluid">
						<!--/span-->
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Duration:</label>
								<div class="controls">
									<span class="text bold" id="view_course_duration"></span>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row-fluid">
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Course Material Id:</label>
								<div class="controls">
									<span class="text bold" id="view_material_id"></span>
								</div>
							</div>
						</div>
						<!--/span-->
						
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Material Total Books:</label>
								<div class="controls">
									<span class="text bold" id="view_total_books"></span>
								</div>
							</div>
						</div>
						<!--/span-->
						
					</div>
					<!--/row-->
					
					<div class="row-fluid">
						<div class="span12 ">
							<div class="control-group">
								<label class="control-label">Material Opening Stock:</label>
								<div class="controls">
									<span class="text" id="view_opening_stock"></span>
								</div>
							</div>
							
						</div>
					</div>
					
					
				</div><!-- End View course-->
			
							
						</div>
						<div class="tab-pane" id="tab2">
							<?php
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_course');
							echo form_open('admin/course', $attributes);
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
									<h3 class="form-section">Course Info.</h3>
									<!-- Course Code -->
									<div class="control-group">
										<label class="control-label">Course Code<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="course_code" id="course_code" class="span4"/>
											<?php echo form_error('course_code');
											?>
										</div>
									</div><!--/ Course Code -->
									<!-- CourseCategory ID -->
									<div class="control-group">
										<label class="control-label">Course Category ID<span class="required">*</span></label>
										<div class="controls">
											<select class="span4" name="courseCategory_id" id="courseCategory_id">
												<option value="">Select...</option>
												<?php
												foreach ($course_category as $key) {
													echo "<option value='{$key->courseCategoryId}'>{$key->courseCategoryId}</option>";
												}
												?>
											</select>
											<span for="courseCategory_id" class="help-inline"><?php echo form_error('courseCategory_id'); ?></span>
										</div>
									</div>
									<!--/ CourseCategory ID -->
									<!-- Course Name -->
									<div class="control-group">
										<label class="control-label">Course Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="course_name" id="course_name" class="span8">
										</div>
									</div><!--/ Course Name -->
									<!-- Course Duration -->
									<div class="control-group">
										<label class="control-label">Course Duration<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="course_duration" id="course_duration" class="span8"/>
										</div>
									</div><!--/ Course Duration -->
									<!-- Course Material Id -->
									<div class="control-group">
										<label class="control-label">Course Material Id<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="material_id" id="material_id" class="span8"/>
										</div>
									</div><!--/ Course Material Id -->
									<!-- Course Material Total Books -->
									<div class="control-group">
										<label class="control-label">Material Total Books<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="total_books" id="total_books" class="span8"/>
										</div>
									</div><!--/ Course Material Total Books -->
									<!-- Course Material Opening Stock -->
									<div class="control-group">
										<label class="control-label">Material Opening Stock<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="opening_stock" id="opening_stock" class="span8"/>
										</div>
									</div><!--/ Course Material Opening Stock -->
									<!-- Form Action -->
									<input type="hidden" name="courseId" id="courseId" value="" />
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="submitCourse" id="submitCourse">
											Add Course
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
