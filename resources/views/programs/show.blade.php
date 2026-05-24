<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $program->title }}
            </h2>
            @if(auth()->id() === $program->trainer_id || auth()->user()->role === 'admin')
            <a href="{{ route('programs.edit', $program) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-md font-medium transition text-sm border border-gray-300">
                Edit Program
            </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-8">
                
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Image -->
                    <div class="w-full md:w-1/3">
                        @if($program->image)
                            @if(str_starts_with($program->image, 'http'))
                                <img src="{{ $program->image }}" class="w-full h-auto rounded-lg shadow-sm" alt="{{ $program->title }}">
                            @else
                                <img src="{{ asset('storage/' . $program->image) }}" class="w-full h-auto rounded-lg shadow-sm" alt="{{ $program->title }}">
                            @endif
                        @else
                            <div class="w-full aspect-video bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                No Image Available
                            </div>
                        @endif
                    </div>

                    <!-- Details -->
                    <div class="w-full md:w-2/3">
                        <div class="mb-4 flex gap-2">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                @if($program->difficulty_level == 'beginner') bg-green-100 text-green-800
                                @elseif($program->difficulty_level == 'intermediate') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($program->difficulty_level) }}
                            </span>
                            @if($program->duration_weeks)
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $program->duration_weeks }} Weeks
                            </span>
                            @endif
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $program->title }}</h3>
                        <p class="text-sm text-gray-500 mb-6">Created by: <span class="font-medium text-gray-700">{{ $program->trainer->name }}</span></p>

                        <div class="prose max-w-none text-gray-600 mb-8">
                            {!! nl2br(e($program->description)) !!}
                        </div>

                        @if(auth()->user()->role === 'user')
                            <form action="{{ route('programs.enroll', $program) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-bold text-lg transition shadow-lg shadow-blue-500/30">
                                    Enroll in this Program
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Area for Workouts and Diet Plans -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Workouts -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Workouts</h3>
                        @if(auth()->id() === $program->trainer_id || auth()->user()->role === 'admin')
                        <a href="{{ route('programs.workouts.create', $program) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">+ Add Workout</a>
                        @endif
                    </div>
                    @if($program->workouts->count() > 0)
                        <ul class="space-y-3">
                            @foreach($program->workouts as $workout)
                            <li class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <span class="font-bold text-sm text-blue-600 uppercase tracking-wider">Day {{ $workout->day_number }}</span>
                                <h4 class="font-semibold text-gray-800">{{ $workout->title }}</h4>
                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($workout->description, 50) }}</p>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 text-sm italic">No workouts added yet.</p>
                    @endif
                </div>

                <!-- Diet Plans -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Diet Plans</h3>
                        @if(auth()->id() === $program->trainer_id || auth()->user()->role === 'admin')
                        <a href="{{ route('programs.diet-plans.create', $program) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">+ Add Diet Plan</a>
                        @endif
                    </div>
                    @if($program->dietPlans->count() > 0)
                        <ul class="space-y-3">
                            @foreach($program->dietPlans as $dietPlan)
                            <li class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex justify-between">
                                    <h4 class="font-semibold text-gray-800">{{ $dietPlan->meal_schedule }}</h4>
                                    <span class="text-sm font-bold text-green-600">{{ $dietPlan->calories }} kcal</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">Protein: {{ $dietPlan->protein }}g</p>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 text-sm italic">No diet plans added yet.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
