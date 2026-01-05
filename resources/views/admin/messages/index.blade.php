@extends('layouts.admin')

@section('title', 'Messages')
@section('subtitle', 'Pesan dari pengunjung website yang masuk melalui form kontak')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Daftar Pesan" subtitle="{{ $messages->total() }} pesan diterima">
        </x-page-header>

        <x-content-card class="!p-0 overflow-hidden">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm font-inter">
                    <thead>
                        <tr class="bg-gray-50 text-left">
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Pengirim</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Subject</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Waktu</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($messages as $message)
                            <tr class="hover:bg-gray-50 transition-colors {{ !$message->is_read ? 'bg-emerald-50/20' : '' }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs ring-4 ring-emerald-50 shadow-sm">
                                            {{ strtoupper(substr($message->name, 0, 2)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-semibold text-gray-900 flex items-center gap-2 truncate">
                                                {{ $message->name }}
                                                @if(!$message->is_read)
                                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                                @endif
                                            </p>
                                            <p class="text-gray-500 text-[11px] truncate">{{ $message->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-gray-900 line-clamp-1">{{ $message->subject ?: 'Tanpa Subjek' }}</p>
                                    <p class="text-gray-500 text-[11px] mt-0.5 line-clamp-1">{{ Str::limit($message->message, 60) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs text-gray-500 font-medium">
                                        <i class="far fa-clock mr-1 opacity-50"></i>
                                        {{ $message->created_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="{{ route('admin.messages.show', $message) }}"
                                            class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all"
                                            title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form id="delete-message-{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('delete-message-{{ $message->id }}', 'pesan dari {{ $message->name }}')"
                                                class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-inter">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-inbox text-3xl text-gray-200"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada pesan masuk</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($messages->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $messages->links() }}
                </div>
            @endif
        </x-content-card>
    </div>
@endsection