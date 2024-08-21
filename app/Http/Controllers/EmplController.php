<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Role;
use App\User;
use App\Payroll;
use App\HraRate;
use App\HraAreaPlace;
use App\Department;
use DB;
use Illuminate\Http\Request;
use PDF;
use App\WorkingDay;

class EmplController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->whereBetween('users.access_label', [2, 3])
			->where('users.deletion_status', 0)
			->select('employee_id', 'users.id', 'users.name', 'users.contact_no_one', 'users.created_at', 'users.activation_status', 'designations.designation')
			->orderBy('users.employee_id', 'ASC')
			->get()
			->toArray();
		return view('administrator.people.employee.manage_employees', compact('employees'));
	}

	public function print() {
		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->whereBetween('users.access_label', [2, 3])
			->where('users.deletion_status', 0)
			->select('users.id', 'users.employee_id', 'users.name', 'users.email', 'users.present_address', 'users.contact_no_one', 'designations.designation')
			->orderBy('users.id', 'DESC')
			->get()
			->toArray();
		return view('administrator.people.employee.employees_print', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($id=null) {

		if ($id) {
			// Code to handle the case when ID is passed
					
				$designations = Designation::where('deletion_status', 0)
				->where('publication_status', 1)
				->orderBy('designation', 'ASC')
				->select('id', 'designation')
				->get()
				->toArray();
				$roles = Role::all();

				$loca_places = HraAreaPlace::query()
				->orderBy('loca_name', 'ASC')
				->orderBy('places', 'ASC')
				->get(['id', 'loca_name', 'places'])
				->toArray();

				$employees = User::query()
					->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
					->orderBy('users.name', 'ASC')
					->where('users.access_label', '>=', 2)
					->where('users.access_label', '<=', 3)
					->get(['designations.designation', 'users.name', 'users.id'])
					->toArray();
				$employee_id = $id;
					$sumOfWorkingHours = WorkingDay::sum('working_hours');
					return view('administrator.people.employee.add_employee', compact('designations', 'roles', 'loca_places', 'employees', 'sumOfWorkingHours', 'employee_id')); 
		} else {
			// Code to handle the case when ID is not passed
			$designations = Designation::where('deletion_status', 0)
				->where('publication_status', 1)
				->orderBy('designation', 'ASC')
				->select('id', 'designation')
				->get()
				->toArray();
			$roles = Role::all();

			$loca_places = HraAreaPlace::query()
				->orderBy('loca_name', 'ASC')
				->orderBy('places', 'ASC')
				->get(['id', 'loca_name', 'places'])
				->toArray();

				$employees = User::query()
					->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
					->orderBy('users.name', 'ASC')
					->where('users.access_label', '>=', 2)
					->where('users.access_label', '<=', 3)
					->get(['designations.designation', 'users.name', 'users.id'])
					->toArray();

				$sumOfWorkingHours = WorkingDay::sum('working_hours');


			return view('administrator.people.employee.add_employee', compact('designations', 'roles', 'loca_places', 'employees', 'sumOfWorkingHours')); 
		}
	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//return $request;
		$url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

		$employee = request()->validate([
			'employee_id' => 'required|max:250',
			'name' => 'required|max:100',
			'father_name' => 'nullable|max:100',
			'mother_name' => 'nullable|max:100',
			'spouse_name' => 'nullable|max:100',
			'email' => 'required|email|unique:users|max:100',
			'contact_no_one' => 'required|max:20',
			'emergency_contact' => 'nullable|max:20',
			'web' => 'nullable|max:150|regex:' . $url,
			'gender' => 'required',
			'date_of_birth' => 'nullable|date',
			'present_address' => 'required|max:250',
			'permanent_address' => 'nullable|max:250',
			'home_district' => 'nullable|max:250',
			'academic_qualification' => 'nullable',
			'professional_qualification' => 'nullable',
			'experience' => 'nullable',
			'reference' => 'nullable',
			'joining_date' => 'nullable',
			'designation_id' => 'required|numeric',
			'joining_position' => 'required|numeric',
			'marital_status' => 'nullable',
			'id_name' => 'nullable',
			'id_number' => 'nullable|max:100',
			'role' => 'required',
			'employee_type' => 'required',
			'resident_status' => 'required',
			'no_of_dependent' => 'nullable|numeric',
		], [
			'designation_id.required' => 'The designation field is required.',
			'contact_no_one.required' => 'The contact no field is required.',
			'web.regex' => 'The URL format is invalid.',
			'name.regex' => 'No number is allowed.',
			'access_label' => 'The position field is required.',
		]);

		$result = User::create($employee + ['created_by' => auth()->user()->id, 'access_label' => 2, 'password' => bcrypt(12345678)]);
		$inserted_id = $result->id;

		$result->attachRole(Role::where('name', $request->role)->first());

		if (!empty($inserted_id)) {

			$salary = Payroll::where('user_id', $inserted_id)
				->first();
			// Set session variable to indicate which form was submitted
			  // Set session variables
			  session()->flash('submitted_form', 'add_employee_form');
			return redirect('/people/employees/create/'.$inserted_id)->with('message', 'Add successfully.');
		}
		return redirect('/people/employees/create')->with('exception', 'Operation failed !');
	}

	/**
	 * Store a newly created resource in Payroll storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function payroll_store(Request $request) {
		$salary = request()->validate([
			'employee_type' => 'required',
			'basic_salary' => 'required|numeric',
			'house_rent_allowance' => 'nullable|numeric',
			'medical_allowance' => 'nullable|numeric',
			'special_allowance' => 'nullable|numeric',
			'provident_fund_contribution' => 'nullable|numeric',
			'other_allowance' => 'nullable|numeric',
			'provident_fund_deduction' => 'nullable|numeric',
			'other_deduction' => 'nullable|numeric',
			'resident_status' => 'required',
			'no_of_dependent' => 'nullable|numeric',
			'hrly_salary_rate' => 'nullable',
			'overtime_hr' => 'nullable|numeric',
			'overtime_rate' => 'nullable|numeric',
			'overtime_amt'  => 'nullable|numeric',
			'sales_comm'  => 'nullable|numeric',
			'electricity_allowance'  => 'nullable|numeric',
			'security_allowance'  => 'nullable|numeric',
			'tax_deduction_a'  => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
			'tax_deduction_b'  => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
			'hr_place' => 'required',
			'hra_type' => 'required',
			'hra_amount_per_week'  => 'nullable|numeric',
			'va_type' => 'required',
			'vehicle_allowance' => 'nullable|numeric',
			'meals_tag'  => 'nullable',
			'meals_allowance' => 'nullable|numeric',
			'annual_salary' => 'required',
		]);

		$result = Payroll::create($salary + ['created_by' => auth()->user()->id, 'user_id' => $request->user_id]);
		$inserted_id = $result->id;

		if (!empty($inserted_id)) {

			$salary = Payroll::where('user_id', $inserted_id)
				->first();
			
			//payroll_id associated with user
			User::where('id', $request->user_id)->update(['user_payroll_rel_id' => $inserted_id]);
			// Set session variable to indicate which form was submitted
			  // Set session variables
			  session()->flash('submitted_form', 'add_payroll_form');
			return redirect('/people/employees/create/'.$request->user_id)->with('message', 'Add successfully.');
		}
		
		return redirect('/people/employees/create')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Payroll  $payroll
	 * @return \Illuminate\Http\Response
	 */
	public function payroll_update(Request $request, $id) {
		$salary = Payroll::find($id);
		request()->validate([
			'employee_type' => 'required',
			'basic_salary' => 'required|numeric',
			'house_rent_allowance' => 'nullable|numeric',
			'medical_allowance' => 'nullable|numeric',
			'special_allowance' => 'nullable|numeric',
			'provident_fund_contribution' => 'nullable|numeric',
			'other_allowance' => 'nullable|numeric',
			'provident_fund_deduction' => 'nullable|numeric',
			'other_deduction' => 'nullable|numeric',
			'resident_status' => 'required',
			'no_of_dependent' => 'nullable|numeric',
			'hrly_salary_rate' => 'nullable|numeric',
			'overtime_hr' => 'nullable|numeric',
			'overtime_rate' => 'nullable|numeric',
			'overtime_amt'  => 'nullable|numeric',
			'sales_comm'  => 'nullable|numeric',
			'electricity_allowance'  => 'nullable|numeric',
			'security_allowance'  => 'nullable|numeric',
			'tax_deduction_a'  => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
			'tax_deduction_b'  => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
			'hr_place' => 'required',
			'hra_type' => 'required',
			'hra_amount_per_week'  => 'nullable|numeric',
			'va_type' => 'required',
			'vehicle_allowance' => 'nullable|numeric',
			'meals_tag'  => 'nullable',
			'meals_allowance' => 'nullable|numeric',
			'annual_salary' => 'required',
		]);

		$salary->employee_type = $request->get('employee_type');
		$salary->basic_salary = $request->get('basic_salary');
		$salary->house_rent_allowance = $request->get('house_rent_allowance');
		$salary->medical_allowance = $request->get('medical_allowance');
		$salary->special_allowance = $request->get('special_allowance'); // Telephone allowance
		$salary->provident_fund_contribution = $request->get('provident_fund_contribution');
		$salary->other_allowance = $request->get('other_allowance'); //	Servant Allowance
		$salary->provident_fund_deduction = $request->get('provident_fund_deduction');
		$salary->other_deduction = $request->get('other_deduction');
		$salary->resident_status = $request->get('resident_status');
		$salary->no_of_dependent = $request->get('no_of_dependent');
		$salary->declaration_lodge_status = $request->get('declaration_lodge_status');
		$salary->hrly_salary_rate = $request->get('hrly_salary_rate');
		$salary->overtime_hr = $request->get('overtime_hr');
		$salary->overtime_rate = $request->get('ovretime_rate');
		$salary->overtime_amt = $request->get('overtime_amt');
		$salary->sales_comm = $request->get('sales_comm');
		$salary->electricity_allowance = $request->get('electricity_allowance');
		$salary->security_allowance = $request->get('security_allowance');
		$salary->tax_deduction_a = $request->get('tax_deduction_a');
		$salary->tax_deduction_b = $request->get('tax_deduction_b');
		$salary->hr_place = $request->get('hr_place');
		$salary->hr_area = $request->get('hr_area');
		$salary->hra_type = $request->get('hra_type');
		$salary->hra_amount_per_week = $request->get('hra_amount_per_week');
		$salary->va_type = $request->get('va_type');
		$salary->vehicle_allowance = $request->get('vehicle_allowance');
		$salary->meals_tag = $request->get('meals_tag');
		$salary->meals_allowance = $request->get('meals_allowance');
		$salary->annual_salary =  $request->get('annual_salary');
		$affected_row = $salary->save();

		if (!empty($affected_row)) {
			return redirect('/hrm/payroll/salary-list')->with('message', 'Update successfully.');
		}
		return redirect('/hrm/payroll/salary-list')->with('exception', 'Operation failed !');

		$result = Payroll::create($salary + ['created_by' => auth()->user()->id, 'user_id' => $request->user_id]);
		$inserted_id = $result->id;

		if (!empty($inserted_id)) {
			return redirect('/hrm/payroll/salary-list')->with('message', 'Add successfully.');
		}
		return redirect('/hrm/payroll/salary-list')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function active($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/people/employees')->with('message', 'Activate successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deactive($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 0]);

		if (!empty($affected_row)) {
			return redirect('/people/employees')->with('message', 'Deactive successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//$employee_type = User::find($id)->toArray();
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();
		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();
		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();
		$departments = Department::where('deletion_status', 0)
			->select('id', 'department')
			->get();	
		return view('administrator.people.employee.show_employee', compact('employee', 'created_by', 'designations', 'departments'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function pdf($id) {
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();

		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();

		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();

		$pdf = PDF::loadView('administrator.people.employee.pdf', compact('employee', 'created_by', 'designations'));
		$file_name = 'EMP-' . $employee->id . '.pdf';
		return $pdf->download($file_name);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$employee = User::find($id)->toArray();
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();
		$roles = Role::all();
		return view('administrator.people.employee.edit_employee', compact('employee', 'roles', 'designations'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$employee = User::find($id);

		$url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

		request()->validate([
			'employee_id' => 'required|max:250',
			'name' => 'required|max:100',
			'father_name' => 'nullable|max:100',
			'mother_name' => 'nullable|max:100',
			'spouse_name' => 'nullable|max:100',
			'email' => 'required|email|max:100',
			'contact_no_one' => 'required|max:20',
			'emergency_contact' => 'nullable|max:20',
			'web' => 'nullable|max:150|regex:' . $url,
			'gender' => 'required',
			'date_of_birth' => 'nullable|date',
			'present_address' => 'required|max:250',
			'permanent_address' => 'nullable|max:250',
			'home_district' => 'nullable|max:250',
			'academic_qualification' => 'nullable',
			'professional_qualification' => 'nullable',
			'experience' => 'nullable',
			'reference' => 'nullable',
			'joining_date' => 'nullable',
			'designation_id' => 'required|numeric',
			'joining_position' => 'required|numeric',
			'marital_status' => 'nullable',
			'id_name' => 'nullable',
			'id_number' => 'nullable|max:100',
			'role' => 'required',
		], [
			'designation_id.required' => 'The designation field is required.',
			'contact_no_one.required' => 'The contact no field is required.',
			'web.regex' => 'The URL format is invalid.',
			'name.regex' => 'No number is allowed.',
			'access_label' => 'The position field is required.',
		]);

		$employee->employee_id = $request->get('employee_id');
		$employee->name = $request->get('name');
		$employee->father_name = $request->get('father_name');
		$employee->mother_name = $request->get('mother_name');
		$employee->spouse_name = $request->get('spouse_name');
		$employee->email = $request->get('email');
		$employee->contact_no_one = $request->get('contact_no_one');
		$employee->emergency_contact = $request->get('emergency_contact');
		$employee->web = $request->get('web');
		$employee->gender = $request->get('gender');
		$employee->date_of_birth = $request->get('date_of_birth');
		$employee->present_address = $request->get('present_address');
		$employee->permanent_address = $request->get('permanent_address');
		$employee->home_district = $request->get('home_district');
		$employee->academic_qualification = $request->get('academic_qualification');
		$employee->professional_qualification = $request->get('professional_qualification');
		$employee->experience = $request->get('experience');
		$employee->reference = $request->get('reference');
		$employee->joining_date = $request->get('joining_date');
		$employee->designation_id = $request->get('designation_id');
		$employee->joining_position = $request->get('joining_position');
		$employee->access_label = 2;
		$employee->marital_status = $request->get('marital_status');
		$employee->id_name = $request->get('id_name');
		$employee->id_number = $request->get('id_number');
		$employee->role = $request->get('role');
		$affected_row = $employee->save();

		DB::table('role_user')
			->where('user_id', $id)
			->update(['role_id' => $request->input('role')]);

		if (!empty($affected_row)) {
			return redirect('/people/employees')->with('message', 'Update successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$affected_row = User::where('id', $id)
			->update(['deletion_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/people/employees')->with('message', 'Delete successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

}
