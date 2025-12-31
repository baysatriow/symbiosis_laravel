@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-900">Edit Project</h3>
        </div>
        
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $project->subtitle) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                <input type="text" name="category" id="category" value="{{ old('category', $project->category) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">{{ old('description', $project->description) }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                @if($project->image)
                    <img src="{{ Storage::url($project->image) }}" alt="" class="w-32 h-24 rounded object-cover mb-2">
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
                <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah gambar</p>
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $project->sort_order) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" 
                       {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                       class="w-4 h-4 text-[#196164] border-gray-300 rounded focus:ring-[#196164]">
                <label for="is_featured" class="ml-2 text-sm text-gray-700">Featured Project</label>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit" 
                        class="px-4 py-2 bg-[#196164] text-white text-sm font-medium rounded-lg hover:bg-[#144d50] transition-colors">
                    Update Project
                </button>
                <a href="{{ route('admin.projects.index') }}" 
                   class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
