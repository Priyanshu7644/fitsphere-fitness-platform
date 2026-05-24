@extends('layouts.public')

@section('title', $liveSession->title . ' - FitSphere Live')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('public.live-sessions') }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Schedule
            </a>
            <span class="px-3 py-1 bg-red-100 text-red-600 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm flex items-center gap-2">
                <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span> LIVE SESSION
            </span>
        </div>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Header Image -->
            <div class="relative h-64 sm:h-80 w-full bg-gray-900">
                @if($liveSession->trainer->profile_picture)
                    <img src="{{ str_starts_with($liveSession->trainer->profile_picture, 'http') ? $liveSession->trainer->profile_picture : asset('storage/' . $liveSession->trainer->profile_picture) }}" alt="{{ $liveSession->trainer->name }}" class="w-full h-full object-cover opacity-60">
                @else
                    <div class="w-full h-full bg-gradient-to-tr from-gray-800 to-gray-900"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                
                <div class="absolute bottom-8 left-8 right-8 text-white">
                    <h1 class="text-3xl sm:text-5xl font-extrabold mb-4">{{ $liveSession->title }}</h1>
                    <div class="flex items-center gap-6 text-gray-300 font-medium text-lg">
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ \Carbon\Carbon::parse($liveSession->session_date)->format('F j, Y') }}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ \Carbon\Carbon::parse($liveSession->session_date)->format('h:i A') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-8 sm:p-12 flex flex-col md:flex-row gap-12">
                <!-- Left Details -->
                <div class="w-full md:w-2/3">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">About this Session</h3>
                    <div class="prose prose-lg text-gray-600 mb-8">
                        <p>Join {{ $liveSession->trainer->name }} for an intense, interactive live session. This class is designed to push your limits in real-time, with live form corrections and Q&A.</p>
                        <p><strong>Platform:</strong> {{ ucfirst($liveSession->platform) }}</p>
                    </div>

                    <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100 flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Ready to Join?</h4>
                            <p class="text-sm text-gray-600 mt-1">Make sure you have your water bottle and mat ready!</p>
                        </div>
                        @auth
                            @if(session('has_pass'))
                                <a href="{{ $liveSession->meeting_link }}" target="_blank" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:scale-105">
                                    Join Meeting
                                </a>
                            @else
                                <button onclick="document.getElementById('payment-modal').classList.remove('hidden')" class="px-8 py-4 bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white font-bold rounded-xl shadow-lg shadow-red-500/30 transition transform hover:scale-105">
                                    Get FitSphere Pass to Join
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="px-8 py-4 bg-gray-900 hover:bg-black text-white font-bold rounded-xl shadow-lg transition">
                                Login to Join
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Right Sidebar (Trainer Info) -->
                <div class="w-full md:w-1/3">
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 text-center">
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Instructor</h3>
                        <div class="w-24 h-24 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg mb-4 bg-blue-100">
                            @if($liveSession->trainer->profile_picture)
                                <img src="{{ str_starts_with($liveSession->trainer->profile_picture, 'http') ? $liveSession->trainer->profile_picture : asset('storage/' . $liveSession->trainer->profile_picture) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl font-bold text-blue-600">
                                    {{ substr($liveSession->trainer->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <h4 class="text-xl font-bold text-gray-900">{{ $liveSession->trainer->name }}</h4>
                        <p class="text-blue-600 text-sm font-medium mt-1">{{ $liveSession->trainer->trainerProfile->specialization ?? 'Fitness Expert' }}</p>
                        
                        <a href="{{ route('public.trainers') }}" class="inline-block mt-6 px-6 py-2 border-2 border-gray-200 rounded-full text-sm font-bold text-gray-600 hover:bg-gray-100 transition">
                            View Profile
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Mock Payment Modal -->
<div id="payment-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('payment-modal').classList.add('hidden')"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-2" id="modal-title">FitSphere Pass Required</h3>
                <p class="text-sm text-gray-500 mb-6">You need an active Pass to join live sessions. Scan the QR code below to make a payment.</p>
                
                <div class="w-48 h-48 mx-auto bg-gray-100 p-4 rounded-xl border-2 border-dashed border-gray-300 mb-6 flex items-center justify-center relative overflow-hidden">
                    <!-- Random Mock QR Code -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=MockPayment{{ rand(1000, 9999) }}" alt="QR Code" class="w-full h-full opacity-50 blur-[1px]">
                    <div class="absolute inset-0 bg-red-500/10 flex items-center justify-center">
                        <span class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">NOT WORKING</span>
                    </div>
                </div>

                <form action="{{ route('passes.mock-buy') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-3 bg-blue-600 text-base font-bold text-white hover:bg-blue-700 focus:outline-none sm:text-sm transition">
                        Simulate Payment Success
                    </button>
                </form>
                <button type="button" onclick="document.getElementById('payment-modal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-3 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
