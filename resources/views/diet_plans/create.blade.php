<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Diet Plan to') }} {{ $program->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-8">
                <form action="{{ route('programs.diet-plans.store', $program) }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="meal_schedule" class="block font-medium text-sm text-gray-700">Meal Schedule / Name</label>
                        <input id="meal_schedule" type="text" name="meal_schedule" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1" required autofocus placeholder="e.g. Week 1 Meal Plan" />
                        @error('meal_schedule') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="calories" class="block font-medium text-sm text-gray-700">Calories (kcal)</label>
                            <input id="calories" type="number" min="0" name="calories" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1" required placeholder="e.g. 2000" />
                            @error('calories') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="protein" class="block font-medium text-sm text-gray-700">Protein (g)</label>
                            <input id="protein" type="number" step="0.1" min="0" name="protein" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1" required placeholder="e.g. 150" />
                            @error('protein') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="meal_timing" class="block font-medium text-sm text-gray-700">Meal Timing & Details</label>
                        <textarea id="meal_timing" name="meal_timing" rows="4" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1" placeholder="Describe the meals for Breakfast, Lunch, Dinner..."></textarea>
                        @error('meal_timing') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="water_intake_recommendations" class="block font-medium text-sm text-gray-700">Water Intake Recommendations</label>
                        <input id="water_intake_recommendations" type="text" name="water_intake_recommendations" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1" placeholder="e.g. 3-4 Liters per day" />
                        @error('water_intake_recommendations') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('programs.show', $program) }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium mr-4">Cancel</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Add Diet Plan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
