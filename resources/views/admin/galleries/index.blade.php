@extends('layouts.admin')

@section('title', 'Manajemen Galeri')
@section('breadcrumb', 'Galeri & Album')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-xl font-bold text-white">Galeri & Album</h1>
            <p class="text-slate-400 text-sm mt-0.5">Kelola foto dan dokumentasi kegiatan sekolah</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}"
           class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-violet-600 hover:bg-violet-500 text-white font-semibold text-sm shadow-lg shadow-violet-600/20 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Upload Foto</span>
        </a>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @forelse($galleries as $gallery)
            <div class="group relative rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden hover:border-violet-500/30 transition-all duration-300">
                <div class="relative aspect-video bg-slate-800 overflow-hidden">
                    @if($gallery->image)
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-600">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    <!-- Overlay Actions -->
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-2">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}"
                           class="p-2 rounded-lg bg-white/10 text-white hover:bg-blue-500/80 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST"
                              onsubmit="return confirm('Hapus foto ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg bg-white/10 text-white hover:bg-red-500/80 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm font-medium text-white truncate">{{ $gallery->title }}</p>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $gallery->created_at->format('d M Y') }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center">
                <svg class="w-12 h-12 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-slate-500 text-sm">Belum ada foto di galeri</p>
                <a href="{{ route('admin.galleries.create') }}" class="mt-2 inline-block text-xs text-violet-400 hover:text-violet-300 font-medium">+ Upload Foto Pertama</a>
            </div>
        @endforelse
    </div>

@endsection
