{{-- <x-guest-layout> --}}
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        {{-- <a href="/">
            <img src="{{ asset('logo.png') }}" alt="Product Photo 6" class="w-full h-64 object-cover"/>
         </a> --}}
        <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8">
            <x-guest-layout>
            {{-- <a href="/">
                <img src="{{ asset('logo.png') }}" alt="Product Photo 6" class="w-full h-64 object-cover">
            </a> --}}
            <!-- Header -->
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">{{ __('Log in to your account') }}</h2>
                <p class="mt-2 text-sm text-gray-600">{{ __('Please enter your credentials to continue.') }}</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center text-sm text-gray-600">
                        <input id="remember_me" type="checkbox" class="form-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-center">
                @if (Route::has('register'))
                    <p class="text-sm text-gray-600">
                        {{ __("Don't have an account?") }}
                        <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">
                            {{ __('Register here') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
