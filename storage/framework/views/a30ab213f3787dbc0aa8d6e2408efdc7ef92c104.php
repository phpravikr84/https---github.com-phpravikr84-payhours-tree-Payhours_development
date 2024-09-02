<?php $__env->startSection('title', __('Pay Batch Number List')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Pay Batch Number List'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Pay Batch Management'); ?></a></li>
            <li class="active"><?php echo __('Pay Batch Number List'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Pay Batch Number List'); ?></h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo route('pay_batch_numbers.create'); ?>" class="btn btn-primary"><?php echo __('Add Pay Batch Number'); ?></a>
                </div>
            </div>
            <div class="box-body">
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Batch Number Code'); ?></th>
                            <th><?php echo __('Batch Number Name'); ?></th>
                            <th><?php echo __('Publication Status'); ?></th>
                            <th><?php echo __('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $payBatchNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payBatchNumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo $payBatchNumber->pay_batch_number_code; ?></td>
                                <td><?php echo $payBatchNumber->pay_batch_number_name; ?></td>
                                <td><?php echo $payBatchNumber->status == 1 ? __('Published') : __('Unpublished'); ?></td>
                                <td>
                                    <a href="<?php echo route('pay_batch_numbers.edit', $payBatchNumber->id); ?>" class="btn btn-sm btn-info"><?php echo __('Edit'); ?></a>
                                    <form action="<?php echo route('pay_batch_numbers.destroy', $payBatchNumber->id); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>

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