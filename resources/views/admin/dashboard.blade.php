@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Ringkasan aktivitas terbaru')

@section('content')
    <div class="space-y-6">
        <!-- Dashboard Header -->
        <x-page-header title="Selamat Datang, {{ auth()->user()->name }}! 👋" subtitle="Berikut adalah ringkasan aktivitas di Symbiosis hari ini.">
            <x-slot:actions>
                <div class="flex gap-3">
                    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded-xl hover:bg-emerald-700 transition-all shadow-sm">
                        <i class="fas fa-plus"></i> Tambah Project
                    </a>
                    <a href="{{ route('admin.news.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-emerald-700 border border-emerald-100 text-sm font-medium rounded-xl hover:bg-emerald-50 transition-all shadow-sm">
                        <i class="fas fa-edit"></i> Tulis Berita
                    </a>
                </div>
            </x-slot:actions>
        </x-page-header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <x-stat-card 
                label="Total Projects" 
                value="{{ $stats['projects'] }}" 
                icon="fas fa-briefcase"
                iconColor="emerald"
            />

            <x-stat-card 
                label="Total Berita" 
                value="{{ $stats['news'] }}" 
                icon="fas fa-newspaper"
                iconColor="blue"
            />

            <x-stat-card 
                label="Pesan Masuk" 
                value="{{ $stats['messages'] }}" 
                icon="fas fa-envelope"
                iconColor="amber"
                trend="{{ $stats['unread_messages'] }} belum dibaca"
                :trendUp="$stats['unread_messages'] > 0"
            />

            <x-stat-card 
                label="Total Pengguna" 
                value="{{ $stats['users'] }}" 
                icon="fas fa-users"
                iconColor="purple"
            />
        </div>

        <!-- Recent Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Messages -->
            <x-content-card class="!p-0 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-envelope text-emerald-600"></i> Pesan Terbaru
                    </h3>
                    <a href="{{ route('admin.messages.index') }}" class="text-sm text-emerald-600 hover:underline font-medium">Lihat semua</a>
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
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
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
            </x-content-card>

            <!-- Recent News -->
            <x-content-card class="!p-0 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-newspaper text-blue-600"></i> Berita Terbaru
                    </h3>
                    <a href="{{ route('admin.news.index') }}" class="text-sm text-emerald-600 hover:underline font-medium">Lihat semua</a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($recentNews as $item)
                        <a href="{{ route('admin.news.edit', $item) }}"
                            class="block px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                @if($item->image)
                                    <img src="{{ Storage::url($item->image) }}" alt="" class="w-14 h-14 rounded-xl object-cover">
                                @else
                                    <div class="w-14 h-14 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
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
            </x-content-card>
        </div>
    </div>
@endsection