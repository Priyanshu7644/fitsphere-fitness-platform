<x-guest-layout>
    <div class="mb-10 text-center lg:text-left">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Create an Account</h2>
        <p class="text-gray-500">Join FitSphere and start your journey.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Role Selection -->
        <div>
            <label for="role" class="block text-sm font-bold text-gray-700 mb-2">Account Type</label>
            <div class="relative">
                <select id="role" name="role" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 text-gray-900 focus:border-blue-500 focus:ring-blue-500 shadow-sm appearance-none cursor-pointer">
                    <option value="user">Member (Access Programs & Classes)</option>
                    <option value="trainer">Trainer (Create & Manage Content)</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition shadow-blue-500/30">
            Sign Up
        </button>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-500 hover:underline transition">
                    Log in here
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
