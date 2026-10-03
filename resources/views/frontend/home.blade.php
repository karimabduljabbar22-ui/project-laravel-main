@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <!-- HERO SECTION WITH SMOOTH SLIDER & PARALLAX AESTHETICS -->
    <section class="relative min-h-[90vh] lg:min-h-screen flex items-center justify-center overflow-hidden -mt-20 sm:-mt-28">
        
        <!-- Background Slider with Ken Burns Effect -->
        <div class="absolute inset-0 w-full h-full z-0 select-none pointer-events-none">
            <div class="hero-slide active absolute inset-0">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover" alt="Gedung Kampus Sekolah" loading="eager">
            </div>
            <div class="hero-slide inactive absolute inset-0">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover" alt="Aktivitas Belajar Modern" loading="lazy">
            </div>
            <div class="hero-slide inactive absolute inset-0">
                <img src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover" alt="Fasilitas dan Lingkungan Sekolah" loading="lazy">
            </div>

            <!-- Deep High-Contrast Vignette & Ambient Glow -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/85 via-slate-950/80 to-[#030712]"></div>
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[140px] pointer-events-none"></div>
        </div>

        <!-- HERO CONTENT CONTAINER -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-24 sm:pt-32 pb-16">
            
            <!-- Pill Notification Badge -->
            <div data-aos="fade-down" data-aos-duration="700" class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs sm:text-sm font-semibold tracking-wider uppercase backdrop-blur-md mb-6 shadow-lg shadow-blue-500/5">
                <span class="w-2 h-2 rounded-full bg-blue-400 animate-ping"></span>
                <span>Pendidikan Karakter & Teknologi Unggulan</span>
            </div>

            <!-- Main Heading with Responsive Text Sizing -->
            <h1 data-aos="fade-up" data-aos-duration="800" data-aos-delay="150" class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-[1.15] text-balance">
                Masa Depan Cerah Dimulai <br class="hidden sm:inline">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-sky-300">
                    Bersama Generasi Unggul
                </span>
            </h1>

            <!-- Subtitle -->
            <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="300" class="mt-6 text-slate-300 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed font-normal text-balance">
                Membentuk generasi inovatif, berakhlak mulia, dan siap bersaing di kancah global melalui kurikulum modern berstandar internasional.
            </p>

            <!-- Responsive Call to Action Buttons -->
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="450" class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('profile') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm shadow-xl shadow-blue-600/30 glow-hover transition-all text-center">
                    Jelajahi Profil Sekolah
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-slate-900/90 hover:bg-slate-800 text-slate-200 border border-slate-700/80 hover:border-slate-500 font-semibold text-sm transition-all text-center backdrop-blur-md">
                    Pendaftaran PPDB & Kontak
                </a>
            </div>

        </div>

        <!-- Slider Dots Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex items-center space-x-2.5">
            <button aria-label="Slide 1" onclick="setSlide(0)" class="slide-dot w-8 h-2 rounded-full bg-blue-500 transition-all duration-300"></button>
            <button aria-label="Slide 2" onclick="setSlide(1)" class="slide-dot w-2 h-2 rounded-full bg-slate-700 hover:bg-slate-500 transition-all duration-300"></button>
            <button aria-label="Slide 3" onclick="setSlide(2)" class="slide-dot w-2 h-2 rounded-full bg-slate-700 hover:bg-slate-500 transition-all duration-300"></button>
        </div>

    </section>

    <!-- STATS COUNTER STRIP (Responsive Glassmorphism Grid) -->
    <section class="relative z-20 -mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div data-aos="fade-up" data-aos-duration="700" class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 bg-slate-900/80 backdrop-blur-xl border border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-2xl shadow-black/50">
            <div class="text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">1.250+</div>
                <div class="text-xs sm:text-sm text-slate-400 font-medium">Siswa Aktif</div>
            </div>
            <div class="text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">85+</div>
                <div class="text-xs sm:text-sm text-slate-400 font-medium">Guru & Staf Ahli</div>
            </div>
            <div class="text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">24+</div>
                <div class="text-xs sm:text-sm text-slate-400 font-medium">Ekstrakurikuler</div>
            </div>
            <div class="text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Akreditasi A</div>
                <div class="text-xs sm:text-sm text-slate-400 font-medium">Predikat Unggul</div>
            </div>
        </div>
    </section>

    <!-- MAIN BODY CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28 space-y-24">

        <!-- SAMBUTAN KEPALA SEKOLAH -->
        @if(isset($headmaster) && $headmaster)
        <section data-aos="fade-up" data-aos-duration="800" class="glass-panel rounded-3xl p-6 sm:p-10 md:p-12 relative overflow-hidden">
            <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
                <div class="shrink-0 relative group">
                    <div class="w-36 h-36 sm:w-44 sm:h-44 rounded-2xl overflow-hidden border-2 border-blue-500/40 shadow-2xl shadow-blue-500/20 group-hover:border-blue-400 transition-all duration-300">
                        @if($headmaster->photo)
                            <img src="{{ Str::startsWith($headmaster->photo, ['http://', 'https://']) ? $headmaster->photo : asset('storage/' . $headmaster->photo) }}" 
                                 alt="{{ $headmaster->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-900 to-slate-900 flex items-center justify-center text-blue-300 text-4xl font-black">
                                {{ strtoupper(substr($headmaster->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                    <span class="absolute -bottom-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-blue-600 text-white text-[11px] font-bold rounded-full shadow-lg whitespace-nowrap">
                        Kepala Sekolah
                    </span>
                </div>

                <div class="space-y-4 text-center md:text-left flex-1">
                    <div class="inline-flex items-center space-x-2 text-xs font-bold text-blue-400 uppercase tracking-widest">
                        <span>Pesan Kepala Sekolah</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        {{ $headmaster->name }}
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed italic">
                        "{{ $headmaster->bio ?? 'Selamat datang di portal informasi resmi sekolah. Kami berkomitmen untuk terus berinovasi dan memberikan pelayanan pendidikan terbaik guna melahirkan generasi muda yang cerdas, berkarakter, dan berdaya saing global.' }}"
                    </p>
                    <div class="pt-2 flex flex-wrap items-center justify-center md:justify-start gap-4 text-xs text-slate-400">
                        <span class="flex items-center space-x-1.5"><svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> <span>Kepemimpinan Berintegritas</span></span>
                        <span class="flex items-center space-x-1.5"><svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> <span>Fokus Prestasi Siswa</span></span>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- KEUNGGULAN SEKOLAH (WHY CHOOSE US) -->
        <section class="space-y-12">
            <div class="text-center space-y-3" data-aos="fade-up" data-aos-duration="700">
                <span class="px-3.5 py-1 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-semibold uppercase tracking-wider">
                    Keunggulan Kami
                </span>
                <h3 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">Mengapa Memilih Sekolah Kami?</h3>
                <p class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto">Kami memadukan pendidikan akademik, keterampilan terapan, dan penguatan karakter religius.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="glass-panel glass-panel-hover rounded-2xl p-6 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-600/20 border border-blue-500/30 text-blue-400 flex items-center justify-center text-2xl font-bold">
                        🎓
                    </div>
                    <h4 class="text-lg font-bold text-white">Kurikulum Modern</h4>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                        Menerapkan kurikulum berbasis digital dan kebutuhan industri masa depan untuk kesiapan karir siswa.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="200" class="glass-panel glass-panel-hover rounded-2xl p-6 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-indigo-600/20 border border-indigo-500/30 text-indigo-400 flex items-center justify-center text-2xl font-bold">
                        🔬
                    </div>
                    <h4 class="text-lg font-bold text-white">Fasilitas Lengkap</h4>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                        Laboratorium komputer modern, lab IPA presisi, perpustakaan digital, serta sarana olahraga representatif.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="300" class="glass-panel glass-panel-hover rounded-2xl p-6 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-sky-600/20 border border-sky-500/30 text-sky-400 flex items-center justify-center text-2xl font-bold">
                        🏆
                    </div>
                    <h4 class="text-lg font-bold text-white">Segudang Prestasi</h4>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                        Rekam jejak juara di berbagai kompetisi sains, teknologi, olahraga, dan seni tingkat kota hingga nasional.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="400" class="glass-panel glass-panel-hover rounded-2xl p-6 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-600/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-2xl font-bold">
                        🤝
                    </div>
                    <h4 class="text-lg font-bold text-white">Kemitraan Luas</h4>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                        Terhubung dengan puluhan industri mitra, perguruan tinggi terkemuka, dan lembaga sertifikasi profesi.
                    </p>
                </div>
            </div>
        </section>

        <!-- BERITA TERBARU & AGENDA (Responsive 2:1 Grid) -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-12">
            
            <!-- Berita & Informasi (Col span 2) -->
            <div class="lg:col-span-2 space-y-6" data-aos="fade-right" data-aos-duration="800">
                <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                    <div>
                        <h3 class="text-2xl font-extrabold text-white tracking-tight">Berita & Informasi</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Kabar terbaru dan pengumuman sekolah</p>
                    </div>
                    <a href="{{ route('profile') }}" class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition flex items-center space-x-1">
                        <span>Lihat Semua</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @forelse($posts as $post)
                        <article class="glass-panel glass-panel-hover rounded-2xl p-6 flex flex-col justify-between group">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="px-2.5 py-1 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 font-semibold uppercase text-[10px] tracking-wider">
                                        {{ $post->type }}
                                    </span>
                                    <span class="text-slate-500 text-[11px]">{{ $post->created_at ? $post->created_at->format('d M Y') : 'Terbaru' }}</span>
                                </div>
                                <h4 class="font-bold text-white text-base group-hover:text-blue-400 transition leading-snug line-clamp-2">
                                    {{ $post->title }}
                                </h4>
                                <p class="text-slate-400 text-xs sm:text-sm line-clamp-3 leading-relaxed">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>
                            </div>
                            <div class="pt-4 mt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-blue-400 font-semibold">
                                <span>Baca Selengkapnya</span>
                                <span class="group-hover:translate-x-1 transition-transform">→</span>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-full glass-panel rounded-2xl p-8 text-center text-slate-500 text-sm">
                            Belum ada berita yang dipublikasikan saat ini.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Agenda Terdekat (Col span 1) -->
            <div class="space-y-6" data-aos="fade-left" data-aos-duration="800">
                <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                    <div>
                        <h3 class="text-2xl font-extrabold text-white tracking-tight">Agenda</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Jadwal kegiatan terdekat</p>
                    </div>
                    <span class="text-xs text-blue-400 font-medium">Kalender</span>
                </div>

                <div class="space-y-4">
                    @forelse($agenda as $item)
                        <div class="glass-panel glass-panel-hover rounded-2xl p-4 flex items-center space-x-4">
                            <div class="shrink-0 w-14 h-14 rounded-xl bg-blue-600/20 border border-blue-500/30 flex flex-col items-center justify-center text-blue-400 shadow-inner">
                                <span class="text-[10px] font-bold uppercase tracking-wider leading-none">{{ \Carbon\Carbon::parse($item->event_date)->format('M') }}</span>
                                <span class="text-lg font-black leading-tight">{{ \Carbon\Carbon::parse($item->event_date)->format('d') }}</span>
                            </div>
                            <div class="space-y-1 min-w-0 flex-1">
                                <h4 class="text-sm font-bold text-white truncate hover:text-blue-400 transition">{{ $item->title }}</h4>
                                <p class="text-xs text-slate-400 truncate flex items-center space-x-1">
                                    <span>📍</span>
                                    <span>{{ $item->location }}</span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="glass-panel rounded-2xl p-8 text-center text-slate-500 text-sm">
                            Tidak ada agenda terdekat saat ini.
                        </div>
                    @endforelse
                </div>

                <!-- Callout Box PPDB -->
                <div class="rounded-2xl p-6 bg-gradient-to-br from-blue-900/40 via-indigo-950/40 to-slate-900 border border-blue-800/40 space-y-3">
                    <span class="text-xl">📢</span>
                    <h4 class="text-base font-bold text-white">Butuh Informasi Pendaftaran?</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Konsultasikan jalur penerimaan dan program keahlian dengan tim PPDB sekolah kami.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-block text-xs font-bold text-blue-400 hover:text-blue-300">
                        Hubungi Tim PPDB →
                    </a>
                </div>
            </div>

        </section>

        <!-- CTA REGISTRATION BANNER -->
        <section data-aos="zoom-in" data-aos-duration="800" class="relative rounded-3xl overflow-hidden p-8 sm:p-12 text-center bg-gradient-to-r from-blue-900/60 via-indigo-900/40 to-slate-900 border border-blue-500/30 shadow-2xl">
            <div class="absolute inset-0 bg-blue-600/10 blur-2xl pointer-events-none"></div>
            <div class="relative z-10 max-w-3xl mx-auto space-y-6">
                <span class="px-3.5 py-1.5 rounded-full bg-blue-500/20 text-blue-300 text-xs font-semibold uppercase tracking-wider border border-blue-400/30">
                    Mari Bergabung Bersama Kami
                </span>
                <h3 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Siap Menggapai Cita-Cita Anda di Sekolah Masa Depan?
                </h3>
                <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
                    Daftarkan putra-putri Anda sekarang atau kunjungi langsung kampus sekolah kami untuk melihat fasilitas terbaik.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm shadow-xl shadow-blue-600/40 glow-hover">
                        Daftar PPDB Sekarang
                    </a>
                    <a href="{{ route('facilities') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-slate-900 hover:bg-slate-800 text-slate-200 border border-slate-700 font-semibold text-sm transition-all">
                        Lihat Fasilitas
                    </a>
                </div>
            </div>
        </section>

    </main>

@endsection

@push('scripts')
<script>
    // Smooth Auto Slider Script
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slide-dot');
    let currentSlide = 0;
    const totalSlides = slides.length;
    let slideTimer = null;

    function applySlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('inactive');
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
                slide.classList.add('inactive');
            }
        });

        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('bg-blue-500', 'w-8');
                dot.classList.remove('bg-slate-700', 'w-2');
            } else {
                dot.classList.remove('bg-blue-500', 'w-8');
                dot.classList.add('bg-slate-700', 'w-2');
            }
        });
        currentSlide = index;
    }

    function setSlide(index) {
        clearInterval(slideTimer);
        applySlide(index);
        startSlider();
    }

    function startSlider() {
        slideTimer = setInterval(() => {
            let nextIndex = (currentSlide + 1) % totalSlides;
            applySlide(nextIndex);
        }, 5500);
    }

    if (totalSlides > 1) {
        startSlider();
    }
</script>
@endpush