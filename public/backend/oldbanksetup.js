// $(function () {
//     // Bank Transfer Setup JS

//     //Write ajax call to get data from bsp_bank_transfer_setups table and fill up through html dom in these fields 
//     // bsp_customer_reference, bsp_folder_directory,gl_account_code
//     //  If bsp_bank_transfer_setups table have empty record then in Save & Cancel button will display and user can save record
//     // If bsp_bank_transfer_setups table have value then it will show autofill value and only modify setting button will show
//     // after click modify setting button then save and cancel button will show at this save will update record
//     //Here is current button in html body
//     /*<button type="button" id="modify_setting" class="btn btn-primary">{{ __('Modify Setting') }}</button>
//     <button type="submit" id="save_setting" class="btn btn-success">{{ __('Save') }}</button>
//     <button type="button" id="cancel_setting" class="btn btn-cancel">{{ __('Cancel') }}</button>*/
//     $(document).on('click', '.selectedBank', function () {
//         //Check ajax that bankId passed already exist in the table bsp_setting_banks
//         //If it exist then show popup message in sweet alert that Bank already added 
//         //Otherwise it add bank below detail through ajax post method store route bsp_bank_transfer_setups.store
//         // And display item as below through ajax & if refresh it show from db from bsp_setting_banks
//         //alert('hi');
//         let bankId = $(this).data('bank-id');
//         let bankCode = $(this).data('bank-code');
//         let bankName = $(this).data('bank-name');
//         let table = document.getElementById('selectedBanks').getElementsByTagName('tbody')[0];

//         let $tblRow = `
//             <tr>
//                 <td>${bankId}</td>
//                 <td>${bankCode} - ${bankName}</td>
//                 <td class="transaction-fee">0</td>
//                 <td>
//                     <a href="#" class="btn btn-sm btn-primary pull-right edit-btn">Edit</a>
//                     <a href="#" class="btn btn-sm btn-danger pull-right remove-btn">Remove</a>
//                 </td>
//             </tr>`;

//         $(table).append($tblRow);
//     });

//     // Remove bank row
//     $(document).on('click', '.remove-btn', function (e) {
//         e.preventDefault();
//         $(this).closest('tr').remove();
//     });

//     // Edit transaction fee
//     //After click edit button a modal popup will open where transaction fee input will take with submit button
//     // After click submit of transaction fee it will update that transaction fee  bsp_setting_banks of that record
//     $(document).on('click', '.edit-btn', function (e) {
//         e.preventDefault();
        
//         let $row = $(this).closest('tr');
//         let currentFee = $row.find('.transaction-fee').text();

//         // Prompt for new transaction fee (or replace with a modal pop-up for better UX)
//         let newFee = prompt("Enter new transaction fee:", currentFee);

//         if (newFee !== null) {
//             $row.find('.transaction-fee').text(newFee);
//         }
//     });


// });


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
                        Swal.fire('Transaction fee updated successfully', '', 'success');
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

