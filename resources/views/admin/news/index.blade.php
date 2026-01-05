@extends('layouts.admin')

@section('title', 'News / Blog')
@section('subtitle', 'Kelola informasi dan artikel berita terbaru')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Daftar Berita" subtitle="{{ $news->total() }} artikel ditemukan">
            <x-slot:actions>
                <a href="{{ route('admin.news.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-xl transition-all shadow-sm">
                    <i class="fas fa-plus"></i> Tulis Berita
                </a>
            </x-slot:actions>
        </x-page-header>

        <x-content-card class="!p-0 overflow-hidden">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm font-inter">
                    <thead>
                        <tr class="bg-gray-50 text-left">
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Image</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Title</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Published</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($news as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="w-16 h-12 rounded-lg bg-gray-100 overflow-hidden shadow-sm">
                                        @if($item->image)
                                            <img src="{{ Storage::url($item->image) }}" alt="" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-gray-900 line-clamp-1">{{ $item->title }}</p>
                                    <p class="text-gray-500 text-xs mt-1">{{ Str::limit(strip_tags($item->content), 60) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($item->published_at)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <i class="fas fa-check-circle text-[10px]"></i>
                                            {{ $item->published_at->format('d M Y') }}
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1 text-xs font-bold rounded-full bg-amber-50 text-amber-600 border border-amber-100">
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="{{ route('admin.news.edit', $item) }}"
                                            class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="delete-news-{{ $item->id }}" action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('delete-news-{{ $item->id }}', '{{ $item->title }}')"
                                                class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-inter">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-newspaper text-3xl text-gray-200"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada berita</p>
                                        <a href="{{ route('admin.news.create') }}" class="text-emerald-600 hover:underline text-sm mt-1">
                                            Tulis berita pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($news->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $news->links() }}
                </div>
            @endif
        </x-content-card>
    </div>
@endsection