<div>
        <!--modal-->
    <div x-data="{ open: @entangle('show') }" x-show="open" x-cloak class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500 bg-opacity-10" style="background-color: rgba(107, 114, 128, 0.5);">
            <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                        <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
                            {{ __('Add Category') }}
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

                                    <form  wire:submit.prevent="save">
                                        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                                            <!-- Name -->
                                            <div class="sm:col-span-3">
                                                <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                                    {{ __('Name') }}
                                                </label>
                                            </div>
                                            <div class="sm:col-span-9">
                                                <input wire:model="name" id="title" type="text" placeholder="Name category"
                                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                                @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Document -->
                                            <div class="sm:col-span-3">
                                                <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                                    {{ __('Description') }}
                                                </label>
                                            </div>
                                            <div class="sm:col-span-9">
                                                <textarea wire:model="description" id="description" placeholder="Enter with description"
                                                          class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                                                                            @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                            </div>


                                        </div>

                                        <!-- Buttons -->
                                        <div class="mt-5 flex justify-end gap-x-2">
                                            <button  wire:click="closeModal"
                                               class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                                                {{ __('Cancel') }}
                                            </button>
                                            <button
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

