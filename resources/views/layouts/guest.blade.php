<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FitSphere') }} - Welcome</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-900">
    <div class="min-h-screen flex">
        
        <!-- Image Section (Hidden on Mobile) -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-gray-900 overflow-hidden items-center justify-center">
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-overlay" alt="Fitness Training">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent"></div>
            
            <div class="relative z-10 p-12 text-left max-w-lg">
                <a href="{{ route('home') }}" class="text-3xl font-black text-white tracking-tight flex items-center gap-2 mb-12">
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    FitSphere
                </a>
                <h1 class="text-4xl font-extrabold text-white mb-4">Push harder than yesterday if you want a different tomorrow.</h1>
                <p class="text-gray-300 text-lg">Join the most elite fitness platform and start tracking your progress, accessing premium programs, and joining live sessions.</p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white relative">
            <!-- Mobile Header Logo -->
            <div class="absolute top-8 left-8 lg:hidden">
                <a href="{{ route('home') }}" class="text-2xl font-black text-gray-900 tracking-tight flex items-center gap-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    FitSphere
                </a>
            </div>

            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </div>
        
    </div>
</body>
</html>
