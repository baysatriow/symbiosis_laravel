@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('subtitle', 'Perbarui artikel')

@section('content')
    <div class="space-y-6" x-data="imagePreview('{{ $news->image ? Storage::url($news->image) : '' }}')">
    <x-page-header title="Edit Berita" subtitle="Perbarui artikel '{{ $news->title }}'">
        <x-slot:actions>
            <a href="{{ route('admin.news.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-2xl">
        <x-content-card>
            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="Judul artikel">
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-bold text-gray-700 mb-2">Excerpt <span class="text-red-500">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="2" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="Ringkasan singkat artikel">{{ old('excerpt', $news->excerpt) }}</textarea>
                </div>

                <div>
                    <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="8" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="Isi lengkap artikel">{{ old('content', $news->content) }}</textarea>
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
                                    <i class="fas fa-image text-xl"></i>
                                </div>
                                <p class="text-sm text-gray-500"><span class="font-bold text-emerald-600">Klik untuk ganti gambar</span> atau drag & drop</p>
                                <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-bold">PNG, JPG, GIF (MAX 2MB)</p>
                            </div>
                            <input id="image" name="image" type="file" class="hidden" accept="image/*" @change="previewImage" x-ref="imageInput">
                        </label>
                    </div>
                </div>

                <div>
                    <label for="published_at" class="block text-sm font-bold text-gray-700 mb-2">Publish Date</label>
                    <input type="datetime-local" name="published_at" id="published_at"
                        value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="flex-1 md:flex-none px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-200">
                        <i class="fas fa-save mr-2"></i> Update Berita
                    </button>
                    <a href="{{ route('admin.news.index') }}"
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