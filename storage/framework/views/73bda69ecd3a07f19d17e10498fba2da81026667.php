<?php $__env->startSection('title', __('Add Currency')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Add Currency'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Currency Management'); ?></a></li>
            <li class="active"><?php echo __('Add Currency'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Add Currency'); ?></h3>
            </div>
            <form action="<?php echo route('currencies.store'); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label for="currency_code"><?php echo __('Currency Code'); ?></label>
                        <input type="text" name="currency_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="currency_name"><?php echo __('Currency Name'); ?></label>
                        <input type="text" name="currency_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exchange_rate"><?php echo __('Exchange Rate'); ?></label>
                        <input type="number" name="exchange_rate" class="form-control" step="0.000001" required>
                    </div>
                    <div class="form-group">
                        <label for="exchange_currency"><?php echo __('Exchange Currency'); ?></label>
                        <input type="text" name="exchange_currency" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="last_er_update"><?php echo __('Last ER Update'); ?></label>
                        <input type="date" name="last_er_update" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status"><?php echo __('Status'); ?></label>
                        <select name="status" class="form-control">
                            <option value="1"><?php echo __('Active'); ?></option>
                            <option value="0"><?php echo __('Inactive'); ?></option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo __('Add'); ?></button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>