@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')
@section('breadcrumb', 'Manajemen User')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-xl font-bold text-white">Manajemen User</h1>
            <p class="text-slate-400 text-sm mt-0.5">Kelola akun pengguna admin panel</p>
        </div>
        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm shadow-lg shadow-blue-600/20 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            <span>Tambah User</span>
        </a>
    </div>

    <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-800/70">
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pengguna</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Role</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bergabung</th>
                        <th class="px-5 py-3.5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white text-sm font-bold shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-white flex items-center space-x-1.5">
                                            <span>{{ $user->name }}</span>
                                            @if($user->id === auth()->id())
                                                <span class="text-[10px] px-1.5 py-0.5 rounded bg-blue-500/20 text-blue-400 font-semibold">Anda</span>
                                            @endif
                                        </p>
                                        <p class="text-xs text-slate-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5">
                                @php
                                    $roleColors = [
                                        'super_admin' => 'bg-purple-500/10 border-purple-500/20 text-purple-400',
                                        'operator_ppdb' => 'bg-blue-500/10 border-blue-500/20 text-blue-400',
                                        'editor_konten' => 'bg-emerald-500/10 border-emerald-500/20 text-emerald-400',
                                    ];
                                    $roleClass = $roleColors[$user->role] ?? 'bg-slate-500/10 border-slate-500/20 text-slate-400';
                                    $roleLabel = ucfirst(str_replace('_', ' ', $user->role));
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold border {{ $roleClass }}">{{ $roleLabel }}</span>
                            </td>
                            <td class="px-5 py-3.5">
                                @if($user->is_active)
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-emerald-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        <span>Aktif</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-slate-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                        <span>Nonaktif</span>
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-xs text-slate-400">{{ $user->created_at->format('d M Y') }}</td>
                            <td class="px-5 py-3.5">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center">
                                <p class="text-slate-500 text-sm">Belum ada pengguna</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
