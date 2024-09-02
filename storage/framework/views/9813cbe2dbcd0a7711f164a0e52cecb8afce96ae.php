<?php $__env->startSection('title', __('Create Pay Reference')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Create Pay Reference'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Payroll'); ?></a></li>
            <li class="active"><?php echo __('Create Pay Reference'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Create Pay Reference'); ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <form action="<?php echo route('pay_references.store'); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="box-body">
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-4">
                            <div class="form-group<?php echo $errors->has('pay_reference_name') ? ' has-error' : ''; ?>">
                                <label for="pay_reference_name"><?php echo __('Pay Reference Name'); ?> <span class="text-danger">*</span></label>
                                <input type="text" name="pay_reference_name" id="pay_reference_name" class="form-control" value="<?php echo old('pay_reference_name'); ?>" required>
                                <?php if($errors->has('pay_reference_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('pay_reference_name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="pay_period_start_date"><?php echo __('Pay Period Start Date'); ?> <span class="text-danger">*</span></label>
                                <input type="date" name="pay_period_start_date" id="pay_period_start_date" class="form-control datepicker" value="<?php echo old('pay_period_start_date'); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="pay_period_end_date"><?php echo __('Pay Period End Date'); ?> <span class="text-danger">*</span></label>
                                <input type="date" name="pay_period_end_date" id="pay_period_end_date" class="form-control datepicker" value="<?php echo old('pay_period_end_date'); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="branch_id"><?php echo __('Branch'); ?> <span class="text-danger">*</span></label>
                                <select name="branch_id" id="branch_id" class="form-control" required>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo $branch->id; ?>"><?php echo $branch->branch_name; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="payroll_number_id"><?php echo __('Payroll Number'); ?> <span class="text-danger">*</span></label>
                                <select name="payroll_number_id" id="payroll_number_id" class="form-control" required>
                                    <?php $__currentLoopData = $pay_batch_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay_batch_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo $pay_batch_number->id; ?>"><?php echo $pay_batch_number->pay_batch_number_name; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-4">
                            <h4><?php echo __('Departments'); ?></h4>
                            <div class="form-group">
                                <button type="button" class="btn btn-default btn-sm" id="select-all-departments"><?php echo __('Select All'); ?></button>
                                <button type="button" class="btn btn-default btn-sm" id="clear-all-departments"><?php echo __('Clear'); ?></button>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo __('ID'); ?></th>
                                        <th><?php echo __('Code'); ?></th>
                                        <th><?php echo __('Name'); ?></th>
                                        <th><?php echo __('Included'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo $department->id; ?></td>
                                        <td><?php echo $department->department; ?></td>
                                        <td><?php echo $department->department_description; ?></td>
                                        <td><input type="checkbox" name="departments[]" value="<?php echo $department->id; ?>" checked></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Third Column -->
                        <div class="col-md-4">
                            <h4><?php echo __('Pay Locations'); ?></h4>
                            <div class="form-group">
                                <button type="button" class="btn btn-default btn-sm" id="select-all-locations"><?php echo __('Select All'); ?></button>
                                <button type="button" class="btn btn-default btn-sm" id="clear-all-locations"><?php echo __('Clear'); ?></button>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo __('ID'); ?></th>
                                        <th><?php echo __('Code'); ?></th>
                                        <th><?php echo __('Name'); ?></th>
                                        <th><?php echo __('Included'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pay_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo $location->id; ?></td>
                                        <td><?php echo $location->payroll_location_code; ?></td>
                                        <td><?php echo $location->payroll_location_name; ?></td>
                                        <td><input type="checkbox" name="pay_locations[]" value="<?php echo $location->id; ?>" checked></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo __('Create Pay Reference'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>