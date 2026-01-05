@extends('layouts.admin')

@section('title', 'Edit Project')
@section('subtitle', 'Perbarui informasi project')

@section('content')
<div class="space-y-6" x-data="imagePreview('{{ $project->image ? Storage::url($project->image) : '' }}')">
    <x-page-header title="Edit Project" subtitle="Perbarui informasi untuk project '{{ $project->title }}'">
        <x-slot:actions>
            <a href="{{ route('admin.projects.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-2xl">
        <x-content-card>
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                           placeholder="Masukkan judul project">
                    @error('title')
                        <p class="mt-2 text-sm text-red-500"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="subtitle" class="block text-sm font-bold text-gray-700 mb-2">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $project->subtitle) }}"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                           placeholder="Deskripsi singkat (opsional)">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="category" class="block text-sm font-bold text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                        <select name="category" id="category" required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                            <option value="Youtube" {{ old('category', $project->category) == 'Youtube' ? 'selected' : '' }}>Youtube</option>
                            <option value="Instagram" {{ old('category', $project->category) == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                            <option value="Tiktok" {{ old('category', $project->category) == 'Tiktok' ? 'selected' : '' }}>Tiktok</option>
                        </select>
                    </div>
                    <div>
                        <label for="sort_order" class="block text-sm font-bold text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $project->sort_order) }}"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                              placeholder="Deskripsi lengkap project">{{ old('description', $project->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Image</label>
                    
                    <!-- Image Preview -->
                    <div x-show="imageUrl" class="mb-4">
                        <div class="relative w-full max-w-sm aspect-video rounded-2xl overflow-hidden border-4 border-white shadow-lg ring-1 ring-gray-100">
                            <img :src="imageUrl" class="w-full h-full object-cover">
                            <button type="button" @click="imageUrl = null; $refs.imageInput.value = ''" 
                                    class="absolute top-2 right-2 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-600 transition-colors">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-200 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-emerald-50 hover:border-emerald-200 transition-all group">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-gray-400 group-hover:text-emerald-500 transition-colors mb-3">
                                    <i class="fas fa-cloud-upload-alt text-xl"></i>
                                </div>
                                <p class="text-sm text-gray-500"><span class="font-bold text-emerald-600">Klik untuk ganti gambar</span> atau drag & drop</p>
                                <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-bold">PNG, JPG, GIF (MAX 2MB)</p>
                            </div>
                            <input id="image" name="image" type="file" class="hidden" accept="image/*" @change="previewImage" x-ref="imageInput">
                        </label>
                    </div>
                </div>

                <div class="p-4 bg-emerald-50 rounded-2xl border border-emerald-100">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <div class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                        </div>
                        <span class="text-sm font-bold text-emerald-900 uppercase tracking-wider">Featured Project</span>
                    </label>
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit" 
                            class="flex-1 md:flex-none px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-200">
                        <i class="fas fa-save mr-2"></i> Update Project
                    </button>
                    <a href="{{ route('admin.projects.index') }}" 
                       class="flex-1 md:flex-none px-8 py-3.5 bg-gray-100 text-gray-700 text-sm font-bold rounded-xl hover:bg-gray-200 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </x-content-card>
    </div>
</div>

@push('scripts')
<script>
function imagePreview(existingImage = null) {
    return {
        imageUrl: existingImage,
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                this.imageUrl = URL.createObjectURL(file);
            }
        }
    }
}
</script>
@endpush
@endsection
