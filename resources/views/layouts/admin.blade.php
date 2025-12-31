<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Symbiosis') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #196164;
            --primary-hover: #144d50;
            --primary-light: #e0f2f1;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 flex flex-col bg-white border-r border-gray-200 transition-all duration-300"
            :class="sidebarOpen ? 'w-64' : 'w-20'">
            <!-- Sidebar Header -->
            <div class="h-16 flex items-center justify-between px-4 border-b border-gray-200">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('assets/img/logoSymbiosis.svg') }}" alt="Symbiosis"
                        class="h-8 transition-all duration-300" :class="sidebarOpen ? 'w-32' : 'w-10'">
                </a>
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 text-gray-500">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#e0f2f1] text-[#196164]' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-th-large w-5 text-center"></i>
                    <span class="ml-3" x-show="sidebarOpen">Dashboard</span>
                </a>
                <a href="{{ route('admin.projects.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-[#e0f2f1] text-[#196164]' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-briefcase w-5 text-center"></i>
                    <span class="ml-3" x-show="sidebarOpen">Projects</span>
                </a>
                <a href="{{ route('admin.news.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.news.*') ? 'bg-[#e0f2f1] text-[#196164]' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-newspaper w-5 text-center"></i>
                    <span class="ml-3" x-show="sidebarOpen">News / Blog</span>
                </a>
                <a href="{{ route('admin.youtube-videos.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.youtube-videos.*') ? 'bg-[#e0f2f1] text-[#196164]' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fab fa-youtube w-5 text-center"></i>
                    <span class="ml-3" x-show="sidebarOpen">YouTube Videos</span>
                </a>
                <a href="{{ route('admin.messages.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-[#e0f2f1] text-[#196164]' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-envelope w-5 text-center"></i>
                    <span class="ml-3" x-show="sidebarOpen">Messages</span>
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-[#e0f2f1] text-[#196164]' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span class="ml-3" x-show="sidebarOpen">Users</span>
                </a>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-red-500 border border-red-100 rounded-lg hover:bg-red-50 transition-colors">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-2" x-show="sidebarOpen">Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 transition-all duration-300" :class="sidebarOpen ? 'ml-64' : 'ml-20'">
            <!-- Top Bar -->
            <header
                class="sticky top-0 z-40 h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
                <h2 class="text-lg font-semibold text-gray-800">@yield('title', 'Admin Panel')</h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">Hi, {{ auth()->user()->name }}</span>
                    <div
                        class="w-9 h-9 rounded-full bg-[#196164] text-white flex items-center justify-center font-semibold text-sm">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>