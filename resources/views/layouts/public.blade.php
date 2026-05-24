<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FitSphere - @yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:500,600,700,800" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-heading { font-family: 'Outfit', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, #111827 0%, #374151 100%); }
        .text-gradient { background: linear-gradient(to right, #3b82f6, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900 flex flex-col min-h-screen">
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="font-heading font-bold text-3xl tracking-tight text-gray-900">
                        Fit<span class="text-blue-600">Sphere</span>
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-500 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">About</a>
                    <a href="{{ route('public.programs') }}" class="text-gray-500 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">Programs</a>
                    <a href="{{ route('public.trainers') }}" class="text-gray-500 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">Trainers</a>
                    <a href="{{ route('contact') }}" class="text-gray-500 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">Contact</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-900 font-medium hover:text-blue-600 transition">Dashboard</a>
                    @else
                        <div class="relative group">
                            <button class="text-gray-900 font-medium hover:text-blue-600 transition flex items-center h-full py-2">
                                Log in
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="absolute right-0 top-full pt-2 w-48 z-50 hidden group-hover:block">
                                <div class="bg-white rounded-md shadow-lg py-1 border border-gray-100">
                                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">User Login</a>
                                    <a href="{{ route('trainer.login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Trainer Login</a>
                                </div>
                            </div>
                        </div>
                        @if (Route::has('register'))
                            <div class="relative group ml-4">
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full font-medium transition shadow-lg shadow-blue-500/30 flex items-center">
                                    Join Now
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div class="absolute right-0 top-full pt-2 w-48 z-50 hidden group-hover:block">
                                    <div class="bg-white rounded-md shadow-lg py-1 border border-gray-100">
                                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign Up as User</a>
                                        <a href="{{ route('trainer.register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Become a Trainer</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 border-t border-gray-800 text-gray-300">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <span class="font-heading font-bold text-3xl tracking-tight text-white">
                        Fit<span class="text-blue-500">Sphere</span>
                    </span>
                    <p class="text-gray-400 text-base">
                        Your ultimate platform for fitness and training. Join our community and transform your life today.
                    </p>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Navigation</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="{{ route('home') }}" class="text-base text-gray-400 hover:text-white transition">Home</a></li>
                                <li><a href="{{ route('about') }}" class="text-base text-gray-400 hover:text-white transition">About</a></li>
                                <li><a href="{{ route('public.programs') }}" class="text-base text-gray-400 hover:text-white transition">Programs</a></li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase">Support</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="{{ route('contact') }}" class="text-base text-gray-400 hover:text-white transition">Contact</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white transition">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-8">
                <p class="text-base text-gray-400 xl:text-center">
                    &copy; {{ date('Y') }} FitSphere. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
