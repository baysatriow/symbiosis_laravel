@extends('layouts.admin')

@section('title', 'View Message')
@section('subtitle', 'Detail pesan dari pengunjung')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.messages.index') }}" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h3 class="font-semibold text-gray-900">Detail Pesan</h3>
                        <p class="text-sm text-gray-500">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-6">
                <!-- Sender Info -->
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 text-white flex items-center justify-center font-bold text-lg shadow-md">
                        {{ strtoupper(substr($message->name, 0, 2)) }}
                    </div>
                    <div class="flex-1">
                        <h4 class="text-lg font-semibold text-gray-900">{{ $message->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $message->email }}</p>
                    </div>
                </div>

                <!-- Subject -->
                <div class="bg-[#e0f2f1] rounded-xl px-4 py-3">
                    <label class="text-xs font-medium text-[#196164] uppercase tracking-wider">Subject</label>
                    <p class="mt-1 text-gray-900 font-medium">{{ $message->subject ?: 'Tanpa Subjek' }}</p>
                </div>

                <!-- Timestamp -->
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <i class="fas fa-clock"></i>
                    <span>Diterima pada {{ $message->created_at->format('d M Y') }} pukul {{ $message->created_at->format('H:i') }} WIB</span>
                </div>

                <hr class="border-gray-100">

                <!-- Message Content -->
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Pesan</label>
                    <div class="mt-3 p-5 bg-gray-50 rounded-2xl text-gray-800 whitespace-pre-wrap leading-relaxed">{{ $message->message }}</div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <a href="mailto:{{ $message->email }}"
                        class="px-6 py-3 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                        <i class="fas fa-reply mr-2"></i> Balas via Email
                    </a>
                    <form id="delete-message-{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete('delete-message-{{ $message->id }}', 'pesan dari {{ $message->name }}')"
                            class="px-6 py-3 bg-red-50 text-red-600 text-sm font-medium rounded-xl hover:bg-red-100 transition-all">
                            <i class="fas fa-trash mr-2"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection