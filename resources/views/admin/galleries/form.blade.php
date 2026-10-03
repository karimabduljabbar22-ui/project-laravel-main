@extends('layouts.admin')

@section('title', isset($gallery) ? 'Edit Foto' : 'Upload Foto')
@section('breadcrumb', isset($gallery) ? 'Edit Foto' : 'Upload Foto')

@section('content')

    <div class="flex items-center space-x-3 mb-8">
        <a href="{{ route('admin.galleries.index') }}" class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <div>
            <h1 class="text-xl font-bold text-white">{{ isset($gallery) ? 'Edit Foto' : 'Upload Foto Baru' }}</h1>
            <p class="text-slate-400 text-sm mt-0.5">{{ isset($gallery) ? 'Perbarui informasi foto' : 'Tambah foto ke galeri sekolah' }}</p>
        </div>
    </div>

    <form action="{{ isset($gallery) ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @if(isset($gallery)) @method('PUT') @endif

        <div class="space-y-5">
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Judul Foto <span class="text-red-400">*</span></label>
                <input type="text" name="title" value="{{ old('title', $gallery->title ?? '') }}"
                       placeholder="Judul atau deskripsi foto..."
                       class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500/50 transition"
                       required>
                @error('title') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>

            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">File Foto {{ isset($gallery) ? '' : '*' }}</label>
                <div id="drop-zone" class="relative border-2 border-dashed border-slate-700 rounded-xl p-8 text-center hover:border-violet-500/50 transition-colors cursor-pointer">
                    <input type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" id="file-input">
                    <svg class="w-10 h-10 text-slate-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    <p class="text-sm text-slate-400">Drag & drop atau <span class="text-violet-400 font-medium">pilih file</span></p>
                    <p class="text-xs text-slate-600 mt-1">PNG, JPG, WEBP maks 5MB</p>
                    <p id="file-name" class="text-xs text-violet-400 mt-2 hidden"></p>
                </div>
                @if(isset($gallery) && $gallery->image)
                    <div class="mt-3 flex items-center space-x-3">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="Current" class="w-16 h-16 rounded-lg object-cover border border-slate-700">
                        <p class="text-xs text-slate-500">Foto saat ini (kosongkan jika tidak ingin mengganti)</p>
                    </div>
                @endif
                @error('image') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>

            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Keterangan</label>
                <textarea name="caption" rows="3" placeholder="Keterangan tambahan foto (opsional)..."
                          class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-violet-500/50 transition resize-none">{{ old('caption', $gallery->caption ?? '') }}</textarea>
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('admin.galleries.index') }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:border-slate-600 text-sm font-medium transition">Batal</a>
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-violet-600 hover:bg-violet-500 text-white font-semibold text-sm shadow-lg shadow-violet-600/20 transition-all">
                    {{ isset($gallery) ? 'Simpan Perubahan' : 'Upload Foto' }}
                </button>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
<script>
    document.getElementById('file-input').addEventListener('change', function() {
        const name = this.files[0]?.name;
        const el = document.getElementById('file-name');
        if (name) { el.textContent = name; el.classList.remove('hidden'); }
    });
</script>
@endpush
