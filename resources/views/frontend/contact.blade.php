@extends('layouts.app')

@section('title', 'Hubungi Kami & Layanan PPDB')

@section('content')

    <!-- INNER PAGE HEADER (Smooth Glow & Responsive Breadcrumbs) -->
    <section class="relative py-16 sm:py-24 overflow-hidden border-b border-slate-800/80">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-950/20 via-slate-950 to-[#030712]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-600/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center justify-center space-x-2 text-xs text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors">Beranda</a>
                <span>/</span>
                <span class="text-blue-400 font-medium">Kontak</span>
            </nav>

            <span data-aos="fade-down" data-aos-duration="600" class="inline-block px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-semibold uppercase tracking-wider">
                Layanan Informasi & Konsultasi
            </span>
            <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">
                Hubungi Kami
            </h1>
            <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="200" class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Punya pertanyaan seputar penerimaan siswa baru, kurikulum, atau kemitraan sekolah? Tim kami siap melayani Anda dengan ramah dan responsif.
            </p>
        </div>
    </section>

    <!-- MAIN CONTACT CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 space-y-16">

        <!-- SUCCESS ALERT NOTIFICATION -->
        @if(session('success'))
            <div id="alert-success" data-aos="fade-down" data-aos-duration="500" class="p-4 sm:p-5 rounded-2xl bg-emerald-950/80 border border-emerald-500/50 backdrop-blur-md flex items-center justify-between text-emerald-200 text-sm shadow-xl shadow-emerald-950/30">
                <div class="flex items-center space-x-3">
                    <span class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-base shrink-0">✓</span>
                    <div>
                        <strong class="font-bold text-white">Sukses Terkirim!</strong>
                        <p class="text-xs sm:text-sm text-emerald-300 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="document.getElementById('alert-success').remove()" class="text-emerald-400 hover:text-white text-lg font-bold p-1 transition-colors">✕</button>
            </div>
        @endif

        <!-- ERROR ALERT NOTIFICATION -->
@if ($errors->any())
    <div data-aos="fade-down" data-aos-duration="500" class="p-4 sm:p-5 rounded-2xl bg-rose-950/80 border border-rose-500/50 backdrop-blur-md text-rose-200 text-sm space-y-2 shadow-xl shadow-rose-950/30">
        <div class="flex items-center space-x-2 font-bold text-white">
            <span class="text-lg">⚠️</span>
            <span>Terdapat kesalahan pengisian formulir:</span>
        </div>
        <ul class="list-disc list-inside text-xs space-y-1 text-rose-300 pl-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!-- 2-COLUMN RESPONSIVE LAYOUT -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
            
            <!-- LEFT COLUMN: Contact Information & FAQ -->
            <div class="lg:col-span-5 space-y-8" data-aos="fade-right" data-aos-duration="800">
                
                <!-- Contact Channels -->
                <div class="space-y-3">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">Kanal Komunikasi</h2>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                        Anda dapat berkunjung langsung ke kampus kami atau menghubungi kami melalui nomor telepon dan email resmi di bawah ini.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
                    <!-- Alamat -->
                    <div class="glass-panel glass-panel-hover rounded-2xl p-5 flex items-start space-x-4 border border-slate-800 hover:border-slate-700 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-blue-600/20 border border-blue-500/30 text-blue-400 flex items-center justify-center text-2xl shrink-0">
                            📍
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-white text-sm">Alamat Kampus</h3>
                            <p class="text-slate-400 text-xs leading-relaxed">Jl. Pendidikan No. 45, Kompleks Edukasi Modern, Kota Sukses, Indonesia 12345</p>
                        </div>
                    </div>

                    <!-- WhatsApp / Hotline -->
                    <div class="glass-panel glass-panel-hover rounded-2xl p-5 flex items-start space-x-4 border border-slate-800 hover:border-slate-700 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-emerald-600/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-2xl shrink-0">
                            💬
                        </div>
                        <div class="space-y-1 flex-1">
                            <h3 class="font-bold text-white text-sm">WhatsApp & Hotline PPDB</h3>
                            <p class="text-slate-400 text-xs">+62 812-3456-7890 / (021) 7890-1234</p>
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Sekolah,%20saya%20ingin%20bertanya%20seputar%20pendaftaran%20PPDB." 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="inline-flex items-center space-x-1.5 text-xs text-emerald-400 font-semibold hover:text-emerald-300 pt-1 transition-colors">
                                <span>Chat WhatsApp Langsung</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="glass-panel glass-panel-hover rounded-2xl p-5 flex items-start space-x-4 border border-slate-800 hover:border-slate-700 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-indigo-600/20 border border-indigo-500/30 text-indigo-400 flex items-center justify-center text-2xl shrink-0">
                            ✉️
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-white text-sm">Email Resmi</h3>
                            <p class="text-slate-400 text-xs">info@sekolah.sch.id / ppdb@sekolah.sch.id</p>
                            <p class="text-slate-500 text-[11px]">Dibalas dalam 1x24 jam kerja</p>
                        </div>
                    </div>

                    <!-- Jam Kerja -->
                    <div class="glass-panel glass-panel-hover rounded-2xl p-5 flex items-start space-x-4 border border-slate-800 hover:border-slate-700 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-sky-600/20 border border-sky-500/30 text-sky-400 flex items-center justify-center text-2xl shrink-0">
                            🕒
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-white text-sm">Jam Operasional Layanan</h3>
                            <p class="text-slate-400 text-xs">Senin – Jumat: 07.30 – 16.00 WIB</p>
                            <p class="text-slate-400 text-xs">Sabtu: 08.00 – 13.00 WIB (Khusus PPDB)</p>
                        </div>
                    </div>
                </div>

                <!-- ACCORDION FAQ -->
                <div class="space-y-3 pt-4">
                    <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                        <span>Pertanyaan Umum (FAQ)</span>
                    </h3>

                    <div class="space-y-2.5">
                        <details class="group glass-panel rounded-2xl p-4 cursor-pointer border border-slate-800/80 hover:border-slate-700 transition-all">
                            <summary class="font-bold text-white text-xs sm:text-sm list-none flex items-center justify-between select-none">
                                <span>Bagaimana alur pendaftaran PPDB daring?</span>
                                <span class="group-open:rotate-180 transition-transform duration-300 text-blue-400">▾</span>
                            </summary>
                            <p class="text-xs text-slate-400 mt-3 leading-relaxed border-t border-slate-800/80 pt-3">
                                Calon siswa mengisi formulir online, mengunggah kartu keluarga, akta kelahiran, dan rapor semester 1-5, kemudian mengikuti tes seleksi potensi akademik.
                            </p>
                        </details>

                        <details class="group glass-panel rounded-2xl p-4 cursor-pointer border border-slate-800/80 hover:border-slate-700 transition-all">
                            <summary class="font-bold text-white text-xs sm:text-sm list-none flex items-center justify-between select-none">
                                <span>Apakah tersedia beasiswa untuk siswa berprestasi?</span>
                                <span class="group-open:rotate-180 transition-transform duration-300 text-blue-400">▾</span>
                            </summary>
                            <p class="text-xs text-slate-400 mt-3 leading-relaxed border-t border-slate-800/80 pt-3">
                                Ya! Kami menyediakan beasiswa penuh dan keringanan biaya SPP bagi siswa pemegang sertifikat juara minimal tingkat kota/kabupaten dan beasiswa afirmasi.
                            </p>
                        </details>

                        <details class="group glass-panel rounded-2xl p-4 cursor-pointer border border-slate-800/80 hover:border-slate-700 transition-all">
                            <summary class="font-bold text-white text-xs sm:text-sm list-none flex items-center justify-between select-none">
                                <span>Apakah orang tua diperbolehkan survei fasilitas?</span>
                                <span class="group-open:rotate-180 transition-transform duration-300 text-blue-400">▾</span>
                            </summary>
                            <p class="text-xs text-slate-400 mt-3 leading-relaxed border-t border-slate-800/80 pt-3">
                                Tentu saja. Orang tua calon siswa dapat berkunjung langsung setiap hari kerja pukul 08.00 - 15.00 WIB untuk campus tour bersama staf humas sekolah.
                            </p>
                        </details>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: PPDB Banner + Contact Form -->
            <div class="lg:col-span-7 space-y-6" data-aos="fade-left" data-aos-duration="800">

                <!-- PPDB REGISTRATION CARD -->
                <div class="glass-panel rounded-2xl p-5 sm:p-6 border border-emerald-500/30 bg-emerald-950/20 relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-emerald-500/5 rounded-full blur-[60px] pointer-events-none"></div>
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-start sm:items-center space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-2xl shrink-0">🎓</div>
                            <div>
                                <p class="text-xs font-bold text-emerald-400 uppercase tracking-wider">Daftar PPDB Sekarang</p>
                                <h3 class="text-base sm:text-lg font-extrabold text-white mt-0.5">Penerimaan Peserta Didik Baru</h3>
                                <p class="text-xs text-slate-400 mt-0.5">Isi formulir pendaftaran online dan data Anda langsung tercatat sebagai calon siswa.</p>
                            </div>
                        </div>
                        <a href="{{ route('ppdb.index') }}"
                           class="shrink-0 inline-flex items-center space-x-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold text-sm shadow-lg shadow-emerald-600/20 transition-all duration-300">
                            <span>Daftar Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- CONTACT FORM -->
                <div class="glass-panel rounded-3xl p-6 sm:p-10 border border-slate-700/80 shadow-2xl relative overflow-hidden">
                    <div class="space-y-2 pb-6 border-b border-slate-800">
                        <span class="px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-semibold uppercase tracking-wider">Formulir Pesan</span>
                        <h2 class="text-2xl font-bold text-white">Kirim Pesan atau Pertanyaan</h2>
                        <p class="text-xs sm:text-sm text-slate-400">Silakan lengkapi formulir di bawah ini. Tim kami akan segera menanggapi melalui email atau WhatsApp Anda.</p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 pt-6" id="contact-form">
                        @csrf

                        <!-- Row 1: Nama & Email -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Nama Lengkap <span class="text-rose-500">*</span></label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       placeholder="Nama Anda..." 
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('name') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-blue-500 focus:ring-blue-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                                @error('name')
                                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Alamat Email <span class="text-rose-500">*</span></label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       placeholder="email@contoh.com" 
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('email') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-blue-500 focus:ring-blue-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                                @error('email')
                                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 2: Subjek -->
                        <div class="space-y-2">
                            <label for="subject" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Perihal / Kategori Subjek <span class="text-rose-500">*</span></label>
                            <input type="text" 
                                   id="subject" 
                                   name="subject" 
                                   value="{{ old('subject') }}" 
                                   required 
                                   placeholder="Contoh: Info Syarat PPDB 2026 / Kerjasama Industri" 
                                   class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('subject') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-blue-500 focus:ring-blue-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                            @error('subject')
                                <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Row 3: Pesan -->
                        <div class="space-y-2">
                            <label for="message" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Isi Pesan / Pertanyaan <span class="text-rose-500">*</span></label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="5" 
                                      required 
                                      placeholder="Tuliskan pertanyaan atau informasi yang ingin Anda sampaikan secara lengkap..." 
                                      class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('message') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-blue-500 focus:ring-blue-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all resize-y">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" 
                                    id="submit-btn" 
                                    class="w-full py-4 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-sm shadow-xl shadow-blue-600/30 transition-all duration-300 flex items-center justify-center space-x-2">
                                <span>Kirimkan Pesan Sekarang</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>

                        <p class="text-[11px] text-slate-500 text-center">
                            Kami menghargai privasi Anda. Data Anda aman dan hanya digunakan untuk keperluan komunikasi layanan sekolah.
                        </p>
                    </form>
                </div>
            </div>

        </div>

        <!-- GOOGLE MAPS EMBED OR LOCATION CONTAINER -->
        <section data-aos="fade-up" data-aos-duration="800" class="glass-panel rounded-3xl overflow-hidden border border-slate-800 space-y-4">
            <div class="p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-4 border-b border-slate-800">
                <div class="space-y-1 text-center sm:text-left">
                    <h3 class="text-lg font-bold text-white">Peta Lokasi Kampus Sekolah</h3>
                    <p class="text-xs text-slate-400">Lokasi strategis yang mudah diakses dengan transportasi umum maupun kendaraan pribadi</p>
                </div>
                <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer" class="px-5 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-blue-400 border border-slate-700 text-xs font-semibold transition-colors">
                    Buka di Google Maps ↗
                </a>
            </div>

            <!-- Stylized Maps Preview -->
            <div class="relative h-64 sm:h-80 w-full bg-slate-900 overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28509893945!2d106.759478!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e49fe3ddb3%3A0x7d87f7394b9f0290!2sJakarta!5e0!3m2!1sid!2sid!4v1680000000000!5m2!1sid!2sid" 
                        class="w-full h-full border-0 filter grayscale invert contrast-125 opacity-80" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>

    </main>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contact-form');
        const submitBtn = document.getElementById('submit-btn');

        if (form && submitBtn) {
            form.addEventListener('submit', () => {
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Mengirimkan Pesan...</span>
                `;
            });
        }
    });
</script>
@endpush