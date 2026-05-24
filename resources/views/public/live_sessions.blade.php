@extends('layouts.public')

@section('title', 'Live Sessions - FitSphere')

@section('content')
<div class="bg-gray-900 py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl lg:text-6xl mb-6">Join Live Workouts</h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">Experience the energy of a live class from anywhere. Train with top experts in real-time.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($liveSessions->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($liveSessions as $session)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:-translate-y-2 transition duration-300 border border-gray-100 flex flex-col h-full">
                    <div class="relative aspect-video">
                        @if($session->trainer->profile_picture)
                            <img src="{{ str_starts_with($session->trainer->profile_picture, 'http') ? $session->trainer->profile_picture : asset('storage/' . $session->trainer->profile_picture) }}" alt="{{ $session->trainer->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-blue-600 to-purple-600 flex items-center justify-center text-white font-bold text-xl">
                                {{ $session->title }}
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-80"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold uppercase tracking-wider rounded-full shadow-lg flex items-center gap-2">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span> LIVE
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="text-sm font-semibold text-blue-600 uppercase tracking-wider mb-2">
                            {{ \Carbon\Carbon::parse($session->session_date)->format('M d, Y • h:i A') }}
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $session->title }}</h3>
                        <p class="text-gray-600 mb-6 flex-grow">Led by <span class="font-semibold text-gray-800">{{ $session->trainer->name }}</span> on {{ ucfirst($session->platform) }}</p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <a href="{{ route('public.live-sessions.show', $session) }}" class="block w-full text-center px-6 py-3 bg-gray-900 text-white font-bold rounded-xl hover:bg-blue-600 transition shadow-lg">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-12">
            {{ $liveSessions->links() }}
        </div>
    @else
        <div class="text-center py-24 bg-gray-50 rounded-2xl border border-gray-100">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            <h3 class="text-xl font-bold text-gray-900 mb-2">No upcoming live sessions</h3>
            <p class="text-gray-500">Check back later for newly scheduled live classes.</p>
        </div>
    @endif
</div>
@endsection
