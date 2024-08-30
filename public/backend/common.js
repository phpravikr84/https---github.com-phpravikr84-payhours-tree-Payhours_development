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


$(document).ready(function() {
    $('#addPayItem').on('click', function() {
        var form = $('#addPayItemForm');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // Close the modal
                    $('#addPayItemModal').modal('hide');
                    // Optionally, refresh the page or update the table/list dynamically
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value + '<br>';
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: errorMessage
                });
            }
        });
    });
});



$(document).ready(function() {
    // Handle Edit Modal data population
    $('#editPayItemModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var gl_account_id = button.data('glaccount');
        var accumulator_id = button.data('accumulator');
    
        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_name').val(name);
        modal.find('#edit_gl_account_id').val(gl_account_id);
        modal.find('#edit_accumulator_id').val(accumulator_id);
    
        var actionUrl = "{{ url('settings/pay-items') }}/" + id;
        $('#editPayItemForm').attr('action', actionUrl);
    });
    

    // Handle Delete action
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        Swal.fire({
            title: '{{ __("Are you sure?") }}',
            text: "{{ __('You won\'t be able to revert this!') }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '{{ __("Yes, delete it!") }}'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('settings/pay_items/destroy') }}/" + id,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire('{{ __("Deleted!") }}', response.message, 'success').then(() => {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        Swal.fire('{{ __("Error") }}', '{{ __("Something went wrong") }}', 'error');
                    }
                });
            }
        });
    });
});
