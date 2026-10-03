<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#030712">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Admin Panel</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#0b1938',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Google Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #3b82f6; }

        /* Sidebar scrollbar */
        #admin-sidebar::-webkit-scrollbar { width: 4px; }
        #admin-sidebar::-webkit-scrollbar-track { background: transparent; }
        #admin-sidebar::-webkit-scrollbar-thumb { background: #334155; border-radius: 9999px; }

        /* Glassmorphism */
        .glass {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }
        .glass-sidebar {
            background: rgba(8, 15, 30, 0.97);
        }

        /* Sidebar nav */
        .nav-item-active {
            background: linear-gradient(135deg, rgba(37,99,235,0.22) 0%, rgba(99,102,241,0.12) 100%);
            border-left: 3px solid #3b82f6 !important;
            color: #60a5fa !important;
        }
        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 3px solid transparent;
        }
        .nav-item:hover {
            background: rgba(37,99,235,0.1);
            border-left-color: rgba(59,130,246,0.35);
            color: #93c5fd;
        }

        /* Sidebar transition */
        #admin-sidebar {
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1), transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #main-content {
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Mobile overlay */
        #sidebar-overlay {
            transition: opacity 0.3s ease;
        }

        /* Sub-menu accordion */
        .submenu-content {
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            max-height: 0;
        }
        .submenu-content.open { max-height: 300px; }
        .submenu-chevron { transition: transform 0.3s ease; }
        .submenu-chevron.open { transform: rotate(90deg); }

        /* Notification pulse */
        .notif-pulse { animation: npulse 2s ease-in-out infinite; }
        @keyframes npulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.2); }
        }

        /* Dropdown animation */
        .dropdown-anim {
            transform-origin: top right;
            transition: opacity 0.15s ease, transform 0.15s ease;
        }
        .dropdown-anim.hidden {
            opacity: 0 !important;
            transform: scale(0.95) translateY(-4px);
            pointer-events: none;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-[#060d1f] text-slate-100 font-sans antialiased min-h-screen">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/60 backdrop-blur-sm lg:hidden hidden opacity-0"></div>

    <!-- ===== SIDEBAR ===== -->
    <aside id="admin-sidebar"
           class="glass-sidebar fixed top-0 left-0 h-full z-40 border-r border-slate-800/60 flex flex-col overflow-hidden w-64 -translate-x-full lg:translate-x-0">

        <!-- Brand Logo -->
        <div class="flex items-center justify-between px-4 py-5 border-b border-slate-800/60 shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center shadow-lg shadow-blue-600/30 group-hover:scale-105 transition-transform shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <div class="sidebar-text">
                    <p class="text-sm font-bold text-white leading-tight">Admin Panel</p>
                    <p class="text-[10px] text-slate-400 font-medium">SMK / SMA Masa Depan</p>
                </div>
            </a>
            <button id="sidebar-close-btn" class="lg:hidden p-1.5 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-0.5">

            <!-- Main -->
            <p class="sidebar-text px-3 mb-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'nav-item-active' : 'text-slate-400' }} flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h4a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2V7zM13 7a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2h-4a2 2 0 01-2-2V7zM13 15a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2h-4a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="sidebar-text">Dashboard</span>
            </a>

            <!-- Konten -->
            <p class="sidebar-text px-3 pt-4 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Manajemen Konten</p>

            <!-- Berita -->
            <div>
                <button onclick="toggleSubmenu('posts-sub', this)"
                        class="nav-item w-full {{ request()->routeIs('admin.posts.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-.586-1.414l-4.5-4.5A2 2 0 0014.914 3H14"/>
                        </svg>
                        <span class="sidebar-text">Berita & Artikel</span>
                    </div>
                    <svg class="submenu-chevron sidebar-text w-4 h-4 shrink-0 {{ request()->routeIs('admin.posts.*') ? 'open' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <div id="posts-sub" class="submenu-content {{ request()->routeIs('admin.posts.*') ? 'open' : '' }} ml-8 mt-1 space-y-0.5">
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition {{ request()->routeIs('admin.posts.index') ? 'text-blue-400 bg-blue-500/10 font-semibold' : '' }}">
                        <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span><span>Semua Artikel</span>
                    </a>
                    <a href="{{ route('admin.posts.create') }}" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition {{ request()->routeIs('admin.posts.create') ? 'text-blue-400 bg-blue-500/10 font-semibold' : '' }}">
                        <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span><span>Tambah Artikel</span>
                    </a>
                </div>
            </div>

            <!-- Galeri -->
            <div>
                <button onclick="toggleSubmenu('gallery-sub', this)"
                        class="nav-item w-full {{ request()->routeIs('admin.galleries.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="sidebar-text">Galeri & Album</span>
                    </div>
                    <svg class="submenu-chevron sidebar-text w-4 h-4 shrink-0 {{ request()->routeIs('admin.galleries.*') ? 'open' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <div id="gallery-sub" class="submenu-content {{ request()->routeIs('admin.galleries.*') ? 'open' : '' }} ml-8 mt-1 space-y-0.5">
                    <a href="{{ route('admin.galleries.index') }}" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition {{ request()->routeIs('admin.galleries.index') ? 'text-blue-400 bg-blue-500/10 font-semibold' : '' }}">
                        <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span><span>Semua Galeri</span>
                    </a>
                    <a href="{{ route('admin.galleries.create') }}" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition {{ request()->routeIs('admin.galleries.create') ? 'text-blue-400 bg-blue-500/10 font-semibold' : '' }}">
                        <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span><span>Tambah Foto</span>
                    </a>
                </div>
            </div>

            <!-- Fasilitas -->
            <a href="{{ route('admin.facilities.index') }}"
               class="nav-item {{ request()->routeIs('admin.facilities.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <span class="sidebar-text">Fasilitas</span>
            </a>

            <!-- Staff -->
            <a href="{{ route('admin.staff.index') }}"
               class="nav-item {{ request()->routeIs('admin.staff.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="sidebar-text">Staff & Guru</span>
            </a>

            <!-- Ekstrakurikuler -->
            <a href="{{ route('admin.extracurriculars.index') }}"
               class="nav-item {{ request()->routeIs('admin.extracurriculars.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <span class="sidebar-text">Ekstrakurikuler</span>
            </a>

            <!-- PPDB -->
            <p class="sidebar-text px-3 pt-4 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">PPDB & Akademik</p>

            <div>
                <button onclick="toggleSubmenu('ppdb-sub', this)"
                        class="nav-item w-full {{ request()->routeIs('admin.ppdb.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="sidebar-text">PPDB</span>
                    </div>
                    <svg class="submenu-chevron sidebar-text w-4 h-4 shrink-0 {{ request()->routeIs('admin.ppdb.*') ? 'open' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <div id="ppdb-sub" class="submenu-content {{ request()->routeIs('admin.ppdb.*') ? 'open' : '' }} ml-8 mt-1 space-y-0.5">
                    <a href="{{ route('admin.ppdb.index') }}" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition {{ request()->routeIs('admin.ppdb.index') ? 'text-blue-400 bg-blue-500/10 font-semibold' : '' }}">
                        <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span><span>Data Pendaftar</span>
                    </a>
                    <a href="{{ route('admin.ppdb.waves') }}" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition {{ request()->routeIs('admin.ppdb.waves') ? 'text-blue-400 bg-blue-500/10 font-semibold' : '' }}">
                        <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span><span>Gelombang PPDB</span>
                    </a>
                </div>
            </div>

            <!-- Komunikasi -->
            <p class="sidebar-text px-3 pt-4 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Komunikasi</p>

            @php
                try { $unreadContacts = \App\Models\Contact::where('is_read', false)->count(); } catch(\Exception $e) { $unreadContacts = 0; }
            @endphp
            <a href="{{ route('admin.contacts.index') }}"
               class="nav-item {{ request()->routeIs('admin.contacts.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <span class="sidebar-text">Pesan Masuk</span>
                </div>
                @if($unreadContacts > 0)
                    <span class="sidebar-text inline-flex items-center justify-center min-w-[20px] h-5 px-1 rounded-full bg-blue-600 text-white text-[10px] font-bold notif-pulse">{{ $unreadContacts > 9 ? '9+' : $unreadContacts }}</span>
                @endif
            </a>

            <!-- Sistem -->
            <p class="sidebar-text px-3 pt-4 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Sistem</p>

            <a href="{{ route('admin.users.index') }}"
               class="nav-item {{ request()->routeIs('admin.users.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="sidebar-text">Manajemen User</span>
            </a>

            <a href="{{ route('admin.settings.index') }}"
               class="nav-item {{ request()->routeIs('admin.settings.*') ? 'nav-item-active' : 'text-slate-400' }} flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="sidebar-text">Pengaturan</span>
            </a>

        </nav>

        <!-- Sidebar Footer - User Info -->
        <div class="shrink-0 border-t border-slate-800/60 p-3">
            <div class="flex items-center space-x-3 px-2 py-2 rounded-xl hover:bg-slate-800/50 transition-all">
                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white text-xs font-bold shadow-lg shrink-0">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="sidebar-text flex-1 min-w-0">
                    <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</p>
                    <p class="text-[10px] text-slate-400 truncate">{{ ucfirst(str_replace('_', ' ', auth()->user()->role ?? 'super admin')) }}</p>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="shrink-0">
                    @csrf
                    <button type="submit" class="sidebar-text p-1.5 text-slate-500 hover:text-red-400 rounded-lg hover:bg-red-500/10 transition" title="Logout">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- ===== MAIN CONTENT ===== -->
    <div id="main-content" class="min-h-screen flex flex-col lg:ml-64">

        <!-- Top Header -->
        <header class="glass sticky top-0 z-20 flex items-center justify-between px-4 sm:px-6 h-16 border-b border-slate-800/50">

            <div class="flex items-center space-x-3">
                <!-- Mobile Hamburger -->
                <button id="sidebar-open-btn" class="lg:hidden p-2 text-slate-400 hover:text-white rounded-xl hover:bg-slate-800 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Desktop Collapse Toggle -->
                <button id="sidebar-collapse-btn" class="hidden lg:flex p-2 text-slate-400 hover:text-white rounded-xl hover:bg-slate-800 transition" title="Toggle Sidebar">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8M4 18h16"/>
                    </svg>
                </button>

                <!-- Breadcrumb -->
                <div class="hidden sm:flex items-center space-x-1.5 text-xs text-slate-500">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-400 transition">Admin</a>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <span class="text-slate-300 font-semibold">@yield('breadcrumb', 'Dashboard')</span>
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-2">

                <!-- View Website -->
                <a href="{{ route('home') }}" target="_blank"
                   class="hidden sm:flex items-center space-x-1.5 px-3 py-1.5 text-xs font-medium text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 border border-slate-700/50 hover:border-slate-600 transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>Lihat Website</span>
                </a>

                <!-- Notification -->
                <div class="relative">
                    <a href="{{ route('admin.contacts.index') }}" class="relative flex p-2 text-slate-400 hover:text-white rounded-xl hover:bg-slate-800 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        @if(isset($unreadContacts) && $unreadContacts > 0)
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-blue-500 notif-pulse"></span>
                        @endif
                    </a>
                </div>

                <!-- User Dropdown -->
                <div class="relative">
                    <button id="user-menu-btn" class="flex items-center space-x-2 px-2 py-1.5 rounded-xl hover:bg-slate-800 transition">
                        <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white text-xs font-bold shadow-lg">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <span class="hidden sm:block text-xs font-medium text-slate-300">{{ auth()->user()->name ?? 'Admin' }}</span>
                        <svg class="hidden sm:block w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div id="user-dropdown" class="dropdown-anim hidden absolute right-0 top-12 w-52 rounded-2xl shadow-2xl border border-slate-700/60 overflow-hidden z-50" style="background: rgba(10,18,35,0.97); backdrop-filter: blur(20px);">
                        <div class="px-4 py-3 border-b border-slate-700/60">
                            <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</p>
                            <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@sekolah.sch.id' }}</p>
                            <span class="mt-1 inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-500/15 text-blue-400 border border-blue-500/20">
                                {{ ucfirst(str_replace('_', ' ', auth()->user()->role ?? 'Super Admin')) }}
                            </span>
                        </div>
                        <div class="py-1.5">
                            <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-2.5 px-4 py-2 text-xs text-slate-400 hover:text-white hover:bg-slate-700/50 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <span>Profil Saya</span>
                            </a>
                            <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-2.5 px-4 py-2 text-xs text-slate-400 hover:text-white hover:bg-slate-700/50 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Pengaturan</span>
                            </a>
                            <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-2.5 px-4 py-2 text-xs text-slate-400 hover:text-white hover:bg-slate-700/50 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                <span>Lihat Website</span>
                            </a>
                        </div>
                        <div class="border-t border-slate-700/60 py-1.5">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center space-x-2.5 px-4 py-2 text-xs text-red-400 hover:text-red-300 hover:bg-red-500/10 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <!-- Main Page Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8">

            <!-- Flash Messages -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" class="mb-6 flex items-center space-x-3 px-4 py-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm" id="flash-success">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="flex-1">{{ session('success') }}</span>
                    <button onclick="this.closest('#flash-success').remove()" class="text-emerald-400 hover:text-emerald-300 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 flex items-center space-x-3 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-sm" id="flash-error">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="flex-1">{{ session('error') }}</span>
                    <button onclick="this.closest('#flash-error').remove()" class="text-red-400 hover:text-red-300 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="px-6 py-4 border-t border-slate-800/50 flex flex-col sm:flex-row items-center justify-between gap-1 text-xs text-slate-500">
            <span>&copy; {{ date('Y') }} Admin Panel — SMK / SMA Negeri Masa Depan</span>
            <a href="{{ route('home') }}" target="_blank" class="hover:text-blue-400 transition">Lihat Website Publik →</a>
        </footer>
    </div>

    <!-- ===== SCRIPTS ===== -->
    <script>
        // --- Mobile Sidebar ---
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const openBtn = document.getElementById('sidebar-open-btn');
        const closeBtn = document.getElementById('sidebar-close-btn');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            requestAnimationFrame(() => overlay.classList.remove('opacity-0'));
        }
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden'), 300);
        }

        openBtn?.addEventListener('click', openSidebar);
        closeBtn?.addEventListener('click', closeSidebar);
        overlay?.addEventListener('click', closeSidebar);

        // --- Desktop Collapse ---
        const collapseBtn = document.getElementById('sidebar-collapse-btn');
        const mainContent = document.getElementById('main-content');
        let isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

        function applySidebarState() {
            if (window.innerWidth < 1024) return;
            if (isCollapsed) {
                sidebar.style.width = '72px';
                mainContent.style.marginLeft = '72px';
                document.querySelectorAll('.sidebar-text').forEach(el => {
                    el.style.display = 'none';
                });
            } else {
                sidebar.style.width = '256px';
                mainContent.style.marginLeft = '';
                document.querySelectorAll('.sidebar-text').forEach(el => {
                    el.style.display = '';
                });
            }
        }

        collapseBtn?.addEventListener('click', () => {
            isCollapsed = !isCollapsed;
            localStorage.setItem('sidebarCollapsed', isCollapsed);
            applySidebarState();
        });

        if (window.innerWidth >= 1024) applySidebarState();

        // --- Submenu Toggle ---
        function toggleSubmenu(id, btn) {
            const submenu = document.getElementById(id);
            const chevron = btn.querySelector('.submenu-chevron');
            submenu?.classList.toggle('open');
            chevron?.classList.toggle('open');
        }

        // --- User Dropdown ---
        const userMenuBtn = document.getElementById('user-menu-btn');
        const userDropdown = document.getElementById('user-dropdown');

        userMenuBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown?.classList.toggle('hidden');
        });
        document.addEventListener('click', () => {
            userDropdown?.classList.add('hidden');
        });

        // --- Auto-dismiss Flash ---
        setTimeout(() => {
            document.getElementById('flash-success')?.remove();
            document.getElementById('flash-error')?.remove();
        }, 6000);
    </script>

    @stack('scripts')
</body>
</html>
