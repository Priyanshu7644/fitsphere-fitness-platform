@extends('layouts.public')

@section('title', 'Online Fitness & Training Platform')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 overflow-hidden flex flex-col lg:flex-row min-h-[85vh]">
    <!-- Text Section (Left Half) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-20 z-10">
        <div class="text-center lg:text-left w-full max-w-2xl">
            <h1 class="text-4xl tracking-tight font-heading font-extrabold text-white sm:text-5xl md:text-6xl">
                <span class="block">Transform your body</span>
                <span class="block text-blue-500">with FitSphere</span>
            </h1>
            <p class="mt-4 text-base text-gray-300 sm:mt-5 sm:text-lg md:text-xl">
                Join our premium online fitness training platform. Access world-class trainers, personalized workout routines, and diet plans designed just for you.
            </p>
            <div class="mt-8 sm:flex sm:justify-center lg:justify-start gap-4">
                <a href="{{ route('register') }}" class="w-full sm:w-auto flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 md:text-lg transition shadow-lg shadow-blue-500/30">
                    Get Started
                </a>
                <a href="{{ route('public.programs') }}" class="mt-4 sm:mt-0 w-full sm:w-auto flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-full text-blue-100 bg-gray-800 hover:bg-gray-700 md:text-lg transition">
                    Explore Programs
                </a>
            </div>
        </div>
    </div>
    <!-- Image Section (Right Half) -->
    <div class="w-full lg:w-1/2 relative min-h-[400px] lg:min-h-full">
        <img class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=2070&auto=format&fit=crop" alt="Fitness Training">
        <!-- Gradient overlay for mobile readability if it stacked differently, but since it's flex it's fine -->
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent lg:hidden"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-transparent to-transparent hidden lg:block w-32"></div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Features</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                A better way to train
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                Everything you need to reach your fitness goals in one platform.
            </p>
        </div>

        <div class="mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Custom Programs</h3>
                    <p class="text-gray-500">Access fitness programs tailored to your specific goals, from weight loss to muscle gain.</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Diet & Nutrition</h3>
                    <p class="text-gray-500">Comprehensive meal plans to complement your training and maximize your results.</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Live Sessions</h3>
                    <p class="text-gray-500">Join interactive live workouts and Q&A sessions with professional trainers.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Programs Section -->
@if(count($featuredPrograms) > 0)
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Start Training</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Featured Programs
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredPrograms as $program)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 flex flex-col">
                <div class="relative h-48 bg-gray-200">
                    @if($program->image)
                        <img src="{{ str_starts_with($program->image, 'http') ? $program->image : asset('storage/' . $program->image) }}" class="w-full h-full object-cover" alt="{{ $program->title }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">No Cover</div>
                    @endif
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold shadow-sm text-gray-800">
                        {{ ucfirst($program->difficulty_level) }}
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $program->title }}</h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-2 flex-grow">{{ $program->description }}</p>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $program->duration_weeks ?? 'N/A' }} weeks
                        </div>
                        <a href="{{ route('public.programs') }}" class="text-blue-600 font-semibold text-sm hover:text-blue-800">Learn more &rarr;</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Top Trainers Section -->
@if(count($trainers) > 0)
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Expert Guidance</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Meet Our Top Trainers
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($trainers as $trainer)
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300 border border-gray-100 group">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-6 border-4 border-white shadow-md group-hover:scale-105 transition-transform">
                    @if($trainer->profile_picture)
                        <img src="{{ asset('storage/' . $trainer->profile_picture) }}" class="w-full h-full object-cover" alt="{{ $trainer->name }}">
                    @else
                        <div class="w-full h-full bg-blue-100 text-blue-600 flex items-center justify-center text-3xl font-bold">
                            {{ substr($trainer->name, 0, 1) }}
                        </div>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ $trainer->name }}</h3>
                <p class="text-blue-600 text-sm font-medium mt-1 mb-4">{{ $trainer->trainerProfile->specialization ?? 'Fitness Expert' }}</p>
                <p class="text-gray-500 text-sm line-clamp-3 mb-6">{{ $trainer->trainerProfile->experience ?? 'Dedicated to helping you achieve your best self through structured and effective training.' }}</p>
                <a href="{{ route('public.trainers') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-200 rounded-full text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:text-blue-600 transition">
                    View Profile
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="bg-blue-600">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Ready to start your journey?</span>
            <span class="block text-blue-200">Create an account today.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                    Get started
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
