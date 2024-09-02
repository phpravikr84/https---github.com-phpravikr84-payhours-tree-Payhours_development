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
            BspBankSettingStore: '<?php echo route("store_bsp_bank_transfer_setup"); ?>',
            
            GetAnzBankTransferSetup: '<?php echo route("get_anz_bank_transfer_setup"); ?>',
            CheckAnzBankExists: '<?php echo url("/setting/check-anz-bank-exists"); ?>',
            AnzBankTransferSetupStore: '<?php echo route("anz_bank_transfer_setups_store"); ?>',
            AnzBankTransferSetupRemove: "<?php echo url('/setting/anz_bank_transfer_setups/remove'); ?>",
            AnzBankTransferSetupUpdate: "<?php echo url('/setting/anz_bank_transfer_setups/update'); ?>",
            AnzBankSettingStore: '<?php echo route("store_anz_bank_transfer_setup"); ?>',

             // WPAC Bank Transfer Setup
            GetWpacBankTransferSetup: '<?php echo route("get_wpac_bank_transfer_setup"); ?>',
            CheckWpacBankExists: '<?php echo url("/setting/check-wpac-bank-exists"); ?>',
            WpacBankTransferSetupStore: '<?php echo route("wpac_bank_transfer_setups_store"); ?>',
            WpacBankTransferSetupRemove: "<?php echo url('/setting/wpac_bank_transfer_setups/remove'); ?>",
            WpacBankTransferSetupUpdate: "<?php echo url('/setting/wpac_bank_transfer_setups/update'); ?>",
            WpacBankSettingStore: '<?php echo route("store_wpac_bank_transfer_setup"); ?>',

            // Kina Bank Transfer Setup
            GetKinaBankTransferSetup: '<?php echo route("get_kina_bank_transfer_setup"); ?>',
            CheckKinaBankExists: '<?php echo url("/setting/check-kina-bank-exists"); ?>',
            KinaBankTransferSetupStore: '<?php echo route("kina_bank_transfer_setups_store"); ?>',
            KinaBankTransferSetupRemove: "<?php echo url('/setting/kina_bank_transfer_setups/remove'); ?>",
            KinaBankTransferSetupUpdate: "<?php echo url('/setting/kina_bank_transfer_setups/update'); ?>",
            KinaBankSettingStore: '<?php echo route("store_kina_bank_transfer_setup"); ?>',
            
            //Pay Item
            PayItemEdit :'<?php echo url("/setting/pay_items/edit"); ?>',
            PayItemDel :'<?php echo url("/setting/pay_items/destroy"); ?>',
            PayItemUpdate :'<?php echo url("/setting/pay_items/update"); ?>',
            PayItemAdd : '<?php echo route("pay_items.store"); ?>',
        }
    };
</script>