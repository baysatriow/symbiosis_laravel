@extends('layouts.admin')

@section('title', 'Edit Video YouTube')
@section('subtitle', 'Perbarui video')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.youtube-videos.index') }}" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h3 class="font-semibold text-gray-900">Edit Video YouTube</h3>
                    <p class="text-sm text-gray-500">{{ $youtubeVideo->title ?: 'Video ' . $youtubeVideo->video_id }}</p>
                </div>
            </div>
        </div>
        
        <form action="{{ route('admin.youtube-videos.update', $youtubeVideo) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <!-- Video Preview -->
            <div class="flex justify-center">
                <div class="relative">
                    <img src="https://img.youtube.com/vi/{{ $youtubeVideo->video_id }}/mqdefault.jpg" 
                         alt="" class="w-56 h-32 rounded-xl object-cover shadow-md">
                    <a href="https://youtube.com/watch?v={{ $youtubeVideo->video_id }}" target="_blank"
                       class="absolute inset-0 flex items-center justify-center bg-black/30 rounded-xl hover:bg-black/40 transition-colors">
                        <i class="fab fa-youtube text-4xl text-red-500"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <label for="video_id" class="block text-sm font-medium text-gray-700 mb-2">Video ID <span class="text-red-500">*</span></label>
                <input type="text" name="video_id" id="video_id" value="{{ old('video_id', $youtubeVideo->video_id) }}" required
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $youtubeVideo->title) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $youtubeVideo->sort_order) }}"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                </div>
                <div class="flex items-end pb-3">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" id="is_active" value="1" 
                               {{ old('is_active', $youtubeVideo->is_active) ? 'checked' : '' }}
                               class="w-5 h-5 text-[#196164] border-gray-300 rounded focus:ring-[#196164]">
                        <span class="text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                    <i class="fas fa-save mr-2"></i> Update Video
                </button>
                <a href="{{ route('admin.youtube-videos.index') }}" 
                   class="px-6 py-3 bg-gray-100 text-gray-700 text-sm font-medium rounded-xl hover:bg-gray-200 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
