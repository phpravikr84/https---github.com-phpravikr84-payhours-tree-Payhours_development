<?php $__env->startSection('title', __('Manage Salary')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     <?php echo __('PAYROLL'); ?> 
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i><?php echo __('Dashboard'); ?> </a></li>
      <li><a><?php echo __('Payroll'); ?></a></li>
      <li class="active"><?php echo __('Set Salary Details'); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Set Salary Details'); ?></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
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
              <form class="form-horizontal" name="employee_select_form" action="<?php echo url('/hrm/payroll/go'); ?>" method="post">
                <?php echo csrf_field(); ?>


                <div class="form-group<?php echo $errors->has('user_id') ? ' has-error' : ''; ?>">
                  <label for="user_id" class="col-sm-3 control-label"><?php echo __('Employee Name'); ?></label>
                  <div class="col-sm-6">
                    <select name="user_id" class="form-control" id="user_id">
                      <option selected disabled><?php echo __('Select One'); ?></option>
                      <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('user_id')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('user_id'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="form-group<?php echo $errors->has('basic_salary') ? ' has-error' : ''; ?>">
                  <div class=" col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-info btn-flat"><i class="icon fa fa-arrow-right"></i> <?php echo __('Go'); ?></button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /. end col -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix"></div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.end.col -->

      <form name="employee_salary_form" id="employee_salary_form" action="<?php echo url('/hrm/payroll/store'); ?>" method="post">
        <?php echo csrf_field(); ?>


        <input type="hidden" name="user_id" value="<?php echo $employee_id; ?>">

        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo __('Salary Details'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group<?php echo $errors->has('employee_type') ? ' has-error' : ''; ?>">
                  <label for="employee_type" class="col-sm-3 control-label"><?php echo __('Employee Type'); ?></label>
                  <div class="col-sm-2">
                    <select name="employee_type" class="form-control" id="employee_type">
                      <option selected disabled><?php echo __('Select One'); ?></option>
                      <option value="1"><?php echo __('Provision'); ?></option>
                      <option value="2"><?php echo __('Permanent'); ?></option>
                      <option value="3"><?php echo __('Full Time'); ?></option>
                      <option value="4"><?php echo __('Part Time'); ?></option>
                      <option value="5"><?php echo __('Adhoc'); ?></option>
                    </select>
                    <?php if($errors->has('employee_type')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('employee_type'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-sm-4">
                    <select name="resident_status" class="form-control" id="resident_status">
                      <option selected disabled><?php echo __('Select Resident/Non-Resident'); ?></option>
                      <option value="1"><?php echo __('Resident'); ?></option>
                      <option value="2"><?php echo __('Non-Resident'); ?></option>
                    </select>
                    <?php if($errors->has('resident_status')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('resident_status'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>
                <!-- <div class="form-group<?php echo $errors->has('hr_place') ? ' has-error' : ''; ?>">
                  <label for="hr_place" class="col-sm-3 control-label"><?php echo __('Place for HR Allowance'); ?></label>
                  <div class="col-sm-3">
                    <select name="hr_place" id="hr_place" class="form-control">
                      <option selected disabled><?php echo __('Select place for house allowance'); ?></option>
                      <?php $__currentLoopData = $loca_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo $item['loca_name']; ?>"><?php echo $item['places']; ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('hr_place')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('hr_place'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" name="hr_area" class="form-control" id="hr_area" value="<?php echo old('hr_area'); ?>" placeholder="<?php echo __('Area...'); ?>" readonly="true">
                    <?php if($errors->has('hr_area')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('hr_area'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div> -->

                <div class="form-group<?php echo $errors->has('no_of_dependent') ? ' has-error' : ''; ?>">
                  <label for="no_of_dependent" class="col-sm-3 control-label"><?php echo __('No. of Dependent'); ?></label>
                  <div class="col-sm-6">
                    <input type="number" name="no_of_dependent" class="form-control" id="no_of_dependent" value="<?php echo old('no_of_dependent'); ?>" placeholder="<?php echo __('Enter no. of dependent..'); ?>">
                    <?php if($errors->has('no_of_dependent')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('no_of_dependent'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>
                <!-- <div class="form-group<?php echo $errors->has('annual_basic') ? ' has-error' : ''; ?>">
                  <label for="basic_salary" class="col-sm-3 control-label"><?php echo __('Annual Basic'); ?></label>
                  <div class="col-sm-6">
                    <input type="number" name="yearrate" class="form-control" id="yearrate" value="<?php echo old('basic_salary'); ?>" placeholder="<?php echo __('Enter working hours..'); ?>">
                    <?php if($errors->has('annual_basic')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('annual_basic'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div> -->

                <div class="form-group<?php echo $errors->has('basic_salary') ? ' has-error' : ''; ?>">
                  <label for="basic_salary" class="col-sm-3 control-label"><?php echo __('Fortnight Salary'); ?></label>
                  <div class="col-sm-6">
                    <input type="number" name="basic_salary" class="form-control" id="basic_salary" value="<?php echo old('basic_salary'); ?>" placeholder="<?php echo __('Enter fortnight salary..'); ?>">
                    <?php if($errors->has('basic_salary')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('basic_salary'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>                

                <div class="form-group<?php echo $errors->has('hrly_salary_rate') ? ' has-error' : ''; ?>">
                  <label for="hrly_salary_rate" class="col-sm-3 control-label"><?php echo __('Rate'); ?></label>
                  <div class="col-sm-6">
                    <input type="number" name="hourrate" class="form-control" id="hourrate" value="<?php echo old('hrly_salary_rate'); ?>" placeholder="<?php echo __('Enter working hours..'); ?>">
                    <?php if($errors->has('hrly_salary_rate')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('hrly_salary_rate'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="form-group<?php echo $errors->has('overtime_hr') ? ' has-error' : ''; ?>">
                    <label for="overtime_hr" class="col-sm-3 control-label"><?php echo __('Overtime Details'); ?></label>
                    <div class="col-sm-2">
                      <input type="number" name="overtime_hr" class="form-control" id="overtime_hr" value="<?php echo old('overtime_hr'); ?>" placeholder="<?php echo __('Enter overtime hours..'); ?>">
                      <?php if($errors->has('overtime_hr')): ?>
                      <span class="help-block">
                        <strong><?php echo $errors->first('overtime_hr'); ?></strong>
                      </span>
                      <?php endif; ?>
                    </div>
                <!-- </div>
                <div class="form-group<?php echo $errors->has('overtime_rate') ? ' has-error' : ''; ?>"> -->
                  <!-- <label for="overtime_rate" class="col-sm-3 control-label"><?php echo __('Overtime Rate'); ?></label> -->
                  <div class="col-sm-2">
                    <input type="number" name="overtime_rate" class="form-control" id="overtime_rate" value="<?php echo old('overtime_rate'); ?>" placeholder="<?php echo __('Enter overtime rate..'); ?>">
                    <?php if($errors->has('overtime_rate')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('overtime_rate'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                <!-- </div>
                <div class="form-group<?php echo $errors->has('overtime_amt') ? ' has-error' : ''; ?>"> -->
                  <!-- <label for="overtime_amt" class="col-sm-3 control-label"><?php echo __('Overtime Amount'); ?></label> -->
                  <div class="col-sm-2">
                    <input type="number" name="overtime_amt" class="form-control" id="overtime_amt" value="<?php echo old('overtime_amt'); ?>" placeholder="<?php echo __('Overtime amount..'); ?>" readonly>
                    <?php if($errors->has('overtime_amt')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('overtime_amt'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="form-group<?php echo $errors->has('sales_comm') ? ' has-error' : ''; ?>">
                  <label for="sales_comm" class="col-sm-3 control-label"><?php echo __('Sales Commission'); ?></label>
                  <div class="col-sm-6">
                    <input type="number" name="sales_comm" class="form-control" id="sales_comm" value="<?php echo old('sales_comm'); ?>" placeholder="<?php echo __('Enter sales commission amount..'); ?>">
                    <?php if($errors->has('sales_comm')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('sales_comm'); ?></strong>
                    </span>
                    <?php endif; ?>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.end.col -->
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo __('Allowances'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-sm-8" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('hr_place') ? ' has-error' : ''; ?>">
                  <label for="hr_place"><?php echo __('Place Name'); ?></label>
                  <!-- <div class="col-sm-3"> -->
                    <select name="hr_place" id="hr_place" class="form-control">
                      <option selected disabled><?php echo __('Select place for house allowance'); ?></option>
                      <?php $__currentLoopData = $loca_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo $item['id']; ?>"><?php echo $item['places']; ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('hr_place')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('hr_place'); ?></strong>
                    </span>
                    <?php endif; ?>
                  <!-- </div> -->
                </div>
              </div>
              <div class="col-sm-4" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('hr_area') ? ' has-error' : ''; ?>">  
                  <label for="hr_area"><?php echo __('Area Name'); ?></label>
                  <!-- <div class="col-sm-3"> -->
                    <input type="text" name="hr_area" class="form-control" id="hr_area" value="<?php echo old('hr_area'); ?>" placeholder="<?php echo __('Area...'); ?>" readonly="true">
                    <?php if($errors->has('hr_area')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('hr_area'); ?></strong>
                    </span>
                    <?php endif; ?>
                  <!-- </div> -->
                </div>
              </div>
              <div class="col-sm-4" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('hra_type') ? ' has-error' : ''; ?>">
                      <!-- <label for="hra_type" class="col-sm-4 control-label" style="padding: unset;"><?php echo __('Housing Allowance Type'); ?></label> -->
                      <label for="hra_type"><?php echo __('Housing Allowance Type'); ?></label>
                      <select name="hra_type" class="form-control" id="hra_type">
                        <option selected disabled><?php echo __('Select One'); ?></option>
                        <option value="1"><?php echo __('Rental'); ?></option>
                        <option value="2"><?php echo __('Kind'); ?></option>
                        <option value="3"><?php echo __('Not Applicable'); ?></option>
                      </select>
                      <?php if($errors->has('hra_type')): ?>
                      <span class="help-block">
                        <strong><?php echo $errors->first('hra_type'); ?></strong>
                      </span>
                      <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-5" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('hra_amount_per_week') ? ' has-error' : ''; ?>">
                  <label for="hra_amount_per_week"><?php echo __('House Rent/Purchase Amount'); ?></label>
                  <input type="number" name="hra_amount_per_week" value="<?php echo old('hra_amount_per_week'); ?>" class="form-control" id="hra_amount_per_week" placeholder="<?php echo __('Enter amount ..'); ?>">
                  <?php if($errors->has('hra_amount_per_week')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('hra_amount_per_week'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-3" style="padding: unset;">
                <div class="form-group<?php echo $errors->has('house_rent_allowance') ? ' has-error' : ''; ?>">
                  <label for="house_rent_allowance"><?php echo __('Housing Allowance'); ?></label>
                  <input type="number" name="house_rent_allowance" value="<?php echo old('house_rent_allowance'); ?>" class="form-control"  id="house_rent_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                  <?php if($errors->has('house_rent_allowance')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('house_rent_allowance'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('va_type') ? ' has-error' : ''; ?>">
                      <label for="va_type"><?php echo __('Vehicle Allowance Type'); ?></label>
                      <select name="va_type" class="form-control" id="va_type">
                        <option selected disabled><?php echo __('Select One'); ?></option>
                        <option value="1"><?php echo __('With Fuel'); ?></option>
                        <option value="2"><?php echo __('Without Fuel'); ?></option>
                        <option value="3"><?php echo __('Not Applicable'); ?></option>
                      </select>
                      <?php if($errors->has('va_type')): ?>
                      <span class="help-block">
                        <strong><?php echo $errors->first('va_type'); ?></strong>
                      </span>
                      <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6" style="padding: unset;">
                <div class="form-group<?php echo $errors->has('vehicle_allowance') ? ' has-error' : ''; ?>">
                  <label for="vehicle_allowance"><?php echo __('Vehicle Allowance'); ?></label>
                  <input type="number" name="vehicle_allowance" value="<?php echo old('vehicle_allowance'); ?>" class="form-control" id="vehicle_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                  <?php if($errors->has('vehicle_allowance')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('vehicle_allowance'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('meals_allowance') ? ' has-error' : ''; ?>">
                  <label for="meals_allowance"><?php echo __('Meals (Messing) Allowance'); ?></label> 
                  <input type="checkbox" style="margin-left: 10px; margin-top: unset" name="meals_tag" id="meals_tag" value="0" >
                  <input type="number" name="meals_allowance" value="<?php echo old('meals_allowance'); ?>" class="form-control" id="meals_allowance" placeholder="<?php echo __('0'); ?>" readonly>
                  <?php if($errors->has('meals_allowance')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('meals_allowance'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6" style="padding: unset;">
                <div class="form-group<?php echo $errors->has('medical_allowance') ? ' has-error' : ''; ?>">
                  <label for="medical_allowance"><?php echo __('Medical Allowance'); ?></label>
                  <input type="number" name="medical_allowance" value="<?php echo old('medical_allowance'); ?>" class="form-control" id="medical_allowance" placeholder="<?php echo __('Enter medical allowance..'); ?>">
                  <?php if($errors->has('medical_allowance')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('medical_allowance'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('special_allowance') ? ' has-error' : ''; ?>">
                  <label for="special_allowance"><?php echo __('Telephone Allowance'); ?></label>
                  <input type="number" name="special_allowance" value="<?php echo old('special_allowance'); ?>" class="form-control" id="special_allowance" placeholder="<?php echo __('Enter telephone allowance..'); ?>">
                  <?php if($errors->has('special_allowance')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('special_allowance'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6" style="padding: unset;">
              <div class="form-group<?php echo $errors->has('other_allowance') ? ' has-error' : ''; ?>">
                <label for="other_allowance"><?php echo __('Servant Allowance'); ?></label>
                <input type="number" name="other_allowance" value="<?php echo old('other_allowance'); ?>" class="form-control" id="other_allowance" placeholder="<?php echo __('Enter domestic servant allowance..'); ?>">
                <?php if($errors->has('other_allowance')): ?>
                <span class="help-block">
                  <strong><?php echo $errors->first('other_allowance'); ?></strong>
                </span>
                <?php endif; ?>
              </div>
              </div>
              <div class="col-sm-6" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('electricity_allowance') ? ' has-error' : ''; ?>">
                  <label for="electricity_allowance"><?php echo __('Electricity Allowance'); ?></label>
                  <input type="number" name="electricity_allowance" value="<?php echo old('electricity_allowance'); ?>" class="form-control" id="electricity_allowance" placeholder="<?php echo __('Enter electricity allowance..'); ?>">
                  <?php if($errors->has('electricity_allowance')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('electricity_allowance'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6" style="padding: unset;">
              <div class="form-group<?php echo $errors->has('security_allowance') ? ' has-error' : ''; ?>">
                <label for="security_allowance"><?php echo __('Security Allowance'); ?></label>
                <input type="number" name="security_allowance" value="<?php echo old('security_allowance'); ?>" class="form-control" id="security_allowance" placeholder="<?php echo __('Enter security allowance..'); ?>">
                <?php if($errors->has('security_allowance')): ?>
                <span class="help-block">
                  <strong><?php echo $errors->first('security_allowance'); ?></strong>
                </span>
                <?php endif; ?>
              </div>
              </div>
              <div class="form-group<?php echo $errors->has('provident_fund_contribution') ? ' has-error' : ''; ?>">
                <label for="provident_fund_contribution"><?php echo __('Superannuation Fund Contribution'); ?></label>
                <input type="number" name="provident_fund_contribution" value="<?php echo old('provident_fund_contribution'); ?>" class="form-control" id="provident_fund_contribution" placeholder="<?php echo __('Enter superannuation fund contribution..'); ?>">
                <?php if($errors->has('provident_fund_contribution')): ?>
                <span class="help-block">
                  <strong><?php echo $errors->first('provident_fund_contribution'); ?></strong>
                </span>
                <?php endif; ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.end.col -->
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo __('Deductions'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-sm-4" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('tax_deduction_a') ? ' has-error' : ''; ?>">
                  <label for="tax_deduction_a"><?php echo __('Tax Deduction (A)'); ?></label>
                  <input type="number" name="tax_deduction_a" value="<?php echo old('tax_deduction_a'); ?>" class="form-control" id="tax_deduction_a" placeholder="<?php echo __('Enter tax deduction..'); ?>" readonly>
                  <?php if($errors->has('tax_deduction_a')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('tax_deduction_a'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-8" style="padding-left: unset;">
                <div class="form-group<?php echo $errors->has('tax_deduction_b') ? ' has-error' : ''; ?>">
                  <label for="tax_deduction_b"><?php echo __('Tax Deduction (B)'); ?></label>
                  <div class="row">
                  <div class="col-sm-6">
                  <input type="number" name="tax_deduction_b" value="<?php echo old('tax_deduction_b'); ?>" class="form-control" id="tax_deduction_b" placeholder="<?php echo __('Enter tax deduction..'); ?>" readonly>
                  </div>
                  <div class="col-sm-6">
                  <input type="button" id="taxcal" class="btn btn-primary btn-flat" value="<?php echo __('Calculate Tax'); ?>">
                  </div>
                  </div>
                  <?php if($errors->has('tax_deduction_b')): ?>
                  <span class="help-block">
                    <strong><?php echo $errors->first('tax_deduction_b'); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group<?php echo $errors->has('provident_fund_deduction') ? ' has-error' : ''; ?>">
                <label for="provident_fund_deduction"><?php echo __('Superannuation Fund Deduction'); ?></label>
                <input type="number" name="provident_fund_deduction" value="<?php echo old('provident_fund_deduction'); ?>" class="form-control" id="provident_fund_deduction" placeholder="<?php echo __('Enter superannuation fund deduction..'); ?>">
                <?php if($errors->has('provident_fund_deduction')): ?>
                <span class="help-block">
                  <strong><?php echo $errors->first('provident_fund_deduction'); ?></strong>
                </span>
                <?php endif; ?>
              </div>
              <!-- <div class="form-group<?php echo $errors->has('other_deduction') ? ' has-error' : ''; ?>">
                <label for="other_deduction"><?php echo __('Other Deduction'); ?></label>
                <input type="number" name="other_deduction" value="<?php echo old('other_deduction'); ?>" class="form-control" id="other_deduction" placeholder="<?php echo __('Enter other deduction..'); ?>">
                <?php if($errors->has('other_deduction')): ?>
                <span class="help-block">
                  <strong><?php echo $errors->first('other_deduction'); ?></strong>
                </span>
                <?php endif; ?>
              </div> -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.end.col -->

        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo __('Superannuation Fund'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label for="total_provident_fund"><?php echo __('Total Superannuation Fund'); ?></label>
                <input type="number" class="form-control" id="total_provident_fund" readonly>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.end.col -->

        <!-- <div class="col-md-offset-6 col-md-6"> -->
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo __('Total Salary Details'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label for="gross_salary"><?php echo __('Gross Salary'); ?></label>
                <input type="number" disabled class="form-control" id="gross_salary">
              </div>
              <div class="form-group<?php echo $errors->has('total_deduction') ? ' has-error' : ''; ?>">
                <label for="total_deduction"><?php echo __('Total Deduction'); ?></label>
                <input type="number" disabled class="form-control" id="total_deduction">
              </div>
              <div class="form-group">
                <label for="net_salary"><?php echo __('Net Salary'); ?></label>
                <input type="number" disabled class="form-control" id="net_salary">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-flat pull-right"><i class="fa fa-save"></i> <?php echo __('Save Details'); ?></button>
            </div>
          </div>
        </div>
        <!-- /.end.col -->

      </form>

    </div>
  </section>
  <!-- /.content -->
</div>
<script>
    (function($){
        $(document).ready(function(){
            $("#hr_place").on("change", function(){
                  var hra_place_id = $("#hr_place").val();
                  if(hra_place_id >= 1) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/hra_area_src'); ?>" + "/" + hra_place_id,
                        success: function(response) {
                            $("#hr_area").val(response);
                            hra_area1 = $("#hr_area").val();
                            if(hra_area1 == "" || hra_area1 == 'Area 3') {
                              $('#hra_amount_per_week').attr('readonly', true);
                              $('#hra_type').attr('readonly', true);
                              $('#hra_amount_per_week').val('');
                              $('#house_rent_allowance').val('');
                            }else{
                              $('#hra_amount_per_week').attr('readonly', false);
                              $('#hra_type').attr('readonly', false);                  
                              $('#hra_amount_per_week').val('');
                              $('#house_rent_allowance').val('');
                            }
                        },
                        error:function(err){

                        }
                    })
                  }
                  //$("#hr_area").val(hra_area1);
                  // hra_area1 = $("#hr_area").val();
                  // if(hra_area1 == "" || hra_area1 == 'Area 3') {
                  //   $('#hra_amount_per_week').attr('readonly', true);
                  //   $('#hra_type').attr('readonly', true);
                  //   $('#hra_amount_per_week').val('');
                  //   $('#house_rent_allowance').val('');
                  // }else{
                  //   $('#hra_amount_per_week').attr('readonly', false);
                  //   $('#hra_type').attr('readonly', false);                  
                  //   $('#hra_amount_per_week').val('');
                  //   $('#house_rent_allowance').val('');
                  // }
            })

            $("#hra_amount_per_week").on("keyup", function(){
                var hra_rent = $("#hra_amount_per_week").val();
                var hra_type = $("#hra_type").val();

                  if(parseInt(hra_rent) >0 ){
                    if(hra_type == 0 || hra_type == null){
                      alert("Please select Housing Allowance Type...");
                      $("#hra_amount_per_week").val('');
                      return;
                    }
                  }else{
                    $("#house_rent_allowance").val(0);
                    return;
                  }

                var area_type = $("#hr_area").val(); //'Area 1';
                if(hra_rent) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/hra'); ?>" + "/" + hra_rent + "/" + hra_type+ "/" + area_type,
                        success: function(response) {
                            console.log(response);
                            $("#house_rent_allowance").val(response);
                        },
                        error:function(err){

                        }
                    })
                }
            })
            
            $("#va_type").on("change", function(){
                // alert("finally bye");
                var va_type = $("#va_type").val();
                if(va_type>=1 && va_type<=2) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/vehicle'); ?>" + "/" + va_type,
                        success: function(response) {
                            console.log(response);
                            $("#vehicle_allowance").val(response);
                        },
                        error:function(err){

                        }
                    })
                } else {
                  $("#vehicle_allowance").val('');
                  return;
                }
            })

            $("#meals_tag").on("click", function(){
                var meals_type = $("#meals_tag").is(":checked");
                if(meals_type) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo secure_url('/hrm/payroll/meals'); ?>" + "/" + '3',
                        success: function(response) {
                            console.log(response);
                            $("#meals_allowance").val(response);
                        },
                        error:function(err){

                        }
                    })
                }else{
                  $("#meals_allowance").val('');
                  return;
                }
            })

            $("#overtime_hrs").on("keyup", function(){
                var overtime_hrs = $("#overtime_hrs").val();
                var overtime_rate = $("#overtime_rate").val();
                var overtime_amt = +overtime_hrs * +overtime_rate;
                $("#overtime_amt").val(overtime_amt);
            })
            $("#overtime_rate").on("keyup", function(){
                var overtime_hrs = $("#overtime_hr").val();
                var overtime_rate = $("#overtime_rate").val();
                var overtime_amt = +overtime_hrs * +overtime_rate;
                $("#overtime_amt").val(overtime_amt);
            })

            $("#taxcal").on("click", function(){
                // alert("finally bye");
                var gross_sal = $("#gross_salary").val();
                var dependent = $("#no_of_dependent").val();
                if(dependent == ""){
                  dependent = 0;
                }
                var resident_status = $("#resident_status").val();
                if(gross_sal == 0 || gross_sal == '' || resident_status == null){
                  return;
                }
                $.ajax({
                    type: "get",
                    url: "<?php echo secure_url('/hrm/payroll/taxcal'); ?>" + "/" + gross_sal + "/" + dependent + "/" + resident_status,
                    success: function(response) {
                        console.log(response);
                        $("#tax_deduction_a").val(parseFloat(response.frt_tax_amt).toFixed(2));
                        calculation();
                    },
                    error:function(err){

                    }
                })
            })

      });
    })(jQuery);
</script>

<script type="text/javascript">
  // For Kepp Data After Reload
  document.forms['employee_select_form'].elements['user_id'].value = "<?php echo $employee_id; ?>";

  <?php if(!empty(old('employee_type'))): ?>
    document.forms['employee_salary_form'].elements['employee_type'].value = "<?php echo old('employee_type'); ?>";
  <?php endif; ?>

 
  $(document).ready(function(){
    calculation();
  });


  //For Calculation
  $(document).on("keyup", "#employee_salary_form", function() {
    calculation();
  });

  function calculation() {
    var sum = 0;
    var basic_salary = $("#basic_salary").val();
    var overtime_amt = $("#overtime_amt").val();
    var sales_comm = $("#sales_comm").val();
    var house_rent_allowance = $("#house_rent_allowance").val();
    var vehicle_allowance = $("#vehicle_allowance").val();
    var meals_allowance = $("#meals_allowance").val();
    var electricity_allowance = $("#electricity_allowance").val();
    var security_allowance = $("#security_allowance").val();
    var medical_allowance = $("#medical_allowance").val();
    var special_allowance = $("#special_allowance").val(); // Telephone
    var provident_fund_contribution = $("#provident_fund_contribution").val();
    var other_allowance = $("#other_allowance").val();  //Servant
    var tax_deduction_a = $("#tax_deduction_a").val();
    var tax_deduction_a = $("#tax_deduction_a").val();
    var provident_fund_deduction = $("#provident_fund_deduction").val();
    // var other_deduction = $("#other_deduction").val();

    //var gross_salary = (basic_salary + house_rent_allowance + vehicle_allowance + meals_allowance + electricity_allowance + security_allowance + medical_allowance + special_allowance + other_allowance);
    //var gross_salary = (+basic_salary + +house_rent_allowance + +vehicle_allowance + +meals_allowance + +electricity_allowance + +security_allowance + +medical_allowance + +special_allowance + +other_allowance);
    var gross_salary = +basic_salary + +overtime_amt + +sales_comm + +house_rent_allowance + +medical_allowance + +special_allowance + +other_allowance + +vehicle_allowance + +meals_allowance + +electricity_allowance + +security_allowance;

    //var total_deduction = parseFloat(+tax_deduction + +provident_fund_deduction + +other_deduction);
    var total_deduction = +tax_deduction_a + +provident_fund_deduction;

    $("#total_provident_fund").val(+provident_fund_contribution + +provident_fund_deduction);

    $("#gross_salary").val(gross_salary);
    $("#total_deduction").val(total_deduction);
    $("#net_salary").val(+gross_salary - +total_deduction);
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>