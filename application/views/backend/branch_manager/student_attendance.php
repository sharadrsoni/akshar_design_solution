
         <!-- START Template Main Content -->
            <section id="main">
                <!-- START Bootstrap Navbar -->
                <div class="navbar navbar-static-top">
                    <div class="navbar-inner">
                        <!-- Breadcrumb -->
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a> <span class="divider"></span></li>
                            <li class="active">Student Attendance</li>
                        </ul>
                        <!--/ Breadcrumb -->

                        <!-- Daterange Picker -->
                        <div id="reportrange" class="pull-right hidden-phone">
                            <span class="icon icon-calendar"></span>
                            <span id="rangedate">June 7, 2013 - June 13, 2013</span><span class="caret"></span>
                        </div>
                        <!--/ Daterange Picker -->
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
                                <h4>Attendance <small>Manage Attendance of Student</small></h4>
                            </div>
                        </div>
                        <!--/ END Page/Section header -->
                    </div>
                    <!--/ END Row -->
					<!--Page Content Here  -->
					<div id="Attendance">
						 <!-- START Row -->
						<div class="row-fluid">
							<!-- START Form Validation - Inline -->
							<form class="form-horizontal span12 widget shadowed brown bordered" id="form_attendance">
								<header><h4 class="title">Student Attendance Information</h4></header>
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
																			
									<h3 class="form-section">Student Info</h3>
										<!-- START Row -->
			<div class="row-fluid">
				<!-- START Datatable 2 -->
				<div class="span12 widget lime">
					<header>
						<h4 class="title"><span class="icon icone-crop"></span>Student Data</h4>
					
					</header>
					<section class="body">
						<div class="body-inner">
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="attendance">
									<thead>
										<tr>
										<tr>
											<th>Student ID</th>
											<th class="hidden-480">Present/Absent 	<input type="checkbox" class="group-checkable" data-set="#attendance .checkboxes" /></th>
										</tr>
									</thead>
									<tbody>
									<tr class="odd gradeX">
											<td>
											Student_ID XXX
											</td>
											<td>	<input type="checkbox" class="checkboxes" value="1" /></td>
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
									<!-- Form Action -->
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Add Attendance</button>
											<button type="button" class="btn">Cancel</button>
										</div><!--/ Form Action -->
									</div>
								</section>
							</form>
							<!--/ END Form Validation - Inline -->
						</div>
						<!--/ END Row -->
						
					
					
					</div>
					<!--Page Content End  -->
                </div>
                <!--/ END Content -->
            </section>
            <!--/ END Template Main Content -->
