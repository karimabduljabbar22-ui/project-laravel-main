@extends('layouts.admin')

@section('title', 'Tambah User')
@section('breadcrumb', 'Tambah User')

@section('content')

    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-white">Tambah User Baru</h1>
            <p class="mt-0.5 text-sm text-slate-400">Buat akun pengguna baru untuk akses sistem</p>
        </div>
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center space-x-2 rounded-xl border border-slate-700 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:border-slate-600 hover:text-white">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali</span>
        </a>
    </div>

    <div class="max-w-2xl rounded-2xl border border-slate-800/70 bg-slate-900/50 p-6">
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-slate-400">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full rounded-xl border border-slate-700 bg-slate-800/50 px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                @error('name')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-slate-400">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="w-full rounded-xl border border-slate-700 bg-slate-800/50 px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                @error('email')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field Password dengan Fitur Show/Hide -->
            <div>
                <label for="password" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-slate-400">Password</label>
                
                <div class="relative">
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                           class="w-full rounded-xl border border-slate-700 bg-slate-800/50 pl-4 pr-11 py-2.5 text-sm text-white placeholder-slate-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    
                    <!-- Tombol Mata (Toggle Show/Hide) -->
                    <button type="button" onclick="togglePasswordVisibility()" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-200 focus:outline-none">
                        <!-- Ikon Mata Terbuka (Show) -->
                        <svg id="eye-open" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <!-- Ikon Mata Coret (Hide) -->
                        <svg id="eye-closed" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.02 10.02 0 013.982-.863c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m-4.692-4.692a3 3 0 00-4.243-4.243"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>
                        </svg>
                    </button>
                </div>

                @error('password')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2 flex justify-end">
                <button type="submit" class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-500">
                    Simpan User
                </button>
            </div>
        </form>
    </div>

    <!-- Script JavaScript untuk Toggle Show/Hide Password -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>

@endsection