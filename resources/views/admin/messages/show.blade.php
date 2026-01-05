@extends('layouts.admin')

@section('title', 'View Message')
@section('subtitle', 'Detail pesan dari pengunjung')

@section('content')
    <div class="space-y-6">
    <x-page-header title="Detail Pesan" subtitle="Melihat detail korespondensi dari {{ $message->name }}">
        <x-slot:actions>
            <a href="{{ route('admin.messages.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-2xl">
        <x-content-card>
            <div class="space-y-8">
                <!-- Sender Info -->
                <div class="flex items-center gap-5 p-4 bg-emerald-50/50 rounded-2xl border border-emerald-100">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center font-bold text-2xl shadow-lg ring-4 ring-white">
                        {{ strtoupper(substr($message->name, 0, 2)) }}
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xl font-bold text-gray-900">{{ $message->name }}</h4>
                        <div class="flex items-center gap-3 mt-1 text-sm text-gray-500">
                            <span class="flex items-center gap-1.5"><i class="fas fa-envelope text-emerald-500"></i> {{ $message->email }}</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span class="flex items-center gap-1.5"><i class="fas fa-clock text-amber-500"></i> {{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Subject -->
                <div class="relative group">
                    <div class="absolute -left-6 top-0 bottom-0 w-1 bg-emerald-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <label class="text-[11px] font-bold text-emerald-600 uppercase tracking-[0.2em] mb-2 block">Subject</label>
                    <p class="text-lg text-gray-900 font-bold leading-tight">{{ $message->subject ?: 'Tanpa Subjek' }}</p>
                </div>

                <!-- Message Content -->
                <div>
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 block">Message body</label>
                    <div class="p-6 bg-gray-50 rounded-2xl text-gray-700 whitespace-pre-wrap leading-relaxed border border-gray-100 font-inter shadow-inner">
                        {{ $message->message }}
                    </div>
                </div>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-4 py-4 px-5 bg-blue-50/50 rounded-xl border border-blue-100 text-xs text-blue-700 font-medium">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt opacity-70"></i>
                        <span>Diterima pada {{ $message->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock opacity-70"></i>
                        <span>Pukul {{ $message->created_at->format('H:i') }} WIB</span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap items-center gap-3 pt-6 border-t border-gray-100">
                    <a href="mailto:{{ $message->email }}"
                        class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-200">
                        <i class="fas fa-reply"></i> Balas via Email
                    </a>
                    
                    <form id="delete-message-{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="flex-1 md:flex-none">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete('delete-message-{{ $message->id }}', 'pesan dari {{ $message->name }}')"
                            class="w-full inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-red-600 text-sm font-bold rounded-xl border border-red-100 hover:bg-red-50 hover:border-red-200 transition-all">
                            <i class="fas fa-trash-alt"></i> Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>
        </x-content-card>
    </div>
</div>
@endsection