<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayLocation;

class PayLocationController extends Controller
{
    public function index()
    {
        $payLocations = PayLocation::all();
        return view('administrator.setting.pay_locations.index', compact('payLocations'));
    }

    public function create()
    {
        return view('administrator.setting.pay_locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'payroll_location_code' => 'required|string|max:255|unique:pay_locations',
            'payroll_location_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        PayLocation::create($request->all());

        return redirect()->route('pay_locations.index')->with('success', 'Pay Location created successfully.');
    }

    public function edit($id)
    {
        $payLocation = PayLocation::findOrFail($id);
        return view('administrator.setting.pay_locations.edit', compact('payLocation'));
    }

    public function update(Request $request, $id)
    {
        $payLocation = PayLocation::findOrFail($id);
        $request->validate([
            'payroll_location_code' => 'required|string|max:255|unique:pay_locations,payroll_location_code,' . $payLocation->id,
            'payroll_location_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $payLocation->update($request->all());

        return redirect()->route('pay_locations.index')->with('success', 'Pay Location updated successfully.');
    }

    public function destroy($id)
    {
        $payLocation = PayLocation::findOrFail($id);
        $payLocation->delete();

        return redirect()->route('pay_locations.index')->with('success', 'Pay Location deleted successfully.');
    }
}
