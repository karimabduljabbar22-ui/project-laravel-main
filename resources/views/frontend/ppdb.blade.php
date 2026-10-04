@extends('layouts.app')

@section('title', 'Pendaftaran PPDB – Penerimaan Peserta Didik Baru')

@section('content')

    <!-- INNER PAGE HEADER -->
    <section class="relative py-16 sm:py-24 overflow-hidden border-b border-slate-800/80">
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/20 via-slate-950 to-[#030712]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-emerald-600/8 rounded-full blur-[130px] pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">

            <!-- Breadcrumbs -->
            <nav class="flex items-center justify-center space-x-2 text-xs text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-emerald-400 transition-colors">Beranda</a>
                <span>/</span>
                <span class="text-emerald-400 font-medium">Pendaftaran PPDB</span>
            </nav>

            <span data-aos="fade-down" data-aos-duration="600" class="inline-block px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-semibold uppercase tracking-wider">
                Penerimaan Peserta Didik Baru
            </span>
            <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">
                Formulir Pendaftaran PPDB
            </h1>
            <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="200" class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Lengkapi formulir pendaftaran di bawah ini dengan data yang benar dan valid. Data Anda akan langsung tercatat sebagai calon peserta didik baru.
            </p>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 space-y-10">

        <!-- WAVE STATUS INFO -->
        @if($activeWave)
            <div data-aos="fade-up" data-aos-duration="600" class="p-5 rounded-2xl bg-emerald-950/60 border border-emerald-500/40 backdrop-blur-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <span class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl shrink-0">🟢</span>
                    <div>
                        <p class="text-sm font-bold text-white">{{ $activeWave->name }} — Sedang Dibuka</p>
                        <p class="text-xs text-emerald-300 mt-0.5">
                            Periode: {{ $activeWave->start_date->format('d M Y') }} s/d {{ $activeWave->end_date->format('d M Y') }}
                            &nbsp;·&nbsp; Kuota: <strong>{{ $activeWave->quota }} siswa</strong>
                        </p>
                    </div>
                </div>
                <span class="px-3 py-1.5 rounded-full bg-emerald-500/20 border border-emerald-500/30 text-emerald-300 text-xs font-bold uppercase">Gelombang Aktif</span>
            </div>
        @else
            <div data-aos="fade-up" data-aos-duration="600" class="p-5 rounded-2xl bg-rose-950/60 border border-rose-500/40 backdrop-blur-md flex items-center space-x-3">
                <span class="w-10 h-10 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center text-xl shrink-0">🔴</span>
                <div>
                    <p class="text-sm font-bold text-white">Pendaftaran Belum Dibuka / Sudah Ditutup</p>
                    <p class="text-xs text-rose-300 mt-0.5">Saat ini belum ada gelombang PPDB yang aktif. Silakan cek kembali nanti atau hubungi sekolah.</p>
                </div>
            </div>
        @endif

        <!-- ALERT: SUCCESS -->
        @if(session('success'))
            <div id="alert-success" data-aos="fade-down" data-aos-duration="500" class="p-4 sm:p-5 rounded-2xl bg-emerald-950/80 border border-emerald-500/50 backdrop-blur-md flex items-center justify-between text-emerald-200 text-sm shadow-xl">
                <div class="flex items-center space-x-3">
                    <span class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-base shrink-0">✓</span>
                    <div>
                        <strong class="font-bold text-white">Pendaftaran Berhasil!</strong>
                        <p class="text-xs sm:text-sm text-emerald-300 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="document.getElementById('alert-success').remove()" class="text-emerald-400 hover:text-white text-lg font-bold p-1 transition-colors">✕</button>
            </div>
        @endif

        <!-- ALERT: ERRORS -->
        @if ($errors->any())
            <div data-aos="fade-down" data-aos-duration="500" class="p-4 sm:p-5 rounded-2xl bg-rose-950/80 border border-rose-500/50 backdrop-blur-md text-rose-200 text-sm space-y-2 shadow-xl">
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

        <!-- REGISTRATION FORM -->
        <div data-aos="fade-up" data-aos-duration="800">
            <div class="glass-panel rounded-3xl p-6 sm:p-10 border border-slate-700/80 shadow-2xl relative overflow-hidden">

                <!-- Decorative glow -->
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-emerald-600/5 rounded-full blur-[80px] pointer-events-none"></div>

                <!-- Form Header -->
                <div class="space-y-2 pb-6 border-b border-slate-800">
                    <span class="px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold uppercase tracking-wider">Formulir PPDB</span>
                    <h2 class="text-2xl font-bold text-white">Data Calon Peserta Didik Baru</h2>
                    <p class="text-xs sm:text-sm text-slate-400">Isi semua kolom yang ditandai <span class="text-rose-400 font-bold">*</span> dengan benar dan lengkap.</p>
                </div>

                @if(!$activeWave)
                    <div class="pt-8 text-center space-y-3">
                        <p class="text-4xl">🔒</p>
                        <p class="text-slate-400 text-sm">Formulir pendaftaran tidak tersedia karena tidak ada gelombang PPDB yang aktif saat ini.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm transition-colors">
                            <span>Hubungi Sekolah</span>
                        </a>
                    </div>
                @else

                <form action="{{ route('ppdb.store') }}" method="POST" class="space-y-8 pt-6" id="ppdb-form">
                    @csrf
                    <input type="hidden" name="wave_id" value="{{ $activeWave->id }}">

                    <!-- SECTION: Data Pribadi Calon Siswa -->
                    <div class="space-y-5">
                        <div class="flex items-center space-x-3 pb-3 border-b border-slate-800/80">
                            <span class="w-8 h-8 rounded-lg bg-blue-500/15 border border-blue-500/25 text-blue-400 flex items-center justify-center text-sm font-bold">1</span>
                            <h3 class="text-base font-bold text-white">Data Pribadi Calon Siswa</h3>
                        </div>

                        <!-- Nama Lengkap & Gender -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label for="full_name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Nama Lengkap <span class="text-rose-500">*</span></label>
                                <input type="text"
                                       id="full_name"
                                       name="full_name"
                                       value="{{ old('full_name') }}"
                                       required
                                       placeholder="Nama lengkap sesuai akta..."
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('full_name') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                                @error('full_name')
                                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="gender" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Jenis Kelamin <span class="text-rose-500">*</span></label>
                                <select id="gender"
                                        name="gender"
                                        required
                                        class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('gender') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 @enderror text-white text-sm focus:outline-none focus:ring-2 transition-all">
                                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>-- Pilih --</option>
                                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- NISN & NIK -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label for="nisn" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">NISN</label>
                                <input type="text"
                                       id="nisn"
                                       name="nisn"
                                       value="{{ old('nisn') }}"
                                       maxlength="20"
                                       placeholder="Nomor Induk Siswa Nasional"
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                            </div>
                            <div class="space-y-2">
                                <label for="nik" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">NIK</label>
                                <input type="text"
                                       id="nik"
                                       name="nik"
                                       value="{{ old('nik') }}"
                                       maxlength="20"
                                       placeholder="Nomor Induk Kependudukan"
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                            </div>
                        </div>

                        <!-- Tempat & Tanggal Lahir -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label for="birth_place" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Tempat Lahir</label>
                                <input type="text"
                                       id="birth_place"
                                       name="birth_place"
                                       value="{{ old('birth_place') }}"
                                       placeholder="Kota tempat lahir..."
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                            </div>
                            <div class="space-y-2">
                                <label for="birth_date" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Tanggal Lahir</label>
                                <input type="date"
                                       id="birth_date"
                                       name="birth_date"
                                       value="{{ old('birth_date') }}"
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                            </div>
                        </div>

                        <!-- Agama & Jurusan -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label for="religion" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Agama</label>
                                <select id="religion"
                                        name="religion"
                                        class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white text-sm focus:outline-none focus:ring-2 transition-all">
                                    <option value="">-- Pilih Agama --</option>
                                    @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                                        <option value="{{ $agama }}" {{ old('religion') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($majors->count() > 0)
                            <div class="space-y-2">
                                <label for="major_id" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Pilihan Jurusan / Program Keahlian</label>
                                <select id="major_id"
                                        name="major_id"
                                        class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white text-sm focus:outline-none focus:ring-2 transition-all">
                                    <option value="">-- Pilih Jurusan --</option>
                                    @foreach($majors as $major)
                                        <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                            {{ $major->name }}{{ $major->code ? ' ('.$major->code.')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>

                        <!-- Alamat -->
                        <div class="space-y-2">
                            <label for="address" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Alamat Lengkap</label>
                            <textarea id="address"
                                      name="address"
                                      rows="3"
                                      placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten, Provinsi..."
                                      class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all resize-y">{{ old('address') }}</textarea>
                        </div>

                        <!-- No HP & Email -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label for="phone" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">No. HP / WhatsApp Siswa <span class="text-rose-500">*</span></label>
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       required
                                       placeholder="08xxxxxxxxxx"
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('phone') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                                @error('phone')
                                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Email (opsional)</label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="email@contoh.com"
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                            </div>
                        </div>

                        <!-- Asal Sekolah -->
                        <div class="space-y-2">
                            <label for="origin_school" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Asal Sekolah <span class="text-rose-500">*</span></label>
                            <input type="text"
                                   id="origin_school"
                                   name="origin_school"
                                   value="{{ old('origin_school') }}"
                                   required
                                   placeholder="Contoh: SMP Negeri 1 Jakarta..."
                                   class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('origin_school') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                            @error('origin_school')
                                <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- SECTION: Data Orang Tua / Wali -->
                    <div class="space-y-5">
                        <div class="flex items-center space-x-3 pb-3 border-b border-slate-800/80">
                            <span class="w-8 h-8 rounded-lg bg-purple-500/15 border border-purple-500/25 text-purple-400 flex items-center justify-center text-sm font-bold">2</span>
                            <h3 class="text-base font-bold text-white">Data Orang Tua / Wali</h3>
                        </div>

                        <!-- Nama & HP Orang Tua -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label for="parent_name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Nama Orang Tua / Wali <span class="text-rose-500">*</span></label>
                                <input type="text"
                                       id="parent_name"
                                       name="parent_name"
                                       value="{{ old('parent_name') }}"
                                       required
                                       placeholder="Nama lengkap orang tua/wali..."
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('parent_name') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                                @error('parent_name')
                                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="parent_phone" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">No. HP Orang Tua / Wali <span class="text-rose-500">*</span></label>
                                <input type="tel"
                                       id="parent_phone"
                                       name="parent_phone"
                                       value="{{ old('parent_phone') }}"
                                       required
                                       placeholder="08xxxxxxxxxx"
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border @error('parent_phone') border-rose-500 focus:ring-rose-500/20 @else border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 @enderror text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                                @error('parent_phone')
                                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Pekerjaan Orang Tua -->
                        <div class="space-y-2">
                            <label for="parent_job" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Pekerjaan Orang Tua / Wali</label>
                            <input type="text"
                                   id="parent_job"
                                   name="parent_job"
                                   value="{{ old('parent_job') }}"
                                   placeholder="Contoh: Guru, Wirausaha, PNS..."
                                   class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700 focus:border-emerald-500 focus:ring-emerald-500/20 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 transition-all">
                        </div>
                    </div>

                    <!-- PERNYATAAN & SUBMIT -->
                    <div class="pt-4 border-t border-slate-800/80 space-y-5">
                        <label class="flex items-start space-x-3 cursor-pointer group">
                            <input type="checkbox" required id="agree_terms" class="mt-0.5 w-4 h-4 rounded border-slate-600 bg-slate-800 text-emerald-500 focus:ring-emerald-500 focus:ring-offset-slate-900 shrink-0">
                            <span class="text-xs text-slate-400 leading-relaxed">
                                Saya menyatakan bahwa semua data yang saya isi di atas adalah <strong class="text-white">benar dan dapat dipertanggungjawabkan</strong>. Saya bersedia menerima sanksi apabila data yang diberikan tidak sesuai dengan kondisi sebenarnya.
                            </span>
                        </label>

                        <button type="submit"
                                id="ppdb-submit-btn"
                                class="w-full py-4 rounded-xl bg-gradient-to-r from-emerald-600 via-emerald-500 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold text-sm shadow-xl shadow-emerald-600/25 transition-all duration-300 flex items-center justify-center space-x-2">
                            <span>Daftarkan Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </button>

                        <p class="text-[11px] text-slate-500 text-center">
                            Data Anda aman dan hanya digunakan untuk keperluan seleksi PPDB. Anda akan mendapatkan nomor pendaftaran setelah form berhasil dikirim.
                        </p>
                    </div>
                </form>

                @endif
            </div>
        </div>

        <!-- INFO SECTION -->
        <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            @foreach([
                ['icon' => '📋', 'color' => 'blue', 'title' => 'Isi Formulir', 'desc' => 'Lengkapi semua data diri dan orang tua dengan benar sesuai dokumen resmi.'],
                ['icon' => '✅', 'color' => 'emerald', 'title' => 'Verifikasi Admin', 'desc' => 'Panitia PPDB akan memverifikasi data dan dokumen yang Anda lampirkan.'],
                ['icon' => '🎉', 'color' => 'amber', 'title' => 'Pengumuman', 'desc' => 'Hasil seleksi akan diumumkan sesuai jadwal gelombang pendaftaran yang aktif.'],
            ] as $step)
                <div class="glass-panel rounded-2xl p-5 border border-slate-800 flex items-start space-x-4">
                    <div class="w-11 h-11 rounded-xl bg-{{ $step['color'] }}-600/15 border border-{{ $step['color'] }}-500/25 text-2xl flex items-center justify-center shrink-0">
                        {{ $step['icon'] }}
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">{{ $step['title'] }}</h4>
                        <p class="text-xs text-slate-400 mt-1 leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- LINK: Punya pertanyaan? -->
        <div data-aos="fade-up" class="text-center space-y-2">
            <p class="text-sm text-slate-400">Punya pertanyaan seputar PPDB?</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center space-x-2 text-emerald-400 hover:text-emerald-300 font-semibold text-sm transition-colors">
                <span>Kirim pesan ke kami</span>
                <span>→</span>
            </a>
        </div>

    </main>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('ppdb-form');
        const submitBtn = document.getElementById('ppdb-submit-btn');

        if (form && submitBtn) {
            form.addEventListener('submit', () => {
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Mendaftarkan...</span>
                `;
            });
        }
    });
</script>
@endpush
