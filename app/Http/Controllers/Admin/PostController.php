<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published', true);

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published', true);

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
