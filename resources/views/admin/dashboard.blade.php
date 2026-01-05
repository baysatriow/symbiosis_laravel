@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Ringkasan aktivitas terbaru')

@section('content')
    <div class="space-y-6">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-[#196164] to-[#2a8a8e] rounded-2xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
                    <p class="text-white/80 mt-1">Berikut adalah ringkasan aktivitas di Symbiosis hari ini.</p>
                </div>
                <div class="hidden md:flex gap-3">
                    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm text-white text-sm font-medium rounded-xl hover:bg-white/30 transition-all">
                        <i class="fas fa-plus"></i> Tambah Project
                    </a>
                    <a href="{{ route('admin.news.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-[#196164] text-sm font-medium rounded-xl hover:bg-white/90 transition-all shadow-md">
                        <i class="fas fa-edit"></i> Tulis Berita
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Projects Card -->
            <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm card-hover">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Projects</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['projects'] }}</h3>
                        <a href="{{ route('admin.projects.index') }}" class="text-xs text-[#196164] hover:underline mt-2 inline-block">
                            <i class="fas fa-arrow-right mr-1"></i> Lihat semua
                        </a>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#e0f2f1] to-[#b2dfdb] text-[#196164] flex items-center justify-center">
                        <i class="fas fa-briefcase text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- News Card -->
            <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm card-hover">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Berita</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['news'] }}</h3>
                        <a href="{{ route('admin.news.index') }}" class="text-xs text-[#196164] hover:underline mt-2 inline-block">
                            <i class="fas fa-arrow-right mr-1"></i> Lihat semua
                        </a>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-100 to-green-200 text-green-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Messages Card -->
            <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm card-hover">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Pesan Masuk</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['messages'] }}</h3>
                        @if($stats['unread_messages'] > 0)
                            <span class="inline-flex items-center gap-1 text-xs bg-amber-100 text-amber-700 px-2 py-1 rounded-full mt-2">
                                <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                                {{ $stats['unread_messages'] }} belum dibaca
                            </span>
                        @else
                            <a href="{{ route('admin.messages.index') }}" class="text-xs text-[#196164] hover:underline mt-2 inline-block">
                                <i class="fas fa-arrow-right mr-1"></i> Lihat semua
                            </a>
                        @endif
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-100 to-amber-200 text-amber-600 flex items-center justify-center">
                        <i class="fas fa-envelope text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Users Card -->
            <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm card-hover">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Pengguna</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['users'] }}</h3>
                        <a href="{{ route('admin.users.index') }}" class="text-xs text-[#196164] hover:underline mt-2 inline-block">
                            <i class="fas fa-arrow-right mr-1"></i> Kelola user
                        </a>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-100 to-purple-200 text-purple-600 flex items-center justify-center">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Messages -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-envelope text-[#196164]"></i> Pesan Terbaru
                    </h3>
                    <a href="{{ route('admin.messages.index') }}" class="text-sm text-[#196164] hover:underline font-medium">Lihat semua</a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($recentMessages as $message)
                        <a href="{{ route('admin.messages.show', $message) }}"
                            class="block px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-start justify-between">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate flex items-center gap-2">
                                        {{ $message->name }}
                                        @if(!$message->is_read)
                                            <span class="w-2 h-2 rounded-full bg-[#196164] animate-pulse"></span>
                                        @endif
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">{{ $message->subject ?: 'Tanpa Subjek' }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-300"></i>
                            </div>
                        </a>
                    @empty
                        <div class="px-6 py-8 text-center">
                            <i class="fas fa-inbox text-4xl text-gray-200 mb-3"></i>
                            <p class="text-sm text-gray-500">Belum ada pesan</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent News -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-newspaper text-green-600"></i> Berita Terbaru
                    </h3>
                    <a href="{{ route('admin.news.index') }}" class="text-sm text-[#196164] hover:underline font-medium">Lihat semua</a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($recentNews as $item)
                        <a href="{{ route('admin.news.edit', $item) }}"
                            class="block px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <img src="{{ Storage::url($item->image) }}" alt="" class="w-14 h-14 rounded-xl object-cover shadow-sm">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $item->title }}</p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ $item->published_at?->format('d M Y') ?? 'Draft' }}
                                    </p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-300"></i>
                            </div>
                        </a>
                    @empty
                        <div class="px-6 py-8 text-center">
                            <i class="fas fa-newspaper text-4xl text-gray-200 mb-3"></i>
                            <p class="text-sm text-gray-500">Belum ada berita</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection