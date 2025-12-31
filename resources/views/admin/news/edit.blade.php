@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-900">Edit Berita</h3>
            </div>

            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-1">Excerpt *</label>
                    <textarea name="excerpt" id="excerpt" rows="2" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">{{ old('excerpt', $news->excerpt) }}</textarea>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content *</label>
                    <textarea name="content" id="content" rows="6" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">{{ old('content', $news->content) }}</textarea>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    @if($news->image)
                        <img src="{{ Storage::url($news->image) }}" alt="" class="w-32 h-24 rounded object-cover mb-2">
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
                </div>

                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">Publish Date</label>
                    <input type="datetime-local" name="published_at" id="published_at"
                        value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#196164] focus:border-transparent">
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-[#196164] text-white text-sm font-medium rounded-lg hover:bg-[#144d50] transition-colors">
                        Update Berita
                    </button>
                    <a href="{{ route('admin.news.index') }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection