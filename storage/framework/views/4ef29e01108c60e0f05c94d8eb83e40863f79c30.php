<?php $__env->startSection('title', __('Departments')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo __('LEAVE CATEGORY'); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Setting'); ?></a></li>
            <li><a href="<?php echo url('/setting/leave_categories'); ?>"><?php echo __('Leave Categories'); ?></a></li>
            <li class="active"><?php echo __('Edit'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Edit leave category'); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo url('/setting/leave_categories/update/'. $leave_category['id']); ?>" method="post" name="leave_category_edit_form">
                <?php echo csrf_field(); ?>

                <div class="box-body">
                    <div class="row">
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

                        <div class="col-md-6">
                            <label for="leave_category"><?php echo __('Category Name'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('leave_category') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="leave_category" id="leave_category" class="form-control" value="<?php echo $leave_category['leave_category']; ?>">
                                <?php if($errors->has('leave_category')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('leave_category'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <label for="item"><?php echo __('Item'); ?> <span class="text-danger">*</span></label>
                                <div class="form-group<?php echo $errors->has('item') ? ' has-error' : ''; ?> has-feedback">
                                    <input type="text" name="item" id="item" class="form-control" value="<?php echo old('item', isset($leave_category) ? $leave_category['item'] : ''); ?>" placeholder="<?php echo __('Enter item..'); ?>">
                                    <?php if($errors->has('item')): ?>
                                    <span class="help-block">
                                        <strong><?php echo $errors->first('item'); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="qty"><?php echo __('Quantity'); ?> <span class="text-danger">*</span></label>
                                <div class="form-group<?php echo $errors->has('qty') ? ' has-error' : ''; ?> has-feedback">
                                    <input type="number" name="qty" id="qty" class="form-control" value="<?php echo old('qty', isset($leave_category) ? $leave_category['qty'] : ''); ?>" placeholder="<?php echo __('Enter quantity..'); ?>">
                                    <?php if($errors->has('qty')): ?>
                                    <span class="help-block">
                                        <strong><?php echo $errors->first('qty'); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="remarks"><?php echo __('Remarks'); ?></label>
                                <div class="form-group<?php echo $errors->has('remarks') ? ' has-error' : ''; ?> has-feedback">
                                    <textarea name="remarks" id="remarks" class="form-control" placeholder="<?php echo __('Enter remarks..'); ?>"><?php echo old('remarks', isset($leave_category) ? $leave_category['remarks'] : ''); ?></textarea>
                                    <?php if($errors->has('remarks')): ?>
                                    <span class="help-block">
                                        <strong><?php echo $errors->first('remarks'); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="type_of_leave"><?php echo __('Type of Leave'); ?> <span class="text-danger">*</span></label>
                                <div class="form-group<?php echo $errors->has('type_of_leave') ? ' has-error' : ''; ?> has-feedback">
                                    <select name="type_of_leave" id="type_of_leave" class="form-control">
                                        <option value="" selected disabled><?php echo __('Select type of leave'); ?></option>
                                        <option value="carry_forward" <?php echo old('type_of_leave', isset($leave_category) ? $leave_category['type_of_leave'] : '') == 'carry_forward' ? 'selected' : ''; ?>><?php echo __('Carry Forward'); ?></option>
                                        <option value="paid" <?php echo old('type_of_leave', isset($leave_category) ? $leave_category['type_of_leave'] : '') == 'paid' ? 'selected' : ''; ?>><?php echo __('Paid'); ?></option>
                                    </select>
                                    <?php if($errors->has('type_of_leave')): ?>
                                    <span class="help-block">
                                        <strong><?php echo $errors->first('type_of_leave'); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <!-- /.form-group -->
                            <label for="publication_status"><?php echo __('Publication Status'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('publication_status') ? ' has-error' : ''; ?> has-feedback">
                                <select name="publication_status" id="publication_status" class="form-control">
                                    <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                    <option value="1"><?php echo __('Published'); ?></option>
                                    <option value="0"><?php echo __('Unpublished'); ?></option>
                                </select>
                                <?php if($errors->has('publication_status')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('publication_status'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="leave_category_description"><?php echo __('Category Description'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('leave_category_description') ? ' has-error' : ''; ?> has-feedback">
                                <textarea class="textarea text-description" name="leave_category_description" id="leave_category_description"><?php echo $leave_category['leave_category_description']; ?></textarea>
                                <?php if($errors->has('leave_category')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('leave_category_description'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?php echo url('/setting/leave_categories'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo __('Cancel'); ?></a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> <?php echo __('Update leave category'); ?></button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['leave_category_edit_form'].elements['publication_status'].value = "<?php echo $leave_category['publication_status']; ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>