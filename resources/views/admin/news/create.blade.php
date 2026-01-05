@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('subtitle', 'Tulis artikel baru')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.news.index') }}" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h3 class="font-semibold text-gray-900">Tambah Berita Baru</h3>
                        <p class="text-sm text-gray-500">Isi form berikut untuk membuat artikel</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                        placeholder="Judul artikel">
                    @error('title')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt <span class="text-red-500">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="2" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                        placeholder="Ringkasan singkat artikel">{{ old('excerpt') }}</textarea>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="8" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                        placeholder="Isi lengkap artikel">{{ old('content') }}</textarea>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image <span class="text-red-500">*</span></label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-[#196164] transition-colors">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-image text-3xl text-gray-300"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer rounded-md font-medium text-[#196164] hover:text-[#144d50]">
                                    <span>Upload gambar</span>
                                    <input type="file" name="image" id="image" accept="image/*" required class="sr-only">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Publish Date</label>
                    <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                    <p class="mt-2 text-xs text-gray-500"><i class="fas fa-info-circle mr-1"></i> Kosongkan untuk menyimpan sebagai draft</p>
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                        <i class="fas fa-save mr-2"></i> Simpan Berita
                    </button>
                    <a href="{{ route('admin.news.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 text-sm font-medium rounded-xl hover:bg-gray-200 transition-all">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection