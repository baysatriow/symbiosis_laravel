@extends('layouts.admin')

@section('title', 'Projects')
@section('subtitle', 'Kelola semua project')

@section('content')
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50/50">
            <div>
                <h3 class="font-semibold text-gray-900">Daftar Projects</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $projects->total() }} project ditemukan</p>
            </div>
            <a href="{{ route('admin.projects.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                <i class="fas fa-plus"></i> Tambah Project
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Image</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Title</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Category</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Featured</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($projects as $project)
                        <tr class="table-row-hover transition-colors">
                            <td class="px-6 py-4">
                                <img src="{{ Storage::url($project->image) }}" alt="" class="w-16 h-12 rounded-lg object-cover shadow-sm">
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-900">{{ $project->title }}</p>
                                <p class="text-gray-500 text-xs mt-1">{{ Str::limit($project->subtitle, 40) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-[#e0f2f1] text-[#196164]">
                                    {{ $project->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($project->is_featured)
                                    <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-600">
                                        <i class="fas fa-star text-[10px]"></i> Featured
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-500">
                                        Normal
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}"
                                        class="p-2.5 text-gray-500 hover:text-[#196164] hover:bg-[#e0f2f1] rounded-xl transition-all"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="delete-project-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('delete-project-{{ $project->id }}', '{{ $project->title }}')"
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
                            <td colspan="5" class="px-6 py-12 text-center">
                                <i class="fas fa-folder-open text-5xl text-gray-200 mb-4"></i>
                                <p class="text-gray-500">Belum ada project</p>
                                <a href="{{ route('admin.projects.create') }}" class="text-[#196164] hover:underline text-sm mt-2 inline-block">
                                    <i class="fas fa-plus mr-1"></i> Tambah project pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
@endsection