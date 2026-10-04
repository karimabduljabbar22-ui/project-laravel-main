@extends('layouts.app')

@section('title', 'Pendaftaran PPDB Berhasil')

@section('content')

    <section class="relative min-h-[75vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/25 via-slate-950 to-[#030712]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-emerald-600/8 rounded-full blur-[130px] pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl mx-auto px-4 sm:px-6 py-20 text-center space-y-8">

            <!-- Success Icon -->
            <div data-aos="zoom-in" data-aos-duration="600" class="flex justify-center">
                <div class="w-24 h-24 rounded-full bg-emerald-500/15 border-2 border-emerald-500/40 flex items-center justify-center text-5xl shadow-2xl shadow-emerald-500/10">
                    🎉
                </div>
            </div>

            <!-- Title & Message -->
            <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="150" class="space-y-3">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">Pendaftaran Berhasil!</h1>
                <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                    Data pendaftaran PPDB Anda telah berhasil tercatat dan akan segera diproses oleh panitia. Silakan simpan nomor pendaftaran Anda.
                </p>
            </div>

            <!-- Registration Number Card -->
            @if($registrationNumber)
            <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="250" class="glass-panel rounded-2xl p-6 border border-emerald-500/30 space-y-2 shadow-xl shadow-emerald-950/30">
                <p class="text-xs text-slate-400 uppercase tracking-wider font-semibold">Nomor Pendaftaran Anda</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-emerald-400 tracking-widest font-mono">{{ $registrationNumber }}</p>
                <p class="text-xs text-slate-500">Simpan nomor ini untuk mengecek status pendaftaran Anda</p>
            </div>
            @endif

            <!-- Next Steps Info -->
            <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="350" class="glass-panel rounded-2xl p-5 border border-slate-800 text-left space-y-3">
                <h3 class="text-sm font-bold text-white">Langkah Selanjutnya:</h3>
                <ul class="space-y-2.5">
                    @foreach([
                        'Panitia PPDB akan memverifikasi data Anda dalam 1-3 hari kerja.',
                        'Anda akan dihubungi melalui nomor HP yang telah didaftarkan.',
                        'Pantau pengumuman resmi di website atau media sosial sekolah.',
                        'Siapkan dokumen asli untuk verifikasi lanjutan jika diminta.',
                    ] as $i => $step)
                        <li class="flex items-start space-x-3">
                            <span class="w-5 h-5 rounded-full bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">{{ $i + 1 }}</span>
                            <span class="text-xs text-slate-400 leading-relaxed">{{ $step }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Action Buttons -->
            <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="400" class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('home') }}"
                   class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm shadow-lg shadow-emerald-600/20 transition-all">
                    Kembali ke Beranda
                </a>
                <a href="{{ route('contact') }}"
                   class="px-6 py-3 rounded-xl border border-slate-700 hover:border-slate-600 text-slate-300 hover:text-white font-semibold text-sm transition-all">
                    Hubungi Sekolah
                </a>
            </div>
        </div>
    </section>

@endsection
