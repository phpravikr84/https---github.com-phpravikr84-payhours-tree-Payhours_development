<?php
use Carbon\Carbon;
?>

<?php $__env->startSection('title', __('Show Leave Application Lists')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo __('Show Leave Application Lists'); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Leave'); ?></a></li>
            <li class="active"><?php echo __('Show Leave Application Lists'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Show Leave Application Lists'); ?></h3>

                <div class="box-tools pull-right">
                <a href="<?php echo route('leave.create'); ?>" class="btn btn-primary"><?php echo __('Apply for Leave'); ?></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo session('success'); ?>

                    </div>
                <?php endif; ?>

                <?php if($leaveApplications->isEmpty()): ?>
                    <p><?php echo __('No leave applications found.'); ?></p>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Start Date'); ?></th>
                                <th><?php echo __('End Date'); ?></th>
                                <th><?php echo __('Leave Type'); ?></th>
                                <th><?php echo __('Reason'); ?></th>
                                <th><?php echo __('Leave Applied'); ?></th>
                                <th><?php echo __('Pending Leave'); ?></th>
                                <th><?php echo __('Loss of Pay'); ?></th>
                                <th><?php echo __('Employee Name'); ?></th>
                                <th><?php echo __('Apply Date'); ?></th>
                                <th><?php echo __('Status'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leaveApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo \Carbon\Carbon::parse($leave->start_date)->format('d F Y'); ?></td>
                                    <td><?php echo \Carbon\Carbon::parse($leave->end_date)->format('d F Y'); ?></td>
                                    <td><?php echo ucfirst($leave->leave_type); ?></td>
                                    <td><?php echo $leave->reason; ?></td>

                                    <td><?php echo $leave->leave_applied_days; ?></td>
                                    <td><?php echo $leave->pending_leave; ?></td>
                                    <td><?php echo $leave->loss_of_pay_days; ?></td>
                                    <td><?php echo $leave->name; ?></td>
                                    <td><?php echo \Carbon\Carbon::parse($leave->created_at)->format('D d F Y h:ia'); ?></td>
                                    <td>
                                        <?php if($leave->status == 1): ?>
                                            <span class="badge badge-success"><?php echo __('Accepted'); ?></span>
                                        <?php elseif($leave->status == 2): ?>
                                            <span class="badge badge-danger"><?php echo __('Not Accepted'); ?></span>
                                        <?php elseif($leave->status == 3): ?>
                                            <span class="badge badge-danger"><?php echo __('Cancel'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-warning"><?php echo __('Pending'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo route('leave.edit', $leave->id); ?>" class="btn btn-warning btn-sm"><?php echo __('Change Status'); ?></a>
                                    </td>
                                   
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>