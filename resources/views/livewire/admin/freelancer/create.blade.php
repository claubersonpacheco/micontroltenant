<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('Freelancer ') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('Create freelancer.') }}
                </p>
            </div>

            <form id="freelancer-create" wire:submit.prevent="store">
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
                        <input wire:model="name" id="name" type="text" placeholder="{{ __('Name your freelancer') }}"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Date (atual) -->
                    <div class="sm:col-span-3">
                        <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Birth Date') }}
                        </label>
                    </div>
                    <div class="sm:col-span-5">
                        <input wire:model.live="birth_date" id="date" type="date"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-2"></div>
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
                        <input wire:model="address" id="document" type="text" placeholder="Address"
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
                        <input wire:model="account_number" id="account_bank" type="text" placeholder="Account Number"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('account_number') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Role -->
                    <div class="sm:col-span-3">
                        <label for="role" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Role') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="role" id="role" type="text" placeholder="Role"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('role') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Status (Checkbox simples) -->
                    <div class="sm:col-span-3">
                        <label for="status" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Status') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9 flex items-center space-x-3">
                        <input type="checkbox" id="status" wire:model="status" {{ $status }} class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700">
                        <label for="status" class="text-sm text-gray-800 dark:text-neutral-200">

                        </label>
                        @error('status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('freelancer.index') }}"
                       class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit" form="freelancer-create"
                            class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
</div>
