<?php $__env->startSection('title', __('Bank Details')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo __('BANK DETAILS'); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Bank Details'); ?></a></li>
            <li><a><?php echo __('Setting'); ?></a></li>
            <li><a href="<?php echo url('/setting/departments'); ?>"><?php echo __('Bank Details'); ?></a></li>
            <li class="active"><?php echo __('Add Bank Details'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Add Bank Details'); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo url('setting/bank_details/store'); ?>" method="post" name="bank_details_add_form">
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
                            <?php else: ?>
                                <p class="text-yellow"><?php echo __('Enter bank details. All field are required.'); ?> </p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="bank_detail_code"><?php echo __('Bank Code'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('bank_detail_code') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="bank_detail_code" id="bank_detail_code" class="form-control" value="<?php echo old('bank_detail_code'); ?>" placeholder="<?php echo __('Enter bank details code..'); ?>">
                                <?php if($errors->has('bank_detail_code')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('bank_detail_code'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <label for="bank_detail_name"><?php echo __('Bank Name'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('bank_detail_name') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="bank_detail_name" id="bank_detail_name" class="form-control" value="<?php echo old('bank_detail_name'); ?>" placeholder="<?php echo __('Enter bank name..'); ?>">
                                <?php if($errors->has('bank_detail_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('bank_detail_name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <label for="bsb_number"><?php echo __('BSB Number'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('bsb_number') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="bsb_number" id="bsb_number" class="form-control" value="<?php echo old('bsb_number'); ?>" placeholder="<?php echo __('Enter bsb number..'); ?>">
                                <?php if($errors->has('bsb_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('bsb_number'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <label for="bank_type"><?php echo __('Bank Type'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('bank_type') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="bank_type" id="bank_type" class="form-control" value="<?php echo old('bank_type'); ?>" placeholder="<?php echo __('Enter bank type..'); ?>">
                                <?php if($errors->has('bank_type')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('bank_type'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <label for="bank_phone"><?php echo __('Phone'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('bank_phone') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="bank_phone" id="bank_phone" class="form-control" value="<?php echo old('bank_phone'); ?>" placeholder="<?php echo __('Enter bank phone..'); ?>">
                                <?php if($errors->has('bank_phone')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('bank_phone'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <label for="employment_account_number"><?php echo __('Employement Account Number'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('employment_account_number') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="employment_account_number" id="employment_account_number" class="form-control" value="<?php echo old('employment_account_number'); ?>" placeholder="<?php echo __('Enter employment account number..'); ?>">
                                <?php if($errors->has('employment_account_number')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('employment_account_number'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <label for="account_suffix"><?php echo __('Account Suffix'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('account_suffix') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="account_suffix" id="account_suffix" class="form-control" value="<?php echo old('account_suffix'); ?>" placeholder="<?php echo __('Enter account suffix..'); ?>">
                                <?php if($errors->has('account_suffix')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('account_suffix'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <!-- /.form-group -->
                            <label for="status"><?php echo __('Publication Status'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('status') ? ' has-error' : ''; ?> has-feedback">
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
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="bank_address"><?php echo __('Bank Address'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('bank_address') ? ' has-error' : ''; ?> has-feedback">
                                <textarea class="textarea text-description" name="bank_address" id="bank_address" placeholder="<?php echo __('Enter bank address..'); ?>"><?php echo old('bank_address'); ?></textarea>
                                <?php if($errors->has('bank_address')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('bank_address'); ?></strong>
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
                    <a href="<?php echo url('/setting/bank_details'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo __('Cancel'); ?></a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo __('Add Bank Details'); ?>t</button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['bank_details_add_form'].elements['status'].value = "<?php echo old('status'); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>