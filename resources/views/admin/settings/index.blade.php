@extends('layouts.admin')

@section('title', 'Pengaturan Website')
@section('breadcrumb', 'Pengaturan')

@section('content')

    <div class="mb-8">
        <h1 class="text-xl font-bold text-white">Pengaturan Website</h1>
        <p class="text-slate-400 text-sm mt-0.5">Konfigurasi informasi dan tampilan website sekolah</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Settings Form -->
        <div class="lg:col-span-2 space-y-5">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <!-- Informasi Sekolah -->
                <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
                    <div class="px-5 py-4 border-b border-slate-800/60">
                        <h2 class="text-sm font-bold text-white">Informasi Sekolah</h2>
                    </div>
                    <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nama Sekolah</label>
                            <input type="text" name="school_name" value="{{ old('school_name', $settings['school_name'] ?? 'SMK / SMA Negeri Masa Depan') }}"
                                   class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">NPSN</label>
                            <input type="text" name="npsn" value="{{ old('npsn', $settings['npsn'] ?? '') }}"
                                   placeholder="Nomor Pokok Sekolah Nasional"
                                   class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Alamat</label>
                            <textarea name="address" rows="2"
                                      class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition resize-none">{{ old('address', $settings['address'] ?? 'Jl. Pendidikan No. 45, Kota Sukses') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Telepon</label>
                            <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '(021) 7890-1234') }}"
                                   class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Email Resmi</label>
                            <input type="email" name="email" value="{{ old('email', $settings['email'] ?? 'info@sekolah.sch.id') }}"
                                   class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition">
                        </div>
                    </div>
                </div>

                <!-- Sosial Media -->
                <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
                    <div class="px-5 py-4 border-b border-slate-800/60">
                        <h2 class="text-sm font-bold text-white">Media Sosial</h2>
                    </div>
                    <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach([
                            ['name' => 'instagram', 'label' => 'Instagram', 'placeholder' => '@sekolahku'],
                            ['name' => 'facebook', 'label' => 'Facebook', 'placeholder' => 'facebook.com/sekolahku'],
                            ['name' => 'youtube', 'label' => 'YouTube', 'placeholder' => 'youtube.com/c/sekolahku'],
                            ['name' => 'twitter', 'label' => 'X (Twitter)', 'placeholder' => '@sekolahku'],
                        ] as $social)
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">{{ $social['label'] }}</label>
                                <input type="text" name="{{ $social['name'] }}" value="{{ old($social['name'], $settings[$social['name']] ?? '') }}"
                                       placeholder="{{ $social['placeholder'] }}"
                                       class="w-full bg-slate-800/60 border border-slate-700/60 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Logo & Favicon -->
                <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
                    <div class="px-5 py-4 border-b border-slate-800/60">
                        <h2 class="text-sm font-bold text-white">Logo & Identitas Visual</h2>
                    </div>
                    <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Logo Sekolah</label>
                            <input type="file" name="logo" accept="image/*"
                                   class="w-full text-sm text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600/20 file:text-blue-400 file:font-semibold file:cursor-pointer hover:file:bg-blue-600/30 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Favicon</label>
                            <input type="file" name="favicon" accept="image/*"
                                   class="w-full text-sm text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600/20 file:text-blue-400 file:font-semibold file:cursor-pointer hover:file:bg-blue-600/30 transition">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm shadow-lg shadow-blue-600/20 transition-all">
                        Simpan Pengaturan
                    </button>
                </div>

            </form>
        </div>

        <!-- Info Panel -->
        <div class="space-y-5">
            <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-5">
                <h3 class="text-sm font-bold text-white mb-4">Informasi Sistem</h3>
                <div class="space-y-3">
                    @foreach([
                        ['label' => 'Versi Laravel', 'value' => app()->version()],
                        ['label' => 'PHP Version', 'value' => PHP_VERSION],
                        ['label' => 'Environment', 'value' => config('app.env')],
                        ['label' => 'Debug Mode', 'value' => config('app.debug') ? 'On' : 'Off'],
                        ['label' => 'Timezone', 'value' => config('app.timezone')],
                    ] as $info)
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500">{{ $info['label'] }}</span>
                            <span class="text-slate-300 font-medium">{{ $info['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-2xl border border-amber-500/20 bg-amber-500/5 p-5">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-amber-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.963-.833-2.732 0L3.07 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                    <div>
                        <p class="text-xs font-semibold text-amber-400 mb-1">Catatan</p>
                        <p class="text-xs text-slate-400 leading-relaxed">Perubahan pengaturan website akan langsung diterapkan. Pastikan data yang diisi sudah benar sebelum menyimpan.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
