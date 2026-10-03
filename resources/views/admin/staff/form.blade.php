@extends('layouts.admin')

@section('title', isset($member) ? 'Edit Staff' : 'Tambah Staff')
@section('breadcrumb', isset($member) ? 'Edit Staff' : 'Tambah Staff')

@section('content')

    <div class="flex items-center space-x-3 mb-8">
        <a href="{{ route('admin.staff.index') }}" class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="text-xl font-bold text-white">{{ isset($member) ? 'Edit Data Staff' : 'Tambah Staff Baru' }}</h1>
    </div>

    <form action="{{ isset($member) ? route('admin.staff.update', $member) : route('admin.staff.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @if(isset($member)) @method('PUT') @endif

        <div class="space-y-5">
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5 grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nama Lengkap <span class="text-red-400">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}"
                           placeholder="Nama lengkap..." required
                           class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Jabatan / Posisi</label>
                    <input type="text" name="position" value="{{ old('position', $member->position ?? '') }}"
                           placeholder="Jabatan..."
                           class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Mata Pelajaran</label>
                    <input type="text" name="subject" value="{{ old('subject', $member->subject ?? '') }}"
                           placeholder="Mata pelajaran yang diajar..."
                           class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}"
                           placeholder="Email..."
                           class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                </div>
            </div>

            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Foto</label>
                <input type="file" name="photo" accept="image/*"
                       class="w-full text-sm text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-600/20 file:text-indigo-400 file:font-semibold file:cursor-pointer hover:file:bg-indigo-600/30 transition">
                @if(isset($member) && $member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}" alt="Current" class="mt-3 w-16 h-16 rounded-full object-cover border border-slate-700">
                @endif
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('admin.staff.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:border-slate-600 text-sm font-medium transition">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-lg shadow-indigo-600/20 transition-all">
                    {{ isset($member) ? 'Simpan' : 'Tambah Staff' }}
                </button>
            </div>
        </div>
    </form>

@endsection
