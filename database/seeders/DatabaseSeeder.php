<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\Major;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Facility;
use App\Models\GalleryAlbum;
use App\Models\Gallery;
use App\Models\Extracurricular;
use App\Models\Achievement;
use App\Models\Download;
use App\Models\PpdbWave;
use App\Models\PpdbApplicant;
use App\Models\Contact;
use App\Models\ActivityLog;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Pengguna (Users & Roles)
        $superAdmin = User::updateOrCreate(
            ['email' => 'admin@sekolah.sch.id'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'super_admin',
                'is_active' => true,
                'phone' => '081234567890',
            ]
        );

        $ppdbOperator = User::updateOrCreate(
            ['email' => 'ppdb@sekolah.sch.id'],
            [
                'name' => 'Operator PPDB',
                'password' => Hash::make('operator123'),
                'role' => 'operator_ppdb',
                'is_active' => true,
                'phone' => '081234567891',
            ]
        );

        $contentEditor = User::updateOrCreate(
            ['email' => 'editor@sekolah.sch.id'],
            [
                'name' => 'Editor Konten',
                'password' => Hash::make('editor123'),
                'role' => 'editor_konten',
                'is_active' => true,
                'phone' => '081234567892',
            ]
        );

        // 2. Pengaturan Situs & Konten Statis (Settings)
        $settings = [
            // Identitas Sekolah
            ['key' => 'school_name', 'value' => 'SMK / SMA Negeri Masa Depan', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_tagline', 'value' => 'Sekolah Unggulan Berwawasan Digital, Berkarakter, dan Berdaya Saing Global', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_logo', 'value' => null, 'group' => 'general', 'type' => 'image'],
            ['key' => 'school_favicon', 'value' => null, 'group' => 'general', 'type' => 'image'],
            ['key' => 'school_address', 'value' => 'Jl. Masa Depan No. 88, Kompleks Pendidikan Modern, Kota Cerdas 12345', 'group' => 'general', 'type' => 'textarea'],
            ['key' => 'school_phone', 'value' => '(021) 7890-1234 / 0812-9988-7766', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_email', 'value' => 'info@sekolahmasadepan.sch.id', 'group' => 'general', 'type' => 'text'],
            ['key' => 'operating_hours', 'value' => 'Senin - Jumat: 07.00 - 16.00 WIB', 'group' => 'general', 'type' => 'text'],
            ['key' => 'accreditation', 'value' => 'A (Unggul) - BAN S/M Nilai 98/100', 'group' => 'general', 'type' => 'text'],
            
            // Media Sosial & Peta
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/smknmasadepan', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/smknmasadepan', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/@smknmasadepan', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'social_twitter', 'value' => 'https://x.com/smknmasadepan', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'google_maps', 'value' => 'https://maps.google.com/maps?q=-6.2088,106.8456&z=15&output=embed', 'group' => 'contact', 'type' => 'textarea'],

            // SEO Default
            ['key' => 'meta_title', 'value' => 'Portal Resmi SMK / SMA Negeri Masa Depan', 'group' => 'seo', 'type' => 'text'],
            ['key' => 'meta_description', 'value' => 'Sistem informasi sekolah terpadu, profil institusi, kurikulum modern, dan portal pendaftaran peserta didik baru (PPDB) online.', 'group' => 'seo', 'type' => 'textarea'],

            // Hero Section Beranda
            ['key' => 'hero_badge', 'value' => '✨ PPDB Tahun Ajaran 2026/2027 Telah Resmi Dibuka', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title', 'value' => 'Membangun Karakter Unggul & Penguasaan Teknologi Abad 21', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_subtitle', 'value' => 'Sekolah modern berbasis industri digital dan sains mutakhir. Kami membekali generasi muda dengan kompetensi praktis, kepemimpinan berintegritas, serta jejaring karir global.', 'group' => 'hero', 'type' => 'textarea'],
            ['key' => 'hero_btn1_text', 'value' => 'Daftar Sekarang (PPDB)', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_btn1_url', 'value' => '/ppdb', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_btn2_text', 'value' => 'Jelajahi Profil Sekolah', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_btn2_url', 'value' => '/profil', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_banner_text', 'value' => '🔥 INFO PPDB 2026/2027: Gelombang 1 Jalur Prestasi & Zonasi dibuka s.d 30 April 2026. Kuota terbatas! Segera daftarkan diri Anda.', 'group' => 'hero', 'type' => 'textarea'],
            ['key' => 'hero_image', 'value' => null, 'group' => 'hero', 'type' => 'image'],

            // Profil Sekolah
            ['key' => 'headmaster_name', 'value' => 'Drs. H. Ahmad Dahlan, M.Pd.', 'group' => 'profile', 'type' => 'text'],
            ['key' => 'headmaster_nip', 'value' => '19680512 199303 1 004', 'group' => 'profile', 'type' => 'text'],
            ['key' => 'headmaster_photo', 'value' => null, 'group' => 'profile', 'type' => 'image'],
            ['key' => 'headmaster_welcome', 'value' => '<p>Assalamu’alaikum Warahmatullahi Wabarakatuh, salam sejahtera bagi kita semua.</p><p>Selamat datang di portal resmi <strong>SMK / SMA Negeri Masa Depan</strong>. Lembaga pendidikan kami berkomitmen menghadirkan ekosistem belajar yang adaptif, inovatif, dan berakar pada nilai-nilai luhur budi pekerti. Bersama tenaga pendidik profesional dan fasilitas modern, kami siap membimbing putra-putri bangsa menjadi insan berdaya cipta tinggi serta siap memimpin masa depan.</p>', 'group' => 'profile', 'type' => 'richtext'],
            ['key' => 'profile_history', 'value' => '<p>Didirikan pada tahun 2005 di atas lahan seluas 3,5 hektar, SMK/SMA Negeri Masa Depan bertransformasi dari sekolah percontohan vokasi digital menjadi salah satu institusi pendidikan rujukan nasional. Selama lebih dari 20 tahun, kami konsisten mencetak lulusan berprestasi di kancah nasional maupun internasional, baik yang terserap di industri bonafide maupun melanjutkan studi ke perguruan tinggi ternama dunia.</p>', 'group' => 'profile', 'type' => 'richtext'],
            ['key' => 'profile_vision', 'value' => 'Menjadi pusat keunggulan pendidikan yang menghasilkan generasi beriman, berakhlak mulia, berwawasan global, dan unggul dalam teknologi terapan pada tahun 2030.', 'group' => 'profile', 'type' => 'textarea'],
            ['key' => 'profile_mission', 'value' => "1. Menyelenggarakan proses pembelajaran berbasis teknologi informasi, problem-solving, dan riset aplikatif.\n2. Menanamkan nilai religius, integritas, dan disiplin tinggi dalam seluruh kegiatan civitas akademika.\n3. Menjalin kemitraan strategis dengan dunia usaha, dunia industri (DUDI), dan perguruan tinggi terkemuka.\n4. Memfasilitasi pengembangan minat, bakat, kepemimpinan, dan kewirausahaan siswa secara optimal.", 'group' => 'profile', 'type' => 'textarea'],
            ['key' => 'organization_structure', 'value' => '<p>Struktur manajemen sekolah dipimpin oleh Kepala Sekolah bersama 4 Wakil Kepala Sekolah (Kurikulum, Kesiswaan, Sarana Prasarana, dan Hubungan Industri) didukung oleh Komite Sekolah, Dewan Guru, dan Tenaga Administrasi.</p>', 'group' => 'profile', 'type' => 'richtext'],
        ];

        foreach ($settings as $item) {
            Setting::updateOrCreate(['key' => $item['key']], $item);
        }

        // 3. Program Keahlian / Jurusan (Majors)
        $majors = [
            [
                'name' => 'Rekayasa Perangkat Lunak & AI',
                'code' => 'RPL',
                'slug' => 'rekayasa-perangkat-lunak',
                'description' => 'Mempelajari pemrograman web modern, mobile development (Flutter/React Native), rekayasa data, kecerdasan buatan (AI), dan cloud computing.',
                'career_prospects' => 'Fullstack Developer, Mobile App Engineer, AI Prompt Engineer, Software QA, Cloud Specialist, UI/UX Designer.',
                'icon' => '💻',
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=800&auto=format&fit=crop',
                'order' => 1,
            ],
            [
                'name' => 'Teknik Jaringan Komputer & Cyber Security',
                'code' => 'TKJ',
                'slug' => 'teknik-komputer-jaringan',
                'description' => 'Fokus pada infrastruktur jaringan enterprise (Cisco/MikroTik), arsitektur server Linux/Windows, keamanan siber, dan Internet of Things (IoT).',
                'career_prospects' => 'Network Engineer, Cyber Security Analyst, System Administrator, Cloud Infrastructure Architect, DevOps Specialist.',
                'icon' => '🌐',
                'image' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?q=80&w=800&auto=format&fit=crop',
                'order' => 2,
            ],
            [
                'name' => 'Desain Komunikasi Visual & Animasi 3D',
                'code' => 'DKV',
                'slug' => 'desain-komunikasi-visual',
                'description' => 'Mengeksplorasi seni digital, branding identitas visual, motion graphic, animasi 3D (Blender/Maya), dan produksi konten audio visual.',
                'career_prospects' => 'Art Director, Motion Graphic Designer, 3D Modeler, Video Editor, Brand Strategist, Creative Producer.',
                'icon' => '🎨',
                'image' => 'https://images.unsplash.com/photo-1626785774573-4b799315345d?q=80&w=800&auto=format&fit=crop',
                'order' => 3,
            ],
            [
                'name' => 'Bisnis Digital & E-Commerce Marketing',
                'code' => 'BD',
                'slug' => 'bisnis-digital',
                'description' => 'Mempersiapkan wirausahawan masa depan dengan keterampilan digital advertising, marketplace management, data analytics, dan growth hacking.',
                'career_prospects' => 'Digital Marketer, E-Commerce Specialist, Social Media Strategist, SEO Specialist, Entrepreneur.',
                'icon' => '📈',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop',
                'order' => 4,
            ],
        ];

        foreach ($majors as $m) {
            Major::updateOrCreate(['slug' => $m['slug']], $m);
        }

        // 4. Guru & Staf
        $staffs = [
            [
                'name' => 'Drs. H. Ahmad Dahlan, M.Pd.',
                'nip' => '19680512 199303 1 004',
                'position' => 'Kepala Sekolah',
                'subject' => 'Manajemen Pendidikan',
                'bio' => 'Berpengalaman lebih dari 25 tahun memimpin institusi pendidikan terakreditasi nasional dan internasional.',
                'order' => 1,
            ],
            [
                'name' => 'Siti Nurhaliza, S.Pd., M.Kom.',
                'nip' => '19820415 200604 2 018',
                'position' => 'Wakil Kepala Sekolah Bidang Kurikulum',
                'subject' => 'Informatika & Matematika Terapan',
                'bio' => 'Pengembang modul kurikulum merdeka dan pembimbing tim olimpiade sains nasional.',
                'order' => 2,
            ],
            [
                'name' => 'Budi Santoso, S.Kom., M.T.',
                'nip' => '19850920 200902 1 007',
                'position' => 'Kepala Program Keahlian RPL & IT',
                'subject' => 'Pemrograman Web & Mobile',
                'bio' => 'Praktisi industri dan Google Certified Educator yang aktif mendampingi inkubator startup siswa.',
                'order' => 3,
            ],
            [
                'name' => 'Dewi Lestari, S.Sn., M.Ds.',
                'nip' => '19900311 201403 2 005',
                'position' => 'Guru DKV & Multimedia',
                'subject' => 'Desain Grafis & Motion Art',
                'bio' => 'Kreator visual berprestasi dengan portofolio kampanye kreatif brand ternama.',
                'order' => 4,
            ],
            [
                'name' => 'Rahmat Hidayat, S.Pd.',
                'nip' => '19920108 201701 1 012',
                'position' => 'Guru Olahraga & Koordinator Eskul',
                'subject' => 'Pendidikan Jasmani & Kesehatan',
                'bio' => 'Pelatih berlisensi nasional yang berhasil mengantarkan tim basket sekolah juara provinsi.',
                'order' => 5,
            ],
        ];

        foreach ($staffs as $st) {
            Staff::updateOrCreate(['name' => $st['name']], $st);
        }

        // 5. Fasilitas Sekolah
        $facilities = [
            [
                'name' => 'Laboratorium Komputer & AI Supercomputing Lab',
                'description' => 'Dilengkapi 40 unit PC workstation high-end (Core i7, RTX 4070, RAM 32GB) dengan koneksi fiber optik gigabit untuk coding dan machine learning.',
                'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=800&auto=format&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Perpustakaan Digital & Smart E-Learning Hub',
                'description' => 'Ribuan koleksi buku digital, jurnal internasional berlisensi, ruang diskusi pods kedap suara, dan area membaca ber-AC yang nyaman.',
                'image' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=800&auto=format&fit=crop',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Studio Multimedia & Podcast Room',
                'description' => 'Studio rekaman broadcast profesional dengan green screen, tata cahaya sinematik, serta audio mixer digital untuk latihan podcast dan editing film.',
                'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?q=80&w=800&auto=format&fit=crop',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Gelanggang Olahraga Indoor Multifungsi',
                'description' => 'Lapangan standar internasional untuk basket, futsal, bulutangkis, dan voli dengan tribun penonton berkapasitas 800 orang.',
                'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=800&auto=format&fit=crop',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Masjid Sekolah Al-Masa Depan',
                'description' => 'Masjid megah berarsitektur modern ramah lingkungan sebagai pusat ibadah dan pembinaan karakter rohani siswa.',
                'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=800&auto=format&fit=crop',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($facilities as $fac) {
            Facility::updateOrCreate(['name' => $fac['name']], $fac);
        }

        // 6. Galeri & Album Foto
        $album1 = GalleryAlbum::updateOrCreate(
            ['slug' => 'pameran-karya-inovasi-teknologi-2026'],
            [
                'title' => 'Pameran Karya Inovasi Teknologi & P5 2026',
                'description' => 'Dokumentasi kegiatan gelar karya proyek penguatan profil pelajar pancasila dan pameran aplikasi buatan siswa.',
                'cover_image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=800&auto=format&fit=crop',
            ]
        );

        $album2 = GalleryAlbum::updateOrCreate(
            ['slug' => 'kegiatan-ekstrakurikuler-dan-olimpiade'],
            [
                'title' => 'Aktivitas Ekstrakurikuler & Kejuaraan Olahraga',
                'description' => 'Momen kebersamaan siswa dalam mengasah minat, bakat, serta kompetisi turnamen antar sekolah se-Jabodetabek.',
                'cover_image' => 'https://images.unsplash.com/photo-1526676037777-05a232554f77?q=80&w=800&auto=format&fit=crop',
            ]
        );

        $galleries = [
            [
                'album_id' => $album1->id,
                'title' => 'Presentasi Proyek AI Siswa Kelas XII RPL',
                'category' => 'Akademik',
                'type' => 'foto',
                'file_path' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop',
                'caption' => 'Siswa mendemonstrasikan sistem deteksi citra medis di depan praktisi industri pendamping.',
            ],
            [
                'album_id' => $album1->id,
                'title' => 'Suasana Lab Komputer Saat Ujian Berbasis Komputer',
                'category' => 'Fasilitas',
                'type' => 'foto',
                'file_path' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop',
                'caption' => 'Pelaksanaan asesmen sumatif dengan sistem CAT berbasis cloud lokal mandiri.',
            ],
            [
                'album_id' => $album2->id,
                'title' => 'Pertandingan Final Tim Basket Putra',
                'category' => 'Olahraga',
                'type' => 'foto',
                'file_path' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop',
                'caption' => 'Tim basket sekolah sukses meraih juara 1 pada Kejuaraan Antar Pelajar Tingkat Provinsi.',
            ],
            [
                'album_id' => $album2->id,
                'title' => 'Latihan Rutin Pasukan Pengibar Bendera (Paskibra)',
                'category' => 'Kesiswaan',
                'type' => 'foto',
                'file_path' => 'https://images.unsplash.com/photo-1526676037777-05a232554f77?q=80&w=800&auto=format&fit=crop',
                'caption' => 'Formasi baris berbaris disiplin tinggi anggota Paskibra SMK Masa Depan.',
            ],
        ];

        foreach ($galleries as $g) {
            Gallery::create($g);
        }

        // 7. Ekstrakurikuler
        $extracurriculars = [
            [
                'name' => 'Robotika & IoT Innovation Club',
                'description' => 'Mempelajari rancang bangun robot line follower, mikroprosesor Arduino/ESP32, sensor pintar, dan pemrograman otomatisasi.',
                'instructor' => 'Budi Santoso, S.Kom. & Tim Lab Robotika',
                'schedule' => 'Setiap Rabu & Jumat, 15.30 - 17.30 WIB',
                'location' => 'Laboratorium Robotika & IoT',
                'icon' => '🤖',
                'achievements' => 'Juara 1 Kontes Robotika Nasional Pelajar 2025, Best Innovation Award TechFest.',
            ],
            [
                'name' => 'Cyber Security & Ethical Hacking',
                'description' => 'Pelatihan keamanan jaringan, kompetisi Capture The Flag (CTF), reverse engineering, dan pertahanan sistem informasi.',
                'instructor' => 'Ir. Hendra Wijaya (Certified CEH)',
                'schedule' => 'Setiap Selasa & Kamis, 15.30 - 17.00 WIB',
                'location' => 'Cyber Security Lab Lt. 3',
                'icon' => '🛡️',
                'achievements' => 'Top 5 Nasional Cyber Jawara Junior 2025.',
            ],
            [
                'name' => 'Klub Basket Garuda Muda',
                'description' => 'Pengembangan teknik dasar, strategi tanding basket modern, dan pembinaan fisik atletik berdaya tahan tinggi.',
                'instructor' => 'Coach Rahmat Hidayat, S.Pd.',
                'schedule' => 'Setiap Senin & Sabtu, 16.00 - 18.00 WIB',
                'location' => 'GOR Indoor Utama',
                'icon' => '🏀',
                'achievements' => 'Juara 1 DBL Regional Jakarta Selatan 2025, Juara Umum Cup Pelajar.',
            ],
            [
                'name' => 'Cinema & Creative Media Club',
                'description' => 'Eksplorasi sinematografi, penulisan naskah film pendek, editing video, dan fotografi jurnalistik.',
                'instructor' => 'Dewi Lestari, M.Ds.',
                'schedule' => 'Setiap Sabtu, 09.00 - 12.00 WIB',
                'location' => 'Studio Broadcasting',
                'icon' => '🎬',
                'achievements' => 'Juara Film Pendek Terbaik Festival Sineas Muda Nasional 2024.',
            ],
        ];

        foreach ($extracurriculars as $eskul) {
            Extracurricular::updateOrCreate(['name' => $eskul['name']], $eskul);
        }

        // 8. Prestasi Sekolah
        $achievements = [
            [
                'title' => 'Medali Emas Lomba Kompetensi Siswa (LKS) Nasional Bidang Cloud Computing',
                'level' => 'Nasional',
                'year' => '2025',
                'organizer' => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi RI',
                'student_name' => 'Muhammad Fathan & Tim RPL',
                'photo' => 'https://images.unsplash.com/photo-1578269174936-2709b6aeb913?q=80&w=800&auto=format&fit=crop',
                'description' => 'Berhasil mendesain arsitektur multi-cloud dengan skalabilitas tinggi serta keamanan optimal di bawah standar industri internasional.',
            ],
            [
                'title' => 'Juara 1 International Youth Science & Invention Fair (IYSIF)',
                'level' => 'Internasional',
                'year' => '2025',
                'organizer' => 'Indonesian Young Scientist Association (IYSA) & Universitas Luar Negeri',
                'student_name' => 'Aulia Rahma & Sarah Amelia',
                'photo' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop',
                'description' => 'Inovasi alat deteksi kebocoran gas pintar berbasis AIoT ramah lingkungan untuk kawasan perumahan padat penduduk.',
            ],
            [
                'title' => 'Juara Umum Kejuaraan Bola Basket Pelajar Tingkat Provinsi',
                'level' => 'Provinsi',
                'year' => '2024',
                'organizer' => 'Dinas Pemuda dan Olahraga Provinsi DKI Jakarta',
                'student_name' => 'Tim Basket Putra Sekolah',
                'photo' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop',
                'description' => 'Meraih gelar tidak terkalahkan sepanjang kompetisi dengan rata-rata keunggulan 25 poin per game.',
            ],
        ];

        foreach ($achievements as $ach) {
            Achievement::updateOrCreate(['title' => $ach['title']], $ach);
        }

        // 9. Berita & Pengumuman (Posts)
        $posts = [
            [
                'title' => 'Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027 Telah Resmi Dibuka',
                'slug' => 'ppdb-tahun-ajaran-2026-2027-telah-resmi-dibuka',
                'type' => 'pengumuman',
                'category' => 'Kesiswaan',
                'content' => '<p>SMK / SMA Negeri Masa Depan membuka pendaftaran peserta didik baru (PPDB) Tahun Ajaran 2026/2027 melalui sistem online terintegrasi. Tersedia jalur prestasi, zonasi, afirmasi, dan reguler dengan beasiswa penuh bagi calon siswa berprestasi di bidang sains, teknologi, maupun olahraga.</p><p>Persyaratan lengkap dan formulir pendaftaran dapat diakses secara langsung melalui menu <strong>Daftar PPDB</strong> pada portal ini.</p>',
                'status' => 'terbit',
                'published_at' => now()->subDays(2),
                'views' => 450,
            ],
            [
                'title' => 'Siswa SMK Masa Depan Raih Medali Emas LKS Tingkat Nasional 2025',
                'slug' => 'siswa-smk-masa-depan-raih-medali-emas-lks-nasional-2025',
                'type' => 'berita',
                'category' => 'Prestasi',
                'content' => '<p>Prestasi gemilang kembali diukir oleh perwakilan SMK Negeri Masa Depan pada ajang Lomba Kompetensi Siswa (LKS) Tingkat Nasional bidang Web Technologies dan Cloud Computing. Keberhasilan ini semakin mempertegas posisi sekolah sebagai pionir pendidikan vokasi digital di Indonesia.</p>',
                'status' => 'terbit',
                'published_at' => now()->subDays(5),
                'views' => 820,
            ],
            [
                'title' => 'Workshop Kolaborasi Industri: Implementasi Generative AI dalam Pengembangan Perangkat Lunak',
                'slug' => 'workshop-kolaborasi-industri-implementasi-gen-ai',
                'type' => 'artikel',
                'category' => 'Teknologi',
                'content' => '<p>Perkembangan pesat kecerdasan buatan membuka paradigma baru dalam dunia rekayasa perangkat lunak. Melalui kerja sama dengan praktisi industri Silicon Valley dan unicorn lokal, siswa diajarkan memanfaatkan LLM untuk meningkatkan produktivitas tanpa mengesampingkan pemahaman algoritma dasar.</p>',
                'status' => 'terbit',
                'published_at' => now()->subDays(8),
                'views' => 610,
            ],
            [
                'title' => 'Draft Panduan Masa Pengenalan Lingkungan Sekolah (MPLS) 2026',
                'slug' => 'draft-panduan-mpls-2026',
                'type' => 'pengumuman',
                'category' => 'Akademik',
                'content' => '<p>Berikut draft sementara rancangan kegiatan MPLS tahun ajaran baru yang berfokus pada adaptasi ekosistem digital dan pembentukan karakter ramah anak tanpa perundungan.</p>',
                'status' => 'draft',
                'published_at' => null,
                'views' => 12,
            ],
        ];

        foreach ($posts as $p) {
            Post::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 10. Unduhan File (Downloads)
        $downloads = [
            [
                'title' => 'Brosur & Panduan Lengkap PPDB Tahun Ajaran 2026/2027',
                'category' => 'Brosur',
                'file_path' => 'downloads/brosur-ppdb-2026.pdf',
                'file_size' => '2.4 MB',
                'download_count' => 128,
            ],
            [
                'title' => 'Formulir Surat Pernyataan Orang Tua / Wali Calon Siswa',
                'category' => 'Formulir',
                'file_path' => 'downloads/formulir-pernyataan-wali.pdf',
                'file_size' => '450 KB',
                'download_count' => 84,
            ],
            [
                'title' => 'Kalender Akademik & Jadwal Ujian Semester Ganjil 2026',
                'category' => 'Jadwal',
                'file_path' => 'downloads/kalender-akademik-2026.pdf',
                'file_size' => '1.1 MB',
                'download_count' => 215,
            ],
        ];

        foreach ($downloads as $d) {
            Download::updateOrCreate(['title' => $d['title']], $d);
        }

        // 11. Gelombang Pendaftaran PPDB (PpdbWave)
        $wave1 = PpdbWave::updateOrCreate(
            ['name' => 'Gelombang 1 - Jalur Prestasi & Zonasi 2026/2027'],
            [
                'start_date' => now()->subDays(10)->toDateString(),
                'end_date' => now()->addDays(20)->toDateString(),
                'quota' => 150,
                'is_active' => true,
                'announcement_date' => now()->addDays(25)->toDateString(),
                'is_announced' => false,
            ]
        );

        $wave2 = PpdbWave::updateOrCreate(
            ['name' => 'Gelombang 2 - Jalur Reguler & Tes Mandiri 2026/2027'],
            [
                'start_date' => now()->addDays(26)->toDateString(),
                'end_date' => now()->addDays(60)->toDateString(),
                'quota' => 100,
                'is_active' => false,
                'announcement_date' => now()->addDays(65)->toDateString(),
                'is_announced' => false,
            ]
        );

        // 12. Data Pendaftar PPDB (PpdbApplicant) dengan variasi status
        $firstMajor = Major::first();
        $secondMajor = Major::skip(1)->first();

        $applicants = [
            [
                'wave_id' => $wave1->id,
                'major_id' => $firstMajor ? $firstMajor->id : null,
                'registration_number' => 'PPDB-2026-0001',
                'full_name' => 'Muhammad Rizky Pratama',
                'nisn' => '0078123456',
                'nik' => '3171012345670001',
                'gender' => 'L',
                'birth_place' => 'Jakarta',
                'birth_date' => '2010-04-15',
                'religion' => 'Islam',
                'address' => 'Jl. Kebon Jeruk No. 12, Jakarta Barat',
                'phone' => '081234567801',
                'email' => 'rizky.pratama@gmail.com',
                'origin_school' => 'SMP Negeri 115 Jakarta',
                'parent_name' => 'Bambang Pratama',
                'parent_phone' => '081234567802',
                'parent_job' => 'Karyawan Swasta',
                'status' => 'menunggu',
                'verification_notes' => 'Menunggu verifikasi nilai rapor semester 1-5.',
            ],
            [
                'wave_id' => $wave1->id,
                'major_id' => $firstMajor ? $firstMajor->id : null,
                'registration_number' => 'PPDB-2026-0002',
                'full_name' => 'Anisa Rahmawati Putri',
                'nisn' => '0089234567',
                'nik' => '3171012345670002',
                'gender' => 'P',
                'birth_place' => 'Bandung',
                'birth_date' => '2010-08-22',
                'religion' => 'Islam',
                'address' => 'Jl. Tebet Barat Raya No. 45, Jakarta Selatan',
                'phone' => '081234567803',
                'email' => 'anisa.rahma@gmail.com',
                'origin_school' => 'SMP Negeri 19 Jakarta',
                'parent_name' => 'Dedi Rahmadi',
                'parent_phone' => '081234567804',
                'parent_job' => 'PNS',
                'status' => 'diverifikasi',
                'verification_notes' => 'Berkas akta dan KK valid. Sertifikat prestasi terverifikasi tingkat kota.',
                'verified_by' => $ppdbOperator->id,
                'verified_at' => now()->subDay(),
            ],
            [
                'wave_id' => $wave1->id,
                'major_id' => $secondMajor ? $secondMajor->id : null,
                'registration_number' => 'PPDB-2026-0003',
                'full_name' => 'Kevin Sanjaya Wijaya',
                'nisn' => '0071345678',
                'nik' => '3171012345670003',
                'gender' => 'L',
                'birth_place' => 'Surabaya',
                'birth_date' => '2010-02-10',
                'religion' => 'Kristen',
                'address' => 'Jl. Kelapa Gading Boulevard No. 8, Jakarta Utara',
                'phone' => '081234567805',
                'email' => 'kevin.sanjaya@gmail.com',
                'origin_school' => 'SMP Kristen Penabur',
                'parent_name' => 'Hendrawan Wijaya',
                'parent_phone' => '081234567806',
                'parent_job' => 'Wiraswasta',
                'status' => 'diterima',
                'verification_notes' => 'Lolos verifikasi jalur prestasi matematika dan coding.',
                'verified_by' => $superAdmin->id,
                'verified_at' => now()->subDays(2),
            ],
            [
                'wave_id' => $wave1->id,
                'major_id' => $firstMajor ? $firstMajor->id : null,
                'registration_number' => 'PPDB-2026-0004',
                'full_name' => 'Bintang Arya Saputra',
                'nisn' => '0085456789',
                'nik' => '3171012345670004',
                'gender' => 'L',
                'birth_place' => 'Depok',
                'birth_date' => '2009-12-05',
                'religion' => 'Islam',
                'address' => 'Jl. Margonda Raya No. 99, Depok',
                'phone' => '081234567807',
                'email' => 'bintang.arya@gmail.com',
                'origin_school' => 'SMP Negeri 2 Depok',
                'parent_name' => 'Joko Saputra',
                'parent_phone' => '081234567808',
                'parent_job' => 'TNI / Polri',
                'status' => 'cadangan',
                'verification_notes' => 'Nilai memenuhi syarat minimum, masuk daftar cadangan urutan ke-2.',
                'verified_by' => $ppdbOperator->id,
                'verified_at' => now()->subDays(3),
            ],
            [
                'wave_id' => $wave1->id,
                'major_id' => $secondMajor ? $secondMajor->id : null,
                'registration_number' => 'PPDB-2026-0005',
                'full_name' => 'Fauzi Nur Ikhsan',
                'nisn' => '0067567890',
                'nik' => '3171012345670005',
                'gender' => 'L',
                'birth_place' => 'Bogor',
                'birth_date' => '2008-05-18',
                'religion' => 'Islam',
                'address' => 'Jl. Pajajaran No. 20, Bogor',
                'phone' => '081234567809',
                'email' => 'fauzi.ikhsan@gmail.com',
                'origin_school' => 'SMP Terbuka Bogor',
                'parent_name' => 'Ikhsanudin',
                'parent_phone' => '081234567810',
                'parent_job' => 'Buruh',
                'status' => 'ditolak',
                'verification_notes' => 'Usia melebihi batas ketentuan PPDB reguler SMA/SMK.',
                'verified_by' => $ppdbOperator->id,
                'verified_at' => now()->subDays(4),
            ],
        ];

        foreach ($applicants as $app) {
            PpdbApplicant::updateOrCreate(['registration_number' => $app['registration_number']], $app);
        }

        // 13. Pesan Masuk (Contacts)
        $contacts = [
            [
                'name' => 'Dr. Hendra Gunawan',
                'email' => 'hendra.gunawan@univ.ac.id',
                'phone' => '081344556677',
                'subject' => 'Ajakan Kerja Sama Riset AI & Kunjungan Kampus',
                'message' => 'Selamat siang pimpinan SMK Masa Depan. Kami dari fakultas ilmu komputer ingin menjajaki kerja sama program pengabdian masyarakat dan pelatihan machine learning untuk siswa kelas XI.',
                'is_read' => false,
            ],
            [
                'name' => 'Rina Marlina (Wali Murid)',
                'email' => 'rina.marlina88@yahoo.com',
                'phone' => '085711223344',
                'subject' => 'Pertanyaan Alur Verifikasi Berkas PPDB 2026',
                'message' => 'Apakah berkas sertifikat kejuaraan tingkat kota perlu dilegalisir langsung oleh dinas terkait sebelum diunggah ke website PPDB?',
                'is_read' => true,
                'reply_content' => 'Selamat pagi Ibu Rina. Cukup mengunggah hasil scan warna sertifikat asli yang jelas terbaca.',
                'replied_at' => now()->subHours(6),
            ],
            [
                'name' => 'PT Cipta Solusi Digital',
                'email' => 'hrd@ciptasolusi.co.id',
                'phone' => '021-55667788',
                'subject' => 'Permintaan Kuota Siswa Praktik Kerja Lapangan (PKL)',
                'message' => 'Kami membuka kesempatan magang PKL untuk 6 orang siswa jurusan Rekayasa Perangkat Lunak periode Juli - Desember 2026 dengan insentif bulanan.',
                'is_read' => false,
            ],
        ];

        foreach ($contacts as $c) {
            Contact::create($c);
        }

        // 14. Log Aktivitas Awal
        ActivityLog::create([
            'user_id' => $superAdmin->id,
            'action' => 'SYSTEM_INIT',
            'description' => 'Inisialisasi sistem database dan konfigurasi CMS Sekolah berhasil.',
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Seeder Script',
        ]);
    }
}
