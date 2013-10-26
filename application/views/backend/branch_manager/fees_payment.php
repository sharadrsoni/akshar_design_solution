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
				<!-- START Form Validation - Inline -->

				<form class="modal container hide fade modal-overflow in form-horizontal span12 widget shadowed yellow" style="left:-10%;" aria-hidden="false" id="form_fees_payment">
					<header>
						<h4 class="title">Form Validation - Inline</h4>
						<ul class="nav nav-tabs nav-stacked pull-right">
							<li>
								<a role="button" data-dismiss="modal" aria-hidden="true" href="#"><span class="icon icone-close"></span>close</a>
							</li>
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
							<h4 class="form-section">Payment Info</h4>
							<!-- Student -->
							<div class="control-group">
								<label class="control-label">Select Student<span class="required">*</span></label>
								<div class="controls">
									<select name="studentid" id="studentid" class="span6">
										<option value="">Select</option>
										<option value="EH">Western Sahara</option>
										<option value="YE">Yemen</option>
										<option value="ZM">Zambia</option>
										<option value="ZW">Zimbabwe</option>
									</select>
								</div>
							</div><!-- /Student -->
							<!-- Payment Mode -->
							<div class="control-group">
								<label class="control-label">Payment Mode<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="paymemt_mode" id="paymemt_mode" class="span6 m-wrap" >
									<span class="help-inline"></span>
								</div>
							</div><!-- /Payment Mode -->
							<!-- Amount -->
							<div class="control-group">
								<label class="control-label">Total Amount<span class="required">*</span></label>
								<div class="controls">
									<div class="input-append">
										<input type="text" name="total_amount" id="total_amount" class="span6 m-wrap">
										<span class="add-on">Rs 2300 /-</span>
									</div>
								</div>
							</div><!-- /Amount -->
							<!-- Payment Date -->
							<div class="control-group">
								<label class="control-label">Payment Date<span class="required">*</span></label>
								<div class="controls">
									<div class="input-append span6" id="payment_date_datepicker">
										<input type="text" name="payment_date" id="payment_date" class="m-wrap span7">
										<span class="add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							</div><!--/ Payment Date-->

							<!-- cheque details -->
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
										<input type="text" name="cheque_issue_date" id="cheque_issue_date" class="m-wrap span7">
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
							<h4 class="form-section">Payment Details</h4>
							<!-- Course -->
							<div class="control-group">
								<label class="control-label">Course<span class="required">*</span></label>
								<div class="controls">
									<select name="country" id="" class="span6 ">
										<option value="">Select</option>
										<option value="EH">Western Sahara</option>
										<option value="YE">Yemen</option>
										<option value="ZM">Zambia</option>
										<option value="ZW">Zimbabwe</option>
									</select>
								</div>
							</div><!-- /Course -->
							<!-- Amount -->
							<div class="control-group">
								<label class="control-label">Amount<span class="required">*</span></label>
								<div class="controls">
									<input type="text" placeholder="" class="m-wrap" name="card_cvc">
									<span class="help-inline"></span>
								</div>
							</div><!-- /Amount -->
							<!-- Add -->
							<div class="control-group">
								<label class="control-label"></label>
								<div class="controls">
									<button type="button" class="btn purple-stripe">
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

							<!-- Add -->
							<div class="form-actions clearfix">
								<button type="submit" class="btn purple-stripe">
									Course Register
								</button>
							</div><!-- Add -->
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
							<li>
								<a role="button" data-toggle="modal" href="#form_fees_payment"><span class="icon icone-home"></span> Add Event</a>
							</li>
						</ul>
						<!-- START Button Group -->
						<div class="btn-group pull-right">
							<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								With Selected <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Option 1</a>
								</li>
								<li>
									<a href="#">Option 2</a>
								</li>
								<li>
									<a href="#">Option 3</a>
								</li>
							</ul>
						</div>
						<!--/ END Button Group -->
					</header>
					<section class="body">
						<div class="body-inner">
							<div class="portlet-body">
								<!--form action="#" class="form-horizontal form-row-seperated" id="form_student_fees">
								<!-- Student -->
								<!--div class="control-group">
								<label class="control-label">Select Student<span class="required">*</span></label>
								<div class="controls">
								<select name="studentid" id="studentid" class="span6">
								<option value="">Select</option>
								<option value="EH">Western Sahara</option>
								<option value="YE">Yemen</option>
								<option value="ZM">Zambia</option>
								<option value="ZW">Zimbabwe</option>
								</select>
								<button type="submit" class="btn purple-stripe">
								Add Payment Details
								</button>
								</div>
								</div><!-- /Student -->
								<!--/form-->
								<table class="table table-striped table-bordered table-hover" id="tblfeespyament">
									<thead>
										<tr>
											<th class="hidden-480">StudentID</th>
											<th class="hidden-480">Student Name</th>
											<th class="hidden-480">Amount</th>
											<th class="hidden-480">Date</th>
											<th class="hidden-480">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr class="odd gradeX">
											<td>shuxer</td>
											<td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>
											<td class="hidden-480">120</td>
											<td class="hidden-480">120</td>
											<td class="hidden-480">120</td>
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
