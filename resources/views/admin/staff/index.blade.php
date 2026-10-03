@extends('layouts.admin')

@section('title', 'Manajemen Staff')
@section('breadcrumb', 'Staff & Guru')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-xl font-bold text-white">Staff & Guru</h1>
            <p class="text-slate-400 text-sm mt-0.5">Kelola data tenaga pendidik dan kependidikan</p>
        </div>
        <a href="{{ route('admin.staff.create') }}"
           class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-lg shadow-indigo-600/20 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            <span>Tambah Staff</span>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse($staff as $member)
            <div class="group rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5 hover:border-indigo-500/30 transition-all duration-300 text-center">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                             class="w-full h-full rounded-full object-cover border-2 border-slate-700 group-hover:border-indigo-500/50 transition">
                    @else
                        <div class="w-full h-full rounded-full bg-gradient-to-tr from-indigo-600 to-blue-500 flex items-center justify-center text-white text-2xl font-bold border-2 border-slate-700">
                            {{ strtoupper(substr($member->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <h3 class="font-semibold text-white text-sm">{{ $member->name }}</h3>
                <p class="text-xs text-indigo-400 mt-0.5 font-medium">{{ $member->position }}</p>
                @if($member->subject)
                    <p class="text-xs text-slate-500 mt-0.5">{{ $member->subject }}</p>
                @endif
                <div class="flex items-center justify-center space-x-1.5 mt-4 pt-3 border-t border-slate-800/60">
                    <a href="{{ route('admin.staff.edit', $member) }}"
                       class="px-3 py-1.5 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition font-medium">Edit</a>
                    <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" onsubmit="return confirm('Hapus data staff ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg text-xs text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition font-medium">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center">
                <svg class="w-12 h-12 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <p class="text-slate-500 text-sm">Belum ada data staff</p>
                <a href="{{ route('admin.staff.create') }}" class="mt-2 inline-block text-xs text-indigo-400 hover:text-indigo-300 font-medium">+ Tambah Staff</a>
            </div>
        @endforelse
    </div>

@endsection
