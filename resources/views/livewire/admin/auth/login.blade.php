@section('title', 'Sign in to your account')
<div>
<div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
    <!-- Logo centralizada -->
    <div class="flex justify-center">
        <x-logo width="200" height="40" />
    </div>

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

                <div class="relative mt-1">
                    <input wire:model.lazy="password"
                           id="password"
                           type="password"
                           required
                           data-password-field
                           class="block w-full pr-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm
                               placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                               focus:border-indigo-500 sm:text-sm" />

                    <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                            aria-label="Mostrar/ocultar senha"
                            data-password-toggle>
                        <span data-icon-eye>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path d="M12 5c-7.633 0-10.853 6.49-10.987 6.766a.75.75 0 0 0 0 .468C1.147 12.51 4.367 19 12 19s10.853-6.49 10.987-6.766a.75.75 0 0 0 0-.468C22.853 11.49 19.633 5 12 5Zm0 12.5A5.5 5.5 0 1 1 12 6.5a5.5 5.5 0 0 1 0 11Z"/>
                                <path d="M12 9.25A2.75 2.75 0 1 0 12 14.75 2.75 2.75 0 0 0 12 9.25Z"/>
                            </svg>
                        </span>

                        <span data-icon-eye-off class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path d="M3.53 2.47a.75.75 0 1 0-1.06 1.06l2.2 2.2C2.2 7.64 1.13 9.76 1.01 10.03a.75.75 0 0 0 0 .468C1.147 10.77 4.367 17.26 12 17.26c1.66 0 3.1-.31 4.34-.82l3.13 3.13a.75.75 0 1 0 1.06-1.06L3.53 2.47ZM12 15.76c-6.01 0-8.91-4.53-9.46-5.5.31-.56 1.1-1.86 2.4-3.09l2.07 2.07a5.5 5.5 0 0 0 7.75 7.75l.95.95c-1.08.5-2.34.82-3.71.82Z"/>
                                <path d="M12 4.76c7.633 0 10.853 6.49 10.987 6.766a.75.75 0 0 1 0 .468c-.07.15-.98 1.96-2.72 3.56a.75.75 0 0 1-1.03-.03l-1.09-1.09c1.3-1.2 2.09-2.49 2.4-3.06-.55-.97-3.45-5.5-9.46-5.5-.93 0-1.8.11-2.61.3a.75.75 0 0 1-.71-.2l-.9-.9c1.27-.42 2.71-.64 4.13-.64Z"/>
                                <path d="M9.11 8.05a.75.75 0 0 1 .96.1l5.78 5.78a.75.75 0 0 1 .1.96A4.25 4.25 0 0 1 9.11 8.05Z"/>
                            </svg>
                        </span>
                    </button>
                </div>

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

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-password-toggle]');
    const field = document.querySelector('[data-password-field]');
    const eye = document.querySelector('[data-icon-eye]');
    const eyeOff = document.querySelector('[data-icon-eye-off]');

    if (!toggle || !field || !eye || !eyeOff) return;

    toggle.addEventListener('click', () => {
        const isPassword = field.type === 'password';
        field.type = isPassword ? 'text' : 'password';
        eye.classList.toggle('hidden', isPassword);
        eyeOff.classList.toggle('hidden', !isPassword);
    });
});
</script>
</div>
</div>
