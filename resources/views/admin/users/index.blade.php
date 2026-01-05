@extends('layouts.admin')

@section('title', 'Users')
@section('subtitle', 'Kelola hak akses dan informasi pengguna sistem')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Daftar Users" subtitle="{{ $users->total() }} pengguna terdaftar">
            <x-slot:actions>
                <a href="{{ route('admin.users.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-xl transition-all shadow-sm">
                    <i class="fas fa-plus"></i> Tambah User
                </a>
            </x-slot:actions>
        </x-page-header>

        <x-content-card class="!p-0 overflow-hidden">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm font-inter">
                    <thead>
                        <tr class="bg-gray-50 text-left">
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">User</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Email</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Role</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider">Joined</th>
                            <th class="px-6 py-4 font-bold text-gray-500 uppercase text-xs tracking-wider text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs ring-4 ring-emerald-50 shadow-sm">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    @if($user->role === 'admin')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-purple-50 text-purple-600 border border-purple-100">
                                            <i class="fas fa-shield-alt text-[10px]"></i> Admin
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1 text-xs font-bold rounded-full bg-gray-50 text-gray-500 border border-gray-100">
                                            User
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs text-gray-500 font-medium">
                                        <i class="far fa-calendar-alt mr-1 opacity-50"></i>
                                        {{ $user->created_at->format('d M Y') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($user->id !== auth()->id())
                                            <form id="delete-user-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete('delete-user-{{ $user->id }}', '{{ $user->name }}')"
                                                    class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all"
                                                    title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-inter">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-users text-3xl text-gray-200"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada user terdaftar</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $users->links() }}
                </div>
            @endif
        </x-content-card>
    </div>
@endsection