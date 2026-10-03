<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::latest()->get();

        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'photo' => 'nullable|image|max:3072',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('staff', 'public');
        }

        Staff::create($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Data staff berhasil ditambahkan!');
    }

    public function edit(Staff $staff)
    {
        $member = $staff;

        return view('admin.staff.form', compact('member'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'photo' => 'nullable|image|max:3072',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('staff', 'public');
        }

        $staff->update($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Data staff berhasil diperbarui!');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Data staff berhasil dihapus!');
    }
}
