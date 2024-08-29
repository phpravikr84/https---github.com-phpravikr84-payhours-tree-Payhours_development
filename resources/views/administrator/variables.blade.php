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
            BspBankSettingStore: '{{ route("bsp_bank_transfer_setups_store") }}',
            AnzBankTransferSetupStore: '{{ route("store_anz_bank_transfer_setup") }}',
            AnzBankTransferSetupRemove: "{{ url('/setting/anz_bank_transfer_setups/remove') }}",
            AnzBankTransferSetupUpdate: "{{ url('/setting/anz_bank_transfer_setups/update') }}",
            AnzBankSettingStore: '{{ route("anz_bank_transfer_setups_store") }}'
        }
    };
</script>