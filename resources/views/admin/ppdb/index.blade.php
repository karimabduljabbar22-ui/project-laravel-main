@extends('layouts.admin')

@section('title', 'Data PPDB')
@section('breadcrumb', 'PPDB')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-xl font-bold text-white">Data Pendaftar PPDB</h1>
            <p class="text-slate-400 text-sm mt-0.5">Penerimaan Peserta Didik Baru</p>
        </div>
        <a href="{{ route('admin.ppdb.waves') }}"
           class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl border border-slate-700 text-slate-300 hover:text-white hover:border-slate-600 text-sm font-medium transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span>Gelombang PPDB</span>
        </a>
    </div>

    <!-- Stats Summary -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        @foreach([
            ['label' => 'Total Pendaftar', 'value' => $stats['total'] ?? 0, 'color' => 'blue'],
            ['label' => 'Menunggu', 'value' => $stats['pending'] ?? 0, 'color' => 'amber'],
            ['label' => 'Diterima', 'value' => $stats['accepted'] ?? 0, 'color' => 'emerald'],
            ['label' => 'Ditolak', 'value' => $stats['rejected'] ?? 0, 'color' => 'red'],
        ] as $stat)
            <div class="rounded-xl border border-slate-800/70 bg-slate-900/50 p-4">
                <p class="text-xs text-slate-500">{{ $stat['label'] }}</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    <!-- Table -->
    <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-800/70">
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">No Daftar</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Nama Calon Siswa</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Asal Sekolah</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Gelombang</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3.5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($applicants as $applicant)
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="px-5 py-3.5 text-xs font-mono text-slate-400">{{ $applicant->registration_number ?? '#'.str_pad($applicant->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-5 py-3.5">
                                <p class="text-sm font-semibold text-white">{{ $applicant->full_name }}</p>
                                <p class="text-xs text-slate-500">{{ $applicant->email ?? '-' }}</p>
                            </td>
                            <td class="px-5 py-3.5 text-sm text-slate-400">{{ $applicant->previous_school ?? '-' }}</td>
                            <td class="px-5 py-3.5 text-sm text-slate-400">{{ $applicant->ppdbWave->name ?? 'Gelombang 1' }}</td>
                            <td class="px-5 py-3.5">
                                @php
                                    $statusMap = [
                                        'pending' => ['label' => 'Menunggu', 'class' => 'bg-amber-500/10 border-amber-500/20 text-amber-400'],
                                        'accepted' => ['label' => 'Diterima', 'class' => 'bg-emerald-500/10 border-emerald-500/20 text-emerald-400'],
                                        'rejected' => ['label' => 'Ditolak', 'class' => 'bg-red-500/10 border-red-500/20 text-red-400'],
                                    ];
                                    $status = $statusMap[$applicant->status ?? 'pending'] ?? $statusMap['pending'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold border {{ $status['class'] }}">{{ $status['label'] }}</span>
                            </td>
                            <td class="px-5 py-3.5">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.ppdb.show', $applicant) }}" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition" title="Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-14 text-center">
                                <svg class="w-10 h-10 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <p class="text-slate-500 text-sm">Belum ada data pendaftar</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(isset($applicants) && method_exists($applicants, 'links'))
            <div class="px-5 py-4 border-t border-slate-800/60">{{ $applicants->links() }}</div>
        @endif
    </div>

@endsection
