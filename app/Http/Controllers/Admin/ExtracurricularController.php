<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::latest()->get();

        return view('admin.extracurriculars.index', compact('extracurriculars'));
    }

    public function create()
    {
        return view('admin.extracurriculars.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'schedule' => 'nullable|string|max:255',
            'coach' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('extracurriculars', 'public');
        }

        Extracurricular::create($validated);

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    public function edit(Extracurricular $extracurricular)
    {
        return view('admin.extracurriculars.form', compact('extracurricular'));
    }

    public function update(Request $request, Extracurricular $extracurricular)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'schedule' => 'nullable|string|max:255',
            'coach' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('extracurriculars', 'public');
        }

        $extracurricular->update($validated);

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        $extracurricular->delete();

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}
