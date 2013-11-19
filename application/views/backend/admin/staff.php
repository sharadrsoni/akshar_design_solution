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
					Staff
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
					<h4>Staff <small>Manage staff details over here.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Staff">
			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" id="tablink1" data-toggle="tab"><span class="icon icone-eraser"></span>Staff</a>
						</li>
						<li class="">
							<a href="#tab2" id="tablink2" data-toggle="tab"><span class="icon icone-pencil"></span> Add Staff</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover dataTable" id="tblStaff">
										<thead>
											<tr>
												<th>Branch Name</th>
												<th>Staff Name</th>
												<th class="hidden-480">Email</th>
												<th class="hidden-480">ContactNo</th>
												<th colspan="2">View</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($staff)) {
												foreach ($staff as $key) {
													echo "<tr class=\"odd gradeX\">
<td onclick='viewstaff(\"{$key->userId}\");'>{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</td>
<td class=\"center hidden-480\">{$key->userEmailAddress}</td>
<td class=\"center hidden-480\">{$key->userContactNumber}</td>
<td class=\"center hidden-480\">{$key->branchCode}</td>
<td ><span class=\"label label-success\" onclick='updatestaff(\"{$key->userId}\");' >Edit</span> <span class=\"label label-success\"> <a href='" . base_url() . "admin/delete_staff/{$key->userId}'>Delete</a></span></td></tr>
</tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_staff');
							echo form_open('admin/staff', $attributes);
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
								<h3 class="form-section">Staff Info.</h3>

								<!-- Branch -->
								<?php
								$err = form_error('branchCode');
								if ($err != '') {
									echo "<div class='control-group error'>";
								} else {
									echo "<div class='control-group'>";
								}
								?>

								<label class="control-label">Branch<span class="required">*</span></label>
								<div class="controls">
									<select class="span4" name="branchCode" id="branchCode">
										<option value="">Select...</option>
										<?php
										foreach ($branch_list as $key) {
											echo "<option value='{$key->branchCode}'>{$key->branchName}</option>";
										}
										?>
									</select>
									<span for="branchCode" class="help-inline"><?php echo form_error('branchCode'); ?></span>
								</div>
								<div class="controls note">
                                	<strong>Note!</strong> You can not Chage Branch after record insert.
                            	</div>
							</div>
							<!--/ Branch -->

							<!-- User Role -->
							<?php
							$err = form_error('userroleId');
							if ($err != '') {
								echo "<div class='control-group error'>";
							} else {
								echo "<div class='control-group'>";
							}
							?>

							<label class="control-label">User Role<span class="required">*</span></label>
							<div class="controls">
								<select class="span4" name="userroleId" id="userroleId" value="<?php echo set_value("first_name"); ?>">
									<option value="">Select...</option>
									<?php
									foreach ($userrole_list as $key) {
										echo "<option value='{$key->roleId}'>{$key->roleName}</option>";
									}
									?>
								</select>
								<span for="userroleId" class="help-inline"><?php echo form_error('userroleId'); ?></span>
							</div>
							<div class="controls note">
                                <strong>Note!</strong> You can not Chage User Role after record insert.
                            </div>
						</div>
						<!--/ User Role -->

						<!-- Staff Name -->
						<?php
						$err = form_error('first_name');
						if ($err != '') {
							echo "<div class='control-group error'>";
						} else {
							echo "<div class='control-group'>";
						}
						?>

						<label class="control-label">First Name</label>
						<div class="controls">
							<input type="text" name="first_name" id="first_name" class="span8" value="<?php echo set_value("first_name"); ?>">
							<span for="first_name" class="help-inline"><?php echo form_error('first_name'); ?></span>
						</div>
					</div>
					<?php
					$err = form_error('middle_name');
					if ($err != '') {
						echo "<div class='control-group error'>";
					} else {
						echo "<div class='control-group'>";
					}
					?>

					<label class="control-label">Middle Name</label>
					<div class="controls">
						<input type="text" name="middle_name" id="middle_name" class="span8" value="<?php echo set_value("middle_name"); ?>">
						<span for="middle_name" class="help-inline"><?php echo form_error('middle_name'); ?></span>
					</div>
				</div>
				<?php
				$err = form_error('last_name');
				if ($err != '') {
					echo "<div class='control-group error'>";
				} else {
					echo "<div class='control-group'>";
				}
				?>

				<label class="control-label">Last Name</label>
				<div class="controls">
					<input type="text" name="last_name" id="last_name" class="span8" value="<?php echo set_value("last_name"); ?>">
					<span for="last_name" class="help-inline"><?php echo form_error('last_name'); ?></span>
				</div>
			</div><!--/ Staff Name -->

			<!-- Contact Number -->
			<?php
			$err = form_error('contact_number');
			if ($err != '') {
				echo "<div class='control-group error'>";
			} else {
				echo "<div class='control-group'>";
			}
			?>

			<label class="control-label">Contact Number</label>
			<div class="controls">
				<input type="text" name="contact_number" id="contact_number" class="span8" value="<?php echo set_value("contact_number"); ?>">
				<span for="contact_number" class="help-inline"><?php echo form_error('contact_number'); ?></span>
			</div>
		</div><!--/ Contact Number -->

		<!-- Email -->
		<?php
		$err = form_error('email');
		if ($err != '') {
			echo "<div class='control-group error'>";
		} else {
			echo "<div class='control-group'>";
		}
		?>

		<label class="control-label">Email</label>
		<div class="controls">
			<input type="text" name="email" id="email" class="span8" value="<?php echo set_value("email"); ?>">
			<span for="email" class="help-inline"><?php echo form_error('email'); ?></span>
		</div>
	</div><!--/ Email -->

	<!-- Date Of Birth -->
	<?php
	$err = form_error('date_of_birth');
	if ($err != '') {
		echo "<div class='control-group error'>";
	} else {
		echo "<div class='control-group'>";
	}
	?>

	<label class="control-label">Date Of Birth<span class="required">*</span></label>
	<div class="controls">
		<div class="input-append span6" id="dob_datepicker">
			<input type="text" readonly="" name="date_of_birth" id="date_of_birth" class="m-wrap span7" value="<?php echo set_value("date_of_birth"); ?>">
			<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		<span for="date_of_birth" class="help-inline"><?php echo form_error('date_of_birth'); ?></span>
	</div>
	</div><!--/ Date Of Birth -->

	<!-- Qualification -->
	<?php
	$err = form_error('qualification');
	if ($err != '') {
		echo "<div class='control-group error'>";
	} else {
		echo "<div class='control-group'>";
	}
	?>

	<label class="control-label">Qualification</label>
	<div class="controls">
		<input type="text" name="qualification" id="qualification" class="span8" value="<?php echo set_value("qualification"); ?>">
		<span for="qualification" class="help-inline"><?php echo form_error('qualification'); ?></span>
	</div>
	</div><!--/ Qualification -->

	<h3 class="form-section">Address</h3>
	<!-- Street -->
	<?php
	$err = form_error('street_1');
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
	$err = form_error('street_2');
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
	$err = form_error('pin_code');
	if ($err != '') {
		echo "<div class='control-group error'>";
	} else {
		echo "<div class='control-group'>";
	}
	?>

	<label class="control-label">Postal Code<span class="required">*</span></label>
	<div class="controls">
		<input type="text" name="pin_code" id="pin_code" class="span4" value="<?php echo set_value("pin_code"); ?>"/>
		<span for="pin_code" class="help-inline"><?php echo form_error('pin_code'); ?></span>
	</div>
	</div><!--/ Postal Code -->
	<input type="hidden" name="staffId" id="staffId" value="" />
	<!-- Form Action -->
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"  name="submitStaff" id="submitStaff">
			Add Staff User
		</button>
	</div><!--/ Form Action -->
	</div>
	</form>
	</div>
			<div class="tab-pane" id="tabView">
		<div class="tab-content profile">
						<div class="tab-pane active" id="tab1">
							<ul class="unstyled profile-nav span3">
								<li><img id="ViewProfielImage" alt="" src="" />
								</li>
								<li id="viewUserID">
								
								</li>
								<li id="viewBranchName">
								</li>				
							</ul>
							<div class="span9">
								<div class="row-fluid">
									<div class="span8 profile-info">
										<div >
											<h4 id="viewUserName"></h4>
											<h4>Address</h4>
											<address >
												<p id="viewUserAddress"></p>
												<h5>Contact Number:</h5>
												<abbr id="viewUserContactNO" title="Phone"></abbr>
											</address>
											<strong>Email:</strong>
											<abbr id="viewUserEmail"></abbr>
										</div>
										<h4 id="viewUserName"></h4>						
										<ul class="unstyled inline">
											<li id="viewCityID">
											</li>
											<li id="viewUserDOB">
											</li>
											<li id="viewUserDOJ">
											</li>
										</ul>
									</div>
								</div>
								<!--end row-fluid-->
								<div style="display: none" class="tabbable tabbable-custom tabbable-custom-profile">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_1_11" data-toggle="tab">Batches</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1_11">
											<div class="portlet-body" style="display: block;">
												<table class="table table-striped table-bordered table-advance table-hover">
													<thead>
														<tr>
															<th><i class="icon-star"></i>Batch</th>
															<th class="hidden-phone"><i class="icon-question-sign"></i>Strength</th>
															<th><i class="icon-bookmark"></i> Course</th>
															<th><i class="icon-bookmark"></i> Performance</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><a href="#">Pixel Ltd</a></td>
															<td class="hidden-phone">Server hardware purchase</td>
															<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>
															<td class="hidden-phone">Server hardware purchase</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<!--tab-pane-->
									</div>	
								</div>
							</div>
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
