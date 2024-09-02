$(function () {
    // Leave Application form
    $('#casual_leave_only').hide();
    $(document).on('change', '#leave_category_id, #start_date, #end_date', function() {
        let leaveCategoryId = $('#leave_category_id').val();
        let startDate = $('#start_date').val();
        let endDate = $('#end_date').val();
        let leaveDuration = $('#leave_duration').val();
        let userId = $('#user_id').val();
        // let is_sandwich_leave = $('#is_sandwich_leave').val();
        // let sandwich_leave_days = $('#sandwich_leave_days').val();
        // let holiday_count =  $('#holiday_count').val();

        if (leaveCategoryId && startDate && endDate) {
            if(leaveCategoryId==2){
                $('#casual_leave_only').show();
            } else {
                $('#casual_leave_only').hide();
            }
            $.ajax({
                url: window.Laravel.routes.LeaveCalculationShow,
                type: 'GET',
                data: {
                    leave_category_id: leaveCategoryId,
                    start_date: startDate,
                    end_date: endDate,
                    leave_duration: leaveDuration,
                    user_id: userId,
                },
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        console.log('pending_leave:'+response.pending_leave);
                        console.log('loss of pay'+response.loss_of_pay_days);
                        console.log('sandwich leave' + response.sandwich_leave_days);
                        $('#pending_leave').val(response.pending_leave);
                        $('#loss_of_pay_days').val(response.loss_of_pay_days);
                        $('#leave_applied_days').val(response.leave_applied_days);
                        $('#is_sandwich_leave').val(response.is_sandwich_leave);
                        $('#sandwich_leave_days').val(response.sandwich_leave_days);
                        $('#holiday_count').val(response.holiday_count);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText); // Log the error for debugging
                    alert('An error occurred while calculating leave.');
                }
            });
        }
    });
});

// $(document).on('change', '#leave_category_id', function() {
//     // Get the current date
//     var today = new Date();
//     // Calculate the date one month ago
//     var oneMonthAgo = new Date();
//     oneMonthAgo.setMonth(today.getMonth() - 1);

//     let leaveCategoryId = $(this).val();

//     // Destroy any existing datepicker to prevent duplication
//     $(".datepicker").datepicker("destroy");

//     if (leaveCategoryId == 1) {
//         $(".datepicker").datepicker({
//             dateFormat: 'yy-mm-dd',
//             minDate: oneMonthAgo, // Set the min date to one month ago
//             maxDate: today, // Set the max date to today
//             beforeShowDay: function(date) {
//                 // Disable future dates
//                 if (date > today) {
//                     return [false, "", "Unavailable"];
//                 }
//                 return [true, ""]; // Enable all other dates within the range
//             }
//         });
//     } else if (leaveCategoryId == 2 || leaveCategoryId == 3) {
//         // Array to store disabled date ranges
//         var disabledDateRanges = [];

//         // Fetch already taken leave dates
//         $.ajax({
//             url: window.Laravel.routes.TakenDatesByUser,
//             method: 'GET',
//             success: function(response) {
//                 disabledDateRanges = response.dates.map(function(range) {
//                     return {
//                         start: new Date(range.start_date),
//                         end: new Date(range.end_date)
//                     };
//                 });
//                 initializeDatepicker();
//             },
//             error: function() {
//                 console.error("Failed to fetch leave dates");
//             }
//         });

//         // Initialize the datepicker
//         function initializeDatepicker() {
//             $(".datepicker").datepicker({
//                 dateFormat: 'yy-mm-dd',
//                 minDate: today,
//                 beforeShowDay: function(date) {
//                     return disableDateRanges(date);
//                 }
//             });
//         }

//         // Function to disable specific date ranges
//         function disableDateRanges(date) {
//             for (var i = 0; i < disabledDateRanges.length; i++) {
//                 var range = disabledDateRanges[i];
//                 if (date >= range.start && date <= range.end) {
//                     return [false, 'ui-state-disabled', 'Taken Leave']; // Add a CSS class for styling if needed
//                 }
//             }
//             return [true, ''];
//         }
//     }
// });




// $(function() {

//     // Get the current date
//     var today = new Date();
//     $(document).on('change', '#user_id', function(){
//         let user_id = $(this).val();

//         // Array to store disabled date ranges
//         var disabledDateRanges = [];

//         // Fetch already taken leave dates
//         $.ajax({
//             url: window.Laravel.routes.TakenDatesByUser,
//             method: 'GET',
//             success: function(response) {
//                 disabledDateRanges = response.dates.map(function(range) {
//                     return {
//                         start: new Date(range.start_date),
//                         end: new Date(range.end_date)
//                     };
//                 });
//                 initializeDatepicker();
//             }
//         });
//     })
   

//     // Initialize the datepicker
//     function initializeDatepicker() {
//         $(".datepicker").datepicker({
//             dateFormat: 'yy-mm-dd',
//             minDate: today,
//             beforeShowDay: function(date) {
//                 return disableDateRanges(date);
//             }
//         });
//     }

//     // Function to disable specific date ranges
//     function disableDateRanges(date) {
//         for (var i = 0; i < disabledDateRanges.length; i++) {
//             var range = disabledDateRanges[i];
//             if (date >= range.start && date <= range.end) {
//                 return [false, 'ui-state-disabled', 'Taken Leave']; // Add a CSS class for styling if needed
//             }
//         }
//         return [true, ''];
//     }
// });

$(function() {
    // Get the current date
    var today = new Date();

    // Function to disable specific date ranges
    function disableDateRanges(date) {
        for (var i = 0; i < disabledDateRanges.length; i++) {
            var range = disabledDateRanges[i];
            if (date >= range.start && date <= range.end) {
                return [false, 'ui-state-disabled', 'Taken Leave']; // Add a CSS class for styling if needed
            }
        }
        return [true, ''];
    }

    // Initialize the datepicker
    function initializeDatepicker() {
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: today,
            beforeShowDay: function(date) {
                return disableDateRanges(date);
            }
        });
    }

    // Handle change event for leave category
    $(document).on('change', '#leave_category_id', function() {
        let leaveCategoryId = $(this).val();

        // Destroy any existing datepicker to prevent duplication
        $(".datepicker").datepicker("destroy");

        if (leaveCategoryId == 1) {
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: oneMonthAgo, // Set the min date to one month ago
                maxDate: today, // Set the max date to today
                beforeShowDay: function(date) {
                    if (date > today) {
                        return [false, "", "Unavailable"];
                    }
                    return [true, ""]; // Enable all other dates within the range
                }
            });
        } else if (leaveCategoryId == 2 || leaveCategoryId == 3) {
            // Fetch already taken leave dates
            $.ajax({
                url: window.Laravel.routes.TakenDatesByUser,
                method: 'GET',
                success: function(response) {
                    disabledDateRanges = response.dates.map(function(range) {
                        return {
                            start: new Date(range.start_date),
                            end: new Date(range.end_date)
                        };
                    });
                    initializeDatepicker();
                },
                error: function() {
                    console.error("Failed to fetch leave dates");
                }
            });
        }
    });

    // Handle change event for user ID
    $(document).on('change', '#user_id', function() {
        let user_id = $(this).val();

        // Fetch already taken leave dates
        $.ajax({
            url: window.Laravel.routes.TakenDatesByUser,
            method: 'GET',
            data: { user_id: user_id }, // Pass user ID to the backend
            success: function(response) {
                disabledDateRanges = response.dates.map(function(range) {
                    return {
                        start: new Date(range.start_date),
                        end: new Date(range.end_date)
                    };
                });
                initializeDatepicker();
            },
            error: function() {
                console.error("Failed to fetch leave dates");
            }
        });
    });
});


/**
 * Pay Item Jquery start
 */
$(function() {
    //Show and Hide form field on base of taxflag selected or change
    // Function to show/hide fields based on taxflag value
    function toggleFields(taxflag) {
        $('#superannuationFields').hide();
        $('#bankFields').hide();

        switch (taxflag) {
            case 'SE':
            case 'SEA':
            case 'SS':
            case 'SR':
            case 'SRA':
                $('#superannuationFields').show();
                break;

            case 'BC':
            case 'NN':
            case 'BD':
            case 'GD':
                $('#bankFields').show();
                break;

            default:
                // Hide all conditional fields if no match
                break;
        }
    }

    //ToggleFields Two
    function toggleFieldsPaymentType(ptype){
        //alert(ptype);
        switch(ptype){
            case 'F':
                $('#percentage_panel').hide();
                $('#fixed_panel').show();
                break;
            case 'P':
                $('#percentage_panel').show();
                $('#fixed_panel').show();
                break;
            default:
                //Hide all 
                $('#percentage_panel').hide();
                $('#fixed_panel').hide();
        }
    }

    // Trigger toggle on page load based on selected taxflag
    toggleFields($('#taxflag').val());

    //Trigger toggle on base of page load selected payment_mode
    toggleFieldsPaymentType($('#payment_mode').val());

    // Trigger toggle on taxflag change
    $(document).on('change','#taxflag', function() {
        toggleFields($(this).val());
    });


    /**
     *  By Default Add new Form Loading
     */
            $('#formTitle').text('Add New Pay Item');
            $('#payItemForm').trigger("reset");
            $('#payItemId').val('');
            $('#saveSettingsBtn').show();
            $('#cancelBtn').show();
            $('#modifyBtn').hide();
            $('#payItemForm input, #payItemForm select').prop('readonly', false);
    /**
     * End
     */

    // Show Add New Form
    $(document).on('click','#addNewBtn', function() {
        $('#formTitle').text('Add New Pay Item');
        $('#payItemForm').trigger("reset");
        $('#payItemId').val('');
        $('#saveSettingsBtn').show();
        $('#cancelBtn').show();
        $('#modifyBtn').hide();
        $('#payItemForm input, #payItemForm select').prop('readonly', false);
    });

    // Show Modify Mode
    $(document).on('click','#modifyBtn', function() {
        $('#saveSettingsBtn').show();
        $('#cancelBtn').show();
        $('#modifyBtn').hide();
        $('#payItemForm input:not(#code), #payItemForm select').prop('readonly', false);
    });

    // Cancel Edit/Add
    $(document).on('click','#cancelBtn', function() {
        $('#saveSettingsBtn').hide();
        $('#cancelBtn').hide();
        $('#modifyBtn').show();
        $('#payItemForm input, #payItemForm select').prop('readonly', true);
    });

    // Edit Pay Item
    var lastSelectedRow; // Declare a variable to store the last selected row
    $(document).on('click','.payitem-btn-edit', function() {
        var row = $(this).closest('tr');
        var payItemId = row.data('id');

        if (lastSelectedRow) {
            lastSelectedRow.css('background-color', ''); // Reset color of the last selected row
        }

        $.ajax({
            url: `${window.Laravel.routes.PayItemEdit}/${payItemId}`,
            method: 'GET',
            success: function(data) {
                $('#formTitle').text('Edit Pay Item');
                $('#payItemId').val(data.id);
                $('#code').val(data.code);
                $('#name').val(data.name);
                $('#gl_account_id').val(data.glaccount);
                $('#accumulator_id').val(data.accumulator);
                $('#tax_rate').val(data.tax_rate);
                $('#spread_code').val(data.spread_code);
                $('#taxflag').val(data.taxflag);
                $('#bank_id').val(data.bank_id);
                $('#bank_detail_id').val(data.bank_detail_id);
                $('#superannuation_fund_id').val(data.superannuation_fund_id);
                $('#payment_mode').val(data.payment_mode);
                $('#fixed_amount').val(data.fixed_amount);
                $('#percentage').val(data.percentage);
                $('#sequence').val(data.sequence);
                $('#will_accure_leave').val(data.will_accure_leave);

                // Hide buttons initially
                $('#saveSettingsBtn').hide();
                $('#cancelBtn').hide();
                $('#modifyBtn').show();

                // Set fields to readonly
                $('#payItemForm input, #payItemForm select').prop('readonly', true);
                  // Add color to the selected row
                row.css('background-color', '#cfe2ff'); // Change to your desired color
                lastSelectedRow = row; // Update the last selected row

            },
            error: function(err) {
                console.log('Error:', err);
                alert('Failed to retrieve pay item data.');
            }
        });
    });

    // Save New or Updated Pay Item
    $(document).on('click', '#saveSettingsBtn', function() {
        var payItemId = $('#payItemId').val();
        var url = payItemId ? `${Laravel.routes.PayItemUpdate}/${payItemId}` : Laravel.routes.PayItemAdd;
        var method = payItemId ? 'POST' : 'POST';

        $.ajax({
            url: url,
            method: method,
            data: $('#payItemForm').serialize(),
            success: function(data) {
                Swal.fire({
                    title: 'Success!',
                    text: payItemId ? 'Pay Item updated successfully!' : 'New Pay Item added successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload(); // Reload the page to see the changes
                });
            },
            error: function(err) {
                if (err.status === 422) {
                    // Laravel validation error
                    let errors = err.responseJSON.errors;
                    let errorMessages = '';

                    $.each(errors, function(key, value) {
                        errorMessages += value.join('<br>') + '<br>';
                    });

                    Swal.fire({
                        title: 'Validation Error!',
                        html: errorMessages,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // General error handling
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while saving the Pay Item!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

    // Delete Pay Item
    $(document).on('click', '.payitem-btn-delete', function() {
        if(confirm('Are you sure you want to delete this pay item?')) {
            var payItemId = $(this).closest('tr').data('id');

            $.ajax({
                url: `${window.Laravel.routes.PayItemDel}/${payItemId}`,
                method: 'POST',
                data: {
                    _token: window.Laravel.csrfToken // Include the CSRF token
                },
                headers: {
                    'X-CSRF-TOKEN': window.Laravel.csrfToken
                },
                success: function(data) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Pay Item deleted successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload(); // Reload the page to see the changes
                    });
                },
                error: function(err) {
                    Swal.fire({
                        title: 'Error deleting Pay Item!',
                        html: errorMessages,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });

    //Create Pay JS
      // Departments Select All/Clear
      $('#select-all-departments').click(function() {
        $('input[name="departments[]"]').prop('checked', true);
    });
    $('#clear-all-departments').click(function() {
        $('input[name="departments[]"]').prop('checked', false);
    });

    // Pay Locations Select All/Clear
    $('#select-all-locations').click(function() {
        $('input[name="pay_locations[]"]').prop('checked', true);
    });
    $('#clear-all-locations').click(function() {
        $('input[name="pay_locations[]"]').prop('checked', false);
    });

});
