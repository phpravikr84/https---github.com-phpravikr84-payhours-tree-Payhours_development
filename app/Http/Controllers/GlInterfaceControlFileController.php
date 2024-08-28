<?php

namespace App\Http\Controllers;

use App\GlInterfaceControlFile;
use Illuminate\Http\Request;

class GlInterfaceControlFileController extends Controller
{
    public function index()
    {
        $controlFiles = GlInterfaceControlFile::all();
        return view('administrator.setting.gl_interface_control_files.index', compact('controlFiles'));
    }

    public function create()
    {
        return view('administrator.setting.gl_interface_control_files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'control_setup_name' => 'nullable|string',
            'gl_code_account_name' => 'nullable|string',
        ]);

        GlInterfaceControlFile::create($request->all());

        return redirect()->route('gl_interface_control_files.index')->with('success', 'Control file created successfully.');
    }

    public function edit($id)
    {
        $controlFile = GlInterfaceControlFile::findOrFail($id);
        return view('administrator.setting.gl_interface_control_files.edit', compact('controlFile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'control_setup_name' => 'nullable|string',
            'gl_code_account_name' => 'nullable|string',
        ]);

        $controlFile = GlInterfaceControlFile::findOrFail($id);
        $controlFile->update($request->all());

        return redirect()->route('gl_interface_control_files.index')->with('success', 'Control file updated successfully.');
    }

    public function destroy($id)
    {
        $controlFile = GlInterfaceControlFile::findOrFail($id);
        $controlFile->delete();

        return redirect()->route('gl_interface_control_files.index')->with('success', 'Control file deleted successfully.');
    }
}
