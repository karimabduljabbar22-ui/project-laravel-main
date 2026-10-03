@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

    <!-- INNER PAGE HEADER (Smooth Glow & Responsive Breadcrumbs) -->
    <section class="relative py-16 sm:py-24 overflow-hidden border-b border-slate-800/80">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-950/20 via-slate-950 to-[#030712]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-600/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center justify-center space-x-2 text-xs text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
                <span>/</span>
                <span class="text-blue-400 font-medium">Profil Sekolah</span>
            </nav>

            <span data-aos="fade-down" data-aos-duration="600" class="inline-block px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-semibold uppercase tracking-wider">
                Mengenal Lebih Dekat
            </span>
            <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">
                Profil & Sejarah Sekolah
            </h1>
            <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="200" class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Komitmen kami dalam melahirkan generasi pembelajar yang berkarakter, berdaya saing global, dan siap menjadi pelopor di era transformasi digital.
            </p>
        </div>
    </section>

    <!-- MAIN PROFILE CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 space-y-20">

        <!-- SEJARAH SINGKAT SEKOLAH -->
        <section data-aos="fade-up" data-aos-duration="800" class="glass-panel rounded-3xl p-6 sm:p-10 md:p-12 relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-5">
                    <div class="inline-flex items-center space-x-2 text-xs font-bold text-blue-400 uppercase tracking-widest">
                        <span>🏛️ Rekam Jejak Institusi</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        Dedikasi Puluhan Tahun Membangun Generasi Unggul
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        Didirikan dengan komitmen kuat terhadap pemerataan pendidikan bermutu, sekolah kami terus bertransformasi menjawab tuntutan zaman. Dari awal berdirinya hingga saat ini, ribuan alumni telah berhasil menembus perguruan tinggi bergengsi dan diserap oleh dunia usaha serta industri multinasional.
                    </p>
                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                        Kami memadukan penguatan pondasi spiritual-moral dengan ketangkasan teknologi (STEM), kepemimpinan, dan kemandirian wirausaha agar setiap lulusan memiliki mentalitas juara.
                    </p>
                </div>
                <div class="lg:col-span-5">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="glass-panel p-5 rounded-2xl text-center space-y-2">
                            <span class="text-3xl">⭐</span>
                            <div class="text-xl sm:text-2xl font-black text-white">Akreditasi A</div>
                            <p class="text-xs text-slate-400">Standar Nasional Unggul</p>
                        </div>
                        <div class="glass-panel p-5 rounded-2xl text-center space-y-2">
                            <span class="text-3xl">🌱</span>
                            <div class="text-xl sm:text-2xl font-black text-white">Adiwiyata</div>
                            <p class="text-xs text-slate-400">Sekolah Ramah Lingkungan</p>
                        </div>
                        <div class="glass-panel p-5 rounded-2xl text-center space-y-2">
                            <span class="text-3xl">🌐</span>
                            <div class="text-xl sm:text-2xl font-black text-white">Digital School</div>
                            <p class="text-xs text-slate-400">LMS & Smart Classroom</p>
                        </div>
                        <div class="glass-panel p-5 rounded-2xl text-center space-y-2">
                            <span class="text-3xl">🤝</span>
                            <div class="text-xl sm:text-2xl font-black text-white">50+ Mitra</div>
                            <p class="text-xs text-slate-400">Industri & Kampus</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- VISI & MISI SEKOLAH -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Visi Card -->
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100" class="glass-panel glass-panel-hover rounded-3xl p-8 sm:p-10 space-y-5 border-t-2 border-t-blue-500">
                <div class="w-14 h-14 rounded-2xl bg-blue-600/20 border border-blue-500/30 text-blue-400 flex items-center justify-center text-3xl font-bold shadow-lg shadow-blue-600/20">
                    🎯
                </div>
                <h3 class="text-2xl font-bold text-white tracking-tight">Visi Sekolah</h3>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed italic">
                    "Menjadi institusi pendidikan pelopor yang berakhlak mulia, berwawasan lingkungan hidup, dan berdaya saing global melalui penguasaan teknologi terdepan."
                </p>
            </div>

            <!-- Misi Card -->
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200" class="glass-panel glass-panel-hover rounded-3xl p-8 sm:p-10 space-y-5 border-t-2 border-t-indigo-500">
                <div class="w-14 h-14 rounded-2xl bg-indigo-600/20 border border-indigo-500/30 text-indigo-400 flex items-center justify-center text-3xl font-bold shadow-lg shadow-indigo-600/20">
                    🚀
                </div>
                <h3 class="text-2xl font-bold text-white tracking-tight">Misi Sekolah</h3>
                <ul class="text-slate-300 text-xs sm:text-sm space-y-3 leading-relaxed">
                    <li class="flex items-start space-x-3">
                        <span class="w-5 h-5 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                        <span>Menyelenggarakan pembelajaran berkualitas berbasis digital dan kurikulum adaptif industri.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <span class="w-5 h-5 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                        <span>Membina keimanan, ketaqwaan, serta keluhuran budi pekerti seluruh sivitas akademika.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <span class="w-5 h-5 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                        <span>Memfasilitasi pengembangan talenta bakat, kepemimpinan, dan kewirausahaan siswa secara optimal.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <span class="w-5 h-5 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">✓</span>
                        <span>Membangun ekosistem sekolah yang asri, inklusif, sehat, serta berwawasan pelestarian lingkungan.</span>
                    </li>
                </ul>
            </div>

        </section>

        <!-- NILAI-NILAI UTAMA (CORE VALUES) -->
        <section class="space-y-8" data-aos="fade-up" data-aos-duration="800">
            <div class="text-center space-y-2">
                <span class="px-3.5 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase tracking-wider">Pondasi Budaya</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white">Nilai-Nilai Luhur Sekolah</h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="glass-panel glass-panel-hover rounded-2xl p-6 text-center space-y-3">
                    <span class="text-3xl">🛡️</span>
                    <h4 class="font-bold text-white text-base">Integritas</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Menjunjung tinggi kejujuran, tanggung jawab moral, dan etika akademik dalam setiap tindakan.</p>
                </div>
                <div class="glass-panel glass-panel-hover rounded-2xl p-6 text-center space-y-3">
                    <span class="text-3xl">💡</span>
                    <h4 class="font-bold text-white text-base">Inovatif</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Berani bereksperimen, berpikir kritis, serta melahirkan solusi kreatif atas setiap permasalahan.</p>
                </div>
                <div class="glass-panel glass-panel-hover rounded-2xl p-6 text-center space-y-3">
                    <span class="text-3xl">🤝</span>
                    <h4 class="font-bold text-white text-base">Kolaboratif</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Mengedepankan semangat gotong royong, empati, dan kerja sama lintas disiplin.</p>
                </div>
                <div class="glass-panel glass-panel-hover rounded-2xl p-6 text-center space-y-3">
                    <span class="text-3xl">🎯</span>
                    <h4 class="font-bold text-white text-base">Disiplin & Mandiri</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Manajemen waktu yang unggul dan ketangguhan dalam menghadapi dinamika masa depan.</p>
                </div>
            </div>
        </section>

        <!-- DEWAN GURU & TENAGA PENDIDIK (STAFF) -->
        <section id="staff" class="space-y-10" data-aos="fade-up" data-aos-duration="800">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border-b border-slate-800 pb-4">
                <div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Tenaga Pendidik & Staf</h3>
                    <p class="text-slate-400 text-xs sm:text-sm mt-1">Pendidik profesional dan berdedikasi membimbing masa depan siswa</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold border border-blue-500/30">
                    {{ count($staffs ?? []) }} Pendidik Terdaftar
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($staffs as $staff)
                    <div class="glass-panel glass-panel-hover rounded-2xl p-6 flex flex-col items-center text-center space-y-4 group">
                        <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-blue-500/40 shadow-lg group-hover:scale-105 transition-transform duration-300">
                            @if($staff->photo)
                                <img src="{{ Str::startsWith($staff->photo, ['http://', 'https://']) ? $staff->photo : asset('storage/' . $staff->photo) }}" 
                                     alt="{{ $staff->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-blue-900 via-slate-800 to-indigo-950 flex items-center justify-center text-blue-400 font-extrabold text-2xl">
                                    {{ strtoupper(substr($staff->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        <div class="space-y-1.5 w-full">
                            <h4 class="font-bold text-white text-base group-hover:text-blue-400 transition leading-snug">
                                {{ $staff->name }}
                            </h4>
                            <span class="inline-block px-2.5 py-0.5 rounded-full bg-blue-500/10 text-blue-400 text-[11px] font-semibold">
                                {{ $staff->position }}
                            </span>
                            @if($staff->bio)
                                <p class="text-slate-400 text-xs line-clamp-2 leading-relaxed pt-2">
                                    {{ $staff->bio }}
                                </p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full glass-panel rounded-2xl p-8 text-center text-slate-500 text-sm">
                        Data staf dan pengajar sedang diperbarui.
                    </div>
                @endforelse
            </div>
        </section>

    </main>

@endsection