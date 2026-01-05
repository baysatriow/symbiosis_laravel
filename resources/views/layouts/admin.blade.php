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
                        primary: { "50": "#ecfdf5", "100": "#d1fae5", "200": "#a7f3d0", "300": "#6ee7b7", "400": "#34d399", "500": "#10b981", "600": "#059669", "700": "#047857", "800": "#065f46", "900": "#064e3b" }
                    },
                    fontFamily: {
                        'body': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-mini-width: 80px;
        }

        #logo-sidebar {
            width: var(--sidebar-width);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1), transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Mini Sidebar State */
        .sidebar-mini #logo-sidebar {
            width: var(--sidebar-mini-width);
        }

        .sidebar-mini #main-content {
            margin-left: var(--sidebar-mini-width);
        }

        .sidebar-mini .sidebar-text,
        .sidebar-mini .sidebar-badge,
        .sidebar-mini .sidebar-header-text,
        .sidebar-mini .sidebar-arrow {
            display: none;
        }

        .sidebar-mini .sidebar-item {
            justify-content: center;
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar-mini .sidebar-header {
            justify-content: center;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Custom Hover Effect for Sidebar Items */
        .sidebar-item-active {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            color: #059669;
            box-shadow: inset 0 0 0 1px rgba(16, 185, 129, 0.1);
        }

        /* Animasi Toast */
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        .toast-enter { animation: slideIn 0.3s ease-out forwards; }
        .toast-exit { animation: fadeOut 0.3s ease-in forwards; }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 font-body antialiased">

    <!-- TOAST CONTAINER -->
    <div id="toast-container" class="fixed top-20 right-5 z-[60] flex flex-col gap-2"></div>

    <!-- NAVBAR FIXED -->
    <nav class="fixed top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-gray-100 dark:bg-gray-800/80 dark:border-gray-700 shadow-sm transition-all duration-300">
        <div class="px-3 py-2.5 lg:px-5">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <!-- Navbar Logo -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center active:scale-95 transition-transform">
                        <img src="{{ asset('assets/img/logoSymbiosis.svg') }}" alt="Symbiosis Logo" class="h-10 w-auto">
                    </a>

                    <!-- Sidebar Toggle Button -->
                    <button id="sidebar-toggle-btn" type="button" class="p-2 text-gray-500 rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-100 transition-all active:scale-95">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>

                <div class="flex items-center gap-2 md:gap-4">
                    <div class="w-px h-6 bg-gray-200 mx-1 hidden sm:block"></div>

                    <!-- User Profile Dropdown -->
                    <div class="flex items-center relative">
                        <button type="button" class="flex items-center gap-3 p-1 rounded-2xl hover:bg-gray-50 transition-all border border-transparent hover:border-gray-100 group" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown-user" data-dropdown-placement="bottom-end">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-primary-500 to-primary-600 flex items-center justify-center text-white font-black text-sm shadow-md shadow-primary-100 group-hover:scale-105 transition-transform border border-white/20">
                                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                            </div>
                            <div class="hidden lg:block text-left pr-2">
                                <p class="text-xs font-black text-gray-900 leading-tight uppercase tracking-tight">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] font-bold text-gray-400 leading-tight uppercase tracking-widest">Administrator</p>
                            </div>
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-2xl shadow-2xl border border-gray-100 min-w-[200px] animate-in slide-in-from-top-2 duration-200 right-0" id="dropdown-user">
                            <div class="px-4 py-3 bg-gray-50/50 rounded-t-2xl">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Signed in as</p>
                                <p class="text-sm font-black text-gray-900 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="py-2" role="none">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 font-bold transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 font-bold transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        Profil Akun
                                    </a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <button type="button" onclick="confirmLogout()" class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-rose-600 hover:bg-rose-50 font-bold transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 h-screen transition-all bg-white dark:bg-gray-800 shadow-2xl shadow-gray-200/50 border-r border-gray-100 dark:border-gray-700 flex flex-col" aria-label="Sidebar">
        <!-- Spacer for fixed navbar -->
        <div class="h-20 shrink-0"></div>

        <!-- Menu area -->
        <div class="flex-1 px-4 py-4 overflow-y-auto no-scrollbar">
            <ul class="space-y-1.5 font-medium">
                <!-- DASHBOARD -->
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="sidebar-item flex items-center px-3 py-3 text-gray-500 rounded-2xl hover:bg-gray-50 hover:text-gray-900 group transition-all {{ request()->routeIs('admin.dashboard') ? 'sidebar-item-active !text-primary-600 font-bold' : '' }}">
                        <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span class="sidebar-text ms-3 text-sm">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header pt-6 pb-2 px-3 flex items-center">
                    <span class="sidebar-header-text text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Sistem & Data</span>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}"
                        class="sidebar-item flex items-center px-3 py-3 text-gray-500 rounded-2xl hover:bg-gray-50 hover:text-gray-900 group transition-all {{ request()->routeIs('admin.projects.*') ? 'sidebar-item-active !text-primary-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span class="sidebar-text ms-3 text-sm flex-1">Projects</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}"
                        class="sidebar-item flex items-center px-3 py-3 text-gray-500 rounded-2xl hover:bg-gray-50 hover:text-gray-900 group transition-all {{ request()->routeIs('admin.news.*') ? 'sidebar-item-active !text-primary-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        <span class="sidebar-text ms-3 text-sm flex-1">News / Blogs</span>
                        <span class="sidebar-badge inline-flex items-center justify-center px-2 py-0.5 text-[8px] font-black text-primary-700 bg-primary-100 rounded-full tracking-tighter uppercase ring-1 ring-primary-200">AI</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.youtube-videos.index') }}"
                        class="sidebar-item flex items-center px-3 py-3 text-gray-500 rounded-2xl hover:bg-gray-50 hover:text-gray-900 group transition-all {{ request()->routeIs('admin.youtube-videos.*') ? 'sidebar-item-active !text-primary-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <span class="sidebar-text ms-3 text-sm flex-1">YouTube Media</span>
                        <span class="sidebar-badge inline-flex items-center justify-center px-2 py-0.5 text-[8px] font-black text-primary-700 bg-primary-100 rounded-full tracking-tighter uppercase ring-1 ring-primary-200">HUB</span>
                    </a>
                </li>

                <li class="sidebar-header pt-6 pb-2 px-3 flex items-center">
                    <span class="sidebar-header-text text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Analitik & Geo</span>
                </li>
                <li>
                    <a href="{{ route('admin.messages.index') }}"
                        class="sidebar-item flex items-center px-3 py-3 text-gray-500 rounded-2xl hover:bg-gray-50 hover:text-gray-900 group transition-all {{ request()->routeIs('admin.messages.*') ? 'sidebar-item-active !text-primary-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <span class="sidebar-text ms-3 text-sm">Global Messages</span>
                    </a>
                </li>

                <li class="sidebar-header pt-6 pb-2 px-3 flex items-center">
                    <span class="sidebar-header-text text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Pengaturan</span>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="sidebar-item flex items-center px-3 py-3 text-gray-500 rounded-2xl hover:bg-gray-50 hover:text-gray-900 group transition-all {{ request()->routeIs('admin.users.*') ? 'sidebar-item-active !text-primary-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="sidebar-text ms-3 text-sm">Users Management</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-50 flex items-center justify-center bg-gray-50/50">
            <button class="flex items-center justify-center gap-3 w-full p-3 text-rose-600 hover:bg-rose-50 rounded-2xl transition-all group font-bold text-sm" onclick="confirmLogout()">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span class="sidebar-text">Logout</span>
            </button>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div id="main-content" class="p-6 transition-all duration-300 min-h-screen pt-24 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Global Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Sidebar Toggle Logic
            const sidebarBtn = document.getElementById('sidebar-toggle-btn');
            const body = document.body;
            const sidebar = document.getElementById('logo-sidebar');
            
            if (localStorage.getItem('sidebar-state') === 'mini') {
                body.classList.add('sidebar-mini');
            }

            sidebarBtn.addEventListener('click', function () {
                const isMobile = window.innerWidth < 1024;
                if (isMobile) {
                    sidebar.classList.toggle('-translate-x-full');
                } else {
                    body.classList.toggle('sidebar-mini');
                    localStorage.setItem('sidebar-state', body.classList.contains('sidebar-mini') ? 'mini' : 'full');
                }
            });

            // Global Toast Function
            window.showToast = function (message, type = 'info') {
                const container = document.getElementById('toast-container');
                let icon = '';
                let colorClass = '';

                if (type === 'success') {
                    colorClass = 'text-green-500 bg-green-100';
                    icon = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>';
                } else if (type === 'error') {
                    colorClass = 'text-red-500 bg-red-100';
                    icon = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/></svg>';
                }

                const toastHtml = `
                    <div class="toast-enter flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-xl border border-gray-100" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 ${colorClass} rounded-lg">${icon}</div>
                        <div class="ms-3 text-sm font-medium">${message}</div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 p-1.5 inline-flex h-8 w-8 text-gray-400 hover:text-gray-900 rounded-lg hover:bg-gray-100" onclick="this.parentElement.remove()"><svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg></button>
                    </div>
                `;

                const wrapper = document.createElement('div');
                wrapper.innerHTML = toastHtml.trim();
                const toastEl = wrapper.firstChild;
                container.appendChild(toastEl);

                setTimeout(() => {
                    toastEl.classList.remove('toast-enter');
                    toastEl.classList.add('toast-exit');
                    toastEl.addEventListener('animationend', () => toastEl.remove());
                }, 5000);
            }

            @if(session('success')) showToast("{{ session('success') }}", 'success'); @endif
            @if(session('error')) showToast("{{ session('error') }}", 'error'); @endif
        });

        function confirmLogout() {
            Swal.fire({
                title: 'Logout?',
                text: 'Apakah Anda yakin ingin keluar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'px-6 py-2.5 bg-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 ml-3',
                    cancelButton: 'px-6 py-2.5 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-all'
                },
                buttonsStyling: false,
                reverseButtons: true
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
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'px-6 py-2.5 bg-red-600 text-white font-bold rounded-xl shadow-lg shadow-red-200 ml-3',
                    cancelButton: 'px-6 py-2.5 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-all'
                },
                buttonsStyling: false,
                reverseButtons: true
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