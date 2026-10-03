@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('breadcrumb', 'Detail Pesan')

@section('content')

    <div class="flex items-center space-x-3 mb-8">
        <a href="{{ route('admin.contacts.index') }}" class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="text-xl font-bold text-white">Detail Pesan Masuk</h1>
    </div>

    <div class="max-w-2xl">
        <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
            <!-- Header -->
            <div class="p-6 border-b border-slate-800/60">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white text-lg font-bold shrink-0">
                            {{ strtoupper(substr($contact->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-bold text-white">{{ $contact->name }}</p>
                            <a href="mailto:{{ $contact->email }}" class="text-sm text-blue-400 hover:text-blue-300 transition">{{ $contact->email }}</a>
                        </div>
                    </div>
                    <span class="shrink-0 text-xs text-slate-500">{{ $contact->created_at->format('d M Y, H:i') }}</span>
                </div>
            </div>

            <!-- Subject -->
            <div class="px-6 py-4 border-b border-slate-800/60 bg-slate-800/20">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Subjek</p>
                <p class="font-semibold text-white">{{ $contact->subject }}</p>
            </div>

            <!-- Message -->
            <div class="px-6 py-5">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-3">Pesan</p>
                <div class="text-sm text-slate-300 leading-relaxed whitespace-pre-line">{{ $contact->message }}</div>
            </div>

            <!-- Actions -->
            <div class="px-6 py-4 border-t border-slate-800/60 flex items-center justify-between">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}"
                   class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Balas via Email</span>
                </a>
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl border border-red-500/30 text-red-400 hover:bg-red-500/10 text-sm font-medium transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        <span>Hapus Pesan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
