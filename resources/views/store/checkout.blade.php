@extends('layouts.public')
@section('title', 'Checkout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center mb-8">
        <a href="{{ route('store.cart') }}" class="text-gray-500 hover:text-blue-600 mr-4 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h1 class="text-3xl font-bold font-heading text-gray-900">Checkout</h1>
    </div>

    @if ($errors->any())
        <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-4 rounded-md shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                    <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
        <!-- Checkout Form -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
                <form action="{{ route('store.checkout.process') }}" method="POST" id="checkout-form">
                    @csrf
                    
                    <!-- Contact Info -->
                    <div class="p-8 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm">1</span> 
                            Contact & Delivery Details
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="name" id="name" required class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition" value="{{ auth()->check() ? auth()->user()->name : old('name') }}">
                            </div>
                            
                            <div class="col-span-full md:col-span-1">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" name="email" id="email" required class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition" value="{{ auth()->check() ? auth()->user()->email : old('email') }}">
                            </div>
                            
                            <div class="col-span-full md:col-span-1">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" id="phone" required class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition" value="{{ old('phone') }}">
                            </div>
                            
                            <div class="col-span-full">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Delivery Address</label>
                                <textarea name="address" id="address" rows="3" required class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition">{{ old('address') }}</textarea>
                            </div>
                            
                            <div class="col-span-full md:col-span-1">
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                <input type="text" name="city" id="city" required class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition" value="{{ old('city') }}">
                            </div>
                            
                            <div class="col-span-full md:col-span-1">
                                <label for="pincode" class="block text-sm font-medium text-gray-700 mb-2">PIN Code</label>
                                <input type="text" name="pincode" id="pincode" required class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition" value="{{ old('pincode') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Payment -->
                    <div class="p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm">2</span> 
                            Payment Method
                        </h2>
                        
                        <div class="space-y-4">
                            <label class="relative flex cursor-pointer rounded-2xl border border-gray-200 bg-white p-4 shadow-sm focus:outline-none hover:border-blue-500 transition">
                                <input type="radio" name="payment_method" value="upi" class="h-5 w-5 border-gray-300 text-blue-600 focus:ring-blue-600 mt-1" checked>
                                <div class="ml-4 flex flex-1 items-center justify-between">
                                    <div>
                                        <span class="block text-sm font-medium text-gray-900">UPI (Google Pay, PhonePe)</span>
                                        <span class="mt-1 block text-sm text-gray-500">Pay directly from your bank account</span>
                                    </div>
                                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer rounded-2xl border border-gray-200 bg-white p-4 shadow-sm focus:outline-none hover:border-blue-500 transition">
                                <input type="radio" name="payment_method" value="card" class="h-5 w-5 border-gray-300 text-blue-600 focus:ring-blue-600 mt-1">
                                <div class="ml-4 flex flex-1 items-center justify-between">
                                    <div>
                                        <span class="block text-sm font-medium text-gray-900">Credit / Debit Card</span>
                                        <span class="mt-1 block text-sm text-gray-500">Mastercard, Visa, RuPay</span>
                                    </div>
                                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer rounded-2xl border border-gray-200 bg-white p-4 shadow-sm focus:outline-none hover:border-blue-500 transition">
                                <input type="radio" name="payment_method" value="cod" class="h-5 w-5 border-gray-300 text-blue-600 focus:ring-blue-600 mt-1">
                                <div class="ml-4 flex flex-1 items-center justify-between">
                                    <div>
                                        <span class="block text-sm font-medium text-gray-900">Cash on Delivery</span>
                                        <span class="mt-1 block text-sm text-gray-500">Pay when your order arrives</span>
                                    </div>
                                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-5 mt-8 lg:mt-0">
            <div class="bg-gray-50 rounded-2xl shadow-sm border border-gray-200 p-6 lg:p-8 sticky top-24">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                
                <div class="flow-root mb-6">
                    <ul class="-my-4 divide-y divide-gray-200 overflow-y-auto max-h-64 pr-2">
                        @php $total = 0 @endphp
                        @foreach($cart as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <li class="flex py-4">
                                <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    @if(isset($details['image']) && $details['image'])
                                        <img src="{{ str_starts_with($details['image'], 'http') ? $details['image'] : Storage::url($details['image']) }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-100"></div>
                                    @endif
                                </div>
                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-sm font-medium text-gray-900">
                                            <h3 class="truncate w-32">{{ $details['name'] }}</h3>
                                            <p class="ml-4">₹{{ number_format($details['price'] * $details['quantity'], 0) }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <p class="text-gray-500">Qty {{ $details['quantity'] }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flow-root border-t border-gray-200 pt-6">
                    <dl class="text-sm divide-y divide-gray-200">
                        <div class="py-3 flex items-center justify-between">
                            <dt class="text-gray-600">Subtotal</dt>
                            <dd class="font-medium text-gray-900">₹{{ number_format($total, 0) }}</dd>
                        </div>
                        <div class="py-3 flex items-center justify-between">
                            <dt class="text-gray-600">Shipping estimate</dt>
                            <dd class="font-medium text-gray-900">₹99</dd>
                        </div>
                        <div class="py-3 flex items-center justify-between">
                            <dt class="text-gray-600">Tax estimate (18% GST)</dt>
                            <dd class="font-medium text-gray-900">₹{{ number_format($total * 0.18, 0) }}</dd>
                        </div>
                        <div class="py-4 flex items-center justify-between">
                            <dt class="text-lg font-bold text-gray-900">Total</dt>
                            <dd class="text-2xl font-black text-gray-900">₹{{ number_format($total + 99 + ($total * 0.18), 0) }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="mt-8">
                    <button type="submit" form="checkout-form" class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-xl text-lg font-bold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition shadow-green-500/30">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Place Order (₹{{ number_format($total + 99 + ($total * 0.18), 0) }})
                    </button>
                </div>
                
                <div class="mt-4 text-center">
                    <p class="text-xs text-gray-500">
                        By placing your order, you agree to FitSphere's Privacy Notice and Conditions of Use.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
