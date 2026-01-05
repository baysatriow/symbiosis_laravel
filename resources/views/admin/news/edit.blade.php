@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('subtitle', 'Perbarui artikel')

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
                        <h3 class="font-semibold text-gray-900">Edit Berita</h3>
                        <p class="text-sm text-gray-500">{{ Str::limit($news->title, 40) }}</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt <span class="text-red-500">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="2" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">{{ old('excerpt', $news->excerpt) }}</textarea>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="8" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">{{ old('content', $news->content) }}</textarea>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    @if($news->image)
                        <div class="mb-3 relative inline-block">
                            <img src="{{ Storage::url($news->image) }}" alt="" class="w-40 h-28 rounded-xl object-cover shadow-sm">
                            <span class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs">
                                <i class="fas fa-check"></i>
                            </span>
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                    <p class="mt-2 text-xs text-gray-500"><i class="fas fa-info-circle mr-1"></i> Kosongkan jika tidak ingin mengubah gambar</p>
                </div>

                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Publish Date</label>
                    <input type="datetime-local" name="published_at" id="published_at"
                        value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                        <i class="fas fa-save mr-2"></i> Update Berita
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