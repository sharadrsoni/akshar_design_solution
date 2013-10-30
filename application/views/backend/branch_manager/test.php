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
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Tests</a>
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
												<th class="hidden-480">Branch Name</th>
												<th class="hidden-480">Test Date</th>
												<th class="hidden-480">Maximum Marks</th>
												<th >Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>TXXX</td>
												<td>33/33/3333</td>
												<td>XXX</td>
												<td>
												/td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<form class="form-horizontal span12 widget shadowed yellow" id="form_test">
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
									<div class="control-group">
										<label class="control-label">Batch ID<span class="required">*</span></label>
										<div class="controls">
											<div class="span4">
												<select class="span12" name="batch_id" id="batch_id">
													<option value="">Select...</option>
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
													<option value="Category 3">Category 5</option>
													<option value="Category 4">Category 4</option>
												</select>
											</div>
										</div>
									</div><!--/ Batch ID -->
									<h3 class="form-section">Test Info</h3>
									<!-- Start Date -->
									<div class="control-group">
										<label class="control-label">Test Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="test_date_datepicker">
												<input type="text" name="test_date" id="test_date" class="m-wrap span7">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div><!--/ Start Date -->
									<div class="control-group">
										<label class="control-label">Test Marks</label>
										<div class="controls">
											<input type="text" name="test_marks" id="test_marks" class="span8">
										</div>
									</div>
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">
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
<!--/ END Template Main Content -->