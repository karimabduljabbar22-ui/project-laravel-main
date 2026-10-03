@extends('layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white">Selamat Datang, {{ auth()->user()->name ?? 'Administrator' }}! 👋</h1>
        <p class="text-slate-400 text-sm mt-1">Berikut ringkasan aktivitas portal sekolah hari ini.</p>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        <!-- Total Post -->
        <div class="group relative rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5 hover:border-blue-500/30 hover:shadow-lg hover:shadow-blue-500/5 transition-all duration-300 cursor-default">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Berita</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $stats['posts'] ?? 0 }}</p>
                    <p class="mt-1 text-xs text-slate-400">Artikel dipublikasikan</p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-.586-1.414l-4.5-4.5A2 2 0 0014.914 3H14"/></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-800/60">
                <a href="{{ route('admin.posts.index') }}" class="text-xs text-blue-400 hover:text-blue-300 font-medium transition">Kelola Berita →</a>
            </div>
        </div>

        <!-- Staff -->
        <div class="group relative rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5 hover:border-violet-500/30 hover:shadow-lg hover:shadow-violet-500/5 transition-all duration-300 cursor-default">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Staff & Guru</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $stats['staff'] ?? 0 }}</p>
                    <p class="mt-1 text-xs text-slate-400">Tenaga pendidik terdaftar</p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-violet-500/10 border border-violet-500/20 flex items-center justify-center text-violet-400 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-800/60">
                <a href="{{ route('admin.staff.index') }}" class="text-xs text-violet-400 hover:text-violet-300 font-medium transition">Kelola Staff →</a>
            </div>
        </div>

        <!-- PPDB -->
        <div class="group relative rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5 hover:border-emerald-500/30 hover:shadow-lg hover:shadow-emerald-500/5 transition-all duration-300 cursor-default">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pendaftar PPDB</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $stats['ppdb'] ?? 0 }}</p>
                    <p class="mt-1 text-xs text-slate-400">Total pendaftar masuk</p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-800/60">
                <a href="{{ route('admin.ppdb.index') }}" class="text-xs text-emerald-400 hover:text-emerald-300 font-medium transition">Data PPDB →</a>
            </div>
        </div>

        <!-- Pesan Masuk -->
        <div class="group relative rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5 hover:border-amber-500/30 hover:shadow-lg hover:shadow-amber-500/5 transition-all duration-300 cursor-default">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pesan Masuk</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $stats['contacts'] ?? 0 }}</p>
                    <p class="mt-1 text-xs text-slate-400">
                        <span class="text-amber-400 font-semibold">{{ $stats['unread_contacts'] ?? 0 }} belum dibaca</span>
                    </p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-800/60">
                <a href="{{ route('admin.contacts.index') }}" class="text-xs text-amber-400 hover:text-amber-300 font-medium transition">Baca Pesan →</a>
            </div>
        </div>

    </div>

    <!-- Bottom Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Recent Posts -->
        <div class="lg:col-span-2 rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-800/60">
                <h2 class="text-sm font-bold text-white">Berita Terbaru</h2>
                <a href="{{ route('admin.posts.index') }}" class="text-xs text-blue-400 hover:text-blue-300 font-medium transition">Lihat Semua →</a>
            </div>
            <div class="divide-y divide-slate-800/60">
                @forelse($recentPosts ?? [] as $post)
                    <div class="flex items-center space-x-4 px-5 py-3.5 hover:bg-slate-800/30 transition">
                        <div class="w-9 h-9 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">{{ $post->title }}</p>
                            <p class="text-xs text-slate-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="shrink-0 text-xs text-slate-500 hover:text-blue-400 transition">Edit</a>
                    </div>
                @empty
                    <div class="px-5 py-10 text-center">
                        <svg class="w-10 h-10 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <p class="text-sm text-slate-500">Belum ada berita</p>
                        <a href="{{ route('admin.posts.create') }}" class="mt-2 inline-block text-xs text-blue-400 hover:text-blue-300 font-medium">+ Buat Artikel Pertama</a>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Access + Recent Contacts -->
        <div class="space-y-5">

            <!-- Quick Access -->
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-800/60">
                    <h2 class="text-sm font-bold text-white">Akses Cepat</h2>
                </div>
                <div class="p-4 grid grid-cols-2 gap-2.5">
                    <a href="{{ route('admin.posts.create') }}" class="flex flex-col items-center space-y-2 p-3 rounded-xl bg-slate-800/50 hover:bg-blue-500/10 hover:border-blue-500/20 border border-transparent transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-blue-500/15 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <span class="text-[11px] text-slate-400 group-hover:text-blue-400 font-medium text-center transition">Buat Artikel</span>
                    </a>
                    <a href="{{ route('admin.galleries.create') }}" class="flex flex-col items-center space-y-2 p-3 rounded-xl bg-slate-800/50 hover:bg-violet-500/10 hover:border-violet-500/20 border border-transparent transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-violet-500/15 flex items-center justify-center text-violet-400 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <span class="text-[11px] text-slate-400 group-hover:text-violet-400 font-medium text-center transition">Upload Foto</span>
                    </a>
                    <a href="{{ route('admin.staff.create') }}" class="flex flex-col items-center space-y-2 p-3 rounded-xl bg-slate-800/50 hover:bg-emerald-500/10 hover:border-emerald-500/20 border border-transparent transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/15 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        </div>
                        <span class="text-[11px] text-slate-400 group-hover:text-emerald-400 font-medium text-center transition">Tambah Staff</span>
                    </a>
                    <a href="{{ route('admin.contacts.index') }}" class="flex flex-col items-center space-y-2 p-3 rounded-xl bg-slate-800/50 hover:bg-amber-500/10 hover:border-amber-500/20 border border-transparent transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/15 flex items-center justify-center text-amber-400 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <span class="text-[11px] text-slate-400 group-hover:text-amber-400 font-medium text-center transition">Pesan Masuk</span>
                    </a>
                </div>
            </div>

            <!-- More Stats -->
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-800/60">
                    <h2 class="text-sm font-bold text-white">Statistik Lainnya</h2>
                </div>
                <div class="divide-y divide-slate-800/60">
                    <div class="flex items-center justify-between px-5 py-3">
                        <span class="text-xs text-slate-400">Fasilitas</span>
                        <span class="text-sm font-bold text-white">{{ $stats['facilities'] ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between px-5 py-3">
                        <span class="text-xs text-slate-400">Galeri Foto</span>
                        <span class="text-sm font-bold text-white">{{ $stats['galleries'] ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between px-5 py-3">
                        <span class="text-xs text-slate-400">Ekstrakurikuler</span>
                        <span class="text-sm font-bold text-white">{{ $stats['extracurriculars'] ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between px-5 py-3">
                        <span class="text-xs text-slate-400">Pengguna Admin</span>
                        <span class="text-sm font-bold text-white">{{ $stats['users'] ?? 0 }}</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
