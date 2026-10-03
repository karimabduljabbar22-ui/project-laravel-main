<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#030712">
    <meta name="description" content="@yield('meta_description', 'Portal Resmi SMK / SMA Negeri Masa Depan - Sekolah Unggulan Berwawasan Digital, Berkarakter, dan Berdaya Saing Global.')">
    
    <title>@yield('title', 'SMK / SMA Negeri Masa Depan') - Website Resmi Sekolah</title>

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
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-6px)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Google Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        /* Smooth Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 9px;
            height: 9px;
        }
        ::-webkit-scrollbar-track {
            background: #030712;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 9999px;
            border: 2px solid #030712;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3b82f6;
        }

        /* Glassmorphism & Micro-Interactions */
        .glass-panel {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(51, 65, 85, 0.6);
        }

        .glass-panel-hover {
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-panel-hover:hover {
            transform: translateY(-4px);
            border-color: rgba(59, 130, 246, 0.45);
            box-shadow: 0 12px 30px -10px rgba(37, 99, 235, 0.25);
        }

        .glow-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glow-hover:hover {
            box-shadow: 0 0 25px rgba(37, 99, 235, 0.45);
            transform: translateY(-2px);
        }

        /* Text balance and responsive readability */
        .text-balance {
            text-wrap: balance;
        }

        /* Subtle hero slide animations */
        .hero-slide {
            transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1), transform 7s ease-out;
        }
        .hero-slide.active {
            opacity: 1;
            transform: scale(1.06);
        }
        .hero-slide.inactive {
            opacity: 0;
            transform: scale(1);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-[#030712] text-slate-100 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen flex flex-col justify-between overflow-x-hidden">

    <!-- TOP ANNOUNCEMENT BAR (Responsive & Subtle) -->
    <div class="bg-gradient-to-r from-blue-950/70 via-slate-900/90 to-blue-950/70 border-b border-blue-900/40 text-xs py-2 px-4 text-center text-slate-300 relative z-50 hidden sm:block">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30">
                    INFO PPDB 2026/2027
                </span>
                <span class="truncate">Penerimaan Siswa Baru Gelombang 1 Telah Dibuka. Kuota Terbatas!</span>
            </div>
            <div class="flex items-center space-x-4 text-[11px] text-slate-400">
                <span class="flex items-center space-x-1"><svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg> <span>(021) 7890-1234</span></span>
                <span class="hidden md:inline text-slate-600">•</span>
                <span class="hidden md:flex items-center space-x-1"><svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg> <span>info@sekolah.sch.id</span></span>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR (Glassmorphism, Dynamic Active Indicator & Smooth Transitions) -->
    <header id="main-header" class="fixed top-0 sm:top-[33px] left-0 right-0 z-40 transition-all duration-300 bg-slate-950/80 backdrop-blur-xl border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 transition-all duration-300" id="navbar-container">
                
                <!-- School Logo & Identity -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group shrink-0 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-xl p-1">
                    <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl bg-gradient-to-tr from-blue-600 via-blue-500 to-indigo-500 flex items-center justify-center text-white shadow-lg shadow-blue-600/30 group-hover:scale-105 group-hover:rotate-2 transition-all duration-300">
                        <svg class="w-6 h-6 sm:w-6.5 sm:h-6.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-extrabold text-base sm:text-lg text-white tracking-tight group-hover:text-blue-400 transition-colors flex items-center space-x-1.5">
                            <span>SMK / SMA Negeri</span>
                            <span class="text-blue-500 font-black">Masa Depan</span>
                        </div>
                        <p class="text-[10px] text-slate-400 font-medium tracking-wider uppercase hidden sm:block">Unggul • Karakter • Berdaya Saing</p>
                    </div>
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-sm font-medium">
                    @php
                        $navLinks = [
                            ['route' => 'home', 'label' => 'Beranda'],
                            ['route' => 'profile', 'label' => 'Profil'],
                            ['route' => 'facilities', 'label' => 'Fasilitas'],
                            ['route' => 'galleries', 'label' => 'Galeri'],
                            ['route' => 'extracurriculars', 'label' => 'Ekstrakurikuler'],
                            ['route' => 'contact', 'label' => 'Kontak'],
                        ];
                    @endphp

                    @foreach($navLinks as $nav)
                        @php $isActive = request()->routeIs($nav['route']); @endphp
                        <a href="{{ route($nav['route']) }}" 
                           class="relative px-3.5 py-2 rounded-lg transition-all duration-200 {{ $isActive ? 'text-blue-400 font-semibold bg-blue-500/10 border border-blue-500/20 shadow-sm shadow-blue-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
                            {{ $nav['label'] }}
                            @if($isActive)
                                <span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            @endif
                        </a>
                    @endforeach
                </nav>

                <!-- Desktop Action CTA -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="{{ route('contact') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold text-xs tracking-wide shadow-lg shadow-blue-600/30 glow-hover transition-all">
                        <span>Daftar / PPDB</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>

                    <!-- Tombol Login / Dashboard Admin -->
                    @auth
                        <!-- Jika Admin Sudah Login -->
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-full bg-slate-800/90 hover:bg-slate-700 text-slate-200 hover:text-white border border-slate-700 text-xs font-semibold tracking-wide transition-all shadow-md">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h4a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2V7zM13 7a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2h-4a2 2 0 01-2-2V7zM13 15a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2h-4a2 2 0 01-2-2v-2z"/></svg>
                            <span>Dashboard Admin</span>
                        </a>
                    @else
                        <!-- Jika Belum Login -->
                        <a href="{{ route('login') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-full bg-slate-800/90 hover:bg-slate-700 text-slate-200 hover:text-white border border-slate-700 text-xs font-semibold tracking-wide transition-all shadow-md">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            <span>Login Admin</span>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button with Smooth Icon Animation -->
                <button id="mobile-toggle-btn" 
                        aria-label="Toggle Menu Navigasi" 
                        aria-expanded="false" 
                        class="lg:hidden p-2.5 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 hover:text-white hover:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    <div class="w-6 h-5 relative flex flex-col justify-between">
                        <span id="line-1" class="w-full h-0.5 bg-current rounded-full transition-all duration-300 transform origin-left"></span>
                        <span id="line-2" class="w-full h-0.5 bg-current rounded-full transition-all duration-200"></span>
                        <span id="line-3" class="w-full h-0.5 bg-current rounded-full transition-all duration-300 transform origin-left"></span>
                    </div>
                </button>

            </div>
        </div>

        <!-- Mobile Navigation Drawer / Dropdown -->
        <div id="mobile-menu-drawer" 
             class="lg:hidden hidden overflow-hidden bg-slate-950/98 backdrop-blur-2xl border-b border-slate-800/90 transition-all duration-300 px-4 sm:px-6 py-5 shadow-2xl">
            <div class="space-y-1">
                @foreach($navLinks as $nav)
                    @php $isActive = request()->routeIs($nav['route']); @endphp
                    <a href="{{ route($nav['route']) }}" 
                       class="flex items-center justify-between px-4 py-3 rounded-xl text-sm font-medium transition-all {{ $isActive ? 'bg-blue-600/20 text-blue-400 font-semibold border border-blue-500/30' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">
                        <span>{{ $nav['label'] }}</span>
                        @if($isActive)
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        @else
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        @endif
                    </a>
                @endforeach
            </div>

            <div class="pt-4 mt-3 border-t border-slate-800/80 space-y-2">
                <a href="{{ route('contact') }}" class="w-full flex items-center justify-center space-x-2 py-3 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold text-sm shadow-lg shadow-blue-600/30">
                    <span>Pendaftaran PPDB & Kontak</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="w-full flex items-center justify-center space-x-2 py-2.5 px-4 rounded-xl bg-slate-900 border border-slate-700 text-slate-200 hover:text-white text-xs font-semibold">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h4a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2V7zM13 7a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2h-4a2 2 0 01-2-2V7zM13 15a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2h-4a2 2 0 01-2-2v-2z"/></svg>
                            <span>Dashboard Admin</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-full flex items-center justify-center space-x-2 py-2.5 px-4 rounded-xl bg-slate-900 border border-slate-700 text-slate-200 hover:text-white text-xs font-semibold">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            <span>Login Admin</span>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- CONTENT WRAPPER -->
    <div class="flex-grow pt-20 sm:pt-28">
        @yield('content')
    </div>

    <!-- MODERN RESPONSIVE FOOTER -->
    <footer class="border-t border-slate-800/80 bg-slate-950/95 relative z-10 text-slate-400 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8">
                
                <!-- Col 1: Identity & Description -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-600/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        </div>
                        <span class="font-bold text-lg text-white">SMK / SMA Masa Depan</span>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                        Lembaga pendidikan modern yang berkomitmen mencetak lulusan berakhlak mulia, kompeten dalam teknologi, serta berdaya saing global.
                    </p>
                    <div class="flex items-center space-x-3 pt-2">
                        <span class="px-2.5 py-1 rounded-md bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-semibold">Akreditasi A</span>
                        <span class="px-2.5 py-1 rounded-md bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold">Sekolah Penggerak</span>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider">Tautan Cepat</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Beranda Utama</span></a></li>
                        <li><a href="{{ route('profile') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Profil & Sejarah</span></a></li>
                        <li><a href="{{ route('facilities') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Fasilitas Penunjang</span></a></li>
                        <li><a href="{{ route('galleries') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Dokumentasi Kegiatan</span></a></li>
                        <li><a href="{{ route('extracurriculars') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Program Ekstrakurikuler</span></a></li>
                    </ul>
                </div>

                <!-- Col 3: Programs & Activities -->
                <div class="space-y-4">
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider">Layanan & PPDB</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm">
                        <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Informasi Pendaftaran PPDB</span></a></li>
                        <li><a href="{{ route('profile') }}#staff" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Dewan Guru & Tenaga Didik</span></a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Layanan Konsultasi Siswa</span></a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5"><span>›</span> <span>Kritik & Saran Masyarakat</span></a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Office -->
                <div class="space-y-4">
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider">Hubungi Kami</h4>
                    <div class="space-y-3 text-xs sm:text-sm">
                        <div class="flex items-start space-x-2.5">
                            <span class="text-blue-400 mt-0.5">📍</span>
                            <span>Jl. Pendidikan No. 45, Kota Sukses, Indonesia 12345</span>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <span class="text-blue-400">📞</span>
                            <span>+62 812-3456-7890 / (021) 7890-1234</span>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <span class="text-blue-400">✉️</span>
                            <span>info@sekolah.sch.id</span>
                        </div>
                        <div class="flex items-center space-x-2.5 text-slate-400 text-xs">
                            <span class="text-emerald-400">🕒</span>
                            <span>Senin - Jumat: 07.00 - 16.00 WIB</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright & Socials -->
            <div class="mt-12 pt-8 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
                <p class="text-slate-400 text-center sm:text-left">
                    &copy; {{ date('Y') }} <strong>SMK / SMA Negeri Masa Depan</strong>. Seluruh Hak Cipta Dilindungi.
                </p>
                <div class="flex items-center space-x-6 text-slate-400">
                    <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
                    <a href="{{ route('profile') }}" class="hover:text-blue-400 transition">Profil</a>
                    <a href="{{ route('contact') }}" class="hover:text-blue-400 transition">Bantuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- SMOOTH FLOATING BACK TO TOP BUTTON -->
    <button id="back-to-top" 
            aria-label="Kembali ke atas" 
            class="fixed bottom-6 right-6 z-40 w-11 h-11 rounded-full bg-blue-600/90 hover:bg-blue-500 text-white shadow-xl shadow-blue-600/40 border border-blue-400/40 backdrop-blur-md flex items-center justify-center opacity-0 pointer-events-none translate-y-4 transition-all duration-300 focus:outline-none">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </button>

    <!-- AOS JS LIBRARY -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- GLOBAL RESPONSIVE & SMOOTH SCRIPT -->
    <script>
        // 1. Inisialisasi AOS (Animate On Scroll)
        AOS.init({
            once: true,
            duration: 750,
            easing: 'ease-out-cubic',
            offset: 40,
            disable: 'mobile' ? false : false // Smooth on both mobile & desktop
        });

        // 2. Responsive Mobile Drawer Toggle dengan Morphing Icon
        const mobileBtn = document.getElementById('mobile-toggle-btn');
        const mobileDrawer = document.getElementById('mobile-menu-drawer');
        const line1 = document.getElementById('line-1');
        const line2 = document.getElementById('line-2');
        const line3 = document.getElementById('line-3');

        if (mobileBtn && mobileDrawer) {
            mobileBtn.addEventListener('click', () => {
                const isOpen = !mobileDrawer.classList.contains('hidden');
                if (isOpen) {
                    // Tutup Drawer
                    mobileDrawer.classList.add('hidden');
                    mobileBtn.setAttribute('aria-expanded', 'false');
                    line1.classList.remove('rotate-45', 'translate-y-2');
                    line2.classList.remove('opacity-0');
                    line3.classList.remove('-rotate-45', '-translate-y-2');
                } else {
                    // Buka Drawer
                    mobileDrawer.classList.remove('hidden');
                    mobileBtn.setAttribute('aria-expanded', 'true');
                    line1.classList.add('rotate-45', 'translate-y-2');
                    line2.classList.add('opacity-0');
                    line3.classList.add('-rotate-45', '-translate-y-2');
                }
            });

            // Tutup mobile drawer saat window di-resize ke ukuran desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024 && !mobileDrawer.classList.contains('hidden')) {
                    mobileDrawer.classList.add('hidden');
                    mobileBtn.setAttribute('aria-expanded', 'false');
                    line1.classList.remove('rotate-45', 'translate-y-2');
                    line2.classList.remove('opacity-0');
                    line3.classList.remove('-rotate-45', '-translate-y-2');
                }
            });
        }

        // 3. Navbar Sticky Effect & Floating Back to Top Button
        const header = document.getElementById('main-header');
        const backToTopBtn = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            const scrollPos = window.scrollY;

            // Efek Navbar saat scroll
            if (scrollPos > 40) {
                header.classList.add('shadow-xl', 'bg-slate-950/95', 'border-slate-800');
                header.classList.remove('bg-slate-950/80');
            } else {
                header.classList.remove('shadow-xl', 'bg-slate-950/95');
                header.classList.add('bg-slate-950/80');
            }

            // Tombol Back-to-Top
            if (backToTopBtn) {
                if (scrollPos > 350) {
                    backToTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
                    backToTopBtn.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                    backToTopBtn.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
                }
            }
        });

        // 4. Smooth Scroll ke Atas
        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
