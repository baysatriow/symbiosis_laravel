@extends('layouts.admin')

@section('title', 'Messages')
@section('subtitle', 'Pesan dari pengunjung website')

@section('content')
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50/50">
            <div>
                <h3 class="font-semibold text-gray-900">Daftar Pesan</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $messages->total() }} pesan diterima</p>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Pengirim</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Subject</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Waktu</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($messages as $message)
                        <tr class="table-row-hover transition-colors {{ !$message->is_read ? 'bg-[#e0f2f1]/30' : '' }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 text-white flex items-center justify-center font-semibold text-sm shadow-sm">
                                        {{ strtoupper(substr($message->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 flex items-center gap-2">
                                            {{ $message->name }}
                                            @if(!$message->is_read)
                                                <span class="w-2 h-2 rounded-full bg-[#196164] animate-pulse"></span>
                                            @endif
                                        </p>
                                        <p class="text-gray-500 text-xs">{{ $message->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-gray-900">{{ $message->subject ?: 'Tanpa Subjek' }}</p>
                                <p class="text-gray-500 text-xs mt-1">{{ Str::limit($message->message, 50) }}</p>
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-xs">
                                {{ $message->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.messages.show', $message) }}"
                                        class="p-2.5 text-gray-500 hover:text-[#196164] hover:bg-[#e0f2f1] rounded-xl transition-all"
                                        title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form id="delete-message-{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('delete-message-{{ $message->id }}', 'pesan dari {{ $message->name }}')"
                                            class="p-2.5 text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all"
                                            title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <i class="fas fa-inbox text-5xl text-gray-200 mb-4"></i>
                                <p class="text-gray-500">Belum ada pesan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection