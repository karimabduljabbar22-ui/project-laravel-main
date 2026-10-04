<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Ekstrakurikuler — Admin Panel</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-[#0B132B] text-gray-200 min-h-screen p-6 md:p-10 font-sans">

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 p-4 rounded-xl flex items-center justify-between shadow-lg">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white font-bold">&times;</button>
            </div>
        @endif

        <!-- Header Navigation & Tombol Kembali -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <!-- Navigasi Kembali -->
                <div class="flex items-center gap-2 text-sm text-gray-400 mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-1 hover:text-white transition">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        <span>Kembali ke Dashboard</span>
                    </a>
                    <span>/</span>
                    <span class="text-indigo-400 font-medium">Ekstrakurikuler</span>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-white tracking-wide">Ekstrakurikuler</h1>
                <p class="text-sm text-gray-400 mt-1">Kelola data kegiatan ekstrakurikuler sekolah</p>
            </div>

            <!-- Tombol Tambah Data -->
            <div>
                <a href="{{ route('admin.extracurriculars.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-lg transition duration-200">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Tambah Ekstrakurikuler</span>
                </a>
            </div>
        </div>

        <!-- Content Grid -->
        @if($extracurriculars->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($extracurriculars as $extracurricular)
                    <div class="bg-[#151D36] border border-slate-800 hover:border-slate-700 rounded-2xl p-6 transition duration-200 shadow-xl flex flex-col justify-between group">
                        
                        <div>
                            <!-- Avatar Inisial -->
                            <div class="flex justify-center mb-4">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 text-white font-bold text-xl flex items-center justify-center shadow-md border-2 border-indigo-400/30 group-hover:scale-105 transition-transform">
                                    {{ strtoupper(substr($extracurricular->name, 0, 1)) }}
                                </div>
                            </div>

                            <!-- Judul & Deskripsi -->
                            <div class="text-center">
                                <h3 class="text-lg font-bold text-white mb-1 group-hover:text-indigo-300 transition">
                                    {{ $extracurricular->name }}
                                </h3>
                                <p class="text-xs text-gray-400">
                                    {{ $extracurricular->description ?? 'Pengembangan bakat dan minat siswa' }}
                                </p>
                            </div>
                        </div>

                        <!-- Footer Card: Tombol Edit & Hapus -->
                        <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-center gap-6 text-sm font-medium">
                            <a href="{{ route('admin.extracurriculars.edit', $extracurricular->id) }}" class="text-gray-400 hover:text-indigo-400 transition flex items-center gap-1">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                <span>Edit</span>
                            </a>

                            <form action="{{ route('admin.extracurriculars.destroy', $extracurricular->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ekstrakurikuler ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-400 transition flex items-center gap-1">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <!-- State Jika Data Kosong -->
            <div class="bg-[#151D36] border border-slate-800 rounded-2xl p-12 text-center max-w-md mx-auto my-12 shadow-xl">
                <div class="w-16 h-16 bg-slate-800/60 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="folder-open" class="w-8 h-8"></i>
                </div>
                <h3 class="text-lg font-semibold text-white mb-1">Belum Ada Data</h3>
                <p class="text-sm text-gray-400 mb-6">Data ekstrakurikuler belum ditambahkan ke dalam sistem.</p>
                <a href="{{ route('admin.extracurriculars.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    <span>Tambah Data Pertama</span>
                </a>
            </div>
        @endif

    </div>

    <!-- Inisialisasi Icon Lucide -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>