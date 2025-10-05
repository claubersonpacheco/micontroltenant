<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            {{ __('Total Budget') }}
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                    <path d="M12 17h.01" />
                                </svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700" role="tooltip">
                    Valor actual del presupuesto
                  </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            {{ $budget->total }}
                        </h3>
{{--                            <span class="flex items-center gap-x-1 text-green-600">--}}
{{--                                <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                  <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />--}}
{{--                                  <polyline points="16 7 22 7 22 13" />--}}
{{--                                </svg>--}}
{{--                                <span class="inline-block text-sm">--}}
{{--                                  1.7%--}}
{{--                                </span>--}}
{{--                            </span>--}}
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            {{ __('Total Neto') }}
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            29.4%
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            Ingressos
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            56.8%
                        </h3>
                        <span class="flex items-center gap-x-1 text-red-600">
                <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />
                  <polyline points="16 17 22 17 22 11" />
                </svg>
                <span class="inline-block text-sm">
                  1.7%
                </span>
              </span>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            Gastos
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            92,913
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('Budget') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('Edit your budget.') }}
                </p>
            </div>

            <form id="customer-create" wire:submit.prevent="update">

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                    <!-- Code -->
                    <div class="sm:col-span-2">
                        <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Code') }}
                        </label>
                    </div>
                    <div class="sm:col-span-3">
                        <input wire:model="code" id="code" type="text" readonly
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-7">
                    </div>
                    <!-- Date (atual) -->
                    <div class="sm:col-span-2">
                        <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Date') }}
                        </label>
                    </div>
                    <div class="sm:col-span-3">
                        <input wire:model.live="date" id="date" type="date"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Expirate Date -->
                    <div class="sm:col-span-2">
                        <label for="expirate" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Expirate Date') }}
                        </label>
                    </div>
                    <div class="sm:col-span-2">
                        <input wire:model.live="expirate"
                               id="expirate"
                               type="date"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('expirate') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!--calc date-->
                    <div class="sm:col-span-1">
                        <label for="total_expirate" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Days ') }}
                        </label>
                    </div>
                    <div class="sm:col-span-2">
                        <input wire:model="total_expirate" id="total_expirate" readonly type="text"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    </div>

                    <!-- Customer -->
                    <div class="sm:col-span-2">
                        <label for="customer" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Customer') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <input wire:model="customer" id="customer" readonly type="text"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    </div>

                    <!-- Name -->
                    <div class="sm:col-span-2">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Name') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <input wire:model="name" id="name" type="text" placeholder="{{ __('Name your budget') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description -->
                    <div class="sm:col-span-2">
                        <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Description') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                            <textarea wire:model="description" id="description" placeholder="Budget description"
                                      class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                        @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('customer.index') }}"
                       class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit" form="customer-create"
                            class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                        {{ __('Save changes') }}
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->

    </div>
</div>
