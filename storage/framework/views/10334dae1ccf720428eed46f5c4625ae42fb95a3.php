<!-- resources/views/leave/edit.blade.php -->

<?php $__env->startSection('title', __('Change Leave Status')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Change Leave Status'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Leave'); ?></a></li>
            <li><a href="<?php echo route('leave.index'); ?>"><?php echo __('Show Leave Application Lists'); ?></a></li>
            <li class="active"><?php echo __('Change Leave Status'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Change Leave Status'); ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <form action="<?php echo route('leave.update', $leave->id); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <?php echo method_field('PUT'); ?>

                <div class="box-body">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group<?php echo $errors->has('user_id') ? ' has-error' : ''; ?>">
                            <label for="user_id"><?php echo __('Employee Name'); ?> <span class="text-danger">*</span></label>
                            <select name="user_id" class="form-control" id="user_id" required readonly>
                                <option selected disabled><?php echo __('Select One'); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo $employee['id']; ?>" <?php echo $employee['id']==$leave->user_id ? 'selected' : ''; ?>><?php echo $employee['name']; ?></option>
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
                            <select name="leave_category_id" id="leave_category_id" class="form-control" required readonly>
                                <?php $__currentLoopData = $leaveCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($category->id==$leave->leave_category_id): ?>
                                        <option value="<?php echo $category->id; ?>" <?php echo $category->id==$leave->leave_category_id ? 'selected' : ''; ?>><?php echo $category->leave_category; ?></option>
                                    <?php endif; ?>
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
                            <input type="text" name="start_date" id="start_date" class="form-control datepicker" value="<?php echo $leave->start_date; ?>" readonly>
                        </div>
                    </div>

                    <!-- End Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date"><?php echo __('End Date'); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="end_date" id="end_date" class="form-control datepicker" value="<?php echo $leave->end_date; ?>" readonly>
                        </div>
                    </div>

                    
                    
                    <!-- Pending Leave -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pending_leave"><?php echo __('Pending Leave'); ?></label>
                            <input name="pending_leave" class="form-control" id="pending_leave" value="<?php echo $leave->pending_leave; ?>" readonly />
                        </div>
                    </div>
                    <!-- Loss of Pay Days -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="loss_of_pay_days"><?php echo __('Loss of Pay Days'); ?></label>
                            <input name="loss_of_pay_days" class="form-control" id="loss_of_pay_days" value="<?php echo $leave->loss_of_pay_days; ?>" readonly/>
                        </div>
                    </div>

                    <!-- Leave Applied Days -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="leave_applied_days"><?php echo __('Leave Applied Days'); ?></label>
                            <input name="leave_applied_days" class="form-control" id="leave_applied_days" value="<?php echo $leave->leave_applied_days; ?>" readonly />
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo __('Status'); ?> <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control" required>
                                <option value="0" <?php echo $leave->status == 0 ? 'selected' : ''; ?>><?php echo __('Pending'); ?></option>
                                    <?php if(auth()->user()->user_type==1): ?>
                                        <option value="1" <?php echo $leave->status == 1 ? 'selected' : ''; ?>><?php echo __('Approved'); ?></option>
                                        <option value="2" <?php echo $leave->status == 2 ? 'selected' : ''; ?>><?php echo __('Disapproved'); ?></option>
                                    <?php endif; ?>
                                    <option value="3" <?php echo $leave->status == 3 ? 'selected' : ''; ?>><?php echo __('Cancel'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message"><?php echo __('Message'); ?></label>
                                <textarea name="message" id="message" class="form-control" rows="3"><?php echo $leave->message; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>