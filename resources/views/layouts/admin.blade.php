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

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #196164;
            --primary-hover: #144d50;
            --primary-light: #e0f2f1;
        }

        /* Sidebar Styles */
        .sidebar-logo-full {
            display: block;
        }
        .sidebar-logo-mini {
            display: none;
        }
        .sidebar-collapsed .sidebar-logo-full {
            display: none;
        }
        .sidebar-collapsed .sidebar-logo-mini {
            display: flex;
        }

        /* Smooth transitions */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Card hover effect */
        .card-hover {
            transition: all 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Table row hover */
        .table-row-hover:hover {
            background-color: #f8fafc;
        }

        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 flex flex-col bg-white border-r border-gray-200 sidebar-transition shadow-sm"
            :class="[sidebarOpen ? 'w-64' : 'w-20 sidebar-collapsed']">

            <!-- Sidebar Header -->
            <div class="h-16 flex items-center justify-between px-4 border-b border-gray-100">
                <a href="{{ route('home') }}" class="flex items-center overflow-hidden">
                    <!-- Full Logo -->
                    <img src="{{ asset('assets/img/logoSymbiosis.svg') }}" alt="Symbiosis"
                        class="h-8 w-auto sidebar-logo-full">
                    <!-- Mini Logo (S) -->
                    <div class="sidebar-logo-mini w-10 h-10 rounded-xl bg-gradient-to-br from-[#196164] to-[#2a8a8e] text-white items-center justify-center font-bold text-xl shadow-md">
                        S
                    </div>
                </a>
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas" :class="sidebarOpen ? 'fa-chevron-left' : 'fa-chevron-right'"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto custom-scrollbar">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3" x-show="sidebarOpen">Menu</p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-th-large w-5 text-center {{ request()->routeIs('admin.dashboard') ? '' : 'text-gray-400 group-hover:text-[#196164]' }}"></i>
                    <span class="ml-3 sidebar-transition" x-show="sidebarOpen">Dashboard</span>
                </a>

                <a href="{{ route('admin.projects.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('admin.projects.*') ? 'bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-briefcase w-5 text-center {{ request()->routeIs('admin.projects.*') ? '' : 'text-gray-400 group-hover:text-[#196164]' }}"></i>
                    <span class="ml-3 sidebar-transition" x-show="sidebarOpen">Projects</span>
                </a>

                <a href="{{ route('admin.news.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('admin.news.*') ? 'bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-newspaper w-5 text-center {{ request()->routeIs('admin.news.*') ? '' : 'text-gray-400 group-hover:text-[#196164]' }}"></i>
                    <span class="ml-3 sidebar-transition" x-show="sidebarOpen">News / Blog</span>
                </a>

                <a href="{{ route('admin.youtube-videos.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('admin.youtube-videos.*') ? 'bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fab fa-youtube w-5 text-center {{ request()->routeIs('admin.youtube-videos.*') ? '' : 'text-gray-400 group-hover:text-[#196164]' }}"></i>
                    <span class="ml-3 sidebar-transition" x-show="sidebarOpen">YouTube Videos</span>
                </a>

                <a href="{{ route('admin.messages.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('admin.messages.*') ? 'bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-envelope w-5 text-center {{ request()->routeIs('admin.messages.*') ? '' : 'text-gray-400 group-hover:text-[#196164]' }}"></i>
                    <span class="ml-3 sidebar-transition" x-show="sidebarOpen">Messages</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-[#196164] to-[#2a8a8e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
                    <i class="fas fa-users w-5 text-center {{ request()->routeIs('admin.users.*') ? '' : 'text-gray-400 group-hover:text-[#196164]' }}"></i>
                    <span class="ml-3 sidebar-transition" x-show="sidebarOpen">Users</span>
                </a>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <button type="button" onclick="confirmLogout()"
                        class="flex items-center justify-center w-full px-3 py-2.5 text-sm font-medium text-red-500 bg-red-50 rounded-xl hover:bg-red-100 transition-all duration-200">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-2" x-show="sidebarOpen">Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 sidebar-transition" :class="sidebarOpen ? 'ml-64' : 'ml-20'">
            <!-- Top Bar -->
            <header class="sticky top-0 z-40 h-16 bg-white/80 backdrop-blur-md border-b border-gray-200 flex items-center justify-between px-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">@yield('title', 'Admin Panel')</h2>
                    <p class="text-xs text-gray-400">@yield('subtitle', 'Manage your content')</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#196164] to-[#2a8a8e] text-white flex items-center justify-center font-semibold text-sm shadow-md">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Global SweetAlert2 Scripts -->
    <script>
        // Toast configuration
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // Show success toast from session
        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif

        // Show error toast from session
        @if(session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif

        // Logout confirmation
        function confirmLogout() {
            Swal.fire({
                title: 'Logout?',
                text: 'Apakah Anda yakin ingin keluar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#196164',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        // Delete confirmation function (reusable)
        function confirmDelete(formId, itemName = 'item ini') {
            Swal.fire({
                title: 'Hapus Data?',
                text: `Apakah Anda yakin ingin menghapus ${itemName}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>

    @stack('scripts')
</body>

</html>