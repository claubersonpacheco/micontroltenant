<div>
    <!-- Modal -->
    <div
        x-data="{ open: false }"
        x-on:open-modal-status.window="open = true"
        x-on:close-modal-status.window="open = false"
        x-show="open"
        x-cloak
        class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500/25"
        style="background-color: rgba(107, 114, 128, 0.5);"
    >
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto" style="background-color: rgba(107, 114, 128, 0.5);">
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <!-- Cabeçalho -->
                <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        {{ __('Edit Status') }}
                    </h3>
                    <button
                        type="button"
                        @click="$dispatch('close-modal-status')"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400"
                        aria-label="Close"
                    >
                        <span class="sr-only">{{ __('Close') }}</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"/>
                            <path d="m6 6 12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Form -->
                <form wire:submit.prevent="updateStatus">
                    <div class="p-4 overflow-y-auto">
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-6 ">
                        <!-- Status -->
                        <div class="sm:col-span-3">
                            <label for="status" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Status') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <select wire:model="status" id="status"
                                    class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                <option value="">{{ __('Selecione um status') }}</option>
                                @foreach($statuses as $id => $label)
                                    <option value="{{ $id }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Comments -->
                        <div class="sm:col-span-3">
                            <label for="comments" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Comments') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <textarea wire:model="comments" id="comments" placeholder="Comments"
                                      class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                             focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                            @error('comments') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                                @click="$dispatch('close-modal-status')"
                                class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit"
                                class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            {{ __('Save') }}
                        </button>
                    </div>
                    </div>
                </form>
                <!--end form -->
            </div>
        </div>
    </div>
    <!-- end modal -->
</div>
