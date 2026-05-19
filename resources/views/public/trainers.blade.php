@extends('layouts.public')
@section('title', 'Our Trainers')

@section('content')
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Meet Our Trainers</h2>
            <p class="mt-4 text-xl text-gray-500">Learn from the best to become your best.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($trainers as $trainer)
                <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-100 hover:shadow-md transition">
                    <img class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-sm" src="{{ $trainer->profile_picture ?: 'https://ui-avatars.com/api/?name='.urlencode($trainer->name).'&background=random' }}" alt="{{ $trainer->name }}">
                    <h3 class="text-xl font-bold text-gray-900">{{ $trainer->name }}</h3>
                    <p class="text-blue-600 text-sm font-medium mb-4">{{ $trainer->trainerProfile->specialization ?? 'Fitness Expert' }}</p>
                    <p class="text-gray-500 text-sm mb-6">{{ $trainer->trainerProfile->experience ?? 'Passionate about helping people reach their fitness goals.' }}</p>
                    
                    <div class="flex justify-center space-x-4">
                        @if(isset($trainer->trainerProfile->facebook_link))
                            <a href="{{ $trainer->trainerProfile->facebook_link }}" class="text-gray-400 hover:text-blue-600 transition">FB</a>
                        @endif
                        @if(isset($trainer->trainerProfile->instagram_link))
                            <a href="{{ $trainer->trainerProfile->instagram_link }}" class="text-gray-400 hover:text-pink-600 transition">IG</a>
                        @endif
                        @if(isset($trainer->trainerProfile->twitter_link))
                            <a href="{{ $trainer->trainerProfile->twitter_link }}" class="text-gray-400 hover:text-blue-400 transition">TW</a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    No trainers available at the moment. Check back later!
                </div>
            @endforelse
        </div>
        
        <div class="mt-12">
            {{ $trainers->links() }}
        </div>
    </div>
</div>
@endsection
