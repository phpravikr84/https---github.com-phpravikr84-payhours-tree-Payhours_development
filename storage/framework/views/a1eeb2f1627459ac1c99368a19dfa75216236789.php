<?php $__env->startSection('title', __('Edit team member')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo __('TEAM'); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i>    <?php echo __('Dashboard'); ?></a></li>
            <li><a href="<?php echo url('/people/employees'); ?>">   <?php echo __('Team'); ?></a></li>
            <li class="active">   <?php echo __('Edit team member details'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">   <?php echo __('Edit team member details'); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo url('people/employees/update/'.$employee['id']); ?>" method="post" name="employee_edit_form">
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
                            <p class="text-yellow"><?php echo __(' Enter team member details. All (*)field are required. (Default password for added user is 12345678)'); ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="employee_id"><?php echo __(' ID'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('employee_id') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php echo $employee['employee_id']; ?>">
                                <?php if($errors->has('employee_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('employee_id'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="name"><?php echo __(' Name'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('name') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $employee['name']; ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="father_name"><?php echo __(' Fathers Name'); ?></label>
                            <div class="form-group<?php echo $errors->has('father_name') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="father_name" id="father_name" class="form-control" value="<?php echo $employee['father_name']; ?>">
                                <?php if($errors->has('father_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('father_name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="mother_name"><?php echo __(' Mothers Name'); ?> </label>
                            <div class="form-group<?php echo $errors->has('mother_name') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="mother_name" id="mother_name" class="form-control" value="<?php echo $employee['mother_name']; ?>">
                                <?php if($errors->has('mother_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('mother_name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="spouse_name"><?php echo __(' Spouse Name'); ?> </label>
                            <div class="form-group<?php echo $errors->has('spouse_name') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="<?php echo $employee['spouse_name']; ?>">
                                <?php if($errors->has('spouse_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('spouse_name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="email"><?php echo __(' Email'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('email') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $employee['email']; ?>">
                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('email'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="contact_no_one"><?php echo __(' Contact No'); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('contact_no_one') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="<?php echo $employee['contact_no_one']; ?>">
                                <?php if($errors->has('contact_no_one')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('contact_no_one'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="emergency_contact"><?php echo __(' Emergency Contact'); ?></label>
                            <div class="form-group<?php echo $errors->has('emergency_contact') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="emergency_contact" id="emergency_contact" class="form-control" value="<?php echo $employee['emergency_contact']; ?>">
                                <?php if($errors->has('emergency_contact')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('emergency_contact'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="web"><?php echo __(' Web'); ?></label>
                            <div class="form-group<?php echo $errors->has('web') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="web" id="web" class="form-control" value="<?php echo $employee['web']; ?>">
                                <?php if($errors->has('web')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('web'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="gender"><?php echo __(' Gender'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('gender') ? ' has-error' : ''; ?> has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled><?php echo __(' Select one'); ?></option>
                                    <option value="m"><?php echo __(' Male'); ?></option>
                                    <option value="f"><?php echo __(' Female'); ?></option>
                                </select>
                                <?php if($errors->has('gender')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('gender'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="datepicker4"><?php echo __(' Joining Date'); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('joining_date') ? ' has-error' : ''; ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="joining_date" value="<?php echo $employee['joining_date']; ?>" class="form-control pull-right" id="datepicker4">
                                </div>
                                <?php if($errors->has('joining_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('joining_date'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <label for="present_address"><?php echo __(' Present Address'); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('present_address') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="present_address" id="present_address" class="form-control" value="<?php echo $employee['present_address']; ?>">
                                <?php if($errors->has('present_address')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('present_address'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="permanent_address"><?php echo __(' Permanent Address'); ?></label>
                            <div class="form-group<?php echo $errors->has('permanent_address') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="<?php echo $employee['permanent_address']; ?>">
                                <?php if($errors->has('permanent_address')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('permanent_address'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="home_district"><?php echo __(' Home District'); ?></label>
                            <div class="form-group<?php echo $errors->has('home_district') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="home_district" id="home_district" class="form-control" value="<?php echo $employee['home_district']; ?>">
                                <?php if($errors->has('home_district')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('home_district'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="id_name"><?php echo __(' ID Name'); ?></label>
                            <div class="form-group<?php echo $errors->has('id_name') ? ' has-error' : ''; ?> has-feedback">
                                <select name="id_name" id="id_name" class="form-control">
                                    <option value="" selected disabled><?php echo __(' Select one'); ?></option>
                                    <option value="1"><?php echo __(' NID'); ?></option>
                                    <option value="2"><?php echo __(' Passport'); ?></option>
                                    <option value="3"><?php echo __(' Driving License'); ?></option>
                                </select>
                                <?php if($errors->has('id_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('id_name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="id_number"><?php echo __(' ID Number'); ?></label>
                            <div class="form-group<?php echo $errors->has('id_number') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="id_number" id="id_number" class="form-control" value="<?php echo $employee['id_number']; ?>">
                                <?php if($errors->has('id_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('id_number'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="designation_id"><?php echo __(' Designation'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('designation_id') ? ' has-error' : ''; ?> has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="" selected disabled><?php echo __(' Select one'); ?></option>
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
                            <!-- /.form-group -->

                            <label for="joining_position"><?php echo __(' Department'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('joining_position') ? ' has-error' : ''; ?> has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                <?php $departments= \App\Department::all();?>
                                     <option value="" selected disabled><?php echo __(' Select one'); ?></option>
                                    
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
                            <!-- /.form-group -->

                            <label for="marital_status"><?php echo __(' Marital Status'); ?> </label>
                            <div class="form-group<?php echo $errors->has('marital_status') ? ' has-error' : ''; ?> has-feedback">
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value="" selected disabled><?php echo __(' Select one'); ?></option>
                                    <option value="1"><?php echo __(' Married'); ?></option>
                                    <option value="2"><?php echo __(' Single'); ?></option>
                                    <option value="3"><?php echo __(' Divorced'); ?></option>
                                    <option value="4"><?php echo __(' Separated'); ?></option>
                                    <option value="5"><?php echo __(' Widowed'); ?></option>
                                </select>
                                <?php if($errors->has('marital_status')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('marital_status'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                            <label for="datepicker"><?php echo __(' Date of Birth'); ?></label>
                            <div class="form-group<?php echo $errors->has('date_of_birth') ? ' has-error' : ''; ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date_of_birth" class="form-control pull-right" value="<?php echo $employee['date_of_birth']; ?>" id="datepicker3">
                                </div>
                                <?php if($errors->has('date_of_birth')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('date_of_birth'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="role"><?php echo __(' Role'); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('role') ? ' has-error' : ''; ?> has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled><?php echo __(' Select one'); ?></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo $role->id; ?>"><?php echo $role->display_name; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('role')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('role'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="academic_qualification"><?php echo __(' Academic Qualification'); ?></label>
                            <div class="form-group<?php echo $errors->has('academic_qualification') ? ' has-error' : ''; ?> has-feedback">
                                <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea"><?php echo $employee['academic_qualification']; ?></textarea>
                                <?php if($errors->has('academic_qualification')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('academic_qualification'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="professional_qualification"><?php echo __(' Professional Qualification'); ?></label>
                            <div class="form-group<?php echo $errors->has('professional_qualification') ? ' has-error' : ''; ?> has-feedback">
                                <textarea name="professional_qualification" id="professional_qualification" class="form-control textarea"><?php echo $employee['professional_qualification']; ?></textarea>
                                <?php if($errors->has('professional_qualification')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('professional_qualification'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="experience"><?php echo __(' Experience'); ?></label>
                            <div class="form-group<?php echo $errors->has('experience') ? ' has-error' : ''; ?> has-feedback">
                                <textarea name="experience" id="experience" class="form-control textarea"><?php echo $employee['experience']; ?></textarea>
                                <?php if($errors->has('experience')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('experience'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="reference"><?php echo __(' Reference'); ?></label>
                            <div class="form-group<?php echo $errors->has('reference') ? ' has-error' : ''; ?> has-feedback">
                                <textarea name="reference" id="reference" class="form-control textarea"><?php echo $employee['reference']; ?></textarea>
                                <?php if($errors->has('reference')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('reference'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo url('/people/employees'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo __(' Cancel'); ?></a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __(' Update'); ?></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        document.forms['employee_edit_form'].elements['gender'].value = "<?php echo $employee['gender']; ?>";
        document.forms['employee_edit_form'].elements['id_name'].value = "<?php echo $employee['id_name']; ?>";
        document.forms['employee_edit_form'].elements['marital_status'].value = "<?php echo $employee['marital_status']; ?>";
        document.forms['employee_edit_form'].elements['designation_id'].value = "<?php echo $employee['designation_id']; ?>";
        document.forms['employee_edit_form'].elements['role'].value = "<?php echo $employee['role']; ?>";
        document.forms['employee_edit_form'].elements['joining_position'].value = "<?php echo $employee['joining_position']; ?>";
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>