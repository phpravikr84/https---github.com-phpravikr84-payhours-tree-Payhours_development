<?php $__env->startSection('title', __('Overtime Details')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo __('Overtime Details'); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('HRM'); ?></a></li>
            <li><a href="<?php echo url('/hrm/overtime'); ?>"><?php echo __('Overtime'); ?></a></li>
            <li class="active"><?php echo __('Details'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Details of Overtime'); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?php echo url('/setting/overtime'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-arrow-left"></i> <?php echo __('Back'); ?>

                </a>
                <hr>
                <table class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <?php if(isset($overtimes) && !empty($overtimes)): ?>
                            <?php $__currentLoopData = $overtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo __('Code'); ?></td>
                                <td><?php echo $overtime->code; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Name'); ?></td>
                                <td><?php echo $overtime->name; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Fixed Amount'); ?></td>
                                <td><?php echo $overtime->fixed_amount; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Date Added'); ?></td>
                                <td><?php echo date("D d F Y h:ia", strtotime($overtime->created_at)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Last Updated'); ?></td>
                                <td><?php echo date("D d F Y h:ia", strtotime($overtime->updated_at)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Publication Status'); ?></td>
                                <td>
                                    <?php if($overtime->status == 1): ?>
                                        <a href="<?php echo url('/setting/overtime/unpublished/' . $overtime->id); ?>" class="btn btn-success btn-flat">
                                            <i class="fa fa-arrow-down"></i> <?php echo __('Published'); ?>

                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo url('/setting/overtime/published/' . $overtime->id); ?>" class="btn btn-warning btn-flat">
                                            <i class="fa fa-arrow-up"></i> <?php echo __('Unpublished'); ?>

                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5"> There is no data available! </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>