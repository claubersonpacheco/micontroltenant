<!-- Card Section -->
<div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                {{ __('Customer') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ __('Edit your customer.') }}
            </p>
        </div>

        <form wire:submit.prevent="update">
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
                    <input wire:model="name" id="name" type="text" placeholder="Customer name"
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
                    <input wire:model="email" id="email" type="email" placeholder="customer@example.com"
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
                    <input wire:model="phone" id="phone" type="text" placeholder="+34 600 000 000"
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
                    <input wire:model="document" id="document" type="text" placeholder="Document number"
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
                <a href="{{ route('customer.index') }}"
                   class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                    {{ __('Cancel') }}
                </a>
                <button type="submit"
                        class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
