<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar PPDB — Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-[#0B132B] text-gray-200 min-h-screen p-6 md:p-10 font-sans">

    <div class="max-w-4xl mx-auto space-y-6">

        <!-- Header Navigation -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.ppdb.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-white transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>Kembali ke Daftar PPDB</span>
            </a>

            <!-- Status Badge -->
            <span class="px-3 py-1 text-xs font-semibold rounded-full 
                @if(($applicant->status ?? 'menunggu') == 'diterima') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                @elseif(($applicant->status ?? 'menunggu') == 'diverifikasi') bg-blue-500/10 text-blue-400 border border-blue-500/20
                @else bg-amber-500/10 text-amber-400 border border-amber-500/20 @endif">
                Status: {{ ucfirst($applicant->status ?? 'menunggu') }}
            </span>
        </div>

        <!-- Detail Card -->
        <div class="bg-[#151D36] border border-slate-800 rounded-2xl p-6 md:p-8 shadow-xl space-y-6">
            <div class="border-b border-slate-800 pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-white">{{ $applicant->name ?? $applicant->nama_lengkap ?? 'Detail Pendaftar' }}</h1>
                    <p class="text-sm text-gray-400 mt-1">NISN: {{ $applicant->nisn ?? '-' }} | No. Pendaftaran: {{ $applicant->registration_number ?? $applicant->id }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div class="space-y-3">
                    <div>
                        <span class="text-xs text-gray-400 block">Jenis Kelamin</span>
                        <span class="text-white font-medium">{{ $applicant->gender ?? $applicant->jenis_kelamin ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block">Tempat, Tanggal Lahir</span>
                        <span class="text-white font-medium">{{ $applicant->birth_place ?? '-' }}, {{ $applicant->birth_date ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block">Asal Sekolah</span>
                        <span class="text-white font-medium">{{ $applicant->school_origin ?? $applicant->asal_sekolah ?? '-' }}</span>
                    </div>
                </div>

                <div class="space-y-3">
                    <div>
                        <span class="text-xs text-gray-400 block">Email</span>
                        <span class="text-white font-medium">{{ $applicant->email ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block">Nomor HP / WhatsApp</span>
                        <span class="text-white font-medium">{{ $applicant->phone ?? $applicant->no_hp ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block">Alamat</span>
                        <span class="text-white font-medium">{{ $applicant->address ?? $applicant->alamat ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Ubah Status Pendaftaran -->
            <div class="pt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <form action="{{ route('admin.ppdb.update-status', $applicant->id) }}" method="POST" class="flex items-center gap-3 w-full sm:w-auto">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="bg-[#0B132B] border border-slate-700 text-sm text-white rounded-xl px-4 py-2.5 focus:outline-none focus:border-indigo-500">
                        <option value="menunggu" {{ ($applicant->status ?? '') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diverifikasi" {{ ($applicant->status ?? '') == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                        <option value="diterima" {{ ($applicant->status ?? '') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ ($applicant->status ?? '') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition">
                        Update Status
                    </button>
                </form>

                <form action="{{ route('admin.ppdb.destroy', $applicant->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition">
                        Hapus Pendaftar
                    </button>
                </form>
            </div>
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>