@extends('layouts.admin')

@section('title', isset($facility) ? 'Edit Fasilitas' : 'Tambah Fasilitas')
@section('breadcrumb', isset($facility) ? 'Edit Fasilitas' : 'Tambah Fasilitas')

@section('content')

    <div class="flex items-center space-x-3 mb-8">
        <a href="{{ route('admin.facilities.index') }}" class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <div>
            <h1 class="text-xl font-bold text-white">{{ isset($facility) ? 'Edit Fasilitas' : 'Tambah Fasilitas Baru' }}</h1>
        </div>
    </div>

    <form action="{{ isset($facility) ? route('admin.facilities.update', $facility) : route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @if(isset($facility)) @method('PUT') @endif

        <div class="space-y-5">
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nama Fasilitas <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $facility->name ?? '') }}"
                       placeholder="Nama fasilitas..."
                       class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition"
                       required>
            </div>

            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Deskripsi</label>
                <textarea name="description" rows="4" placeholder="Deskripsi fasilitas..."
                          class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition resize-none">{{ old('description', $facility->description ?? '') }}</textarea>
            </div>

            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Foto Fasilitas</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full text-sm text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-emerald-600/20 file:text-emerald-400 file:font-semibold file:cursor-pointer hover:file:bg-emerald-600/30 transition">
                @if(isset($facility) && $facility->image)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $facility->image) }}" alt="Current" class="w-24 h-16 rounded-lg object-cover border border-slate-700">
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('admin.facilities.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:border-slate-600 text-sm font-medium transition">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm shadow-lg shadow-emerald-600/20 transition-all">
                    {{ isset($facility) ? 'Simpan' : 'Tambah Fasilitas' }}
                </button>
            </div>
        </div>
    </form>

@endsection
