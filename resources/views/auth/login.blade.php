<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Portal Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .bg-pattern {
            background-color: #0b0f19;
            background-image: 
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(14, 165, 233, 0.08) 0px, transparent 50%);
        }
        .glass-card {
            background: rgba(17, 24, 39, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="bg-pattern min-h-screen flex items-center justify-center p-4 text-slate-100 antialiased selection:bg-blue-600 selection:text-white">

    <div class="w-full max-w-md">
        <!-- Logo & Brand Header -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center space-x-3 group mb-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center shadow-lg shadow-blue-500/25 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <div class="text-left">
                    <span class="block text-xl font-extrabold text-white tracking-tight">Portal Sekolah</span>
                    <span class="block text-xs font-semibold text-blue-400 uppercase tracking-widest">Admin Control Panel</span>
                </div>
            </a>
            <h1 class="text-2xl font-bold text-white tracking-tight">Masuk ke Halaman Admin</h1>
            <p class="text-sm text-slate-400 mt-1">Masukkan kredensial akun untuk mengelola portal sekolah</p>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-5 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm flex items-center space-x-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-5 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-sm flex items-start space-x-3">
                <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="flex-1">
                    <p class="font-semibold mb-1">Gagal Masuk</p>
                    <ul class="list-disc list-inside space-y-1 text-xs">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Card Login -->
        <div class="glass-card rounded-3xl p-8 shadow-2xl shadow-black/40">
            <form action="{{ route('login.attempt') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Alamat Email Admin
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email', 'admin@sekolah.sch.id') }}" required autofocus
                               placeholder="nama@sekolah.sch.id"
                               class="w-full pl-11 pr-4 py-3 bg-slate-900/80 border border-slate-700/80 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder:text-slate-500">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            Kata Sandi
                        </label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required
                               placeholder="••••••••"
                               class="w-full pl-11 pr-11 py-3 bg-slate-900/80 border border-slate-700/80 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder:text-slate-500">
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-white transition">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2.5 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-blue-600 focus:ring-blue-500 focus:ring-offset-slate-900 transition">
                        <span class="text-xs text-slate-300">Ingat sesi saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-sm shadow-lg shadow-blue-600/30 active:scale-[0.99] transition-all flex items-center justify-center space-x-2">
                    <span>Masuk ke Dashboard</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            <!-- Quick Credentials Helper -->
            <div class="mt-6 pt-6 border-t border-slate-800/80 text-center">
                <p class="text-xs text-slate-400 mb-2">Akun Default Admin:</p>
                <div class="bg-slate-950/60 rounded-xl p-3 border border-slate-800 text-xs font-mono text-slate-300 inline-block text-left w-full">
                    <div class="flex justify-between">
                        <span class="text-slate-500">Email:</span>
                        <span class="text-blue-400 font-semibold select-all">admin@sekolah.sch.id</span>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-slate-500">Password:</span>
                        <span class="text-indigo-400 font-semibold select-all">admin123</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Website -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 text-xs font-medium text-slate-400 hover:text-white transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali ke Halaman Utama Website</span>
            </a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const pwd = document.getElementById('password');
            if (pwd.type === 'password') {
                pwd.type = 'text';
            } else {
                pwd.type = 'password';
            }
        }
    </script>
</body>
</html>
