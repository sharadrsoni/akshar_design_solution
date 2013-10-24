<!-- by dips -->
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
					Batch
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
					<h4>Batch <small>Maintain batch details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Batch">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Form Validation - Inline -->

				<form class="modal container hide fade modal-overflow in form-horizontal span12 widget shadowed yellow" style="left:-10%;" aria-hidden="false" id="form_batch">
					<header>
						<h4 class="title">Add Batch</h4>
						<ul class="nav nav-tabs nav-stacked pull-right">
							<li>
								<a role="button" data-dismiss="modal" aria-hidden="true" href="#"><span class="icon icone-close"></span>close</a>
							</li>
						</ul>

					</header>
					<section class="body" >
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
							<!-- Branch -->
							<!--div class="control-group">
							<label class="control-label">Branch<span class="required">*</span></label>
							<div class="controls">
							<select class="span4" name="branch_id" id="branch_id">
							<option value="">Select...</option>
							<option value="Category 1">Category 1</option>
							<option value="Category 2">Category 2</option>
							<option value="Category 3">Category 5</option>
							<option value="Category 4">Category 4</option>
							</select>
							</div>
							</div><!--/ Branch -->

							<!-- Course -->
							<div class="control-group">
								<label class="control-label">Course<span class="required">*</span></label>
								<div class="controls">
									<select class="span4" name="course_id" id="course_id">
										<option value="">Select...</option>
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div><!--/ Course -->

							<!-- Faculty -->
							<div class="control-group">
								<label class="control-label">Faculty<span class="required">*</span></label>
								<div class="controls">
									<select class="span4" name="faculty_id" id="faculty_id">
										<option value="">Select...</option>
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div><!--/ Faculty -->

							<!-- Start Date -->
							<div class="control-group">
								<label class="control-label">Start Date<span class="required">*</span></label>
								<div class="controls">
									<div class="input-append span6" id="start_date_datepicker">
										<input type="text" name="start_date" id="start_date" class="m-wrap span7">
										<span class="add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							</div><!--/ Start Date -->

							<!-- Strength -->
							<div class="control-group">
								<label class="control-label">Strength<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="strength" id="strength" class="span2"/>
								</div>
							</div><!--/ Strength-->

							<h3 class="form-section">Batch Timing</h3>

							<!-- weekday -->
							<div class="control-group">
								<label class="control-label">weekday<span class="required">*</span></label>
								<div class="controls">
									<select class="span4" name="weekday" id="weekday">
										<option value="">Select...</option>
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div><!--/ weekday -->

							<!-- Batch Time -->
							<div class="control-group">
								<label class="control-label">Batch Time<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="start_time" id="start_time" value="2:30 PM" data-format="hh:mm A" class="m-wrap small clockface_1" />
									<span class="help-inline">To &nbsp;</span>
									<input type="text" name="end_time" id="end_time" value="2:30 PM" data-format="hh:mm A" class="m-wrap small clockface_1" />
								</div>
							</div><!--/ Batch Time -->

							<div class="control-group">
								<label class="control-label"></label>
								<div class="controls">
									<button type="button" class="btn green span4">
										Success
									</button>
									<div class="span8"></div>
								</div>
							</div>

							<h3 class="form-section">List of Time Schedule</h3>

							<!-- LIst -->
							<div class="control-group">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th style="width:8px;">
											<input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" />
											</th>
											<th>EventDate</th>
											<th class="hidden-480">Weekday</th>
											<th class="hidden-480">Start Time</th>
											<th class="hidden-480">End Time</th>
											<th class="hidden-480">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr class="odd gradeX">
											<td>
											<input type="checkbox" class="checkboxes" value="1" />
											</td>
											<td>shuxer</td>
											<td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>
											<td class="hidden-480">120</td>
											<td class="hidden-480"></td>
											
											<td ><span class="label label-success">Approved</span></td>
										</tr>
									</tbody>
								</table>
							</div><!--/ List-->

							<!-- Form Action -->
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div><!--/ Form Action -->
						</div>
					</section>
				</form>
				<!--/ END Form Validation - Inline -->
			</div>
			<!--/ END Row -->

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Datatable 2 -->
				<div class="span12 widget lime">
					<header>
						<h4 class="title"><span class="icon icone-crop"></span>List of batches</h4>
						<!-- START Label/Badge -->
						<!--<span class="label label-important">-21 Outdated Browser</span>-->
						<!--/ END Label/Badge -->
						<ul class="nav nav-tabs nav-stacked pull-right">
							<li>
								<a role="button" data-toggle="modal" href="#form_batch"><span class="icon icone-home"></span> Add Batch</a>
							</li>
						</ul>
						<!-- START Button Group -->
						<!--<div class="btn-group pull-right">
							<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								With Selected <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Option 1</a>
								</li>
								<li>
									<a href="#">Option 2</a>
								</li>
								<li>
									<a href="#">Option 3</a>
								</li>
							</ul>
						</div>-->
						<!--/ END Button Group -->
					</header>
					<section class="body">
						<div class="body-inner">
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="tblBatch">
									<thead>
										<tr>
											<th style="width:8px;">
											<input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" />
											</th>
											<th>Batch Name</th>
											<th class="hidden-480">Weekdays</th>
											<th class="hidden-480">Time</th>
											<th class="hidden-480">Course</th>
											<th class="hidden-480">Faculty</th>
											<th >View</th>
										</tr>
									</thead>
									<tbody>
										<tr class="odd gradeX">
											<td>
											<input type="checkbox" class="checkboxes" value="1" />
											</td>
											<td>shuxer</td>
											<td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>
											<td class="hidden-480">120</td>
											<td class="hidden-480"></td>
											<td class="center hidden-480">12 Jan 2012</td>
											<td ><span class="label label-success">Approved</span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
				<!--/ END Datatable 2 -->
			</div>
			<!--/ END Row -->
		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>