<section id="main">
	<!-- START Bootstrap Navbar -->
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<!-- Breadcrumb -->
			<ul class="breadcrumb page-title">
				<li>
					<a href="#">Dashboard</a><span class="divider"></span>
				</li>
				<li class="active">
					Fess Payment
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
					<h4>Student Fees <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="FeesPayment">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- Start Tabs -->
				<div class="tabbable" style="margin-bottom: 25px;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Fess Details</a>
						</li>
						<li class="">
							<a href="#tab2" data-toggle="tab"><span class="icon icone-pencil"></span>Create Fees Receipt</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="body-inner">
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="tblfeespyament">
										<thead>
											<tr>
												<th class="hidden-480">Student Name</th>
												<th class="hidden-480">Amount</th>
												<th class="hidden-480">Date</th>
												<th class="hidden-480">Mode</th>
												<th class="hidden-480">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
if (isset($fee_list)) {
foreach ($fee_list as $key) {
echo "
<td class=\"hidden-480\">{$key->userFirstName}{$key->userMiddleName}{$key->userLastName}</td>
<td class=\"hidden-480\">{$key->feesAmount}</td>
<td class=\"hidden-480\">{$key->feesDate}</td>";

if ($key->feesMode == 1)
echo "<td class=\"hidden-480\">Cheque</td>";
else
echo "<td class=\"hidden-480\">Cash</td>";

echo "<td ><span class=\"label label-success\"><a href='" . base_url() . "branch_manager_counsellor/fees_receipt/{$key->feesId}'>View</span> <span class=\"label label-success\"><a href='" . base_url() . "branch_manager_counsellor/delete_fees/{$key->feesId}'>Delete</span></td></tr>
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
							$attributes = array('class' => 'form-horizontal span12 widget shadowed yellow', 'id' => 'form_fees_payment');
							echo form_open('branch_manager/fees_payment', $attributes);
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
								<h4 class="form-section">Payment Info</h4>
								<!-- Student -->
								<div class="control-group">
									<label class="control-label">Select Student<span class="required">*</span></label>
									<div class="controls">
										<select name="studentid" id="studentid" class="span6">
											<option value="">Select</option>
											<?php
											foreach ($student as $key) {
												echo "<option value='{$key->userId}'>{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</option>";
											}
											?>
										</select>
									</div>
								</div><!-- /Student -->
								<!-- Payment Mode -->
								<div class="control-group">
									<label class="control-label">Payment Mode<span class="required">*</span></label>
									<div class="controls">
										<div class="switch" data-on="info" data-off="success" data-on-label="Cheque" data-off-label="Cash">
											<input name="paymemt_mode" id="paymemt_mode" type="checkbox" class="toggle"/>
										</div>
									</div>
								</div><!-- /Payment Mode -->
								<!-- Payment Date -->
								<div class="control-group">
									<label class="control-label">Payment Date<span class="required">*</span></label>
									<div class="controls">
										<div class="input-append span6" id="payment_date_datepicker">
											<input type="text" readonly="" name="payment_date" id="payment_date" class="m-wrap span7">
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									</div>
								</div><!--/ Payment Date-->

								<!-- cheque details -->
								<div id="cheque_details" style="display:none">
									<h4 class="form-section">Cheque Details</h4>
									<!-- Cheque Number -->
									<div class="control-group">
										<label class="control-label">Cheque Number<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="cheque_number" id="cheque_number" placeholder="" class="m-wrap">
											<span class="help-inline"></span>
										</div>
									</div><!-- /Cheque Number -->
									<!-- SCheque Issue Date -->
									<div class="control-group">
										<label class="control-label">Cheque Issue Date<span class="required">*</span></label>
										<div class="controls">
											<div class="input-append span6" id="cheque_issue_datepicker">
												<input type="text" readonly="" name="cheque_issue_date" id="cheque_issue_date" class="m-wrap span7">
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div><!--/ Cheque Issue Date -->
									<!-- Bank name -->
									<div class="control-group">
										<label class="control-label">Bank name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="bankname" name="bankname" placeholder="" class="m-wrap">
											<span class="help-inline"></span>
										</div>
									</div><!-- /Bank name -->
									<!-- Banch Name -->
									<div class="control-group">
										<label class="control-label">Banch Name of Bank<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="branchname" id="branchname" placeholder="" class="m-wrap">
											<span class="help-inline"></span>
										</div>
									</div><!-- /Banch Name -->
									<!-- IFSC Code -->
									<div class="control-group">
										<label class="control-label">IFSC Code<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="ifrc_code" is="ifrc_code" placeholder="" class="m-wrap">
											<span class="help-inline"></span>
										</div>
									</div><!-- /IFSC Code -->
								</div>
								<h4 class="form-section">Payment Details</h4>
								<!-- Course -->
								<div class="control-group">
									<label class="control-label">Course<span class="required">*</span></label>
									<div class="controls">
										<select name="course" id="course" class="span6 ">
											<option value="null">Select</option>
										</select>
									</div>
								</div><!-- /Course -->
								<!-- Amount -->
								<div class="control-group">
									<label class="control-label">Amount<span class="required">*</span></label>
									<div class="controls">
										<input type="text" placeholder="" class="m-wrap" name="course_amount" id="course_amount">
										<span class="help-inline"></span>
									</div>
								</div><!-- /Amount -->
								<!-- Add -->
								<div class="control-group">
									<label class="control-label"></label>
									<div class="controls">
										<button type="button" name="add_payment_details" id="add_payment_details" class="btn purple-stripe">
											Add Payment Details
										</button>
									</div>
								</div><!-- /Add -->

								<!-- LIst -->
								<div class="control-group">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden-480">Course</th>
												<th class="hidden-480">Amount</th>
												<th class="hidden-480">Action</th>
											</tr>
										</thead>
										<tbody id="lst_Payment_Details">

										</tbody>
									</table>
								</div><!--/ List-->
								<!-- Amount -->
								<div class="control-group">
									<label class="control-label"><span class="required"></span></label>
									<div class="controls pull-right">
										<div class="input-append flot-right" id="feeRemaining">
										</div>
									</div>
								</div><!-- /Amount -->
								<!-- Form Action -->
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" id="submitPayment" name="submitPayment">
										Save
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
