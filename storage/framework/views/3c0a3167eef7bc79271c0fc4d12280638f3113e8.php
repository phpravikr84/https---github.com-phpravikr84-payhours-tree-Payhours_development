<?php $__env->startSection('title', __('Edit Period Definition Rate')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Edit Period Definition Rate'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Period Management'); ?></a></li>
            <li class="active"><?php echo __('Edit Period Definition Rate'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Edit Period Definition Rate'); ?></h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo route('period_defination_rates.index'); ?>" class="btn btn-primary"><?php echo __('Back to List'); ?></a>
                </div>
            </div>
            <div class="box-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo route('period_defination_rates.update', $periodDefinationRate->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>


                    <div class="form-group">
                        <label for="code"><?php echo __('Code'); ?></label>
                        <input type="text" name="code" class="form-control" value="<?php echo old('code', $periodDefinationRate->code ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="name"><?php echo __('Name'); ?></label>
                        <input type="text" name="name" class="form-control" value="<?php echo old('name', $periodDefinationRate->name ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="pay_unit"><?php echo __('Pay Unit'); ?></label>
                        <select name="pay_unit" class="form-control">
                            <option value="hour" <?php echo $periodDefinationRate->pay_unit=='hour' ? 'hour' : ''; ?>><?php echo __('Hour'); ?></option>
                            <option value="day" <?php echo $periodDefinationRate->pay_unit=='day' ? 'day' : ''; ?>><?php echo __('Day'); ?></option>
                            <option value="week" <?php echo $periodDefinationRate->pay_unit=='week' ? 'week' : ''; ?>><?php echo __('Week'); ?></option>
                            <option value="fortnight"  <?php echo $periodDefinationRate->pay_unit=='fortnight' ? 'fortnight' : ''; ?>><?php echo __('Fortnight'); ?></option>
                            <option value="month"  <?php echo $periodDefinationRate->pay_unit=='month' ? 'month' : ''; ?>><?php echo __('Month'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pays_per_year"><?php echo __('Pays Per Year'); ?></label>
                        <input type="text" name="pays_per_year" class="form-control" value="<?php echo old('pays_per_year', $periodDefinationRate->pays_per_year ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="hours_per_day"><?php echo __('Hours Per Day'); ?></label>
                        <input type="text" name="hours_per_day" class="form-control" value="<?php echo old('hours_per_day', $periodDefinationRate->hours_per_day ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="hours_per_pay"><?php echo __('Hours Per Pay'); ?></label>
                        <input type="text" name="hours_per_pay" class="form-control" value="<?php echo old('hours_per_pay', $periodDefinationRate->hours_per_pay ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="days_per_pay"><?php echo __('Days per Pay'); ?></label>
                        <input type="text" name="days_per_pay" class="form-control" value="<?php echo old('days_per_pay', $periodDefinationRate->days_per_pay ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="rate_per_pay_unit_hours"><?php echo __('Rate Per Pay Unit Hours'); ?></label>
                        <input type="text" name="rate_per_pay_unit_hours" class="form-control" value="<?php echo old('rate_per_pay_unit_hours', $periodDefinationRate->rate_per_pay_unit_hours ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="overtime_rate_one"><?php echo __('Overtime Rate One'); ?></label>
                        <input type="text" name="overtime_rate_one" class="form-control" value="<?php echo old('overtime_rate_one', $periodDefinationRate->overtime_rate_one ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="overtime_rate_two"><?php echo __('Overtime Rate Two'); ?></label>
                        <input type="text" name="overtime_rate_two" class="form-control" value="<?php echo old('overtime_rate_two', $periodDefinationRate->overtime_rate_two ?? ''); ?>">
                    </div>


                    <div class="form-group">
                        <label for="special_rate_one"><?php echo __('Special Rate One'); ?></label>
                        <input type="text" name="special_rate_one" class="form-control" value="<?php echo old('special_rate_one', $periodDefinationRate->special_rate_one ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="special_rate_two"><?php echo __('Special Rate Two'); ?></label>
                        <input type="text" name="special_rate_two" class="form-control" value="<?php echo old('special_rate_two', $periodDefinationRate->special_rate_two ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="annual_leave_flag"><?php echo __('Annual Leave Provide'); ?></label>
                        <select name="annual_leave_flag" class="form-control">
                            <option value="0" <?php echo $periodDefinationRate->annual_leave_flag==0 ?  'selected' : ''; ?>><?php echo __('No'); ?></option>
                            <option value="1" <?php echo $periodDefinationRate->annual_leave_flag==1 ?  'selected' : ''; ?>><?php echo __('Yes'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="casual_leave_flag"><?php echo __('Casual Leave Provide'); ?></label>
                        <select name="casual_leave_flag" class="form-control">
                            <option value="0" <?php echo $periodDefinationRate->casual_leave_flag==0 ?  'selected' : ''; ?>><?php echo __('No'); ?></option>
                            <option value="1" <?php echo $periodDefinationRate->casual_leave_flag==1 ?  'selected' : ''; ?>><?php echo __('Yes'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sick_leave_flag"><?php echo __('Sick/Medical Leave Provide'); ?></label>
                        <select name="sick_leave_flag" class="form-control">
                            <option value="0" <?php echo $periodDefinationRate->sick_leave_flag==0 ?  'selected' : ''; ?>><?php echo __('No'); ?></option>
                            <option value="1" <?php echo $periodDefinationRate->sick_leave_flag==1 ?  'selected' : ''; ?>><?php echo __('Yes'); ?></option>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="accurate_type"><?php echo __('Accrual Type'); ?></label>
                        <select name="accurate_type" class="form-control">
                            <option value="based_on_last_pay_date" <?php echo $periodDefinationRate->accurate_type=='based_on_last_pay_date' ?  'selected' : ''; ?>><?php echo __('Based On Last Pay Date'); ?></option>
                            <option value="based_on_work_pay_units" <?php echo $periodDefinationRate->accurate_type=='based_on_work_pay_units' ?  'selected' : ''; ?>><?php echo __('Based On Work Pay Units'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status"><?php echo __('Status'); ?></label>
                        <select name="status" class="form-control">
                            <option value="1" <?php echo old('status', $periodDefinationRate->status ?? '') == 1 ? 'selected' : ''; ?>><?php echo __('Active'); ?></option>
                            <option value="0" <?php echo old('status', $periodDefinationRate->status ?? '') == 0 ? 'selected' : ''; ?>><?php echo __('Inactive'); ?></option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php echo __('Update'); ?></button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>