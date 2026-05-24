<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FitSphere') }} - Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link { transition: all 0.2s ease-in-out; }
        .sidebar-link:hover { background-color: rgba(255, 255, 255, 0.1); color: white; }
        .sidebar-link.active { background-color: #2563eb; color: white; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.5); }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside id="sidebar" class="w-64 bg-gray-900 text-gray-300 flex-shrink-0 hidden md:flex flex-col border-r border-gray-800 shadow-2xl z-20 absolute md:relative h-full transition-transform transform -translate-x-full md:translate-x-0">
            <div class="h-20 flex items-center px-8 border-b border-gray-800">
                <a href="{{ route('home') }}" class="text-2xl font-black text-white tracking-tight flex items-center gap-2">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    FitSphere
                </a>
            </div>
            
            <div class="p-6 flex-grow overflow-y-auto">
                <div class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Menu</div>
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-xl font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('public.programs') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        Browse Programs
                    </a>
                    <a href="{{ route('public.live-sessions') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl font-medium relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Live Classes
                        <span class="absolute top-3.5 right-4 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    </a>
                    <a href="{{ route('store.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        Store
                    </a>
                </nav>

                @if(auth()->user()->role === 'trainer' || auth()->user()->role === 'admin')
                <div class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 mt-8">Manage</div>
                <nav class="space-y-2">
                    <a href="{{ route('programs.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        My Content
                    </a>
                </nav>
                @endif
            </div>

            <div class="p-6 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link flex w-full items-center gap-3 px-4 py-3 rounded-xl font-medium text-red-400 hover:text-red-300 hover:bg-red-500/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col h-full overflow-hidden relative bg-slate-50">
            <!-- Topbar (Mobile Hamburger & User Dropdown) -->
            <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 z-10 shadow-sm">
                <div class="flex items-center">
                    <button id="mobile-menu-button" class="md:hidden text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    @yield('header_title')
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="hidden md:flex items-center gap-3 pr-4 border-r border-gray-200">
                        <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-purple-600 flex items-center justify-center text-white font-bold shadow-md">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="md:hidden">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-500 hover:text-red-700">
                            Log Out
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const btn = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        
        btn.addEventListener('click', () => {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                setTimeout(() => {
                    sidebar.classList.remove('-translate-x-full');
                }, 10);
            } else {
                sidebar.classList.add('-translate-x-full');
                setTimeout(() => {
                    sidebar.classList.add('hidden');
                }, 300);
            }
        });
    </script>
</body>
</html>
