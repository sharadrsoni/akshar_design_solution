 <!-- START Template Main Content -->
            <section id="main">
                <!-- START Bootstrap Navbar -->
                <div class="navbar navbar-static-top">
                    <div class="navbar-inner">
                        <!-- Breadcrumb -->
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a> <span class="divider"></span></li>
                            <li class="active">Target Report</li>
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
                                <h4>Report A Target <small>This is the place where everything started</small></h4>
                            </div>
                        </div>
                        <!--/ END Page/Section header -->
                    </div>
                    <!--/ END Row -->
					<!--Page Content Here  -->
					<div id="Branch">	
		
						<!-- START Row -->
						<div class="row-fluid">
							<!-- START Form Validation - Inline -->
							
							<form class="modal container hide fade modal-overflow in form-horizontal span12 widget shadowed yellow" style="left:-10%;" aria-hidden="false" id="form_target_report">
								<header>
									<h4 class="title">Form Validation - Inline</h4>
									<ul class="nav nav-tabs nav-stacked pull-right">
										<li><a role="button" data-dismiss="modal" aria-hidden="true" href="#"><span class="icon icone-close"></span>close</a></li>
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
													<input type="text" name="date" id="date" class="m-wrap span7"><span class="add-on"><i class="icon-calendar"></i></span>
												</div>
											</div>
										</div><!--/ date -->
					
									
										
										<!-- Form Action -->
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Report</button>
											<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
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
									<h4 class="title"><span class="icon icone-crop"></span>Rich DataTable</h4>
									<!-- START Label/Badge -->
									<span class="label label-important">-21 Outdated Browser</span>
									<!--/ END Label/Badge -->
									<ul class="nav nav-tabs nav-stacked pull-right">
										<li><a role="button" data-toggle="modal" href="#form_target"><span class="icon icone-home"></span> Set Target</a></li>
									 </ul>
									<!-- START Button Group -->
									<div class="btn-group pull-right">
										<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">With Selected <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#">Option 1</a></li>
											<li><a href="#">Option 2</a></li>
											<li><a href="#">Option 3</a></li>
										</ul>
									</div>
									<!--/ END Button Group -->
								</header>
								<section class="body">
									<div class="body-inner">
										<div class="portlet-body">
											<table class="table table-striped table-bordered table-hover" id="tblTargetReport">
												<thead>
													<tr>
														<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" /></th>
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
														<td><input type="checkbox" class="checkboxes" value="1" /></td>
														<td>Branch Name</td>
														<td class="hidden-480"><a href="mailto:shuxer@gmail.com">Name of the target</a></td>
														<td class="hidden-480">12 jan 2012</td>
														<td class="hidden-480">14 jan 2012</td>
														<td class="center hidden-480"><a role="button" data-toggle="modal" href="#form_target_report"><span class="icon icone-home"></span> Report Target</a></td>
														<td ><span class="label label-success">Status</span></td>
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
            <!--/ END Template Main Content -->