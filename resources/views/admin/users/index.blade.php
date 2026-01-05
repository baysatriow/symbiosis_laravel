@extends('layouts.admin')

@section('title', 'Users')
@section('subtitle', 'Kelola pengguna sistem')

@section('content')
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50/50">
            <div>
                <h3 class="font-semibold text-gray-900">Daftar Users</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $users->total() }} pengguna terdaftar</p>
            </div>
            <a href="{{ route('admin.users.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                <i class="fas fa-plus"></i> Tambah User
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">User</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Email</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Role</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider">Joined</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 uppercase text-xs tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                        <tr class="table-row-hover transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#196164] to-[#2a8a8e] text-white flex items-center justify-center font-semibold text-sm shadow-sm">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-600">
                                        <i class="fas fa-shield-alt text-[10px]"></i> Admin
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-500">
                                        User
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-xs">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="p-2.5 text-gray-500 hover:text-[#196164] hover:bg-[#e0f2f1] rounded-xl transition-all"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form id="delete-user-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('delete-user-{{ $user->id }}', '{{ $user->name }}')"
                                                class="p-2.5 text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all"
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
                            <td colspan="5" class="px-6 py-12 text-center">
                                <i class="fas fa-users text-5xl text-gray-200 mb-4"></i>
                                <p class="text-gray-500">Belum ada user</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection