<?php $__env->startSection('title', __('Add Employee')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo __(' EMPLOYEE'); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i><?php echo __('Dashboard'); ?> </a></li>
            <li><a href="<?php echo url('/people/employees'); ?>"><?php echo __('Employee'); ?></a></li>
            <li class="active"><?php echo __('Add Employee'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
     
    <section class="content">
        <?php if(!empty(Session::get('message'))): ?>
        <div class="alert alert-success alert-dismissible" id="notification_box">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i> <?php echo Session::get('message'); ?>

        </div>
        <?php elseif(!empty(Session::get('exception'))): ?>
        <div class="alert alert-warning alert-dismissible" id="notification_box">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-warning"></i> <?php echo Session::get('exception'); ?>

        </div>
        <?php endif; ?>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#personalDetailsTab" aria-controls="personalDetailsTab" role="tab" data-toggle="tab">
                    <?php echo __('Personal Details'); ?>

                </a>
            </li>
            <li role="presentation">
                <a href="#payrollDetailsTab" aria-controls="payrollDetailsTab" role="tab" data-toggle="tab">
                    <?php echo __('Payroll Details'); ?>

                </a>
            </li>
            <li role="presentation">
                <a href="#contactInfoTab" aria-controls="contactInfoTab" role="tab" data-toggle="tab">
                    <?php echo __('Contact Information'); ?>

                </a>
            </li>
            <li role="presentation">
                <a href="#leaveDetailsTab" aria-controls="leaveDetailsTab" role="tab" data-toggle="tab">
                    <?php echo __('Leave Details'); ?>

                </a>
            </li>
            <li role="presentation">
                <a href="#superannuationTab" aria-controls="superannuationTab" role="tab" data-toggle="tab">
                    <?php echo __('Superannuation'); ?>

                </a>
            </li>
            <li role="presentation">
                <a href="#bankCreditsTab" aria-controls="bankCreditsTab" role="tab" data-toggle="tab">
                    <?php echo __('Bank Credits'); ?>

                </a>
            </li>
        </ul>

        <!-- Tab Panes -->
        <div class="tab-content">
            <!-- Personal Details Tab -->
            <div role="tabpanel" class="tab-pane active" id="personalDetailsTab">
                <div class="panel-body">
                    <!-- Personal Details Form -->
                    <!-- Add your Personal Details form here -->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo __('EMPLOYEE PERSONAL DETAILS'); ?></h3>
                        </div>
                        <!-- Check if Employee not added -->
                        <?php if(!isset($employee_id)): ?>
                        <form action="<?php echo url('people/employees/store'); ?>" method="post" name="employee_add_form">
                            <?php echo csrf_field(); ?>

                            <div class="box-body">
                                <div class="row">
                                    <!-- Notification Box -->
                                    <div class="col-md-12">
                                        <?php if(!empty(Session::get('message'))): ?>
                                        <div class="alert alert-success alert-dismissible" id="notification_box">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="icon fa fa-check"></i> <?php echo Session::get('message'); ?>

                                        </div>
                                        <?php elseif(!empty(Session::get('exception'))): ?>
                                        <div class="alert alert-warning alert-dismissible" id="notification_box">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="icon fa fa-warning"></i> <?php echo Session::get('exception'); ?>

                                        </div>
                                        <?php else: ?>
                                        <p class="text-yellow"><?php echo __('Enter team member details. All (*) fields are required. (Default password for added user is 12345678)'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                    <!-- Add your form fields here -->
                                    <?php 
                                        $users = \App\User::orderBy('id', 'desc')->first();
                                        $sl=$users->id;
                                    ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="employee_id"><?php echo __('ID'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('employee_id') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="hidden" name="employee_id" value="<?php echo $sl; ?>">
                                            <input type="text" class="form-control" value="<?php echo __('EMPID'); ?><?php echo $sl; ?>" disabled>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"><?php echo __('Name'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('name') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo old('name'); ?>" placeholder="<?php echo __('Enter name..'); ?>">
                                            <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('name'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="father_name"><?php echo __('Fathers Name'); ?></label>
                                        <div class="form-group<?php echo $errors->has('father_name') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="father_name" id="father_name" class="form-control" value="<?php echo old('father_name'); ?>" placeholder="<?php echo __('Enter fathers name..'); ?>">
                                            <?php if($errors->has('father_name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('father_name'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="mother_name"><?php echo __('Mothers Name'); ?> </label>
                                        <div class="form-group<?php echo $errors->has('mother_name') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="mother_name" id="mother_name" class="form-control" value="<?php echo old('mother_name'); ?>" placeholder="<?php echo __('Enter mothers name..'); ?>">
                                            <?php if($errors->has('mother_name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('mother_name'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="spouse_name"><?php echo __('Spouse Name'); ?> </label>
                                        <div class="form-group<?php echo $errors->has('spouse_name') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="<?php echo old('spouse_name'); ?>" placeholder="<?php echo __('Enter spouse name..'); ?>">
                                            <?php if($errors->has('spouse_name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('spouse_name'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="present_address"><?php echo __('Present Address'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('present_address') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="present_address" id="present_address" class="form-control" value="<?php echo old('present_address'); ?>" placeholder="<?php echo __('Enter present address..'); ?>">
                                            <?php if($errors->has('present_address')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('present_address'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                            <!-- /.form-group -->

                                    <div class="col-md-4">
                                        <label for="permanent_address"><?php echo __('Permanent Address'); ?></label>
                                        <div class="form-group<?php echo $errors->has('permanent_address') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="<?php echo old('permanent_address'); ?>" placeholder="<?php echo __('Enter permanent address..'); ?>">
                                            <?php if($errors->has('permanent_address')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('permanent_address'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        
                                    <div class="col-md-4">
                                        <label for="joining_position"><?php echo __('Reference '); ?><span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('joining_position') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="reference" id="joining_position" class="form-control">
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <?php $references = \App\User::where('access_label', 4)
                                                ->where('deletion_status', 0)
                                                ->select('id', 'name', 'present_address', 'contact_no_one', 'created_at', 'activation_status')
                                                ->orderBy('id', 'DESC')
                                                ->get()
                                                ->toArray();?>
                                                <?php $__currentLoopData = $references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $reference['name']; ?>"><?php echo $reference['name']; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                            <!-- /.form-group -->

                                    <div class="col-md-4">
                                        <label for="email"><?php echo __('Email'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('email') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo old('email'); ?>" placeholder="<?php echo __('Enter email address..'); ?>">
                                            <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('email'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="contact_no_one"><?php echo __('Contact No'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('contact_no_one') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="<?php echo old('contact_no_one'); ?>" placeholder="<?php echo __('Enter contact no..'); ?>">
                                            <?php if($errors->has('contact_no_one')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('contact_no_one'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        <!-- /.form-group -->

                                    <div class="col-md-4">    
                                        <label for="emergency_contact"><?php echo __('Emergency Contact'); ?></label>
                                        <div class="form-group<?php echo $errors->has('emergency_contact') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="emergency_contact" id="emergency_contact" class="form-control" value="<?php echo old('emergency_contact'); ?>" placeholder="<?php echo __('Enter emergency contact no..'); ?>">
                                            <?php if($errors->has('emergency_contact')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('emergency_contact'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="col-md-4">
                                        <label for="gender"><?php echo __('Gender'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('gender') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <option value="m"><?php echo __('Male'); ?></option>
                                                <option value="f"><?php echo __('Female'); ?></option>
                                            </select>
                                            <?php if($errors->has('gender')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('gender'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="col-md-4">
                                        <label for="marital_status"><?php echo __('Marital Status'); ?> </label>
                                        <div class="form-group<?php echo $errors->has('marital_status') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="marital_status" id="marital_status" class="form-control">
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <option value="1"><?php echo __('Married'); ?></option>
                                                <option value="2"><?php echo __('Single'); ?></option>
                                                <option value="3"><?php echo __('Divorced'); ?></option>
                                                <option value="4"><?php echo __('Separated'); ?></option>
                                                <option value="5"><?php echo __('Widowed'); ?></option>
                                            </select>
                                            <?php if($errors->has('marital_status')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('marital_status'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        <!-- /.form-group -->
                                        
                                    <div class="col-md-4">                            
                                        <label for="datepicker"><?php echo __('Date of Birth'); ?></label>
                                        <div class="form-group<?php echo $errors->has('date_of_birth') ? ' has-error' : ''; ?> has-feedback">
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="date_of_birth" class="form-control pull-right" value="<?php echo old('date_of_birth'); ?>" id="datepicker">
                                            </div>
                                            <?php if($errors->has('date_of_birth')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('date_of_birth'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        <!-- /.form-group -->

                                    <div class="col-md-4">                            
                                        <label for="datepicker4"><?php echo __('Joining Date'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('joining_date') ? ' has-error' : ''; ?> has-feedback">
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="joining_date" class="form-control pull-right" id="datepicker4" placeholder="<?php echo __('yyyy-mm-dd'); ?>">
                                            </div>
                                            <?php if($errors->has('joining_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('joining_date'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-md-4">                            
                                        <label for="datepicker5"><?php echo __('End Date'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('end_date') ? ' has-error' : ''; ?> has-feedback">
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="end_date" class="form-control pull-right" id="datepicker4" placeholder="<?php echo __('yyyy-mm-dd'); ?>">
                                            </div>
                                            <?php if($errors->has('joining_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('joining_date'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <!-- /.form-group -->

                                    <input type="hidden" name="home_district" value="None">

                    
                                    <!-- /.form-group -->

                                    <div class="col-md-4">
                                        <label for="designation_id"><?php echo __('Designation'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('designation_id') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="designation_id" id="designation_id" class="form-control">
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $designation['id']; ?>"><?php echo $designation['designation']; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('designation_id')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('designation_id'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="col-md-4">
                                        <label for="joining_position"><?php echo __('Department'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('joining_position') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="joining_position" id="joining_position" class="form-control">
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <?php $departments= \App\Department::all();?>
                                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $department['id']; ?>"><?php echo $department['department']; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('joining_position')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('joining_position'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        <!-- /.form-group -->

                                    <div class="col-md-4">
                                        <label for="id_name"><?php echo __('Photo ID Name'); ?></label>
                                        <div class="form-group<?php echo $errors->has('id_name') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="id_name" id="id_name" class="form-control">
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <option value="1"><?php echo __('NID'); ?></option>
                                                <option value="2"><?php echo __('Passport'); ?></option>
                                                <option value="3"><?php echo __('Driving License'); ?></option>
                                            </select>
                                            <?php if($errors->has('id_name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('id_name'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="col-md-4">
                                        <label for="id_number"><?php echo __('Photo ID Number'); ?></label>
                                        <div class="form-group<?php echo $errors->has('id_number') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="text" name="id_number" id="id_number" class="form-control" value="<?php echo old('id_number'); ?>" placeholder="<?php echo __('Enter id number..'); ?>">
                                            <?php if($errors->has('id_number')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('id_number'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        <!-- /.form-group -->

                                    <div class="col-md-4">
                                        <label for="role"><?php echo __('Role'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group<?php echo $errors->has('role') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="role" id="role" class="form-control">
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $role->name; ?>"><?php echo $role->display_name; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('role')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('role'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        <!-- /.form-group -->
    
                                    <div class="col-md-4">
                                        <label for="employee_type" class="control-label"><?php echo __('Employee Type'); ?></label>
                                        <div class="form-group<?php echo $errors->has('employee_type') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="employee_type" class="form-control" id="employee_type">
                                                <option selected disabled><?php echo __('Select One'); ?></option>
                                                <option value="1"><?php echo __('Provision'); ?></option>
                                                <option value="2"><?php echo __('Permanent'); ?></option>
                                                <option value="3"><?php echo __('Full Time'); ?></option>
                                                <option value="4"><?php echo __('Part Time'); ?></option>
                                                <option value="5"><?php echo __('Adhoc'); ?></option>
                                            </select>
                                            <?php if($errors->has('employee_type')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo $errors->first('employee_type'); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="resident_status" class="control-label"><?php echo __('Resident Status'); ?></label>
                                        <div class="form-group<?php echo $errors->has('resident_status') ? ' has-error' : ''; ?> has-feedback">
                                            <select name="resident_status" class="form-control" id="resident_status">
                                                <option selected disabled><?php echo __('Select Resident/Non-Resident'); ?></option>
                                                <option value="1"><?php echo __('Resident'); ?></option>
                                                <option value="2"><?php echo __('Non-Resident'); ?></option>
                                            </select>
                                            <?php if($errors->has('resident_status')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo $errors->first('resident_status'); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="no_of_dependent" class="control-label"><?php echo __('No. of Dependent'); ?></label>
                                        <div class="form-group<?php echo $errors->has('no_of_dependent') ? ' has-error' : ''; ?> has-feedback">
                                            <input type="number" name="no_of_dependent" class="form-control" id="no_of_dependent" value="<?php echo old('no_of_dependent'); ?>" placeholder="<?php echo __('Enter no. of dependent..'); ?>">
                                            <?php if($errors->has('no_of_dependent')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo $errors->first('no_of_dependent'); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="academic_qualification" class="control-label"><?php echo __('Academic Qualification'); ?></label>
                                        <div class="form-group<?php echo $errors->has('academic_qualification') ? ' has-error' : ''; ?> has-feedback">
                                            <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea" placeholder="<?php echo __('Enter academic qualification..'); ?>"><?php echo old('academic_qualification'); ?></textarea>
                                            <?php if($errors->has('academic_qualification')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('academic_qualification'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="col-md-6">
                                        <label for="professional_qualification" class="control-label"><?php echo __('Professional Qualification'); ?></label>
                                        <div class="form-group<?php echo $errors->has('professional_qualification') ? ' has-error' : ''; ?> has-feedback">
                                            <textarea name="professional_qualification" id="professional_qualification" class="form-control textarea" placeholder="<?php echo __('Enter professional qualification..'); ?>"><?php echo old('professional_qualification'); ?></textarea>
                                            <?php if($errors->has('professional_qualification')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('professional_qualification'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="experience" class="control-label"><?php echo __('Experience'); ?></label>
                                        <div class="form-group<?php echo $errors->has('experience') ? ' has-error' : ''; ?> has-feedback">
                                            <textarea name="experience" id="experience" class="form-control textarea" placeholder="<?php echo __('Enter experience..'); ?>"><?php echo old('experience'); ?></textarea>
                                            <?php if($errors->has('experience')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('experience'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> 
                                <!-- /.row -->
                            </div>
                            <div class="box-footer">
                                <a href="<?php echo url('/people/employees'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo __('Cancel'); ?> </a>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __('Add'); ?></button>
                            </div>
                        </form>
                        <?php else: ?>
                            <div class="box-body">
                                <div class="row">
                                    <?php 
                                        //Get Employees
                                        $employee = \App\User::where('id', $employee_id)->first();
                                    ?>
                                    <div class="col-md-4">
                                        <label for="employee_id"><?php echo __('ID'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="hidden" name="employee_id" value="<?php echo $employee->id; ?>">
                                            <input type="text" class="form-control" value="<?php echo __('EMPID'); ?><?php echo $employee->id; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"><?php echo __('Name'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $employee->name; ?>" placeholder="<?php echo __('Enter name..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="father_name"><?php echo __('Fathers Name'); ?></label>
                                        <div class="form-group">
                                            <input type="text" name="father_name" id="father_name" class="form-control" value="<?php echo $employee->father_name; ?>" placeholder="<?php echo __('Enter fathers name..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="mother_name"><?php echo __('Mothers Name'); ?></label>
                                        <div class="form-group">
                                            <input type="text" name="mother_name" id="mother_name" class="form-control" value="<?php echo $employee->mother_name; ?>" placeholder="<?php echo __('Enter mothers name..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="spouse_name"><?php echo __('Spouse Name'); ?></label>
                                        <div class="form-group">
                                            <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="<?php echo $employee->spouse_name; ?>" placeholder="<?php echo __('Enter spouse name..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="present_address"><?php echo __('Present Address'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="present_address" id="present_address" class="form-control" value="<?php echo $employee->present_address; ?>" placeholder="<?php echo __('Enter present address..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="permanent_address"><?php echo __('Permanent Address'); ?></label>
                                        <div class="form-group">
                                            <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="<?php echo $employee->permanent_address; ?>" placeholder="<?php echo __('Enter permanent address..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email"><?php echo __('Email'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $employee->email; ?>" placeholder="<?php echo __('Enter email address..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="contact_no_one"><?php echo __('Contact No'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="<?php echo $employee->contact_no_one; ?>" placeholder="<?php echo __('Enter contact no..'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emergency_contact"><?php echo __('Emergency Contact'); ?></label>
                                        <div class="form-group">
                                            <input type="text" name="emergency_contact" id="emergency_contact" class="form-control" value="<?php echo $employee->emergency_contact; ?>" placeholder="<?php echo __('Enter emergency contact no..'); ?>" readonly>
                                        </div>
                                    </div>
                                                                
                                    <div class="col-md-4">
                                        <label for="gender"><?php echo __('Gender'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="gender" id="gender" class="form-control" readonly>
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <option value="m" <?php echo $employee->gender=='m' ? 'selected' : ''; ?>><?php echo __('Male'); ?></option>
                                                <option value="f" <?php echo $employee->gender=='f' ? 'selected' : ''; ?>><?php echo __('Female'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="marital_status"><?php echo __('Marital Status'); ?> </label>
                                        <div class="form-group">
                                            <select name="marital_status" id="marital_status" class="form-control" readonly>
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <option value="1" <?php echo $employee->marital_status==1 ? 'selected' : ''; ?>><?php echo __('Married'); ?></option>
                                                <option value="2" <?php echo $employee->marital_status==2 ? 'selected' : ''; ?>><?php echo __('Single'); ?></option>
                                                <option value="3" <?php echo $employee->marital_status==3 ? 'selected' : ''; ?>><?php echo __('Divorced'); ?></option>
                                                <option value="4" <?php echo $employee->marital_status==4 ? 'selected' : ''; ?>><?php echo __('Separated'); ?></option>
                                                <option value="5" <?php echo $employee->marital_status==5 ? 'selected' : ''; ?>><?php echo __('Widowed'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="datepicker"><?php echo __('Date of Birth'); ?></label>
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="date_of_birth" class="form-control pull-right" value="<?php echo old('date_of_birth'); ?>" id="datepicker" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="datepicker4"><?php echo __('Joining Date'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="joining_date" class="form-control pull-right" id="datepicker4" value="<?php echo $employee->joining_date; ?>" placeholder="<?php echo __('yyyy-mm-dd'); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="datepicker5"><?php echo __('End Date'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="end_date" class="form-control pull-right" id="datepicker5" placeholder="<?php echo __('yyyy-mm-dd'); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="home_district" value="None">

                                    <div class="col-md-4">
                                        <label for="designation_id"><?php echo __('Designation'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="designation_id" id="designation_id" class="form-control" readonly>
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $designation['id']; ?>" <?php echo $designation['id'] == $employee->designation_id ? 'selected' : ''; ?>><?php echo $designation['designation']; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="joining_position"><?php echo __('Department'); ?> <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="joining_position" id="joining_position" class="form-control" readonly>
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <?php $departments= \App\Department::all();?>
                                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $department['id']; ?>" <?php echo $department['id'] == $employee->joining_position ? 'selected' : ''; ?>><?php echo $department['department']; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="id_name"><?php echo __('Photo ID Name'); ?></label>
                                        <div class="form-group">
                                            <select name="id_name" id="id_name" class="form-control" readonly>
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <option value="1"><?php echo __('NID'); ?></option>
                                                <option value="2"><?php echo __('Passport'); ?></option>
                                                <option value="3"><?php echo __('Driving License'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="id_number"><?php echo __('Photo ID Number'); ?></label>
                                        <div class="form-group">
                                            <input type="text" name="id_number" id="id_number" class="form-control" value="<?php echo old('id_number'); ?>" placeholder="<?php echo __('Enter id number..'); ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="role"><?php echo __('Role'); ?><span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="role" id="role" class="form-control" readonly>
                                                <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $role->name; ?>"  <?php echo $role->name == $employee->role ? 'selected' : ''; ?>><?php echo $role->display_name; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="employee_type" class="control-label"><?php echo __('Employee Type'); ?></label>
                                        <div class="form-group">
                                            <select name="employee_type" class="form-control" id="employee_type" readonly>
                                                <option selected disabled><?php echo __('Select One'); ?></option>
                                                <option value="1" <?php echo $employee->employee_type == 1 ? 'selected' : ''; ?>><?php echo __('Provision'); ?></option>
                                                <option value="2" <?php echo $employee->employee_type == 2 ? 'selected' : ''; ?>><?php echo __('Permanent'); ?></option>
                                                <option value="3" <?php echo $employee->employee_type == 3 ? 'selected' : ''; ?>><?php echo __('Full Time'); ?></option>
                                                <option value="4" <?php echo $employee->employee_type == 4 ? 'selected' : ''; ?>><?php echo __('Part Time'); ?></option>
                                                <option value="5" <?php echo $employee->employee_type == 5 ? 'selected' : ''; ?>><?php echo __('Adhoc'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="resident_status" class="control-label"><?php echo __('Resident Status'); ?></label>
                                        <div class="form-group">
                                            <select name="resident_status" class="form-control" id="resident_status" readonly>
                                                <option selected disabled><?php echo __('Select Resident/Non-Resident'); ?></option>
                                                <option value="1" <?php echo $employee->resident_status == 1 ? 'selected' : ''; ?>><?php echo __('Resident'); ?></option>
                                                <option value="2" <?php echo $employee->resident_status == 2 ? 'selected' : ''; ?>><?php echo __('Non-Resident'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="no_of_dependent" class="control-label"><?php echo __('No. of Dependent'); ?></label>
                                        <div class="form-group">
                                            <input type="number" name="no_of_dependent" class="form-control" id="no_of_dependent" value="<?php echo $employee['no_of_dependent']; ?>" placeholder="<?php echo __('Enter no. of dependent..'); ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="academic_qualification" class="control-label"><?php echo __('Academic Qualification'); ?></label>
                                        <div class="form-group">
                                            <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea" placeholder="<?php echo __('Enter academic qualification..'); ?>" readonly><?php echo old('academic_qualification'); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="professional_qualification" class="control-label"><?php echo __('Professional Qualification'); ?></label>
                                        <div class="form-group">
                                            <textarea name="professional_qualification" id="professional_qualification" class="form-control textarea" placeholder="<?php echo __('Enter professional qualification..'); ?>" readonly><?php echo old('professional_qualification'); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="experience" class="control-label"><?php echo __('Experience'); ?></label>
                                        <div class="form-group">
                                            <textarea name="experience" id="experience" class="form-control textarea" placeholder="<?php echo __('Enter experience..'); ?>" readonly><?php echo old('experience'); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Payroll Details Tab -->
            <div role="tabpanel" class="tab-pane" id="payrollDetailsTab">
                <div class="panel-body">
                    <!-- Payroll Details Form -->
                    <!-- Add your payroll form here -->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo __('EMPLOYEE PAYROLL DETAILS'); ?></h3>
                        </div>
                        <?php if(isset($employees) && isset($employee_id)): ?>
                            <div class="col-md-12">
                                <!-- Default box -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?php echo __('Employee Details'); ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="employee_id"><?php echo __('ID'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <span><?php echo __('EMPID'); ?><?php echo $employee->id; ?></span>
                                                </div>
                                                <div class="col-md-3">
                                                <label for="user_id"><?php echo __('Employee Name'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($employee['id'] == $employee_id): ?>
                                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $employee['id']; ?>">
                                                    <span><?php echo $employee['name']; ?></span>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <?php if($errors->has('user_id')): ?>
                                            <span class="help-block">
                                            <strong><?php echo $errors->first('user_id'); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                    <!-- /. end col -->
                            </div>
                                <!-- /.box-body -->
                            <div class="box-footer clearfix"></div>
                                <!-- /.box-footer -->
                                <!-- /.box -->
                            <!-- /.end.col -->
                        <?php endif; ?>

                        <?php 
                            //Get Employees
                            if (isset($employee_id)){
                                $employee = \App\User::where('id', $employee_id)->first();
                            }
                            if(isset($employee)){
                                $payroll_id = $employee->user_payroll_rel_id;
                            } else {
                                $payroll_id = 0;
                            }
                        ?>
                        <!-- Check New Payroll -->  
                        <?php if(isset($payroll_id) && $payroll_id==0): ?>
                            <form name="employee_salary_form" id="employee_salary_form" action="<?php echo url('/people/employees/payroll_store'); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <?php if(isset($employee_id)): ?>
                                <input type="hidden" name="user_id" value="<?php echo $employee_id; ?>">
                            
                                    <input type="hidden" name="employee_type" class="form-control" id="employee_type" value="<?php echo $employee->employee_type; ?>"/>
                                    <input type="hidden" name="resident_status" class="form-control" id="resident_status" value="<?php echo $employee->resident_status; ?>"/>
                                    <input type="hidden" name="no_of_dependent" class="form-control" id="no_of_dependent" value="<?php echo $employee->no_of_dependent; ?>"/>
                                <?php else: ?>
                                    <input type="hidden" name="employee_type" class="form-control" id="employee_type" value="0"/>
                                    <input type="hidden" name="resident_status" class="form-control" id="resident_status" value="0"/>
                                    <input type="hidden" name="no_of_dependent" class="form-control" id="no_of_dependent" value="0"/>
                                <?php endif; ?>
                                <div class="box-body">
                                        <!-- Add your form fields here -->
                                        <?php 
                                            $users = \App\User::orderBy('id', 'desc')->first();
                                            $sl=$users->id;
                                        ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo __('Salary Details'); ?></h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group<?php echo $errors->has('period_definition') ? ' has-error' : ''; ?>">
                                                    <label for="period_definition" class="col-sm-3 control-label"><?php echo __('Period Definition'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="period_definition" class="form-control" id="period_definition" value="FN - Fortnightly <?php echo $sumOfWorkingHours*2; ?> Hours" readonly>
                                                        <?php if($errors->has('period_definition')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('period_definition'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group<?php echo $errors->has('annual_basic') ? ' has-error' : ''; ?>">
                                                    <label for="basic_salary" class="col-sm-3 control-label"><?php echo __('Annual Salary'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="number" name="annual_salary" class="form-control" id="annual_salary" value="<?php echo old('annual_salary'); ?>" placeholder="<?php echo __('Enter annual salary..'); ?>">
                                                        <?php if($errors->has('annual_salary')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('annual_salary'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group<?php echo $errors->has('basic_salary') ? ' has-error' : ''; ?>">
                                                    <label for="basic_salary" class="col-sm-3 control-label"><?php echo __('Fortnight Salary'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="number" name="basic_salary" class="form-control" id="basic_salary" value="<?php echo old('basic_salary'); ?>" placeholder="<?php echo __('Enter fortnight salary..'); ?>">
                                                        <?php if($errors->has('basic_salary')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('basic_salary'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group<?php echo $errors->has('hrly_salary_rate') ? ' has-error' : ''; ?>">
                                                    <label for="hrly_salary_rate" class="col-sm-3 control-label"><?php echo __('Rate'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="number" name="hrly_salary_rate" class="form-control" id="hrly_salary_rate" value="<?php echo old('hrly_salary_rate'); ?>" placeholder="<?php echo __('Enter working hours..'); ?>">
                                                        <?php if($errors->has('hrly_salary_rate')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('hrly_salary_rate'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /.end.col -->
                                        <div class="col-md-6">
                                        <div class="box box-success">
                                            <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo __('Allowances'); ?></h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-primary"><?php echo __('House Allowances'); ?></h3>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="col-sm-8" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('hr_place') ? ' has-error' : ''; ?>">
                                                                <label for="hr_place"><?php echo __('Place Name'); ?></label>
                                                                <!-- <div class="col-sm-3"> -->
                                                                    <select name="hr_place" id="hr_place" class="form-control">
                                                                    <option selected disabled><?php echo __('Select place for house allowance'); ?></option>
                                                                    <?php if(isset($loca_places)): ?>
                                                                        <?php $__currentLoopData = $loca_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['places']; ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                    </select>
                                                                    <?php if($errors->has('hr_place')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('hr_place'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                <!-- </div> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('hr_area') ? ' has-error' : ''; ?>">  
                                                                <label for="hr_area"><?php echo __('Area Name'); ?></label>
                                                                <!-- <div class="col-sm-3"> -->
                                                                    <input type="text" name="hr_area" class="form-control" id="hr_area" value="<?php echo old('hr_area'); ?>" placeholder="<?php echo __('Area...'); ?>" readonly="true">
                                                                    <?php if($errors->has('hr_area')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('hr_area'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                <!-- </div> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('hra_type') ? ' has-error' : ''; ?>">
                                                                    <!-- <label for="hra_type" class="col-sm-4 control-label" style="padding: unset;"><?php echo __('Housing Allowance Type'); ?></label> -->
                                                                    <label for="hra_type"><?php echo __('Housing Allowance Type'); ?></label>
                                                                    <select name="hra_type" class="form-control" id="hra_type">
                                                                        <option selected disabled><?php echo __('Select One'); ?></option>
                                                                        <option value="1"><?php echo __('Rental'); ?></option>
                                                                        <option value="2"><?php echo __('Kind'); ?></option>
                                                                        <option value="3"><?php echo __('Not Applicable'); ?></option>
                                                                    </select>
                                                                    <?php if($errors->has('hra_type')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('hra_type'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('hra_amount_per_week') ? ' has-error' : ''; ?>">
                                                                    <label for="hra_amount_per_week"><?php echo __('House Rent/Purchase Amount'); ?></label>
                                                                    <input type="number" name="hra_amount_per_week" value="<?php echo old('hra_amount_per_week'); ?>" class="form-control" id="hra_amount_per_week" placeholder="<?php echo __('Enter amount ..'); ?>">
                                                                    <?php if($errors->has('hra_amount_per_week')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('hra_amount_per_week'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('house_rent_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="house_rent_allowance"><?php echo __('Housing Allowance'); ?></label>
                                                                <input type="number" name="house_rent_allowance" value="<?php echo old('house_rent_allowance'); ?>" class="form-control"  id="house_rent_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                                                                <?php if($errors->has('house_rent_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('house_rent_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-primary"><?php echo __('Vehicle Allowances'); ?></h3>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('va_type') ? ' has-error' : ''; ?>">
                                                                    <label for="va_type"><?php echo __('Vehicle Allowance Type'); ?></label>
                                                                    <select name="va_type" class="form-control" id="va_type">
                                                                        <option selected disabled><?php echo __('Select One'); ?></option>
                                                                        <option value="1"><?php echo __('With Fuel'); ?></option>
                                                                        <option value="2"><?php echo __('Without Fuel'); ?></option>
                                                                        <option value="3"><?php echo __('Not Applicable'); ?></option>
                                                                    </select>
                                                                    <?php if($errors->has('va_type')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('va_type'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('vehicle_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="vehicle_allowance"><?php echo __('Vehicle Allowance'); ?></label>
                                                                <input type="number" name="vehicle_allowance" value="<?php echo old('vehicle_allowance'); ?>" class="form-control" id="vehicle_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                                                                <?php if($errors->has('vehicle_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('vehicle_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-primary"><?php echo __('Other Allowances'); ?></h3>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('meals_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="meals_allowance"><?php echo __('Meals (Messing) Allowance'); ?></label> 
                                                                    <input type="checkbox" style="margin-left: 10px; margin-top: unset" name="meals_tag" id="meals_tag" value="0" >
                                                                    <input type="number" name="meals_allowance" value="<?php echo old('meals_allowance'); ?>" class="form-control" id="meals_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                                                                    <?php if($errors->has('meals_allowance')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('meals_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('medical_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="medical_allowance"><?php echo __('Medical Allowance'); ?></label>
                                                                <input type="number" name="medical_allowance" value="<?php echo old('medical_allowance'); ?>" class="form-control" id="medical_allowance" placeholder="<?php echo __('Enter medical allowance..'); ?>">
                                                                <?php if($errors->has('medical_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('medical_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('special_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="special_allowance"><?php echo __('Telephone Allowance'); ?></label>
                                                                <input type="number" name="special_allowance" value="<?php echo old('special_allowance'); ?>" class="form-control" id="special_allowance" placeholder="<?php echo __('Enter telephone allowance..'); ?>">
                                                                <?php if($errors->has('special_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('special_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('other_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="other_allowance"><?php echo __('Servant Allowance'); ?></label>
                                                                    <input type="number" name="other_allowance" value="<?php echo old('other_allowance'); ?>" class="form-control" id="other_allowance" placeholder="<?php echo __('Enter domestic servant allowance..'); ?>">
                                                                    <?php if($errors->has('other_allowance')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('other_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('electricity_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="electricity_allowance"><?php echo __('Electricity Allowance'); ?></label>
                                                                    <input type="number" name="electricity_allowance" value="<?php echo old('electricity_allowance'); ?>" class="form-control" id="electricity_allowance" placeholder="<?php echo __('Enter electricity allowance..'); ?>">
                                                                    <?php if($errors->has('electricity_allowance')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('electricity_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('security_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="security_allowance"><?php echo __('Security Allowance'); ?></label>
                                                                    <input type="number" name="security_allowance" value="<?php echo old('security_allowance'); ?>" class="form-control" id="security_allowance" placeholder="<?php echo __('Enter security allowance..'); ?>">
                                                                    <?php if($errors->has('security_allowance')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('security_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-sm-12" style="padding-left: unset;">
                                                    <div class="form-group<?php echo $errors->has('provident_fund_contribution') ? ' has-error' : ''; ?>">
                                                        <label for="provident_fund_contribution"><?php echo __('Superannuation Fund Contribution'); ?></label>
                                                        <input type="number" name="provident_fund_contribution" value="<?php echo old('provident_fund_contribution'); ?>" class="form-control" id="provident_fund_contribution" placeholder="<?php echo __('Enter superannuation fund contribution..'); ?>">
                                                        <?php if($errors->has('provident_fund_contribution')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('provident_fund_contribution'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        </div>
                                        <!-- /.end.col -->
                                        <div class="col-md-6">
                                            <div class="box box-warning">
                                                <div class="box-header with-border">
                                                <h3 class="box-title"><?php echo __('Deductions'); ?></h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                <div class="col-sm-12" style="padding-left: unset;">
                                                    <div class="form-group<?php echo $errors->has('tax_deduction_a') ? ' has-error' : ''; ?>">
                                                    <label for="tax_deduction_a"><?php echo __('Tax Deduction (A)'); ?></label>
                                                    <input type="number" name="tax_deduction_a" value="<?php echo old('tax_deduction_a'); ?>" class="form-control" id="tax_deduction_a" placeholder="<?php echo __('Enter tax deduction..'); ?>" readonly>
                                                    <?php if($errors->has('tax_deduction_a')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo $errors->first('tax_deduction_a'); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-8" style="padding-left: unset;">
                                                    <div class="form-group<?php echo $errors->has('tax_deduction_b') ? ' has-error' : ''; ?>">
                                                    <label for="tax_deduction_b"><?php echo __('Tax Deduction (B)'); ?></label>
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                    <input type="number" name="tax_deduction_b" value="<?php echo old('tax_deduction_b'); ?>" class="form-control" id="tax_deduction_b" placeholder="<?php echo __('Enter tax deduction..'); ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <input type="button" id="taxcal" class="btn btn-primary btn-flat" value="<?php echo __('Calculate Tax'); ?>">
                                                    </div>
                                                    </div>
                                                    <?php if($errors->has('tax_deduction_b')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo $errors->first('tax_deduction_b'); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group<?php echo $errors->has('provident_fund_deduction') ? ' has-error' : ''; ?>">
                                                    <label for="provident_fund_deduction"><?php echo __('Superannuation Fund Deduction'); ?></label>
                                                    <input type="number" name="provident_fund_deduction" value="<?php echo old('provident_fund_deduction'); ?>" class="form-control" id="provident_fund_deduction" placeholder="<?php echo __('Enter superannuation fund deduction..'); ?>">
                                                    <?php if($errors->has('provident_fund_deduction')): ?>
                                                    <span class="help-block">
                                                    <strong><?php echo $errors->first('provident_fund_deduction'); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                    <!-- <div class="form-group<?php echo $errors->has('other_deduction') ? ' has-error' : ''; ?>">
                                                        <label for="other_deduction"><?php echo __('Other Deduction'); ?></label>
                                                        <input type="number" name="other_deduction" value="<?php echo old('other_deduction'); ?>" class="form-control" id="other_deduction" placeholder="<?php echo __('Enter other deduction..'); ?>">
                                                        <?php if($errors->has('other_deduction')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('other_deduction'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div> -->
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- /.end.col -->
                                        <div class="col-md-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                <h3 class="box-title"><?php echo __('Superannuation Fund'); ?></h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                <div class="form-group">
                                                    <label for="total_provident_fund"><?php echo __('Total Superannuation Fund'); ?></label>
                                                    <input type="number" class="form-control" id="total_provident_fund" readonly>
                                                </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- /.end.col -->

                                        <!-- <div class="col-md-offset-6 col-md-6"> -->
                                        <div class="col-md-6">
                                            <div class="box box-danger">
                                                <div class="box-header with-border">
                                                <h3 class="box-title"><?php echo __('Total Salary Details'); ?></h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                <div class="form-group">
                                                    <label for="gross_salary"><?php echo __('Gross Salary'); ?></label>
                                                    <input type="number" disabled class="form-control" id="gross_salary">
                                                </div>
                                                <div class="form-group<?php echo $errors->has('total_deduction') ? ' has-error' : ''; ?>">
                                                    <label for="total_deduction"><?php echo __('Total Deduction'); ?></label>
                                                    <input type="number" disabled class="form-control" id="total_deduction">
                                                </div>
                                                <div class="form-group">
                                                    <label for="net_salary"><?php echo __('Net Salary'); ?></label>
                                                    <input type="number" disabled class="form-control" id="net_salary">
                                                </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- /.end.col -->
                                    </div> 
                                    <!-- /.row -->
                                </div>
                                <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat pull-right"><i class="fa fa-save"></i> <?php echo __('Save Details'); ?></button>
                                </div>
                            </form>
                        <?php else: ?>

                            <?php
                                $payroll = \App\Payroll::where('id', $payroll_id)->first();
                            ?>
                            <form name="employee_salary_form" id="employee_salary_form" action="<?php echo url('/hrm/payroll/payroll_update/' . $payroll_id); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <?php if(isset($employee_id)): ?>
                                <input type="hidden" name="user_id" value="<?php echo $employee_id; ?>">
                            
                                    <input type="hidden" name="employee_type" class="form-control" id="employee_type" value="<?php echo $employee->employee_type; ?>"/>
                                    <input type="hidden" name="resident_status" class="form-control" id="resident_status" value="<?php echo $employee->resident_status; ?>"/>
                                    <input type="hidden" name="no_of_dependent" class="form-control" id="no_of_dependent" value="<?php echo $employee->no_of_dependent; ?>"/>
                                <?php else: ?>
                                    <input type="hidden" name="employee_type" class="form-control" id="employee_type" value="0"/>
                                    <input type="hidden" name="resident_status" class="form-control" id="resident_status" value="0"/>
                                    <input type="hidden" name="no_of_dependent" class="form-control" id="no_of_dependent" value="0"/>
                                <?php endif; ?>
                                <div class="box-body">
                                        <!-- Add your form fields here -->
                                        <?php 
                                            $users = \App\User::orderBy('id', 'desc')->first();
                                            $sl=$users->id;
                                        ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo __('Salary Details'); ?></h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group<?php echo $errors->has('period_definition') ? ' has-error' : ''; ?>">
                                                    <label for="period_definition" class="col-sm-3 control-label"><?php echo __('Period Definition'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="period_definition" class="form-control" id="period_definition" value="FN - Fortnightly <?php echo $sumOfWorkingHours*2; ?> Hours" readonly>
                                                        <?php if($errors->has('period_definition')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('period_definition'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group<?php echo $errors->has('annual_basic') ? ' has-error' : ''; ?>">
                                                    <label for="basic_salary" class="col-sm-3 control-label"><?php echo __('Annual Salary'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="number" name="annual_salary" class="form-control" id="annual_salary" value="<?php echo $payroll->annual_salary; ?>" placeholder="<?php echo __('Enter annual salary..'); ?>">
                                                        <?php if($errors->has('annual_salary')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('annual_salary'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group<?php echo $errors->has('basic_salary') ? ' has-error' : ''; ?>">
                                                    <label for="basic_salary" class="col-sm-3 control-label"><?php echo __('Fortnight Salary'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="number" name="basic_salary" class="form-control" id="basic_salary" value="<?php echo $payroll->basic_salary; ?>" placeholder="<?php echo __('Enter fortnight salary..'); ?>">
                                                        <?php if($errors->has('basic_salary')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('basic_salary'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>    
                                                <div class="form-group<?php echo $errors->has('hrly_salary_rate') ? ' has-error' : ''; ?>">
                                                    <label for="hrly_salary_rate" class="col-sm-3 control-label"><?php echo __('Rate'); ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="number" name="hrly_salary_rate" class="form-control" id="hrly_salary_rate" value="<?php echo $payroll->hrly_salary_rate; ?>" placeholder="<?php echo __('Enter working hours..'); ?>">
                                                        <?php if($errors->has('hrly_salary_rate')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('hrly_salary_rate'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /.end.col -->
                                        <div class="col-md-6">
                                        <div class="box box-success">
                                            <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo __('Allowances'); ?></h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-primary"><?php echo __('House Allowances'); ?></h3>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="col-sm-8" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('hr_place') ? ' has-error' : ''; ?>">
                                                                <label for="hr_place"><?php echo __('Place Name'); ?></label>
                                                                <!-- <div class="col-sm-3"> -->
                                                                    <select name="hr_place" id="hr_place" class="form-control">
                                                                    <option selected disabled><?php echo __('Select place for house allowance'); ?></option>
                                                                    <?php if(isset($loca_places)): ?>
                                                                        <?php $__currentLoopData = $loca_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo $item['id']; ?>"<?php echo $item['id'] == $payroll->hr_place ? 'selected' :  ''; ?>><?php echo $item['places']; ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                    </select>
                                                                    <?php if($errors->has('hr_place')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('hr_place'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                <!-- </div> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('hr_area') ? ' has-error' : ''; ?>">  
                                                                <label for="hr_area"><?php echo __('Area Name'); ?></label>
                                                                <!-- <div class="col-sm-3"> -->
                                                                    <input type="text" name="hr_area" class="form-control" id="hr_area" value="<?php echo $payroll->hr_area; ?>" readonly="true">
                                                                    <?php if($errors->has('hr_area')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('hr_area'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                <!-- </div> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('hra_type') ? ' has-error' : ''; ?>">
                                                                    <!-- <label for="hra_type" class="col-sm-4 control-label" style="padding: unset;"><?php echo __('Housing Allowance Type'); ?></label> -->
                                                                    <label for="hra_type"><?php echo __('Housing Allowance Type'); ?></label>
                                                                    <select name="hra_type" class="form-control" id="hra_type">
                                                                        <option selected disabled><?php echo __('Select One'); ?></option>
                                                                        <option value="1" <?php echo $payroll->hra_type == 1 ? 'selected' : ''; ?>><?php echo __('Rental'); ?></option>
                                                                        <option value="2" <?php echo $payroll->hra_type == 2 ? 'selected' : ''; ?>><?php echo __('Kind'); ?></option>
                                                                        <option value="3" <?php echo $payroll->hra_type == 3 ? 'selected' : ''; ?>><?php echo __('Not Applicable'); ?></option>
                                                                    </select>
                                                                    <?php if($errors->has('hra_type')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('hra_type'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('hra_amount_per_week') ? ' has-error' : ''; ?>">
                                                                    <label for="hra_amount_per_week"><?php echo __('House Rent/Purchase Amount'); ?></label>
                                                                    <input type="number" name="hra_amount_per_week" value="<?php echo $payroll->hra_amount_per_week; ?>" class="form-control" id="hra_amount_per_week" placeholder="<?php echo __('Enter amount ..'); ?>">
                                                                    <?php if($errors->has('hra_amount_per_week')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('hra_amount_per_week'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('house_rent_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="house_rent_allowance"><?php echo __('Housing Allowance'); ?></label>
                                                                <input type="number" name="house_rent_allowance" value="<?php echo old('house_rent_allowance'); ?>" class="form-control"  id="house_rent_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                                                                <?php if($errors->has('house_rent_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('house_rent_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-primary"><?php echo __('Vehicle Allowances'); ?></h3>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('va_type') ? ' has-error' : ''; ?>">
                                                                    <label for="va_type"><?php echo __('Vehicle Allowance Type'); ?></label>
                                                                    <select name="va_type" class="form-control" id="va_type">
                                                                        <option selected disabled><?php echo __('Select One'); ?></option>
                                                                        <option value="1" <?php echo $payroll->va_type == 1 ? 'selected' : ''; ?>><?php echo __('With Fuel'); ?></option>
                                                                        <option value="2" <?php echo $payroll->va_type == 2 ? 'selected' : ''; ?>><?php echo __('Without Fuel'); ?></option>
                                                                        <option value="3" <?php echo $payroll->va_type == 3 ? 'selected' : ''; ?>><?php echo __('Not Applicable'); ?></option>
                                                                    </select>
                                                                    <?php if($errors->has('va_type')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('va_type'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('vehicle_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="vehicle_allowance"><?php echo __('Vehicle Allowance'); ?></label>
                                                                <input type="number" name="vehicle_allowance" value="<?php echo $payroll->vehicle_allowance; ?>" class="form-control" id="vehicle_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                                                                <?php if($errors->has('vehicle_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('vehicle_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-primary"><?php echo __('Other Allowances'); ?></h3>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('meals_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="meals_allowance"><?php echo __('Meals (Messing) Allowance'); ?></label> 
                                                                    <input type="checkbox" style="margin-left: 10px; margin-top: unset" name="meals_tag" id="meals_tag" value="0" >
                                                                    <input type="number" name="meals_allowance" value="<?php echo old('meals_allowance'); ?>" class="form-control" id="meals_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                                                                    <?php if($errors->has('meals_allowance')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('meals_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('medical_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="medical_allowance"><?php echo __('Medical Allowance'); ?></label>
                                                                <input type="number" name="medical_allowance" value="<?php echo old('medical_allowance'); ?>" class="form-control" id="medical_allowance" placeholder="<?php echo __('Enter medical allowance..'); ?>">
                                                                <?php if($errors->has('medical_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('medical_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('special_allowance') ? ' has-error' : ''; ?>">
                                                                <label for="special_allowance"><?php echo __('Telephone Allowance'); ?></label>
                                                                <input type="number" name="special_allowance" value="<?php echo old('special_allowance'); ?>" class="form-control" id="special_allowance" placeholder="<?php echo __('Enter telephone allowance..'); ?>">
                                                                <?php if($errors->has('special_allowance')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo $errors->first('special_allowance'); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('other_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="other_allowance"><?php echo __('Servant Allowance'); ?></label>
                                                                    <input type="number" name="other_allowance" value="<?php echo old('other_allowance'); ?>" class="form-control" id="other_allowance" placeholder="<?php echo __('Enter domestic servant allowance..'); ?>">
                                                                    <?php if($errors->has('other_allowance')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('other_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: unset;">
                                                                <div class="form-group<?php echo $errors->has('electricity_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="electricity_allowance"><?php echo __('Electricity Allowance'); ?></label>
                                                                    <input type="number" name="electricity_allowance" value="<?php echo old('electricity_allowance'); ?>" class="form-control" id="electricity_allowance" placeholder="<?php echo __('Enter electricity allowance..'); ?>">
                                                                    <?php if($errors->has('electricity_allowance')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo $errors->first('electricity_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-right: unset;">
                                                                <div class="form-group<?php echo $errors->has('security_allowance') ? ' has-error' : ''; ?>">
                                                                    <label for="security_allowance"><?php echo __('Security Allowance'); ?></label>
                                                                    <input type="number" name="security_allowance" value="<?php echo old('security_allowance'); ?>" class="form-control" id="security_allowance" placeholder="<?php echo __('Enter security allowance..'); ?>">
                                                                    <?php if($errors->has('security_allowance')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo $errors->first('security_allowance'); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-sm-12" style="padding-left: unset;">
                                                    <div class="form-group<?php echo $errors->has('provident_fund_contribution') ? ' has-error' : ''; ?>">
                                                        <label for="provident_fund_contribution"><?php echo __('Superannuation Fund Contribution'); ?></label>
                                                        <input type="number" name="provident_fund_contribution" value="<?php echo old('provident_fund_contribution'); ?>" class="form-control" id="provident_fund_contribution" placeholder="<?php echo __('Enter superannuation fund contribution..'); ?>">
                                                        <?php if($errors->has('provident_fund_contribution')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('provident_fund_contribution'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        </div>
                                        <!-- /.end.col -->
                                        <div class="col-md-6">
                                            <div class="box box-warning">
                                                <div class="box-header with-border">
                                                <h3 class="box-title"><?php echo __('Deductions'); ?></h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                <div class="col-sm-12" style="padding-left: unset;">
                                                    <div class="form-group<?php echo $errors->has('tax_deduction_a') ? ' has-error' : ''; ?>">
                                                    <label for="tax_deduction_a"><?php echo __('Tax Deduction (A)'); ?></label>
                                                    <input type="number" name="tax_deduction_a" value="<?php echo old('tax_deduction_a'); ?>" class="form-control" id="tax_deduction_a" placeholder="<?php echo __('Enter tax deduction..'); ?>" readonly>
                                                    <?php if($errors->has('tax_deduction_a')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo $errors->first('tax_deduction_a'); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-8" style="padding-left: unset;">
                                                    <div class="form-group<?php echo $errors->has('tax_deduction_b') ? ' has-error' : ''; ?>">
                                                    <label for="tax_deduction_b"><?php echo __('Tax Deduction (B)'); ?></label>
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                    <input type="number" name="tax_deduction_b" value="<?php echo old('tax_deduction_b'); ?>" class="form-control" id="tax_deduction_b" placeholder="<?php echo __('Enter tax deduction..'); ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <input type="button" id="taxcal" class="btn btn-primary btn-flat" value="<?php echo __('Calculate Tax'); ?>">
                                                    </div>
                                                    </div>
                                                    <?php if($errors->has('tax_deduction_b')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo $errors->first('tax_deduction_b'); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group<?php echo $errors->has('provident_fund_deduction') ? ' has-error' : ''; ?>">
                                                    <label for="provident_fund_deduction"><?php echo __('Superannuation Fund Deduction'); ?></label>
                                                    <input type="number" name="provident_fund_deduction" value="<?php echo old('provident_fund_deduction'); ?>" class="form-control" id="provident_fund_deduction" placeholder="<?php echo __('Enter superannuation fund deduction..'); ?>">
                                                    <?php if($errors->has('provident_fund_deduction')): ?>
                                                    <span class="help-block">
                                                    <strong><?php echo $errors->first('provident_fund_deduction'); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                    <!-- <div class="form-group<?php echo $errors->has('other_deduction') ? ' has-error' : ''; ?>">
                                                        <label for="other_deduction"><?php echo __('Other Deduction'); ?></label>
                                                        <input type="number" name="other_deduction" value="<?php echo old('other_deduction'); ?>" class="form-control" id="other_deduction" placeholder="<?php echo __('Enter other deduction..'); ?>">
                                                        <?php if($errors->has('other_deduction')): ?>
                                                        <span class="help-block">
                                                        <strong><?php echo $errors->first('other_deduction'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div> -->
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- /.end.col -->
                                        <div class="col-md-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                <h3 class="box-title"><?php echo __('Superannuation Fund'); ?></h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                <div class="form-group">
                                                    <label for="total_provident_fund"><?php echo __('Total Superannuation Fund'); ?></label>
                                                    <input type="number" class="form-control" id="total_provident_fund" readonly>
                                                </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- /.end.col -->

                                        <!-- <div class="col-md-offset-6 col-md-6"> -->
                                        <div class="col-md-6">
                                            <div class="box box-danger">
                                                <div class="box-header with-border">
                                                <h3 class="box-title"><?php echo __('Total Salary Details'); ?></h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                <div class="form-group">
                                                    <label for="gross_salary"><?php echo __('Gross Salary'); ?></label>
                                                    <input type="number" disabled class="form-control" id="gross_salary">
                                                </div>
                                                <div class="form-group<?php echo $errors->has('total_deduction') ? ' has-error' : ''; ?>">
                                                    <label for="total_deduction"><?php echo __('Total Deduction'); ?></label>
                                                    <input type="number" disabled class="form-control" id="total_deduction">
                                                </div>
                                                <div class="form-group">
                                                    <label for="net_salary"><?php echo __('Net Salary'); ?></label>
                                                    <input type="number" disabled class="form-control" id="net_salary">
                                                </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- /.end.col -->
                                    </div> 
                                    <!-- /.row -->
                                </div>
                                <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat pull-right"><i class="fa fa-save"></i> <?php echo __('Save Details'); ?></button>
                                </div>
                        </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <!-- Contact Information Tab -->
            <div role="tabpanel" class="tab-pane" id="contactInfoTab">
                <div class="panel-body">
                    <!-- Contact Information Form -->
                    <!-- Add your Contact Information form here -->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo __('EMPLOYEE CONTACT INFORMATION'); ?></h3>

                            <!-- <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div> -->
                        </div>
                        <?php if(isset($employee_id) && $employee_id!=0): ?>
                            <?php 
                                //Get Employees
                                //$employee = \App\User::where('id', $employee_id)->first();
                                $emp_id = $employee_id;
                            ?>
                            <div class="col-md-12">
                                <!-- Default box -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?php echo __('Employee Details'); ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="employee_id"><?php echo __('ID'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <span><?php echo __('EMPID'); ?><?php echo $employee->id; ?></span>
                                                </div>
                                                <div class="col-md-3">
                                                <label for="user_id"><?php echo __('Employee Name'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $employee->id; ?>">
                                                    <span><?php echo $employee->name; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- /. end col -->
                            </div>
                                <!-- /.box-body -->
                            <div class="box-footer clearfix"></div>
                                <!-- /.box-footer -->
                                <!-- /.box -->
                            <!-- /.end.col -->
                        <?php else: ?>
                            <?php $emp_id = 0; ?>
                        <?php endif; ?>

                        <!-- Contact Form Condition in case of employee id exist -->
                        <?php 
                            //Get Employees
                            if (isset($employee_id)){
                                $employee_contact = \App\EmployeeContact::where('employee_id', $employee_id)->first();
                            }
                            if(isset($employee_contact) && !empty($employee_contact)){
                                //Update Employee Contact Form
                            ?>
                                <form action="<?php echo url('/employee_contacts/update/'. $employee_contact->id); ?>" method="post" name="employee_update_contact_form">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $emp_id; ?>">
                                    <input type="hidden" name="employee_id" class="form-control" id="employee_id" value="<?php echo $emp_id; ?>">
                                    <div class="box-body">
                                            <!-- Add your form fields here -->
                                                <div class="col-md-12">
                                                    <label for="employee_contact_name"><?php echo __('Contact Name'); ?> <span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_name') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_name" id="employee_contact_name" class="form-control" value="<?php echo $employee_contact->employee_contact_name; ?>" placeholder="<?php echo __('Enter name..'); ?>">
                                                        <?php if($errors->has('employee_contact_name')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_name'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="employee_contact_address"><?php echo __('Address'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_address') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_address" id="employee_contact_address" class="form-control" value="<?php echo $employee_contact->employee_contact_address; ?>" placeholder="<?php echo __('Enter contact address..'); ?>">
                                                        <?php if($errors->has('employee_contact_address')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_employee_contact_address'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->
                                                <div class="col-md-6">
                                                    <label for="employee_contact_phone"><?php echo __('Phone'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_phone') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_phone" id="employee_contact_phone" class="form-control" value="<?php echo $employee_contact->employee_contact_phone; ?>" placeholder="<?php echo __('Enter phone no..'); ?>">
                                                        <?php if($errors->has('employee_contact_phone')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_phone'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->
                                                <div class="col-md-6">
                                                    <label for="employee_contact_mobile"><?php echo __('Mobile'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_mobile') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_mobile" id="employee_contact_mobile" class="form-control" value="<?php echo $employee_contact->employee_contact_mobile; ?>" placeholder="<?php echo __('Enter mobile no..'); ?>">
                                                        <?php if($errors->has('employee_contact_mobile')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_mobile'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->
        
                                                
                                                <div class="col-md-6">
                                                    <label for="employee_contact_email"><?php echo __('employee_contact_email'); ?> <span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_email') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_email" id="employee_contact_email" class="form-control" value="<?php echo $employee_contact->employee_contact_email; ?>" placeholder="<?php echo __('Enter employee_contact_email address..'); ?>">
                                                        <?php if($errors->has('employee_contact_email')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_email'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
        
                                                <!-- /.form-group -->
                                                <div class="col-md-6">
                                                    <label for="employee_contact_relationship"><?php echo __('Relation'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_relationship') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_relationship" id="employee_contact_relationship" class="form-control" value="<?php echo $employee_contact->employee_contact_relationship; ?>" placeholder="<?php echo __('Enter relation..'); ?>">
                                                        <?php if($errors->has('employee_contact_relationship')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('contact_no_'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->                        </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __('Update Contact'); ?></button>
                                    </div>
                                </form>
                                
                            <?php } else { ?>
                                <!-- Insert Employee Contact Form -->
                                <form action="<?php echo url('/employee_contacts/store/'.$emp_id); ?>" method="post" name="employee_add_contact_form">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $emp_id; ?>">
                                    <input type="hidden" name="employee_id" class="form-control" id="employee_id" value="<?php echo $emp_id; ?>">
                                    <div class="box-body">
                                            <!-- Add your form fields here -->
                                                <div class="col-md-12">
                                                    <label for="employee_contact_name"><?php echo __('Contact Name'); ?> <span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_name') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_name" id="employee_contact_name" class="form-control" value="<?php echo old('employee_contact_name'); ?>" placeholder="<?php echo __('Enter name..'); ?>">
                                                        <?php if($errors->has('employee_contact_name')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_name'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="employee_contact_address"><?php echo __('Address'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_address') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_address" id="employee_contact_address" class="form-control" value="<?php echo old('employee_contact_address'); ?>" placeholder="<?php echo __('Enter contact address..'); ?>">
                                                        <?php if($errors->has('employee_contact_address')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_employee_contact_address'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->
                                                <div class="col-md-6">
                                                    <label for="employee_contact_phone"><?php echo __('Phone'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_phone') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_phone" id="employee_contact_phone" class="form-control" value="<?php echo old('employee_contact_phone'); ?>" placeholder="<?php echo __('Enter phone no..'); ?>">
                                                        <?php if($errors->has('employee_contact_phone')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_phone'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->
                                                <div class="col-md-6">
                                                    <label for="employee_contact_mobile"><?php echo __('Mobile'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_mobile') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_mobile" id="employee_contact_mobile" class="form-control" value="<?php echo old('employee_contact_mobile'); ?>" placeholder="<?php echo __('Enter mobile no..'); ?>">
                                                        <?php if($errors->has('employee_contact_mobile')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_mobile'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->
        
                                                
                                                <div class="col-md-6">
                                                    <label for="employee_contact_email"><?php echo __('employee_contact_email'); ?> <span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_email') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_email" id="employee_contact_email" class="form-control" value="<?php echo old('employee_contact_email'); ?>" placeholder="<?php echo __('Enter employee_contact_email address..'); ?>">
                                                        <?php if($errors->has('employee_contact_email')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('employee_contact_email'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
        
                                                <!-- /.form-group -->
                                                <div class="col-md-6">
                                                    <label for="employee_contact_relationship"><?php echo __('Relation'); ?><span class="text-danger">*</span></label>
                                                    <div class="form-group<?php echo $errors->has('employee_contact_relationship') ? ' has-error' : ''; ?> has-feedback">
                                                        <input type="text" name="employee_contact_relationship" id="employee_contact_relationship" class="form-control" value="<?php echo old('employee_contact_relationship'); ?>" placeholder="<?php echo __('Enter relation..'); ?>">
                                                        <?php if($errors->has('employee_contact_relationship')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo $errors->first('contact_no_'); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                    <!-- /.form-group -->                        </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __('Save Contact'); ?></button>
                                    </div>
                                </form>
                           <?php }
                        ?>
                    </div>
            
                </div>
            </div>

            <!-- Leave Details Tab -->
            <div role="tabpanel" class="tab-pane" id="leaveDetailsTab">
                <div class="panel-body">
                    <!-- Leave Details Form -->
                    <!-- Add your Leave Details form here -->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo __('EMPLOYEE LEAVE DETAILS'); ?></h3>
                        </div>
                        <?php if(isset($employee_id)): ?>
                            <?php 
                                //Get Employees
                                $employee = \App\User::where('id', $employee_id)->first();
                            ?>
                            <div class="col-md-12">
                                <!-- Default box -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?php echo __('Employee Details'); ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="employee_id"><?php echo __('ID'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <span><?php echo __('EMPID'); ?><?php echo $employee->id; ?></span>
                                                </div>
                                                <div class="col-md-3">
                                                <label for="user_id"><?php echo __('Employee Name'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $employee->id; ?>">
                                                    <span><?php echo $employee->name; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- /. end col -->
                            </div>
                                <!-- /.box-body -->
                            <div class="box-footer clearfix"></div>
                                <!-- /.box-footer -->
                                <!-- /.box -->
                            <!-- /.end.col -->
                        <?php endif; ?>
                        <form action="<?php echo url('people/employees/store'); ?>" method="post" name="employee_add_form">
                            <?php echo csrf_field(); ?>

                            <div class="box-body">
                                <!-- Add your form fields here -->
                                <?php 
                                    $users = \App\User::orderBy('id', 'desc')->first();
                                    $sl = $users->id;
                                ?>
                                <!-- Sick Leave, Annual Leave, Long Service Leave Section -->
                                <div class="col-md-4">
                                    <h4><?php echo __('Sick Leave'); ?></h4>
                                    <div class="form-group<?php echo $errors->has('sick_leave_balance') ? ' has-error' : ''; ?>">
                                        <label for="sick_leave_balance"><?php echo __('C/F Balance Leave'); ?></label>
                                        <input type="number" name="sick_leave_balance" id="sick_leave_balance" class="form-control" value="<?php echo old('sick_leave_balance'); ?>" placeholder="<?php echo __('Enter balance leave..'); ?>">
                                        <?php if($errors->has('sick_leave_balance')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('sick_leave_balance'); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo $errors->has('sick_leave_date') ? ' has-error' : ''; ?>">
                                        <label for="sick_leave_date"><?php echo __('C/F Date'); ?></label>
                                        <input type="date" name="sick_leave_date" id="sick_leave_date" class="form-control" value="<?php echo old('sick_leave_date'); ?>">
                                        <?php if($errors->has('sick_leave_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('sick_leave_date'); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4><?php echo __('Annual Leave'); ?></h4>
                                    <div class="form-group<?php echo $errors->has('annual_leave_balance') ? ' has-error' : ''; ?>">
                                        <label for="annual_leave_balance"><?php echo __('C/F Balance Leave'); ?></label>
                                        <input type="number" name="annual_leave_balance" id="annual_leave_balance" class="form-control" value="<?php echo old('annual_leave_balance'); ?>" placeholder="<?php echo __('Enter balance leave..'); ?>">
                                        <?php if($errors->has('annual_leave_balance')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('annual_leave_balance'); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo $errors->has('annual_leave_date') ? ' has-error' : ''; ?>">
                                        <label for="annual_leave_date"><?php echo __('C/F Date'); ?></label>
                                        <input type="date" name="annual_leave_date" id="annual_leave_date" class="form-control" value="<?php echo old('annual_leave_date'); ?>">
                                        <?php if($errors->has('annual_leave_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('annual_leave_date'); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4><?php echo __('Long Service Leave'); ?></h4>
                                    <div class="form-group<?php echo $errors->has('long_service_leave_balance') ? ' has-error' : ''; ?>">
                                        <label for="long_service_leave_balance"><?php echo __('C/F Balance Leave'); ?></label>
                                        <input type="number" name="long_service_leave_balance" id="long_service_leave_balance" class="form-control" value="<?php echo old('long_service_leave_balance'); ?>" placeholder="<?php echo __('Enter balance leave..'); ?>">
                                        <?php if($errors->has('long_service_leave_balance')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('long_service_leave_balance'); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo $errors->has('long_service_leave_date') ? ' has-error' : ''; ?>">
                                        <label for="long_service_leave_date"><?php echo __('C/F Date'); ?></label>
                                        <input type="date" name="long_service_leave_date" id="long_service_leave_date" class="form-control" value="<?php echo old('long_service_leave_date'); ?>">
                                        <?php if($errors->has('long_service_leave_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo $errors->first('long_service_leave_date'); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="<?php echo url('/people/employees'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo __('Cancel'); ?> </a>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __('Add'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Superannuation Tab -->
            <div role="tabpanel" class="tab-pane" id="superannuationTab">
                <div class="panel-body">
                    <!-- Superannuation Form -->
                    <!-- Add your Superannuation form here -->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo __('EMPLOYEE SUPERANNUATION'); ?></h3>
                        </div>
                        <?php if(isset($employee_id)): ?>
                            <?php 
                                //Get Employees
                                $employee = \App\User::where('id', $employee_id)->first();
                            ?>
                            <div class="col-md-12">
                                <!-- Default box -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?php echo __('Employee Details'); ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="employee_id"><?php echo __('ID'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <span><?php echo __('EMPID'); ?><?php echo $employee->id; ?></span>
                                                </div>
                                                <div class="col-md-3">
                                                <label for="user_id"><?php echo __('Employee Name'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $employee->id; ?>">
                                                    <span><?php echo $employee->name; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- /. end col -->
                            </div>
                                <!-- /.box-body -->
                            <div class="box-footer clearfix"></div>
                                <!-- /.box-footer -->
                                <!-- /.box -->
                            <!-- /.end.col -->
                        <?php endif; ?>
                        <form action="<?php echo url('people/employees/store'); ?>" method="post" name="employee_add_form">
                            <?php echo csrf_field(); ?>

                            <div class="box-body">
                                <!-- Employee Superannuation Section -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <span><strong>1</strong> - Superannuation</span>
                                        <select class="form-control" id="sup_id-1">
                                            <option value="0">Select - Superannuation</option>
                                            <option value="1" selected>NPF - NATIONAL SUPERANNUATION FUND</option>
                                            <option value="2">NPFH - NASFUND HOUSING</option>
                                            <option value="3">NSL - NAMBAWAN SUPERANNUATION FUND</option>
                                            <option value="4">NSLH - Nambawan Super Limited Housing</option>
                                            <option value="5">NPS - National Pension Scheme</option>
                                            <option value="6">LIC1 - Life Insurance</option>
                                            <option value="7">NPMM - National PPF</option>
                                        </select>
                                        <span>Superannuation No.:</span>
                                        <input type="text" class="form-control" value="99056" id="sup_no-1">
                                        <span>Commence Date</span>
                                        <input type="date" min="1900-01-01" max="3000-01-01" class="form-control" value="2013-03-21" id="sup_commence-1">
                                    </div>
                                    <div class="col-md-6">
                                        <span><strong>2</strong> - Superannuation</span>
                                        <select class="form-control" id="sup_id-2">
                                            <option value="0" selected>Select - Superannuation</option>
                                            <option value="1">NPF - NATIONAL SUPERANNUATION FUND</option>
                                            <option value="2">NPFH - NASFUND HOUSING</option>
                                            <option value="3">NSL - NAMBAWAN SUPERANNUATION FUND</option>
                                            <option value="4">NSLH - Nambawan Super Limited Housing</option>
                                            <option value="5">NPS - National Pension Scheme</option>
                                            <option value="6">LIC1 - Life Insurance</option>
                                            <option value="7">NPMM - National PPF</option>
                                        </select>
                                        <span>Superannuation No.:</span>
                                        <input type="text" class="form-control" value="" id="sup_no-2">
                                        <span>Commence Date</span>
                                        <input type="date" min="1900-01-01" max="3000-01-01" class="form-control" value="" id="sup_commence-2">
                                    </div>
                                    <div class="col-md-6">
                                        <span><strong>3</strong> - Superannuation</span>
                                        <select class="form-control" id="sup_id-3">
                                            <option value="0" selected>Select - Superannuation</option>
                                            <option value="1">NPF - NATIONAL SUPERANNUATION FUND</option>
                                            <option value="2">NPFH - NASFUND HOUSING</option>
                                            <option value="3">NSL - NAMBAWAN SUPERANNUATION FUND</option>
                                            <option value="4">NSLH - Nambawan Super Limited Housing</option>
                                            <option value="5">NPS - National Pension Scheme</option>
                                            <option value="6">LIC1 - Life Insurance</option>
                                            <option value="7">NPMM - National PPF</option>
                                        </select>
                                        <span>Superannuation No.:</span>
                                        <input type="text" class="form-control" value="" id="sup_no-3">
                                        <span>Commence Date</span>
                                        <input type="date" min="1900-01-01" max="3000-01-01" class="form-control" value="" id="sup_commence-3">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="<?php echo url('/people/employees'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo __('Cancel'); ?> </a>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __('Add'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bank Credits Tab -->
            <div role="tabpanel" class="tab-pane" id="bankCreditsTab">
                <div class="panel-body">
                    <!-- Bank Credits Form -->
                    <!-- Add your Bank Credits form here -->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo __('BANK CREDITS'); ?></h3>
                        </div>
                        <?php if(isset($employee_id)): ?>
                            <?php 
                                //Get Employees
                                $employee = \App\User::where('id', $employee_id)->first();
                            ?>
                            <div class="col-md-12">
                                <!-- Default box -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?php echo __('Employee Details'); ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="employee_id"><?php echo __('ID'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <span><?php echo __('EMPID'); ?><?php echo $employee->id; ?></span>
                                                </div>
                                                <div class="col-md-3">
                                                <label for="user_id"><?php echo __('Employee Name'); ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $employee->id; ?>">
                                                    <span><?php echo $employee->name; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- /. end col -->
                            </div>
                                <!-- /.box-body -->
                            <div class="box-footer clearfix"></div>
                                <!-- /.box-footer -->
                                <!-- /.box -->
                            <!-- /.end.col -->
                        <?php endif; ?>
                        <form action="<?php echo url('people/employees/store'); ?>" method="post" name="employee_add_form">
                            <?php echo csrf_field(); ?>

                            <div class="box-body">
                                <!-- Bank Details Section -->
                                <div class="row">
                                    <div class="col-md-12">
                                    <strong>BC#: 1</strong>
                                        <select class="form-control" id="bankdet_id">
                                            <option value="0"> Select Bank Detail</option>
                                            <option value="1">032001-Test West Pac Bank</option>
                                            <option value="2" selected>2-Bank South Pacific</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="1000234569" id="acct_no" placeholder="Account No">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="S Mathew" id="acct_name" placeholder="Account Name">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="" id="acct_add" placeholder="Address">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="" id="acct_city" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="" id="acct_email" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" maxlength="2" value="" id="acct_ccode" placeholder="Country Code">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="<?php echo url('/people/employees'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo __('Cancel'); ?> </a>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __('Add'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
     
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to open the specified tab
        function openTab(tabId) {
            var tabLink = document.querySelector('a[aria-controls="' + tabId + '"]');
            if (tabLink) {
                tabLink.click();
            }
        }
        // Check if the form submission was successful
        var message = "<?php echo session('message'); ?>";
        var submittedForm = "<?php echo session('submitted_form'); ?>";

        if (message && submittedForm) {
            if (submittedForm === 'add_employee_form') {
                openTab('payrollDetailsTab');
            } else if (submittedForm === 'add_payroll_form') {
                openTab('contactInfoTab');
            } else if (submittedForm === 'add_contact_form') {
                openTab('leaveDetailsTab');
            }  else if (submittedForm === 'update_contact_form') {
                openTab('leaveDetailsTab');
            } else if (submittedForm === 'add_leave_form') {
                openTab('superannuationTab');
            } else if (submittedForm === 'add_superannuation_form') {
                openTab('bankCreditsTab');
            }
        } else {
            // Open the Add Employee tab by default
            openTab('personalDetailsTab');
        }
    });
</script>




<script type="text/javascript">
    document.forms['employee_add_form'].elements['gender'].value = "<?php echo old('gender'); ?>";
        document.forms['employee_add_form'].elements['id_name'].value = "<?php echo old('id_name'); ?>";
    document.forms['employee_add_form'].elements['designation_id'].value = "<?php echo old('designation_id'); ?>";
    document.forms['employee_add_form'].elements['role'].value = "<?php echo old('role'); ?>";
    document.forms['employee_add_form'].elements['joining_position'].value = "<?php echo old('joining_position'); ?>";
    document.forms['employee_add_form'].elements['marital_status'].value = "<?php echo old('marital_status'); ?>";
</script>


<script>
    (function($){
        $(document).ready(function(){
            $("#hr_place").on("change", function(){
                  var hra_place_id = $("#hr_place").val();
                  console.log(hra_place_id);
                  if(hra_place_id >= 1) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/hra_area_src'); ?>" + "/" + hra_place_id,
                        success: function(response) {
                            $("#hr_area").val(response);
                            hra_area1 = $("#hr_area").val();
                            if(hra_area1 == "" || hra_area1 == 'Area 3') {
                              $('#hra_amount_per_week').attr('readonly', true);
                              $('#hra_type').attr('readonly', true);
                              $('#hra_amount_per_week').val('');
                              $('#house_rent_allowance').val('');
                            }else{
                              $('#hra_amount_per_week').attr('readonly', false);
                              $('#hra_type').attr('readonly', false);                  
                              $('#hra_amount_per_week').val('');
                              $('#house_rent_allowance').val('');
                            }
                        },
                        error:function(err){

                        }
                    })
                  }
                  //$("#hr_area").val(hra_area1);
                  // hra_area1 = $("#hr_area").val();
                  // if(hra_area1 == "" || hra_area1 == 'Area 3') {
                  //   $('#hra_amount_per_week').attr('readonly', true);
                  //   $('#hra_type').attr('readonly', true);
                  //   $('#hra_amount_per_week').val('');
                  //   $('#house_rent_allowance').val('');
                  // }else{
                  //   $('#hra_amount_per_week').attr('readonly', false);
                  //   $('#hra_type').attr('readonly', false);                  
                  //   $('#hra_amount_per_week').val('');
                  //   $('#house_rent_allowance').val('');
                  // }
            })

            $("#hra_amount_per_week").on("keyup", function(){
                var hra_rent = $("#hra_amount_per_week").val();
                var hra_type = $("#hra_type").val();

                  if(parseInt(hra_rent) >0 ){
                    if(hra_type == 0 || hra_type == null){
                      alert("Please select Housing Allowance Type...");
                      $("#hra_amount_per_week").val('');
                      return;
                    }
                  }else{
                    $("#house_rent_allowance").val(0);
                    return;
                  }

                var area_type = $("#hr_area").val(); //'Area 1';
                if(hra_rent) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/hra'); ?>" + "/" + hra_rent + "/" + hra_type+ "/" + area_type,
                        success: function(response) {
                            console.log(response);
                            $("#house_rent_allowance").val(response);
                        },
                        error:function(err){

                        }
                    })
                }
            })
            
            $("#va_type").on("change", function(){
                // alert("finally bye");
                var va_type = $("#va_type").val();
                if(va_type>=1 && va_type<=2) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/vehicle'); ?>" + "/" + va_type,
                        success: function(response) {
                            console.log(response);
                            $("#vehicle_allowance").val(response);
                        },
                        error:function(err){

                        }
                    })
                } else {
                  $("#vehicle_allowance").val('');
                  return;
                }
            })

            $("#meals_tag").on("click", function(){
                var meals_type = $("#meals_tag").is(":checked");
                if(meals_type) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/meals'); ?>" + "/" + '3',
                        success: function(response) {
                            console.log(response);
                            $("#meals_allowance").val(response);
                        },
                        error:function(err){

                        }
                    })
                }else{
                  $("#meals_allowance").val('');
                  return;
                }
            })

            $("#overtime_hrs").on("keyup", function(){
                var overtime_hrs = $("#overtime_hrs").val();
                var overtime_rate = $("#overtime_rate").val();
                var overtime_amt = +overtime_hrs * +overtime_rate;
                $("#overtime_amt").val(overtime_amt);
            })
            $("#overtime_rate").on("keyup", function(){
                var overtime_hrs = $("#overtime_hr").val();
                var overtime_rate = $("#overtime_rate").val();
                var overtime_amt = +overtime_hrs * +overtime_rate;
                $("#overtime_amt").val(overtime_amt);
            })

            $("#taxcal").on("click", function(){
                 //alert("finally bye");
                var gross_sal = $("#gross_salary").val();
                var dependent = $("#no_of_dependent").val();
                if(dependent == ""){
                  dependent = 0;
                }
                var resident_status = $("#resident_status").val();
                if(gross_sal == 0 || gross_sal == '' || resident_status == null){
                  return;
                }
                console.log('Gross Sal'+gross_sal);
                console.log("Dependent"+dependent);
                $.ajax({
                    type: "get",
                    url: "<?php echo secure_url('/hrm/payroll/taxcal'); ?>" + "/" + gross_sal + "/" + dependent + "/" + resident_status,
                    success: function(response) {
                        console.log(response);
                        $("#tax_deduction_a").val(parseFloat(response.frt_tax_amt).toFixed(2));
                        calculation();
                    },
                    error:function(err){
                        console.log('Error: '+err);
                    }
                })
            })

      });
    })(jQuery);
</script>

<script type="text/javascript">
  // For Kepp Data After Reload
  //document.forms['employee_select_form'].elements['user_id'].value = "<?php echo session('inserted_id'); ?>";

  <?php if(!empty(old('employee_type'))): ?>
    document.forms['employee_salary_form'].elements['employee_type'].value = "<?php echo old('employee_type'); ?>";
  <?php endif; ?>

 
  $(document).ready(function(){
    calculation();
  });


  //For Calculation
  $(document).on("keyup", "#employee_salary_form", function() {
    calculation();
    tax_calculation();
  });

  function calculation() {
    var sum = 0;
    var basic_salary = $("#basic_salary").val();
    //var overtime_amt = $("#overtime_amt").val();
    //var sales_comm = $("#sales_comm").val();
    var house_rent_allowance = $("#house_rent_allowance").val();
    var vehicle_allowance = $("#vehicle_allowance").val();
    var meals_allowance = $("#meals_allowance").val();
    var electricity_allowance = $("#electricity_allowance").val();
    var security_allowance = $("#security_allowance").val();
    var medical_allowance = $("#medical_allowance").val();
    var special_allowance = $("#special_allowance").val(); // Telephone
    var provident_fund_contribution = $("#provident_fund_contribution").val();
    var other_allowance = $("#other_allowance").val();  //Servant
    var tax_deduction_a = $("#tax_deduction_a").val();
    var tax_deduction_a = $("#tax_deduction_a").val();
    var provident_fund_deduction = $("#provident_fund_deduction").val();
    // var other_deduction = $("#other_deduction").val();

    //var gross_salary = (basic_salary + house_rent_allowance + vehicle_allowance + meals_allowance + electricity_allowance + security_allowance + medical_allowance + special_allowance + other_allowance);
    //var gross_salary = (+basic_salary + +house_rent_allowance + +vehicle_allowance + +meals_allowance + +electricity_allowance + +security_allowance + +medical_allowance + +special_allowance + +other_allowance);
    //var gross_salary = +basic_salary + +overtime_amt + +sales_comm + +house_rent_allowance + +medical_allowance + +special_allowance + +other_allowance + +vehicle_allowance + +meals_allowance + +electricity_allowance + +security_allowance;
    
    var gross_salary = +basic_salary + +house_rent_allowance + +medical_allowance + +special_allowance + +other_allowance + +vehicle_allowance + +meals_allowance + +electricity_allowance + +security_allowance;
    console.log('gross_salary'+gross_salary);
    //var total_deduction = parseFloat(+tax_deduction + +provident_fund_deduction + +other_deduction);
    var total_deduction = +tax_deduction_a + +provident_fund_deduction;

    $("#total_provident_fund").val(+provident_fund_contribution + +provident_fund_deduction);

    $("#gross_salary").val(gross_salary);
    $("#total_deduction").val(total_deduction);
    $("#net_salary").val((+gross_salary - +total_deduction).toFixed(2));
  }

    function tax_calculation(){
      var gross_sal = $("#gross_salary").val();
        var dependent =  $("#no_of_dependent").val();
        var resident_status = $("#resident_status").val();

        console.log('Gross Sal'+gross_sal);
        console.log("Dependent"+dependent);
        console.log("Resident Status"+resident_status);
        $.ajax({
            type: "get",
            url: "<?php echo secure_url('/hrm/payroll/taxcal'); ?>" + "/" + gross_sal + "/" + dependent + "/" + resident_status,
            success: function(response) {
                console.log(response);
                $("#tax_deduction_a").val(parseFloat(response.frt_tax_amt).toFixed(2));
                calculation();
            },
            error:function(err){
                console.log('Error: '+err);
            }
        })
    }
   
</script>

<script>
    $(document).ready(function() {
        function updateAnnualSalary() {
            var basicSalary = parseFloat($('#basic_salary').val());
            if (!isNaN(basicSalary)) {
                var annualSalary = basicSalary * 26;
                $('#annual_salary').val(annualSalary.toFixed(2));
                updateHourlyRate();
            }
        }

        function updateBasicSalary() {
            var annualSalary = parseFloat($('#annual_salary').val());
            if (!isNaN(annualSalary)) {
                var basicSalary = annualSalary / 26;
                $('#basic_salary').val(basicSalary.toFixed(2));
                updateHourlyRate();
            }
        }

        function updateHourlyRate() {
            var annualSalary = parseFloat($('#annual_salary').val());
            var basicSalary = parseFloat($('#basic_salary').val());
            var hourlyRate;

            if (!isNaN(annualSalary)) {
                hourlyRate = ((annualSalary / 26) / 14) / 8;
            } else if (!isNaN(basicSalary)) {
                hourlyRate = (basicSalary / 14) / 8;
            }

            if (hourlyRate !== undefined) {
                $('#hrly_salary_rate').val(hourlyRate.toFixed(2));
            }
        }

        $('#basic_salary').on('input', function() {
            updateAnnualSalary();
        });

        $('#annual_salary').on('input', function() {
            updateBasicSalary();
        });
    });
</script>

<style>
    .card-title {
        font-size: 1.5rem; /* Adjust the font size as needed */
        font-weight:800;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>