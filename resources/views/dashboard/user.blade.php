@extends('layouts.dashboard')

@section('header_title')
    <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">My Journey</h2>
@endsection

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Pass Integration Banner -->
    @if(session('has_pass'))
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between relative overflow-hidden">
            <div class="absolute right-0 top-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
            <div class="absolute right-32 bottom-0 w-32 h-32 bg-white opacity-10 rounded-full -mb-10"></div>
            
            <div class="relative z-10 flex items-center gap-6 mb-6 md:mb-0">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-md border border-white/30 shadow-inner">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <div>
                    <p class="text-blue-100 font-bold uppercase tracking-widest text-xs mb-1">Active Membership</p>
                    <h2 class="text-3xl font-black">FitSphere PRO Pass</h2>
                </div>
            </div>
            <div class="relative z-10">
                <a href="{{ route('public.passes') }}" class="px-6 py-3 bg-white text-blue-700 font-bold rounded-xl shadow-lg hover:bg-gray-50 transition transform hover:-translate-y-1 inline-block">
                    Manage Pass
                </a>
            </div>
        </div>
    @else
        <div class="bg-gray-900 rounded-3xl p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between border border-gray-800">
            <div class="flex items-center gap-6 mb-6 md:mb-0">
                <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center border border-gray-700">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-1">Unlock Premium Features</h2>
                    <p class="text-gray-400 max-w-md">Get a FitSphere Pass to access 100+ workout programs, live sessions, and exclusive physical centers.</p>
                </div>
            </div>
            <div>
                <a href="{{ route('public.passes') }}" class="px-6 py-3 bg-gradient-to-r from-rose-600 to-orange-500 hover:from-rose-500 hover:to-orange-400 text-white font-bold rounded-xl shadow-lg shadow-rose-500/30 transition transform hover:-translate-y-1 inline-block">
                    Explore Passes
                </a>
            </div>
        </div>
    @endif

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm font-bold text-gray-500 mb-1">Active Programs</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $enrollments->count() }}</h3>
            </div>
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm font-bold text-gray-500 mb-1">Completed Workouts</p>
                <h3 class="text-4xl font-black text-gray-900">0</h3>
            </div>
            <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm font-bold text-gray-500 mb-1">Upcoming Sessions</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $upcomingSessions->count() }}</h3>
            </div>
            <div class="w-16 h-16 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Enrolled Programs -->
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-900">My Programs</h3>
                <a href="{{ route('public.programs') }}" class="text-blue-600 hover:text-blue-800 font-bold flex items-center gap-1">
                    Browse Catalog <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            @if($enrollments->isEmpty())
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100 border-dashed">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">No Programs Yet</h3>
                    <p class="text-gray-500 mb-6 max-w-sm mx-auto">Start your fitness journey by exploring our tailored workout programs designed by top experts.</p>
                    <a href="{{ route('public.programs') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition">Find a Program</a>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($enrollments as $enrollment)
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition group">
                            <div class="flex items-center gap-6">
                                <div class="w-24 h-24 rounded-xl overflow-hidden shadow-sm shrink-0 bg-gray-100">
                                    <img src="{{ str_starts_with($enrollment->program->image, 'http') ? $enrollment->program->image : asset('storage/' . $enrollment->program->image) }}" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800 mb-2 uppercase tracking-wide">
                                        In Progress
                                    </span>
                                    <h4 class="text-xl font-bold text-gray-900">{{ $enrollment->program->title }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">Instructor: {{ $enrollment->program->trainer->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="hidden sm:block">
                                <button class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition shadow-sm">
                                    <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Right Column (Live Sessions & Charts) -->
        <div class="space-y-8">
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-6">Upcoming Schedule</h3>
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    @if($upcomingSessions->isEmpty())
                        <div class="text-center py-6 text-gray-500">
                            No upcoming live sessions booked.
                        </div>
                    @else
                        <div class="space-y-4 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-200 before:to-transparent">
                            @foreach($upcomingSessions as $session)
                                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-blue-100 text-blue-600 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 relative z-10 font-bold text-xs">
                                        {{ \Carbon\Carbon::parse($session->session_date)->format('d') }}
                                    </div>
                                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-2xl border border-gray-100 bg-gray-50 shadow-sm">
                                        <div class="flex items-center justify-between mb-1">
                                            <div class="font-bold text-gray-900 text-sm truncate">{{ $session->title }}</div>
                                        </div>
                                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($session->session_date)->format('M, h:i A') }}</div>
                                        @if(session('has_pass'))
                                        <a href="{{ $session->meeting_link ?? '#' }}" class="mt-3 block w-full text-center py-2 bg-white border border-gray-200 rounded-lg text-xs font-bold text-blue-600 hover:bg-blue-50 transition">
                                            Join Meeting
                                        </a>
                                        @else
                                        <button disabled class="mt-3 block w-full text-center py-2 bg-gray-100 border border-gray-200 rounded-lg text-xs font-bold text-gray-400 cursor-not-allowed">
                                            Pass Required
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Activity Chart Mock -->
            <div class="bg-gray-900 rounded-3xl p-6 shadow-xl border border-gray-800 text-white">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold">Weekly Activity</h3>
                    <button class="text-gray-400 hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg></button>
                </div>
                <div class="h-40 flex items-end justify-between gap-2">
                    <!-- Fake bars for aesthetic -->
                    <div class="w-1/7 bg-gray-700 hover:bg-blue-500 rounded-t-sm h-[30%] transition-colors relative group"><span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs hidden group-hover:block">M</span></div>
                    <div class="w-1/7 bg-gray-700 hover:bg-blue-500 rounded-t-sm h-[50%] transition-colors relative group"><span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs hidden group-hover:block">T</span></div>
                    <div class="w-1/7 bg-blue-500 rounded-t-sm h-[80%] transition-colors relative group"><span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs hidden group-hover:block">W</span></div>
                    <div class="w-1/7 bg-gray-700 hover:bg-blue-500 rounded-t-sm h-[40%] transition-colors relative group"><span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs hidden group-hover:block">T</span></div>
                    <div class="w-1/7 bg-gray-700 hover:bg-blue-500 rounded-t-sm h-[60%] transition-colors relative group"><span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs hidden group-hover:block">F</span></div>
                    <div class="w-1/7 bg-gray-700 hover:bg-blue-500 rounded-t-sm h-[20%] transition-colors relative group"><span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs hidden group-hover:block">S</span></div>
                    <div class="w-1/7 bg-gray-700 hover:bg-blue-500 rounded-t-sm h-[10%] transition-colors relative group"><span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs hidden group-hover:block">S</span></div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
