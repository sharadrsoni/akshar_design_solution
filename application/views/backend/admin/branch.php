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
<td onclick='viewbranch(\"{$key->branchCode}\");'>{$key->branchName}</td>
<td class=\"hidden-480\">{$key->branchStreet1}<br/> {$key->branchStreet2}<br/> {$key->cityId} {$key->stateId} - {$key->branchPincode}</td>
<td class=\"hidden-480\">{$key->branchContactNumber}</td>
<td ><span class=\"label label-success\" onclick='updatebranch(\"{$key->branchCode}\");'>Edit</span></td>
</tr>";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
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
								<!-- Branch Code -->
								<?php
									$err=form_error('branchCode');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Branch Code</label>
									<div class="controls">
										<input type="text" name="branchCode" id="branchCode" class="span8" value="<?php echo set_value("branchCode"); ?>">
										<span for="branchCode" class="help-inline"><?php echo form_error('branchCode'); ?></span>
									</div>
								</div><!--/ Branch Code -->
								<!-- Branch Name -->
								<?php
									$err=form_error('branch_name');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Branch Name</label>
									<div class="controls">
										<input type="text" name="branch_name" id="branch_name" class="span8" value="<?php echo set_value("branch_name"); ?>">
										<span for="branch_name" class="help-inline"><?php echo form_error('branch_name'); ?></span>
									</div>
								</div><!--/ Branch Name -->
								<!-- Contact no -->
								<?php
									$err=form_error('conatct_no');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Conatact No</label>
									<div class="controls">
										<input type="text" name="conatct_no" id="conatct_no" class="span8" value="<?php echo set_value("conatct_no"); ?>">
										<span for="conatct_no" class="help-inline"><?php echo form_error('conatct_no'); ?></span>
									</div>
								</div><!--/ Contact no -->
								<h3 class="form-section">Address</h3>
								<!-- Street -->
								<?php
									$err=form_error('street_1');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Street<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="street_1" id="street_1" placeholder="Street1" class="span8" value="<?php echo set_value("street_1"); ?>"/>
										<span for="street_1" class="help-inline"><?php echo form_error('street_1'); ?></span>
									</div>

								</div>
								<?php
									$err=form_error('street_2');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
							
									<label class="control-label"><span class="required"></span></label>
									<div class="controls">
										<input type="text" name="street_2" id="street_2" placeholder="Street2" class="span8" value="<?php echo set_value("street_2"); ?>"/>
										<span for="street_2" class="help-inline"><?php echo form_error('street_2'); ?></span>
									</div>
								</div><!--/ Street -->
								<!-- State -->
								<?php
									$err=form_error('stateid');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									<label class="control-label">State<span class="required">*</span></label>
									<div class="controls">
											<select class="span4 select2" name="stateid" id="stateid" value="<?php echo set_value("stateid"); ?>">
											<option value="">Select...</option>
												<?php
												foreach ($State as $key) {
													echo "<option value='{$key->stateId}'>{$key->stateName}</option>";
												}
												?>
											</select>
											<span for="state" class="help-inline"><?php echo form_error('stateid'); ?></span>
									</div>
								</div><!--/ State -->
								<!-- City -->
								<?php
									$err=form_error('cityid');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
									<label class="control-label">City<span class="required">*</span></label>
									<div class="controls">
											<select class="span4 select2" name="cityid" id="cityid" value="<?php echo set_value("cityid"); ?>">
												<option value="">Select...</option>
											</select>
											<span for="cityid" class="help-inline"><?php echo form_error('cityid'); ?></span>
									</div>
								</div><!--/ City -->
								<!-- Postal Code -->
								<?php
									$err=form_error('pin_code');
									if ($err != '') {
										echo "<div class='control-group error'>";
									} else {
										echo "<div class='control-group'>";
									}
									 ?>
								
									<label class="control-label">Postal Code<span class="required">*</span></label>
									<div class="controls">
										<input type="text" name="pin_code" id="pin_code" class="span8" value="<?php echo set_value("pin_code"); ?>"/>
										<span for="pin_code" class="help-inline"><?php echo form_error('pin_code'); ?></span>
									</div>
								</div><!--/ Postal Code -->
								<!-- Google Map LocationGoogle Map Location -->
								<h3 class="form-section">Google Map Location</h3>
								<div class="control-group">
									<label class="control-label">longitude &amp; latitude<span class="required">*</span></label>
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
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" name="submitBranch" id="submitBranch" class="btn btn-primary">
										Add Branch
									</button>
								</div><!--/ Form Action -->
							</div>
							</form>
						</div>
						<div class="tab-pane" id="tabView">
							<div class="row-fluid">
									<div class="span8 profile-info">

										
										<div class="">
											<h4>Sharad R Soni</h4>
											<h4>Address</h4>
											<address>
												
												Jawahar Chowk												<br>
												Maninagar												
												<br>
												308-380008												
												<br>
												11												
												<br>
											
												<abbr title="Phone">P:</abbr> 9601591389											</address>
											<address>
												<strong>Email</strong>
												<br>
												<a href="mailto:#">sharadrsoni@gmail.com</a>
											</address>
										</div>

										<ul class="unstyled inline">
											<li>
												<i class="icon-map-marker"></i> 308											</li>
											<li>
												<i class="icon-calendar"></i>1991-02-15											</li>
										</ul>
									</div>
									<!--end span8-->
									<div class="span4">
										<div class="portlet sale-summary">
											<div class="portlet-body">
												<ul class="unstyled">
													<li>
														<span class="sale-info">Performance<i class="icon-img-down"></i></span>
														<span class="sale-num">84%</span>
													</li>
													<li>
														<span class="sale-info"><i class="icon-img-down"></i></span>
														<span class="sale-num"></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!--end span4-->
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