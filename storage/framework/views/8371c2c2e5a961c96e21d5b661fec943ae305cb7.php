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
</div>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6">
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo __('Pay Items List'); ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPayItemModal"><?php echo __('Add Pay Item'); ?></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo __('Code'); ?></th>
                                    <th><?php echo __('Name'); ?></th>
                                    <th><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $payItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo $payItem->code; ?></td>
                                        <td><?php echo $payItem->name; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPayItemModal" data-id="<?php echo $payItem->id; ?>" data-name="<?php echo $payItem->name; ?>" data-glaccount="<?php echo $payItem->gl_account_id; ?>" data-accumulator="<?php echo $payItem->accumulator_id; ?>"><?php echo __('Edit'); ?></button>
                                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="<?php echo $payItem->id; ?>"><?php echo __('Delete'); ?></button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Add Pay Item Modal -->
            <div class="modal fade" id="addPayItemModal" tabindex="-1" role="dialog" aria-labelledby="addPayItemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="addPayItemForm" action="<?php echo route('pay_items.store'); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                            <div class="modal-header">
                                <h4 class="modal-title" id="addPayItemModalLabel"><?php echo __('Add Pay Item'); ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="code"><?php echo __('Code'); ?></label>
                                    <input type="text" class="form-control" id="code" name="code" required>
                                </div>
                                <div class="form-group">
                                    <label for="name"><?php echo __('Pay Item Name'); ?></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="gl_account_id"><?php echo __('GL Account'); ?></label>
                                    <select class="form-control" id="gl_account_id" name="gl_account_id" required>
                                        <?php $__currentLoopData = $glCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $glAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $glAccount->id; ?>"><?php echo $glAccount->gl_name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="accumulator_id"><?php echo __('Accumulator'); ?></label>
                                    <select class="form-control" id="accumulator_id" name="accumulator_id" required>
                                        <?php $__currentLoopData = $accumulators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accumulator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $accumulator->id; ?>"><?php echo $accumulator->pay_accumulator_name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tax_rate"><?php echo __('Tax Rate'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="tax_rate" name="tax_rate">
                                </div>
                                <div class="form-group">
                                    <label for="spread_code"><?php echo __('Spread Code'); ?></label>
                                    <input type="text" class="form-control" id="spread_code" name="spread_code">
                                </div>
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
                                <div class="form-group">
                                    <label for="superannuation_fund_id"><?php echo __('Superannuation Fund'); ?></label>
                                    <select class="form-control" id="superannuation_fund_id" name="superannuation_fund_id">
                                        <?php $__currentLoopData = $supperannuations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $super): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $super->id; ?>"><?php echo $super->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_mode"><?php echo __('Payment Mode'); ?></label>
                                    <input type="text" class="form-control" id="payment_mode" name="payment_mode">
                                </div>
                                <div class="form-group">
                                    <label for="fixed_amount"><?php echo __('Fixed Amount'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="fixed_amount" name="fixed_amount">
                                </div>
                                <div class="form-group">
                                    <label for="percentage"><?php echo __('Percentage'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="percentage" name="percentage">
                                </div>
                                <div class="form-group">
                                    <label for="sequence"><?php echo __('Sequence'); ?></label>
                                    <input type="text" class="form-control" id="sequence" name="sequence">
                                </div>
                                <div class="form-group">
                                    <label for="will_accure_leave"><?php echo __('Will Accrue Leave'); ?></label>
                                    <select class="form-control" id="will_accure_leave" name="will_accure_leave">
                                        <option value="0"><?php echo __('No'); ?></option>
                                        <option value="1"><?php echo __('Yes'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close'); ?></button>
                                <button type="button"  id="addPayItem" class="btn btn-primary"><?php echo __('Add Pay Item'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Edit Pay Item Modal -->
            <div class="modal fade" id="editPayItemModal" tabindex="-1" role="dialog" aria-labelledby="editPayItemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editPayItemForm" action="" method="POST">
                        <?php echo csrf_field(); ?>

                        
                            <div class="modal-header">
                                <h4 class="modal-title" id="editPayItemModalLabel"><?php echo __('Edit Pay Item'); ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="edit_id" name="id">
                                <div class="form-group">
                                    <label for="edit_name"><?php echo __('Pay Item Name'); ?></label>
                                    <input type="text" class="form-control" id="edit_name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_gl_account_id"><?php echo __('GL Account'); ?></label>
                                    <select class="form-control" id="gl_account_id" name="gl_account_id" required>
                                        <?php $__currentLoopData = $glCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $glAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $glAccount->id; ?>"><?php echo $glAccount->gl_name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_accumulator_id"><?php echo __('Accumulator'); ?></label>
                                    <select class="form-control" id="edit_accumulator_id" name="accumulator_id" required>
                                        <?php $__currentLoopData = $accumulators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accumulator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo $accumulator->id; ?>"><?php echo $accumulator->pay_accumulator_name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close'); ?></button>
                                <?php if(isset($payItem)): ?>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPayItemModal"
                                    data-id="<?php echo $payItem->id; ?>" data-name="<?php echo $payItem->name; ?>"
                                    data-glaccount="<?php echo $payItem->gl_account_id; ?>" data-accumulator="<?php echo $payItem->accumulator_id; ?>">
                                    <?php echo __('Edit'); ?>

                                </button>
                                <?php endif; ?>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>