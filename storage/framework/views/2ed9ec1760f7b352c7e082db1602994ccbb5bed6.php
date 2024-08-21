<?php $__env->startSection('title', __('Bank Details')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo __('BANK DETAILS'); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Setting'); ?></a></li>
            <li><a href="<?php echo url('/setting/bank_details'); ?>"><?php echo __('Bank Details'); ?></a></li>
            <li class="active"><?php echo __('Details'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Details of bank detail'); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?php echo url('/setting/bank_details'); ?>" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i><?php echo __('Back'); ?> </a>
                <hr>
                <table class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <?php if($bankDetails): ?>
                            <?php $__currentLoopData = $bankDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo __('Bank Detail Code'); ?></td>
                                <td><?php echo $bankDetail->bank_detail_code; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Bank Detail Name'); ?></td>
                                <td><?php echo $bankDetail->bank_detail_name; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('BSB Number'); ?></td>
                                <td><?php echo $bankDetail->bsb_number; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Bank Type'); ?></td>
                                <td><?php echo $bankDetail->bank_type; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Bank Address'); ?></td>
                                <td><?php echo $bankDetail->bank_address; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Bank Phone'); ?></td>
                                <td><?php echo $bankDetail->bank_phone; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Employment Account Number'); ?></td>
                                <td><?php echo $bankDetail->employment_account_number; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Account Suffix'); ?></td>
                                <td><?php echo $bankDetail->account_suffix; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Publication Status'); ?></td>
                                <td>
                                    <?php if($bankDetail->status == 1): ?>
                                    <div class="btn-group">
                                        <a href="<?php echo url('/setting/bank_details/unpublished/' . $bankDetail->id); ?>" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                            <i class="fa fa-arrow-down"></i>
                                            <span class="hidden-sm hidden-xs"> <?php echo __('Published'); ?></span>
                                        </a>
                                    </div>
                                    <?php else: ?>
                                    <div class="btn-group">
                                        <a href="<?php echo url('/setting/bank_details/published/' . $bankDetail->id); ?>" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
                                            <i class="fa fa-arrow-up"></i>
                                            <span class="hidden-sm hidden-xs"> <?php echo __('Unpublished'); ?></span>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No Bank Details Available !</td>
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