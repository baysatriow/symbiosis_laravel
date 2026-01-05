@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('subtitle', 'Tulis artikel baru')

@section('content')
    <div class="space-y-6" x-data="imagePreview()">
    <x-page-header title="Tambah Berita" subtitle="Tulis artikel berita atau blog baru untuk website">
        <x-slot:actions>
            <a href="{{ route('admin.news.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-2xl">
        <x-content-card>
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="Judul artikel">
                    @error('title')
                        <p class="mt-2 text-sm text-red-500"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-bold text-gray-700 mb-2">Excerpt <span class="text-red-500">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="2" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="Ringkasan singkat artikel">{{ old('excerpt') }}</textarea>
                </div>

                <div>
                    <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="8" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="Isi lengkap artikel">{{ old('content') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Image <span class="text-red-500">*</span></label>
                    
                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-200 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-emerald-50 hover:border-emerald-200 transition-all group overflow-hidden">
                            <!-- Show this when NO image is selected -->
                            <div x-show="!imageUrl" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-gray-400 group-hover:text-emerald-500 transition-colors mb-3">
                                    <i class="fas fa-image text-xl"></i>
                                </div>
                                <p class="text-sm text-gray-500"><span class="font-bold text-emerald-600">Klik untuk upload</span> atau drag & drop</p>
                                <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-bold">PNG, JPG, GIF (MAX 2MB)</p>
                            </div>

                            <!-- Show this when an image IS selected -->
                            <template x-if="imageUrl">
                                <div class="absolute inset-0 w-full h-full">
                                    <img :src="imageUrl" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <p class="text-white font-bold text-sm bg-black/20 px-4 py-2 rounded-lg backdrop-blur-sm">Ganti Gambar</p>
                                    </div>
                                    <button type="button" @click.prevent="imageUrl = null; $refs.imageInput.value = ''" 
                                            class="absolute top-3 right-3 z-10 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-600 transition-all hover:scale-110">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                            </template>

                            <input id="image" name="image" type="file" class="hidden" accept="image/*" required @change="previewImage" x-ref="imageInput">
                        </label>
                    </div>
                </div>

                <div>
                    <label for="published_at" class="block text-sm font-bold text-gray-700 mb-2">Publish Date</label>
                    <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                    <div class="mt-3 p-3 bg-blue-50 rounded-xl border border-blue-100 flex items-start gap-3">
                        <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                        <p class="text-[11px] text-blue-700 font-medium leading-relaxed">Kosongkan kolom di atas jika Anda ingin menyimpan artikel ini sebagai draft terlebih dahulu sebelum dipublikasikan.</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="flex-1 md:flex-none px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-200">
                        <i class="fas fa-save mr-2"></i> Simpan Berita
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
function imagePreview() {
    return {
        imageUrl: null,
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