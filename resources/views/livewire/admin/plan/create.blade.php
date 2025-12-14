<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('Plan') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('Create new plan.') }}
                </p>
            </div>

            <form wire:submit.prevent="store">
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                    <!-- Code -->
                    <div class="sm:col-span-3">
                        <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Code') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="code" id="code" type="text" placeholder="Plan code"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="public_id" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Public Id') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="public_id" id="public_id" type="text" placeholder="Id Public"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('public_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Name -->
                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Name') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model.live="name" id="name" type="text" placeholder="Plan name"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Slug (auto) -->
                    <div class="sm:col-span-3">
                        <label for="slug" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Slug') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="slug" id="slug" type="text" placeholder="plan-basic" readonly
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('slug') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description -->
                    <div class="sm:col-span-3">
                        <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Description') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <textarea wire:model="description" id="description" placeholder="Plan description"
                                  class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                        @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Price -->
                    <div class="sm:col-span-3">
                        <label for="price" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Price') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="price" id="price" type="number" step="0.01" placeholder="0.00"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('price') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Currency -->
                    <div class="sm:col-span-3">
                        <label for="currency" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Currency') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="currency" id="currency" type="text" placeholder="EUR"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('currency') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Billing Period -->
                    <div class="sm:col-span-3">
                        <label for="billing_period" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Billing Period') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <select wire:model="billing_period" id="billing_period"
                                class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            <option value="monthly">{{ __('Monthly') }}</option>
                            <option value="yearly">{{ __('Yearly') }}</option>
                            <option value="lifetime">{{ __('Lifetime') }}</option>
                        </select>
                        @error('billing_period') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Trial Days -->
                    <div class="sm:col-span-3">
                        <label for="trial_days" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Trial Days') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="trial_days" id="trial_days" type="number" placeholder="0"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('trial_days') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Limits -->
                    <div class="sm:col-span-3">
                        <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Limits') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9 grid sm:grid-cols-3 gap-3">
                        <input wire:model="max_users" type="number" placeholder="Max users"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">

                        <input wire:model="max_projects" type="number" placeholder="Max projects"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">

                        <input wire:model="max_storage_mb" type="number" placeholder="Max storage (MB)"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    </div>

                    <!-- Features -->
                    <div class="sm:col-span-3">
                        <label for="features" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Features (JSON)') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <textarea wire:model="features" id="features" placeholder='["Feature 1", "Feature 2"]'
                                  class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                        @error('features') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tax Percentage -->
                    <div class="sm:col-span-3">
                        <label for="tax_percentage" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Tax (%)') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="tax_percentage" id="tax_percentage" type="number" step="0.01" placeholder="0"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('tax_percentage') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Order -->
                    <div class="sm:col-span-3">
                        <label for="order" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Order') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="order" id="order" type="number" placeholder="0"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                               focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('order') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                        <!-- Toggles -->
                        <div class="flex flex-wrap items-center gap-6">
                            <label class="flex items-center space-x-2">
                                <input wire:model="highlighted" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-800 dark:text-neutral-200">{{ __('Highlighted') }}</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input wire:model="is_active" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-800 dark:text-neutral-200">{{ __('Active') }}</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input wire:model="is_public" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-800 dark:text-neutral-200">{{ __('Public') }}</span>
                            </label>
                        </div>

                </div>

                <!-- Buttons -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('admin.plan.index') }}"
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
</div>
