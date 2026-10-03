@extends('layouts.admin')

@section('title', 'Manajemen Berita')
@section('breadcrumb', 'Berita & Artikel')

@section('content')

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-xl font-bold text-white">Berita & Artikel</h1>
            <p class="text-slate-400 text-sm mt-0.5">Kelola semua konten berita dan artikel sekolah</p>
        </div>
        <a href="{{ route('admin.posts.create') }}"
           class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm shadow-lg shadow-blue-600/20 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Artikel</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-800/70">
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">#</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Judul</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-5 py-3.5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($posts as $post)
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="px-5 py-3.5 text-xs text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3.5">
                                <p class="text-sm font-medium text-white">{{ $post->title }}</p>
                                <p class="text-xs text-slate-500 mt-0.5 truncate max-w-xs">{{ Str::limit(strip_tags($post->content ?? ''), 60) }}</p>
                            </td>
                            <td class="px-5 py-3.5">
                                @if($post->is_published ?? true)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 border border-emerald-500/20 text-emerald-400">Published</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-500/10 border border-amber-500/20 text-amber-400">Draft</span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-xs text-slate-400">{{ $post->created_at->format('d M Y') }}</td>
                            <td class="px-5 py-3.5">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                       class="p-1.5 rounded-lg text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                          onsubmit="return confirm('Hapus artikel ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center">
                                <svg class="w-10 h-10 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <p class="text-slate-500 text-sm">Belum ada artikel</p>
                                <a href="{{ route('admin.posts.create') }}" class="mt-2 inline-block text-xs text-blue-400 hover:text-blue-300 font-medium">+ Buat Artikel Pertama</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(isset($posts) && method_exists($posts, 'links'))
            <div class="px-5 py-4 border-t border-slate-800/60">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

@endsection
