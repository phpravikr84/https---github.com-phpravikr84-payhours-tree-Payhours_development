<?php $__env->startSection('title', __('Pay References')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Pay References'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li class="active"><?php echo __('Pay References'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Manage Pay References'); ?></h3>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo session('success'); ?>

                </div>
            <?php endif; ?>

            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><?php echo __('Pay Reference Name'); ?></th>
                            <th><?php echo __('Pay Period Start Date'); ?></th>
                            <th><?php echo __('Pay Period End Date'); ?></th>
                            <th><?php echo __('Branch'); ?></th>
                            <th><?php echo __('Pay Batch'); ?></th>
                            <th><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pay_references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay_reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo $pay_reference->id; ?></td>
                                <td><?php echo $pay_reference->pay_reference_name; ?></td>
                                <td><?php echo $pay_reference->pay_period_start_date; ?></td>
                                <td><?php echo $pay_reference->pay_period_end_date; ?></td>
                                <td><?php echo $pay_reference->branch_name; ?></td>
                                <td><?php echo $pay_reference->payroll_number; ?></td>
                                <td>
                                    <a href="<?php echo route('pay_references.edit', $pay_reference->id); ?>" class="btn btn-success btn-sm"><?php echo __('Manage This Pay'); ?></a>
                                    <!-- <form action="<?php echo route('pay_references.destroy', $pay_reference->id); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('<?php echo __('Are you sure you want to delete this pay reference?'); ?>')"><?php echo __('Delete'); ?></button>
                                    </form> -->
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