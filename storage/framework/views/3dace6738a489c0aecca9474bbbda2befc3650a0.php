<?php $__env->startSection('title', __('Branch List')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Branch List'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Branch Management'); ?></a></li>
            <li class="active"><?php echo __('Branch List'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Branch List'); ?></h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo route('branches.create'); ?>" class="btn btn-primary"><?php echo __('Add Branch'); ?></a>
                </div>
            </div>
            <div class="box-body">
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Branch Code'); ?></th>
                            <th><?php echo __('Branch Name'); ?></th>
                            <th><?php echo __('Branch Address'); ?></th>
                            <th><?php echo __('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo $branch->branch_code; ?></td>
                                <td><?php echo $branch->branch_name; ?></td>
                                <td><?php echo $branch->branch_address; ?></td>
                                
                                <td>
                                    <a href="<?php echo route('branches.edit', $branch->id); ?>" class="btn btn-sm btn-info"><?php echo __('Edit'); ?></a>
                                    <form action="<?php echo route('branches.destroy', $branch->id); ?>" method="POST" style="display:inline;">
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