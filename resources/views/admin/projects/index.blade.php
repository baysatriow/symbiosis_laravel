@extends('layouts.admin')

@section('title', 'Projects')
@section('subtitle', 'Kelola semua project yang ditampilkan di website')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Daftar Projects" subtitle="{{ $projects->total() }} project ditemukan">
            <x-slot:actions>
                <a href="{{ route('admin.projects.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-xl transition-all shadow-sm">
                    <i class="fas fa-plus"></i> Tambah Project
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
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Category</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Featured</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($projects as $project)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="w-16 h-12 rounded-lg bg-gray-100 overflow-hidden shadow-sm">
                                        <img src="{{ Storage::url($project->image) }}" alt="" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-gray-900 line-clamp-1">{{ $project->title }}</p>
                                    <p class="text-gray-500 text-xs mt-1">{{ Str::limit($project->subtitle, 40) }}</p>
                                </td>
                                <td class="px-6 py-4 text-inter">
                                    <span class="inline-flex px-3 py-1 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        {{ $project->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($project->is_featured)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-amber-50 text-amber-700 border border-amber-100">
                                            <i class="fas fa-star text-[10px]"></i> Featured
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-50 text-gray-400 border border-gray-100">
                                            Normal
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="{{ route('admin.projects.edit', $project) }}"
                                            class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="delete-project-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('delete-project-{{ $project->id }}', '{{ $project->title }}')"
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
                                            <i class="fas fa-folder-open text-3xl text-gray-200"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada project</p>
                                        <a href="{{ route('admin.projects.create') }}" class="text-emerald-600 hover:underline text-sm mt-1">
                                            Tambah project pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($projects->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $projects->links() }}
                </div>
            @endif
        </x-content-card>
    </div>
@endsection