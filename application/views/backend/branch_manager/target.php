  <section id="main">
                <!-- START Bootstrap Navbar -->
                <div class="navbar navbar-static-top">
                    <div class="navbar-inner">
                        <!-- Breadcrumb -->
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a> <span class="divider"></span></li>
                            <li class="active">Target</li>
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
                                <h4>Target <small>Maintain Event details over here</small></h4>
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
							
							<form class="modal container hide fade modal-overflow in form-horizontal span12 widget shadowed yellow" style="left:-10%;" aria-hidden="false" id="form_target">
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
										<h3 class="form-section">Target Info </h3>
										<!-- Branch Name -->
										<div class="control-group">
											<label class="control-label">Branch<span class="required">*</span></label>
											<div class="controls">
												<select class="span4" name="branch" id="branch">
													<option value="">Select...</option>
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
													<option value="Category 3">Category 5</option>
													<option value="Category 4">Category 4</option>
												</select>
											</div>
										</div><!--/ Branch Name -->
										
										<!-- Target Name-->
										<div class="control-group">
											<label class="control-label">Target Name<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="target_name" id="target_name" class="span8"/>
											</div>
										</div><!--/ Target Name	 -->
										
										<!-- Targer Type -->
										<div class="control-group">
											<label class="control-label">Target Type<span class="required">*</span></label>
											<div class="controls">
												<select class="span4" name="target_type" id="target_type">
													<option value="">Select...</option>
													<option value="Category 1">Category 1</option>
													<option value="Category 2">Category 2</option>
													<option value="Category 3">Category 5</option>
													<option value="Category 4">Category 4</option>
												</select>
											</div>
										</div><!--/ Target Type -->
										
										
										<!-- Start Date -->
										<div class="control-group">
											<label class="control-label">Start Date<span class="required">*</span></label>
											<div class="controls">
												<div class="input-append span6" id="start_date_datepicker">
													<input type="text" name="start_date" id="start_date" class="m-wrap span7"><span class="add-on"><i class="icon-calendar"></i></span>
												</div>
											</div>
										</div><!--/ Start Date -->
										
										<!-- End Date -->
										<div class="control-group">
											<label class="control-label">End Date<span class="required">*</span></label>
											<div class="controls">
												<div class="input-append span6" id="end_date_datepicker">
													<input type="text" name="end_date" id="end_date" class="m-wrap span7"><span class="add-on"><i class="icon-calendar"></i></span>
												</div>
											</div>
										</div><!--/ End Date -->
										
										<!-- Description -->
										<div class="control-group">
											<label class="control-label">Description<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="description" id="description" class="span8"/>
											</div>
										</div><!--/ Description	 -->

										
										<!-- Form Action -->
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Register</button>
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
									<h4 class="title"><span class="icon icone-crop"></span>Target List</h4>
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
											<table class="table table-striped table-bordered table-hover" id="tblTarget">
												<thead>
													<tr>
														<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" /></th>
														<th class="hidden-480">Target Name</th>
														<th class="hidden-480">Start Date</th>
														<th class="hidden-480">End Date</th>
														<th class="hidden-480">Target Status</th>
														<th class="hidden-480">Target Type</th>
														<th >View</th>
													</tr>
												</thead>
												<tbody>
										<?php
										if (isset($target_list)) {
											foreach ($target_list as $key) {
												echo "<tr class=\"odd gradeX\"><td>
<input type=\"checkbox\" class=\"checkboxes\" value=\"1\" />
</td>
<td class=\"hidden-480\">{$key->targetName}</td>
<td class=\"hidden-480\">{$key->targetStartDate}</td>
<td class=\"hidden-480\">{$key->targetEndDate}</td>
<td class=\"hidden-480\">{$key->targetIsAchieved}</td>
<td class=\"hidden-480\">{$key->targetName}</td>
<td ><span class=\"label label-success\">Edit</span> <span class=\"label label-success\"><a href='" . base_url() ."branch_manager/delete_taget/{$key->targetId}'>Delete</span></td></tr>
";
											}
										}
										?>
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
