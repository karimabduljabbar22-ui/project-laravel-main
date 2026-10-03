@extends('layouts.admin')

@section('title', 'Manajemen Pesan Masuk')
@section('breadcrumb', 'Pesan Masuk')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-xl font-bold text-white">Pesan Masuk</h1>
            <p class="text-slate-400 text-sm mt-0.5">
                Pesan dari pengunjung website.
                @if(isset($unreadCount) && $unreadCount > 0)
                    <span class="text-amber-400 font-semibold">{{ $unreadCount }} pesan belum dibaca.</span>
                @endif
            </p>
        </div>
    </div>

    <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-800/70">
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pengirim</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Subjek</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-5 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3.5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($contacts as $contact)
                        <tr class="hover:bg-slate-800/30 transition-colors {{ !($contact->is_read ?? true) ? 'bg-blue-500/5' : '' }}">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white text-xs font-bold shrink-0">
                                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-white">{{ $contact->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $contact->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5">
                                <p class="text-sm text-white {{ !($contact->is_read ?? true) ? 'font-semibold' : '' }}">{{ $contact->subject }}</p>
                                <p class="text-xs text-slate-500 truncate max-w-xs">{{ Str::limit($contact->message, 60) }}</p>
                            </td>
                            <td class="px-5 py-3.5 text-xs text-slate-400 whitespace-nowrap">{{ $contact->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-5 py-3.5">
                                @if($contact->is_read ?? false)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-slate-500/10 border border-slate-500/20 text-slate-400">Dibaca</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-500/10 border border-amber-500/20 text-amber-400">Belum Dibaca</span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                       class="p-1.5 rounded-lg text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 transition" title="Lihat Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center">
                                <svg class="w-10 h-10 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                                <p class="text-slate-500 text-sm">Tidak ada pesan masuk</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(isset($contacts) && method_exists($contacts, 'links'))
            <div class="px-5 py-4 border-t border-slate-800/60">{{ $contacts->links() }}</div>
        @endif
    </div>

@endsection
