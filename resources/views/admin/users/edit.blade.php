@extends('layouts.admin')

@section('title', 'Edit User')
@section('subtitle', 'Perbarui informasi pengguna')

@section('content')
    <div class="space-y-6">
    <x-page-header title="Edit User" subtitle="Perbarui informasi dan hak akses untuk pengguna '{{ $user->name }}'">
        <x-slot:actions>
            <a href="{{ route('admin.users.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-xl">
        <x-content-card>
            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="Nama lengkap pengguna">
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                        placeholder="email@example.com">
                </div>

                <div>
                    <label for="role" class="block text-sm font-bold text-gray-700 mb-2">System Role <span class="text-red-500">*</span></label>
                    <select name="role" id="role" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter">
                        <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Standard User</option>
                        <option value="editor" {{ old('role', $user->role) === 'editor' ? 'selected' : '' }}>Content Editor</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">New Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all font-inter"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="mt-2 p-3 bg-blue-50 rounded-xl border border-blue-100 flex items-start gap-3">
                    <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                    <p class="text-[11px] text-blue-700 font-medium leading-relaxed">Kosongkan kolom password jika Anda tidak ingin mengubah password pengguna saat ini.</p>
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="flex-1 md:flex-none px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-200">
                        <i class="fas fa-save mr-2"></i> Update User
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                        class="flex-1 md:flex-none px-8 py-3.5 bg-gray-100 text-gray-700 text-sm font-bold rounded-xl hover:bg-gray-200 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </x-content-card>
    </div>
</div>
@endsection