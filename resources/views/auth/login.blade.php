<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-10 text-center lg:text-left">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Welcome Back</h2>
        <p class="text-gray-500">Please enter your details to sign in.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Optional Role Selection (For UX consistency as requested) -->
        <div>
            <label for="role_select" class="block text-sm font-bold text-gray-700 mb-2">I am logging in as a...</label>
            <div class="relative">
                <select id="role_select" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 text-gray-900 focus:border-blue-500 focus:ring-blue-500 shadow-sm appearance-none cursor-pointer">
                    <option value="user">Member</option>
                    <option value="trainer">Trainer</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>
            <p class="text-xs text-gray-400 mt-2">Note: We will automatically route you to the correct dashboard based on your account.</p>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm font-medium" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-sm font-bold text-gray-700">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-blue-600 hover:text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-xl border-gray-300 bg-gray-50 py-3 px-4 focus:border-blue-500 focus:bg-white focus:ring-blue-500 shadow-sm transition">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm font-medium" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <label for="remember_me" class="ml-3 block text-sm font-medium text-gray-700">
                Remember me for 30 days
            </label>
        </div>

        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition shadow-blue-500/30">
            Sign In
        </button>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-500 hover:underline transition">
                    Sign up now
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
