@extends('layouts.admin')

@section('title', 'Tambah Video YouTube')
@section('subtitle', 'Tambah video baru')

@section('content')
<div class="space-y-6">
    <x-page-header title="Tambah Video YouTube" subtitle="Masukkan ID video dari URL YouTube untuk ditampilkan di gallery">
        <x-slot:actions>
            <a href="{{ route('admin.youtube-videos.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-xl">
        <x-content-card>
            <form action="{{ route('admin.youtube-videos.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label for="video_id" class="block text-sm font-bold text-gray-700 mb-2">Video ID <span class="text-red-500">*</span></label>
                    <input type="text" name="video_id" id="video_id" value="{{ old('video_id') }}" required
                           placeholder="contoh: dQw4w9WgXcQ"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                    <div class="mt-3 p-3 bg-emerald-50 rounded-xl border border-emerald-100 flex items-start gap-3">
                        <i class="fab fa-youtube text-emerald-600 mt-0.5"></i>
                        <p class="text-[11px] text-emerald-800 font-medium leading-relaxed">ID dari URL: youtube.com/watch?v=<span class="font-bold underline">dQw4w9WgXcQ</span></p>
                    </div>
                    @error('video_id')
                        <p class="mt-2 text-sm text-red-500"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                           placeholder="Judul video (opsional)">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="sort_order" class="block text-sm font-bold text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                    </div>
                    <div class="md:pb-3 flex items-end">
                        <label class="flex items-center gap-3 cursor-pointer p-3.5 bg-gray-50 rounded-xl border border-gray-200 w-full transition-colors hover:bg-emerald-50 hover:border-emerald-200 group">
                            <div class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            </div>
                            <span class="text-xs font-bold text-gray-600 uppercase tracking-widest group-hover:text-emerald-700">Video Active</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit" 
                            class="flex-1 md:flex-none px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-200">
                        <i class="fas fa-save mr-2"></i> Simpan Video
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
