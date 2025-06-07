<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FlexSMS Admin')</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#172554',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-transition {
            transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div x-data="{ sidebarOpen: true, userDropdownOpen: false }" class="min-h-screen flex flex-col">
        <!-- Mobile Header -->
        <header class="lg:hidden bg-white shadow-sm p-4 flex items-center justify-between z-10">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none focus:text-primary-500">
                    <i class="bx bx-menu text-2xl"></i>
                </button>
                <img src="https://via.placeholder.com/40x40" alt="FlexSMS Logo" class="h-8 ml-3">
                <span class="text-primary-600 font-semibold text-lg ml-2">FlexSMS</span>
            </div>
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center text-gray-700 focus:outline-none">
                    <img src="https://i.pravatar.cc/36" alt="Admin User" class="h-8 w-8 rounded-full">
                </button>
                <div x-show="open" @click.away="open = false" x-cloak
                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <div class="border-t border-gray-100"></div>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </header>

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar -->
            <aside
                :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'lg:translate-x-0': true}"
                class="sidebar-transition fixed lg:sticky top-0 left-0 bottom-0 w-64 bg-[#D4D4D4] border-r border-gray-200 z-30 lg:z-0 overflow-y-auto flex flex-col">

                <!-- Logo -->
                <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
                    <div class="flex items-center">
                        {{-- <img src="https://via.placeholder.com/40x40" alt="FlexSMS Logo" class="h-8"> --}}
                        <span class="text-red-400 font-semibold text-lg ml-2">FlexSMS</span>
                    </div>
                    <button @click="sidebarOpen = false" class="lg:hidden text-gray-500 focus:outline-none">
                        <i class="bx bx-x text-2xl"></i>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 py-4 px-2">
                    <div class="px-4 mb-3 text-xs font-semibold text-[#5C5C5C] uppercase tracking-wider">
                        Main
                    </div>

                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-[#FFEAEA] text-[#800020]' : 'text-[#1C1C1C] hover:bg-[#EFE0E0]' }}">
                        <i class="bx bx-home text-xl mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-[#800020]' : 'text-[#5C5C5C]' }}"></i>
                        Dashboard
                    </a>

                    <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('users.*') ? 'bg-[#FFEAEA] text-[#800020]' : 'text-[#1C1C1C] hover:bg-[#EFE0E0]' }}">
                        <i class="bx bx-user text-xl mr-3 {{ request()->routeIs('users.*') ? 'text-[#800020]' : 'text-[#5C5C5C]' }}"></i>
                        Users
                    </a>

                    <a href="{{ route('merchants.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('merchants.*') ? 'bg-[#FFEAEA] text-[#800020]' : 'text-[#1C1C1C] hover:bg-[#EFE0E0]' }}">
                        <i class="bx bx-store text-xl mr-3 {{ request()->routeIs('merchants.*') ? 'text-[#800020]' : 'text-[#5C5C5C]' }}"></i>
                        Merchants
                    </a>

                    <a href="{{ route('messages.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('messages.*') ? 'bg-[#FFEAEA] text-[#800020]' : 'text-[#1C1C1C] hover:bg-[#EFE0E0]' }}">
                        <i class="bx bx-message text-xl mr-3 {{ request()->routeIs('messages.*') ? 'text-[#800020]' : 'text-[#5C5C5C]' }}"></i>
                        Messages
                    </a>

                    <div class="px-4 mt-6 mb-3 text-xs font-semibold text-[#5C5C5C] uppercase tracking-wider">
                        Settings
                    </div>

                    {{-- <a href="{{ route('configurations.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('configurations.*') ? 'bg-[#FFEAEA] text-[#800020]' : 'text-[#1C1C1C] hover:bg-[#EFE0E0]' }}">
                        <i class="bx bx-cog text-xl mr-3 {{ request()->routeIs('configurations.*') ? 'text-[#800020]' : 'text-[#5C5C5C]' }}"></i>
                        Configurations
                    </a> --}}

                    <a href="{{ route('tokens.index') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('tokens.*') ? 'bg-[#FFEAEA] text-[#800020]' : 'text-[#1C1C1C] hover:bg-[#EFE0E0]' }}">
                        <i class="bx bx-key text-xl mr-3 {{ request()->routeIs('tokens.*') ? 'text-[#800020]' : 'text-[#5C5C5C]' }}"></i>
                        Tokens
                    </a>
                </nav>

                <!-- User Profile -->
                <div class="border-t border-gray-200 p-4">
                    <div class="flex items-center" x-data="{ userMenuOpen: false }">
                        {{-- <img src="https://i.pravatar.cc/36" alt="Admin User" class="h-8 w-8 rounded-full"> --}}
                        <img src="https://i.pravatar.cc/36" alt="Admin User" class="h-8 w-8 rounded-full">
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-medium text-gray-700">Admin User</p>
                            <p class="text-xs text-gray-500">admin@flexsms.com</p>
                        </div>
                        <button @click="userMenuOpen = !userMenuOpen" class="text-gray-500 focus:outline-none">
                            <i class="bx bx-chevron-down"></i>
                        </button>

                        <div x-show="userMenuOpen" @click.away="userMenuOpen = false" x-cloak
                             class="absolute bottom-12 left-0 right-0 mx-4 bg-white rounded-md shadow-lg py-1 z-50">
                            {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a> --}}
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Overlay -->
            <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 lg:hidden z-20"></div>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-gray-100 min-h-screen">
                <!-- Top Header -->
                <header class="hidden lg:flex items-center justify-between h-16 bg-white border-b border-gray-200 px-6">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none focus:text-primary-500 mr-4">
                            <i class="bx bx-menu text-2xl"></i>
                        </button>

                        <!-- Breadcrumbs -->
                        <nav class="text-sm">
                            @yield('breadcrumbs', '<span class="text-gray-500">Dashboard</span>')
                        </nav>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 focus:outline-none hover:text-primary-500">
                            <i class="bx bx-bell text-xl"></i>
                        </button>

                        <div class="relative" x-data="{ userDropdownOpen: false }">
                            <button @click="userDropdownOpen = !userDropdownOpen" class="flex items-center text-gray-700 focus:outline-none">
                                <img src="https://i.pravatar.cc/36" alt="Admin User" class="h-8 w-8 rounded-full">
                                <span class="ml-2 text-sm font-medium">Admin User</span>
                                <i class="bx bx-chevron-down ml-1"></i>
                            </button>

                            <div x-show="userDropdownOpen" @click.away="userDropdownOpen = false" x-cloak
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a> --}}
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                {{-- <form method="POST" action="{{ url('') }}"> --}}
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Flash Messages -->
                @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="bg-green-50 border-l-4 border-green-500 p-4 m-4">
                    <div class="flex items-center">
                        <i class="bx bx-check-circle text-green-500 text-xl mr-2"></i>
                        <p class="text-green-700">{{ session('success') }}</p>
                        <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="bg-red-50 border-l-4 border-red-500 p-4 m-4">
                    <div class="flex items-center">
                        <i class="bx bx-error-circle text-red-500 text-xl mr-2"></i>
                        <p class="text-red-700">{{ session('error') }}</p>
                        <button @click="show = false" class="ml-auto text-red-500 hover:text-red-700">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                </div>
                @endif

                <!-- Page Content -->
                <div class="p-6">
                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="bg-white border-t border-gray-200 py-4 px-6">
                    <div class="text-center text-sm text-gray-500">
                        &copy; {{ date('Y') }} FlexSMS Admin. All rights reserved.
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <!-- Modal Component -->
    <div x-data="{ showModal: false, modalTitle: '', modalContent: '', confirmAction: null }"
         x-show="showModal" x-cloak
         class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">

        <!-- Overlay -->
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-50" @click="showModal = false"></div>

        <!-- Modal -->
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="relative bg-white rounded-lg max-w-md w-full mx-4 shadow-xl">

            <div class="p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800" x-text="modalTitle">Modal Title</h3>
            </div>

            <div class="p-4">
                <p class="text-gray-600" x-text="modalContent">Modal content goes here...</p>
            </div>

            <div class="p-4 border-t border-gray-200 flex justify-end space-x-3">
                <button @click="showModal = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Cancel
                </button>
                <button @click="confirmAction && confirmAction(); showModal = false" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <!-- Common scripts -->
    <script>
        // Common JavaScript for modal
        window.showConfirmModal = function(title, content, action) {
            let modal = document.querySelector('div[x-data*="showModal"]').__x.$data;
            modal.modalTitle = title;
            modal.modalContent = content;
            modal.confirmAction = action;
            modal.showModal = true;
        }
    </script>

    @stack('scripts')
</body>
</html>
