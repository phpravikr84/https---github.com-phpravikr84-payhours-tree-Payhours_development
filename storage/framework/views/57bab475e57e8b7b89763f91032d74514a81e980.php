<?php $__env->startSection('title', __('Superannuation List')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Superannuation List'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Superannuation Management'); ?></a></li>
            <li class="active"><?php echo __('Superannuation List'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Superannuation List'); ?></h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo route('superannuations.create'); ?>" class="btn btn-primary"><?php echo __('Add Superannuation'); ?></a>
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
                            <th><?php echo __('Employer Contribution (%)'); ?></th>
                            <th><?php echo __('Employer Contribution (Fixed Amount)'); ?></th>
                            <th><?php echo __('Bank Transfer Included'); ?></th>
                            <th><?php echo __('Bank Account Number'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $superannuations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superannuation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo $superannuation->code; ?></td>
                                <td><?php echo $superannuation->name; ?></td>
                                <td><?php echo $superannuation->employer_contribution_percentage; ?>%</td>
                                <td><?php echo $superannuation->employer_contribution_fixed_amount; ?></td>
                                <td><?php echo $superannuation->included_bank_transfer ? __('Yes') : __('No'); ?></td>
                                <td><?php echo $superannuation->bank_account_number; ?></td>
                                <td><?php echo $superannuation->status == 1 ? __('Active') : __('Inactive'); ?></td>
                                <td>
                                    <a href="<?php echo route('superannuations.edit', $superannuation->id); ?>" class="btn btn-sm btn-info"><?php echo __('Edit'); ?></a>
                                    <form action="<?php echo route('superannuations.destroy', $superannuation->id); ?>" method="POST" style="display:inline;">
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