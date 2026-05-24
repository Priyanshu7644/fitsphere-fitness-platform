<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a href="{{ route('public.live-sessions') }}" class="text-red-500 inline-flex items-center px-1 pt-1 font-bold hover:text-red-600 transition gap-1">
                        <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                        Live
                    </a>
                    <a href="{{ route('public.trainers') }}" class="text-gray-500 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">Trainers</a>
                    <a href="{{ route('store.index') }}" class="text-gray-500 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">Store</a>
                    <a href="{{ route('contact') }}" class="text-gray-500 inline-flex items-center px-1 pt-1 font-medium hover:text-blue-600 transition">Contact</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-900 font-medium hover:text-blue-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-900 font-medium hover:text-blue-600 transition h-full flex items-center">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-6 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full font-medium transition shadow-lg shadow-blue-500/30">
                                Join Now
                            </a>
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
                                <li><a href="{{ route('store.index') }}" class="text-base text-gray-400 hover:text-white transition">Store</a></li>
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

    {{-- ========= SLIDE-OUT CART DRAWER ========= --}}
    @php
        $cartItems = session('cart', []);
        $cartTotal = 0;
        foreach ($cartItems as $item) { $cartTotal += $item['price'] * $item['quantity']; }
    @endphp

    <div id="cart-backdrop" onclick="closeCart()" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300"></div>

    <div id="cart-drawer" class="fixed top-0 right-0 h-full w-full max-w-sm bg-white shadow-2xl z-50 flex flex-col translate-x-full transition-transform duration-300 ease-in-out">
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <h2 class="text-xl font-black text-gray-900">My Cart</h2>
                <span id="drawer-count" class="bg-blue-600 text-white text-xs font-black px-2.5 py-1 rounded-full">{{ count($cartItems) }}</span>
            </div>
            <button onclick="closeCart()" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div id="drawer-items" class="flex-1 overflow-y-auto p-6 space-y-5">
            @forelse($cartItems as $id => $details)
                @php
                    $imgSrc = str_starts_with($details['image'] ?? '', '/images/')
                        ? asset($details['image'])
                        : (str_starts_with($details['image'] ?? '', 'http') ? $details['image'] : asset('storage/' . ($details['image'] ?? '')));
                @endphp
                <div id="drawer-item-{{ $id }}" class="flex gap-4 items-start">
                    <div class="w-16 h-16 rounded-xl bg-gray-100 overflow-hidden shrink-0">
                        @if(!empty($details['image']))<img src="{{ $imgSrc }}" class="w-full h-full object-cover" alt="{{ $details['name'] }}">@endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 leading-tight truncate">{{ $details['name'] }}</p>
                        <p class="text-sm text-gray-500 mt-0.5">&#x20B9;{{ number_format($details['price'], 0) }} each</p>
                        <div class="mt-2 flex items-center gap-2">
                            <button onclick="cartDecrement('{{ $id }}')" id="btn-dec-{{ $id }}" class="w-7 h-7 rounded-lg bg-gray-100 hover:bg-red-50 hover:text-red-500 flex items-center justify-center text-gray-600 transition font-bold">
                                @if($details['quantity'] == 1)<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>@else<span>&#x2212;</span>@endif
                            </button>
                            <span id="qty-{{ $id }}" class="w-7 text-center text-sm font-black text-gray-900">{{ $details['quantity'] }}</span>
                            <button onclick="cartIncrement('{{ $id }}')" class="w-7 h-7 rounded-lg bg-gray-100 hover:bg-blue-50 hover:text-blue-600 flex items-center justify-center text-gray-600 transition font-bold">+</button>
                            <span id="item-total-{{ $id }}" class="ml-auto text-sm font-black text-gray-900">&#x20B9;{{ number_format($details['price'] * $details['quantity'], 0) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center h-full text-center py-20">
                    <svg class="w-16 h-16 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <p class="text-gray-400 font-medium">Your cart is empty</p>
                    <a href="{{ route('store.index') }}" onclick="closeCart()" class="mt-4 text-blue-600 font-bold text-sm hover:underline">Start Shopping &#x2192;</a>
                </div>
            @endforelse
        </div>

        <div id="drawer-footer" class="{{ count($cartItems) > 0 ? '' : 'hidden' }} p-6 border-t border-gray-100 bg-gray-50 space-y-4">
            <div class="flex justify-between items-center">
                <span class="text-gray-500 font-medium">Subtotal</span>
                <span id="drawer-subtotal" class="text-xl font-black text-gray-900">&#x20B9;{{ number_format($cartTotal, 0) }}</span>
            </div>
            <a href="{{ route('store.cart') }}" class="block w-full text-center py-3 border-2 border-gray-900 text-gray-900 font-bold rounded-xl hover:bg-gray-900 hover:text-white transition">View Full Cart</a>
            <a id="checkout-btn" href="{{ route('store.checkout') }}" class="block w-full text-center py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-xl transition shadow-lg shadow-blue-500/25">
                Checkout &#x2014; &#x20B9;{{ number_format($cartTotal + 99 + ($cartTotal * 0.18), 0) }}
            </a>
        </div>
    </div>

    <script>
        const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        function openCart() {
            document.getElementById('cart-drawer').classList.remove('translate-x-full');
            document.getElementById('cart-backdrop').classList.remove('hidden');
            setTimeout(() => document.getElementById('cart-backdrop').classList.replace('opacity-0','opacity-100'), 10);
            document.body.style.overflow = 'hidden';
        }
        function closeCart() {
            document.getElementById('cart-drawer').classList.add('translate-x-full');
            document.getElementById('cart-backdrop').classList.replace('opacity-100','opacity-0');
            setTimeout(() => document.getElementById('cart-backdrop').classList.add('hidden'), 300);
            document.body.style.overflow = '';
        }
        async function cartPost(url) {
            const res = await fetch(url, { method:'POST', headers:{'X-CSRF-TOKEN':CSRF,'Accept':'application/json','Content-Type':'application/json'} });
            return res.json();
        }
        function updateTotals(data) {
            const badge = document.getElementById('drawer-count');
            if (badge) badge.textContent = data.count;
            const floatBadge = document.getElementById('float-cart-count');
            if (floatBadge) { floatBadge.textContent = data.count; floatBadge.classList.toggle('hidden', data.count < 1); floatBadge.classList.toggle('flex', data.count > 0); }
            const sub = document.getElementById('drawer-subtotal');
            if (sub) sub.textContent = '\u20B9' + data.subtotal;
            const btn = document.getElementById('checkout-btn');
            if (btn) btn.textContent = 'Checkout \u2014 \u20B9' + data.total;
        }
        async function cartIncrement(id) {
            const data = await cartPost('/api/cart/increment/' + id);
            document.getElementById('qty-' + id).textContent = data.qty;
            document.getElementById('item-total-' + id).textContent = '\u20B9' + data.item_total;
            if (data.qty > 1) document.getElementById('btn-dec-' + id).innerHTML = '<span>\u2212</span>';
            updateTotals(data);
        }
        async function cartDecrement(id) {
            const data = await cartPost('/api/cart/decrement/' + id);
            if (data.removed) {
                const row = document.getElementById('drawer-item-' + id);
                if (row) { row.style.transition = 'opacity .25s,transform .25s'; row.style.opacity = '0'; row.style.transform = 'translateX(20px)'; }
                setTimeout(() => {
                    if (row) row.remove();
                    if (data.count === 0) {
                        document.getElementById('drawer-footer').classList.add('hidden');
                        document.getElementById('drawer-items').innerHTML = '<div class="flex flex-col items-center justify-center h-full text-center py-20"><svg class="w-16 h-16 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg><p class="text-gray-400 font-medium">Your cart is empty</p></div>';
                    }
                }, 260);
            } else {
                document.getElementById('qty-' + id).textContent = data.qty;
                document.getElementById('item-total-' + id).textContent = '\u20B9' + data.item_total;
                if (data.qty === 1) document.getElementById('btn-dec-' + id).innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>';
            }
            updateTotals(data);
        }
    </script>
    @stack('scripts')
    @if(session('cart_open'))
    <script>document.addEventListener('DOMContentLoaded', openCart);</script>
    @endif
</body>
</html>
