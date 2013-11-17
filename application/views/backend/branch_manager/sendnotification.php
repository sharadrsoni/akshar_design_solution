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
                                        Send Notification
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
                                        <h4>Send Notification <small>This is the place where everything started</small></h4>
                                </div>
                        </div>
                        <!--/ END Page/Section header -->
                </div>
                <!--/ END Row -->
                <!--Page Content Here  -->
                <div id="SendNotification">
                        <!-- START Row -->
                        <div class="row-fluid">
                                <!-- Start Tabs -->
                                <div class="tabbable" style="margin-bottom: 25px;">
                                        <ul class="nav nav-tabs">
                                                <!--li class="active">
                                                <a href="#tab1" data-toggle="tab"><span class="icon icone-eraser"></span>Branches</a>
                                                </li-->
                                                <li class="active">
                                                        <a href="#tab1" data-toggle="tab"><span class="icon icone-pencil"></span> Send Notification</a>
                                                </li>
                                        </ul>
                                        <div class="tab-content">
                                                <!--div class="tab-pane active" id="tab1">

                                                </div-->
                                                <div class="tab-pane active" id="tab1">
<?php
$role=$this->session->userdata('roleId');
if($role==1)
{
?>
						<?php
						$attributes = array('class' => 'form-horizontal span12 widget shadowed purple', 'id' => 'form_sendnotification');
						echo form_open('staff/send_notification_admin', $attributes);
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
                                                                <h3 class="form-section">Send Notification Info.</h3>
                                                                        <!-- Student/Staff -->
                                                                        <div class="control-group">
                                                                                <label class="control-label">Student/Staff<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <div class="text-toggle-Userrole" data-on="Student" data-off="Staff" >
                                                                                                <input type="checkbox" data-role_id = "<?php echo $this -> session -> userdata('roleId'); ?>"  checked="" name="user_role" id="user_role"  class="toggle" />
                                                                                        </div>
                                                                                </div>
                                                                        </div><!--/ Student/Staff -->
						<!-- Branch/Batch -->
						<div class="control-group" id="check_box_studnet">
						<label class="control-label">Branch/Batch<span class="required">*</span></label>
						<div class="controls">
						<div class="text-toggle-Branch_Batch" data-on="Branch" data-off="Batch">
						<input type="checkbox" name="branch_Batch" id="branch_Batch"  class="toggle" />
						</div>
						</div>
						</div><!--/ Branch/Batch -->
                                                                        <!-- Individual/Batch -->
                                                                        <div class="control-group"  id="check_box_staff" style="display: none">
                                                                                <label class="control-label">Individual/Batch<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <div class="text-toggle-Individual_Batch" data-on="Individual" data-off="Branch">
                                                                                                <input type="checkbox" name="individual_Batch" id="individual_Batch"  class="toggle" />
                                                                                        </div>
                                                                                </div>
                                                                        </div><!--/ Individual/Batch -->
                                                                        <!-- Branch -->
                                                                        <div class="control-group">
                                                                                <label class="control-label">Branch<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <select class="span4 select2" name="branch_name" multiple="" id="branch_name">
                                                                                                <option value="">Select...</option>
                                                                                                        <?php
																										foreach ($branch as $key) {
																											echo "<option value='{$key->branchCode}'>{$key->branchName}</option>";
																										}
                                                                                                ?>
                                                                                                
                                                                                        </select>
                                                                                        <span for="branch_name" class="help-inline"><?php echo form_error('branch_name'); ?></span>
                                                                                </div>
                                                                        </div><!--/ Branch -->
                                                                        <!-- Batch -->
                                                                        <div class="control-group" id="lst_batch_div">
                                                                                <label class="control-label">Batch<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <select class="span4" name="batch_name" id="batch_name">
                                                                                        </select>
                                                                                </div>
                                                                        </div><!--/ Batch -->
                                                                
                                                                        <!-- Individual Name -->
                                                                        <div class="control-group" style="display:none" id="lst_user_div">
                                                                                <label class="control-label">Name<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <select name="user_name" id="user_name" multiple="" class="span4 select2">
                                                                                        </select>
                                                                                </div>
                                                                        </div><!--/ Individual Name -->
                                                                        <!-- Message -->
                                                                        <div class="control-group">
                                                                                <label class="control-label">Message<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <textarea type="textarea" name="message" id="message" class="span8"/>
                                                                                        </textarea>
                                                                                </div>
                                                                        </div><!--/ Message -->
                                                                        <!-- Form Action -->
                                                                        <div class="form-actions">
                                                                                <button type="submit" class="btn btn-primary" name="register" id="register">
                                                                                        Register
                                                                                </button>
                                                                        </div><!--/ Form Action -->
                                                                </div>
                                                        </form>
<?php }

															else {
														?>
						<?php
						$attributes = array('class' => 'form-horizontal span12 widget shadowed purple', 'id' => 'form_sendnotification');
						echo form_open('staff/send_notification', $attributes);
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
                                                                <h3 class="form-section">Send Notification Info.</h3>
                                                                        <!-- Student/Staff -->
                                                                        <div class="control-group">
                                                                                <label class="control-label">Student/Staff<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <div class="text-toggle-Userrole" data-on="Student" data-off="Staff" >
                                                                                                <input type="checkbox" data-role_id = "<?php echo $this -> session -> userdata('roleId'); ?>" checked="" name="user_role" id="user_role"  class="toggle" />
                                                                                        </div>
                                                                                </div>
                                                                        </div><!--/ Student/Staff -->
						<!-- Individual/All -->
						<div class="control-group" id="check_box_staff" style="display: none">
						<label class="control-label">Individual/All<span class="required">*</span></label>
						<div class="controls">
						<div class="text-toggle-Branch_Batch" data-on="Individual" data-off="All">
						<input type="checkbox" name="individual_all" id="individual_all"  class="toggle" />
						</div>
						</div>
						</div><!--/ Branch/All -->
                                                                        <!-- Individual/Batch -->
                                                                        <div class="control-group" id="check_box_studnet">
                                                                                <label class="control-label">Individual/Batch<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <div class="text-toggle-Individual_Batch" data-on="Individual" data-off="Batch">
                                                                                                <input type="checkbox" name="individual_Batch" id="individual_Batch"  class="toggle" />
                                                                                        </div>
                                                                                </div>
                                                                        </div><!--/ Individual/Batch -->
                                                                        <!-- Batch -->
                                                                        <div class="control-group" id="lst_batch_div">
                                                                                <label class="control-label">Batch<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <select class="span4" name="batch_name" id="batch_name">
                                                                                                <option value="">Select...</option>
                                                                                                        <?php
																										foreach ($branch as $key) {
																											echo "<option value='{$key->branchId}'>{$key->branchName}</option>";
																										}
                                                                                                ?>
                                                                                        </select>
                                                                                </div>
                                                                        </div><!--/ Batch -->
                                                                
                                                                        <!-- Individual Name -->
                                                                        <div class="control-group" style="display:none" id="lst_user_div">
                                                                                <label class="control-label">Name<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <select name="user_name" id="user_name" class="span4 select2">
                                                                                        </select>
                                                                                </div>
                                                                        </div><!--/ Individual Name -->
                                                                        <!-- Faculty Name -->
                                                                        <div class="control-group" style="display:none" id="lst_user_div">
                                                                                <label class="control-label">Name<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <select name="faculty_name" id="faculty_name" multiple="" class="span4 select2">
                                                                                                <option value="">Select...</option>
                                                                                                        <?php
																										foreach ($branch as $key) {
																											echo "<option value='{$key->userId}'>{$key->userFirstName} {$key->userMiddleName} {$key->userLastName}</option>";
																										}
                                                                                                ?>
                                                                                        </select>
                                                                                </div>
                                                                        </div><!--/ Faculty Name -->
                                                                        <!-- Message -->
                                                                        <div class="control-group">
                                                                                <label class="control-label">Message<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <textarea type="textarea" name="message" id="message" class="span8"/>
                                                                                        </textarea>
                                                                                </div>
                                                                        </div><!--/ Message -->
                                                                        <!-- Form Action -->
                                                                        <div class="form-actions">
                                                                                <button type="submit" class="btn btn-primary" name="register" id="register">
                                                                                        Register
                                                                                </button>
                                                                        </div><!--/ Form Action -->
                                                                </div>
                                                        </form>
<?php } ?>



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
