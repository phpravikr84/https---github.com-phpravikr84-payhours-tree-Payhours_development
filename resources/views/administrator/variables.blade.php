<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        routes: {
            LeaveCalculationShow: '{{ route('leave.calculate') }}',
            TakenDatesByUser: '{{ route("leave.takenDates", ["user_id" => auth()->id()]) }}',
            GetBankTransferSetup: '{{ route("get_bsp_bank_transfer_setup")}}',
            CheckBankExists: "{{ url('/setting/check-bank-exists')}}",
            BspBankTransferSetupStore: '{{ route("store_bsp_bank_transfer_setup") }}',
            BspBankTransferSetupRemove: "{{ url('/setting/bsp_bank_transfer_setups/remove')}}",
            BspBankTransferSetupUpdate: "{{ url('/setting/bsp_bank_transfer_setups/update')}}",
            BspBankSettingStore: '{{ route("store_bsp_bank_transfer_setup") }}',
            
            GetAnzBankTransferSetup: '{{ route("get_anz_bank_transfer_setup") }}',
            CheckAnzBankExists: '{{ url("/setting/check-anz-bank-exists") }}',
            AnzBankTransferSetupStore: '{{ route("anz_bank_transfer_setups_store") }}',
            AnzBankTransferSetupRemove: "{{ url('/setting/anz_bank_transfer_setups/remove') }}",
            AnzBankTransferSetupUpdate: "{{ url('/setting/anz_bank_transfer_setups/update') }}",
            AnzBankSettingStore: '{{ route("store_anz_bank_transfer_setup") }}',

             // WPAC Bank Transfer Setup
            GetWpacBankTransferSetup: '{{ route("get_wpac_bank_transfer_setup") }}',
            CheckWpacBankExists: '{{ url("/setting/check-wpac-bank-exists") }}',
            WpacBankTransferSetupStore: '{{ route("wpac_bank_transfer_setups_store") }}',
            WpacBankTransferSetupRemove: "{{ url('/setting/wpac_bank_transfer_setups/remove') }}",
            WpacBankTransferSetupUpdate: "{{ url('/setting/wpac_bank_transfer_setups/update') }}",
            WpacBankSettingStore: '{{ route("store_wpac_bank_transfer_setup") }}',

            // Kina Bank Transfer Setup
            GetKinaBankTransferSetup: '{{ route("get_kina_bank_transfer_setup") }}',
            CheckKinaBankExists: '{{ url("/setting/check-kina-bank-exists") }}',
            KinaBankTransferSetupStore: '{{ route("kina_bank_transfer_setups_store") }}',
            KinaBankTransferSetupRemove: "{{ url('/setting/kina_bank_transfer_setups/remove') }}",
            KinaBankTransferSetupUpdate: "{{ url('/setting/kina_bank_transfer_setups/update') }}",
            KinaBankSettingStore: '{{ route("store_kina_bank_transfer_setup") }}',
            
            //Pay Item
            PayItemEdit :'{{ url("/setting/pay_items/edit") }}',
            PayItemDel :'{{ url("/setting/pay_items/destroy") }}',
            PayItemUpdate :'{{ url("/setting/pay_items/update") }}',
            PayItemAdd : '{{ route("pay_items.store") }}',
        }
    };
</script>