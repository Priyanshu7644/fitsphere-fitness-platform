@extends('layouts.public')
@section('title', 'Shopping Cart')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="flex items-center gap-4 mb-10">
        <a href="{{ route('store.index') }}" class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center text-gray-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900">Your Cart</h1>
            @php $cartCount = session('cart') ? count(session('cart')) : 0; @endphp
            <p class="text-sm text-gray-500">{{ $cartCount }} {{ Str::plural('item', $cartCount) }} in your bag</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 font-medium px-5 py-4 rounded-xl flex items-center gap-3">
            <svg class="w-5 h-5 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('cart') && count(session('cart')) > 0)
        <div class="lg:grid lg:grid-cols-12 lg:gap-10">

            {{-- Cart Items List --}}
            <div class="lg:col-span-8 space-y-4">
                @php $total = 0 @endphp
                @foreach(session('cart') as $id => $details)
                    @php
                        $total += $details['price'] * $details['quantity'];
                        $imgSrc = str_starts_with($details['image'] ?? '', '/images/')
                            ? asset($details['image'])
                            : (str_starts_with($details['image'] ?? '', 'http') ? $details['image'] : asset('storage/' . ($details['image'] ?? '')));
                    @endphp
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex gap-5 items-start">
                        {{-- Product image --}}
                        <div class="w-24 h-24 rounded-xl overflow-hidden bg-gray-100 shrink-0">
                            @if(!empty($details['image']))
                                <img src="{{ $imgSrc }}" class="w-full h-full object-cover" alt="{{ $details['name'] }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start gap-2">
                                <h3 class="text-base font-bold text-gray-900 leading-snug">{{ $details['name'] }}</h3>
                                <span class="text-base font-black text-gray-900 shrink-0">₹{{ number_format($details['price'] * $details['quantity'], 0) }}</span>
                            </div>
                            <p class="text-sm text-gray-400 mt-1">₹{{ number_format($details['price'], 0) }} each</p>

                            <div class="mt-4 flex items-center justify-between">
                                {{-- +/- Quantity Controls --}}
                                <div class="flex items-center bg-gray-100 rounded-xl overflow-hidden">
                                    {{-- Decrement (removes at 1) --}}
                                    <form action="{{ route('store.cart.decrement', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition font-bold text-lg" title="{{ $details['quantity'] == 1 ? 'Remove item' : 'Decrease quantity' }}">
                                            @if($details['quantity'] == 1)
                                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                            @endif
                                        </button>
                                    </form>

                                    <span class="w-10 h-10 flex items-center justify-center text-gray-900 font-black text-sm bg-white border-x border-gray-200">
                                        {{ $details['quantity'] }}
                                    </span>

                                    {{-- Increment --}}
                                    <form action="{{ route('store.cart.increment', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition font-bold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        </button>
                                    </form>
                                </div>

                                {{-- Remove --}}
                                <form action="{{ route('store.cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium flex items-center gap-1 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pt-4">
                    <a href="{{ route('store.index') }}" class="text-blue-600 hover:text-blue-800 font-bold flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Continue Shopping
                    </a>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="lg:col-span-4 mt-8 lg:mt-0">
                <div class="bg-gray-900 text-white rounded-2xl p-7 sticky top-24 shadow-xl">
                    <h2 class="text-xl font-black mb-6">Order Summary</h2>

                    <div class="space-y-3 text-sm mb-6">
                        <div class="flex justify-between text-gray-400">
                            <span>Subtotal ({{ $cartCount }} items)</span>
                            <span class="text-white font-medium">₹{{ number_format($total, 0) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>Shipping</span>
                            <span class="text-white font-medium">₹99</span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>GST (18%)</span>
                            <span class="text-white font-medium">₹{{ number_format($total * 0.18, 0) }}</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-700 pt-4 mb-7 flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-300">Total</span>
                        <span class="text-3xl font-black">₹{{ number_format($total + 99 + ($total * 0.18), 0) }}</span>
                    </div>

                    <a href="{{ route('store.checkout') }}" class="block w-full text-center py-4 bg-blue-600 hover:bg-blue-500 text-white font-black rounded-xl transition shadow-lg shadow-blue-500/30 text-lg">
                        Proceed to Checkout →
                    </a>

                    <div class="mt-5 flex items-center justify-center gap-2 text-gray-500 text-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Secure & Safe Payments
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="max-w-lg mx-auto py-20 text-center">
            <div class="w-28 h-28 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-14 h-14 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <h2 class="text-3xl font-black text-gray-900 mb-3">Your cart is empty</h2>
            <p class="text-gray-500 text-lg mb-8">Looks like you haven't added any products yet. Let's fix that!</p>
            <a href="{{ route('store.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 rounded-2xl font-black text-lg transition shadow-xl shadow-blue-500/30">
                Browse Products
            </a>
        </div>
    @endif
</div>
@endsection
