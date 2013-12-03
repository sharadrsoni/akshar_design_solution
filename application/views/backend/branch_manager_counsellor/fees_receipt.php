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
					Fee Recipt
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
					<h4>Fees Receipt <small>Generates fees receipt.</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Fees_Receipt">
			<div class="row-fluid invoice">
				<div class="row-fluid invoice-logo">
					<div class="span6 invoice-logo-space"><img src="<?php echo base_url(); ?>assets/img/logo_blue.png" alt="Akshar Design Solution" />
					</div>
					<div class="span6">
						<p>
							<span class="">Receipt No.: 500</span>
							<span class="">Date: 11 Nov 2012</span>
							 <span class=""> Student ID: 2013ahd50001</span>
						</p>
					</div>
				</div>
				<hr />
				<div class="row-fluid">
					<div class="span8">
						<h4>Student Name:</h4>Dipesh V. Kakadiya
					</div>
					<div class="span4">
						<h4>Cheque Details</h4>
						
					</div>
				</div>
				<div class="row-fluid">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Course</th>
								<th class="hidden-480">Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Hardware</td>
								<td class="hidden-480">$75</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="well">
							<address>
								<strong>Loop, Inc.</strong>
								<br />
								795 Park Ave, Suite 120
								<br />
								San Francisco, CA 94107
								<br />
								<abbr title="Phone">P:</abbr> (234) 145-1810
							</address>
							<address>
								<strong>Full Name</strong>
								<br />
								<a href="mailto:#">first.last@email.com</a>
							</address>
						</div>
					</div>
					<div class="span8 invoice-block">
						<ul class="unstyled amounts">
							<li>
								<strong>Sub - Total amount:</strong> $9265
							</li>
							<li>
								<strong>Discount:</strong> 12.9%
							</li>
							<li>
								<strong>VAT:</strong> -----
							</li>
							<li>
								<strong>Grand Total:</strong> $12489
							</li>
						</ul>
						<br />
						<a class="btn blue big hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
						<a class="btn green big hidden-print">Submit Your Invoice <i class="m-icon-big-swapright m-icon-white"></i></a>
					</div>
				</div>
			</div>

		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>