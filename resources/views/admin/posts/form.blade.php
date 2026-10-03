@extends('layouts.admin')

@section('title', isset($post) ? 'Edit Artikel' : 'Tambah Artikel')
@section('breadcrumb', isset($post) ? 'Edit Artikel' : 'Tambah Artikel')

@section('content')

    <div class="flex items-center space-x-3 mb-8">
        <a href="{{ route('admin.posts.index') }}" class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <div>
            <h1 class="text-xl font-bold text-white">{{ isset($post) ? 'Edit Artikel' : 'Tambah Artikel Baru' }}</h1>
            <p class="text-slate-400 text-sm mt-0.5">{{ isset($post) ? 'Perbarui konten artikel' : 'Buat artikel berita baru' }}</p>
        </div>
    </div>

    <form action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
        @csrf
        @if(isset($post)) @method('PUT') @endif

        <div class="space-y-5">

            <!-- Judul -->
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Judul Artikel <span class="text-red-400">*</span></label>
                <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
                       placeholder="Masukkan judul artikel..."
                       class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition"
                       required>
                @error('title') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>

            <!-- Konten -->
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Konten <span class="text-red-400">*</span></label>
                <textarea name="content" rows="12"
                          placeholder="Tulis isi artikel di sini..."
                          class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition resize-none">{{ old('content', $post->content ?? '') }}</textarea>
                @error('content') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>

            <!-- Gambar & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Gambar Thumbnail</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full text-sm text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600/20 file:text-blue-400 file:font-semibold file:cursor-pointer hover:file:bg-blue-600/30 transition">
                    @error('image') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Status Publikasi</label>
                    <select name="is_published"
                            class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition">
                        <option value="1" {{ old('is_published', $post->is_published ?? 1) == 1 ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published', $post->is_published ?? 1) == 0 ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('admin.posts.index') }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:border-slate-600 text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm shadow-lg shadow-blue-600/20 transition-all">
                    {{ isset($post) ? 'Simpan Perubahan' : 'Publikasikan Artikel' }}
                </button>
            </div>

        </div>
    </form>

@endsection
