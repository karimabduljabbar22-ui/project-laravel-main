<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($extracurricular) ? 'Edit' : 'Tambah' }} Ekstrakurikuler — Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0B132B] text-gray-200 min-h-screen p-6 md:p-10 font-sans">

    <div class="max-w-2xl mx-auto bg-[#151D36] border border-slate-800 p-8 rounded-2xl shadow-xl space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-white">
                {{ isset($extracurricular) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler Baru' }}
            </h2>
            <p class="text-sm text-gray-400 mt-1">Isi formulir di bawah ini untuk menyimpan data.</p>
        </div>

        <form action="{{ isset($extracurricular) ? route('admin.extracurriculars.update', $extracurricular->id) : route('admin.extracurriculars.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-5">
            
            @csrf
            @if(isset($extracurricular))
                @method('PUT')
            @endif

            <!-- Nama Ekstrakurikuler -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Ekstrakurikuler <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $extracurricular->name ?? '') }}" required class="w-full bg-[#0B132B] border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Contoh: Pramuka, Basket, Robotik">
            </div>

            <!-- Pembina / Coach -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Pembina / Pelatih</label>
                <input type="text" name="coach" value="{{ old('coach', $extracurricular->coach ?? '') }}" class="w-full bg-[#0B132B] border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Contoh: Drs. Budi Santoso">
            </div>

            <!-- Jadwal -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Jadwal Latihan</label>
                <input type="text" name="schedule" value="{{ old('schedule', $extracurricular->schedule ?? '') }}" class="w-full bg-[#0B132B] border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Contoh: Setiap Jumat, 15:00 WIB">
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full bg-[#0B132B] border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Deskripsi singkat kegiatan...">{{ old('description', $extracurricular->description ?? '') }}</textarea>
            </div>

            <!-- Gambar / Foto Logo -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Upload Foto / Logo</label>
                @if(isset($extracurricular) && $extracurricular->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $extracurricular->image) }}" class="w-16 h-16 object-cover rounded-xl border border-slate-700">
                        <span class="text-xs text-gray-400">Gambar saat ini</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-4 pt-4">
                <a href="{{ route('admin.extracurriculars.index') }}" class="w-1/2 text-center bg-slate-800 hover:bg-slate-700 text-white py-3 rounded-xl transition">Batal</a>
                <button type="submit" class="w-1/2 bg-indigo-600 hover:bg-indigo-500 text-white py-3 rounded-xl font-semibold transition">
                    {{ isset($extracurricular) ? 'Perbarui Data' : 'Simpan Data' }}
                </button>
            </div>
        </form>
    </div>

</body>
</html>