@extends('layouts.public')
@section('title', 'About Us')

@section('content')
<div class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl mb-4">Our Mission</h2>
                <p class="text-lg text-gray-500 mb-6">
                    FitSphere was founded with a single goal: to make premium fitness training accessible to everyone, anywhere. We believe that health and fitness should not be a luxury, but a fundamental part of a balanced life.
                </p>
                <p class="text-lg text-gray-500">
                    Through cutting-edge technology and a community of dedicated professional trainers, we provide personalized programs, nutritional guidance, and live support to help you achieve your goals and transform your body and mind.
                </p>
            </div>
            <div class="mt-10 lg:mt-0">
                <img class="rounded-xl shadow-xl w-full" src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?q=80&w=2070&auto=format&fit=crop" alt="Gym">
            </div>
        </div>
    </div>
</div>
@endsection
