<?php $__env->startSection('title', __('Add Leave Application')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo __('Add Leave Application'); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
      <li><a><?php echo __('Setting'); ?></a></li>
      <li><a href="<?php echo url('/hrm/leave_application'); ?>"><?php echo __('Add Leave Application'); ?></a></li>
      <li class="active"><?php echo __('Add Leave Application'); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo __('Add Leave Application'); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
        <form action="<?php echo route('leave.store'); ?>" method="POST">
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
                        <p class="text-yellow"><?php echo __('Enter New Application details. All fields are required.'); ?></p>
                        <?php endif; ?>
                    </div>

                    
                  <div class="col-md-6">
                        <div class="form-group<?php echo $errors->has('user_id') ? ' has-error' : ''; ?>">
                            <label for="user_id"><?php echo __('Employee Name'); ?> <span class="text-danger">*</span></label>
                            <select name="user_id" class="form-control" id="user_id" required>
                                <option selected disabled><?php echo __('Select One'); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('user_id')): ?>
                            <span class="help-block">
                                <strong><?php echo $errors->first('user_id'); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Leave Category -->
                    <div class="col-md-6">
                        <div class="form-group<?php echo $errors->has('leave_category_id') ? ' has-error' : ''; ?>">
                            <label for="leave_category_id"><?php echo __('Leave Category'); ?> <span class="text-danger">*</span></label>
                            <select name="leave_category_id" id="leave_category_id" class="form-control" required>
                                <option value="" selected disabled><?php echo __('Select Leave Category'); ?></option>
                                <?php $__currentLoopData = $leaveCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->leave_category; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('leave_category_id')): ?>
                            <span class="help-block">
                                <strong><?php echo $errors->first('leave_category_id'); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Start Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date"><?php echo __('Start Date'); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="start_date" id="start_date" class="form-control datepicker" required>
                        </div>
                    </div>

                    <!-- End Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date"><?php echo __('End Date'); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="end_date" id="end_date" class="form-control datepicker" required>
                        </div>
                    </div>

                    <div id="casual_leave_only" class="d-none">
                        <div class="col-md-12">
                            <div class="form-group<?php echo $errors->has('leave_duration') ? ' has-error' : ''; ?>">
                                <label for="leave_duration"><?php echo __('Leave Duration'); ?> <span class="text-danger">*</span></label>
                                <select name="leave_duration" id="leave_duration" class="form-control" required>
                                    <option value="1" selected>Full Day</option>
                                    <option value="0.5">Half Day</option>
                                    <option value="0.25">Quarter Day</option>
                                </select>
                                <?php if($errors->has('leave_duration')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('leave_duration'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pending Leave -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pending_leave"><?php echo __('Pending Leave'); ?></label>
                            <input name="pending_leave" class="form-control" id="pending_leave" />
                        </div>
                    </div>
                    <!-- Loss of Pay Days -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="loss_of_pay_days"><?php echo __('Loss of Pay Days'); ?></label>
                            <input name="loss_of_pay_days" class="form-control" id="loss_of_pay_days"/>
                        </div>
                    </div>

                    <!-- Leave Applied Days -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="leave_applied_days"><?php echo __('Leave Applied Days'); ?></label>
                            <input name="leave_applied_days" class="form-control" id="leave_applied_days" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="is_sandwich_leave"><?php echo __('Is Sandwitch Leave'); ?></label>
                            <input name="is_sandwich_leave" class="form-control" id="is_sandwich_leave" readonly />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sandwich_leave_days"><?php echo __('Sandwitch Leave Days'); ?></label>
                            <input name="sandwich_leave_days" class="form-control" id="sandwich_leave_days" readonly />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="holiday_count"><?php echo __('Holiday Count'); ?></label>
                            <input name="holiday_count" class="form-control" id="holiday_count" readonly />
                        </div>
                    </div>
              
                    <!-- Reason -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="reason"><?php echo __('Reason'); ?> <span class="text-danger">*</span></label>
                            <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->
</div>

<!-- Include jQuery and jQuery UI -->
<style>
    .ui-datepicker .ui-state-disabled .ui-state-disabled, .ui-datepicker .ui-state-disabled span {
        background: #ffdddd !important; /* Light red background */
        color: #d9534f !important;      /* Red text color */
        border-color: #d9534f !important;
    }

</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>