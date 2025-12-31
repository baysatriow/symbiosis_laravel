@extends('layouts.admin')

@section('title', 'View Message')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="font-semibold text-gray-900">Detail Pesan</h3>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>

            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">From</label>
                        <p class="mt-1 text-gray-900 font-medium">{{ $message->name }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Email</label>
                        <p class="mt-1 text-gray-900">{{ $message->email }}</p>
                    </div>
                </div>

                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</label>
                    <p class="mt-1 text-gray-900">{{ $message->subject ?: 'No Subject' }}</p>
                </div>

                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Received</label>
                    <p class="mt-1 text-gray-600 text-sm">{{ $message->created_at->format('d M Y H:i:s') }}</p>
                </div>

                <hr class="my-4">

                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Message</label>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg text-gray-800 whitespace-pre-wrap">{{ $message->message }}
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <a href="mailto:{{ $message->email }}"
                        class="px-4 py-2 bg-[#196164] text-white text-sm font-medium rounded-lg hover:bg-[#144d50] transition-colors">
                        <i class="fas fa-reply mr-2"></i> Reply
                    </a>
                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-50 text-red-600 text-sm font-medium rounded-lg hover:bg-red-100 transition-colors">
                            <i class="fas fa-trash mr-2"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection