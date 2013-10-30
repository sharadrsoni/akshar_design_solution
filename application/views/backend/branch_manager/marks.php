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
					Marks
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
					<h4>Marks <small>Maintain marks details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Marks">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Tests</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Marks</a>
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
												<ul class="nav nav-tabs nav-stacked pull-right">
													<li>
														<a role="button" data-toggle="modal" href="#form_marks"><span class="icon icone-home"></span> Add Marks of Student</a>
													</li>
												</ul></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<form class="form-horizontal span12 widget shadowed yellow" id="form_mark">
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
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

										<div class="control-group">
											<label class="control-label">Batch ID<span class="required">*</span></label>
											<div class="controls">
												<select class="span4" name="batch_id" id="batch_id">
													<option value="">Select...</option>
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
													<option value="Category 3">Category 5</option>
													<option value="Category 4">Category 4</option>
												</select>
											</div>
										</div>
										<!--/ Course -->
										<h3 class="form-section">Student Info</h3>
										<!-- LIst -->
										<div class="control-group">
											<table class="table table-striped table-bordered table-hover" id="obtainmarks">
												<thead>
													<tr>
													<tr>
														<th>Student ID</th>
														<th class="hidden-480">Obtained Marks </th>
													</tr>
												</thead>

												<tbody id="lst_batch_timing">
													<tr class="odd gradeX">
														<td> Student_ID XXX </td>
														<td>
														<input type="text" name="obtained_marks" id="obtained_marks" class="span2"/>
														</td>
													</tr>
												</tbody>
											</table>
										</div><!--/ List-->
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