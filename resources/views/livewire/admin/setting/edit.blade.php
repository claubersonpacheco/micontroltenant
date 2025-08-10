    <!-- Card Section -->
    <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('Setting') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('Edit your setting.') }}
                </p>
            </div>

            <form wire:submit.prevent="update">
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                    <!-- Title -->
                    <div class="sm:col-span-3">
                        <label for="title" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Title') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.title" id="title" type="text" placeholder="Name this employer"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Document -->
                    <div class="sm:col-span-3">
                        <label for="document" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Document') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.document" id="document" type="text" placeholder="Enter document number"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.document') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div class="sm:col-span-3">
                        <label for="email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Email') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.email" id="email" type="email" placeholder="youremail@example.com"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Address -->
                    <div class="sm:col-span-3">
                        <label for="address" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Address') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.address" id="address" type="text" placeholder="Enter address"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- City -->
                    <div class="sm:col-span-3">
                        <label for="city" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('City') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.city" id="city" type="text" placeholder="Enter city"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.city') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Postal Code -->
                    <div class="sm:col-span-3">
                        <label for="postal_code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Postal Code') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.postal_code" id="postal_code" type="text" placeholder="Enter postal code"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.postal_code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Send Email -->
                    <div class="sm:col-span-3">
                        <label for="send_email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Send Email') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.send_email" id="send_email" type="text" placeholder="Enter send email"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.send_email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- WhatsApp -->
                    <div class="sm:col-span-3">
                        <label for="whatsapp" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('WhatsApp') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.whatsapp" id="whatsapp" type="text" placeholder="Enter WhatsApp"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.whatsapp') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <!-- Prefix -->
                    <div class="sm:col-span-3">
                        <label for="prefix" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                            {{ __('Prefix') }}
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input wire:model="settings.prefix" id="prefix" type="text" placeholder="Enter prefix"
                               class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('settings.prefix') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button"
                            class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                        Cancel
                    </button>
                    <button type="submit"
                            class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                        Save changes
                    </button>
                </div>
            </form>

        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->


</div>
<!-- End Card Section -->


