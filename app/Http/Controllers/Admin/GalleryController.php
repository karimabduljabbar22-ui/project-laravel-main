<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(24);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:5120',
            'caption' => 'nullable|string',
        ]);

        $validated['image'] = $request->file('image')->store('galleries', 'public');

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil diupload!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:5120',
            'caption' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil dihapus!');
    }
}
