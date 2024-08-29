<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
<script>
    window.Laravel = {
        csrfToken: '<?php echo csrf_token(); ?>',
        routes: {
            LeaveCalculationShow: '<?php echo route('leave.calculate'); ?>',
            TakenDatesByUser: '<?php echo route("leave.takenDates", ["user_id" => auth()->id()]); ?>',
            GetBankTransferSetup: '<?php echo route("get_bsp_bank_transfer_setup"); ?>',
            CheckBankExists: "<?php echo url('/setting/check-bank-exists'); ?>",
            BspBankTransferSetupStore: '<?php echo route("store_bsp_bank_transfer_setup"); ?>',
            BspBankTransferSetupRemove: "<?php echo url('/setting/bsp_bank_transfer_setups/remove'); ?>",
            BspBankTransferSetupUpdate: "<?php echo url('/setting/bsp_bank_transfer_setups/update'); ?>",
            BspBankSettingStore: '<?php echo route("bsp_bank_transfer_setups_store"); ?>',
            AnzBankTransferSetupStore: '<?php echo route("store_anz_bank_transfer_setup"); ?>',
            AnzBankTransferSetupRemove: "<?php echo url('/setting/anz_bank_transfer_setups/remove'); ?>",
            AnzBankTransferSetupUpdate: "<?php echo url('/setting/anz_bank_transfer_setups/update'); ?>",
            AnzBankSettingStore: '<?php echo route("anz_bank_transfer_setups_store"); ?>'
        }
    };
</script>