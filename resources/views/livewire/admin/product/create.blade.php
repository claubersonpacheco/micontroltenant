<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('Create service') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('Create your service.') }}
                </p>
            </div>

            <form wire:submit.prevent="store">
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
                        <label for="category_id" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Category') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10 flex gap-2 items-center">
                        <!-- Select da categoria -->
                        <select wire:model="category_id" id="category_id"
                                class="flex-1 py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                    focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            <option value="">{{ __('Select a category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <!-- Botão do modal -->
                        <button
                            type="button"
                            wire:click="$dispatch('open-category-modal')"
                            class="py-1 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            {{ __("Add") }}
                        </button>
                    </div>

                    <!-- Name -->
                    <div class="sm:col-span-2">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Name') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                        <input wire:model="name" id="name" type="text" placeholder="{{ __('Service name') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Price -->
                    <div class="sm:col-span-2">
                        <label for="price" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Price') }}
                        </label>
                    </div>
                    <div class="sm:col-span-3">
                        <input wire:model="price" id="price" type="number" step="0.01" placeholder="{{ __('Service price') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('price') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Product Type -->
                    <div class="sm:col-span-3">
                        <label for="product_type" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Product Type') }}
                        </label>
                    </div>
                    <div class="sm:col-span-4">
                        <select wire:model="product_type" id="product_type"
                                class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                    focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            <option value="">{{ __('Select a product type') }}</option>
                            @foreach(\App\Enum\ProductType::cases() as $type)
                                <option value="{{ $type->value }}">{{ ucfirst($type->value) }}</option>
                            @endforeach
                        </select>
                        @error('product_type') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description -->
                    <div class="sm:col-span-2">
                        <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Description') }}
                        </label>
                    </div>
                    <div class="sm:col-span-10">
                            <textarea wire:model="description" id="description" placeholder="{{ __('Service description') }}"
                                      class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                        @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('product.index') }}"
                       class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit"
                            class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                        {{ __('Create') }}
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- Componente modal separado do form -->
    <livewire:admin.product.partial.create-category-modal />
</div>
