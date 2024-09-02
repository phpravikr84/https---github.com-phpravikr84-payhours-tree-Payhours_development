<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayReference;
use App\Branch;
use App\PayBatchNumber;
use App\Department;
use App\PayLocation;
use App\PayReferenceDepartmentRel;
use App\PayReferencePayLocationRel;

class PayReferenceController extends Controller
{
    /**
     * Display a listing of the pay references.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay_references = PayReference::join('branches', 'pay_references.branch_id', '=', 'branches.id')
            ->leftJoin('pay_batch_numbers', 'pay_references.payroll_number', '=', 'pay_batch_numbers.id')
            ->select('pay_references.*', 'branches.branch_name as branch_name', 'pay_batch_numbers.pay_batch_number_name as payroll_number')
            ->get();

        return view('administrator.hrm.pay_references.index', compact('pay_references'));
    }

    /**
     * Show the form for creating a new pay reference.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $pay_batch_numbers = PayBatchNumber::all();
        $departments = Department::all();
        $pay_locations = PayLocation::all();

        return view('administrator.hrm.pay_references.create', compact('branches', 'pay_batch_numbers', 'departments', 'pay_locations'));
    }

    /**
     * Store a newly created pay reference in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'pay_reference_name' => 'required|string|max:255',
            'pay_period_start_date' => 'required|date',
            'pay_period_end_date' => 'required|date',
            'branch_id' => 'required|exists:branches,id',
            'payroll_number_id' => 'required|exists:pay_batch_numbers,id',
        ]);

        // Create the pay reference
        $pay_reference = PayReference::create([
            'pay_reference_name' => $request->pay_reference_name,
            'pay_period_start_date' => $request->pay_period_start_date,
            'pay_period_end_date' => $request->pay_period_end_date,
            'branch_id' => $request->branch_id,
            'payroll_number' => $request->payroll_number_id,
        ]);

        // Attach departments
        if ($request->has('departments')) {
            foreach ($request->departments as $department_id) {
                PayReferenceDepartmentRel::create([
                    'pay_reference_id' => $pay_reference->id,
                    'pay_reference_department_id' => $department_id,
                ]);
            }
        }

        // Attach pay locations
        if ($request->has('pay_locations')) {
            foreach ($request->pay_locations as $pay_location_id) {
                PayReferencePayLocationRel::create([
                    'pay_reference_id' => $pay_reference->id,
                    'pay_reference_pay_location_id' => $pay_location_id,
                ]);
            }
        }

        return redirect()->route('pay_references.index')->with('success', 'Pay Reference created successfully.');
    }

    /**
     * Display the specified pay reference.
     *
     * @param  \App\Models\PayReference  $payReference
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pay_references = PayReference::join('branches', 'pay_references.branch_id', '=', 'branches.id')
        ->leftJoin('pay_batch_numbers', 'pay_references.payroll_number', '=', 'pay_batch_numbers.id')
        ->where('pay_references.id', $id)
        ->select('pay_references.*', 'branches.branch_name as branch_name', 'pay_batch_numbers.pay_batch_number_name as payroll_number')
        ->get();
        return view('administrator.hrm.pay_references.show', compact('pay_references'));
    }

    /**
     * Show the form for editing the specified pay reference.
     *
     * @param  \App\Models\PayReference  $payReference
     * @return \Illuminate\Http\Response
     */
    public function edit(PayReference $payReference)
    {
        $branches = Branch::all();
        $pay_batch_numbers = PayBatchNumber::all();
        $departments = Department::all();
        $pay_locations = PayLocation::all();

        $selected_departments = $payReference->departments()->pluck('id')->toArray();
        $selected_pay_locations = $payReference->payLocations()->pluck('id')->toArray();

        return view('administrator.hrm.pay_references..edit', compact('payReference', 'branches', 'pay_batch_numbers', 'departments', 'pay_locations', 'selected_departments', 'selected_pay_locations'));
    }

    /**
     * Update the specified pay reference in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayReference  $payReference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayReference $payReference)
    {
        // Validate the request data
        $request->validate([
            'pay_reference_name' => 'required|string|max:255',
            'pay_period_start_date' => 'required|date',
            'pay_period_end_date' => 'required|date',
            'branch_id' => 'required|exists:branches,id',
            'payroll_number_id' => 'required|exists:pay_batch_numbers,id',
        ]);

        // Update the pay reference
        $payReference->update([
            'pay_reference_name' => $request->pay_reference_name,
            'pay_period_start_date' => $request->pay_period_start_date,
            'pay_period_end_date' => $request->pay_period_end_date,
            'branch_id' => $request->branch_id,
            'payroll_number' => $request->payroll_number_id,
        ]);

        // Update departments
        $payReference->departments()->sync($request->departments);

        // Update pay locations
        $payReference->payLocations()->sync($request->pay_locations);

        return redirect()->route('pay_references.index')->with('success', 'Pay Reference updated successfully.');
    }

    /**
     * Remove the specified pay reference from storage.
     *
     * @param  \App\Models\PayReference  $payReference
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayReference $payReference)
    {
        $payReference->departments()->detach();
        $payReference->payLocations()->detach();
        $payReference->delete();

        return redirect()->route('pay_references.index')->with('success', 'Pay Reference deleted successfully.');
    }
}
