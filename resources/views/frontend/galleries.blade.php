@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

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
                <span class="text-blue-400 font-medium">Galeri</span>
            </nav>

            <span data-aos="fade-down" data-aos-duration="600" class="inline-block px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-semibold uppercase tracking-wider">
                Dokumentasi & Arsip
            </span>
            <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">
                Galeri Aktivitas Sekolah
            </h1>
            <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="200" class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Merekam jejak langkah, dinamika pembelajaran, serta momen berharga siswa dalam berkarya dan meraih prestasi membanggakan.
            </p>
        </div>
    </section>

    <!-- MAIN GALLERY CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 space-y-12">

        <!-- GALLERY FILTER BUTTONS -->
        <div data-aos="fade-up" data-aos-duration="600" class="flex flex-wrap items-center justify-center gap-2 sm:gap-3">
            <button onclick="filterGallery('all')" class="gallery-filter-btn active px-5 py-2 rounded-full text-xs font-semibold bg-blue-600 text-white transition-all shadow-lg shadow-blue-600/30">
                Semua Koleksi
            </button>
            <button onclick="filterGallery('akademik')" class="gallery-filter-btn px-5 py-2 rounded-full text-xs font-semibold bg-slate-900 text-slate-400 hover:text-white hover:bg-slate-800 border border-slate-800 transition-all">
                Pembelajaran & Lab
            </button>
            <button onclick="filterGallery('prestasi')" class="gallery-filter-btn px-5 py-2 rounded-full text-xs font-semibold bg-slate-900 text-slate-400 hover:text-white hover:bg-slate-800 border border-slate-800 transition-all">
                Prestasi & Lomba
            </button>
            <button onclick="filterGallery('kegiatan')" class="gallery-filter-btn px-5 py-2 rounded-full text-xs font-semibold bg-slate-900 text-slate-400 hover:text-white hover:bg-slate-800 border border-slate-800 transition-all">
                Upacara & Seni
            </button>
        </div>

        @php
            // Sample fallback photos if galleries table has limited entries
            $curatedGallery = [
                ['title' => 'Upacara Peringatan Hari Kemerdekaan', 'category' => 'kegiatan', 'img' => 'https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=1000&auto=format&fit=crop'],
                ['title' => 'Kegiatan Praktikum di Laboratorium Komputer', 'category' => 'akademik', 'img' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1000&auto=format&fit=crop'],
                ['title' => 'Juara 1 Turnamen Olahraga Antar Sekolah', 'category' => 'prestasi', 'img' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=1000&auto=format&fit=crop'],
                ['title' => 'Pentas Seni & Budaya Nusantara Tahunan', 'category' => 'kegiatan', 'img' => 'https://images.unsplash.com/photo-1465847899084-d164df4dedc6?q=80&w=1000&auto=format&fit=crop'],
                ['title' => 'Diskusi Belajar Kelompok Siswa di Perpustakaan', 'category' => 'akademik', 'img' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1000&auto=format&fit=crop'],
                ['title' => 'Pameran Karya Inovasi Teknologi Siswa', 'category' => 'prestasi', 'img' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=1000&auto=format&fit=crop'],
            ];
        @endphp

        <!-- RESPONSIVE GALLERY GRID -->
        <div id="gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @if(isset($galleries) && count($galleries) > 0)
                @foreach($galleries as $index => $item)
                    @php
                        $imgSrc = Str::startsWith($item->file_path, ['http://', 'https://']) ? $item->file_path : asset('storage/' . $item->file_path);
                        $cat = 'kegiatan';
                        if (stripos($item->title, 'Lab') !== false || stripos($item->title, 'Komputer') !== false || stripos($item->title, 'Belajar') !== false) {
                            $cat = 'akademik';
                        } elseif (stripos($item->title, 'Juara') !== false || stripos($item->title, 'Lomba') !== false || stripos($item->title, 'Prestasi') !== false) {
                            $cat = 'prestasi';
                        }
                    @endphp

                    <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ ($index % 3) * 100 }}"
                         data-category="{{ $cat }}" 
                         class="gallery-item glass-panel glass-panel-hover rounded-2xl overflow-hidden group cursor-pointer"
                         onclick="openLightbox('{{ $imgSrc }}', '{{ addslashes($item->title) }}', '{{ ucfirst($item->type) }}')">
                        
                        <div class="relative h-60 sm:h-64 overflow-hidden bg-slate-900">
                            <img src="{{ $imgSrc }}" 
                                 alt="{{ $item->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out" 
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></div>
                            
                            <span class="absolute top-3.5 left-3.5 px-2.5 py-1 rounded-full bg-slate-950/80 backdrop-blur-md border border-slate-700/80 text-blue-400 text-[10px] font-bold uppercase tracking-wider">
                                {{ $item->type ?? 'Foto' }}
                            </span>

                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="w-12 h-12 rounded-full bg-blue-600/90 text-white flex items-center justify-center shadow-xl transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </span>
                            </div>
                        </div>

                        <div class="p-4 sm:p-5">
                            <h3 class="font-bold text-white text-sm sm:text-base group-hover:text-blue-400 transition leading-snug line-clamp-2">
                                {{ $item->title }}
                            </h3>
                            <p class="text-slate-400 text-xs mt-1">Klik untuk memperbesar foto</p>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($curatedGallery as $index => $item)
                    <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ ($index % 3) * 100 }}"
                         data-category="{{ $item['category'] }}" 
                         class="gallery-item glass-panel glass-panel-hover rounded-2xl overflow-hidden group cursor-pointer"
                         onclick="openLightbox('{{ $item['img'] }}', '{{ addslashes($item['title']) }}', 'Foto')">
                        
                        <div class="relative h-60 sm:h-64 overflow-hidden bg-slate-900">
                            <img src="{{ $item['img'] }}" 
                                 alt="{{ $item['title'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out" 
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></div>
                            
                            <span class="absolute top-3.5 left-3.5 px-2.5 py-1 rounded-full bg-slate-950/80 backdrop-blur-md border border-slate-700/80 text-blue-400 text-[10px] font-bold uppercase tracking-wider">
                                Dokumentasi
                            </span>

                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="w-12 h-12 rounded-full bg-blue-600/90 text-white flex items-center justify-center shadow-xl transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </span>
                            </div>
                        </div>

                        <div class="p-4 sm:p-5">
                            <h3 class="font-bold text-white text-sm sm:text-base group-hover:text-blue-400 transition leading-snug line-clamp-2">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-slate-400 text-xs mt-1">Klik untuk memperbesar foto</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </main>

    <!-- SMOOTH FULLSCREEN LIGHTBOX MODAL -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/90 backdrop-blur-xl transition-opacity duration-300 opacity-0 pointer-events-none">
        <button onclick="closeLightbox()" aria-label="Tutup" class="absolute top-6 right-6 w-12 h-12 rounded-full bg-slate-900/90 hover:bg-slate-800 text-white flex items-center justify-center border border-slate-700 focus:outline-none transition z-50 shadow-2xl">
            ✕
        </button>

        <div id="lightbox-box" class="max-w-5xl w-full transform scale-95 transition-all duration-300 flex flex-col items-center">
            <div class="relative w-full max-h-[75vh] flex items-center justify-center overflow-hidden rounded-2xl border border-slate-800 bg-black/60 shadow-2xl">
                <img id="lightbox-img" src="" alt="" class="max-h-[75vh] w-auto object-contain">
            </div>
            <div class="mt-4 text-center space-y-1">
                <span id="lightbox-badge" class="inline-block px-3 py-0.5 rounded-full bg-blue-500/20 text-blue-400 text-xs font-semibold"></span>
                <h4 id="lightbox-caption" class="text-lg sm:text-xl font-bold text-white"></h4>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Smooth Category Filtering
    function filterGallery(category) {
        const buttons = document.querySelectorAll('.gallery-filter-btn');
        const items = document.querySelectorAll('.gallery-item');

        buttons.forEach(btn => {
            btn.classList.remove('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-600/30');
            btn.classList.add('bg-slate-900', 'text-slate-400', 'border', 'border-slate-800');
        });
        event.target.classList.remove('bg-slate-900', 'text-slate-400', 'border', 'border-slate-800');
        event.target.classList.add('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-600/30');

        items.forEach(item => {
            const itemCat = item.getAttribute('data-category');
            if (category === 'all' || itemCat === category) {
                item.style.display = 'block';
                setTimeout(() => item.style.opacity = '1', 10);
            } else {
                item.style.opacity = '0';
                setTimeout(() => item.style.display = 'none', 200);
            }
        });
    }

    // Lightbox Controls
    const lightbox = document.getElementById('lightbox-modal');
    const lightboxBox = document.getElementById('lightbox-box');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxBadge = document.getElementById('lightbox-badge');

    function openLightbox(src, title, type) {
        lightboxImg.src = src;
        lightboxImg.alt = title;
        lightboxCaption.textContent = title;
        lightboxBadge.textContent = type || 'Dokumentasi';

        lightbox.classList.remove('hidden', 'pointer-events-none', 'opacity-0');
        lightbox.classList.add('opacity-100');
        setTimeout(() => {
            lightboxBox.classList.remove('scale-95');
            lightboxBox.classList.add('scale-100');
        }, 10);
    }

    function closeLightbox() {
        lightboxBox.classList.remove('scale-100');
        lightboxBox.classList.add('scale-95');
        lightbox.classList.remove('opacity-100');
        lightbox.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            lightbox.classList.add('hidden');
        }, 300);
    }

    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox || e.target.id === 'lightbox-box') closeLightbox();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) {
                closeLightbox();
            }
        });
    }
</script>
@endpush