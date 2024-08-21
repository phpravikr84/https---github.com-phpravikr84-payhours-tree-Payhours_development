<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

header("Cache-Control: no-cache, must-revalidate");
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/', 'Auth\LoginController@login')->name('login');;
Auth::routes();

Route::group(['prefix' => 'setting', 'middleware' => 'auth', 'as' => 'setting.'], function () {
	Route::resource('role', 'RoleController');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', 'HomeController@index')->name('dashboard');

	// Branch Management Section //
	Route::get('/setting/branches', 'BranchManagementController@index')->name('branches.index');
	Route::get('/setting/branches/create', 'BranchManagementController@create')->name('branches.create');
	Route::post('/setting/branches/store', 'BranchManagementController@store')->name('branches.store');
	Route::get('/setting/branches/edit/{id}', 'BranchManagementController@edit')->name('branches.edit');
	Route::post('/setting/branches/update/{id}', 'BranchManagementController@update')->name('branches.update');
	Route::post('/setting/branches/destroy/{id}', 'BranchManagementController@destroy')->name('branches.destroy');	

	// Bank Listing Section //
	Route::get('/setting/bank_lists', 'BankManagementController@index')->name('banks.index');
	Route::get('/setting/bank_lists/create', 'BankManagementController@create')->name('banks.create');
	Route::post('/setting/bank_lists/store', 'BankManagementController@store')->name('banks.store');
	Route::get('/setting/bank_lists/edit/{id}', 'BankManagementController@edit')->name('banks.edit');
	Route::post('/setting/bank_lists/update/{id}', 'BankManagementController@update')->name('banks.update');
	Route::post('/setting/bank_lists/destroy/{id}', 'BankManagementController@destroy')->name('banks.destroy');	
	
	// Pay Batch Number Section //
	Route::get('/setting/pay_batch_numbers', 'PayBatchNumberController@index')->name('pay_batch_numbers.index');
	Route::get('/setting/pay_batch_numbers/create', 'PayBatchNumberController@create')->name('pay_batch_numbers.create');
	Route::post('/setting/pay_batch_numbers/store', 'PayBatchNumberController@store')->name('pay_batch_numbers.store');
	Route::get('/setting/pay_batch_numbers/edit/{id}', 'PayBatchNumberController@edit')->name('pay_batch_numbers.edit');
	Route::post('/setting/pay_batch_numbers/update/{id}', 'PayBatchNumberController@update')->name('pay_batch_numbers.update');
	Route::post('/setting/pay_batch_numbers/destroy/{id}', 'PayBatchNumberController@destroy')->name('pay_batch_numbers.destroy');	
	
	// Pay Location Section //
	Route::get('/setting/pay_locations', 'PayLocationController@index')->name('pay_locations.index');
	Route::get('/setting/pay_locations/create', 'PayLocationController@create')->name('pay_locations.create');
	Route::post('/setting/pay_locations/store', 'PayLocationController@store')->name('pay_locations.store');
	Route::get('/setting/pay_locations/edit/{id}', 'PayLocationController@edit')->name('pay_locations.edit');
	Route::post('/setting/pay_locations/update/{id}', 'PayLocationController@update')->name('pay_locations.update');
	Route::post('/setting/pay_locations/destroy/{id}', 'PayLocationController@destroy')->name('pay_locations.destroy');	

	// GL Code Section //
	Route::get('/setting/gl_codes', 'GLCodeController@index')->name('gl_codes.index');
	Route::get('/setting/gl_codes/create', 'GLCodeController@create')->name('gl_codes.create');
	Route::post('/setting/gl_codes/store', 'GLCodeController@store')->name('gl_codes.store');
	Route::get('/setting/gl_codes/edit/{id}', 'GLCodeController@edit')->name('gl_codes.edit');
	Route::post('/setting/gl_codes/update/{id}', 'GLCodeController@update')->name('gl_codes.update');
	Route::post('/setting/gl_codes/destroy/{id}', 'GLCodeController@destroy')->name('gl_codes.destroy');	
	

	//Pay Accumulutaors
	Route::get('/setting/pay_accumulators', 'PayAccumulatorController@index')->name('pay_accumulators.index');
	Route::get('/setting/pay_accumulators/create', 'PayAccumulatorController@create')->name('pay_accumulators.create');
	Route::post('/setting/pay_accumulators/store', 'PayAccumulatorController@store')->name('pay_accumulators.store');
	Route::get('/setting/pay_accumulators/edit/{id}', 'PayAccumulatorController@edit')->name('pay_accumulators.edit');
	Route::post('/setting/pay_accumulators/update/{id}', 'PayAccumulatorController@update')->name('pay_accumulators.update');
	Route::post('/setting/pay_accumulators/destroy/{id}', 'PayAccumulatorController@destroy')->name('pay_accumulators.destroy');	
	
	//Superannuation
	Route::get('/setting/superannuations', 'SuperannuationController@index')->name('superannuations.index');
	Route::get('/setting/superannuations/create', 'SuperannuationController@create')->name('superannuations.create');
	Route::post('/setting/superannuations/store', 'SuperannuationController@store')->name('superannuations.store');
	Route::get('/setting/superannuations/edit/{id}', 'SuperannuationController@edit')->name('superannuations.edit');
	Route::post('/setting/superannuations/update/{id}', 'SuperannuationController@update')->name('superannuations.update');
	Route::post('/setting/superannuations/destroy/{id}', 'SuperannuationController@destroy')->name('superannuations.destroy');	
	

	//Currency

	// Leave Category Section //
	Route::get('/setting/leave_categories', 'LeaveCatController@index');
	Route::get('/setting/leave_categories/create', 'LeaveCatController@create');
	Route::post('/setting/leave_categories/store', 'LeaveCatController@store');
	Route::get('/setting/leave_categories/published/{id}', 'LeaveCatController@published');
	Route::get('/setting/leave_categories/unpublished/{id}', 'LeaveCatController@unpublished');
	Route::get('/setting/leave_categories/details/{id}', 'LeaveCatController@show');
	Route::get('/setting/leave_categories/edit/{id}', 'LeaveCatController@edit');
	Route::post('/setting/leave_categories/update/{id}', 'LeaveCatController@update');
	Route::get('/setting/leave_categories/delete/{id}', 'LeaveCatController@destroy');



    Route::get('/hrm/leave/apply', 'LeaveApplicationController@create')->name('leave.create');
    Route::post('/hrm/leave/apply', 'LeaveApplicationController@store')->name('leave.store');
    Route::get('/hrm/leave', 'LeaveApplicationController@index')->name('leave.index');
	Route::get('/hrm/leave/calculate', 'LeaveApplicationController@calculateLeave')->name('leave.calculate');
	Route::get('/hrm/leave/taken-dates/{id}', 'LeaveApplicationController@getTakenDates')->name('leave.takenDates');
	Route::get('/hrm/leave/{id}/edit', 'LeaveApplicationController@edit')->name('leave.edit');
	Route::put('/hrm/leave/{id}', 'LeaveApplicationController@update')->name('leave.update');


	
	//Application Listes//
	Route::get('/hrm/application_lists', 'LeaveAppController@apllicationLists');
	Route::get('/hrm/leave_application/approved/{id}', 'LeaveAppController@approved');
	Route::get('/hrm/leave_application/not_approved/{id}', 'LeaveAppController@not_approved');
	Route::get('/hrm/application_lists/{id}', 'LeaveAppController@show');

	//Leave Application//
	Route::get('/hrm/leave_application', 'LeaveAppController@index');
	Route::get('/hrm/leave_application/create', 'LeaveAppController@create');
	Route::post('/hrm/leave_application/store', 'LeaveAppController@store');
	Route::get('/hrm/leave_application/{id}', 'LeaveAppController@show');
	Route::get('/hrm/leave-reports', 'LeaveAppController@reports');
	Route::get('/hrm/leave-reports/pdf-reports', 'LeaveAppController@pdf_reports');
	
	

	// Designations Section //
	Route::get('/setting/designations', 'EmpDesignationController@index');
	Route::get('/setting/designations/create', 'EmpDesignationController@create');
	Route::post('/setting/designations/store', 'EmpDesignationController@store');
	Route::get('/setting/designations/published/{id}', 'EmpDesignationController@published');
	Route::get('/setting/designations/unpublished/{id}', 'EmpDesignationController@unpublished');
	Route::get('/setting/designations/details/{id}', 'EmpDesignationController@show');
	Route::get('/setting/designations/edit/{id}', 'EmpDesignationController@edit');
	Route::post('/setting/designations/update/{id}', 'EmpDesignationController@update');
	Route::get('/setting/designations/delete/{id}', 'EmpDesignationController@destroy');

	// Customer Section //
	Route::get('/people/clients', 'CustomerController@index');
	Route::get('/people/clients/print', 'CustomerController@print');
	Route::get('/people/clients/clients-pdf', 'CustomerController@clients_pdf');
	Route::get('/people/clients/create', 'CustomerController@create');
	Route::post('/people/clients/store', 'CustomerController@store');
	Route::get('/people/clients/active/{id}', 'CustomerController@active');
	Route::get('/people/clients/deactive/{id}', 'CustomerController@deactive');
	Route::get('/people/clients/details/{id}', 'CustomerController@show');
	Route::get('/people/clients/download-pdf/{id}', 'CustomerController@pdf');
	Route::get('/people/clients/edit/{id}', 'CustomerController@edit');
	Route::post('/people/clients/update/{id}', 'CustomerController@update');
	Route::get('/people/clients/delete/{id}', 'CustomerController@destroy');
	
	// Customer Types Section //
	Route::get('/setting/client-types', 'CustomerTypeController@index');
	Route::get('/setting/client-types/create', 'CustomerTypeController@create');
	Route::post('/setting/client-types/store', 'CustomerTypeController@store');
	Route::get('/setting/client-types/published/{id}', 'CustomerTypeController@published');
	Route::get('/setting/client-types/unpublished/{id}', 'CustomerTypeController@unpublished');
	Route::get('/setting/client-types/details/{id}', 'CustomerTypeController@show');
	Route::get('/setting/client-types/edit/{id}', 'CustomerTypeController@edit');
	Route::post('/setting/client-types/update/{id}', 'CustomerTypeController@update');
	Route::get('/setting/client-types/delete/{id}', 'CustomerTypeController@destroy');

	// Departments Section //
	Route::get('/setting/departments', 'EmplDepartmentController@index');
	Route::get('/setting/departments/create', 'EmplDepartmentController@create');
	Route::post('/setting/departments/store', 'EmplDepartmentController@store');
	Route::get('/setting/departments/published/{id}', 'EmplDepartmentController@published');
	Route::get('/setting/departments/unpublished/{id}', 'EmplDepartmentController@unpublished');
	Route::get('/setting/departments/details/{id}', 'EmplDepartmentController@show');
	Route::get('/setting/departments/edit/{id}', 'EmplDepartmentController@edit');
	Route::post('/setting/departments/update/{id}', 'EmplDepartmentController@update');
	Route::get('/setting/departments/delete/{id}', 'EmplDepartmentController@destroy');

	// Employee Reference Section //
	Route::get('/people/references', 'EmpReferenceController@index');
	Route::get('/people/references/print', 'EmpReferenceController@print');
	Route::get('/people/references/references-pdf', 'EmpReferenceController@references_pdf');
	Route::get('/people/references/create', 'EmpReferenceController@create');
	Route::post('/people/references/store', 'EmpReferenceController@store');
	Route::get('/people/references/active/{id}', 'EmpReferenceController@active');
	Route::get('/people/references/deactive/{id}', 'EmpReferenceController@deactive');
	Route::get('/people/references/details/{id}', 'EmpReferenceController@show');
	Route::get('/people/references/download-pdf/{id}', 'EmpReferenceController@pdf');
	Route::get('/people/references/edit/{id}', 'EmpReferenceController@edit');
	Route::post('/people/references/update/{id}', 'EmpReferenceController@update');
	Route::get('/people/references/delete/{id}', 'EmpReferenceController@destroy');

	// Employee Section //
	Route::get('/people/employees', 'EmplController@index');
	Route::get('/people/employees/print', 'EmplController@print');
	Route::get('/people/employees/create/{id?}', 'EmplController@create');
	Route::post('/people/employees/store', 'EmplController@store');
	Route::post('/people/employees/payroll_store', 'EmplController@payroll_store');
	Route::post('/people/employees/empl_contact_store', 'EmplController@empl_contact_store');
	Route::get('/people/employees/active/{id}', 'EmplController@active');
	Route::get('/people/employees/deactive/{id}', 'EmplController@deactive');
	Route::get('/people/employees/details/{id}', 'EmplController@show');
	Route::get('/people/employees/download-pdf/{id}', 'EmplController@pdf');
	Route::get('/people/employees/edit/{id}', 'EmplController@edit');
	Route::post('/people/employees/update/{id}', 'EmplController@update');
	Route::get('/people/employees/delete/{id}', 'EmplController@destroy');

	// Folder Section //
	Route::get('/folders', 'FolderController@index');
	Route::get('/folders/create', 'FolderController@create');
	Route::post('/folders/store', 'FolderController@store');

	// File Section //
	Route::get('/files/{id}', 'FileController@index');
	Route::get('/files/create/{id}', 'FileController@create');
	Route::post('/files/store/{id}', 'FileController@store');
	Route::get('/files/download/{file}', 'FileController@download');

	// Profile Section
	Route::get('/profile/user-profile', 'ProfileController@index');
	Route::post('/profile/update-profile', 'ProfileController@update');
	Route::get('/profile/change-password', 'ProfileController@change_password');
	Route::post('/profile/update-password', 'ProfileController@update_password');

	//Custom Invoice
	Route::get('/custom-invoice', 'InvoiceController@index');
	Route::post('/make-invoice', 'InvoiceController@create');

	//SMS Section
	Route::get('/sms', 'SmsController@index');

	//////////////////////////// HRM ////////////////////////////

	//Attendance Section
	Route::get('/hrm/attendance/manage', 'AttendanceController@index');
	Route::post('/hrm/attendance/set', 'AttendanceController@set_attendance');
	Route::post('/hrm/attendance/store', 'AttendanceController@store');
	Route::post('/hrm/attendance/update', 'AttendanceController@update');
	Route::get('/hrm/attendance/report', 'AttendanceController@report');
	Route::post('/hrm/attendance/get-report', 'AttendanceController@get_report');
	Route::post('/hrm/attendance/time/set', 'AttendanceController@timeSet');
	Route::get('/hrm/attendance/details/{id}', 'AttendanceController@attDetails');
	Route::get('/hrm/attendance/details/report/go', 'AttendanceController@attDetailsReportGo');
	Route::get('/hrm/attendance/details/report/all', 'AttendanceController@attDetailsReport');
	Route::get('/hrm/attendance/details/report/pdf', 'AttendanceController@attDetailsReportPdf');


	// Payroll Section
	Route::get('/hrm/payroll', 'PayrollController@index');
	Route::post('/hrm/payroll/go', 'PayrollController@go');
	Route::get('/hrm/payroll/manage-salary/{id}', 'PayrollController@create');
	Route::post('/hrm/payroll/store', 'PayrollController@store');
	Route::get('/hrm/payroll/salary-list', 'PayrollController@list');
	Route::get('/hrm/payroll/details/{id}', 'PayrollController@show');
	Route::post('/hrm/payroll/update/{id}', 'PayrollController@update');
	Route::get('/hrm/payroll/hra/{id}/{id1}/{id2}', 'PayrollController@hra');
	Route::get('/hrm/payroll/vehicle/{id}', 'PayrollController@vehicle');
	Route::get('/hrm/payroll/meals/{desc}', 'PayrollController@meals');
	Route::get('/hrm/payroll/taxcal/{gross_sal}/{depen}/{r_status}', 'PayrollController@taxcal');
	Route::get('/hrm/payroll/hra_area_src/{id}', 'PayrollController@hra_area_src');

	//Increment//
	Route::get('/hrm/payroll/increment/search', 'IncrementController@newIncrementSearch');
	Route::post('/hrm/payroll/increment/store', 'IncrementController@newIncrementStore');
	Route::get('/hrm/payroll/increment/list', 'IncrementController@incrementList');

	//Salary Statement//
	Route::get('/hrm/salary/statement/search', 'IncrementController@salaryStatementSearch');
	Route::get('/hrm/salary/statement/view', 'IncrementController@salaryStatementView');
	Route::get('/hrm/salary/statement/preview', 'IncrementController@salaryStatementPreview');
	Route::get('/hrm/salary/statement/pdf', 'IncrementController@salaryStatementPdf');

	// Bonus Section //
	Route::get('/hrm/bonuses', 'BonusController@index');
	Route::get('/hrm/bonuses/create', 'BonusController@create');
	Route::post('/hrm/bonuses/store', 'BonusController@store');
	Route::get('/hrm/bonuses/details/{id}', 'BonusController@show');
	Route::get('/hrm/bonuses/edit/{id}', 'BonusController@edit');
	Route::post('/hrm/bonuses/update/{id}', 'BonusController@update');
	Route::get('/hrm/bonuses/delete/{id}', 'BonusController@destroy');

	// Deduction Section //
	Route::get('/hrm/deductions', 'DeductionController@index');
	Route::get('/hrm/deductions/create', 'DeductionController@create');
	Route::post('/hrm/deductions/store', 'DeductionController@store');
	Route::get('/hrm/deductions/details/{id}', 'DeductionController@show');
	Route::get('/hrm/deductions/edit/{id}', 'DeductionController@edit');
	Route::post('/hrm/deductions/update/{id}', 'DeductionController@update');
	Route::get('/hrm/deductions/delete/{id}', 'DeductionController@destroy');

	// Loan Section //
	Route::get('/hrm/loans', 'LoanController@index');
	Route::get('/hrm/loans/create', 'LoanController@create');
	Route::post('/hrm/loans/store', 'LoanController@store');
	Route::get('/hrm/loans/details/{id}', 'LoanController@show');
	Route::get('/hrm/loans/edit/{id}', 'LoanController@edit');
	Route::post('/hrm/loans/update/{id}', 'LoanController@update');
	Route::get('/hrm/loans/delete/{id}', 'LoanController@destroy');

	// Payment Section
	Route::get('/hrm/salary-payments', 'SalaryPaymentController@index');
	Route::post('/hrm/salary-payments/go', 'SalaryPaymentController@go');
	Route::get('/hrm/salary-payments/manage-salary/{id}/{salary_month}', 'SalaryPaymentController@create');
	Route::get('/hrm/salary-payments/pdf/{id}/{salary_month}', 'SalaryPaymentController@pdf');
	Route::post('/hrm/salary-payments/store', 'SalaryPaymentController@store');
	// Generate Payslip
	Route::get('/hrm/generate-payslips/', 'SalaryPaymentController@show');
	Route::post('/hrm/generate-payslips/', 'SalaryPaymentController@generate');
	Route::get('/hrm/generate-payslips/salary-list/{salary_month}', 'SalaryPaymentController@list');
	//
	Route::get('/hrm/provident-funds/', 'SalaryPaymentController@provident_fund');

	// Noyon

	//working day
	Route::get('/setting/working-days', 'WorkingDayController@index');
	Route::post('/setting/working-days/update/', 'WorkingDayController@update');

	//Holidays list
	Route::get('/setting/shifts', 'ShiftController@index');
	Route::get('/setting/shifts/create', 'ShiftController@index');
	
	//Holidays list
	Route::get('/setting/holidays', 'HolidayController@index');
	Route::get('/setting/holidays/create', 'HolidayController@create');
	Route::post('/setting/holidays/store', 'HolidayController@store');
	Route::get('/setting/holidays/published/{id}', 'HolidayController@published');
	Route::get('/setting/holidays/unpublished/{id}', 'HolidayController@unpublished');
	Route::get('/setting/holidays/details/{id}', 'HolidayController@show');
	Route::get('/setting/holidays/edit/{id}', 'HolidayController@edit');
	Route::post('/setting/holidays/update/{id}', 'HolidayController@update');
	Route::get('/setting/holidays/delete/{id}', 'HolidayController@destroy');

	// Personal Event Section //
	Route::get('/setting/personal-events', 'PersonalEventController@index');
	Route::get('/setting/personal-events/create', 'PersonalEventController@create');
	Route::post('/setting/personal-events/store', 'PersonalEventController@store');
	Route::get('/setting/personal-events/published/{id}', 'PersonalEventController@published');
	Route::get('/setting/personal-events/unpublished/{id}', 'PersonalEventController@unpublished');
	Route::get('/setting/personal-events/details/{id}', 'PersonalEventController@show');
	Route::get('/setting/personal-events/edit/{id}', 'PersonalEventController@edit');
	Route::post('/setting/personal-events/update/{id}', 'PersonalEventController@update');
	Route::get('/setting/personal-events/delete/{id}', 'PersonalEventController@destroy');

	//notice//
	Route::get('/hrm/notice', 'NoticeController@index');
	Route::get('/hrm/notice/create', 'NoticeController@create');
	Route::post('/hrm/notice/store', 'NoticeController@store');
	Route::get('/hrm/notice/published/{id}', 'NoticeController@published');
	Route::get('/hrm/notice/unpublished/{id}', 'NoticeController@unpublished');
	Route::get('/hrm/notice/delete/{id}', 'NoticeController@destroy');

	Route::get('/hrm/notice/show', 'NoticeController@show');

	

	//expence managements//
	Route::get('/hrm/expence/category/add', 'ExpenceManagementController@expCategoryAdd');
	Route::get('/hrm/expence/category/edit/{id}', 'ExpenceManagementController@expCategoryEdit');
	Route::post('/hrm/expence/category/update', 'ExpenceManagementController@expCatUpdate');

	Route::post('/hrm/expence/category/store', 'ExpenceManagementController@expCatStore');
	Route::get('/hrm/expence/category/list', 'ExpenceManagementController@expCategoryList');
	Route::get('/hrm/expence/manage-expence', 'ExpenceManagementController@index');
	Route::get('/hrm/expence/add-expence', 'ExpenceManagementController@create');
	Route::post('/hrm/expence/store', 'ExpenceManagementController@store');




	//employee award Category//
	Route::get('/setting/award_categories', 'AwardCategoryController@index');
	Route::get('/setting/award_categories/create', 'AwardCategoryController@create');
	Route::post('/setting/award_categories/store', 'AwardCategoryController@store');
	Route::get('/setting/award_categories/published/{id}', 'AwardCategoryController@published');
	Route::get('/setting/award_categories/unpublished/{id}', 'AwardCategoryController@unpublished');
	Route::get('/setting/award_categories/edit/{id}', 'AwardCategoryController@edit');
	Route::post('/setting/award_categories/update/{id}', 'AwardCategoryController@update');
	Route::get('/setting/award_categories/delete/{id}', 'AwardCategoryController@destroy');

	//employee awards//
	Route::get('/hrm/employee-awards', 'EmployeeAwardController@index');
	Route::get('/hrm/employee-awards/create', 'EmployeeAwardController@create');
	Route::post('/hrm/employee-awards/store', 'EmployeeAwardController@store');
	Route::get('/hrm/employee-awards/published/{id}', 'EmployeeAwardController@published');
	Route::get('/hrm/employee-awards/unpublished/{id}', 'EmployeeAwardController@unpublished');
	Route::get('/hrm/employee-awards/edit/{id}', 'EmployeeAwardController@edit');
	Route::post('/hrm/employee-awards/update/{id}', 'EmployeeAwardController@update');
	Route::get('/hrm/employee-awards/details/{id}', 'EmployeeAwardController@show');
	Route::get('/hrm/employee-awards/delete/{id}', 'EmployeeAwardController@destroy');

	//Overtime
	Route::get('/setting/overtime', 'OvertimeController@index');
	Route::get('/setting/overtime/create', 'OvertimeController@create');
	Route::post('/setting/overtime/store', 'OvertimeController@store');
	Route::get('/setting/overtime/edit/{id}', 'OvertimeController@edit');
	Route::post('/setting/overtime/update/{id}', 'OvertimeController@update');
	Route::get('/setting/overtime/published/{id}', 'OvertimeController@published');
	Route::get('/setting/overtime/unpublished/{id}', 'OvertimeController@unpublished');
	Route::get('/setting/overtime/delete/{id}', 'OvertimeController@destroy');

	//Employee Contact
	Route::post('employee_contacts/store/{employee_id?}', 'EmplContactController@store');
	Route::post('employee_contacts/update/{employee_contact_id}', 'EmplContactController@update');

	//Bank Detail
	Route::get('/setting/bank_details', 'BankDetailController@index')->name('setting.bank_details.index');
	Route::get('/setting/bank_details/create', 'BankDetailController@create');
	Route::post('/setting/bank_details/store', 'BankDetailController@store');
	Route::get('/setting/bank_details/edit/{id}', 'BankDetailController@edit');
	Route::post('/setting/bank_details/update/{id}', 'BankDetailController@update');
	Route::get('/setting/bank_details/published/{id}', 'BankDetailController@published');
	Route::get('/setting/bank_details/unpublished/{id}', 'BankDetailController@unpublished');
	Route::get('/setting/bank_details/delete/{id}', 'BankDetailController@destroy');


});