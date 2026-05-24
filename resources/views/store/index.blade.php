@extends('layouts.public')
@section('title', 'Store')

@section('content')

{{-- Floating cart button --}}
<button onclick="openCart()" class="fixed bottom-8 right-8 z-40 bg-gray-900 hover:bg-blue-600 text-white px-5 py-3.5 rounded-full font-bold transition shadow-2xl flex items-center gap-3 group">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
    <span>Cart</span>
    @php $cartCount = session('cart') ? count(session('cart')) : 0; @endphp
    @if($cartCount > 0)
        <span id="float-cart-count" class="bg-blue-500 group-hover:bg-white group-hover:text-blue-600 text-white text-xs font-black rounded-full w-6 h-6 flex items-center justify-center transition">{{ $cartCount }}</span>
    @else
        <span id="float-cart-count" class="bg-blue-500 text-white text-xs font-black rounded-full w-6 h-6 items-center justify-center transition hidden">0</span>
    @endif
</button>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Hero header --}}
    <div class="mb-10 text-center">
        <h1 class="text-5xl font-black font-heading text-gray-900 tracking-tight mb-3">
            Fit<span class="text-blue-600">Store</span>
        </h1>
        <p class="text-xl text-gray-500 max-w-xl mx-auto">Get the best gear, supplements, and apparel for your fitness journey — all in one place.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 font-medium px-5 py-4 rounded-xl shadow-sm flex items-center gap-3">
            <svg class="w-5 h-5 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Search and filter bar --}}
    <div class="mb-8 flex flex-col md:flex-row gap-4 items-center">
        <form action="{{ route('store.index') }}" method="GET" class="flex-1 flex gap-3 w-full">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="relative flex-1">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"></path></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500 shadow-sm bg-white">
            </div>
            <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold transition shadow-md">Search</button>
        </form>
    </div>

    {{-- Category filter pills --}}
    <div class="mb-8 flex flex-wrap gap-3">
        <a href="{{ route('store.index', array_filter(['search' => request('search')])) }}"
           class="px-5 py-2 rounded-full font-bold text-sm transition {{ !request('category') ? 'bg-gray-900 text-white shadow-md' : 'bg-white border border-gray-200 text-gray-700 hover:border-gray-400' }}">
            All
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('store.index', array_filter(['category' => $cat, 'search' => request('search')])) }}"
               class="px-5 py-2 rounded-full font-bold text-sm transition {{ request('category') === $cat ? 'bg-blue-600 text-white shadow-md' : 'bg-white border border-gray-200 text-gray-700 hover:border-blue-400 hover:text-blue-600' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    {{-- Product grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col group">
                <div class="h-56 bg-gray-100 relative overflow-hidden">
                    <img
                        src="{{ str_starts_with($product->image, '/images/') ? asset($product->image) : (str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide shadow-sm">
                        {{ $product->category }}
                    </span>
                    @if($product->stock < 20)
                        <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full uppercase">
                            Low Stock
                        </span>
                    @endif
                </div>

                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">{{ $product->name }}</h3>
                    <p class="text-gray-400 text-xs mb-4 line-clamp-2 flex-grow">{{ $product->description }}</p>

                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                        <div>
                            <span class="text-xl font-black text-gray-900">₹{{ number_format($product->price, 0) }}</span>
                            <span class="ml-1 text-xs text-green-600 font-bold">Free Delivery</span>
                        </div>
                        <form action="{{ route('store.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" title="Add to Cart" class="bg-blue-600 hover:bg-blue-700 active:scale-95 text-white px-4 py-2 rounded-xl font-bold text-sm transition shadow-md shadow-blue-500/20 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No products found</h3>
                <p class="text-gray-500 mb-6">Try adjusting your search or filter.</p>
                <a href="{{ route('store.index') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-bold rounded-xl">Clear Filters</a>
            </div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $products->links() }}
    </div>

</div>

@if(session('cart_open') || session('success'))
@push('scripts')
<script>document.addEventListener('DOMContentLoaded', openCart);</script>
@endpush
@endif
@endsection
