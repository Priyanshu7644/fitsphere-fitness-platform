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

<!-- Passes Section -->
@if(isset($passes) && count($passes) > 0)
<div class="py-20 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-sm font-bold tracking-widest uppercase text-red-500 mb-2">Membership</h2>
            <p class="text-4xl leading-tight font-extrabold sm:text-5xl">
                FitSphere Passes
            </p>
            <p class="mt-4 max-w-2xl text-lg text-gray-400 mx-auto">
                Unlock unlimited access to physical centers, online programs, and live sessions with a single pass.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($passes as $pass)
            <div class="bg-gray-800 rounded-3xl p-8 border border-gray-700 shadow-2xl hover:border-gray-500 transition-all transform hover:-translate-y-2 flex flex-col relative overflow-hidden group">
                @if($pass->type == 'elite')
                <div class="absolute top-0 right-0 bg-gradient-to-l from-red-600 to-pink-600 text-xs font-bold px-4 py-1 rounded-bl-xl shadow-lg">MOST POPULAR</div>
                @endif
                <h3 class="text-2xl font-black uppercase tracking-wider text-white mb-2">{{ $pass->title }}</h3>
                <p class="text-gray-400 text-sm mb-6 flex-grow">{{ $pass->description }}</p>
                <div class="mb-6">
                    <span class="text-4xl font-extrabold">₹{{ $pass->price }}</span>
                    <span class="text-gray-500">/ {{ $pass->duration_days }} days</span>
                </div>
                
                @if(is_string($pass->features))
                    @php $features = json_decode($pass->features, true); @endphp
                @else
                    @php $features = $pass->features; @endphp
                @endif
                
                @if(is_array($features) && count($features) > 0)
                    <ul class="mb-8 flex-grow space-y-3">
                        @foreach($features as $feature)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-400 mr-2 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-gray-300 text-sm">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="mb-8 flex-grow"></div>
                @endif
                
                <a href="{{ route('public.passes.show', $pass->id) }}" class="w-full text-center px-6 py-4 rounded-xl font-bold text-white transition 
                    {{ $pass->type == 'elite' ? 'bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 shadow-lg shadow-red-500/30' : 'bg-gray-700 hover:bg-gray-600' }}">
                    View Details
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Features Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-sm text-blue-600 font-bold tracking-widest uppercase mb-2">Platform Features</h2>
            <p class="text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">
                A better way to train
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <a href="{{ route('public.programs') }}" class="group block bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Custom Programs</h3>
                <p class="text-gray-500 text-sm">Tailored fitness programs with daily routines from experts.</p>
            </a>
            
            <!-- Feature 2 -->
            <a href="{{ route('public.live-sessions') }}" class="group block bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 group-hover:text-white transition relative">
                    <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full animate-ping"></span>
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Live Sessions</h3>
                <p class="text-gray-500 text-sm">Interactive workouts and Q&A with trainers in real-time.</p>
            </a>

            <!-- Feature 3 -->
            <a href="{{ route('public.centers') }}" class="group block bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Physical Centers</h3>
                <p class="text-gray-500 text-sm">Access to state-of-the-art gym locations nationwide.</p>
            </a>

            <!-- Feature 4 -->
            <a href="{{ route('store.index') }}" class="group block bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Fitness Store</h3>
                <p class="text-gray-500 text-sm">Premium workout gear, mats, and nutritional supplements.</p>
            </a>
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
                        <img src="{{ str_starts_with($trainer->profile_picture, 'http') ? $trainer->profile_picture : asset('storage/' . $trainer->profile_picture) }}" class="w-full h-full object-cover" alt="{{ $trainer->name }}">
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
