<?php $__env->startSection('title', __('Pay Items Management')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Pay Items Management'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Settings'); ?></a></li>
            <li class="active"><?php echo __('Pay Items'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Left Column: Data Table -->
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo __('Pay Items List'); ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" id="addNewBtn" class="btn btn-success"><?php echo __('Add New'); ?></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered" id="payItemsTable">
                            <thead>
                                <tr>
                                    <th><?php echo __('Code'); ?></th>
                                    <th><?php echo __('Name'); ?></th>
                                    <th><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $payItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id="<?php echo $payItem->id; ?>">
                                        <td><?php echo $payItem->code; ?></td>
                                        <td><?php echo $payItem->name; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info payitem-btn-edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
</svg></button>
                                            <button type="button" class="btn btn-sm btn-danger payitem-btn-delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="formTitle"><?php echo __('Pay Item Details'); ?></h3>
                    </div>
                    <div class="box-body">
                        <form id="payItemForm">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" id="payItemId" name="id">
                            <div class="pull-right clearfix" style="margin-bottom:5px;">
                                <button type="button" id="modifyBtn" class="btn btn-primary"><?php echo __('Modify'); ?></button>
                                <button type="button" id="saveSettingsBtn" class="btn btn-success" style="display:none;"><?php echo __('Save Settings'); ?></button>
                                <button type="button" id="cancelBtn" class="btn btn-warning" style="display:none;"><?php echo __('Cancel'); ?></button>
                            </div>
                            <div class="form-group">
                                <label for="code"><?php echo __('Code'); ?></label>
                                <input type="text" class="form-control" id="code" name="code" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="name"><?php echo __('Pay Item Name'); ?></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                    <label for="gl_account_id"><?php echo __('GL Account'); ?></label>
                                    <select class="form-control" id="gl_account_id" name="glaccount" required>
                                        <?php $__currentLoopData = $glCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $glAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $glAccount->id; ?>"><?php echo $glAccount->gl_name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="accumulator_id"><?php echo __('Accumulator'); ?></label>
                                    <select class="form-control" id="accumulator_id" name="accumulator" required>
                                        <?php $__currentLoopData = $accumulators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accumulator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $accumulator->id; ?>"><?php echo $accumulator->pay_accumulator_name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="tax_rate"><?php echo __('Tax Rate'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="tax_rate" name="tax_rate">
                                </div>
                                <div class="form-group">
                                    <label for="spread_code"><?php echo __('Spread Code'); ?></label>
                                    <input type="text" class="form-control" id="spread_code" name="spread_code">
                                </div> -->
                                <div class="form-group">
                                    <label for="taxflag"><?php echo __('Tax Flag'); ?></label>
                                    <select class="form-control" id="taxflag" name="taxflag">
                                        <option value="TA" selected="">Taxable Benefit</option>
                                        <option value="NA">Non-Taxable Benefit</option>
                                        <option value="NT">Notional Allowance</option>
                                        <option value="AI">Adjust Taxable Income</option>
                                        <option value="TR">Tax Adjustment</option>
                                        <option value="BC">Bank Credit</option>
                                        <option value="ND">After Tax Deduction</option>
                                        <option value="DD">Before Tax Deduction</option>
                                        <option value="NN">Notional Deduction</option>
                                        <option value="BD">Bank Deduction</option>
                                        <option value="GD">Gratuity Deduction</option>
                                        <option value="SE">Employee Default Super</option>
                                        <option value="SEA">Employee Additional Super</option>
                                        <option value="SS">Super Sacrifice</option>
                                        <option value="SR">Employer Default Super</option>
                                        <option value="SRA">Employer Additional Super</option>
                                    </select>
                                </div>
                                <span id="bankFields">
                                    <div class="form-group">
                                        <label for="bank_id"><?php echo __('Bank'); ?></label>
                                        <select class="form-control" id="bank_id" name="bank_id">
                                            <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $bank->id; ?>"><?php echo $bank->bank_name; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_detail_id"><?php echo __('Bank Detail'); ?></label>
                                        <select class="form-control" id="bank_detail_id" name="bank_detail_id">
                                            <?php $__currentLoopData = $bankDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $bankDetail->id; ?>"><?php echo $bankDetail->bank_detail_name; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </span>
                                <div class="form-group" id="superannuationFields">
                                    <label for="superannuation_fund_id"><?php echo __('Superannuation Fund'); ?></label>
                                    <select class="form-control" id="superannuation_fund_id" name="superannuation_fund_id">
                                        <?php $__currentLoopData = $supperannuations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $super): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $super->id; ?>"><?php echo $super->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_mode"><?php echo __('Payment Mode'); ?></label>
                                    <select class="form-control" id="payment_mode" name="payment_mode" onchange="onChangePayMode()">
                                        <option value="F" selected="">Fixed Amount or User Defined</option>
                                        <option value="P">Percentage</option>
                                    </select>
                                </div>
                                <div class="form-group" id="fixed_panel">
                                    <label for="fixed_amount"><?php echo __('Fixed Amount'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="fixed_amount" name="fixed_amount">
                                </div>
                                <div class="form-group" id="percentage_panel">
                                    <label for="percentage"><?php echo __('Percentage'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="percentage" name="percentage">
                                </div>
                                <div class="form-group">
                                    <label for="will_accure_leave"><?php echo __('Will Accrue Leave'); ?></label>
                                    <select class="form-control" id="will_accure_leave" name="will_accure_leave">
                                        <option value="0"><?php echo __('No'); ?></option>
                                        <option value="1"><?php echo __('Yes'); ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sequence"><?php echo __('Sequence'); ?></label>
                                    <input type="text" class="form-control" id="sequence" name="sequence">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function onChangePayMode() {
        var pMode = document.getElementById('payment_mode').value;
        if (pMode == 'F') {
            document.getElementById('percentage_panel').style.display = 'none';
            document.getElementById('fixed_panel').style.display = 'block';
        } else if (pMode == 'P') {
            document.getElementById('percentage_panel').style.display = 'block';
            document.getElementById('fixed_panel').style.display = 'none';
        } else {
            document.getElementById('percentage_panel').style.display = 'block';
            document.getElementById('fixed_panel').style.display = 'block';
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>