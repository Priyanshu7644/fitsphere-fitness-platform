<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Program:') }} {{ $program->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 p-8">
                <form action="{{ route('programs.update', $program) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="title" class="block font-medium text-sm text-gray-700">Program Title</label>
                        <input id="title" type="text" name="title" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1" value="{{ old('title', $program->title) }}" required autofocus />
                        @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="4" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1">{{ old('description', $program->description) }}</textarea>
                        @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="duration_weeks" class="block font-medium text-sm text-gray-700">Duration (Weeks)</label>
                            <input id="duration_weeks" type="number" name="duration_weeks" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1" value="{{ old('duration_weeks', $program->duration_weeks) }}" />
                            @error('duration_weeks') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="difficulty_level" class="block font-medium text-sm text-gray-700">Difficulty Level</label>
                            <select id="difficulty_level" name="difficulty_level" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1">
                                <option value="beginner" {{ old('difficulty_level', $program->difficulty_level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="intermediate" {{ old('difficulty_level', $program->difficulty_level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="advanced" {{ old('difficulty_level', $program->difficulty_level) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                            </select>
                            @error('difficulty_level') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="category" class="block font-medium text-sm text-gray-700">Category</label>
                        <select id="category" name="category" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1">
                            <option value="fitness" {{ old('category', $program->category) == 'fitness' ? 'selected' : '' }}>Fitness (Gym, Workouts)</option>
                            <option value="mind_body" {{ old('category', $program->category) == 'mind_body' ? 'selected' : '' }}>Mind & Body (Yoga, Meditation)</option>
                        </select>
                        @error('category') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 mb-2">Current Cover Image</label>
                        @if($program->image)
                            <div class="mb-4">
                                @if(str_starts_with($program->image, 'http'))
                                    <img src="{{ $program->image }}" class="w-48 h-32 object-cover rounded-md border border-gray-200" alt="Current Image">
                                @else
                                    <img src="{{ asset('storage/' . $program->image) }}" class="w-48 h-32 object-cover rounded-md border border-gray-200" alt="Current Image">
                                @endif
                            </div>
                        @else
                            <p class="text-sm text-gray-500 italic mb-4">No image uploaded.</p>
                        @endif
                        
                        <label for="image" class="block font-medium text-sm text-gray-700">Update Cover Image</label>
                        <input id="image" type="file" name="image" accept="image/*" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full mt-1 p-2 bg-white" />
                        <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image.</p>
                        @error('image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('programs.index') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium mr-4">Cancel</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Update Program
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
