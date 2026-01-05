@extends('layouts.admin')

@section('title', 'Tambah User')
@section('subtitle', 'Buat pengguna baru')

@section('content')
    <div class="max-w-xl">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.users.index') }}" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h3 class="font-semibold text-gray-900">Tambah User Baru</h3>
                        <p class="text-sm text-gray-500">Isi form berikut untuk membuat pengguna</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                        placeholder="Nama lengkap">
                    @error('name')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                        placeholder="email@example.com">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role <span class="text-red-500">*</span></label>
                    <select name="role" id="role" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all">
                        <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                        <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                        placeholder="••••••••">
                    @error('password')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#196164] focus:border-transparent transition-all"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                        <i class="fas fa-save mr-2"></i> Simpan User
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 text-sm font-medium rounded-xl hover:bg-gray-200 transition-all">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection