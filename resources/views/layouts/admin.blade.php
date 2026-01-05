<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Symbiosis') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#ecfdf5","100":"#d1fae5","200":"#a7f3d0","300":"#6ee7b7","400":"#34d399","500":"#10b981","600":"#059669","700":"#047857","800":"#065f46","900":"#064e3b"}
                    },
                    fontFamily: {
                        'body': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Flowbite JS & CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Sidebar custom coloring for consistency */
        .sidebar-active {
            background-color: #ecfdf5;
            color: #059669;
        }
        .dark .sidebar-active {
            background-color: #374151;
            color: #34d399;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 font-body antialiased">

    <!-- NAVBAR FIXED -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                           <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 ms-2 md:me-24">
                        <img src="{{ asset('assets/img/logoSymbiosis.svg') }}" alt="Symbiosis" class="h-8 w-auto">
                    </a>
                </div>

                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <div class="w-8 h-8 rounded-full bg-emerald-600 flex items-center justify-center text-white font-bold uppercase border-2 border-white">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">{{ Auth::user()->name }}</p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <button type="button" onclick="confirmLogout()" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-100 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 shadow-sm" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto no-scrollbar bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                
                <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-4 mb-2">Main Menu</p>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2.5 text-gray-900 rounded-xl dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-th-large w-5 text-center text-lg {{ request()->routeIs('admin.dashboard') ? 'text-emerald-600' : 'text-gray-400 group-hover:text-gray-900' }}"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-6 mb-2">Content</p>
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center px-3 py-2.5 text-gray-900 rounded-xl dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.projects.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-briefcase w-5 text-center text-lg {{ request()->routeIs('admin.projects.*') ? 'text-emerald-600' : 'text-gray-400 group-hover:text-gray-900' }}"></i>
                        <span class="ms-3">Projects</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}" class="flex items-center px-3 py-2.5 text-gray-900 rounded-xl dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.news.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-newspaper w-5 text-center text-lg {{ request()->routeIs('admin.news.*') ? 'text-emerald-600' : 'text-gray-400 group-hover:text-gray-900' }}"></i>
                        <span class="ms-3">News / Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.youtube-videos.index') }}" class="flex items-center px-3 py-2.5 text-gray-900 rounded-xl dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.youtube-videos.*') ? 'sidebar-active' : '' }}">
                        <i class="fab fa-youtube w-5 text-center text-lg {{ request()->routeIs('admin.youtube-videos.*') ? 'text-emerald-600' : 'text-gray-400 group-hover:text-gray-900' }}"></i>
                        <span class="ms-3">YouTube</span>
                    </a>
                </li>

                <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-6 mb-2">System</p>
                <li>
                    <a href="{{ route('admin.messages.index') }}" class="flex items-center px-3 py-2.5 text-gray-900 rounded-xl dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.messages.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-envelope w-5 text-center text-lg {{ request()->routeIs('admin.messages.*') ? 'text-emerald-600' : 'text-gray-400 group-hover:text-gray-900' }}"></i>
                        <span class="ms-3">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center px-3 py-2.5 text-gray-900 rounded-xl dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.users.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-users w-5 text-center text-lg {{ request()->routeIs('admin.users.*') ? 'text-emerald-600' : 'text-gray-400 group-hover:text-gray-900' }}"></i>
                        <span class="ms-3">Users Management</span>
                    </a>
                </li>

                <li class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="button" onclick="confirmLogout()" class="flex items-center w-full px-3 py-2.5 text-red-600 rounded-xl hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 group transition-colors">
                        <i class="fas fa-sign-out-alt w-5 text-center text-lg"></i>
                        <span class="ms-3">Logout</span>
                    </button>
                </li>
            </ul>
        </div>
    </aside>

    <!-- CONTENT -->
    <div class="p-4 sm:ml-64 mt-16 min-h-screen">
        <div class="p-2 md:p-4">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Logout?',
                text: 'Apakah Anda yakin ingin keluar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#059669',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

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

        // Toast setup
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });

        @if(session('success'))
            Toast.fire({ icon: 'success', title: '{{ session('success') }}' });
        @endif
        @if(session('error'))
            Toast.fire({ icon: 'error', title: '{{ session('error') }}' });
        @endif
    </script>

    @stack('scripts')
</body>
</html>