@extends('layouts.admin')

@section('title', 'Edit Video YouTube')
@section('subtitle', 'Perbarui video')

@section('content')
<div class="space-y-6">
    <x-page-header title="Edit Video YouTube" subtitle="Perbarui video '{{ $youtubeVideo->title ?: $youtubeVideo->video_id }}'">
        <x-slot:actions>
            <a href="{{ route('admin.youtube-videos.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-xl">
        <x-content-card>
            <form action="{{ route('admin.youtube-videos.update', $youtubeVideo) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Video Preview -->
                <div class="flex justify-center mb-6">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative">
                            <img src="https://img.youtube.com/vi/{{ $youtubeVideo->video_id }}/mqdefault.jpg" 
                                 alt="" class="w-64 h-36 rounded-2xl object-cover border-4 border-white shadow-xl">
                            <a href="https://youtube.com/watch?v={{ $youtubeVideo->video_id }}" target="_blank"
                               class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-2xl opacity-0 group-hover:opacity-100 transition-all duration-300 backdrop-blur-[2px]">
                                <div class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                                    <i class="fab fa-youtube text-2xl"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label for="video_id" class="block text-sm font-bold text-gray-700 mb-2">Video ID <span class="text-red-500">*</span></label>
                    <input type="text" name="video_id" id="video_id" value="{{ old('video_id', $youtubeVideo->video_id) }}" required
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                </div>

                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $youtubeVideo->title) }}"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                           placeholder="Judul video (opsional)">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="sort_order" class="block text-sm font-bold text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $youtubeVideo->sort_order) }}"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                    </div>
                    <div class="md:pb-3 flex items-end">
                        <label class="flex items-center gap-3 cursor-pointer p-3.5 bg-gray-50 rounded-xl border border-gray-200 w-full transition-colors hover:bg-emerald-50 hover:border-emerald-200 group">
                            <div class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $youtubeVideo->is_active) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            </div>
                            <span class="text-xs font-bold text-gray-600 uppercase tracking-widest group-hover:text-emerald-700">Video Active</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit" 
                            class="flex-1 md:flex-none px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-200">
                        <i class="fas fa-save mr-2"></i> Update Video
                    </button>
                    <a href="{{ route('admin.youtube-videos.index') }}" 
                       class="flex-1 md:flex-none px-8 py-3.5 bg-gray-100 text-gray-700 text-sm font-bold rounded-xl hover:bg-gray-200 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </x-content-card>
    </div>
</div>
@endsection
