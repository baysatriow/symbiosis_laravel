@extends('layouts.admin')

@section('title', 'Tambah Video YouTube')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-900">Tambah Video YouTube</h3>
        </div>
        
        <form action="{{ route('admin.youtube-videos.store') }}" method="POST" class="p-6 space-y-5">
            @csrf
            
            <div>
                <label for="video_id" class="block text-sm font-medium text-gray-700 mb-1">Video ID *</label>
                <input type="text" name="video_id" id="video_id" value="{{ old('video_id') }}" required
                       placeholder="contoh: dQw4w9WgXcQ"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
                <p class="mt-1 text-xs text-gray-500">ID dari URL YouTube, contoh: youtube.com/watch?v=<strong>dQw4w9WgXcQ</strong></p>
                @error('video_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="w-4 h-4 text-[#196164] border-gray-300 rounded focus:ring-[#196164]">
                <label for="is_active" class="ml-2 text-sm text-gray-700">Active (tampilkan di halaman About)</label>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit" 
                        class="px-4 py-2 bg-[#196164] text-white text-sm font-medium rounded-lg hover:bg-[#144d50] transition-colors">
                    Simpan Video
                </button>
                <a href="{{ route('admin.youtube-videos.index') }}" 
                   class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
