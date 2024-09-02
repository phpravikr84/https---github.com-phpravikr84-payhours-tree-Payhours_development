<?php $__env->startSection('title', __('Currency List')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Currency List'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li class="active"><?php echo __('Currencies'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Currency List'); ?></h3>
                <a href="<?php echo route('currencies.create'); ?>" class="btn btn-primary pull-right"><?php echo __('Add Currency'); ?></a>
            </div>
            <div class="box-body">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo session('success'); ?>

                    </div>
                <?php endif; ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo __('Code'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Exchange Rate'); ?></th>
                            <th><?php echo __('Exchange Currency'); ?></th>
                            <th><?php echo __('Last ER Update'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo $currency->currency_code; ?></td>
                            <td><?php echo $currency->currency_name; ?></td>
                            <td><?php echo $currency->exchange_rate; ?></td>
                            <td><?php echo $currency->exchange_currency; ?></td>
                            <td><?php echo $currency->last_er_update; ?></td>
                            <td><?php echo $currency->status ? __('Active') : __('Inactive'); ?></td>
                            <td>
                                <a href="<?php echo route('currencies.edit', $currency->id); ?>" class="btn btn-info"><?php echo __('Edit'); ?></a>
                                <form action="<?php echo route('currencies.destroy', $currency->id); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('<?php echo __('Are you sure?'); ?>')"><?php echo __('Delete'); ?></button>
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