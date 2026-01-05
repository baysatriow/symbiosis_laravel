@extends('layouts.admin')

@section('title', 'Tambah Project')
@section('subtitle', 'Buat project baru')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.projects.index') }}" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h3 class="font-semibold text-gray-900">Tambah Project Baru</h3>
                    <p class="text-sm text-gray-500">Isi form berikut untuk menambah project</p>
                </div>
            </div>
        </div>
        
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                       placeholder="Masukkan judul project">
                @error('title')
                    <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                       placeholder="Deskripsi singkat (opsional)">
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                <select name="category" id="category" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                    <option value="">Pilih kategori</option>
                    <option value="Youtube" {{ old('category') == 'Youtube' ? 'selected' : '' }}>Youtube</option>
                    <option value="Instagram" {{ old('category') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="Tiktok" {{ old('category') == 'Tiktok' ? 'selected' : '' }}>Tiktok</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                          placeholder="Deskripsi lengkap project">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image <span class="text-red-500">*</span></label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-[#196164] transition-colors">
                    <div class="space-y-1 text-center">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-300"></i>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer rounded-md font-medium text-[#196164] hover:text-[#144d50]">
                                <span>Upload gambar</span>
                                <input type="file" name="image" id="image" accept="image/*" required class="sr-only">
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                    </div>
                </div>
                @error('image')
                    <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                </div>
                <div class="flex items-end pb-3">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                               class="w-5 h-5 text-[#196164] border-gray-300 rounded focus:ring-[#196164]">
                        <span class="text-sm text-gray-700">Featured Project</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                    <i class="fas fa-save mr-2"></i> Simpan Project
                </button>
                <a href="{{ route('admin.projects.index') }}" 
                   class="px-6 py-3 bg-gray-100 text-gray-700 text-sm font-medium rounded-xl hover:bg-gray-200 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
