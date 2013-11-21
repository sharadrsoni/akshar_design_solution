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
<td onclick='viewcourse(\"{$key->courseCode}\");'>{$key->courseName}</td>
<td class=\"hidden-480\">{$key->courseCode}</td>
<td class=\"hidden-480\">{$key->courseDuration}</td>
<td class=\"hidden-480\">{$key->courseCategoryName}</td>
<td ><span class=\"label label-success\" onclick='updateCourse(\"{$key->courseCode}\");'>Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "admin/delete_course/{$key->courseCode}'>Delete</a></span></td></tr>
";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<?php
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_course');
							echo form_open_multipart('admin/course', $attributes);
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
								<?php
								$err = form_error('courseCode');
								if ($err != '') {
									echo "<div class='control-group error'>";
								} else {
									echo "<div class='control-group'>";
								}
								?>

								<label class="control-label">Course Code<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="courseCode" id="courseCode" class="span4" value="<?php echo set_value("courseCode"); ?>"/>
									<span for="courseCode" class="help-inline"><?php echo form_error('courseCode'); ?></span>
								</div>
							</div><!--/ Course Code -->
							<!-- CourseCategory ID -->
							<?php
							$err = form_error('courseCategory_id');
							if ($err != '') {
								echo "<div class='control-group error'>";
							} else {
								echo "<div class='control-group'>";
							}
							?>

							<label class="control-label">Course Category ID<span class="required">*</span></label>
							<div class="controls">
								<select class="span4" name="courseCategory_id" id="courseCategory_id">
									<option value="">Select...</option>
									<?php
									foreach ($course_category as $key) {
										echo "<option value='{$key->courseCategoryId}'>{$key->courseCategoryName}</option>";
									}
									 ?>
									
										<label class="control-label">Material Total Books<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="total_books" id="total_books" class="span8" value="<?php echo set_value("total_books"); ?>"/>
											<span for="total_books" class="help-inline"><?php echo form_error('total_books'); ?></span>
										</div>
									</div><!--/ Course Material Total Books -->
									<!-- Course Description -->
											<?php
									$err=form_error('description');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									
										<label class="control-label">Description<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="description" id="description" class="span8" value="<?php echo set_value("description"); ?>"/>
											<span for="description" class="help-inline"><?php echo form_error('description'); ?></span>
										</div>
									</div><!--/ Course Description -->
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="submitCourse" id="submitCourse">
											Add Course
										</button>
											<a href="<?php echo base_url() . "admin/course"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
									</div><!--/ Form Action -->
								</div>
							</form>

									?>
								</select>
								<span for="courseCategory_id" class="help-inline"><?php echo form_error('courseCategory_id'); ?></span>
							</div>

						</div>
						<!--/ CourseCategory ID -->
						<!-- Course Name -->
						<?php
						$err = form_error('course_name');
						if ($err != '') {
							echo "<div class='control-group error'>";
						} else {
							echo "<div class='control-group'>";
						}
						?>

						<label class="control-label">Course Name<span class="required">*</span></label>
						<div class="controls">
							<input type="text" name="course_name" id="course_name" class="span8" value="<?php echo set_value("course_name"); ?>">
							<span for="course_name" class="help-inline"><?php echo form_error('course_name'); ?></span>
						</div>
					</div><!--/ Course Name -->
					<!-- Course Duration -->
					<?php
					$err = form_error('course_duration');
					if ($err != '') {
						echo "<div class='control-group error'>";
					} else {
						echo "<div class='control-group'>";
					}
					?>

					<label class="control-label">Course Duration<span class="required">*</span></label>
					<div class="controls">
						<input type="text" name="course_duration" id="course_duration" class="span8" value="<?php echo set_value("course_duration"); ?>"/>
						<span for="course_duration" class="help-inline"><?php echo form_error('course_duration'); ?></span>
					</div>
				</div><!--/ Course Duration -->
				<!-- Course Material Total Books -->
				<?php
				$err = form_error('total_books');
				if ($err != '') {
					echo "<div class='control-group error'>";
				} else {
					echo "<div class='control-group'>";
				}
				?>

				<label class="control-label">Material Total Books<span class="required">*</span></label>
				<div class="controls">
					<input type="text" name="total_books" id="total_books" class="span8" value="<?php echo set_value("total_books"); ?>"/>
					<span for="total_books" class="help-inline"><?php echo form_error('total_books'); ?></span>
				</div>
			</div><!--/ Course Material Total Books -->
			<!-- Course Description -->
			<?php
			$err = form_error('description');
			if ($err != '') {
				echo "<div class='control-group error'>";
			} else {
				echo "<div class='control-group'>";
			}
			?>

			<label class="control-label">Description<span class="required">*</span></label>
			<div class="controls">
				<input type="text" name="description" id="description" class="span8" value="<?php echo set_value("description"); ?>"/>
				<span for="description" class="help-inline"><?php echo form_error('description'); ?></span>
			</div>
		</div><!--/ Course Description -->
		<!-- course image -->
		
		 <label class="control-label">Select Avtar</label>
														<div class="controls">
															<div class="fileupload fileupload-new" data-provides="fileupload">
																<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																	<img src="" alt="" />
																</div>
																<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
																	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
																	
																</div>
																<div>
																	<span class="btn btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
																		<input type="file" id="course_avtar" name="course_avtar" class="default" />
																	</span>
																	<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
																</div>
															</div>
															<span class="label label-important">NOTE!</span>
															<span> Attach file should be less than 2MB and jpg, jpeg and png format. </span>
														</div>	
														</div>									
											
											
		<!-- / course image-->
		
		
		<!-- Form Action -->
		<div class="form-actions">
			<button type="submit" class="btn btn-primary" name="submitCourse" id="submitCourse">
				Add Course
			</button>
		</div><!--/ Form Action -->
	</div>
	</form>
	</div><!-- tab2 end -->
	<div class="tab-pane" id="tabView">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="viewtblBranch">
										<tr>
											<td style="text-align:center;"><img alt="" width="200px" height="200px" id="ViewCourseImage" /></td>
											<td>
												<table class="table table-striped table-bordered table-hover dataTable" id="viewtblBranch">
													<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Course Code</td>
														<td id="viewCourseCode"></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Course Name</td>
														<td id="viewCourseName"></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Course Category</td>
														<td id="viewCategory"></td>
												   </tr>
												   <tr>
														<td class="unstyled profile-nav span3">Course Duration</td>
														<td id="viewCourseDuration"></td>
												   </tr>
												   	<tr>
														<td class="unstyled profile-nav span3">Course Total Book</td>
														<td id="viewTotalBook"></td>
												   </tr>
												   	<tr>
														<td style='background:#f0f6fa' class="unstyled profile-nav span3">Description</td>
														<td id="viewDescription"></td>
												   </tr>
												 </table>
											</td>
										</tr>
									</table>
								</div>
							</div></div>
							</div>
								</div>
								<!--end row-fluid-->
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
