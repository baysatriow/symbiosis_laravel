@extends('layouts.admin')

@section('title', 'YouTube Videos')

@section('content')
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
        <div
            class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h3 class="font-semibold text-gray-900">Daftar Video YouTube</h3>
            <a href="{{ route('admin.youtube-videos.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-[#196164] text-white text-sm font-medium rounded-lg hover:bg-[#144d50] transition-colors">
                <i class="fas fa-plus"></i> Tambah Video
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Thumbnail</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Video ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Title</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Status</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 uppercase text-xs tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($videos as $video)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <img src="https://img.youtube.com/vi/{{ $video->video_id }}/mqdefault.jpg" alt=""
                                    class="w-20 h-12 rounded object-cover">
                            </td>
                            <td class="px-6 py-4 font-mono text-xs text-gray-600">{{ $video->video_id }}</td>
                            <td class="px-6 py-4 text-gray-900">{{ $video->title ?: '-' }}</td>
                            <td class="px-6 py-4">
                                @if($video->is_active)
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-600">Active</span>
                                @else
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-600">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="https://www.youtube.com/watch?v={{ $video->video_id }}" target="_blank"
                                        class="p-2 text-gray-600 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="{{ route('admin.youtube-videos.edit', $video) }}"
                                        class="p-2 text-gray-600 hover:text-[#196164] hover:bg-gray-100 rounded-lg transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.youtube-videos.destroy', $video) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-gray-600 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada video</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($videos->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $videos->links() }}
            </div>
        @endif
    </div>
@endsection