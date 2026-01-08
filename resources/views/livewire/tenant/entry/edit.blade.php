<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ "#" . $entry->budget->code . " - " . $entry->budget->name }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('common.edit_entry') }}
                </p>
            </div>

            <form wire:submit.prevent="update">
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                    <!-- Code -->
                    <div class="sm:col-span-2">
                        <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Code') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <input wire:model="code" id="code" type="text" placeholder="{{ __('Service code') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Category -->
                    <div class="sm:col-span-2">
                        <label for="category" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Category') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <!-- Select da categoria -->
                        <div class="flex gap-2 items-center">
                            <select wire:model="category" id="category"
                                    class="flex-1 py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                        focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                <option value="">{{ __('Select a category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            <!-- Botão do modal -->
                            <button type="button" wire:click="$dispatch('open-category-modal')"
                                    class="py-1 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                {{ __("common.new") }}
                            </button>
                        </div>
                        @error('category') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                    </div>

                    <!-- Name -->
                    <div class="sm:col-span-2">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Name') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <input wire:model="name" id="name" type="text" placeholder="{{ __('Entry name') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- amount -->
                    <div class="sm:col-span-2">
                        <label for="amount" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Amount') }}
                        </label>
                    </div>
                    <div class="sm:col-span-3">
                        <input wire:model="amount" id="amount" type="number" step="0.01"
                               placeholder="{{ __('Total Amount') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('amount') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Date  -->
                    <div class="sm:col-span-3">
                        <label for="date" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Date') }}
                        </label>
                    </div>
                    <div class="sm:col-span-4">
                        <input wire:model="date" id="date" type="date"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Methodo Pay -->
                    <div class="sm:col-span-2">
                        <label for="method" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Method Entry') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <div class="flex gap-2 items-center">

                            <!-- Select da categoria -->
                            <select wire:model="method" id="method_pay"
                                    class="flex-1 py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                    focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                <option value="">{{ __('Select a method') }}</option>
                                <option value="money">{{ __('Money')}}</option>
                                <option value="card">{{ __('Card') }}</option>
                                <option value="transfer">{{ __('Transfer') }}</option>
                                <option value="bizum">{{ __('Bizum') }}</option>
                                <option value="other">{{ __('other') }}</option>
                            </select>
                        </div>
                        @error('method')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="sm:col-span-2">
                        <label for="description"
                               class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Description') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <textarea wire:model="description" id="description"
                                  placeholder="{{ __('Expense description') }}"
                                  class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                        @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- received -->
                    <div class="sm:col-span-2">
                        <label for="received_by"
                               class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Received By') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <input wire:model="received_by" id="received_by" type="text"
                               placeholder="{{ __('Received by ') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('received_by') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Receipt -->
                    <div class="sm:col-span-2">
                        <label for="receipt" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Receipt') }}
                        </label>
                    </div>
                    <div class="sm:col-span-2">
                        <!-- Select da categoria -->
                        <select wire:model="receipt" id="receipt"
                                class="flex-1 py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                    focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            <option value="1">{{ __('common.yes') }}</option>
                            <option value="0">{{ __('common.no') }}</option>

                        </select>

                        @error('receipt') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                    </div>

                    <div class="sm:col-span-8">
                    </div>


                    <template x-if="$wire.receipt == 1">
                        <div class="contents">
                            <!-- Invoice Number -->
                            <div class="sm:col-span-2">
                                <label for="receipt_number"
                                       class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('common.receipt_number') }}
                                </label>
                            </div>
                            <div class="sm:col-span-2">
                                <input wire:model="receipt_number" id="receipt_number" type="text"
                                       placeholder="{{ __('Receipt Number') }}"
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('receipt_number') <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- File Invoice -->
                            <div class="sm:col-span-2">
                                <label for="file_path"
                                       class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Send File') }}
                                </label>
                            </div>
                            <div class="sm:col-span-5 flex items-center gap-2">
                                <input wire:model="file_path" id="file_path" type="file" class="block w-full text-sm text-gray-500
                                    file:me-4 file:py-2 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-600 file:text-white
                                    hover:file:bg-blue-700
                                    file:disabled:opacity-50 file:disabled:pointer-events-none
                                    dark:text-neutral-500
                                    dark:file:bg-blue-500
                                    dark:hover:file:bg-blue-400
                                    ">

                                @error('file_path') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="file_path"
                                       class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('View Receipt') }}
                                </label>
                            </div>
                            <div class="sm:col-span-5">
                                @if($fileName)
                                    <a href="{{ $fileUrl }}" target="_blank"
                                       class="py-1 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-green-600 text-white hover:bg-green-700">
                                        {{ __('Receipt') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </template>

                </div>

                <!-- Buttons -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('tenant.entry.budget.listing', $entry->budget->id) }}"
                       class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                        {{ __('common.cancel') }}
                    </a>
                    <button type="submit"
                            class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                        {{ __('common.save') }}
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- Componente modal separado do form -->
    <livewire:tenant.product.partial.create-category-modal />
    <livewire:tenant.supplier.partials.create-supplier-modal />
</div>
