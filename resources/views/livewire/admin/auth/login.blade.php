@section('title', 'Sign in to your account')
<div>
<div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
    <!-- Logo centralizada -->
    <a href="{{ route('home') }}" class="flex justify-center">
        <x-logo width="200" height="40" />
    </a>

    <!-- Título -->
    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
        Sign in to your account
    </h2>

    <!-- Subtítulo com link -->
    @if (Route::has('register'))
        <p class="mt-2 text-sm text-gray-600">
            Or
            <a href="{{ route('register') }}"
               class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition duration-150 ease-in-out">
                create a new account
            </a>
        </p>
    @endif
</div>

<!-- Formulário centralizado -->
<div class="mt-8 flex justify-center">
    <div class="w-full max-w-md px-6 py-8 bg-white shadow sm:rounded-lg">
        <form wire:submit.prevent="authenticate" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email address
                </label>
                <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                           focus:border-indigo-500 sm:text-sm" />
                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input wire:model.lazy="password" id="password" type="password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                           focus:border-indigo-500 sm:text-sm" />
                @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input wire:model.lazy="remember" id="remember" type="checkbox"
                           class="h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                    <span class="ml-2 text-sm text-gray-900">Remember</span>
                </label>

                <a href="{{ route('password.request') }}"
                   class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                    Forgot your password?
                </a>
            </div>

            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent
                           rounded-md shadow-sm text-sm font-medium text-white
                           bg-indigo-600 hover:bg-indigo-500 focus:outline-none
                           focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
</div>
