@extends('layouts.admin')

@section('title', 'News / Blog')
@section('subtitle', 'Kelola berita dan artikel')

@section('content')
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50/50">
            <div>
                <h3 class="font-semibold text-gray-900">Daftar Berita</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $news->total() }} artikel ditemukan</p>
            </div>
            <a href="{{ route('admin.news.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                <i class="fas fa-plus"></i> Tulis Berita
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Image</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Title</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Published</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($news as $item)
                        <tr class="table-row-hover transition-colors">
                            <td class="px-6 py-4">
                                <img src="{{ Storage::url($item->image) }}" alt="" class="w-16 h-12 rounded-lg object-cover shadow-sm">
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-900">{{ Str::limit($item->title, 50) }}</p>
                                <p class="text-gray-500 text-xs mt-1">{{ Str::limit(strip_tags($item->content), 60) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if($item->published_at)
                                    <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-600">
                                        <i class="fas fa-check-circle text-[10px]"></i>
                                        {{ $item->published_at->format('d M Y') }}
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-600">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.news.edit', $item) }}"
                                        class="p-2.5 text-gray-500 hover:text-[#196164] hover:bg-[#e0f2f1] rounded-xl transition-all"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="delete-news-{{ $item->id }}" action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('delete-news-{{ $item->id }}', '{{ $item->title }}')"
                                            class="p-2.5 text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all"
                                            title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <i class="fas fa-newspaper text-5xl text-gray-200 mb-4"></i>
                                <p class="text-gray-500">Belum ada berita</p>
                                <a href="{{ route('admin.news.create') }}" class="text-[#196164] hover:underline text-sm mt-2 inline-block">
                                    <i class="fas fa-plus mr-1"></i> Tulis berita pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $news->links() }}
            </div>
        @endif
    </div>
@endsection