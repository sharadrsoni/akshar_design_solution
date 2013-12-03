<!-- START Template Main Content -->
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
					Test
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
					<h4>Test <small>Add Test for Batch</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Test">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tab1link" data-toggle="tab"><span class="icon icone-eraser"></span>Tests</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Test</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tbltest">
										<thead>
											<tr>
												<th>Test ID</th>
												<th class="hidden-480">Test Name</th>
												<th class="hidden-480">Test Date</th>
												<th class="hidden-480">Maximum Marks</th>
												<th >Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($test_list)) {
												foreach ($test_list as $key) {
													echo "<tr class=\"odd gradeX\">
<td class=\"hidden-480\">{$key->testId} </td>
<td class=\"hidden-480\">{$key->testName} </td>
<td class=\"hidden-480\">{$key->testDate}</td>
<td class=\"hidden-480\">{$key->testMaximumMarks}
<td><a href=\"#tab3\" class=\"tab3link\" data-test_id=\"{$key->testId}\" data-toggle=\"tab\"></span> Add Marks</a>
<a href=\"#tab4\" class=\"tab4link\" data-test_id=\"{$key->testId}\"  data-toggle=\"tab\">View Marks</a></td>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_test');
							echo form_open('faculty/test', $attributes);
							?>
							<!-- <form class="form-horizontal span12 widget shadowed yellow" id="form_test">!-->
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
							<div class="body-inner">
								<h3 class="form-section">Batch Info</h3>
								<!-- Batch ID -->
								<?php
								$err = form_error('batch_id');
								if ($err != '') {
									echo "<div class='control-group error'>";
								} else {
									echo "<div class='control-group'>";
								}
								?>

								<label class="control-label">Batch ID<span class="required"><font color='red'>*</font></span></label>
								<div class="controls">

									<select class="span4" name="batch_id" id="batch_id" value="<?php echo set_value("batch_id"); ?>">
										<option value="">Select...</option>
										<?php
										foreach ($batch_list as $key) {
											echo "<option value='{$key->batchId}'>{$key->batchId}</option>";
										}
										?>
									</select>
									<span for="batch_id" class="help-inline"><?php echo form_error('batch_id'); ?></span>
								</div>
							</div><!--/ Batch ID -->
							<h3 class="form-section">Test Info</h3>
							<!-- Start Date -->
							<?php
							$err = form_error('test_date');
							if ($err != '') {
								echo "<div class='control-group error'>";
							} else {
								echo "<div class='control-group'>";
							}
							?>

							<label class="control-label">Test Date<span class="required"><font color='red'>*</font></span></label>
							<div class="controls">
								<div class="input-append span4" id="test_date_datepicker">
									<input type="text" name="test_date" id="test_date" class="m-wrap" value="<?php echo set_value("test_date"); ?>">
									<span for="test_date" class="help-inline"><?php echo form_error('test_date'); ?><
										/span> <span class="add-on"><i class="icon-calendar"></i></span>
								</div>
							</div>
						</div><!--/ Start Date -->
						<?php
						$err = form_error('test_marks');
						if ($err != '') {
							echo "<div class='control-group error'>";
						} else {
							echo "<div class='control-group'>";
						}
						?>
						<label class="control-label">Test Marks<span class="required"><font color='red'>*</font></span></label>
						<div class="controls">
							<input type="text" name="test_marks" id="test_marks" class="span4" value="<?php echo set_value("test_marks"); ?>">
							<span for="test_marks" class="help-inline"><?php echo form_error('test_marks'); ?></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Test Name<span class="required"><font color='red'>*</font></span></label>
						<div class="controls">
							<input type="text" name="test_name" id="test_name" class="span4">
						</div>
					</div>
					<!-- Form Action -->
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="submitTest" id="submitTest">
							Add Test
						</button>
						<a href="<?php echo base_url() . "faculty/test"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
					</div><!--/ Form Action -->
				</div>
				</form>
			</div>
			<div class="tab-pane" id="tab3">
				<?php
				$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_mark');
				echo form_open('faculty/test', $attributes);
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
					<h3 class="form-section">Student Info</h3>
					<!-- LIst -->
					<div class="control-group">
						<table class="table table-striped table-bordered table-hover" id="obtainmarks">
							<thead>
								<tr>
								<tr>
									<th class="hidden-480">Student ID</th>
									<th class="hidden-480">Obtained Marks </th>
								</tr>
							</thead>

							<tbody id="lst_students">
								
							</tbody>
						</table>
					</div><!--/ List-->
					<!-- Form Action -->
						<?php
						$err = form_error('test_remarks');
						if ($err != '') {
							echo "<div class='control-group error'>";
						} else {
							echo "<div class='control-group'>";
						}
						?>
						<label class="control-label">Test Remarks</label>
						<div class="controls">
							<input type="text" name="test_remarks" id="test_remarks" class="span8" value="<?php echo set_value("test_remarks"); ?>">
							<span for="test_remarks" class="help-inline"><?php echo form_error('test_remarks'); ?></span>
						</div>
					</div>
					<input type="hidden" name="testId" id="testId" value=""/>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="submitTestMarks" id="submitTestMarks">
							Save Test Marks
						</button>
						<a href="<?php echo base_url() . "faculty/test"; ?>" name="cancel" id="cancel" class="btn btn-primary" >Cancel</a>
					</div><!--/ Form Action -->
				</div>
				</form>
			</div>
			<div class="tab-pane" id="tab4">
				<table class="table table-striped table-bordered table-hover" id="obtainmarks">
					<thead>
						<tr>
						<tr>
							<th class="hidden-480">Student ID</th>
							<th class="hidden-480">Obtained Marks </th>
						</tr>
					</thead>

					<tbody id="lst_students_view"></tbody>
				</table>
			</div>
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
<!--/ END Template Main Content -->