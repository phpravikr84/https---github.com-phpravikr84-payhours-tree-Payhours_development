<?php $__env->startSection('title', __('Leave Categories')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo __('WORKING DAYS'); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
      <li><a><?php echo __('Setting'); ?></a></li>
      <li class="active"><?php echo __('Working Days'); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo __('Manage working days'); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <form action="<?php echo url('/setting/working-days/update/'); ?>" method="post">
        <?php echo csrf_field(); ?>

        <div class="box-body">
          <!-- Notification Box -->
          <div class="col-md-12">
            <?php if(!empty(Session::get('message'))): ?>
            <div class="alert alert-success alert-dismissible" id="notification_box">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i> <?php echo Session::get('message'); ?>

            </div>
            <?php elseif(!empty(Session::get('exception'))): ?>
            <div class="alert alert-warning alert-dismissible" id="notification_box">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-warning"></i> <?php echo Session::get('exception'); ?>

            </div>
            <?php endif; ?>
          </div>
          <!-- /.Notification Box -->
          <div class="col-md-12">
            <div class="form-group">
              <div class="row">
                  <?php $__currentLoopData = $working_days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $working_day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if( $working_day['working_hours']!=0): ?>
                    <div class="col-md-1 custom-padding">
                      <label class="checkbox-inline">
                          <?php if($working_day['working_status'] == 1): ?>
                          <input type="hidden" name="day[]" value="1"><input checked type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          <?php else: ?>
                          <input type="hidden" name="day[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          <?php endif; ?>
                          <span><?php echo $working_day['day']; ?></span><br/>
                          <span>Hours: <input type="text" class="form-control" name="working_hours[]" id="working_hours" value="<?php echo $working_day['working_hours']; ?>" /></span>
                      </label>
                    </div>
                  <?php else: ?>
                  <div class="col-md-1 custom-padding">
                      <label class="checkbox-inline">
                          <?php if($working_day['working_status'] == 1): ?>
                          <input type="hidden" name="day[]" value="1"><input checked type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          <?php else: ?>
                          <input type="hidden" name="day[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          <?php endif; ?>
                          <span><?php echo $working_day['day']; ?></span><br/>
                          <span>Hours: <input type="text" class="form-control" name="working_hours[]" id="working_hours" value="<?php echo $working_day['working_hours']; ?>" /></span>
                      </label>
                    </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
                <!-- <?php $__currentLoopData = $working_days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $working_day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="checkbox-inline">
                  <?php if($working_day['working_status'] == 1): ?>
                  <input type="hidden" name="day[]" value="1"><input checked type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                  <?php else: ?>
                  <input type="hidden" name="day[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                  <?php endif; ?>
                  <span><?php echo $working_day['day']; ?></span><br/>
                  <?php if( $working_day['working_hours']!=0): ?>
                  <span>Hours: <?php echo $working_day['working_hours']; ?></span>
                  <?php endif; ?>
                </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> <?php echo __('Update'); ?></button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<style>
    .custom-padding {
        margin-right: 10px; /* Adjust the value as needed */
    }
   
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>