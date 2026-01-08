@section('title', 'Sign in to your account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center">
        <x-logo width="200" height="40" />
    </div>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Welcome, sign into your account
        </h2>
{{--        @if (Route::has('register'))--}}
{{--            <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">--}}
{{--                Or--}}
{{--                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">--}}
{{--                    create a new account--}}
{{--                </a>--}}
{{--            </p>--}}
{{--        @endif--}}
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm relative">
                            <input
                                wire:model.lazy="password"
                                id="password"
                                type="password"
                                required
                                class="appearance-none block w-full px-3 py-2 pr-10 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"
                                data-password-field
                            />

                            <button
                                type="button"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                                aria-label="Mostrar u ocultar contraseña"
                                data-password-toggle
                            >
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

                    <script>
                    function initPasswordToggle() {
                        const toggle = document.querySelector('[data-password-toggle]');
                        const field = document.querySelector('[data-password-field]');
                        const eye = document.querySelector('[data-icon-eye]');
                        const eyeOff = document.querySelector('[data-icon-eye-off]');

                        if (!toggle || !field || !eye || !eyeOff) return;

                        if (toggle.dataset.bound === '1') return;
                        toggle.dataset.bound = '1';

                        toggle.addEventListener('click', () => {
                            const isPassword = field.type === 'password';
                            field.type = isPassword ? 'text' : 'password';
                            eye.classList.toggle('hidden', isPassword);
                            eyeOff.classList.toggle('hidden', !isPassword);
                        });
                    }

                    document.addEventListener('DOMContentLoaded', initPasswordToggle);

                    // Si Livewire re-renderiza, volvemos a enlazar el botón
                    document.addEventListener('livewire:initialized', () => {
                        initPasswordToggle();
                        Livewire.hook('message.processed', () => initPasswordToggle());
                    });
                    </script>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-indigo-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                            Remember
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Sign in
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
