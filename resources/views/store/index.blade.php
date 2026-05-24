@extends('layouts.public')
@section('title', 'Store')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold font-heading text-gray-900 tracking-tight">Fit<span class="text-blue-600">Store</span></h1>
            <p class="mt-2 text-lg text-gray-600">Get the best gear for your fitness journey.</p>
        </div>
        <a href="{{ route('store.cart') }}" class="relative bg-gray-900 hover:bg-gray-800 text-white px-5 py-2.5 rounded-full font-medium transition shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Cart
            @if(session('cart') && count(session('cart')) > 0)
                <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center">{{ count(session('cart')) }}</span>
            @endif
        </a>
    </div>

    @if(session('success'))
        <div class="mb-8 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm">
            <p class="text-green-700">{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col">
                <div class="h-64 bg-gray-100 relative group overflow-hidden">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-200">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    @if($product->category)
                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-gray-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                            {{ $product->category }}
                        </span>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold font-heading text-gray-900 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-2 flex-grow">{{ $product->description }}</p>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-2xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        <form action="{{ route('store.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition shadow-lg shadow-blue-500/30">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                <p class="text-xl font-medium text-gray-900">No products available yet.</p>
                <p class="mt-2">Check back soon for amazing fitness gear!</p>
            </div>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection

