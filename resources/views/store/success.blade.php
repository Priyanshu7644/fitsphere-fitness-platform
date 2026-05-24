@extends('layouts.public')
@section('title', 'Order Success')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-12">
        <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-green-100 mb-8">
            <svg class="h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        
        <h1 class="text-4xl font-black font-heading text-gray-900 mb-4">Order Placed Successfully!</h1>
        <p class="text-xl text-gray-500 mb-8">Thank you for shopping with FitSphere.</p>
        
        <div class="bg-gray-50 rounded-2xl p-6 inline-block mb-10 border border-gray-100 shadow-inner">
            <p class="text-sm text-gray-500 mb-1 uppercase tracking-widest font-bold">Your Order ID</p>
            <p class="text-2xl font-mono font-bold text-blue-600">{{ session('orderId') ?? 'ORD-XXXXXXX' }}</p>
        </div>
        
        <div>
            <p class="text-gray-600 mb-8 max-w-lg mx-auto">We've sent a confirmation email with your order details and a tracking link. Your fitness gear will be on its way shortly.</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('store.index') }}" class="inline-flex justify-center items-center px-8 py-4 border border-transparent text-base font-bold rounded-xl shadow-lg text-white bg-blue-600 hover:bg-blue-700 transition shadow-blue-500/30">
                    Continue Shopping
                </a>
                <a href="{{ route('home') }}" class="inline-flex justify-center items-center px-8 py-4 border border-gray-300 text-base font-bold rounded-xl shadow-sm text-gray-700 bg-white hover:bg-gray-50 transition">
                    Return to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
