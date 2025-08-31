<!-- Card Section -->
<div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                {{ __('Product Supplier') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ __('Create your product supplier.') }}
            </p>
        </div>

        <form id="customer-create" wire:submit.prevent="store">
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                <!-- Code -->
                <div class="sm:col-span-3">
                    <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Code') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="code" id="code" type="text" placeholder="Code"
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
                    <input wire:model="name" id="name" type="text" placeholder="{{ __('Name your service provider') }}"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
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

                <!-- Service Type -->
                <div class="sm:col-span-3">
                    <label for="service_type" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Service Type') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="service_type" id="service_type" type="text" placeholder="Service Type"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('service_type') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
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

                <!-- Address -->
                <div class="sm:col-span-3">
                    <label for="address" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Address') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="address" id="address" type="text" placeholder="Address"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- City -->
                <div class="sm:col-span-3">
                    <label for="city" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('City') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="city" id="city" type="text" placeholder="City"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('city') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- State -->
                <div class="sm:col-span-3">
                    <label for="state" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('State') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="state" id="state" type="text" placeholder="State"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('state') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Zip Code -->
                <div class="sm:col-span-3">
                    <label for="zip" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Zip Code') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="zip" id="zip" type="text" placeholder="Zip Code"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('zip') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Account Bank -->
                <div class="sm:col-span-3">
                    <label for="account_bank" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Account Bank') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="account_bank" id="account_bank" type="text" placeholder="Account Bank"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('account_bank') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Account Number -->
                <div class="sm:col-span-3">
                    <label for="account_number" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Account Number') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="account_number" id="account_number" type="text" placeholder="Account Number"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('account_number') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Client Toggle -->
                <div class="sm:col-span-3">
                    <label for="client" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Client') }}
                    </label>
                </div>
                <div class="sm:col-span-9 flex items-center">
                    <label class="inline-flex relative items-center cursor-pointer">
                        <input type="checkbox" wire:model="client" id="client" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-neutral-700 peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                    </label>
                    @error('client') <span class="text-sm text-red-600 ml-2">{{ $message }}</span> @enderror
                </div>

                <!-- Code Client -->
                <div class="sm:col-span-3">
                    <label for="code_client" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Code Client') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="code_client" id="code_client" type="text" placeholder="Code Client"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('code_client') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
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
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
