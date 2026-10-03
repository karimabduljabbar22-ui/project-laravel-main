@extends('layouts.app')

@section('title', 'Fasilitas Sekolah')

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
                <span class="text-blue-400 font-medium">Fasilitas</span>
            </nav>

            <span data-aos="fade-down" data-aos-duration="600" class="inline-block px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-semibold uppercase tracking-wider">
                Sarana & Prasarana
            </span>
            <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">
                Fasilitas Unggulan Sekolah
            </h1>
            <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="200" class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Didukung sarana prasarana modern, aman, dan berstandar nasional untuk menjamin kenyamanan serta efektivitas proses pembelajaran setiap siswa.
            </p>
        </div>
    </section>

    <!-- MAIN FACILITIES CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 space-y-16">

        <!-- HIGHLIGHT STATS -->
        <section data-aos="fade-up" data-aos-duration="700" class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <div class="glass-panel p-5 rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-3xl font-black text-blue-400">100% AC</div>
                <p class="text-xs text-slate-400">Seluruh Ruang Kelas & Lab</p>
            </div>
            <div class="glass-panel p-5 rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-3xl font-black text-indigo-400">1 Gbps</div>
                <p class="text-xs text-slate-400">Akses Internet Fiber Optik</p>
            </div>
            <div class="glass-panel p-5 rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-3xl font-black text-sky-400">24 Jam</div>
                <p class="text-xs text-slate-400">CCTV & Keamanan Terpadu</p>
            </div>
            <div class="glass-panel p-5 rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-3xl font-black text-emerald-400">SNI</div>
                <p class="text-xs text-slate-400">Standar Kelayakan Nasional</p>
            </div>
        </section>

        <!-- FACILITIES GRID -->
        <section class="space-y-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 border-b border-slate-800 pb-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Daftar Sarana Prasarana</h2>
                    <p class="text-slate-400 text-xs sm:text-sm mt-0.5">Eksplorasi ruang belajar dan sarana penunjang kegiatan siswa</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold border border-blue-500/30">
                    {{ count($fasilitas ?? []) }} Fasilitas Utama
                </span>
            </div>

            @php
                // Image mapper fallback for demo high-res aesthetics
                $defaultImages = [
                    'Laboratorium Komputer' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop',
                    'Perpustakaan' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=1200&auto=format&fit=crop',
                    'Olahraga' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=1200&auto=format&fit=crop',
                    'IPA' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=1200&auto=format&fit=crop',
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @forelse($fasilitas as $index => $item)
                    @php
                        // Cari gambar yang cocok
                        $imageUrl = 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1200&auto=format&fit=crop';
                        if ($item->image) {
                            $imageUrl = Str::startsWith($item->image, ['http://', 'https://']) ? $item->image : asset('storage/' . $item->image);
                        } else {
                            foreach ($defaultImages as $key => $val) {
                                if (stripos($item->name, $key) !== false) {
                                    $imageUrl = $val;
                                    break;
                                }
                            }
                        }
                    @endphp

                    <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ ($index % 2) * 150 }}" 
                         class="glass-panel glass-panel-hover rounded-3xl overflow-hidden group flex flex-col justify-between">
                        
                        <!-- Facility Image Container -->
                        <div class="relative h-64 sm:h-72 overflow-hidden bg-slate-900 cursor-pointer" onclick="openFacilityModal('{{ addslashes($item->name) }}', '{{ $imageUrl }}', '{{ addslashes($item->description) }}')">
                            <img src="{{ $imageUrl }}" 
                                 alt="{{ $item->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" 
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-slate-950/80 backdrop-blur-md border border-slate-700/80 text-blue-400 text-xs font-semibold">
                                Fasilitas #{{ $index + 1 }}
                            </span>

                            <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="px-3 py-1.5 rounded-full bg-blue-600/90 text-white text-xs font-semibold backdrop-blur-md flex items-center space-x-1 shadow-lg">
                                    <span>🔍 Perbesar</span>
                                </span>
                            </div>
                        </div>

                        <!-- Facility Content -->
                        <div class="p-6 sm:p-8 space-y-4 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-blue-400 transition leading-snug">
                                    {{ $item->name }}
                                </h3>
                                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                                    {{ $item->description ?? 'Fasilitas dirancang untuk memberikan pengalaman belajar terbaik dengan peralatan modern yang terawat.' }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                                <span class="flex items-center space-x-1.5 text-emerald-400">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                    <span>Siap Digunakan Siswa</span>
                                </span>
                                <button onclick="openFacilityModal('{{ addslashes($item->name) }}', '{{ $imageUrl }}', '{{ addslashes($item->description) }}')" class="text-blue-400 hover:text-blue-300 font-semibold focus:outline-none">
                                    Detail Fasilitas →
                                </button>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full glass-panel rounded-2xl p-12 text-center text-slate-500">
                        Belum ada fasilitas yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </section>

        <!-- CAMPUS VISIT INVITATION -->
        <section data-aos="fade-up" data-aos-duration="800" class="glass-panel rounded-3xl p-8 sm:p-12 text-center bg-gradient-to-r from-blue-950/40 via-slate-900 to-indigo-950/40 border border-blue-500/30 relative overflow-hidden">
            <div class="max-w-2xl mx-auto space-y-5">
                <span class="text-3xl">🏫</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white">Ingin Melihat Fasilitas Secara Langsung?</h3>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                    Kami menyambut kunjungan orang tua dan calon siswa baru setiap hari kerja (Senin - Jumat, pukul 08.00 - 15.00 WIB). Tim kami siap memandu Anda berkeliling kampus sekolah.
                </p>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center space-x-2 px-8 py-3.5 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm shadow-xl shadow-blue-600/30 glow-hover transition-all">
                        <span>Jadwalkan Kunjungan / Hubungi Kami</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- LIGHTBOX / FACILITY DETAIL MODAL (Smooth Glassmorphism Dialog) -->
    <div id="facility-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300 opacity-0 pointer-events-none">
        <div id="facility-modal-box" class="glass-panel bg-slate-900/95 border border-slate-700/80 rounded-3xl max-w-3xl w-full overflow-hidden shadow-2xl transform scale-95 transition-all duration-300">
            <div class="relative h-72 sm:h-96 bg-black">
                <img id="modal-img" src="" alt="" class="w-full h-full object-cover">
                <button onclick="closeFacilityModal()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-slate-950/80 hover:bg-slate-900 text-white flex items-center justify-center border border-slate-700 focus:outline-none transition">
                    ✕
                </button>
            </div>
            <div class="p-6 sm:p-8 space-y-3">
                <h3 id="modal-title" class="text-2xl font-extrabold text-white"></h3>
                <p id="modal-desc" class="text-slate-300 text-sm leading-relaxed"></p>
                <div class="pt-4 flex justify-end">
                    <button onclick="closeFacilityModal()" class="px-6 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold transition">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    const modal = document.getElementById('facility-modal');
    const modalBox = document.getElementById('facility-modal-box');
    const modalImg = document.getElementById('modal-img');
    const modalTitle = document.getElementById('modal-title');
    const modalDesc = document.getElementById('modal-desc');

    function openFacilityModal(title, image, desc) {
        modalTitle.textContent = title;
        modalImg.src = image;
        modalImg.alt = title;
        modalDesc.textContent = desc;

        modal.classList.remove('hidden', 'pointer-events-none', 'opacity-0');
        modal.classList.add('opacity-100');
        setTimeout(() => {
            modalBox.classList.remove('scale-95');
            modalBox.classList.add('scale-100');
        }, 10);
    }

    function closeFacilityModal() {
        modalBox.classList.remove('scale-100');
        modalBox.classList.add('scale-95');
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Tutup modal saat klik luar atau tombol ESC
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeFacilityModal();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeFacilityModal();
            }
        });
    }
</script>
@endpush