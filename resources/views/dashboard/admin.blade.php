<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm rounded-xl p-6 border border-gray-100">
                    <div class="text-sm font-medium text-gray-500 mb-1">Total Users</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm rounded-xl p-6 border border-gray-100">
                    <div class="text-sm font-medium text-gray-500 mb-1">Total Trainers</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalTrainers }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm rounded-xl p-6 border border-gray-100">
                    <div class="text-sm font-medium text-gray-500 mb-1">Total Programs</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalPrograms }}</div>
                </div>
            </div>

            <!-- Admin Actions -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Platform Analytics & Management</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('admin.users') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <h4 class="font-bold text-gray-900">Manage Users</h4>
                            <p class="text-sm text-gray-500 mt-1">View, edit or delete users and trainers.</p>
                        </a>
                        <a href="{{ route('programs.index') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <h4 class="font-bold text-gray-900">Manage Programs</h4>
                            <p class="text-sm text-gray-500 mt-1">Review all programs on the platform.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
