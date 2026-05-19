@extends('layouts.public')
@section('title', 'Programs')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Fitness Programs</h2>
            <p class="mt-4 text-xl text-gray-500">Find the perfect program to reach your goals.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($programs as $program)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition flex flex-col">
                    <img class="w-full h-48 object-cover" src="{{ $program->image ?: 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $program->title }}">
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $program->difficulty_level == 'beginner' ? 'bg-green-100 text-green-800' : ($program->difficulty_level == 'intermediate' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($program->difficulty_level) }}
                            </span>
                            <span class="text-sm text-gray-500">{{ $program->duration_weeks }} Weeks</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $program->title }}</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">{{ Str::limit($program->description, 100) }}</p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                    {{ substr($program->trainer->name, 0, 1) }}
                                </div>
                                <span class="ml-2 text-sm font-medium text-gray-900">{{ $program->trainer->name }}</span>
                            </div>
                            @auth
                                <form action="{{ route('programs.enroll', $program) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Enroll Now &rarr;</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Login to Enroll</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    No programs available at the moment. Check back later!
                </div>
            @endforelse
        </div>
        
        <div class="mt-12">
            {{ $programs->links() }}
        </div>
    </div>
</div>
@endsection
