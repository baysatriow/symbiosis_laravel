@extends('layouts.admin')

@section('title', 'Edit Project')
@section('subtitle', 'Perbarui informasi project')

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
                    <h3 class="font-semibold text-gray-900">Edit Project</h3>
                    <p class="text-sm text-gray-500">{{ $project->title }}</p>
                </div>
            </div>
        </div>
        
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                @error('title')
                    <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $project->subtitle) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                <select name="category" id="category" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                    <option value="Youtube" {{ old('category', $project->category) == 'Youtube' ? 'selected' : '' }}>Youtube</option>
                    <option value="Instagram" {{ old('category', $project->category) == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="Tiktok" {{ old('category', $project->category) == 'Tiktok' ? 'selected' : '' }}>Tiktok</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">{{ old('description', $project->description) }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                @if($project->image)
                    <div class="mb-3 relative inline-block">
                        <img src="{{ Storage::url($project->image) }}" alt="" class="w-40 h-28 rounded-xl object-cover shadow-sm">
                        <span class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                <p class="mt-2 text-xs text-gray-500"><i class="fas fa-info-circle mr-1"></i> Kosongkan jika tidak ingin mengubah gambar</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $project->sort_order) }}"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                </div>
                <div class="flex items-end pb-3">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" 
                               {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                               class="w-5 h-5 text-[#196164] border-gray-300 rounded focus:ring-[#196164]">
                        <span class="text-sm text-gray-700">Featured Project</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                    <i class="fas fa-save mr-2"></i> Update Project
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
