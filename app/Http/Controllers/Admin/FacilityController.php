<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::latest()->get();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }

        Facility::create($validated);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.form', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($validated);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}
