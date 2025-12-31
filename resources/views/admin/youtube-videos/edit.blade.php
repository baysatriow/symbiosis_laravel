@extends('layouts.admin')

@section('title', 'Edit Video YouTube')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-900">Edit Video YouTube</h3>
        </div>
        
        <form action="{{ route('admin.youtube-videos.update', $youtubeVideo) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div class="flex justify-center">
                <img src="https://img.youtube.com/vi/{{ $youtubeVideo->video_id }}/mqdefault.jpg" 
                     alt="" class="w-48 h-28 rounded-lg object-cover">
            </div>
            
            <div>
                <label for="video_id" class="block text-sm font-medium text-gray-700 mb-1">Video ID *</label>
                <input type="text" name="video_id" id="video_id" value="{{ old('video_id', $youtubeVideo->video_id) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $youtubeVideo->title) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $youtubeVideo->sort_order) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                       {{ old('is_active', $youtubeVideo->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 text-[#196164] border-gray-300 rounded focus:ring-[#196164]">
                <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit" 
                        class="px-4 py-2 bg-[#196164] text-white text-sm font-medium rounded-lg hover:bg-[#144d50] transition-colors">
                    Update Video
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
