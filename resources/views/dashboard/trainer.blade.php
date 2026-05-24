@extends('layouts.dashboard')

@section('header_title')
    <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Trainer Dashboard</h2>
@endsection

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Welcome Banner -->
    <div class="bg-gray-900 rounded-3xl p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
        <div class="absolute right-32 bottom-0 w-32 h-32 bg-white opacity-10 rounded-full -mb-10"></div>
        
        <div class="relative z-10">
            <p class="text-gray-400 font-bold uppercase tracking-widest text-xs mb-1">Welcome back,</p>
            <h2 class="text-3xl font-black mb-2">{{ auth()->user()->name }}</h2>
            <p class="text-gray-400 max-w-lg">Manage your programs, track your students' progress, and schedule new live sessions directly from your dashboard.</p>
        </div>
        <div class="relative z-10 mt-6 md:mt-0 flex gap-4">
            <a href="{{ route('programs.create') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition transform hover:-translate-y-1 inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                New Program
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm font-bold text-gray-500 mb-1">My Programs</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $programs->count() }}</h3>
            </div>
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm font-bold text-gray-500 mb-1">Total Students</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $programs->sum('enrollments_count') }}</h3>
            </div>
            <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm font-bold text-gray-500 mb-1">Live Sessions</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $sessions->count() }}</h3>
            </div>
            <div class="w-16 h-16 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Management Section -->
    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Manage Programs</h3>
                <p class="text-sm text-gray-500 mt-1">Overview of all your created content and enrollments.</p>
            </div>
            <a href="{{ route('programs.index') }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm">View All &rarr;</a>
        </div>
        
        <div class="p-0">
            @if($programs->isEmpty())
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">No Programs Yet</h3>
                    <p class="text-gray-500 mb-6 max-w-sm mx-auto">Create your first fitness program to start gaining students and building your audience.</p>
                    <a href="{{ route('programs.create') }}" class="px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-bold rounded-xl transition inline-block">Create Program</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-extrabold text-gray-500 uppercase tracking-wider">Program Detail</th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-extrabold text-gray-500 uppercase tracking-wider">Level</th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-extrabold text-gray-500 uppercase tracking-wider">Students</th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-extrabold text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-8 py-4 text-right text-xs font-extrabold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($programs as $program)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-12 w-12 rounded-lg bg-gray-200 overflow-hidden shrink-0">
                                                @if($program->image)
                                                    <img src="{{ str_starts_with($program->image, 'http') ? $program->image : asset('storage/' . $program->image) }}" class="h-full w-full object-cover">
                                                @else
                                                    <div class="h-full w-full flex items-center justify-center text-gray-400">IMG</div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-bold text-gray-900">{{ $program->title }}</div>
                                                <div class="text-xs text-gray-500">{{ $program->duration_weeks ?? 'N/A' }} Weeks</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full 
                                            {{ $program->difficulty_level == 'beginner' ? 'bg-green-100 text-green-800' : 
                                               ($program->difficulty_level == 'intermediate' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($program->difficulty_level) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap text-sm text-gray-900 font-bold">
                                        {{ $program->enrollments_count }}
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                            Published
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('programs.edit', $program) }}" class="text-blue-600 hover:text-blue-900 mr-4 font-bold">Edit</a>
                                        <form action="{{ route('programs.destroy', $program) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold" onclick="return confirm('Are you sure you want to delete this program? This action cannot be undone.')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
