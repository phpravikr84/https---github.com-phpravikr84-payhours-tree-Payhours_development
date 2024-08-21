<?php $__env->startSection('title', __('Add Bank')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Add Bank'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Bank Management'); ?></a></li>
            <li class="active"><?php echo __('Add Bank'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Add Bank'); ?></h3>
            </div>
            <form action="<?php echo route('banks.store'); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label for="bank_code"><?php echo __('Bank Code'); ?></label>
                        <input type="text" name="bank_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="bank_name"><?php echo __('Bank Name'); ?></label>
                        <input type="text" name="bank_name" class="form-control" required>
                    </div>

                    <div class="form-group<?php echo $errors->has('status') ? ' has-error' : ''; ?> has-feedback">
                        <label for="status"><?php echo __('Publication Status'); ?> <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option value="" selected disabled><?php echo __('Select one'); ?></option>
                            <option value="1"><?php echo __('Published'); ?></option>
                            <option value="0"><?php echo __('Unpublished'); ?></option>
                        </select>
                        <?php if($errors->has('status')): ?>
                        <span class="help-block">
                            <strong><?php echo $errors->first('status'); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>