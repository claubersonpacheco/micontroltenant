
    <div>
        <style>
            @media(prefers-color-scheme: dark){
                .bg-dots {
                    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(200,200,255,0.15)'/%3E%3C/svg%3E");
                }
            }
            @media(prefers-color-scheme: light){
                .bg-dots {
                    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,50,0.10)'/%3E%3C/svg%3E")
                }
            }
        </style>

        <!-- Wrapper principal flex para empurrar footer -->
        <div class="min-h-screen flex flex-col bg-gray-100 bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">

            <!-- Conteúdo cresce para ocupar espaço -->
            <div class="flex-grow relative sm:flex sm:justify-center sm:items-center">

                @if (Route::has('login'))
                    <div class="p-6 text-right sm:fixed sm:top-0 sm:right-0">
                        @auth('web')
                            <a href="{{ route('admin') }}"
                               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">
                                {{ __('Admin') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-indigo-500">
                                {{ __('Log In') }}
                            </a>
                        @endauth
                    </div>
                @endif

                <div class="p-6 mx-auto max-w-7xl lg:p-8">
                    <div class="flex justify-center">
                        <x-logo width="200" height="40" />
                    </div>

                    <div class="mt-16 flex justify-center">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-1 lg:gap-8 w-full max-w-3xl">

                            <a href="https://tailwindcss.com/docs" target="_blank"
                               class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent
                              dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none
                              flex flex-col items-center text-center motion-safe:hover:scale-[1.01] transition-all duration-250
                              focus:outline focus:outline-2 focus:outline-indigo-500">

                                <div>
                                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 dark:bg-indigo-900/20 mx-auto">
                                        <svg class="text-indigo-400 fill-current w-7 h-7" viewBox="0 0 50 31" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#a)">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M25 0c-6.667 0-10.833 3.382-12.5 10.146 2.5-3.382 5.417-4.65 8.75-3.805 1.902.482 3.261 1.882 4.766 3.432 2.45 2.524 5.288 5.445 11.484 5.445 6.667 0 10.833-3.382 12.5-10.145-2.5 3.382-5.417 4.65-8.75 3.804-1.902-.482-3.261-1.882-4.766-3.431C34.034 2.922 31.196 0 25 0ZM12.5 15.218C5.833 15.218 1.667 18.6 0 25.364c2.5-3.382 5.417-4.65 8.75-3.805 1.902.483 3.261 1.883 4.766 3.432 2.45 2.524 5.288 5.445 11.484 5.445 6.667 0 10.833-3.381 12.5-10.145-2.5 3.382-5.417 4.65-8.75 3.805-1.902-.483-3.261-1.883-4.766-3.432-2.45-2.524-5.288-5.446-11.484-5.446Z"/>
                                            </g>
                                            <defs>
                                                <clipPath id="a"><rect width="50" height="31"/></clipPath>
                                            </defs>
                                        </svg>
                                    </div>

                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">¡Próximamente!</h2>

                                    <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                        “Ahorra tiempo y crea presupuestos profesionales en segundos.”
                                    </p>
                                </div>

                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- FOOTER FIXO EMBAIXO -->
            <footer class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
                <div class="text-center">


                    <div class="mt-3">
                        <p class="text-gray-500 dark:text-neutral-500"> <a class="text-blue-600 hover:underline dark:text-blue-500" href="{{ route('privacy') }}">Privacy</a></p>
                        <p class="text-gray-500 dark:text-neutral-500">© 2025 MiControl.es</p>
                    </div>

                    <div class="mt-3 space-x-2">
                        <!-- Ícones -->
                        <!-- (mantive seus ícones) -->
                    </div>
                </div>
            </footer>
        </div>
    </div>

