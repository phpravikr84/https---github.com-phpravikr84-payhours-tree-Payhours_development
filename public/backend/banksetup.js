$(function () {
    // Fetch data from bsp_bank_transfer_setups and fill the form
    $.ajax({
        url: window.Laravel.routes.GetBankTransferSetup,
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken
        },
        success: function (response) {
            if (response.exists) {
                $('#id').val(response.data.id);
                $('#bsp_customer_reference').val(response.data.bsp_customer_reference);
                $('#bsp_folder_directory').val(response.data.bsp_folder_directory);
                $('#gl_account_code').val(response.data.gl_account_code);
                
                $('#modify_setting').show();
                $('#save_setting').hide();
                $('#cancel_setting').hide();
                $('#bsp_customer_reference').attr('readonly', true);
                $('#bsp_folder_directory').attr('readonly', true);
                $('#gl_account_code').attr('readonly', true);
            } else {
                $('#modify_setting').hide();
                $('#save_setting').show();
                $('#cancel_setting').show();
                $('#bsp_customer_reference').attr('readonly', false);
                $('#bsp_folder_directory').attr('readonly', false);
                $('#gl_account_code').attr('readonly', false);
            }
        }
    });

    //Save Setting button clicked
    // Add selected bank
        $(document).on('click', '#save_setting', function () {
            // Get Value
            let bspSettingId = $('#id').val();
            let bspCustomerRef = $('#bsp_customer_reference').val();
            let bspFolderDir = $('#bsp_folder_directory').val();
            let glAccountCode = $('#gl_account_code').val();
        
            // Add Setting
            $.ajax({
                url: window.Laravel.routes.BspBankSettingStore,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': window.Laravel.csrfToken
                },
                data: {
                    id: bspSettingId,
                    bsp_customer_reference: bspCustomerRef,
                    bsp_folder_directory: bspFolderDir,
                    gl_account_code: glAccountCode
                },
                success: function (response) {
                    if (response.exists) {
                        Swal.fire('Bank already added', '', 'warning');
                    }
                }.bind(this),
                error: function (xhr, status, error) {
                    Swal.fire('Failed to save settings', error, 'error');
                }
            });
        });
        
    // Modify setting button clicked
    $('#modify_setting').click(function () {
        $('#save_setting').show();
        $('#cancel_setting').show();
        $('#modify_setting').hide();
        $('#bsp_customer_reference').attr('readonly', false);
        $('#bsp_folder_directory').attr('readonly', false);
        $('#gl_account_code').attr('readonly', false);
    });

    // Add selected bank
    $(document).on('click', '.selectedBank', function () {
        let bankId = $(this).data('bank-id');
        let bsp_setting_id = $('#id').val();

        // Check if bank already exists
        $.ajax({
            url: window.Laravel.routes.CheckBankExists,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            data: { bank_id: bankId },
            success: function (response) {
                if (response.exists) {
                    Swal.fire('Bank already added', '', 'warning');
                } else {
                    let bankCode = $(this).data('bank-code');
                    let bankName = $(this).data('bank-name');
                    let table = $('#selectedBanks tbody');

                    let $tblRow = `
                        <tr data-bank-id="${bankId}">
                            <td>${bankId}</td>
                            <td>${bankCode} - ${bankName}</td>
                            <td class="transaction-fee">0</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary pull-right edit-btn">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger pull-right remove-btn">Remove</a>
                            </td>
                        </tr>`;

                    table.append($tblRow);
                    console.log(window.Laravel.csrfToken);

                    // Save the bank to the database
                    $.ajax({
                        url: window.Laravel.routes.BspBankTransferSetupStore,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': window.Laravel.csrfToken
                        },
                        data: {
                            bsp_setting_id : bsp_setting_id,
                            bank_id: bankId,
                            transaction_fee: 0
                        },
                        success: function () {
                            Swal.fire('Bank added successfully', '', 'success');
                        }
                    });
                }
            }.bind(this)
        });
    });

    // Remove bank row
    $(document).on('click', '.remove-btn', function (e) {
        e.preventDefault();

        let $row = $(this).closest('tr');
        let bankId = $row.data('bank-id');

        $.ajax({
            url: window.Laravel.routes.BspBankTransferSetupRemove,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            data: { bank_id: bankId },
            success: function () {
                $row.remove();
                Swal.fire('Bank removed successfully', '', 'success');
            }
        });
    });

    // Edit transaction fee
    $(document).on('click', '.edit-btn', function (e) {
        e.preventDefault();

        let $row = $(this).closest('tr');
        let currentFee = $row.find('.transaction-fee').text();
        let bankId = $row.data('bank-id');

        Swal.fire({
            title: 'Enter new transaction fee',
            input: 'text',
            inputValue: currentFee,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                let newFee = result.value;
                $row.find('.transaction-fee').text(newFee);

                // Update transaction fee in the database
                $.ajax({
                    url: window.Laravel.routes.BspBankTransferSetupUpdate,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken
                    },
                    data: {
                        bank_id: bankId,
                        transaction_fee: newFee
                    },
                    success: function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                             text: 'Transaction fee updated successfully.',
                           confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload();
                           });
                    }
                });

            }
        });
    });

    // Cancel setting
    $('#cancel_setting').click(function () {
        $('#save_setting').hide();
        $('#cancel_setting').hide();
        $('#modify_setting').show();
    });
});

//ANZ
$(function () {
    // Fetch data from anz_bank_transfer_setups and fill the form
    $.ajax({
        url: window.Laravel.routes.GetAnzBankTransferSetup,
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken
        },
        success: function (response) {
            if (response.exists) {
                $('#id').val(response.data.id);
                $('#anz_customer_reference').val(response.data.anz_customer_reference);
                $('#anz_folder_directory').val(response.data.anz_folder_directory);
                $('#anz_gl_account_code').val(response.data.gl_account_code);
                
                $('#anz_modify_setting').show();
                $('#anz_save_setting').hide();
                $('#anz_cancel_setting').hide();
                $('#anz_customer_reference').attr('readonly', true);
                $('#anz_folder_directory').attr('readonly', true);
                $('#anz_gl_account_code').attr('readonly', true);
            } else {
                $('#anz_modify_setting').hide();
                $('#anz_save_setting').show();
                $('#anz_cancel_setting').show();
                $('#anz_customer_reference').attr('readonly', false);
                $('#anz_folder_directory').attr('readonly', false);
                $('#anz_gl_account_code').attr('readonly', false);
            }
        }
    });

    // Save Setting button clicked
    $(document).on('click', '#anz_save_setting', function () {
        // Get Value
        let anzSettingId = $('#id').val();
        let anzCustomerRef = $('#anz_customer_reference').val();
        let anzFolderDir = $('#anz_folder_directory').val();
        let glAccountCode = $('#anz_gl_account_code').val();
    
        // Add Setting
        $.ajax({
            url: window.Laravel.routes.AnzBankSettingStore,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            data: {
                id: anzSettingId,
                anz_customer_reference: anzCustomerRef,
                anz_folder_directory: anzFolderDir,
                gl_account_code: glAccountCode
            },
            success: function (response) {
                if (response.exists) {
                    Swal.fire('Bank already added', '', 'warning');
                } else {
                    Swal.fire('Settings saved successfully', '', 'success');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Failed to save settings', error, 'error');
            }
        });
    });

    // Modify setting button clicked
    $('#anz_modify_setting').click(function () {
        $('#anz_save_setting').show();
        $('#anz_cancel_setting').show();
        $('#anz_modify_setting').hide();
        $('#anz_customer_reference').attr('readonly', false);
        $('#anz_folder_directory').attr('readonly', false);
        $('#anz_gl_account_code').attr('readonly', false);
    });

    // Add selected bank
    $(document).on('click', '.anzSelectedBank', function () {
        let bankId = $(this).data('bank-id');
        let anz_setting_id = $('#id').val();

        // Check if bank already exists
        $.ajax({
            url: window.Laravel.routes.CheckAnzBankExists,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            data: { bank_id: bankId },
            success: function (response) {
                if (response.exists) {
                    Swal.fire('Bank already added', '', 'warning');
                } else {
                    let bankCode = $(this).data('bank-code');
                    let bankName = $(this).data('bank-name');
                    let table = $('#selectedBanks tbody');

                    let $tblRow = `
                        <tr data-bank-id="${bankId}">
                            <td>${bankId}</td>
                            <td>${bankCode} - ${bankName}</td>
                            <td class="transaction-fee">0</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary pull-right edit-btn">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger pull-right remove-btn">Remove</a>
                            </td>
                        </tr>`;

                    table.append($tblRow);

                    // Save the bank to the database
                    $.ajax({
                        url: window.Laravel.routes.AnzBankTransferSetupStore,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': window.Laravel.csrfToken
                        },
                        data: {
                            anz_setting_id: anz_setting_id,
                            bank_id: bankId,
                            transaction_fee: 0
                        },
                        success: function () {
                            Swal.fire('Bank added successfully', '', 'success');
                        }
                    });
                }
            }.bind(this)
        });
    });

    // Remove bank row
    $(document).on('click', '.anz-remove-btn', function (e) {
        e.preventDefault();

        let $row = $(this).closest('tr');
        let bankId = $row.data('bank-id');

        $.ajax({
            url: window.Laravel.routes.AnzBankTransferSetupRemove,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            data: { bank_id: bankId },
            success: function () {
                $row.remove();
                Swal.fire('Bank removed successfully', '', 'success');
            }
        });
    });

    // Edit transaction fee
    $(document).on('click', '.anz-edit-btn', function (e) {
        e.preventDefault();

        let $row = $(this).closest('tr');
        let currentFee = $row.find('.transaction-fee').text();
        let bankId = $row.data('bank-id');

        Swal.fire({
            title: 'Enter new transaction fee',
            input: 'text',
            inputValue: currentFee,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                let newFee = result.value;
                $row.find('.transaction-fee').text(newFee);

                // Update transaction fee in the database
                $.ajax({
                    url: window.Laravel.routes.AnzBankTransferSetupUpdate,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken
                    },
                    data: {
                        bank_id: bankId,
                        transaction_fee: newFee
                    },
                    success: function () {
                        Swal.fire('Transaction fee updated successfully', '', 'success');
                    },
                    error: function () {
                        Swal.fire('Failed to update transaction fee', '', 'error');
                    }
                });
            }
        });
    });
});
