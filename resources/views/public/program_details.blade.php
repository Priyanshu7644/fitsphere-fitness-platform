@extends('layouts.public')

@section('title', $program->title . ' - FitSphere')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 py-20 lg:py-32">
    <div class="absolute inset-0">
        @if($program->image)
            <img src="{{ str_starts_with($program->image, 'http') ? $program->image : asset('storage/' . $program->image) }}" class="w-full h-full object-cover opacity-40" alt="{{ $program->title }}">
        @else
            <div class="w-full h-full bg-gray-800 opacity-80"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/80 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center lg:text-left flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-2/3">
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3 mb-6">
                <span class="px-4 py-1.5 text-sm font-bold tracking-wider text-blue-900 bg-blue-100 rounded-full uppercase">
                    {{ str_replace('_', ' ', $program->category) }}
                </span>
                <span class="px-4 py-1.5 text-sm font-bold tracking-wider rounded-full uppercase
                    @if($program->difficulty_level == 'beginner') bg-green-100 text-green-900
                    @elseif($program->difficulty_level == 'intermediate') bg-yellow-100 text-yellow-900
                    @else bg-red-100 text-red-900 @endif">
                    {{ $program->difficulty_level }}
                </span>
                <span class="px-4 py-1.5 text-sm font-bold tracking-wider text-gray-900 bg-gray-100 rounded-full uppercase">
                    {{ $program->duration_weeks }} Weeks
                </span>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6">{{ $program->title }}</h1>
            <p class="text-lg text-gray-300 max-w-3xl mx-auto lg:mx-0 mb-8 leading-relaxed">
                A structured, expert-led program designed to help you crush your fitness goals. Get daily workouts, diet plans, and community support.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                @auth
                    @if(auth()->user()->role === 'user')
                        <form action="{{ route('programs.enroll', $program) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full sm:w-auto px-8 py-4 border border-transparent text-lg font-bold rounded-full text-white bg-blue-600 hover:bg-blue-700 transition shadow-lg shadow-blue-500/40">
                                Enroll Now
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-bold rounded-full text-white bg-blue-600 hover:bg-blue-700 transition shadow-lg shadow-blue-500/40">
                        Login to Enroll
                    </a>
                @endauth
            </div>
        </div>

        <div class="lg:w-1/3">
            <div class="bg-gray-800/80 backdrop-blur-md rounded-2xl p-8 border border-gray-700 text-center">
                <h3 class="text-gray-400 text-sm font-bold tracking-widest uppercase mb-4">Lead Trainer</h3>
                <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4 border-2 border-blue-500 shadow-lg">
                    @if($program->trainer->profile_picture)
                        <img src="{{ asset('storage/' . $program->trainer->profile_picture) }}" class="w-full h-full object-cover" alt="{{ $program->trainer->name }}">
                    @else
                        <div class="w-full h-full bg-blue-600 flex items-center justify-center text-white text-3xl font-bold">
                            {{ substr($program->trainer->name, 0, 1) }}
                        </div>
                    @endif
                </div>
                <h4 class="text-xl font-bold text-white">{{ $program->trainer->name }}</h4>
                <p class="text-blue-400 font-medium text-sm mt-1">{{ $program->trainer->trainerProfile->specialization ?? 'Fitness Expert' }}</p>
                <a href="{{ route('public.trainers') }}" class="inline-block mt-4 text-sm text-gray-300 hover:text-white underline">View Trainer Profile</a>
            </div>
        </div>
    </div>
</div>

<!-- Program Details Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left Column: About & Curriculum -->
            <div class="lg:col-span-2 space-y-12">
                <section>
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-6">About the Program</h2>
                    <div class="prose prose-lg text-gray-600 max-w-none leading-relaxed">
                        {!! nl2br(e($program->description)) !!}
                    </div>
                </section>

                <section>
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-6">What You'll Get</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100 flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 text-blue-600 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Structured Workouts</h4>
                                <p class="text-gray-600 text-sm">Step-by-step daily routines designed for maximum results.</p>
                            </div>
                        </div>
                        <div class="bg-green-50 rounded-xl p-6 border border-green-100 flex items-start">
                            <div class="flex-shrink-0 bg-green-100 text-green-600 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Nutrition Plan</h4>
                                <p class="text-gray-600 text-sm">Dietary guidelines to fuel your workouts and recovery.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- Right Column: Sidebar info -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200 sticky top-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Program Overview</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between pb-4 border-b border-gray-200">
                            <span class="text-gray-500">Duration</span>
                            <span class="font-bold text-gray-900">{{ $program->duration_weeks }} Weeks</span>
                        </li>
                        <li class="flex items-center justify-between pb-4 border-b border-gray-200">
                            <span class="text-gray-500">Difficulty</span>
                            <span class="font-bold text-gray-900 capitalize">{{ $program->difficulty_level }}</span>
                        </li>
                        <li class="flex items-center justify-between pb-4 border-b border-gray-200">
                            <span class="text-gray-500">Category</span>
                            <span class="font-bold text-gray-900 capitalize">{{ str_replace('_', ' ', $program->category) }}</span>
                        </li>
                        <li class="flex items-center justify-between pb-4 border-b border-gray-200">
                            <span class="text-gray-500">Language</span>
                            <span class="font-bold text-gray-900">English</span>
                        </li>
                    </ul>
                    
                    <div class="mt-8">
                        @auth
                            @if(auth()->user()->role === 'user')
                                <form action="{{ route('programs.enroll', $program) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full px-6 py-4 border border-transparent text-lg font-bold rounded-xl text-white bg-gray-900 hover:bg-black transition">
                                        Join Program
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="block text-center w-full px-6 py-4 border border-transparent text-lg font-bold rounded-xl text-white bg-gray-900 hover:bg-black transition">
                                Login to Join
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
