@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Projects Card -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Projects</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['projects'] }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-[#e0f2f1] text-[#196164] flex items-center justify-center">
                        <i class="fas fa-briefcase text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- News Card -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total News</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['news'] }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Messages Card -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Messages</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['messages'] }}</h3>
                        @if($stats['unread_messages'] > 0)
                            <p class="text-xs text-amber-600 mt-1">{{ $stats['unread_messages'] }} belum dibaca</p>
                        @endif
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                        <i class="fas fa-envelope text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Users Card -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Users</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['users'] }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center">
                        <i class="fas fa-users text-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Messages -->
            <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-900">Pesan Terbaru</h3>
                    <a href="{{ route('admin.messages.index') }}" class="text-sm text-[#196164] hover:underline">Lihat
                        semua</a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($recentMessages as $message)
                        <a href="{{ route('admin.messages.show', $message) }}"
                            class="block px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-start justify-between">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $message->name }}</p>
                                    <p class="text-sm text-gray-500 truncate">{{ $message->subject ?: 'No Subject' }}</p>
                                </div>
                                @if(!$message->is_read)
                                    <span class="w-2 h-2 rounded-full bg-[#196164] flex-shrink-0 mt-2"></span>
                                @endif
                            </div>
                        </a>
                    @empty
                        <p class="px-6 py-4 text-sm text-gray-500">Belum ada pesan</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent News -->
            <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-900">Berita Terbaru</h3>
                    <a href="{{ route('admin.news.index') }}" class="text-sm text-[#196164] hover:underline">Lihat semua</a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($recentNews as $item)
                        <a href="{{ route('admin.news.edit', $item) }}"
                            class="block px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <img src="{{ Storage::url($item->image) }}" alt="" class="w-12 h-12 rounded-lg object-cover">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $item->title }}</p>
                                    <p class="text-xs text-gray-500">{{ $item->published_at?->format('d M Y') ?? 'Draft' }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="px-6 py-4 text-sm text-gray-500">Belum ada berita</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection