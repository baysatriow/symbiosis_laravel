@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-900">Daftar Pesan</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Status</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Name</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Subject</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Date</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($messages as $message)
                        <tr class="hover:bg-gray-50 {{ !$message->is_read ? 'bg-blue-50' : '' }}">
                            <td class="px-6 py-4">
                                @if(!$message->is_read)
                                    <span class="w-2 h-2 rounded-full bg-[#196164] inline-block"></span>
                                @else
                                    <span class="w-2 h-2 rounded-full bg-gray-300 inline-block"></span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $message->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $message->email }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ Str::limit($message->subject ?: 'No Subject', 30) }}</td>
                            <td class="px-6 py-4 text-gray-500 text-xs">{{ $message->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.messages.show', $message) }}"
                                        class="p-2 text-gray-600 hover:text-[#196164] hover:bg-gray-100 rounded-lg transition-colors">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-gray-600 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada pesan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection