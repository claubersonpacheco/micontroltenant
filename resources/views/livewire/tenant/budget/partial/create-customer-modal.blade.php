<div>
    <!--modal-->
    <div x-data="{ open: @entangle('show') }" x-show="open" x-cloak class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500 bg-opacity-10" style="background-color: rgba(107, 114, 128, 0.5);">
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
                        {{ __('Add Customer') }}
                    </h3>
                    <button wire:click="closeModal" type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
                        <span class="sr-only">{{ __("Close") }}</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Card -->
                <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">

                    <form wire:submit.prevent="save">
                        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                            <!-- Code -->
                            <div class="sm:col-span-3">
                                <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Code') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="code" id="code" type="text" placeholder="Customer code"
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Name -->
                            <div class="sm:col-span-3">
                                <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Name') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="name" id="name" type="text" placeholder="{{ __('Name your customer') }}"
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div class="sm:col-span-3">
                                <label for="email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Email') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="email" id="email" type="email" placeholder="email@example.com"
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="sm:col-span-3">
                                <label for="phone" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Phone') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="phone" id="phone" type="text" placeholder="+34 612 345 678"
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('phone') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Document -->
                            <div class="sm:col-span-3">
                                <label for="document" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Document') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="document" id="document" type="text" placeholder="DNI/NIE/NIF"
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                          focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('document') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Address -->
                            <div class="sm:col-span-3">
                                <label for="address" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Address') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                            <textarea wire:model="address" id="address" placeholder="Customer address"
                                      class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                             focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                                @error('address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-5 flex justify-end gap-x-2">
                            <button wire:click="closeModal"
                               class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit"
                                    class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Card -->


            </div>
        </div>
        <!--end modal-->
    </div>

</div>


