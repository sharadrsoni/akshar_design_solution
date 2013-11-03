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
					Target Report
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
					<h4>Target Report<small>Create reports about targets over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Target_Reports">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tab1link"  data-toggle="tab"><span class="icon icone-eraser"></span>Target Reports</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblTargetReport">
										<thead>
											<tr>
												<th style="width:8px;">
												<input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" />
												</th>
												<th>Branch</th>
												<th class="hidden-480">Target Name</th>
												<th class="hidden-480">Start Date</th>
												<th class="hidden-480">End Date</th>

												<th >View</th>
												<th> Status</th>
											</tr>
										</thead>
										<tbody>
											<tr class="odd gradeX">
												<td>
												<input type="checkbox" class="checkboxes" value="1" />
												</td>
												<td>Branch Name</td>
												<td class="hidden-480"><a href="mailto:shuxer@gmail.com">Name of the target</a></td>
												<td class="hidden-480">12 jan 2012</td>
												<td class="hidden-480">14 jan 2012</td>
												<td class="center hidden-480"><a href="#tab2" id="tab2link" data-toggle="tab"><span class="icon icone-pencil"></span> Add Target Report</a></td>
												<td ><span class="label label-success">Status</span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<form class="form-horizontal span12 widget yellow" id="form_target_report">
								<div class="alert alert-error hide">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success hide">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>

								<div class="body-inner">
									<h3 class="form-section">Target Report </h3>

									<!-- Description -->
									<div class="control-group">
										<label class="control-label">Description<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="description" id="description" class="span8" row=3/>
										</div>
									</div>
									<!--/ Description	 -->
									<!-- date -->
									<div class="control-group">
										<label class="control-label">Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="date_datepicker">
												<input type="text" name="date" id="date" class="m-wrap span7">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div><!--/ date -->
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