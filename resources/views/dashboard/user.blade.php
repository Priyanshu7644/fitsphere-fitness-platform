<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm rounded-xl p-6 border border-gray-100">
                    <div class="text-sm font-medium text-gray-500 mb-1">Enrolled Programs</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $enrollments->count() }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm rounded-xl p-6 border border-gray-100">
                    <div class="text-sm font-medium text-gray-500 mb-1">Completed Workouts</div>
                    <div class="text-3xl font-bold text-gray-900">0</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm rounded-xl p-6 border border-gray-100">
                    <div class="text-sm font-medium text-gray-500 mb-1">Upcoming Sessions</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $upcomingSessions->count() }}</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Enrolled Programs -->
                <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">My Programs</h3>
                        <a href="{{ route('public.programs') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Browse More &rarr;</a>
                    </div>
                    <div class="p-6">
                        @if($enrollments->isEmpty())
                            <div class="text-center py-8 text-gray-500">
                                You haven't enrolled in any programs yet.
                                <br>
                                <a href="{{ route('public.programs') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">Find a Program</a>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($enrollments as $enrollment)
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100">
                                        <div class="flex items-center">
                                            <img src="{{ $enrollment->program->image ?: 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=100&auto=format&fit=crop' }}" alt="" class="w-16 h-16 rounded-md object-cover">
                                            <div class="ml-4">
                                                <h4 class="text-base font-bold text-gray-900">{{ $enrollment->program->title }}</h4>
                                                <p class="text-sm text-gray-500">Trainer: {{ $enrollment->program->trainer->name ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Upcoming Sessions -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900">Upcoming Live Sessions</h3>
                    </div>
                    <div class="p-6">
                        @if($upcomingSessions->isEmpty())
                            <div class="text-center py-4 text-gray-500 text-sm">
                                No upcoming live sessions.
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($upcomingSessions as $session)
                                    <div class="p-3 border border-gray-100 rounded-lg">
                                        <h4 class="font-bold text-gray-900 text-sm">{{ $session->title }}</h4>
                                        <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($session->session_date)->format('M d, Y h:i A') }}</p>
                                        @if($session->meeting_link)
                                            <a href="{{ $session->meeting_link }}" target="_blank" class="mt-2 text-xs font-medium text-blue-600 hover:text-blue-800 inline-block">Join Session &rarr;</a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
