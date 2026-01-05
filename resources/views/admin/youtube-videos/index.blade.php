@extends('layouts.admin')

@section('title', 'YouTube Videos')
@section('subtitle', 'Kelola daftar video YouTube yang ditampilkan di website')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Daftar YouTube Videos" subtitle="{{ $videos->total() }} video ditemukan">
            <x-slot:actions>
                <a href="{{ route('admin.youtube-videos.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-xl transition-all shadow-sm">
                    <i class="fas fa-plus"></i> Tambah Video
                </a>
            </x-slot:actions>
        </x-page-header>

        <x-content-card class="!p-0 overflow-hidden">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm font-inter">
                    <thead>
                        <tr class="bg-gray-50 text-left">
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Thumbnail</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Title</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Video ID</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Status</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($videos as $video)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="w-20 h-12 rounded-lg bg-gray-100 overflow-hidden shadow-sm">
                                        <img src="{{ $video->thumbnail }}" alt="" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $video->youtube_url }}" target="_blank" class="font-semibold text-gray-900 hover:text-emerald-600 transition-colors line-clamp-1">
                                        {{ $video->title }}
                                        <i class="fas fa-external-link-alt text-[10px] ml-1 opacity-50"></i>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2 py-1 text-[10px] font-mono font-medium rounded bg-gray-100 text-gray-600">
                                        {{ $video->video_id }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($video->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <i class="fas fa-check-circle text-[10px]"></i> Active
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1 text-xs font-bold rounded-full bg-gray-50 text-gray-400 border border-gray-100">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="{{ route('admin.youtube-videos.edit', $video) }}"
                                            class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="delete-video-{{ $video->id }}" action="{{ route('admin.youtube-videos.destroy', $video) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('delete-video-{{ $video->id }}', '{{ $video->title }}')"
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
                                <td colspan="5" class="px-6 py-12 text-center text-inter">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fab fa-youtube text-3xl text-gray-200"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada video</p>
                                        <a href="{{ route('admin.youtube-videos.create') }}" class="text-emerald-600 hover:underline text-sm mt-1">
                                            Tambah video pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($videos->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $videos->links() }}
                </div>
            @endif
        </x-content-card>
    </div>
@endsection