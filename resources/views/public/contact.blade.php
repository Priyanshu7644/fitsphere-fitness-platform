@extends('layouts.public')
@section('title', 'Contact Us')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-8 sm:p-10">
                <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-8">Contact Us</h2>
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md py-2 px-3 border" placeholder="John Doe">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md py-2 px-3 border" placeholder="you@example.com">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <div class="mt-1">
                            <textarea id="message" name="message" rows="4" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md py-2 px-3 border" placeholder="How can we help you?"></textarea>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-6 py-8 sm:p-10 border-t border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center text-sm text-gray-500">
                    <div>
                        <span class="font-bold text-gray-900 block mb-1">Email Support</span>
                        support@fitsphere.com
                    </div>
                    <div>
                        <span class="font-bold text-gray-900 block mb-1">Social Media</span>
                        @fitsphere_official
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
