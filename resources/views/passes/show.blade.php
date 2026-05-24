@extends('layouts.public')

@section('title', 'FitSphere ' . ucfirst($pass->type) . ' Pass Details')

@section('content')
<div class="bg-gray-900 py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="lg:w-1/2">
                @if($pass->type == 'elite')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 mb-4">
                        Most Popular
                    </span>
                @endif
                <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl lg:text-6xl mb-4">{{ $pass->title }}</h1>
                <p class="text-xl text-gray-300 max-w-3xl mb-8">{{ $pass->description }}</p>
                <div class="flex items-end gap-2 mb-8">
                    <span class="text-5xl font-extrabold text-white">₹{{ number_format($pass->price, 0) }}</span>
                    <span class="text-xl text-gray-400 mb-1">/ {{ $pass->duration_days }} days</span>
                </div>
                <div class="flex gap-4">
                    <button onclick="document.getElementById('payment-modal').classList.remove('hidden')" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition transform hover:-translate-y-1">
                        Get This Pass
                    </button>
                    <a href="{{ route('public.passes') }}" class="px-8 py-4 bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-xl transition">
                        Compare Passes
                    </a>
                </div>
            </div>
            <div class="hidden lg:block lg:w-5/12 relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-purple-600 rounded-3xl transform rotate-3 scale-105 opacity-50 blur-lg"></div>
                <div class="relative bg-gray-800 rounded-3xl p-8 border border-gray-700 shadow-2xl">
                    <h3 class="text-xl font-bold text-white mb-6 border-b border-gray-700 pb-4">What's Included</h3>
                    @php 
                        $features = is_string($pass->features) ? json_decode($pass->features, true) : $pass->features; 
                    @endphp
                    @if(is_array($features) && count($features) > 0)
                        <ul class="space-y-4">
                            @foreach($features as $feature)
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-green-400 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span class="text-gray-300 text-lg">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-sm font-bold tracking-widest uppercase text-blue-600 mb-2">Your Journey</h2>
            <p class="text-3xl leading-tight font-extrabold text-gray-900 sm:text-4xl">
                The {{ ucfirst($pass->type) }} Pass Roadmap
            </p>
            <p class="mt-4 text-lg text-gray-500">Here is what you can expect in your first 3 months on this pass.</p>
        </div>

        <div class="relative">
            <div class="absolute inset-0 flex items-center justify-center w-8 h-full left-4 md:left-1/2 md:-ml-4">
                <div class="w-1 h-full bg-blue-200"></div>
            </div>
            <div class="space-y-12">
                @foreach($roadmap as $index => $step)
                <div class="relative flex flex-col md:flex-row items-center justify-between group">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white font-bold z-10 absolute left-4 md:left-1/2 md:-ml-4 ring-4 ring-white shadow">
                        {{ $index + 1 }}
                    </div>
                    
                    @if($index % 2 == 0)
                        <div class="w-full md:w-5/12 pl-16 md:pl-0 md:pr-12 text-left md:text-right">
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group-hover:shadow-md transition">
                                <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $step['title'] }}</h4>
                                <p class="text-gray-500">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                        <div class="hidden md:block w-5/12"></div>
                    @else
                        <div class="hidden md:block w-5/12"></div>
                        <div class="w-full md:w-5/12 pl-16 md:pl-12 text-left">
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group-hover:shadow-md transition">
                                <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $step['title'] }}</h4>
                                <p class="text-gray-500">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                @endforeach
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
                <h3 class="text-2xl font-bold text-gray-900 mb-2" id="modal-title">Complete Purchase</h3>
                <p class="text-sm text-gray-500 mb-6">Scan the QR code below to purchase the {{ $pass->title }} for ₹{{ number_format($pass->price, 0) }}.</p>
                
                <div class="w-48 h-48 mx-auto bg-gray-100 p-4 rounded-xl border-2 border-dashed border-gray-300 mb-6 flex items-center justify-center relative overflow-hidden">
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
