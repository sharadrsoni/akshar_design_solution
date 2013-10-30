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
					Change Password
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
					<h4>Change Password <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="ChangePassword">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Form Validation - Inline -->
				<!--form class="modal container hide fade modal-overflow in form-horizontal span12 widget shadowed brown" data-replace="true" style="left:-10%;" aria-hidden="false" id="form_changepassword"-->
				<form class="form-horizontal span12 widget shadowed brown" id="form_changepassword">
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
							<h3 class="form-section">Change Password Info.</h3>
							<!-- Current Password -->
							<div class="control-group">
								<label class="control-label">Current Password<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="current_pwd" id="current_pwd" class="span8">
								</div>
							</div><!--/ Current Password -->
							<!-- New Password -->
							<div class="control-group">
								<label class="control-label">New Password<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="new_pwd" id="new_pwd" class="span8">
								</div>
							</div><!--/ New Password -->
							<!-- Confirm Password -->
							<div class="control-group">
								<label class="control-label">Confirm Password<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="confirm_pwd" id="confirm_pwd" class="span8">
								</div>
							</div><!--/ Confirm Password -->

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
