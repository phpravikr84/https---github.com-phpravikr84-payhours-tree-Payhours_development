<?php $__env->startSection('title', __('Add GL Interface Control File')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Add GL Interface Control File'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a href="<?php echo route('gl_interface_control_files.index'); ?>"><?php echo __('GL Interface Management'); ?></a></li>
            <li class="active"><?php echo __('Add Control File'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Add Control File'); ?></h3>
            </div>
            <div class="box-body">
                <form action="<?php echo route('gl_interface_control_files.store'); ?>" method="POST">
                <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="control_setup_name"><?php echo __('Control Setup Name'); ?></label>
                        <input type="text" name="control_setup_name" class="form-control" value="<?php echo old('control_setup_name'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="gl_code_account_name"><?php echo __('GL Code Account Name'); ?></label>
                        <input type="text" name="gl_code_account_name" class="form-control" value="<?php echo old('gl_code_account_name'); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo __('Save'); ?></button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>