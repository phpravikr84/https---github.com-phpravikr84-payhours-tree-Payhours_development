<?php $__env->startSection('title', __('Kina Bank Transfer Setup')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo __('Kina Bank Transfer Setup'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Bank Management'); ?></a></li>
            <li class="active"><?php echo __('Kina Bank Transfer Setup'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Kina Bank Transfer Setup'); ?></h3>
            </div>
            <div class="box-body">
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                <div class="row">
                    <!-- Kina Bank Transfer Setup Form -->
                    <div class="col-md-6 px-4">
                        <h5><?php echo __('Kina Bank Transfer Settings'); ?></h5>
                        <form action="<?php echo route('kina_bank_transfer_setups_store'); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="box-tools pull-right">
                                <button type="button" id="kina_modify_setting" class="btn btn-primary"><?php echo __('Modify Setting'); ?></button>
                                <button type="button" id="kina_save_setting" class="btn btn-success"><?php echo __('Save'); ?></button>
                                <button type="button" id="kina_cancel_setting" class="btn btn-cancel"><?php echo __('Cancel'); ?></button>
                                <input type="hidden" id="kina_id" name="id" />
                            </div>
                            <div class="box-body pt-4">
                                <div class="form-group">
                                    <label for="kina_customer_reference"><?php echo __('Kina Customer Reference'); ?></label>
                                    <input type="text" name="kina_customer_reference" id="kina_customer_reference" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="kina_folder_directory"><?php echo __('Folder Directory'); ?></label>
                                    <input type="text" name="kina_folder_directory" id="kina_folder_directory" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="gl_code_id"><?php echo __('GL Account Code'); ?></label>
                                    <select name="gl_code_id" id="gl_code_id" class="form-control">
                                        <?php if($glCodes): ?>
                                            <?php $__currentLoopData = $glCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $glCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $glCode->id; ?>"><?php echo $glCode->gl_name; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Bank List and Add New Bank -->
                    <div class="col-md-6">
                        <h4><?php echo __('Add New Bank'); ?></h4>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addBankModal"><?php echo __('Include New Bank'); ?></button>
                        <div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="addBankModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="addBankModalLabel"><?php echo __('Select a Bank'); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered dataTable" id="dt-ref" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th><?php echo __('Id'); ?></th>
                                                    <th><?php echo __('Code'); ?></th>
                                                    <th><?php echo __('Name'); ?></th>
                                                    <th><?php echo __('Action'); ?></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><?php echo __('Id'); ?></th>
                                                    <th><?php echo __('Code'); ?></th>
                                                    <th><?php echo __('Name'); ?></th>
                                                    <th><?php echo __('Action'); ?></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $__currentLoopData = $bankList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo $bank->id; ?></td>
                                                        <td><?php echo $bank->bank_code; ?></td>
                                                        <td><?php echo $bank->bank_name; ?></td>
                                                        <td>
                                                            <button class="btn btn-success kinaSelectedBank" 
                                                                    data-bank-id="<?php echo $bank->id; ?>" 
                                                                    data-bank-code="<?php echo $bank->bank_code; ?>" 
                                                                    data-bank-name="<?php echo $bank->bank_name; ?>">
                                                                <?php echo __('Select'); ?>

                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Selected Banks -->
                        <div id="selectedKinaBanks">
                            <h4><?php echo __('Selected Banks'); ?></h4>
                            <table class="table table-bordered dataTable" id="dt-ref" width="100%" cellspacing="0">
                                <!-- Dynamically added selected banks will appear here -->
                                <thead>
                                    <tr>
                                        <th><?php echo __('Bank Id'); ?></th>
                                        <th><?php echo __('Bank Name'); ?></th>
                                        <th><?php echo __('Transaction Fee'); ?></th>
                                        <th><?php echo __('Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($kinaSettingBanks && $kinaSettingBanks->count()): ?>
                                        <?php $__currentLoopData = $kinaSettingBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kinaSettingBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-bank-id="<?php echo $kinaSettingBank->bank_id; ?>">
                                                <td><?php echo $kinaSettingBank->bank_id; ?></td>
                                                <td><?php echo $kinaSettingBank->bank_name; ?></td>
                                                <td><?php echo $kinaSettingBank->transaction_fee ? $kinaSettingBank->transaction_fee : 0; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary pull-right kina-edit-btn">Edit</a>
                                                    <a href="#" class="btn btn-sm btn-danger pull-right kina-remove-btn">Remove</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <!-- <tr>
                                            <td colspan="4" class="text-center"><?php echo __('No records found'); ?></td>
                                        </tr> -->
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>