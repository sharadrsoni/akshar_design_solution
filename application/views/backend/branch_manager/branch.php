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
					Branch
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
					<h4>Branch <small>Maintain branch details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Branch">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Branches</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Branch</a>

						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblBranch">
										<thead>
											<tr>
												<th>Branch Name</th>
												<th class="hidden-480">Address</th>
												<th class="hidden-480">ContactNO</th>
												<th >Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($branch as $key) {
												echo "<tr class=\"odd gradeX\">
<td onclick='viewbranch(\"{$key->branchId}\");'>{$key->branchName}</td>
<td class=\"hidden-480\">{$key->branchStreet1}<br/> {$key->branchStreet2}<br/> {$key->branchCity} {$key->branchState} - {$key->branchPincode}</td>
<td class=\"hidden-480\">{$key->branchContactNumber}</td>
<<<<<<< HEAD
<td ><span class=\"label label-success\">Edit</span> <span class=\"label label-success\"><a href='" . base_url() . "branch_manager/delete_branch/{$key->branchId}'>Delete</a></span></td></tr>
";
=======
<td ><span class=\"label label-success\" onclick='updatebranch(\"{$key->branchId}\");'>Edit</span></td>
</tr>";
>>>>>>> upstream/master
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!--View Branch -->+
							
							<div class="form-horizontal form-view" style="display:none" id="ViewBatch">
								<h3> Branch View</h3>
								<h3 class="form-section">Branch Info</h3>
								<div class="row-fluid">
									<div class="span6 ">
										<div class="control-group">
											<label class="control-label" for="firstName">Branch Name:</label>
											<div class="controls">
												<span class="text" id="viewbranch_name"></span>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->

								<div class="row-fluid">
									<div class="span6 ">
										<div class="control-group">
											<label class="control-label" for="firstName">Contact No.:</label>
											<div class="controls">
												<span class="text" id="viewconatct_no"></span>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->

								<h3 class="form-section">Address</h3>
								<div class="row-fluid">
									<div class="span12 ">
										<div class="control-group">
											<label class="control-label">Street:</label>
											<div class="controls">
												<span class="text" id="viewstreet_1" ></span>
											</div>
										</div>
<<<<<<< HEAD
									</div><!--/ StateState -->
									<!-- Google Map LocationGoogle Map Location -->
									<h3 class="form-section">Google Map Location</h3>
									<div class="control-group">
										<label class="control-label">longitude & latitude</span></label>
										<div class="controls">
											<div class="span4">
												<input type="text" name="longitude " id="longitude" readonly class="span12"/>
=======
									</div>
								</div>
								<div class="row-fluid">
									<div class="span6 ">
										<div class="control-group">
											<label class="control-label">City:</label>
											<div class="controls">
												<label class="" id="viewcity"></label>
>>>>>>> upstream/master
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="span6">
										<div class="control-group">
											<label class="control-label">State:</label>
											<div class="controls">
												<span class="text" id="viewstate"></span>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row-fluid">
									<div class="span6 ">
										<div class="control-group">
											<label class="control-label">Post Code:</label>
											<div class="controls">
												<span class="text" id="viewpin_code"></span>
											</div>
										</div>
									</div>
									<!--/span-->

<<<<<<< HEAD
									<!-- Form Action -->
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="add_branch" id="add_branch">
											Add Branch
										</button>
										<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">
											Cancel
										</button>
									</div><!--/ Form Action -->
=======
>>>>>>> upstream/master
								</div>
							</div><!-- End View Branch -->
						</div>
						<div class="tab-pane" id="tab2">
							<?php
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_branch');
							echo form_open('admin/branch', $attributes);
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
								<h3 class="form-section">Branch Info.</h3>
								<!-- Branch Name -->
								<div class="control-group">
									<label class="control-label">Branch Name</label>
									<div class="controls">
										<input type="text" name="branch_name" id="branch_name" class="span8">
									</div>
								</div><!--/ Branch Name -->
								<!-- Contact no -->
								<div class="control-group">
									<label class="control-label">Conatact No</label>
									<div class="controls">
										<input type="text" name="conatct_no" id="conatct_no" class="span8">
									</div>
								</div><!--/ Contact no -->
								<h3 class="form-section">Address</h3>
								<!-- Street -->
								<div class="control-group">
									<label class="control-label">Street<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="street_1" id="street_1" class="span8"/>
									</div>

								</div>
								<div class="control-group">
									<label class="control-label"><span class="required"></span></label>
									<div class="controls">
										<input type="text" name="street_2" id="street_2" class="span8"/>
									</div>
								</div><!--/ Street -->
								<!-- State -->
								<div class="control-group">
									<label class="control-label">State/City<span class="required">*</span></label>
									<div class="controls">
										<div class="span4">
											<select class="span12" name="state" id="state">
												<option value="">Select...</option>
												<option value="Category 1">Category 1</option>
												<option value="Category 2">Category 2</option>
												<option value="Category 3">Category 5</option>
												<option value="Category 4">Category 4</option>
											</select>
										</div>
										<div class="span4">
											<select class="span12" name="city" id="city">
												<option value="">Select...</option>
												<option value="Category 1">Category 1</option>
												<option value="Category 2">Category 2</option>
												<option value="Category 3">Category 5</option>
												<option value="Category 4">Category 4</option>
											</select>
										</div>
									</div>
								</div><!--/ State -->
								<!-- Postal Code -->
								<div class="control-group">
									<label class="control-label">Postal Code<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="pin_code" id="pin_code" class="span8"/>
									</div>
								</div><!--/ Postal Code -->
								<!-- Google Map LocationGoogle Map Location -->
								<h3 class="form-section">Google Map Location</h3>
								<div class="control-group">
									<label class="control-label">longitude & latitude<span class="required">*</span></label>
									<div class="controls">
										<div class="span4">
											<input type="text" name="longitude" id="longitude" readonly class="span12"/>
										</div>
										<div class="span4">
											<input type="text" name="latitude" id="latitude" readonly class="span12"/>
										</div>
									</div>
								</div><!--/ Google Map Location -->
								<!--/ Google Map -->
								<div class="control-group">
									<label class="control-label"></label>
									<div class="controls">
										<div class="span8 widget red">
											<section class="body">
												<h3></h3>
												<input type="text" id="gmap_geocoding_address" style="margin-left: 10px" class="span9" placeholder="Address..." />
												<input type="button" name="loadmap" id="loadmap" value="Refresh Map" readonly class="span3"/>
												<h3></h3>
												<div id="gmap_geocoding" style="height: 300px;width:100%" class="gmaps"></div>
											</section>
										</div>
									</div>
								</div><!--/ Google Map -->
								<input type="hidden" name="branchId" id="branchId" value="" />
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" name="submitBranch" id="submitBranch" class="btn btn-primary">
										Add Branch
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