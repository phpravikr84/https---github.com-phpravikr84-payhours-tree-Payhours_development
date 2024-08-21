<?php $__env->startSection('title', __('Add Superannuation')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Add Superannuation'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Superannuation Management'); ?></a></li>
            <li class="active"><?php echo __('Add Superannuation'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Add Superannuation'); ?></h3>
            </div>
            <form action="<?php echo route('superannuations.store'); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label for="code"><?php echo __('Code'); ?></label>
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name"><?php echo __('Name'); ?></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="employer_contribution_percentage"><?php echo __('Employer Contribution (%)'); ?></label>
                        <input type="number" name="employer_contribution_percentage" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="employer_contribution_fixed_amount"><?php echo __('Employer Contribution (Fixed Amount)'); ?></label>
                        <input type="number" name="employer_contribution_fixed_amount" class="form-control" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="tax_method_for_employee_contribution"><?php echo __('Tax Method for Employee Contribution'); ?></label>
                        <input type="text" name="tax_method_for_employee_contribution" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="included_bank_transfer"><?php echo __('Included in Bank Transfer'); ?></label>
                        <select name="included_bank_transfer" class="form-control">
                            <option value="0"><?php echo __('No'); ?></option>
                            <option value="1"><?php echo __('Yes'); ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bank_account_number"><?php echo __('Bank Account Number'); ?></label>
                        <input type="text" name="bank_account_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="account_name"><?php echo __('Account Name'); ?></label>
                        <input type="text" name="account_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bank_name"><?php echo __('Bank Name'); ?></label>
                        <input type="text" name="bank_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="employer_name"><?php echo __('Employer Name'); ?></label>
                        <input type="text" name="employer_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="employer_superannuation_no"><?php echo __('Employer Superannuation No'); ?></label>
                        <input type="text" name="employer_superannuation_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="registration_date"><?php echo __('Registration Date'); ?></label>
                        <input type="date" name="registration_date" class="form-control">
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