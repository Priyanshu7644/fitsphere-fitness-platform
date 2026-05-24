<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Become a Trainer</h2>
        <p class="text-sm text-gray-600 mt-2">Join our platform and start earning by training students worldwide.</p>
    </div>

    <form method="POST" action="{{ route('trainer.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Specialization -->
        <div class="mt-4">
            <x-input-label for="specialization" :value="__('Specialization (e.g. Yoga, Bodybuilding)')" />
            <x-text-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" required />
            <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
        </div>

        <!-- Experience -->
        <div class="mt-4">
            <x-input-label for="experience" :value="__('Experience Details')" />
            <textarea id="experience" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="experience" required rows="3">{{ old('experience') }}</textarea>
            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
        </div>

        <!-- Social Links -->
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="instagram_link" :value="__('Instagram Link (Optional)')" />
                <x-text-input id="instagram_link" class="block mt-1 w-full text-sm" type="url" name="instagram_link" :value="old('instagram_link')" placeholder="https://instagram.com/..." />
                <x-input-error :messages="$errors->get('instagram_link')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="twitter_link" :value="__('Twitter Link (Optional)')" />
                <x-text-input id="twitter_link" class="block mt-1 w-full text-sm" type="url" name="twitter_link" :value="old('twitter_link')" placeholder="https://twitter.com/..." />
                <x-input-error :messages="$errors->get('twitter_link')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('trainer.login') }}">
                {{ __('Already a trainer? Log in') }}
            </a>

            <x-primary-button class="ms-4 bg-blue-600 hover:bg-blue-700">
                {{ __('Register as Trainer') }}
            </x-primary-button>
        </div>
        
        <div class="mt-6 text-center border-t border-gray-100 pt-4">
            <a class="text-sm text-gray-500 hover:text-gray-900 font-medium" href="{{ route('register') }}">
                Looking to train instead? Sign up as a User
            </a>
        </div>
    </form>
</x-guest-layout>
