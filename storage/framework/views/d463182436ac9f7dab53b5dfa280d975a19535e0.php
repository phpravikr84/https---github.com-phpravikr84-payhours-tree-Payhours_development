<?php $__env->startSection('title', __('Add reference')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo __('REFERENCES'); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?>Dashboard</a></li>
            <li><a href="<?php echo url('/people/references'); ?>"><?php echo __('References'); ?></a></li>
            <li class="active"><?php echo __('Add reference'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Add reference'); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo url('people/references/store'); ?>" method="post" name="reference_add_form">
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
                            <p class="text-yellow"><?php echo __('Enter reference type details. All field are required.'); ?> </p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="name"><?php echo __('Reference Name'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('name') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo old('name'); ?>" placeholder="<?php echo __('Enter name..'); ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('name'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="email"><?php echo __('Email'); ?></label>
                            <div class="form-group<?php echo $errors->has('email') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo old('email'); ?>" placeholder="<?php echo __('Enter email address..'); ?>">
                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('email'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="contact_no_one"><?php echo __('Contact No'); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('contact_no_one') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="<?php echo old('contact_no_one'); ?>" placeholder="<?php echo __('Enter contact no..'); ?>">
                                <?php if($errors->has('contact_no_one')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('contact_no_one'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="web"><?php echo __('Web'); ?></label>
                            <div class="form-group<?php echo $errors->has('web') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="web" id="web" class="form-control" value="<?php echo old('web'); ?>" placeholder="<?php echo __('Enter web..'); ?>">
                                <?php if($errors->has('web')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('web'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="gender"><?php echo __('Gender'); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('gender') ? ' has-error' : ''; ?> has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled><?php echo __('Select one'); ?></option>
                                    <option value="m"><?php echo __('Male'); ?></option>
                                    <option value="f"><?php echo __('Female'); ?></option>
                                </select>
                                <?php if($errors->has('gender')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('gender'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="datepicker"><?php echo __('Date of Birth'); ?></label>
                            <div class="form-group<?php echo $errors->has('date_of_birth') ? ' has-error' : ''; ?> has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date_of_birth" class="form-control pull-right" value="<?php echo old('date_of_birth'); ?>" id="datepicker">
                                </div>
                                <?php if($errors->has('date_of_birth')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('date_of_birth'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <label for="present_address"><?php echo __('Address'); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo $errors->has('present_address') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="present_address" id="present_address" class="form-control" value="<?php echo old('present_address'); ?>" placeholder="<?php echo __('Enter address..'); ?>">
                                <?php if($errors->has('present_address')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('present_address'); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="contact_no_two"><?php echo __('Contact No (Optional)'); ?></label>
                            <div class="form-group<?php echo $errors->has('contact_no_two') ? ' has-error' : ''; ?> has-feedback">
                                <input type="text" name="contact_no_two" id="contact_no_two" class="form-control" value="<?php echo old('contact_no_two'); ?>" placeholder="<?php echo __('Enter address..'); ?>">
                                <?php if($errors->has('contact_no_two')): ?>
                                <span class="help-block">
                                    <strong><?php echo $errors->first('contact_no_two'); ?></strong>
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
                    <a href="<?php echo url('/people/references'); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> <?php echo __('Cancel'); ?></a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i><?php echo __(' Add reference'); ?></button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['reference_add_form'].elements['gender'].value = "<?php echo old('gender'); ?>";
    document.forms['reference_add_form'].elements['designation_id'].value = "<?php echo old('designation_id'); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>