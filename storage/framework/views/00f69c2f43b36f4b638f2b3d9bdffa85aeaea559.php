<?php $__env->startSection('title', __('Period Definition Rates')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Period Definition Rates'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Period Management'); ?></a></li>
            <li class="active"><?php echo __('Period Definition Rates'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Period Definition Rates List'); ?></h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo route('period_defination_rates.create'); ?>" class="btn btn-primary"><?php echo __('Add Period Definition Rate'); ?></a>
                </div>
            </div>
            <div class="box-body">
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Code'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Pay Unit'); ?></th>
                            <th><?php echo __('Pays Per Year'); ?></th>
                            <th><?php echo __('Hours Per Day'); ?></th>
                            <th><?php echo __('Rate Per Pay Unit Hours'); ?></th>
                            <th><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $periodDefinationRates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo $rate->code; ?></td>
                                <td><?php echo $rate->name; ?></td>
                                <td><?php echo $rate->pay_unit; ?></td>
                                <td><?php echo $rate->pays_per_year; ?></td>
                                <td><?php echo $rate->hours_per_day; ?></td>
                                <td><?php echo $rate->rate_per_pay_unit_hours; ?></td>
                                <td>
                                    <a href="<?php echo route('period_defination_rates.edit', $rate->id); ?>" class="btn btn-sm btn-info"><?php echo __('Edit'); ?></a>
                                    <form action="<?php echo route('period_defination_rates.destroy', $rate->id); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>

                                        <button type="submit" class="btn btn-sm btn-danger"><?php echo __('Delete'); ?></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>