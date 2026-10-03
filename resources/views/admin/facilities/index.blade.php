@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas')
@section('breadcrumb', 'Fasilitas')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-xl font-bold text-white">Fasilitas Sekolah</h1>
            <p class="text-slate-400 text-sm mt-0.5">Kelola data fasilitas dan sarana prasarana</p>
        </div>
        <a href="{{ route('admin.facilities.create') }}"
           class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm shadow-lg shadow-emerald-600/20 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Fasilitas</span>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($facilities as $facility)
            <div class="group rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden hover:border-emerald-500/30 transition-all duration-300">
                @if($facility->image)
                    <div class="aspect-video overflow-hidden bg-slate-800">
                        <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                @else
                    <div class="aspect-video bg-slate-800 flex items-center justify-center">
                        <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="font-semibold text-white text-sm">{{ $facility->name }}</h3>
                    @if($facility->description)
                        <p class="text-xs text-slate-400 mt-1 line-clamp-2">{{ $facility->description }}</p>
                    @endif
                    <div class="flex items-center justify-end space-x-1.5 mt-3 pt-3 border-t border-slate-800/60">
                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="px-3 py-1.5 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition font-medium">Edit</a>
                        <form action="{{ route('admin.facilities.destroy', $facility) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 rounded-lg text-xs text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition font-medium">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center">
                <svg class="w-12 h-12 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                <p class="text-slate-500 text-sm">Belum ada data fasilitas</p>
                <a href="{{ route('admin.facilities.create') }}" class="mt-2 inline-block text-xs text-emerald-400 hover:text-emerald-300 font-medium">+ Tambah Fasilitas</a>
            </div>
        @endforelse
    </div>

@endsection
